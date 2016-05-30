<div class ="row">
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
            <td>价格</td>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td><?=$goods['name']?></td>
            <td><img style="width: 50px;height: 50px;" src="<?=Yii::$app->params['backUrl'].$goods['xthumb']?>"></td>
            <td>共 1 件</td>
            <td><?=$goods['shop_price']?></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td>总计 ：</td>
            <td>&yen; <?=$goods['shop_price']?></td>
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
            <td>收货人</td>
            <td>电话</td>
            <td>邮编</td>
            <td>地址</td>
        </tr>
        </thead>
        <tbody>
        <?php if(!$so){?>
        <tr>
            <td colspan="4">您还没有默认的收货地址&nbsp;&nbsp;  <a href="/persons/receipt-address/create.html"> (去添加）</a></td>
        </tr>
            <tr>
                <td colspan="4" class="text-right">
                    <button type="button" class="btn  btn-success" disabled="disabled">确认购买</button>
                </td>
            </tr>
        <?php } else{?>
            <?php foreach ($addr as $a){?>
            <tr>
                <td><?=$a['consignee']?></td>
                <td><?=$a['telephone']?></td>
                <td><?=$a['receipt']?></td>
                <td><?=$a['address']?></td>
                <?php $aid = $a['id']?>
            </tr>
            <?php }?>
            <tr>
                <td colspan="4" class="text-right"><a href="/persons/receipt-address/update.html?id=<?=$id?>">修改</a> &nbsp;&nbsp;|&nbsp;&nbsp; <a href="">添加</a></td>
            </tr>
            <form action="" method="post">
            <tr>
                <input type="hidden" name="uid" value="<?=$id?>">
                <input type="hidden" name="gid" value="<?=$gid?>">
                <input type="hidden" name="aid" value="<?=$aid?>">
                <input type="hidden" name="num" value="1">
                <td colspan="4" class="text-right"><button type="submit" class="btn btn-success">确认购买</button></td>
            </tr>
            </form>
        <?php }?>
        <?}?>
        </tbody>
    </table>
</div>