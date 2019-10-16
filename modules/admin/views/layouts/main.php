<?php

use yii\bootstrap\Modal;
use yii\helpers\Html;
use app\assets\AdminAsset;
/* @var $this \yii\web\View */
/* @var $content string */


if (Yii::$app->controller->action->id === 'login') { 
/**
 * Do not use this code in your template. Remove it. 
 * Instead, use the code  $this->layout = '//main-login'; in your controller.
 */
    echo $this->render(
        'main-login',
        ['content' => $content]
    );
} else {
    dmstr\web\AdminLteAsset::register($this);
    AdminAsset::register($this);
    $directoryAsset = Yii::$app->assetManager->getPublishedUrl('@vendor/almasaeed2010/adminlte/dist');
    ?>

    <?php $this->beginPage() ?>
    <!DOCTYPE html>
    <html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
    </head>
    <body class="hold-transition skin-blue sidebar-mini">
    <?php $this->beginBody() ?>

    <div class="wrapper admin">

        <?= $this->render(
            'header.php',
            ['directoryAsset' => $directoryAsset]
        ) ?>

        <?= $this->render(
            'left.php',
            ['directoryAsset' => $directoryAsset]
        )
        ?>

        <?= $this->render(
            'content.php',
            ['content' => $content, 'directoryAsset' => $directoryAsset]
        ) ?>

        <?php
            Modal::begin([
                'header' => '<h2>Список на печать</h2>',
                'id' => 'print',
                'size' => 'modal-lg',
                'footer' => '
            <button type="button" class="btn btn-default" data-dismiss="modal">Продолжить выбор</button>
            <button type="button" class="btn btn-success clear-print" onClick="Print(\'printList\');">Печать</button>
            <button type="button" class="btn btn-danger clear-print" onclick="clearPrint()">Очистить список</button>
            '
            ]);

            Modal::end();
        ?>

    </div>


    <?php $this->endBody() ?>
    </body>
    </html>
    <?php $this->endPage() ?>
<?php } ?>
