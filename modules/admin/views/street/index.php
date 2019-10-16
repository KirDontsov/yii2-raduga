<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\StreetSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Streets';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="street-index box box-primary">
    <?php Pjax::begin(); ?>
    <div class="box-header with-border">
        <?= Html::a('Добавить улицу', ['create'], ['class' => 'btn btn-success btn-flat']) ?>
    </div>
    <div class="box-body table-responsive no-padding">
        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'layout' => "{items}\n{summary}\n{pager}",
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'id',
//                'city_id',
//                'city.name',
                [
                   'attribute' => 'city_id',
                   'value' => function($model)
                   {
                        return $model->city->name;
                   },
                   'filter' => \yii\helpers\ArrayHelper::map(\app\modules\admin\models\City::find()->all(),'id','name')
                ],
                'name',
                'slug',

                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>
    </div>
    <?php Pjax::end(); ?>
</div>
