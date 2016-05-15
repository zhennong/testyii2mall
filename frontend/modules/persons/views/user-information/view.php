<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\UserInformation */

$this->title = Yii::t('common','User Informations');
$this->params['breadcrumbs'][] = ['label' => 'User Informations', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-information-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('common','update'), ['update', 'id' => $model->user_id], ['class' => 'btn btn-primary']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
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
        ],
    ]) ?>

</div>
