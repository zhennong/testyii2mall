<?php
/**
 * Created by PhpStorm.
 * User: wodrow
 * Date: 01/05/16
 * Time: 下午 06:28
 */

use yii\bootstrap\Html;
use kartik\grid\GridView;
use kartik\dynagrid\DynaGrid;
use kartik\icons\Icon;

$this->title = "user list";
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="user-default-user-list">
    <div class="row">
        <div class="col-lg-12">
            <?=GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => $gridColumns,
                'toolbar' =>  [
                    ['content'=>
                        Html::button(Icon::show('fa fa-plus'), ['type'=>'button', 'title'=>Yii::t('kvgrid', 'Add Book'), 'class'=>'btn btn-success', 'onclick'=>'alert("This will launch the book creation form.\n\nDisabled for this demo!");']) . ' '.
                        Html::a(Icon::show('fa fa-repeat'), ['grid-demo'], ['data-pjax'=>0, 'class' => 'btn btn-default', 'title'=>Yii::t('kvgrid', 'Reset Grid')])
                    ],
                    '{export}',
                    '{toggleData}',
                ],
                'pjax' => true,
                'bordered' => true,
                'striped' => false,
                'condensed' => false,
                'responsive' => false,
                'hover' => true,
                'floatHeader' => true,
                'showPageSummary' => true,
                'panel' => [
                    'type' => GridView::TYPE_PRIMARY
                ],
            ]) ?>
        </div>
    </div>
</div>

