<?php
use yii\helpers\Url;
?>
<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="/images/index/logo.png" class="img" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <p>Недвижимость</p>
            </div>
        </div>

        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
                'items' => [
                    ['label' => 'Меню', 'options' => ['class' => 'header']],
                    [
                        'label' => 'Объекты',
                        'icon' => 'file-code-o',
                        'url' => '',
                        'items' => [
                            ['label' => 'Список объектов', 'icon' => 'file-code-o', 'url' => ['/admin/product/index'],],
                            ['label' => 'Добавить объект', 'icon' => 'dashboard', 'url' => ['/admin/product/create'],],
                        ],
                    ],
                    [
                        'label' => 'Категории',
                        'icon' => 'file-code-o',
                        'url' => '',
                        'items' => [
                            ['label' => 'Список категорий', 'icon' => 'file-code-o', 'url' => ['/admin/category/index'],],
                            ['label' => 'Добавить категорию', 'icon' => 'dashboard', 'url' => ['/admin/category/create'],],
                        ],
                    ],
                    ['label' => 'Блог', 'icon' => 'file-code-o', 'url' => ['/admin/blog-category/index'],],
                    ['label' => 'Статьи', 'icon' => 'file-code-o', 'url' => ['/admin/article/index'],],
                    [
                        'label' => 'Города',
                        'icon' => 'file-code-o',
                        'url' => '',
                        'items' => [
                            ['label' => 'Список городов', 'icon' => 'file-code-o', 'url' => ['/admin/city/index'],],
                            ['label' => 'Список улиц', 'icon' => 'dashboard', 'url' => ['/admin/street/index'],],
                        ],
                    ],

                ],
            ]
        ) ?>

    </section>

</aside>
