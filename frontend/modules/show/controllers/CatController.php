<?php
namespace frontend\modules\show\controllers;

use yii\web\Controller;
use frontend\modules\show\models\Cat;
use frontend\modules\show\models\Goods;
use yii\web\NotFoundHttpException;

class CatController extends Controller{

    public function actionIndex($cat_id){
        $good  = new Goods();
        $goods = $good->find()->where(['cat_id'=>$cat_id,'status'=>1]);
        if (is_null($goods)){
            throw new NotFoundHttpException();
        }else{
            return $this->render('index');
        }
    }

}
