<?php

namespace app\models;

use Yii;
use yii\base\Model;
use phpQuery;
use yii\helpers\ArrayHelper;
use yii\helpers\Inflector;
use yii\web\NotFoundHttpException;
use app\modules\admin\models\AvitoParser;
use app\modules\admin\models\City;
use app\modules\admin\models\Proxy;

class Parser extends Model {

    const baseUrl = 'https://www.avito.ru';
    const mobileUrl = 'https://m.avito.ru';
    const uaAlias = '@webroot/ua.txt';
    const muaAlias = '@webroot/mua.txt';
    const linksDir = '@webroot/links/';
    const fileStorageRoot = '@webroot/upload/storage/';
    const fileStorage = '@web/upload/storage/';
    private $city;
    private $category;
    private $units;

    /**
     * AvitoParser constructor.
     * @param array $config
     * @param $city_id
     * @param $category_id
     * @throws NotFoundHttpException
     */
    public function __construct(array $config = [], $city_id, $category_id)
    {

        parent::__construct($config);

        if(!function_exists('pq')) {
            phpQuery::use_function();
        }

        $this->city = City::find()->where(['id' => $city_id])->one();
        $this->category = Category::find()->where(['id' => $category_id])->one();

        if(is_null($this->city) OR is_null($this->category)) {
            throw new NotFoundHttpException('Город или категория не найдены');
        }

        $this->units = ArrayHelper::map(FieldUnit::find()->all(), 'id', 'name');
    }

