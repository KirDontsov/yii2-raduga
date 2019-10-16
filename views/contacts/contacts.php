<?php
/* @var $this yii\web\View */
use yii\helpers\Url;

?>

<div class="wrapper wrapper__contacts" id="wrapper">

	<div class="section__one" id="sectionOne">
		<div class="container_contacts">
      <div class="col">

          <div class="header_contacts">
            <h1 class="title title__one">Контакты</h1>
            <p class="info">Lorem ipsum dolor sit amet consectetur adipisicing elit. 
              Exercitationem vel tempore, nobis quisquam et necessitatibus alias enim, aliquid officiis veritatis aut. 
              Nemo quisquam perspiciatis voluptate earum aperiam, omnis voluptas voluptatum.</p>
          </div>
          
          <div class="contacts">
            <a href="" class="phone">+7 (903) 455-39-41</a>
            <p class="address">г. Геленджик, ул. Первомайская, 61, 4 этаж, офис 404</p>
            <a href="" class="email">an_raduga@mail.ru</a>
          </div>

      </div><!-- col -->
      <div class="col">
      <iframe id="map" src="https://yandex.ru/map-widget/v1/?um=constructor%3A5891c2586193baae987ae49a0c2b62654f4816f0663d8ac3a163e9c1ffe96c23&amp;source=constructor" width="100%" height="600" frameborder="0"></iframe>
      </div>
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

    <form action="" class="container_contacts form__container">
        <div class="col">
          <h2 class="title">Ответим на все Ваши вопросы</h2>
          <input type="text" placeholder="Имя">
          <input type="text" placeholder="Телефон"></div>
        <div class="col">
          <p class="info">Вопрос:</p>
          <textarea name="" id="" cols="30" rows="10" style="background:#ffffff!important;"></textarea>
          <button class="btn">Отправить</button>
        
        </div>
    </form>
		
	</section>

</div> <!-- wrapper -->
