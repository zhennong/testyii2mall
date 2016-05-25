<?php

namespace frontend\modules\show\controllers;

use yii\web\Controller;
use frontend\modules\show\models\Cat;
use frontend\modules\show\models\Goods;
//分页
use yii\data\Pagination;

/**
 * Default controller for the `show` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        $data = '';
        $cat  = new Cat();
        $c1   = $cat->find()->where(['pid'=>0])->all();
        //第一层
        foreach ($c1 as $p1){
            $c2 = $cat->find()->where(['pid'=>$p1['id']])->all();
            if(empty($c2)){
                $data .= "<li><a href=\"#\">{$p1['name']}</a></li>";
            }else{
                $data .= "<li class=\"dropdown\"><a data-toggle=\"dropdown\" href=\"#\">{$p1['name']}<span class=\"caret\"></span></a><ul class=\"dropdown-menu\">";
                $cid_2 = end($c2)->id;
                //第二层
                foreach($c2 as $p2){
                    $c3 = $cat->find()->where(['pid'=>$p2['id']])->all();
                    if(empty($c3)){
                        if($p2['id'] == $cid_2){
                            $data .= "<li><a href=\"#\">{$p2['name']}</a></li></ul></li>";
                        }else{
                            $data .= "<li><a href=\"#\">{$p2['name']}</a></li>";
                        }
                    }else{
                        $data .= "<li><a href=\"#\">{$p2['name']}</a>";
                        $cid_3 = end($c3)->id;
                        //第三层
                        foreach($c3 as $p3){
                            if($p3['id'] == $cid_3){
                                if($p2['id'] == $cid_2){
                                    $data .= "[ <span><a href=\"\">{$p3['name']}</a></span> ]</li></ul></li>";
                                }else{
                                    $data .= "[ <span><a href=\"\">{$p3['name']}</a></span> ]</li>";
                                }
                            }else{
                                $data .= "[ <span><a href=\"\">{$p3['name']}</a></span> ]";
                            }
                        }

                    }
                }
            }
        }
        $good  = Goods::find();
        $pages = new Pagination([
            //每页要显示的条数
            'defaultPageSize'=>4,
            'totalCount' => $good->count(),
        ]);
        $goods = $good->orderBy('id')
            ->offset($pages->offset)
            ->limit($pages->limit)
            ->all();
        return $this->render('index',[
            'cats'=>$data,
            'goods'=>$goods,
            'pages' => $pages,
        ]);
    }
}
