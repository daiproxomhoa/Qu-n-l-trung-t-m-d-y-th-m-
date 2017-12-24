<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot/';
    public $baseUrl = '@web';
    public $css = [
        'css/site.css',
        'css/tooplate-style.css',
        'css/bootstrap.css',
        'css/bootstrap-theme.css',
        'css/forntAwesome.css',
        'css/hero-slider.css',

    ];
    public $js = [
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
