<?php

/* @var $this yii\web\View */
use yii\helpers\Html;
use app\components\MenuWidget;
use yii\web\View;
use yii\widgets\LinkPager;
use yii\helpers\Url;

?>

<div class="intro-wrapper">
    <div class="intro-line"></div>
</div>

<div class="nav">
    <a class="logo" href="<?= Url::home()?>"></a>
    <a class="link nav__link one" href="#">услуги <i class="fa fa-caret-down"></i></a>
    <a class="link nav__link" href="<?= Url::to(['/category/all'])?>">объекты</a>
    <a class="link nav__link" href="#">контакты</a>
    <a href="<?= Url::to(['/admin'])?>" target="_blank" class="link nav__link"><i class="fa fa-lock"></i> вход</a>
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

    <div class="container margin__top">
        <div class="right-sidebar">

            <ul class="catalog category-products">
                <form class="search_q" method="get" action="<?= Url::to(['category/search']) ?>">
                    <input class="search__q__input" type="text" placeholder="Поиск" name="q">
                </form>
                <?php echo $this->render('_search', ['model' => $searchModel]); ?>
            </ul>

        </div>
        <div class="col-sm-9 padding-right">

            <div class="features_items">
                <?php if(!empty($products)): ?>
                    <?php $i = 0; foreach($products as $product): ?>
                        <?php if($product->is_checked == true ): ?>

                        <?php $mainImg = $product->getImage();?>
                        <div class="col-sm-12">

                            <div class="product">
                                <a href="<?= Url::to(['product/view', 'id' => $product->id]) ?>">
                                    <?= Html::img($mainImg->getUrl(), ['alt' => $product->name])?>
                                </a>
                            </div>

                            <div class="productinfo">
                                <h2 class="price"><?= $product->price?> руб.</h2>
                                <p class="title"><?= $product->name?></p>
                                <hr class="hr">
                                <div class="poduct__properties">
                                    <p class="property view"><?php if($product->hit == 0) { echo 'Вид на море'; } else {echo '';} ?></p>
                                    <p class="property heating"><?php if($product->new == 0) { echo 'Отопление: автономное'; } else {echo 'Отопление: центральное';} ?></p>
                                    <p class="property square"><?= $product->square . ' м²' ?></p>
                                    <p class="property rooms"><?= $product->rooms . ' комнаты' ?></p>
                                </div>
                                <a href="<?= Url::to(['product/view', 'id' => $product->id]) ?>" data-id="<?= $product->id?>" class="btn btn-default add-to-cart">Подробнее</a>
                            </div>

                        </div>

                        <?php endif;?>
                    <?php endforeach;?>
                    <div class="clearfix"></div>
                    <?php
                    echo LinkPager::widget([
                        'pagination' => $pages,
                    ]);
                    ?>
                <?php else :?>
                    <h2>Здесь пока нет объектов...</h2>
                <?php endif;?>
            </div>
            <!--features_items-->
        </div>
    </div>
</section>