<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\UserInformationSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'User Informations';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-information-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create User Information', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'user_id',
            'avatar',
            'nickname',
            'sex',
            'birthday',
            // 'main_page',
            // 'telephone',
            // 'mobilephone',
            // 'qq',
            // 'country',
            // 'area_id',
            // 'address',
            // 'company',
            // 'personalized_signature',
            // 'created_at',
            // 'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
