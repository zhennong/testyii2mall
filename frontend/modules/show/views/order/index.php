
    <h3 class="text-success text-center">购买成功</h3>
    <br>
<table class="table table-bordered table-striped">
    <thead>
    <tr>
        <td colspan="5" class="text-left">订单信息</td>
    </tr>
    </thead>
    <tbody>
    <tr>

        <td>订单编号</td>
        <td><?=$order->code?></td>
        <td colspan="3"></td>
    </tr>
    <tr>
        <td>订单日期</td>
        <td><?=date('Y-m-d H:i',$order->add_time)?></td>
        <td>支付日期</td>
        <td><?=date('Y-m-d H:i',$order->pay_time)?></td>
        <td></td>
    </tr>
    <tr>
        <td>收货地址</td>
        <td><?=$receipt->address?></td>
        <td>邮编 :<?=$receipt->receipt?></td>
        <td>收件人 :<?=$receipt->consignee?> </td>
        <td>电话 ：<?=$receipt->telephone?></td>
    </tr>
    <tr>
        <td colspan="5">订单详情</td>
    </tr>
    <tr>
        <td>商品</td>
        <td>状态</td>
        <td>单价(元)</td>
        <td>数量</td>
        <td>总价</td>
    </tr>
    <tr>
        <td>
            <img style="width: 25px;height: 25px;" src="<?=Yii::$app->params['backUrl'].$goods->xthumb?>">
            &nbsp;&nbsp;<?=$orgod->goods_name?>
        </td>
        <td>已付款，等待商家发货</td>
        <td><?=$orgod->goods_price?></td>
        <td><?=$orgod->total?></td>
        <td><?=$orgod->amount?></td>
    </tr>
    </tbody>
</table>