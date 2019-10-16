<?php

use mihaildev\elfinder\Assets;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use mihaildev\ckeditor\CKEditor;
use mihaildev\elfinder\ElFinder;
mihaildev\elfinder\Assets::noConflict($this);

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Product */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="product-form box box-primary">
    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
    <div class="box-body table-responsive">

        <?= $form->field($model, 'is_checked')->checkbox() ?>

        <div class="form-group field-product-category_id has-success">
            <label class="control-label" for="product-category_id">Родительская категория</label>
            <select id="product-category_id" class="form-control" name="Product[category_id]">
                <?= \app\components\MenuWidget::widget(['tpl' => 'select_product', 'model' => $model])?>
            </select>
        </div>

        <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

        <?=
                $form->field($model, 'content')->widget(CKEditor::className(),[
                    'editorOptions' => [
                        'preset' => 'full', //разработанны стандартные настройки basic, standard, full данную возможность не обязательно использовать
                        'inline' => false, //по умолчанию false
                    ],
                ]);
        $form->field($model, 'content')->widget(CKEditor::className(), [
            'editorOptions' => ElFinder::ckeditorOptions('elfinder', [])
        ]);

        ?>

        <?= $form->field($model, 'price')->textInput() ?>

        <?= $form->field($model, 'keywords')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'image')->fileInput() ?>

        <?= $form->field($model, 'gallery[]')->fileInput(['multiple' => true, 'accept' => 'image/*']) ?>

        <?= $form->field($model, 'hit')->checkbox([ '0', '1', ]) ?>

        <?= $form->field($model, 'new')->dropDownList([ 'автономное', 'центральное', ]) ?>

        <?= $form->field($model, 'square')->textInput() ?>

        <?= $form->field($model, 'code')->textInput() ?>

        <?= $form->field($model, 'contact')->textInput() ?>

        <?= $form->field($model, 'phone')->textInput() ?>

        <?= $form->field($model, 'floor')->dropDownList([ '1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12', '13', '14', '15', '16' ]) ?>

        <?= $form->field($model, 'city_id')->dropDownList(\yii\helpers\ArrayHelper::map(\app\modules\admin\models\City::find()->all(),'id','name')) ?>

        <?= $form->field($model, 'street_id')->dropDownList(\yii\helpers\ArrayHelper::map(\app\modules\admin\models\Street::find()->all(),'id','name')) ?>

        <?= $form->field($model, 'h_number')->textInput() ?>

        <?= $form->field($model, 'rooms')->dropDownList([ '1', '2', '3', '4', '5 и более', ]) ?>

        <?= $form->field($model, 'h_condition')->textInput() ?>

    </div>
    <div class="box-footer">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success btn-flat']) ?>
    </div>
    <?php ActiveForm::end(); ?>
<!--    --><?php
//        $params = array(
//            'geocode' => 'Геленджик' . ' ' . $product->street_id->name . ' ' . $product->h_number, // адрес
//            'format'  => 'json',                          // формат ответа
//            'results' => 1,                               // количество выводимых результатов
//            'key'     => '9a4f2120-1c2a-486b-a676-a412ff5345c3',                           // ваш api key
//        );
//        $response = json_decode(file_get_contents('http://geocode-maps.yandex.ru/1.x/?'.http_build_query($params, '', '&')));
//
//        if ($response->response->GeoObjectCollection->metaDataProperty->GeocoderResponseMetaData->found > 0)
//        {
//            $coordinates = $response->response->GeoObjectCollection->featureMember[0]->GeoObject->Point->pos;
//            $newCoordinates = explode(' ' , $coordinates);
//
//
//
//            echo "<br>";
//            echo $newCoordinates[1];
//            echo "<br>";
//            echo $newCoordinates[0];
//
//        }
//        else
//        {
//            echo 'Ничего не найдено';
//        }
//    ?>
</div>
