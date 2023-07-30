<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-api',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'api\controllers',
    'bootstrap' => ['log'],
    // 'modules'=>[
    //     'oauth2' => [
    //         'class' => 'filsh\yii2\oauth2server\Module',            
    //         'tokenParamName' => 'accessToken',
    //         'tokenAccessLifetime' => 3600 * 24,
    //         'storageMap' => [
    //             'user_credentials' => 'api\models\UserApi',
    //         ],
    //         'grantTypes' => [
    //             'user_credentials' => [
    //                 'class' => 'OAuth2\GrantType\UserCredentials',
    //             ],
    //             'refresh_token' => [
    //                 'class' => 'OAuth2\GrantType\RefreshToken',
    //                 'always_issue_new_refresh_token' => true
    //             ]
    //         ],
    //         'components' => [
    //             'request' => function () {
    //                 return \filsh\yii2\oauth2server\Request::createFromGlobals();
    //             },
    //             'response' => [
    //                 'class' => \filsh\yii2\oauth2server\Response::class,
    //             ],
    //         ],
    //     ]
    // ],
    'components' => [
        // 'request' => [
        //     'csrfParam' => '_csrf-api',
        // ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-api', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the api
            'name' => 'advanced-api',
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
        'request'=>[
            'class' => 'common\components\Request',
            'web'=> '/api/web',
            'adminUrl' => '/api'
        ],
        'urlManager' => [
            // 'enablePrettyUrl' => true,
            // 'showScriptName' => false,
            // 'rules' => [
            //     'POST oauth2/<action:\w+>' => 'oauth2/rest/<action>',
            // ]
            'enablePrettyUrl' => true,
            'enableStrictParsing' => true,
            'showScriptName' => false,
            'rules' => [
                ['class' => 'yii\rest\UrlRule', 'controller' => 'dokumen'],
                ['class' => 'yii\rest\UrlRule', 'controller' => 'kota'],
            ],
        ],
        /*
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],
        */
    ],
    
    'params' => $params,
];
