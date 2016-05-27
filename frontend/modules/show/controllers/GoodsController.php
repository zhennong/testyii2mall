<?php
namespace frontend\modules\show\controllers;

use yii\web\Controller;
use frontend\modules\show\models\Goods;
use frontend\modules\show\models\Cat;
use yii\web\NotFoundHttpException;

class GoodsController extends Controller{

    /**
     * 商品展示
     */
    public function actionIndex($goods_id){
        $goods = Goods::findOne($goods_id);
        if ($goods){
            return $this->render('index',['goods'=>$goods]);
        }else{
            throw new NotFoundHttpException();
        }
    }

    /**
     * 商品购买
     */
    public function actionBuy($goods_id){
        $goods = Goods::findOne($goods_id);
//        var_dump($goods);exit();
        return $this->render('buy',['goods'=>$goods]);
    }

    public function actionCeshi(){
        echo "这是事件处理<br>";
        $cat = new Cat();
        $this->on('zaoshang',[$cat,'zao'],'早上吃的什么?');
        $this->on('zhongwu',['\frontend\modules\show\models\Cat','zhong'],'中午吃的什么?');
        $this->on('wanshang',function(){
            echo "小明,你妈炸了";
        });
        $this->trigger('zaoshang');
        $this->trigger('zhongwu');
        $this->trigger('wanshang');

    }

}