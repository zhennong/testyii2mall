    <p class="center-block">
    <h3 class="text-warning text-left">订单详情</h3>
    </p>
    <br>
    <!--    订单部分 start-->
    <table class="table" style="text-align: center">
        <thead>
        <tr class="bg-primary">
            <td>名称</td>
            <td>图片</td>
            <td>数量</td>
            <td>单价格</td>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td><?=$goods['name']?></td>
            <td><img style="width: 50px;height: 50px;" src="<?=Yii::$app->params['backUrl'].$goods['xthumb']?>"></td>
            <td>共<button id="down" onclick="dj()"> - </button>&nbsp;<input style="width:30px;"  type="text" value="<?=$num?>" id="dbox">&nbsp;&nbsp;<button onclick="dz()">+</button>件</td>

            <td><?=$goods['shop_price']?></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td id="bbb">总计 : &yen;<?=$num*$goods['shop_price']?>元</td>
        </tr>
        <?php if(is_null($id)){?>
            <tr class="active">
                <td colspan="4"><a href="/site/login.html">登录</a> 后才能下单哦！</td>
            </tr>
            <tr>
                <td colspan="4" class="text-right">
                    <button type="button" class="btn  btn-success" disabled="disabled">确认购买</button>
                </td>
            </tr>
        <?}else{?>
        </tbody>
    </table>
    <!--    订单结束-->
    <hr>
    <p class="center-block">
    <h3 class="text-warning text-left">收货地址</h3>
    </p>
    <br>
    <table class="table" style="text-align: center">
        <thead>
        <tr class="active">
            <td>选择</td>
            <td>收货人</td>
            <td>电话</td>
            <td>邮编</td>
            <td>地址</td>
        </tr>
        </thead>
        <tbody>
        <?php if(!$so){?>
            <tr>
                <td colspan="5">您还没有默认的收货地址&nbsp;&nbsp;  <a href="/persons/receipt-address/create.html"> (去添加）</a></td>
            </tr>
            <tr>
                <td colspan="5" class="text-right">
                    <button type="button" class="btn  btn-success" disabled="disabled">确认购买</button>
                </td>
            </tr>
        <?php } else{?>
            <form action="/show/order/create.html" method="post">
        <?php foreach ($addr as $a){?>
            <tr>
                <td><input  type="radio" name="receipt_id" checked="checked" value="<?=$a['id']?>"></td>
                <td><?=$a['consignee']?></td>
                <td><?=$a['telephone']?></td>
                <td><?=$a['receipt']?></td>
                <td><?=$a['address']?> &nbsp;&nbsp;&nbsp;&nbsp;
                    (<a href="/persons/receipt-address/update.html?id=<?=$a['id']?>">修改</a>)</td>
            </tr>
        <?php }?>
            <tr>
                <td colspan="5" class="text-right">
                    &nbsp;&nbsp;&nbsp;&nbsp; <a href="/persons/receipt-address/create.html"><b>添加</b></a></td>
            </tr>
                <tr>
                    <input type="hidden" name="uid" value="<?=$id?>">
                    <input type="hidden" name="gid" value="<?=$gid?>">
                    <input type="hidden" name="num" id="num" value="<?=$num?>">
                    <input name="_csrf" type="hidden" id="_csrf" value="<?= Yii::$app->request->csrfToken ?>">
                    <td colspan="5" class="text-right"><button type="submit" class="btn btn-success">确认购买</button></td>
                </tr>
            </form>
        <?php }?>
        <?}?>
        </tbody>
    </table>
<script>
    //获取td标签
    var b    = document.getElementById('bbb');
    //商品的单个价格
    var pice = <?=$goods['shop_price']?>;
    //隐藏表单的 num
    var hidd = document.getElementById('num');
    function dj(){
        //获取数量的input标签
        var a = document.getElementById('dbox');
        var av = parseInt(a.value);
        var gnum = <?=$gnum?>;
        if(av > 1){
            if (av > gnum){
                a.value = 1;
            }else{
                a.value = av - 1;
            }
            hidd.value = a.value;
            var num =  a.value * pice;
            b.innerHTML ='总计 &yen; '+ num +' 元';
        }
    }
    function dz() {
        var a  = document.getElementById('dbox');
        var av = parseInt(a.value);
        var gnum = <?=$gnum?>;
        if (av < gnum){
            a.value = av +1 ;
            hidd.value = a.value;
        }else{
            a.value = gnum;
            hidd.value = a.value;
        }
        var num =  a.value * pice;
        b.innerHTML ='总计 &yen; '+ num +' 元';
    }
</script>
