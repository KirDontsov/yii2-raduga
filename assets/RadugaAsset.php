<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class RadugaAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/font-awesome.min.css',
        'css/prettyPhoto.css',
        'css/price-range.css',
        'css/animate.css',
        'css/main.css',
        'css/responsive.css',
        'css/raduga.css',
    ];
    public $js = [
        'js/jquery.scrollUp.min.js',
        'js/jquery.prettyPhoto.js',
        'js/main.js',
        'js/raduga.js',
        'https://cdnjs.cloudflare.com/ajax/libs/gsap/1.17.0/TweenMax.min.js',
        'https://hammerjs.github.io/dist/hammer.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapPluginAsset',
    ];
}
