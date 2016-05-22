<?php
use yii\widgets\LinkPager;
?>
<ul class="nav nav-tabs">
    <li class="active"><a href="#">首页</a></li>
    <?=$cats?>
</ul>
<br/>
<div class="row">
    <?php foreach($goods as $g){?>
    <div class="col-xs-6 col-md-3">
        <div class="thumbnail">
            <img style="width: 200px;height: 200px; background-repeat: no-repeat" src="http://admin.yshop.com<?=$g['goods_xthumb']?>">
            <div class="caption">
                <p>商品名：<?=$g['goods_name']?>   &nbsp; &nbsp; &nbsp; &nbsp;&yen;<?=$g['shop_price']?>元</p>
                <p><a href="/show/goods/index.html?goods_id=<?=$g['goods_id']?>" class="btn btn-primary" role="button">点击查看</a></p>
            </div>
        </div>
    </div>
    <?php }?>
</div>
<?= LinkPager::widget([
    //这里pagination是固定死的，不能变
    'pagination'=>$pages,
    ]
); ?>
