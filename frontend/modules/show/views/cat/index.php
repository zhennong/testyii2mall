<?php
use yii\widgets\LinkPager;
$this->title = Yii::t('common','testyii2mall');
?>
    <div class="row">

        <?php foreach($goods as $g){?>
            <div class="col-xs-6 col-md-3">
                <div class="thumbnail">
                    <img style="width: 200px;height: 200px; background-repeat: no-repeat" src="<?=Yii::$app->params['backUrl'].$g['xthumb']?>">
                    <div class="caption">
                        <p>商品名：<?=$g['name']?>   &nbsp; &nbsp; &nbsp; &nbsp;&yen;<?=$g['shop_price']?>元</p>
                        <p><a href="/show/goods/index.html?goods_id=<?=$g['id']?>" class="btn btn-primary" role="button">点击查看</a></p>
                    </div>
                </div>
            </div>
        <?php }?>
    </div>
<?= LinkPager::widget([
        'pagination'=>$pages,
    ]
); ?>