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
                'class' => 'yii\grid\DataColumn', // 默认可省略
                'attribute'=>'name',
                'enableSorting'=>false,
                'value' => function ($data) {
                    return $data->name;
                },
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
        'responsive'=>true,
        'hover'=>true,
        /*'pjax'=>true,
        'pjaxSettings'=>[
            'neverTimeout'=>true,
            'beforeGrid'=>'My fancy content before.',
            'afterGrid'=>'My fancy content after.',
        ],*/
    ]); ?>
</div>
