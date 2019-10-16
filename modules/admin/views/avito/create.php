<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\AvitoParser */

$this->title = 'Create Avito Parser';
$this->params['breadcrumbs'][] = ['label' => 'Avito Parsers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="avito-parser-create">

    <?= $this->render('_form', [
    'model' => $model,
    ]) ?>

</div>
