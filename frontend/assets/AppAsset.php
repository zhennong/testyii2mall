<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $css = [
        'css/site.css',
        'css/style.css',
        //引入字体图标
        'css/Font-Awesome-3.2.1/css/font-awesome.min.css',
    ];
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $js = [
        //'js/cropbox.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
