<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\AvitoParser */

$this->title = 'Update Avito Parser: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Avito Parsers', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id_pk]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="avito-parser-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
