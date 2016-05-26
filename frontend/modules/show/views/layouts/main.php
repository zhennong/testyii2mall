<?php

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use frontend\modules\show\models\Cat;
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


//栏目列表
$data = '';
$cat  = new Cat();
$c1   = $cat->find()->where(['pid'=>0])->all();
//第一层
foreach ($c1 as $p1){
    $c2 = $cat->find()->where(['pid'=>$p1['id']])->all();
    if(empty($c2)){
        $data .= "<li><a href='/show/cat/index.html?cat_id={$p1['id']}'>{$p1['name']}</a></li>";
    }else{
        $data .= "<li class='dropdown'><a data-toggle='dropdown' href='/show/cat/index.html?cat_id={$p1['id']}'>{$p1['name']}<span class=\"caret\"></span></a><ul class=\"dropdown-menu\">";
        $cid_2 = end($c2)->id;
        //第二层
        foreach($c2 as $p2){
            $c3 = $cat->find()->where(['pid'=>$p2['id']])->all();
            if(empty($c3)){
                if($p2['id'] == $cid_2){
                    $data .= "<li><a href='/show/cat/index.html?cat_id={$p2['id']}'>{$p2['name']}</a></li></ul></li>";
                }else{
                    $data .= "<li><a href='/show/cat/index.html?cat_id={$p2['id']}'>{$p2['name']}</a></li>";
                }
            }else{
                $data .= "<li><a href='/show/cat/index.html?cat_id={$p2['id']}'>{$p2['name']}</a>";
                $cid_3 = end($c3)->id;
                //第三层
                foreach($c3 as $p3){
                    if($p3['id'] == $cid_3){
                        if($p2['id'] == $cid_2){
                            $data .= "[ <span><a href='/show/cat/index.html?cat_id={$p3['id']}'>{$p3['name']}</a></span> ]</li></ul></li>";
                        }else{
                            $data .= "[ <span><a href='/show/cat/index.html?cat_id={$p3['id']}'>{$p3['name']}</a></span> ]</li>";
                        }
                    }else{
                        $data .= "[ <span><a href='/show/cat/index.html?cat_id={$p3['id']}'>{$p3['name']}</a></span> ]";
                    }
                }

            }
        }
    }
}



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
        ['label' => Yii::t('common', 'Shop'), 'url' => ['/show/default/index']],
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
            <div class="row">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#">所有</a></li>
                    <?=$data?>
                </ul>
            </div>
            <div class="row">
                <?= $content ?>
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