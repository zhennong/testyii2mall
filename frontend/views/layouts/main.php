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
        'brandLabel' => Yii::t('common', 'My Company'),
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    $menuItemsLeft = [
        ['label' => Yii::t('common', 'Home'), 'url' => ['/site/index']],
        ['label' => Yii::t('common', 'Contact'), 'url' => ['/site/contact']],
        ['label' => Yii::t('common', 'About'), 'url' => ['/site/about']],
    ];
    if (Yii::$app->user->isGuest) {
        $menuItemsRight[] = ['label' => Yii::t('common', 'Signup'), 'url' => ['/site/signup']];
        $menuItemsRight[] = ['label' => Yii::t('common', 'Login'), 'url' => ['/site/login']];
        $menuItemsRight[] = ['label' => Yii::t('common', 'Help Center'), 'url' => ['/help/index']];
    } else {
        //修改登录退出的样式，并引入Font Awesome图标
        $menuItemsRight[] = [
            'label' => Yii::t('common', 'Hello').', '.Yii::$app->user->identity->username,
            'items' =>[
                //要注意的是下面<i >这段代码，默认是会被转义输出的
                //linkOptions代表点击的话会发送post请求
                [ 'label' => \kartik\icons\Icon::show('home').'&nbsp;&nbsp;&nbsp;&nbsp;'.Yii::t('common', 'User Center'),'url'=>['/person/index']],
                [ 'label' => \kartik\icons\Icon::show('edit').'&nbsp;&nbsp;&nbsp;&nbsp;'.Yii::t('common', 'Edit data'),'url'=>['/person/upinfo']],
                [ 'label' => \kartik\icons\Icon::show('sign-out').'&nbsp;&nbsp;&nbsp;&nbsp;'.Yii::t('common', 'Exit'),'url'=>['/site/logout'],'linkOptions' => ['data-method' => 'post']],
            ],
        ];
        $menuItemsRight[] = ['label' => Yii::t('common', 'Help Center'), 'url' => ['/help/index']];
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
