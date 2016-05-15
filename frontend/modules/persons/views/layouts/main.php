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

//是否有个人资料,有就显示修改,没有显示创建
$uid    = Yii::$app->user->id;
$name   = Yii::$app->user->identity->username;
$nick   = $name;
$cinfo  = Yii::t('common','Create data');
$uinfo  = UserInformation::findOne($uid);
$crop   = "create";
if($uinfo) {
    $nick = $uinfo->nickname;
    $cinfo  = Yii::t('common','Edit data');
    $crop = "update.html?id=$uid";
}

AppAsset::register($this);
$directoryAsset = Yii::$app->assetManager->getPublishedUrl('');
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
            'label' => Yii::t('common', 'Hello').', '.$nick,
            'items' =>[
                [ 'label' => Icon::show('home').'&nbsp;&nbsp;&nbsp;&nbsp;'.Yii::t('common', 'User Center'),'url'=>['/persons/person/index']],
                [ 'label' => Icon::show('edit').'&nbsp;&nbsp;&nbsp;&nbsp;'.$cinfo,'url'=>["/persons/user-information/$crop"]],
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
        <div class="row">
            <?= $this->render(
                'header.php',
                ['directoryAsset' => $directoryAsset]
            ) ?>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-3">
                <?= $this->render(
                    'left.php',
                    ['directoryAsset' => $directoryAsset]
                ) ?>
            </div>
            <div class="col-md-7">
                <?= $content ?>
            </div>
            <div class="col-md-2">
                <?= $this->render(
                    'right.php',
                    ['directoryAsset' => $directoryAsset]
                ) ?>
            </div>
        </div>
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
