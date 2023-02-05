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
    'defaultRoute' => 'blog', //set blog as default route
    'modules' => [
        'blog' => [
            'class' => 'akiraz2\blog\Module',
            'controllerNamespace' => 'akiraz2\blog\controllers\frontend',
            'blogPostPageCount' => 6,
            'blogCommentPageCount' => 10, //20 by default
            'enableComments' => true, //false by default
            'schemaOrg' => [ // empty array [] by default! 
                'publisher' => [
                    'logo' => '/img/logo.png',
                    'logoWidth' => 191,
                    'logoHeight' => 74,
                    'name' => 'My Company',
                    'phone' => '+1 800 488 80 85',
                    'address' => 'City, street, house'
                ]
            ]
        ],
    ],
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-frontend',
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
