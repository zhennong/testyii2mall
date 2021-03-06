<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$url = Yii::$app->request->referrer;

/* @var $this yii\web\View */
/* @var $model frontend\modules\persons\models\ReceiptAddress */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="receipt-address-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'consignee')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'telephone')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'receipt')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>

    <input type="hidden" name="url" value="<?=$url?>">

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
