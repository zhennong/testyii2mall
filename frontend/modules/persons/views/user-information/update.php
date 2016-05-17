<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model /frontend\modules\presons\models\UserInformation */

$this->title = Yii::t('common','Update User Information');
$this->params['breadcrumbs'][] = ['label' => 'User Informations', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->user_id, 'url' => ['view', 'id' => $model->user_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="user-information-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
