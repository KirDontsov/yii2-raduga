<?php

use yii\helpers\Html;
use kartik\field\FieldRange;
use kartik\form\ActiveForm;
use app\modules\admin\models\Street;
use app\modules\admin\models\City;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\ProductSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="product-search">
    <div class="row">
        <?php $form = ActiveForm::begin([
            'action' => ['index'],
            'method' => 'get',
        ]); ?>
        <div class="col-md-4">
            <?= $form->field($model, 'category_id')
                ->dropDownList(ArrayHelper::map(\app\models\Category::find()->all(),'id','name'), ['prompt' => 'Выберите категорию'])?>
<!--            --><?//= $form->field($model, 'name') ?>
            <?= $form->field($model, 'city_id')
                ->dropDownList(ArrayHelper::map(City::find()->all(),'id','name'), ['prompt' => 'Выберите город'])?>
            <?= $form->field($model, 'street_id')
                ->dropDownList(ArrayHelper::map(Street::find()->all(),'id','name'), ['prompt' => 'Выберите улицу'])?>
            <?= $form->field($model, 'h_number') ?>


        </div>
        <div class="col-md-4">
            <?=
            FieldRange::widget([
                'form' => $form,
                'model' => $model,
                'label' => 'Введите сумму "от" и "до"',
                'attribute1' => 'min_price',
                'attribute2' => 'max_price',
                'type' => FieldRange::INPUT_TEXT,
                'separator' => '-',
            ]);
            ?>
            <?= $form->field($model, 'square') ?>
            <?= $form->field($model, 'code') ?>
            <?= $form->field($model, 'floor') ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'h_condition') ?>
            <?= $form->field($model, 'contact') ?>
            <?= $form->field($model, 'phone') ?>
            <?= $form->field($model, 'rooms')
                ->dropDownList([
                    '1' => 'Однокомнатные',
                    '2' => 'Двухкомнатные',
                    '3' => 'Трехкомнатные',
                    '4' => 'Четырехкомнатные',
                    '5' => 'Пять и более комнат'
                ], ['prompt' => 'Выберите кол-во комнат'])
            ?>
        </div>
    </div>








    <?php // echo $form->field($model, 'keywords') ?>

    <?php // echo $form->field($model, 'description') ?>

    <?php // echo $form->field($model, 'img') ?>

    <?php // echo $form->field($model, 'hit') ?>

    <?php // echo $form->field($model, 'new') ?>

    <?php // echo $form->field($model, 'sale') ?>

    <div class="form-group">
        <?= Html::submitButton('Поиск', ['class' => 'btn btn-success btn-flat']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
