<?php
/**
 * Created by PhpStorm.
 * User: wodrow
 * Date: 30/04/16
 * Time: 下午 02:58
 */

$this->title = Yii::t('common', 'Email Validate');
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="row">
    <div class="col-lg-12">
        <?php $form = \yii\bootstrap\ActiveForm::begin([
            'method'=>'get',
        ]) ?>
        <?=$form->field($model,'email')->hiddenInput()->label(false) ?>
        <div class="form-group field-validateemailform-email_validate_code required">
            <label class="control-label" for="validateemailform-email_validate_code">Email Validate Code</label>
            <input type="text" id="validateemailform-email_validate_code" class="form-control" name="token">
            <p class="help-block help-block-error"></p>
        </div>
        <?=\yii\bootstrap\Html::submitButton(Yii::t('common', 'Submit'), [
            'class'=>'btn btn-primary',
        ]) ?>
        <?php \yii\bootstrap\ActiveForm::end() ?>
    </div>
</div>
