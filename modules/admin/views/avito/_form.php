<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\AvitoParser */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="avito-parser-form box box-primary">
    <?php $form = ActiveForm::begin(); ?>
    <div class="box-body table-responsive">

        <?= $form->field($model, 'id')->textInput() ?>

        <?= $form->field($model, 'external_id')->textInput() ?>

        <?= $form->field($model, 'name')->textInput() ?>

        <?= $form->field($model, 'city_id')->textInput() ?>

        <?= $form->field($model, 'category_id')->textInput() ?>

        <?= $form->field($model, 'address')->textInput() ?>

        <?= $form->field($model, 'date')->textInput() ?>

        <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'price')->textInput() ?>

        <?= $form->field($model, 'url')->textInput() ?>

        <?= $form->field($model, 'latitude')->textInput() ?>

        <?= $form->field($model, 'longitude')->textInput() ?>

        <?= $form->field($model, 'image')->textInput() ?>

        <?= $form->field($model, 'people_name')->textInput() ?>

        <?= $form->field($model, 'people_phone')->textInput() ?>

        <?= $form->field($model, 'created_at')->textInput() ?>

        <?= $form->field($model, 'updated_at')->textInput() ?>

        <?= $form->field($model, 'is_checked')->textInput() ?>

    </div>
    <div class="box-footer">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success btn-flat']) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>
