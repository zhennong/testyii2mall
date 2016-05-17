<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-backend',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'language' => 'zh-CN',
    'bootstrap' => ['log'],
    'modules' => [
        'admin' => [
            'class' => 'mdm\admin\Module',
            'layout'=>'left-menu',
            'mainLayout' => '@app/views/layouts/main.php',
            'controllerMap' => [
                'assignment' => [
                    'class' => mdm\admin\controllers\AssignmentController::className(),
                    'userClassName' => 'common\models\User',
                    'idField' => 'id'
                ]
            ],
            'menus' => [],
        ],
        'gridview'=> [
            'class'=>'\kartik\grid\Module',
            // enter optional module parameters below - only if you need to
            // use your own export download action or custom translation
            // message source
            // 'downloadAction' => 'gridview/export/download',
            /*'i18n' => [
                'class' => 'yii\i18n\PhpMessageSource',
                'basePath' => '@common/messages',
                'forceTranslation' => true
            ],*/
        ],
        'dynagrid'=> [
            'class'=>'\kartik\dynagrid\Module',
        ],
        'datecontrol' =>  [
            'class' => '\kartik\datecontrol\Module'
        ],
        'user' => [
            'class' => 'backend\modules\user\User',
        ],
        'test' => [
            'class' => 'backend\modules\test\Test',
        ],
        'goods' =>[
            'class'=> 'backend\modules\goods\Module',
        ],
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
    ],
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
        'assetManager' => [
            'bundles' => [
                'dmstr\web\AdminLteAsset' => [
                    'skin' => 'skin-blue',
                ],
            ],
        ],
    ],
    'as access' => [
        'class' => 'mdm\admin\components\AccessControl',
        'allowActions' => [
            '*',
        ],
    ],
    'params' => $params,
];
