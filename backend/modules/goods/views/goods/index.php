<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\goods\models\GoodsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Goods';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="goods-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Goods', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'cat_id',
            'name',
            'shop_price',
            'number',
            // 'desc',
            // 'img',
            // 'xthumb',
            // 'dthumb',
            //'status',
            [
                'label'=>'状态',
                'format'=>'raw',
                'value' => function($data){
                    return Html::dropDownList('修改状态',\backend\modules\goods\models\Goods::STATUS_UP,[\backend\modules\goods\models\Goods::STATUS_DEFAULT=>'未发布',\backend\modules\goods\models\Goods::STATUS_UP=>'上架',\backend\modules\goods\models\Goods::STATUS_DOWN=>'下架']);
                }
            ],
            ['class' => 'yii\grid\ActionColumn','header'=>'操作'],
        ],
    ]); ?>
<!--    --><?php //$form = ActiveForm::begin(); ?>
<!--    --><?//= $form->field($searchModel, 'status')->radioList([\backend\modules\goods\models\Goods::STATUS_DEFAULT=>'未发布',\backend\modules\goods\models\Goods::STATUS_UP=>'上架',\backend\modules\goods\models\Goods::STATUS_DOWN=>'下架']) ?>
<!--    --><?php //ActiveForm::end(); ?>
</div>
