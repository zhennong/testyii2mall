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
                    <td>选择数量：</td>
                    <td><button id="down" onclick="dj()"> - </button>&nbsp;<input style="width:30px;"  type="text" value="1" id="dbox">&nbsp;&nbsp;<button onclick="dz()">+</button></td>
                </tr>
                <tr>
                    <td>
                        <a id="url" href="/show/goods/buy.html?goods_id=<?=$goods['id']?>&num=1" class="btn btn-primary" role="button">点击购买</a>
                        &nbsp;&nbsp;<a class="btn btn-primary" role="button" onclick="Add()">加入购物车</a>
                        &nbsp;&nbsp;<a href="/show/goods/ceshi.html?goods_id=<?=$goods['id']?>" class="btn btn-primary" role="button">收藏宝贝</a>
                    </td>
                </tr>
            </table>
     </div>
    <script>
        var url = document.getElementById('url');
        //数量加减
        function dj(){
            //获取数量的input标签
            var a = document.getElementById('dbox');
            if(parseInt(a.value) > 1){
                a.value = parseInt(a.value) - 1;
                url.href = '';
                url.href = "/show/goods/buy.html?goods_id=<?=$goods['id']?>&num=" +a.value;
            }
        }
        function dz() {
            var a = document.getElementById('dbox');
            a.value = parseInt(a.value) + 1;
            url.href = '';
            url.href = "/show/goods/buy.html?goods_id=<?=$goods['id']?>&num=" +a.value;
        }
        //加入购物车
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
