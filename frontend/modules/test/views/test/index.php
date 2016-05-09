<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\modules\test\models\TestSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('common', 'Tests');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="test-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?=$this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('common', 'Create Test'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
