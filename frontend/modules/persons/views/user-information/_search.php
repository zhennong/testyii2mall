<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\UserInformationSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-information-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'user_id') ?>

    <?= $form->field($model, 'avatar') ?>

    <?= $form->field($model, 'nickname') ?>

    <?= $form->field($model, 'sex') ?>

    <?= $form->field($model, 'birthday') ?>

    <?php // echo $form->field($model, 'main_page') ?>

    <?php // echo $form->field($model, 'telephone') ?>

    <?php // echo $form->field($model, 'mobilephone') ?>

    <?php // echo $form->field($model, 'qq') ?>

    <?php // echo $form->field($model, 'country') ?>

    <?php // echo $form->field($model, 'area_id') ?>

    <?php // echo $form->field($model, 'address') ?>

    <?php // echo $form->field($model, 'company') ?>

    <?php // echo $form->field($model, 'personalized_signature') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
