<?php
return [
    'language' => 'id-ID',
    'timeZone' => 'Asia/Jakarta',
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'authManager' => [
            'class' => 'yii\rbac\DbManager', // only support DbManager
        ],
        'Visitor' => [
            'class' => 'common\components\Visitor'
        ],
        'Template' => [
            'class' => 'common\components\Template'
        ],
        'api' => [
            'class' => 'common\components\Api',
        ],
        'formatter' => [
            'dateFormat' => 'dd.MM.yyyy',
            'decimalSeparator' => ',',
            'thousandSeparator' => ' ',
            'currencyCode' => 'EUR',
        ],
        'i18n' => [
            'translations' => [
                'kvgrid*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@common/messages', // if advanced application, set @frontend/messages
                    'sourceLanguage' => 'id-ID',
                    'fileMap' => [
                        'kvgrid' => 'kvgrid.php',
                    ],
                ],
            ],
        ],
    ],
    'modules' => [
        'gridview' =>  [
            'class' => '\kartik\grid\Module'
        ],
        'generators' => [
            'crud'   => [
                'class' => 'common\generators_new\Generator',
            ],
            'crud1'   => [
                'class' => 'common\generators\Generator',
            ],
        ],
        'mimin' => [
            'class' => '\hscstudio\mimin\Module',
        ],
    ],
    'controllerMap' => [
        'file' => 'mdm\upload\FileController', // use to show or download file
    ],
];
