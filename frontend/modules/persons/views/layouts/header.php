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