<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\Articleearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Articles';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="article-index box box-primary">
    <div class="box-header with-border">
        <?= Html::a('Create Article', ['create'], ['class' => 'btn btn-success btn-flat']) ?>
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
                'title',
                'description:ntext',
//                'content:html',
                'date',
//                 'image',
                [
                    'attribute' => 'image',
                    'value' => function($model)
                    {
                        $img = $model->getImage();
                        return "<img width='60' src='{$img->getUrl()}'>";
                    },
                    'format' => 'html',
                ],
//                'tag',
                // 'viewed',
                // 'user_id',
                // 'status',
                // 'category_id',

                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>
    </div>
</div>
