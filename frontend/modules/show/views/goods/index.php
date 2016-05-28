<?php
$this->title = Yii::t('common','testyii2mall');
?>
<br>
<div class="row">
    <div class="col-md-5">
        <img src=<?=Yii::$app->params['backUrl'].$goods['dthumb']?> alt="">
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
                        <?=$goods['name']?>
                    </td>
                </tr>
                <tr>
                    <td>商品价格:</td>
                    <td>&yen;&nbsp;<?=$goods['shop_price']?>元</td>
                </tr>
                <tr>
                    <td>商品数量:</td>
                    <td><?=$goods['number']?></td>
                </tr>
                <tr>
                    <td><a href="/show/goods/buy.html?goods_id=<?=$goods['id']?>" class="btn btn-primary" role="button">点击购买</a></td>
               </tr>
                <tr>
                    <td><a href="/show/goods/ceshi.html?goods_id=<?=$goods['id']?>" class="btn btn-primary" role="button">收藏宝贝</a></td>

                </tr>
                <tr>
                    <td><a class="btn btn-primary" role="button" onclick="Add()">加入购物车</a></td>
                </tr>
            </table>
     </div>
    <script>
        function Add(){
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
</div>
