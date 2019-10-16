<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Proxy */

$this->title = 'Update Proxy: ' . $model->id_pk;
$this->params['breadcrumbs'][] = ['label' => 'Proxies', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_pk, 'url' => ['view', 'id' => $model->id_pk]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="proxy-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
