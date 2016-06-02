<?php
namespace frontend\modules\show\controllers;

use yii;
use yii\web\Controller;
use frontend\modules\show\models\Order;
use frontend\modules\persons\models\ReceiptAddress;
use frontend\modules\show\models\OrderGoods;
use frontend\modules\show\models\Goods;

class OrderController extends Controller{

    public function actionIndex(){
        $this->layout ='order.php';
        
        return $this->render('index');
    }



    public function actionCreate(){
        $this->layout ='order.php';

        $order = new Order();
        $orgod = new OrderGoods();
        if (Yii::$app->request->post()){
            if (!is_numeric($_POST['gid'])){
                $error = "非法的商品！";
                return $this->render('error',['error'=>$error]);
            }else{
                $goods  = Goods::findOne($_POST['gid']);
                $receipt = ReceiptAddress::findOne($_POST['receipt_id']);
                if(!$goods && $receipt){
                    $error = "抱歉, 商品信息出错！";
                    return $this->render('error',['error'=>$error]);
                }elseif ($goods->number<$_POST['num']){
                    $error = "抱歉，商品已被抢购完！";
                    return $this->render('error',['error'=>$error]);
                }
            }
            $order->code        = strtoupper(md5(time()+ mt_rand(100, 999)));
            $order->receipt_id  = $_POST['receipt_id'];
            $order->amount      = $_POST['num'] * $goods->shop_price;
            $order->add_time    = time();
            $order->update_time = time();
            $order->pay_time    = time();
            $order->status      = \frontend\modules\show\models\Order::STATUS_FA;
            $order->buyer_id    = $_POST['uid'];

            //事务处理这三个表有一个出现异常，全部回滚。
            $transaction = Yii::$app->db->beginTransaction();
            try{
                $order->save();
                $goods->number = $goods->number - $_POST['num'];
                //返回上次插入的主键值
                $orgod->order_id = $order->attributes['id'];
                $orgod->goods_id = $_POST['gid'];
                $orgod->goods_name = $goods->name;
                $orgod->goods_price = $goods->shop_price;
                $orgod->total = $_POST['num'];
                $orgod->amount = $order->amount;
                $orgod->add_time = $order->add_time;
                $orgod->update_time = $order->update_time;
                $orgod->save();
                $goods->save();
                $transaction->commit();
                return $this->render('index', ['order' => $order, 'orgod' => $orgod, 'goods' => $goods, 'receipt' => $receipt]);
            }catch (yii\db\Exception $e){
                $transaction->rollBack();
                return $e;
            }
        }
    }


    public function actionUpdate(){

    }
}
