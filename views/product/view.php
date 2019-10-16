<?php

/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\helpers\Url;
use app\modules\admin\models\City;
use app\modules\admin\models\Street;
?>

<div class="intro-wrapper">
    <div class="intro-line"></div>
</div>

<div class="nav">
    <a class="logo" href="<?= \yii\helpers\Url::home()?>"></a>
    <a class="link nav__link one" href="#">услуги <i class="fa fa-caret-down"></i></a>
    <a class="link nav__link" href="<?= \yii\helpers\Url::to(['/category/all'])?>">объекты</a>
    <a class="link nav__link" href="#">контакты</a>
    <a href="<?= \yii\helpers\Url::to(['/admin'])?>" target="_blank" class="link nav__link"><i class="fa fa-lock"></i> вход</a>
</div>


<section class="wrapper shop wrapper_other">

<div class="appearing__obj">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1499.4 1612">
        <path
          id="cls-2"
          d="M1499.4,0V1612H56.51C32.14,1459,159.72,1265.54,165,1070,174.64,718,12.44,660,.54,396-9,185.22,110.24,47.11,158.68,0Z"
        />
      </svg>
    </div>

    <div class="nav">
      <a href="#" class="link link__one">Поиск</a>
      <a href="#" class="link link__two">О Нас</a>
      <a href="<?= Url::to(['contacts/contacts']) ?>" class="link link__three">Контакты</a>
      <a href="#" class="link link__four">Блог</a>
    </div>
    <div class="waves"></div>

<div class="container product">
<div class="row">

<?php
$mainImg = $product->getImage();
$gallery = $product->getImages();
?>

<div class="col-sm-12 padding-right">
<div class="product-details"><!--product-details-->
    <div class="col-sm-5">
        <div class="view-product">
            <?= Html::img($mainImg->getUrl(), ['alt' => $product->name, 'class' => 'product__img'])?>
            <h3>ZOOM</h3>
        </div>

        <div id="similar-product" class="carousel slide" data-ride="carousel">

            <!-- Wrapper for slides -->
            <div class="carousel-inner">
                <?php $count = count($gallery); $i = 0; foreach($gallery as $img): ?>
                    <?php if($i % 3 == 0):?>
                        <div class="item <?php if($i == 0) echo ' active'?>">
                    <?php endif;?>
                    <?= Html::img($img->getUrl(), ['alt' => $product->name])?>
                    <?php $i++; if($i % 3 == 0 || $i == $count):?>
                        </div>
                    <?php endif;?>
                <?php endforeach;?>

            </div>

            <!-- Controls -->
            <a class="left item-control" href="#similar-product" data-slide="prev">
                <i class="fa fa-angle-left"></i>
            </a>
            <a class="right item-control" href="#similar-product" data-slide="next">
                <i class="fa fa-angle-right"></i>
            </a>
        </div>

    </div>
    <div class="col-sm-7">
        <div class="product-information"><!--/product-information-->
            <a href="<?= Url::to(['cart/add', 'id' => $product->id])?>" data-id="<?= $product->id?>" class="btn btn-default cart">
                Оставить заявку
            </a>
            <h2><?= $product->name?></h2>
            <p>Артикул: <?= $product->code ?></p>
                <span>
                    <?= $product->price?> руб.
                </span>
            <p><b>Категория: </b> <a href="<?= Url::to(['category/view', 'id' => $product->category->id]) ?>"><?= $product->category->name?></a></p>
            <p><b>Кол-во комнат: </b> <?= $product->rooms ?> </p>
            <p><b>Площадь: </b> <?= $product->square ?> </p>
            <p><b>Адрес: </b> <?= (!$product->street_id ? null : $product->street->name)  . ' ' . $product->h_number ?> </p>
            <p><b>Этаж: </b> <?= $product->floor ?> </p>
            <p><b>Состояние: </b> <?= $product->h_condition ?> </p>
            <p><b>Отопление: </b> <?php if($product->new == 0) { echo 'автономное'; } else {echo 'центральное';} ?></p>
            <p><b>Вид на море: </b> <?php if($product->hit == 0) { echo 'Да'; } else {echo 'Нет';} ?></p>
            <?= $product->content ?>

            <div id="map" style="width:100%;height: 500px;"></div>

        </div><!--/product-information-->
    </div>
</div><!--/product-details-->
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
                center: [<?php echo $product->latitude . ', ' . $product->longitude ?>], // Москва
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
</div>
</section>
