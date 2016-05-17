<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'language' => 'zh-CN',
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    'components' => [
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
            'suffix' => '.html',
        ],
        'authClientCollection' => [
            'class' => 'yii\authclient\Collection',
            'clients' => [
                'qq' => [
                    'class' => 'yii\authclient\clients\QqOAuth',
                    'clientId' => '101313703',
                    'clientSecret' => '8a6907f939dfc0b3782d881a5a2faec2',
                ],
            ],
        ],
    ],
    'modules' => [
        //配置gii可以同域访问
        'gii'=>[
            'class' => 'yii\gii\Module',
            'allowedIPs' => [
                '127.0.0.1','192.168.0.*','::1',
            ],
        ],
        'debug'=>[
            'class' => 'yii\debug\Module',
            'allowedIPs' => [
                '127.0.0.1','192.168.0.*','::1',
            ],
        ],
        'test' => [
            'class' => 'frontend\modules\test\Test',
        ],
        'persons' => [
            'class' =>'frontend\modules\persons\Persons',
        ],
    ],
    'params' => $params,
];
