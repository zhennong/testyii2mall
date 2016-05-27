<div class ="row">
    <p class="center-block">
    <h3 class="text-warning text-center">订单详情</h3>
    </p>
    <br>
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
        <tr class="active">
            <td>收货地址</td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td colspan="4">您还没有默认的收货地址&nbsp;&nbsp;  <a href="#"> (去添加）</a> | &nbsp;&nbsp;或者填写下面信息</td>
        </tr>
        <form class="form-inline">
        <tr>
            <td colspan="4">
            <div class="form-group">
                <input type="text" class="form-control"  placeholder="收货人姓名">
            </div>
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="收货人电话">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="收货地址">
                </div>
            </td>
        </tr>
        <tr>
        <td></td>
        <td></td>
        <td></td>
        <td><a class="btn btn-success" href="">确认购买</a></td>
        </tr>
        </form>
        </tbody>
    </table>
</div>