<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Category;
use app\modules\admin\models\Street;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\ProductSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Объекты';
$this->params['breadcrumbs'][] = $this->title;?>

<div class="product-index box box-primary">
    <div class="box-header with-border">
        <?= Html::a('Добавить Объект', ['create'], ['class' => 'btn btn-success btn-flat']) ?>
        <?= Html::button('Фильтры',['class' => 'btn btn-primary btn-flat filters']) ?>
        <?= Html::a('Список для печати', ['print/view'], ['class' => 'btn btn-primary btn-flat print']) ?>
    </div>
    <div class="box-body table-responsive no-padding">
        <?php echo $this->render('_search', ['model' => $searchModel]); ?>
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

//            'id',
//            'category_id',
                [
                    'attribute' => 'image',
                    'value' => function($model)
                    {
                        $img = $model->getImage();
                        return "<img width='50' src='{$img->getUrl()}'>";
                    },
                    'format' => 'html',
                ],
                [
                    'attribute' => 'category_id',
                    'value' => function($data){
                        return $data->category->name;
                    },
                    'filter' => ArrayHelper::map(Category::find()->all(), 'id', 'name' ),
                ],
                'name',
//            'content:ntext',
                [
                    'attribute' => 'price',
                ],
                [
                    'attribute' => 'hit',
                    'value' => function($data){
                        return !$data->hit ? '<span class="text-success">Да</span>' : '<span class="text-danger">Нет</span>';
                    },
                    'format' => 'html',
                    'filter' => [
                        '0' => 'Вид на море',
                        '1' => 'Вид на горы'
                    ],
                ],
                [
                    'attribute' => 'new',
                    'value' => function($data){
                        return !$data->new ? '<span class="text-success">Центральное</span>' : '<span class="text-danger">Автономное</span>';
                    },
                    'format' => 'html',
                ],
                [
                    'attribute' => 'square',
                    'value' => function($product)
                    {
                        return $product->square . ' м²';
                    },
                    'format' => 'html',
                ],
                'code',
                'contact',
                'phone',
                'floor',
                'rooms',
                'h_condition',
//                'street_id',
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
                [
                    'attribute' => 'is_checked',
                    'value' => function($product)
                    {
                        return $product->is_checked ? '<span class="text-success">Да</span>' : '<span class="text-danger">Нет</span>';
                    },
                    'format' => 'html',
                ],
                // 'keywords',
                // 'description',
                // 'sale',

                [
                    'class' => 'yii\grid\ActionColumn',
                    'template' => '{view} {update} {delete} {add}',
                    'header'=>'Действия',
                    'headerOptions' => ['width' => '90'],
                    'buttons' => [
                        'add' => function ($url,$product) {
                            $url = Url::to(['print/add', 'id' => $product->id]);
                            return Html::a('<span data-id="'.$product->id.'" class="fa fa-circle-thin check"></span>', $url);
                        },
                    ],
                ],
            ],
        ]); ?>
    </div>
</div>


