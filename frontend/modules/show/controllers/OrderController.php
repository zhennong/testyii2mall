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
                return "出错";
            }else{
                $goods  = Goods::findOne($_POST['gid']);
                $receipt = ReceiptAddress::findOne($_POST['receipt_id']);
                if(!$goods && $receipt){
                    return "找不到";
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
            if ($order->save()){
//                var_dump($order);exit;
                //返回上次插入的主键值
                $orgod->order_id    = $order->attributes['id'];
                $orgod->goods_id    = $_POST['gid'];
                $orgod->goods_name  = $goods->name;
                $orgod->goods_price = $goods->shop_price;
                $orgod->total       = $_POST['num'];
                $orgod->amount      = $order->amount;
                $orgod->add_time    = $order->add_time;
                $orgod->update_time = $order->update_time;
                if ($orgod->save()){
                    return $this->render('index',['order'=>$order,'orgod'=>$orgod,'goods'=>$goods,'receipt'=>$receipt]);
                }
            }

        }
    }


    public function actionUpdate(){

    }
}
