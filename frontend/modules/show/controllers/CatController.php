<?php
namespace frontend\modules\show\controllers;

use yii;
use yii\web\Controller;
use frontend\modules\show\models\Cat;
use frontend\modules\show\models\Goods;
use yii\data\Pagination;

class CatController extends Controller{

    //每页显示的条数，可以在这里直接修改
    public $pageSize = 3;

    /**
     * 栏目展示
     * @return string
     */
    public function actionIndex($cat_id){
        //如果是二级的栏目，取出pid为这个值的cat_id
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
        $db = Yii::$app->db;
        $sql  = 'SELECT * FROM goods WHERE `cat_id` IN ('.$data.') AND `status`=1';
        $goods = $db->createCommand($sql)->queryAll();
        if (empty($goods)){
            return $this->render('empty');
        }else{
            //分页
            $pages = new Pagination([
                //每页要显示的条数
                'defaultPageSize'=>$this->pageSize,
                'totalCount' => $db->createCommand($sql)->query()->count(),
            ]);
            $sql1 = 'SELECT * FROM goods WHERE `cat_id` IN ('.$data.') AND `status`=1 LIMIT '.$pages->limit.' OFFSET '.$pages->offset;
            $dats = $db->createCommand($sql1)->queryAll();
            return $this->render('index',[
                'goods'=>$dats,
                'pages' => $pages,
            ]);
        }
    }

}