    /**
     * @param $url
     * @return bool|mixed
     */
    public function sendRequest($url) {

        /* PROXY */
        $proxy = Proxy::find()->orderBy('RAND()')->one();

        if(!$proxy) {
            Yii::error('Нет доступных прокси для сбора данных');
            return false;
        }

        /* USER-AGENT */
        if(!file_exists(Yii::getAlias(self::uaAlias))) {
            Yii::error('Файл со списком USER-AGENT не найден');
            return false;
        }

        $uaFile = file(Yii::getAlias(self::uaAlias));

        if(!count($uaFile)) {
            Yii::error('Файл со списком USER-AGENT пуст');
        }

        /* MOBILE USER-AGENT */
        if(!file_exists(Yii::getAlias(self::muaAlias))) {
            Yii::error('Файл со списком мобильных USER-AGENT не найден');
            return false;
        }

        $muaFile = file(Yii::getAlias(self::muaAlias));

        if(!count($muaFile)) {
            Yii::error('Файл со списком USER-AGENT пуст');
        }

        $uaRandKey = array_rand($uaFile);
        $ua = trim($uaFile[$uaRandKey]);
        $muaRandKey = array_rand($muaFile);
        $mua = trim($muaFile[$muaRandKey]);

        /* CONNECT */
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_PROXY, $proxy->proxy);
        curl_setopt($ch, CURLOPT_USERAGENT, (substr($url,0,9) == 'https://m' ? $mua : $ua) );
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_AUTOREFERER, 1);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 40);
        $response = curl_exec($ch);
        $error = curl_error($ch);

        if(!empty($error)) {
            $proxy->updateCounters(['fail_count' => 1]);
            Yii::error('Ошибка доступа с прокси: ' . $proxy->proxy . '. Ошибка: ' . $error . '. Код ошибки: ' . curl_errno($ch) );
            return $this->sendRequest($url);
        }

        curl_close($ch);

        if(mb_strpos($response,'Доступ с вашего IP-адреса временно ограничен') !== false) {
            $proxy->updateCounters(['fail_count' => 1]);
            Yii::error('Ошибка доступа с прокси: ' . $proxy->proxy . '. Ошибка: Доступ с Вашего IP временно ограничен.' );
            return $this->sendRequest($url);
        }

        $proxy->updateCounters(['success_count' => 1]);

        return $response;
    }

    /**
     * @param $url
     * @return mixed
     */
    public function getTotalPageCount($url) {

        $html = $this->sendRequest($url);

        $document = phpQuery::newDocumentHTML($html);
        $pagination = $document->find('.pagination-pages');
        $lastPage = $pagination->find('.pagination-page:last-child');
        $lastHref = pq($lastPage)->attr('href');
        preg_match('#\?p=([0-9]+)#', $lastHref, $match);

        return $match[1];

    }

    /**
     *
     */
    public function getAllLinksToOfferInCategory() {

        /* URL */
        $url = self::baseUrl . '/' . $this->city->slug . '/' .$this->category->slug;

        $links = [];
        $total = $this->getTotalPageCount($url);
        $total = 2;

        for($i = 1; $i <= $total; $i++) {
            $links = array_merge($links, $this->linksToOfferOnPage($url . '?p='.$i));
        }

        if(!is_dir(Yii::getAlias(self::linksDir))) {
            mkdir(Yii::getAlias(self::linksDir), 0777, true);
        }

        $linkFile = $this->getLinksFile();

        file_put_contents($linkFile, implode(PHP_EOL, $links));
        touch($linkFile);

    }

    /**
     * @param $url
     * @return array
     */
    public function linksToOfferOnPage($url) {

        $html = $this->sendRequest($url);

        $document = phpQuery::newDocumentHTML($html);
        $catalog = $document->find('.catalog-main');
        $links = $catalog->find('.item-description-title-link');

        $result = [];

        foreach($links as $link) {
            $pq = pq($link);
            $result[] = $pq->attr('href');
        }

        return $result;
    }

    /**
     * @return bool|string
     */
    public function getLinksFile() {
        return Yii::getAlias(self::linksDir . str_replace(['/'],['-'],$this->city->slug . '-' . $this->category->slug) . '.txt' );
    }

    /**
     *
     */
    public function foreachOffers($count) {

        $linkFile = $this->getLinksFile();

        if(!file_exists($linkFile)) {
            $this->getAllLinksToOfferInCategory();
        }

        $links = array_map('trim',file($linkFile));
        $saved = 0;

        foreach($links AS $link) {
            preg_match('#([0-9]+)$#', $link, $match);
            $external_id = $match[0];

            $offer = AvitoParser::find()->where(['external_id' => $external_id])->one();

            if(is_null($offer) AND $saved < $count) {
                $saved++;
                $html = $this->sendRequest(self::baseUrl . $link);

                $document = phpQuery::newDocumentHTML($html);
                $title = trim(pq($document)->find('h1')->text());
                $price = trim(pq($document)->find('.js-item-price')->attr('content'));
                $address = trim(str_replace(['Адрес:', 'Скрыть карту'], [null, null], pq($document)->find('.item-map-location')->text()));
                $map = pq($document)->find('.b-search-map');
                $latitude = pq($map)->attr('data-map-lat');
                $longitude = pq($map)->attr('data-map-lon');
                $params = pq($document->find('.item-params-list > .item-params-list-item'));
                $description = trim(pq($document)->find('.item-description-text')->html());
                if(empty($description)) {
                    $description = trim(pq($document)->find('.item-description-html')->html());
                }
                $gallery = pq($document)->find('.gallery-extended-imgs-wrapper .js-gallery-extended-img-frame');
                $published_at = trim(pq($document)->find('.title-info-metadata-item-redesign'));
                $published_at = explode(' в ', strip_tags($published_at));
                if(trim($published_at[0]) == 'сегодня') {
                    $published_at[0] = date('Y-m-d');
                } elseif(trim($published_at[0]) == 'вчера') {
                    $published_at[0] = date('Y-m-d', time() - (60*60*24));
                } else {
                    $published_at[0] = date('Y-m-d', strtotime(str_replace(
                            [
                                ' января',
                                ' февраля',
                                ' марта',
                                ' апреля',
                                ' мая',
                                ' июня',
                                ' июля',
                                ' августа',
                                ' сентября',
                                ' октября',
                                ' ноября',
                                ' декабря',
                            ],
                            [
                                '-01-',
                                '-02-',
                                '-03-',
                                '-04-',
                                '-05-',
                                '-06-',
                                '-07-',
                                '-08-',
                                '-09-',
                                '-10-',
                                '-11-',
                                '-12-',
                            ],
                            trim($published_at[0])
                        ) . date('Y') ) );
                    if(strlen($published_at[0]) == 9) {
                        $published_at[0] = '0' . $published_at[0];
                    }
                }
                $published_at = $published_at[0] . ' ' . trim((isset($published_at[1]) ? $published_at[1] : date('H:i'))) . ':00';
                $people_name = trim(strip_tags(pq($document)->find('.seller-info-name a:first')->text()));

                $image = null;
                foreach($gallery AS $k => $img) {
                    if($k == 0) {
                        $image = pq($img)->attr('data-url');
                    }
                }

                $atts = [];

                foreach($params AS $param) {
                    $p = pq($param)->text();
                    $l = pq($param)->find('.item-params-label')->text();
                    $r = str_replace($l, null, $p);
                    $atts[] = ['label' => trim(str_replace(':',null,$l)), 'value' => trim(str_replace(';',null,$r)) ];
                }

                $exists = AvitoParser::find()->where(['external_id' => $external_id])->one();

                if(!$exists) {
                    $this->getPhoneNumber(self::mobileUrl . $link);

                    $offer = new AvitoParser();
                    $offer->name = $title;
                    $offer->external_id = $external_id;
                    $offer->price = $price;
                    $offer->address = $address;
                    $offer->latitude = $latitude;
                    $offer->longitude = $longitude;
                    $offer->description = $description;
                    $offer->url = self::baseUrl . $link;
                    $offer->image = $this->saveImage($image);
                    $offer->city_id = $this->city->id;
                    $offer->category_id = $this->category->id;
                    $offer->date = $published_at;
                    $offer->people_name = $people_name;
                    $offer->people_phone = $this->getPhoneNumber(self::mobileUrl . $link);
                    $offer->is_checked = 0;
                    $offer->save();



                    if(count($atts)) {
                        $this->saveFields($atts, $offer->id);
                    }

                }

            }

        }

        return $saved;
    }

    /**
     * @param $image
     * @return bool|null|string
     */
    public function saveImage($image) {

        if(empty($image)) {
            return null;
        }

        $content = $this->sendRequest('https:' . $image);
        if(!is_dir(Yii::getAlias(self::fileStorageRoot))) {
            mkdir(Yii::getAlias(self::fileStorageRoot), 0777, true);
        }

        $filename = uniqid(date('Ymd_His_'), true) . '.' . pathinfo($image, PATHINFO_EXTENSION);
        $pathRoot = Yii::getAlias(self::fileStorageRoot . $filename);
        file_put_contents( $pathRoot, $content);

        return (file_exists($pathRoot)) ? Yii::getAlias(self::fileStorage . $filename) : null;
    }


    public function saveFields($fields, $offerId) {

        foreach($fields AS $field) {
            $name = trim($field['label']);
            $slug = Inflector::slug($name,'-');
            $value = trim($field['value']);
            $fieldItem = Field::find()->where(['slug' => $slug])->one();
            if(is_null($fieldItem)) {
                $fieldItem = new Field();
                $fieldItem->name = $name;
                $fieldItem->slug = $slug;
                $fieldItem->save();
            }

            $unit_id = null;

            foreach($this->units AS $id => $unit) {
                if(mb_strpos($value, $unit) !== false) {
                    $value = trim(str_replace($unit, null, $value));
                    $unit_id = $id;
                }
            }

            $fieldStorage = FieldStorage::find()->where(['offer_id' => $offerId])->andWhere(['field_id' => $fieldItem->id])->one();
            if(is_null($fieldStorage)) {
                $fieldStorage = new FieldStorage();
                $fieldStorage->field_id = $fieldItem->id;
                $fieldStorage->offer_id = $offerId;
            }
            if(is_numeric($value)) {
                $fieldStorage->value_int = intval($value);
                $fieldStorage->value_str = '';
            } else {
                $fieldStorage->value_int = '';
                $fieldStorage->value_str = $value;
            }
            $fieldStorage->unit_id = $unit_id;
            $fieldStorage->save();
        }

    }

    /**
     * @param $url
     * @return string
     */
    public function getPhoneNumber($url) {

        $mobilePage = $this->sendRequest($url);
        if( preg_match('#tel:\+([0-9]{11})#', $mobilePage, $phoneMatch) ) {
            return '+'.$phoneMatch[1];
        }

        return '+';

    }

}