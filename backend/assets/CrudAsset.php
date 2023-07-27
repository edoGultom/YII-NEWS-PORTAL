<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * @author John Martin <john.itvn@gmail.com>
 * @since 1.0
 */
class CrudAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'lib/assetstemplate/crudasset/ajaxcrud.css'
    ];
    public $js = [
        'lib/assetstemplate/crudasset/ModalRemote.js',
        'lib/assetstemplate/crudasset/ajaxcrud.min.js',

    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap4\BootstrapAsset',
        'yii\bootstrap4\BootstrapPluginAsset',
        'kartik\grid\GridViewAsset',
    ];
}
