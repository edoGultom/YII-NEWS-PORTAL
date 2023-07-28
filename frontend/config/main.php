<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-frontend',
            'class' => 'common\components\Request',
            'web' => '/frontend/web',
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-frontend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the frontend
            'name' => 'advanced-frontend',
        ],
        'assetManager' => [
            'bundles' => [
                'yii\web\JqueryAsset' => [
                    'js' => ['/js/jquery.js']
                ],
                'yii\bootstrap\BootstrapAsset' => [
                    'css' => ['/css/bootstrap.css']
                ]
            ]
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                // 'artikel' => 'artikel/index',
                // 'artikel/index' => 'artikel/index',
                // 'artikel/berita' => 'artikel/berita',
                // 'artikel/kegiatan' => 'artikel/kegiatan',
                // 'artikel/ragaminfo-kesehatan' => 'artikel/ragaminfo-kesehatan',
                // 'artikel/archives' => 'artikel/archives',
                'news/<slug>' => 'news/slug',
                'defaultRoute' => '/site/index',

                'halaman' => 'halaman/index',
                'halaman/index' => 'halaman/index',
                'halaman/<slug>' => 'halaman/slug',
                'defaultRoute' => '/site/index',
            ],
        ],
    ],
    'params' => $params,
];
