<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => 'Yii商城',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    $menuItemsLeft = [
        ['label' => '首页', 'url' => ['/site/index']],
        ['label' => '联系我们', 'url' => ['/site/contact']],
        ['label' => '收藏本页', 'url' => ['/site/about']],
    ];
    if (Yii::$app->user->isGuest) {
        $menuItemsRight[] = ['label' => '注册', 'url' => ['/site/signup']];
        $menuItemsRight[] = ['label' => '登录', 'url' => ['/site/login']];
        $menuItemsRight[] = ['label' => '帮助中心', 'url' => ['/help/index']];
    } else {
        //修改登录退出的样式，并引入Font Awesome图标
        $menuItemsRight[] = [
            'label' => '您好, '.Yii::$app->user->identity->username,
            'items' =>[
                //要注意的是下面<i >这段代码，默认是会被转义输出的
                //linkOptions代表点击的话会发送post请求
                [ 'label' => '<i class="icon-home"></i>&nbsp;&nbsp;&nbsp;&nbsp;个人中心','url'=>['/person/index']],
                [ 'label' => '<i class="icon-edit"></i>&nbsp;&nbsp;&nbsp;&nbsp;修改资料','url'=>['/person/upinfo']],
                [ 'label' => '<i class="icon-signout"></i>&nbsp;&nbsp;&nbsp;&nbsp;退出','url'=>['/site/logout'],'linkOptions' => ['data-method' => 'post']],
            ],
        ];
        $menuItemsRight[] = ['label' => '帮助中心', 'url' => ['/help/index']];
    }
    //设置nav的encodeLabels属性 可以让上面的代码原样输出
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-left'],
        'encodeLabels' => false,
        'items' => $menuItemsLeft,
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'encodeLabels' => false,
        'items' => $menuItemsRight,
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; My Company <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
