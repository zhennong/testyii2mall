<?php
namespace frontend\modules\show\controllers;

use yii\web\Controller;
use frontend\modules\show\models\Goods;



class GoodsController extends Controller{

    /**
     * 商品展示
     */
    public function actionIndex($goods_id){
//        $goods = Goods::find()->where(['goods_id'=>$goods_id])->one();
        $goods = Goods::findOne($goods_id);
        return $this->render('index',['goods'=>$goods]);
    }

    /**
     * 商品购买
     */
    public function actionBuy($goods_id){
        return $this->render('buy',['goods'=>$goods_id]);
    }

}