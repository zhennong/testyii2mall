<?php
namespace frontend\modules\show\controllers;

use yii;
use yii\web\Controller;
use frontend\modules\show\models\Cat;
use frontend\modules\show\models\Goods;
use yii\data\Pagination;

class CatController extends Controller{

    public function actionIndex($cat_id){

        $cat   = new Cat();
        $data  = $cat_id.',';
        $cats  = $cat->find()->select(['id'])->where(['pid'=>$cat_id])->all();

        if(empty($cats)){
            $data =$cat_id;
        }else{
            foreach ($cats as $c){
                $data .= $c->id.',';
            }
            $data  = rtrim($data,',');
        }
        $sql  = 'SELECT * FROM goods WHERE `cat_id` IN ('.$data.') AND `status`=1';
        $goods = Goods::findBySql($sql)
            ->all();
        if (empty($goods)){
            return $this->render('empty');
        }else{
            $pages = new Pagination([
                //每页要显示的条数
                'defaultPageSize'=>3,
                'totalCount' => Goods::findBySql($sql)->count(),
            ]);
            $data = Goods::findBySql($sql)
                ->orderBy('id')
                ->offset($pages->offset)
                ->limit($pages->limit)
                ->all();
            return $this->render('index',[
                'goods'=>$data,
                'pages' => $pages,
            ]);
        }
    }

}
