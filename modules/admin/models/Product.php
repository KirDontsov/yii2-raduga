<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "product".
 *
 * @property int $id
 * @property int $category_id
 * @property string $name
 * @property string $content
 * @property double $price
 * @property string $keywords
 * @property string $description
 * @property string $img
 * @property string $hit
 * @property string $new
 * @property int $street_id
 * @property int $city_id
 * @property int $is_checked
 */
class Product extends \yii\db\ActiveRecord
{
    public $image;
    public $gallery;

    public function behaviors()
    {
        return [
            'image' => [
                'class' => 'rico\yii2images\behaviors\ImageBehave',
            ]
        ];
    }

    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {

            $params = array(
                'geocode' => $this->city->name . ' ' . $this->street->name . ' ' . $this->h_number, // адрес
                'format'  => 'json',                          // формат ответа
                'results' => 1,                               // количество выводимых результатов
                'key'     => '9a4f2120-1c2a-486b-a676-a412ff5345c3',                           // ваш api key
            );
            $response = json_decode(file_get_contents('http://geocode-maps.yandex.ru/1.x/?'.http_build_query($params, '', '&')));

            if ($response->response->GeoObjectCollection->metaDataProperty->GeocoderResponseMetaData->found > 0)
            {
                $coordinates = $response->response->GeoObjectCollection->featureMember[0]->GeoObject->Point->pos;
                $newCoordinates = explode(' ' , $coordinates);

                $this->latitude = $newCoordinates[1];
                $this->longitude = $newCoordinates[0];

//                echo "<br>";
//                echo $newCoordinates[1];
//                echo "<br>";
//                echo $newCoordinates[0];

            }
            else
            {
                echo 'Ничего не найдено';
            }

            return true;
        }
        return false;
    }

    public static function tableName()
    {
        return 'product';
    }

    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }

    public function getStreet(){
        return $this->hasOne(Street::className(), ['id' => 'street_id']);
    }

    public function getCity(){
        return $this->hasOne(City::className(), ['id' => 'city_id']);
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['category_id', 'name','price','is_checked'], 'required'],
            [['category_id','street_id','city_id'], 'integer'],
            [['content', 'hit', 'new', 'h_number'], 'string'],
            [['price', 'square', 'code', 'phone', 'floor', 'rooms', 'latitude', 'longitude'], 'number'],
            [['name', 'keywords', 'description', 'img', 'contact', 'h_condition',], 'string', 'max' => 255],
            [['image'], 'file', 'extensions' => 'png, jpg'],
            [['gallery'], 'file', 'extensions' => 'png, jpg', 'maxFiles' => 10],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID товара',
            'category_id' => 'Категория',
            'name' => 'Наименование',
            'content' => 'Контент',
            'price' => 'Цена',
            'keywords' => 'Ключевые слова',
            'description' => 'Мета-описание',
            'image' => 'Фото',
            'gallery' => 'Галлерея',
            'hit' => 'Вид на море',
            'new' => 'Отопление',
            'square' => 'Площадь',
            'code' => 'Артикул',
            'contact' => 'Контакт',
            'phone' => 'Тел',
            'floor' => 'Этаж',
            'h_number' => '№ дома',
            'rooms' => 'Комнат',
            'h_condition' => 'Состояние',
            'latitude' => 'Широта',
            'longitude' => 'Долгота',
            'street_id' => 'Улица',
            'city_id' => 'Город',
            'is_checked' => 'Публикация'
        ];
    }

    public function upload()
    {
        if($this->validate()){
            $path = 'upload/store/' . $this->image->baseName . '.' . $this->image->extension;
            $this->image->saveAs($path);
            $this->attachImage($path, true);
            @unlink($path);
            return true;
        }else{
            return false;
        }
    }

    public function uploadGallery()
    {
        if($this->validate()){
            foreach($this->gallery as $file){
                $path = 'upload/store/' . $file->baseName . '.' . $file->extension;
                $file->saveAs($path);
                $this->attachImage($path);
                @unlink($path);
            }
            return true;
        }else{
            return false;
        }
    }
}
