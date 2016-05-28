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
<!--            <p>-->
<!--        --><?//= Html::a('添加用户', ['create'], ['class' => 'btn btn-success']) ?>
<!--    </p>-->
        <?=GridView::widget([
        'dataProvider'=> $dataProvider,
        'filterModel' => $searchModel,
        'columns' => $gridColumns,
        'toolbar' =>  [
                    ['content'=>
                        Html::a('<i class="glyphicon glyphicon-plus"></i>',['create'], ['type'=>'button', 'title'=>Yii::t('kvgrid', '添加用户'), 'class'=>'btn btn-success']) . ' '.
                        Html::a(Icon::show('fa fa-repeat'), ['user-list'], ['data-pjax'=>0, 'class' => 'btn btn-default', 'title'=>Yii::t('kvgrid', '刷新本页')])
                    ],
                    '{toggleData}',
                    '{export}',
                ],
        'containerOptions'=>['style'=>'overflow: auto'], // only set when $responsive = false
        'headerRowOptions'=>['class'=>'kartik-sheet-style'],
        'filterRowOptions'=>['class'=>'kartik-sheet-style'],
        'pjax' => true,
        'bordered' => true,
        'striped' => false,
        'condensed' => false,
        'responsive' => true,
        'hover' => true,
        'floatHeader' => true,
        'showPageSummary' => true,
        'panel' => [
            'type' => GridView::TYPE_PRIMARY
        ],
        'persistResize'=>false,

    ]);?>
        </div>
    </div>
</div>

