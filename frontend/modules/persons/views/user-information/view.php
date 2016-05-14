<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\UserInformation */

$this->title = $model->user_id;
$this->params['breadcrumbs'][] = ['label' => 'User Informations', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-information-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->user_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->user_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'user_id',
            'avatar',
            'nickname',
            'sex',
            'birthday',
            'main_page',
            'telephone',
            'mobilephone',
            'qq',
            'country',
            'area_id',
            'address',
            'company',
            'personalized_signature',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
