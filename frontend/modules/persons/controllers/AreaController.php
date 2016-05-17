<?php
namespace frontend\modules\persons\controllers;

use yii\web\Controller;
use yii\helpers\Html;
use frontend\modules\persons\models\Area;

class AreaController extends Controller{

    public function actionAjaxArea(){
        if(\Yii::$app->request->isAjax){
            $pid = \Yii::$app->request->post('pid');
            $level = \Yii::$app->request->post('level');
            $area_children = Area::getChildrenList($pid,$level);
            $option = "";
            if(count($area_children)>0){
                foreach($area_children as $k => $v){
                    $option .= Html::tag('option',Html::encode($v['name']),['value'=>$v['id']]);
                }
            }
            echo $option;
        }
    }
}