<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\BlogCategory */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Blog Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="blog-category-view box box-primary">
    <div class="box-header">
        <?= Html::a('Редактировать', ['update', 'id' => $model->id], ['class' => 'btn btn-primary btn-flat']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger btn-flat',
            'data' => [
                'confirm' => 'Вы уверены что хотите удалить эту категорию?',
                'method' => 'post',
            ],
        ]) ?>
    </div>
    <div class="box-body table-responsive no-padding">
        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                'id',
                'title',
            ],
        ]) ?>
    </div>
</div>
