<?php

use yii\helpers\Url;

?>

<div class="wrapper wrapper__index" id="wrapper">
  <section class="section section__one" id="sectionOne">
    <div class="header">
      <h1 class="title title__one">
        Поможем подобрать жилье Вашей мечты!
      </h1>
    </div>

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

    <div data-offset="20" class="flomaster parallax"></div>
    <div data-offset="50" class="skittles parallax"></div>
    <div data-offset="-100" class="marker parallax"></div>
    <div data-offset="-10" data-offset="350" class="chip parallax"></div>
    <div class="hand"></div>
    <div data-offset="50" class="pencil parallax"></div>
    <div data-offset="-70" class="candy parallax"></div>

    <a href="<?= Url::to(['category/all']) ?>" class="btn">
      Поиск
      <div class="square">
        <div class="line"></div>
      </div>
    </a>
  </section>
</div>
<!-- wrapper -->