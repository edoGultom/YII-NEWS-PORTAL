<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        "css/bootstrap.css",
        // "plugins/revolution/css/settings.css",
        // "plugins/revolution/css/layers.css",
        // "plugins/revolution/css/navigation.css",
        "css/style.css",
        "css/responsive.css",
        "css/color-switcher-design.css",
        "css/color-themes/default-theme.css",
        "css/mystyle.css"
    ];
    public $js = [
        "plugins/revolution/js/jquery.themepunch.revolution.min.js",
        "plugins/revolution/js/jquery.themepunch.tools.min.js",
        "plugins/revolution/js/extensions/revolution.extension.actions.min.js",
        "plugins/revolution/js/extensions/revolution.extension.carousel.min.js",
        "plugins/revolution/js/extensions/revolution.extension.kenburn.min.js",
        "plugins/revolution/js/extensions/revolution.extension.layeranimation.min.js",
        "plugins/revolution/js/extensions/revolution.extension.migration.min.js",
        "plugins/revolution/js/extensions/revolution.extension.navigation.min.js",
        "plugins/revolution/js/extensions/revolution.extension.parallax.min.js",
        "plugins/revolution/js/extensions/revolution.extension.slideanims.min.js",
        "plugins/revolution/js/extensions/revolution.extension.video.min.js",
        "js/main-slider-script.js",
        "js/popper.min.js",
        "js/bootstrap.min.js",
        "js/owl.js",
        "js/plyr.min.js",
        "js/appear.js",
        "js/wow.js",
        "js/jquery.fancybox.js",
        "js/jquery.mCustomScrollbar.concat.min.js",
        "js/script.js",
        "js/color-settings.js",
        // 'js/map-script.js'

    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}