<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;
use kartik\icons\Icon;
use frontend\modules\persons\models\UserInformation;

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
        ['label' => Yii::t('common', 'Shop'), 'url' => ['/show/default/index']],
        ['label' => Yii::t('common', 'Contact'), 'url' => ['/site/contact']],
        ['label' => Yii::t('common', 'About'), 'url' => ['/site/about']],
    ];
    if (Yii::$app->user->isGuest) {
        $menuItemsRight[] = ['label' => Yii::t('common', 'Signup'), 'url' => ['/site/signup']];
        $menuItemsRight[] = ['label' => Yii::t('common', 'Login'), 'url' => ['/site/login']];
        $menuItemsRight[] = ['label' => Yii::t('common', 'Help Center'), 'url' => ['/help/index']];
    } else {

    //默认模板个别变量设置
        $uid    = Yii::$app->user->id;                      //用户id
        $name   = Yii::$app->user->identity->username;      //获取会员名
        $nick   = $name;                                    //用户名默认为会员名
        $img    = '/images/user2-160x160.jpg';              //头像默认图片地址
        $crop   = "/persons/user-information/create.html";  //默认设置为创建资料连接
        $cinfo  = Yii::t('common','Create data');           //对应默认的子是创建资料
        $uinfo  = UserInformation::findOne($uid);

        if($uinfo) {
            $nick   = $uinfo->nickname;
            $cinfo  = Yii::t('common','Edit data');
            $crop   = "/persons/user-information/view.html?id={$uid}";
        }
        $menuItemsRight[] = [
            'label' => Yii::t('common', 'Hello').', '.$nick,
            'items' =>[
                [ 'label' => Icon::show('home').'&nbsp;&nbsp;&nbsp;&nbsp;'.Yii::t('common', 'User Center'),'url'=>['/persons/person/index']],
                [ 'label' => Icon::show('edit').'&nbsp;&nbsp;&nbsp;&nbsp;'.Yii::t('common', $cinfo),'url'=>[$crop]],
                [ 'label' => Icon::show('sign-out').'&nbsp;&nbsp;&nbsp;&nbsp;'.Yii::t('common', 'Exit'),'url'=>['/site/logout'],'linkOptions' => ['data-method' => 'post']],
            ],
        ];
        $menuItemsRight[] = ['label' => Yii::t('common', 'Help Center'), 'url' => ['/help/index']];
    }
    //设置nav的encodeLabels属性 可以让上面的Font字体图标正常输出
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
<?php if (isset($this->blocks['extend'])): ?>
    <?= $this->blocks['extend'] ?>
<?php else: ?>
<?php endif; ?>
</body>
</html>
<?php $this->endPage() ?>
