<?php

use app\modules\admin\models\City;
use app\modules\admin\models\Street;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\web\YiiAsset;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Product */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Товары', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
YiiAsset::register($this);
?>
<div class="product-view box box-primary">
    <div class="box-header">

        <?= Html::a('Редактировать', ['update', 'id' => $model->id], ['class' => 'btn btn-primary btn-flat']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger btn-flat',
            'data' => [
                'confirm' => 'Вы уверены что хотите удалить этот объект?',
                'method' => 'post',
            ],
        ]) ?>
    </div>
    <div class="box-body table-responsive no-padding">
        <?php $img = $model->getImage(); ?>
        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                [
                    'attribute' => 'is_checked',
                    'value' =>  function($product) {
                        if($product->is_checked == 0)
                        {
                            return '<span class="text-danger">Нет</span>';
                        } else
                        {
                            return '<span class="text-success">Да</span>';
                        }
                    } ,
                    'format' => 'html',
                ],
                'id',
                'category_id',
                'name',
                'content:html',
                'price',
                [
                    'attribute' => 'image',
                    'value' => "<img width='200' src='{$img->getUrl()}'>",
                    'format' => 'html',
                ],
                [
                    'attribute' => 'gallery',
                    'label' => 'Галлерея',
                    'value' => function($model){
                        $gallery = $model->getImages();
                        $count = count($gallery);
                        $g = '';
                        foreach($gallery as $i => $img):
                        $g .= '<div class="col-sm-2">' . Html::img($img->getUrl(), ['alt' => $model->name, 'class' => 'img-responsive']);
                        $g .= Html::a('х', ['del-image', 'id' => $img->id],['class'=> 'btn btn-danger btn-flat btn-del']) . '</div>';
                        endforeach;
                        return $g;
                    },
                    'format' => 'html',
                ],
                [
                    'attribute' => 'hit',
                    'value' =>  function($product) {
                        if($product->hit == 0)
                        {
                            return '<span class="text-success">Да</span>';
                        } else
                        {
                            return '<span class="text-danger">Нет</span>';
                        }
                    } ,
                    'format' => 'html',
                ],
                [
                    'attribute' => 'new',
                    'value' =>  function($product) {
                        if($product->new == 0)
                        {
                            return 'Центральное';
                        } else
                        {
                            return 'Автономное';
                        }
                    } ,
                    'format' => 'html',
                ],
                [
                    'attribute' => 'square',
                    'value' => function($product){
                        return $product->square . ' м²';
                    },
                    'format' => 'html',
                ],
                'code',
                'contact',
                'phone',
                'floor',
                [
                    'attribute' => 'city_id',
                    'value' => function($product)
                    {
                        if(!$product->city_id)
                        {
                            return null;
                        }
                        return $product->city->name;
                    },
                    'filter' => ArrayHelper::map(City::find()->all(), 'id', 'name' )
                ],
                [
                    'attribute' => 'street_id',
                    'value' => function($product)
                    {
                        if(!$product->street_id)
                        {
                            return null;
                        }
                        return $product->street->name;
                    },
                    'filter' => ArrayHelper::map(Street::find()->all(), 'id', 'name' )
                ],
                'h_number',
                'rooms',
                'h_condition',
                'keywords',
                'description',
                [
                    'label' => 'Карта',
                    'value' => '<div id="map" style="width: 100%;height: 500px;"></div>',
                    'format' => 'raw'
                ],
            ],
        ]) ?>
        <script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU&amp;apikey=9a4f2120-1c2a-486b-a676-a412ff5345c3" type="text/javascript"></script>
        <script>
            var myMap;

            // Дождёмся загрузки API и готовности DOM.
            ymaps.ready(init);

            function init () {
                // Создание экземпляра карты и его привязка к контейнеру с
                // заданным id ("map").
                myMap = new ymaps.Map('map', {
                    // При инициализации карты обязательно нужно указать
                    // её центр и коэффициент масштабирования.
                    center: [<?php echo $model->latitude . ', ' . $model->longitude ?>], // Москва
                    zoom: 10
                }, {
                    searchControlProvider: 'yandex#search'
                });

                var myPlacemark = new ymaps.Placemark(myMap.getCenter(), {
                }, {
                    preset: 'islands#redDotIcon'
                });

                myMap.geoObjects.add(myPlacemark);

            }
        </script>
    </div>
</div>
