<?php
$params = require(__DIR__ . '/params.php');
$dbHost = "127.0.0.1";
$dbName = "test";
$dbUsername = "username";
$dbPassword = "passwod";
        
$config = [
    'id'         => 'api',
    'basePath'   => dirname(__DIR__),
    'bootstrap'  => ['log'],
    'components' => [
        'request'      => [
            'enableCookieValidation' => false,
            'enableCsrfValidation'   => false,
            'cookieValidationKey'    => 'modifycustomkey',
        ],
        'cache'        => [
            'class' => 'yii\caching\FileCache',
        ],
//        'user'         => [
//            'identityClass'   => 'app\models\User',
//            'enableAutoLogin' => true,
//        ],
        'errorHandler' => [
            'errorAction' => 'base/error',
        ],
        'log'          => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets'    => [
                [
                    'class'      => 'yii\log\FileTarget',
                    'except'     => ['yii\web\HttpException:404'],
                    'levels'     => [
                        'error',
                        'warning'],
                    'categories' => ['yii\*',
                        'application'],
                    'logFile'    => '@app/runtime/logs/' . date("Y-m-d", time()) . '.txt',
                ],
            ],
        ],
        'response'     => [
            'class'      => 'yii\web\Response',
            'formatters' => [
                'jsonApi' => 'app\components\JsonApiFormatter',
            ],
        ],
        'db'           => [
            'class'              => 'yii\db\Connection',
            'dsn'                => "mysql:host={$dbHost};dbname={$dbName}",
            'username'           => $dbUsername,
            'password'           => $dbPassword,
            'charset'            => 'utf8',
            'enableSchemaCache'  => true,
            'enableQueryCache'   => true,
            'queryCacheDuration' => 86400,
            'queryCache'         => 'cache',
        ],
        'urlManager'   => [
            'enablePrettyUrl' => true,
            'showScriptName'  => false,
            'rules'           => [
            ],
        ],
        'tool'         => [
            'class' => 'app\components\Tool',
        ],
    ],
    'params'     => $params,
];

if (YII_DEBUG) {
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class'      => 'yii\debug\Module',
        'allowedIPs' => ['*']
    ];
    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class'      => 'yii\gii\Module',
        'allowedIPs' => ['*']
    ];
}

return $config;
