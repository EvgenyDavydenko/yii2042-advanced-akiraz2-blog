<?php
return [
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],    
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'timeZone' => 'Europe/Moscow', //time zone affect the formatter datetime format
    'bootstrap' => [\akiraz2\blog\Bootstrap::class],
    'modules' => [
        'blog' => [
            'class' => akiraz2\blog\Module::class,
            'urlManager' => 'urlManager',// 'urlManager' by default, or maybe you can use own component urlManagerFrontend
            'imgFilePath' => '@frontend/web/img/blog/',
            'imgFileUrl' => '/img/blog/',
            'userModel' => \common\models\User::class,
            'userPK' => 'id', //default primary key for {{%user}} table
            'userName' => 'username', //uses in view (may be field `username` or `email` or `login`)
        ],
     ], 
    'components' => [
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [               
            ],
        ],
        'formatter' => [ //for the showing of date datetime
            'dateFormat' => 'yyyy-MM-dd',
            'datetimeFormat' => 'yyyy-MM-dd HH:mm:ss',
            'decimalSeparator' => '.',
            'thousandSeparator' => ' ',
            'currencyCode' => 'EUR',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
    ],
];
