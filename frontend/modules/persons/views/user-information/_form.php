<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use frontend\modules\persons\models\Area;
use yii\widgets\ActiveForm;

$Area = new Area();
/* @var $this yii\web\View */
/* @var $model frontend\modules\persons\models\UserInformation */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-information-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nickname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sex')->radioList(['1'=>'男','0'=>'女']) ?>

    <?= $form->field($model, 'birthday')->textInput() ?>

    <?= $form->field($model, 'main_page')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'telephone')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mobilephone')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'qq')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'country')->textInput(['maxlength' => true]) ?>


    <?= $form->field($model, 'area_id', [
        'template'=>'{label}<div id="area_linkage"><div class="col-sm-3">'.
            Html::activeDropDownList($model,'province_area_id', ArrayHelper::map($Area::getChildrenList(0,1), 'id', 'name'), [
                'class' => 'form-control',
                'onchange' => '
                                    $("#userinformation-area_id").val($(this).val());
                                    $.ajax({
                                        type:"post",
                                        url:"'.Yii::$app->urlManager->createUrl('/persons/area/ajax-area').'",
                                        data:{pid:$(this).val(),level:2},
                                        success:function(msg){
                                            $("#userinformation-city_area_id").html(msg);
                                            $("#userinformation-county_area_id").html(\'<option value="0">请选择区</option>\');
                                        }
                                    });
                                ',
            ])
            .'</div><div class="col-sm-3">'.
            Html::activeDropDownList($model,'city_area_id', ArrayHelper::map($Area::getChildrenList($model->province_area_id,2), 'id', 'name'), [
                'class' => 'form-control',
                'onchange' => '
                                    $("#userinformation-area_id").val($(this).val());
                                    $.ajax({
                                        type:"post",
                                        url:"'.Yii::$app->urlManager->createUrl('/persons/area/ajax-area').'",
                                        data:{pid:$(this).val(),level:3},
                                        success:function(msg){
                                            $("#userinformation-county_area_id").html(msg);
                                        }
                                    });
                                ',
            ])
            .'</div><div class="col-sm-3">'.
            Html::activeDropDownList($model,'county_area_id', ArrayHelper::map($Area::getChildrenList($model->city_area_id,3), 'id', 'name'), [
                'class' => 'form-control',
                'onchange' => '
                                    $("#userinformation-area_id").val($(this).val());
                                ',
            ])
            .'</div><div class="hidden" id="parent_div_area_id">{input}</div></div>',
    ])->hiddenInput(); ?>

    <br>
    <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'company')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'personalized_signature')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('common','creates') : Yii::t('common','update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
