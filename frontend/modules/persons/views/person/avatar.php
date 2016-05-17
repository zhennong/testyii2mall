<?php
/* @var $this yii\web\View */
use yii\bootstrap\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\ActiveForm;
use kartik\icons\Icon;
$this->title = Yii::t('common','testyii2mall');

?>
 <div class="col-md-6">
        <div class="row">
            <div col-md-11>
                <h3>温馨提示: 请预览后再提交!</h3>
            </div>
        </div>
        <div class="caijian">
            <?php $form = ActiveForm::begin(['action' =>['person/toux']])?>
            <input name="_csrf" type="hidden" id="_csrf" value="<?=Yii::$app->request->csrfToken ?>">
            <div class="imageBox">
                <div class="thumbBox"></div>
                <div class="spinner" style="display: none">Loading...</div>
            </div>
            <div class="action">
                <!-- <input type="file" id="file" style=" width: 200px">-->
                <div class="new-contentarea tc"> <a href="javascript:void(0)" class="upload-img">
                        <label for="upload-file">上传图像</label>
                    </a>
                    <input type="file" class="" name="img" id="upload-file" />
                </div>
                <input type="button" id="btnCrop"  class="Btnsty_peyton" value="预览">
                <input type="button" id="btnZoomIn" class="Btnsty_peyton" value="+"  >
                <input type="button" id="btnZoomOut" class="Btnsty_peyton" value="-" >
            </div>
            <div class="cropped"></div>
                <button class="btn btn-primary btn-lg btn-block" type="submit">提交</button>
            <?php ActiveForm::end(); ?>
        </div>
 </div>