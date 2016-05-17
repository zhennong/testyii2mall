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
    if($uinfo->avatar) {
        $img = $uinfo->avatar;
    }
}

$this->title = Yii::t('common','testyii2mall');


/* @var $this yii\web\View */
/* @var $searchModel frontend\models\UserInformationSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->params['breadcrumbs'][] = $this->title;

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
                [ 'label' => Icon::show('edit').'&nbsp;&nbsp;&nbsp;&nbsp;'.$cinfo,'url'=>[$crop]],
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
        <!-- 头部搜索框 start -->
        <div class="row">
            <div class="col-md-3">
                <b>
                    搜索商品..
                </b>
            </div>
            <div class="col-md-9">
                <form action="#" method="get" class="sidebar-form">
                    <div class="input-group">
                        <input type="text" name="q" class="form-control" placeholder="Search..."
                        />
                        <span class="input-group-btn">
                            <button type='submit' name='search' id='search-btn' class="btn btn-flat">
                                <?= Icon::show('search') ?>
                            </button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
        <hr>
        <!-- 头部搜索框 end  -->
        <!-- 内容区域  start-->
        <div class="row">
            <!-- 左侧菜单栏 start-->
            <div class="col-md-3">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <img src="<?=$img?>" class="img-circle" alt="User Image" style="width: 100%;max-width: 80px;height: auto;"/>
                    <span class="text-right">
                    <a href="/persons/person/avatar.html"><i class="icon-circle-arrow-up">
                        </i>&nbsp;&nbsp;修改头像</a>
                    </span>
                    </div>
                    <div class="panel-footer">
                    <span class="text-right">
                        用户 :<?=$nick ?>

                        <a style="float: right;">在线<?= Icon::show('fa fa-sign') ?>
                        </a>
                    </span>
                    </div>

                </div>
                <div class="list-group">
                    <a href="#" class="list-group-item active">
                        测试专用
                    </a>
                    <a href="/gii.html" class="list-group-item">Gii</a>
                    <a href="/debug.html" class="list-group-item">Debug</a>
                </div>
                <div class="list-group">
                    <a href="#" class="list-group-item active">
                        交易管理
                    </a>
                    <a href="#" class="list-group-item">我的订单</a>
                    <a href="#" class="list-group-item">购买历史</a>
                    <a href="#" class="list-group-item">我的收藏</a>
                    <a href="#" class="list-group-item">我的收货地址</a>
                </div>
                <div class="list-group">
                    <a href="#" class="list-group-item active">
                        个人中心
                    </a>
                    <a href="<?=$crop?>" class="list-group-item">我的资料</a>
                    <a href="#" class="list-group-item">我的积分</a>
                    <a href="#" class="list-group-item">修改密码</a>
                    <a href="#" class="list-group-item">我的优惠券</a>
                </div>
            </div>
            <!-- 左侧菜单栏 end-->
            <!-- 中间替换区域 start -->
            <div class="col-md-7">
                <?= $content ?>
            </div>
            <!-- 中间替换区域 end -->
            <!-- 右侧栏 start-->
            <div class="col-md-2">
                <div class="col-md-10">
                    <h2>右侧栏(占2格)</h2>
                </div>
            </div>
            <!-- 右侧栏 end-->
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
