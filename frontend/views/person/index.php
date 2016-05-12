<?php
/* @var $this yii\web\View */
use yii\bootstrap\Html;
use mdm\admin\components\MenuHelper;
use yii\bootstrap\Nav; $this->title = Yii::t('common','testyii2mall'); $directoryAsset = Yii::$app->assetManager->getPublishedUrl('@vendor/almasaeed2010/adminlte/dist');
?>
<div class="container-fluid">
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
                                <i class="icon-search">
                                </i>
                            </button>
                        </span>
                </div>
            </form>
        </div>
        <!-- /.search form -->
    </div>
    <hr>
    <div class="row">
        <div class="col-md-3">
            <div class="panel panel-default">
                <div class="panel-body">
                    <img src="/images/user2-160x160.jpg" class="img-circle" alt="User Image" style="width: 100%;max-width: 80px;height: auto;"/>
                    <span class="text-right">
                    <a href="/person/avatar.html"><i class="icon-circle-arrow-up">
                        </i>上传头像</a>
                    </span>
                </div>
                <div class="panel-footer">
                    <span class="text-right">
                    会员: <?=Yii::$app->
                    user->identity->username ?>

                    <a style="float: right;">在线<i class="icon-ok-sign">
                        </i></a>
                    </span>
                </div>

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
                <a href="#" class="list-group-item">我的资料</a>
                <a href="#" class="list-group-item">我的积分</a>
                <a href="#" class="list-group-item">修改密码</a>
                <a href="#" class="list-group-item">我的优惠券</a>
            </div>
        </div>
        <div class="col-md-6">
            .col-md-7
        </div>
        <div class="col-md-3">
            .col-md-3
        </div>
    </div>
</div>