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
            'cat_id',
            'name',
            'shop_price',
            'number',
            [
                'label'=>'状态',
                'format'=>'raw',
                'value' => function($data){
                    return Html::dropDownList(
                        $data->id,$data->status,//\backend\modules\goods\models\Goods::STATUS_DEFAULT,
                        [\backend\modules\goods\models\Goods::STATUS_DEFAULT=>'未发布',\backend\modules\goods\models\Goods::STATUS_UP=>'上架',\backend\modules\goods\models\Goods::STATUS_DOWN=>'下架'],
                        ['onchange' => 'Opt(this.value,this)']
                    );
                }
            ],
            ['class' => 'yii\grid\ActionColumn','header'=>'操作'],
        ],
    ]); ?>
</div>
<script>
    function Opt(str,dom){
        $.ajax({
            url  : "/goods/goods/up-status.html",
            type : 'post',
            data : {'id':$(dom).attr('name')  , 'status':str},
            datatype : "text",
            complete: function(XMLHttpRequest, textStatus){
                alert(XMLHttpRequest.responseText);
            },
            //调用出错执行的函数
            error: function(){
                alert('修改失败');
            }
        });
    }
</script>
