<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/site.css',
        'css/bootstrap.min.cs',
        'css/gallery-website.css',
        'lush/css/lush.animations.min.css',
        'lush/css/lush.min.css',
        'lush/flexslider/flexslider.css',
        'css/slider-style.css',

        
    ];

    public $js = [
        'js/jquery-1.8.3.min.js',
        'lush/js/jquery.easing.1.3.min.js',
        'lush/js/jquery.lush.min.js',
        'lush/flexslider/jquery.flexslider-min.js',
        'js/bootstrap.min.js',
        'js/ie10-viewport-bug-workaround.js',
        'js/rucniJSZaSlider.js',

    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
