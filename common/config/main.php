<?php
return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'i18n' => [
            'translations' => [
                'common' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@common/messages',
                    'sourceLanguage' => 'en',
                    'fileMap' => [
                        'common' => 'common.php',
                        'common/error' => 'error.php',
                    ],
                ],
                'kvgrid' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@common/messages',
                    'sourceLanguage' => 'en',
                    'fileMap' => [
                        'common' => 'common.php',
                        'common/error' => 'error.php',
                    ],
                ],
            ],
        ],
        'authManager' => [
            'class' => 'yii\rbac\DbManager', // or use 'yii\rbac\DbManager'
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
        ],
        // setup Krajee Pdf component
        'mpdf' => [
            'class' => \kartik\mpdf\Pdf::classname(),
            'format' => \kartik\mpdf\Pdf::FORMAT_A4,
            'orientation' => \kartik\mpdf\Pdf::ORIENT_PORTRAIT,
            'destination' =>\kartik\mpdf\Pdf::DEST_BROWSER,
//            'temppath' => "@web/runtime/mpdf",
            // refer settings section for all configuration options
        ],
    ],
];
