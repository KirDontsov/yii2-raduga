<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\AvitoParser */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Avito Parsers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="avito-parser-view box box-primary">
    <div class="box-header">
        <?= Html::a('Update', ['update', 'id' => $model->id_pk], ['class' => 'btn btn-primary btn-flat']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_pk], [
            'class' => 'btn btn-danger btn-flat',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </div>
    <div class="box-body table-responsive no-padding">
        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                'id_pk',
                'id',
                'external_id',
                'name',
                'city_id',
                'category_id',
                'address',
                'date',
                'description',
                'price',
                'url:url',
                'latitude',
                'longitude',
                'image',
                'people_name',
                'people_phone',
                'created_at:datetime',
                'updated_at:datetime',
                'is_checked',
            ],
        ]) ?>
    </div>
</div>
