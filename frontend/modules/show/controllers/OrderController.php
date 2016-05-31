<?php
namespace frontend\modules\show\controllers;

use yii\web\Controller;
use frontend\modules\show\models\Order;

class OrderController extends Controller{

    public function actionIndex(){
        $order = Order::find();
        $order->code = md5(time());
        $this->layout ='order.php';

        $data = $_POST;

        return $this->render('index',['pos'=>$data]);
    }
    public function actionCreate(){

    }

}
