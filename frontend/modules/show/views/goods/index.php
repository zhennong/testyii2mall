<br>
<div class="row">
    <div class="col-md-5">
        <img src="http://admin.yshop.com<?=$goods['goods_dthumb']?>" alt="">
    </div>
    <div class="col-md-5">
            <table class="table">
                <tr>
                    <td>
                        <strong>商品详情</strong>
                    </td>
                    <td>

                    </td>
                </tr>
                <tr>
                    <td>
                        商品名：
                    </td>
                    <td>
                        <?=$goods['goods_name']?>
                    </td>
                </tr>
                <tr>
                    <td>商品价格:</td>
                    <td>&yen;&nbsp;<?=$goods['shop_price']?>元</td>
                </tr>
                <tr>
                    <td>商品数量:</td>
                    <td><?=$goods['goods_number']?></td>
                </tr>
                <tr>
                    <td><a href="/show/goods/buy.html?goods_id=<?=$goods['goods_id']?>" class="btn btn-primary" role="button">点击购买</a></td>
               </tr>
                <tr>
                    <td><a href="/show/goods/index.html?goods_id=<?=$goods['goods_id']?>" class="btn btn-primary" role="button">收藏宝贝</a></td>

                </tr>
                <tr>
                    <td><a href="/show/goods/index.html?goods_id=<?=$goods['goods_id']?>" class="btn btn-primary" role="button">加入购物车</a></td>
                </tr>
            </table>
        </div>
</div>