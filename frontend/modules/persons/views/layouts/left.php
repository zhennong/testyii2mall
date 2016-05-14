<?php

use yii\grid\GridView;
use yii\bootstrap\Html;
use yii\bootstrap\Nav;
use kartik\icons\Icon;
$this->title = Yii::t('common','testyii2mall');

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\UserInformationSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'User Informations';
$this->params['breadcrumbs'][] = $this->title;
?>
    <div class="panel panel-default">
        <div class="panel-body">
            <img src="/images/user2-160x160.jpg" class="img-circle" alt="User Image" style="width: 100%;max-width: 80px;height: auto;"/>
                    <span class="text-right">
                    <a href="/persons/person/avatar.html"><i class="icon-circle-arrow-up">
                        </i>上传头像</a>
                    </span>
        </div>
        <div class="panel-footer">
                    <span class="text-right">
                    会员: <?=Yii::$app->
                        user->identity->username ?>

                        <a style="float: right;">在线<?= Icon::show('fa fa-sign') ?>
                        </a>
                    </span>
        </div>

    </div>
    <div class="list-group">
        <a href="#" class="list-group-item active">
            交易管理
        </a>
        <a href="/gii.html" class="list-group-item">Gii</a>
        <a href="#" class="list-group-item">我的订单</a>
        <a href="#" class="list-group-item">购买历史</a>
        <a href="#" class="list-group-item">我的收藏</a>
        <a href="#" class="list-group-item">我的收货地址</a>
    </div>
    <div class="list-group">
        <a href="#" class="list-group-item active">
            个人中心
        </a>
        <a href="#" class="list-group-item">我的资料</a>
        <a href="#" class="list-group-item">我的积分</a>
        <a href="#" class="list-group-item">修改密码</a>
        <a href="#" class="list-group-item">我的优惠券</a>
    </div>