<?php

use yii\helpers\Html;
use kartik\form\ActiveForm;
use kartik\field\FieldRange;
use yii\helpers\ArrayHelper;
use app\modules\admin\models\Street;
use app\modules\admin\models\City;

/* @var $this yii\web\View */
/* @var $model app\models\CategorySearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="category-search">

    <?php $form = ActiveForm::begin([
        'action' => ['all'],
        'method' => 'get'
    ]); ?>

    <?= $form->field($model, 'category_id')->label(false)
        ->dropDownList([
            '1' => 'Квартиры',
            '2' => 'Дома',
            '3' => 'Таунхаусы',
            '4' => 'Гостиницы',
            '5' => 'Земельные участки'
        ], ['prompt' => 'Выберите категорию'])
    ?>

    <?= $form->field($model, 'city_id')->input('text', ['placeholder' => "Выберите город"])->label(false)
        ->dropDownList(ArrayHelper::map(City::find()->all(),'id','name'), ['prompt' => 'Выберите город'])?>
    <?= $form->field($model, 'street_id')->input('text', ['placeholder' => "Выберите улицу"])->label(false)
        ->dropDownList(ArrayHelper::map(Street::find()->all(),'id','name'), ['prompt' => 'Выберите улицу'])?>

    
    <?= $form->field($model, 'square')->input('text', ['placeholder' => "Площадь"])->label(false) ?>
    <?= $form->field($model, 'floor')->input('text', ['placeholder' => "Этаж"])->label(false) ?>
    <?= $form->field($model, 'rooms')->label(false)
        ->dropDownList([
            '1' => 'Однокомнатные',
            '2' => 'Двухкомнатные',
            '3' => 'Трехкомнатные',
            '4' => 'Четырехкомнатные',
            '5' => 'Пять и более комнат'
        ], ['prompt' => 'Выберите кол-во комнат'])
    ?>
    <?= $form->field($model, 'h_condition')->input('text', ['placeholder' => "Состояние"])->label(false) ?>
    <?= $form->field($model, 'new')->label(false)
    ->dropDownList([
        '0' => 'Автономное',
        '1' => 'Центральное',
    ], ['prompt' => 'Отопление']) ?>
    <?= $form->field($model, 'hit')->label(false)
    ->dropDownList([
        '0' => 'Да',
        '1' => 'Нет',
    ], ['prompt' => 'Вид на море']) ?>
    <?=
        FieldRange::widget([
            'form' => $form,
            'model' => $model,
            'label' => 'Введите сумму "от" и "до"',
            'attribute1' => 'min_price',
            'attribute2' => 'max_price',
            'type' => FieldRange::INPUT_TEXT,
            'separator' => '',
        ]);
    ?>


    <div class="form-group">
        <?= Html::submitButton('Найти', ['class' => 'btn add-to-cart']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
