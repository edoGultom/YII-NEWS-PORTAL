<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        // 'bootstrap/css/bootstrap.min.css',
        'lib/chocolat/dist/css/chocolat.css',
        'lib/summernote/summernote-bs4.css',
        'css/style.css',
        'css/components.css',
        'css/mystyles.css',
        'css/custom.css',
        'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css',
    ];
    public $js = [
        'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js',
        'https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js',
        'https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js',
        'https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js',
        'js/stisla.js',

        'lib/summernote/summernote-bs4.js',
        'lib/chocolat/dist/js/jquery.chocolat.min.js',
        'js/scripts.js',
        'js/custom.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap4\BootstrapAsset',
        // 'yii\web\JqueryAsset',
    ];
}
