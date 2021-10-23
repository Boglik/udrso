<?php

use yii\web\UrlNormalizer;

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';

$config = [
   
    'language' => 'ru-RU',
    'id' => 'basic',
    'name' => 'Личный кабинет',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'modules' => [
        'gridview' =>  [
            'class' => '\kartik\grid\Module'
        ],
        'profile' => [
            'class' => 'app\modules\profile\Module',
            'layout' => 'main'
        ],
        'kabinet' => [
            'class' => 'app\modules\kabinet\Module',
            'layout' => 'main'
        ],
        'admin' => [
            'class' => 'app\modules\admin\Module',
            'layout' => 'main'
        ],
    ],
    'components' => [
        'seo' => [
            'class' => 'app\components\SeoComponent',
        ],
        'formatter' => [
            'dateFormat' => 'd.m.Y',
            'decimalSeparator' => ',',
            'thousandSeparator' => ' ',
            'currencyCode' => 'RU',
        ],
        'request' => [
            'csrfParam' => '_csrf-backend',
            'baseUrl'=> '',
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => '6biKO-IQh-TROjOt3URKeJLczuS2rM0y',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'loginUrl' => ['/'],
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-backend', 'httpOnly' => true],
            'identityClass' => 'app\modules\admin\models\Admin',
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'Init ' => [
            'class' => 'components\Init'
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
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
        'db' => $db,
        'authManager' => [
            'class' => 'yii\rbac\DbManager',
//                       'itemTable' => 'auth_item',
//                       'itemChildTable' => 'auth_item_child',
//                       'assignmentTable' => 'auth_assignment',
//                       'ruleTable' => 'auth_rule'
        ],
        'formatter' => [
            'class' => 'yii\i18n\Formatter',
            'nullDisplay' => '',
        ],
        /* Слева указываем как мы хотим видеть ссылку в браузере, справа ссылка по факту */
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'normalizer' => [
                'class' => UrlNormalizer::class,
                'action' => UrlNormalizer::ACTION_REDIRECT_TEMPORARY, // используем временный редирект вместо постоянного
            ],

            'rules' => [
                'privacy' => 'site/privacy',
                'signup/' => 'site/signup',
                'logout' => 'login/logouts',
                'login' => 'login/index',
                'admin/squad' => 'admin/',
                'admin/mehan' => '/admin/default/mehan',
                  'admin/udgu' => '/admin/default/udgu',
                  'admin/ggpi' => '/admin/default/ggpi',
                  'admin/egida' => '/admin/default/egida',
                  'admin/no-stab' => '/admin/default/no-stab',
                 'admin/no-stab-svo' => '/admin/default/no-stab-svo',
                 'admin/no-stab-sso' => '/admin/default/no-stab-sso',
                 'admin/no-stab-spo' => '/admin/default/no-stab-spo',
                 '/admin/udgu/servso' => '/admin/default/udgu-servso',
                 '/admin/udgu/sop' => '/admin/default/udgu-sop',
                 '/admin/udgu/sso' => '/admin/default/udgu-sso',
                 '/admin/udgu/spo' => '/admin/default/udgu-spo',
                 '/admin/egida/smo' => '/admin/default/egida-smo',
                '/admin/egida/sop' => '/admin/default/egida-sop',
                '/admin/egida/spo' => '/admin/default/egida-spo',
                 '/admin/ggpi/sso' => '/admin/default/ggpi-sso',
                '/admin/ggpi/sop' => '/admin/default/ggpi-sop',
                '/admin/ggpi/spo' => '/admin/default/ggpi-spo',
                '/admin/mehan/sso' => '/admin/default/mehan-sso',
                '/admin/mehan/sop' => '/admin/default/mehan-sop',
                '/admin/mehan/spo' => '/admin/default/mehan-spo',
                'admin/squad' => 'admin/default/squad',
                'admin/viezd' => 'admin/default/viezd',
                'admin/otryad' => 'admin/default/otryad',
                'admin/zayavka' => 'admin/default/zayavka',
                'admin/social' => 'admin/default/social',
                 'admin/os' => 'admin/default/os',
                'admin/zakaz' => 'admin/default/zakaz',
                '/admin/logout' => 'login/logout',
                'news/<id:\d+>' => 'news/view',
                'page/<page:\d+>' => 'news/index',
                '/blog' => '/arhive/index',
                'register' => '/login/registation',
                '/blog/<slug:[/a-z0-9-]+>' => '/arhive/view',
                '/shtaby-vuzov' => 'site/shtaby-vuzov',
                '/spo-otryady' => '/site/spo-otryady',
                'sop-otryady' => 'site/sop-otryady',
                'sso-otryady' => 'site/sso-otryady',
                'sop-otryady' => 'site/sop-otryady',
                'svo-otryady' => 'site/svo-otryady',
                'sop-otryady' => 'site/sop-otryady',
                'sservo-otryady' => 'site/sservo-otryady',
                'smo-otryady' => 'site/smo-otryady',
                 '/otryady/<slug:[/a-z0-9-]+>' => '/site/otryady',
                //  'site/otryady/<slug>/' => 'site/otryady',
                'shtaby/stab-mehan' => 'site/stab-mehan',
                'shtaby/stab-udgu' => 'site/stab-udgu',
                'shtaby/shtaby-shso-ggpi' => 'site/stab-ggpi',
                'shtaby/shtab-egida' => 'site/stab-egida',
                'letopis/'=> 'site/letopis',
                'plan-meropriyatij' => 'site/plan-meropriyatij',
                'ksiv-otryad' => 'site/ksiv-otryad',
                '/documents' => 'material/index',
                '/documents/<slug:[/a-z0-9-]+>' => '/material/view',
//                'materials' => '/site/materials',
                
            ],
        ],
        
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];
}

return $config;
