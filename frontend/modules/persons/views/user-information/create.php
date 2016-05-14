<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\UserInformation */

$this->title = Yii::t('common', 'Create User Information');

$this->params['breadcrumbs'][] = ['label' => 'User Informations', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-information-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
