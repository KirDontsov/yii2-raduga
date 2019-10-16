<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Вход';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="intro-wrapper">
    <div class="intro-line"></div>
</div>

<div class="nav">
    <a class="logo" href="<?= \yii\helpers\Url::home()?>"></a>
    <a class="link nav__link one" href="#">услуги <i class="fa fa-caret-down"></i></a>
    <a class="link nav__link" href="<?= \yii\helpers\Url::to(['/category/all'])?>">объекты</a>
    <a class="link nav__link" href="#">контакты</a>
    <a href="<?= \yii\helpers\Url::to(['/admin'])?>" target="_blank" class="link nav__link"><i class="fa fa-lock"></i> вход</a>
</div>

<div class="site-login container">
    <h1><?= Html::encode($this->title) ?></h1>
    <br>

    <?php $form = ActiveForm::begin([
        'id' => 'login-form',
        'options' => ['class' => 'form-horizontal'],
        'fieldConfig' => [
            'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
            'labelOptions' => ['class' => 'col-lg-1 control-label'],
        ],
    ]); ?>

<!--    Yii::$app->getSecurity()->generatePasswordHash('x0XKIRX0xxal10x1') -->

        <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

        <?= $form->field($model, 'password')->passwordInput() ?>

        <?= $form->field($model, 'rememberMe')->checkbox([
            'template' => "<div class=\"col-lg-offset-1 col-lg-3\">{input} {label}</div>\n<div class=\"col-lg-8\">{error}</div>",
        ]) ?>

        <div class="form-group">
            <div class="col-lg-offset-1 col-lg-11">
                <?= Html::submitButton('Войти', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
            </div>
        </div>

    <?php ActiveForm::end(); ?>

</div>
