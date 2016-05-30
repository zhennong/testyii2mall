<?php

use yii\helpers\Html;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\modules\test\models\TestSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('common', 'Tests');
$this->params['breadcrumbs'][] = $this->title;
?>

<?php $this->beginBlock('extend'); ?>
<?php $this->endBlock(); ?>

<div class="test-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <h6></h6>
    <?=$this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('common', 'Create Test'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            [
                'class' => 'yii\grid\CheckboxColumn',
            ],
            ['class' => 'yii\grid\SerialColumn'],
            [
                'class' => 'yii\grid\DataColumn', // 默认可省略
                'attribute'=>'id',
                'enableSorting'=>true,
                'value' => function ($data) {
                    return $data->id;
                },
            ],
            [
                'class' => 'kartik\grid\EditableColumn', // 默认可省略
                'attribute'=>'name',
                'enableSorting'=>false,
                'value' => function ($data) {
                    return $data->name;
                },
                'editableOptions'=> function ($model, $key, $index) {
                    return [
                        'header'=>'Name',
                    ];
                },
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
        'responsive'=>true,
        'hover'=>true,
        'panel' => [
            'heading'=>'<h3 class="panel-title"><i class="glyphicon glyphicon-globe"></i> Test</h3>',
            'type'=>'success',
            'before'=>Html::a('<i class="glyphicon glyphicon-plus"></i> Create Test', ['create'], ['class' => 'btn btn-success']),
            'after'=>Html::a('<i class="glyphicon glyphicon-repeat"></i> Reset Grid', ['index'], ['class' => 'btn btn-info']),
            'footer'=>false
        ],
//        'showPageSummary' => true,
//        'pageSummaryRowOptions' => ['class' => 'kv-page-summary warning'],
//        'resizableColumns'=>true,
//        'resizeStorageKey'=>Yii::$app->user->id . '-' . date("m"),
//        'floatHeader'=>true,
//        'floatHeaderOptions'=>['scrollingTop'=>'50'],
//        'pjax'=>true,
//        'pjaxSettings'=>[
//            'neverTimeout'=>true,
//            'beforeGrid'=>'My fancy content before.',
//            'afterGrid'=>'My fancy content after.',
//        ],
        'toolbar' => [
            [
                'content'=>
                    Html::a('<i class="glyphicon glyphicon-plus"></i>', ['create'], [
                        'class' => 'btn btn-default',
                        'title' => Yii::t('kvgrid', 'Reset Grid')
                    ]).
                    Html::a('<i class="glyphicon glyphicon-repeat"></i>', ['index'], [
                        'class' => 'btn btn-default',
                        'title' => Yii::t('kvgrid', 'Reset Grid')
                    ]),
                'options' => ['class' => 'btn-group-sm']
            ],
            '{export}',
            '{toggleData}'
        ],
        'toggleDataContainer' => ['class' => 'btn-group-sm'],
        'exportContainer' => ['class' => 'btn-group-sm'],
    ]); ?>
</div>
