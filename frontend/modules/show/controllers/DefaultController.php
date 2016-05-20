<?php

namespace frontend\modules\show\controllers;

use yii\web\Controller;
use frontend\modules\show\models\Cat;

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
        //本来准备用递归做,样式没法循环,所以这里做三层循环(只管三层).
        $data = '';

        $cat  = new Cat();
        $c1 = $cat->find()->where(['pid'=>0])->all();
        foreach($c1 as $p1){
            $data .="<li role=\"presentation\" class=\"dropdown\">
            <a class=\"dropdown-toggle\" data-toggle=\"dropdown\" href=\"#\" role=\"button\" aria-haspopup=\"true\" aria-expanded=\"false\">
                {$p1['cat_name']} <span class=\"caret\"></span></a>";

            $c2 = $cat->find()->where(['pid'=>$p1['cat_id']])->all();
            if(empty($c2)){
                $data .="</li>";
            }
            foreach($c2 as $p2){
                $data .="<ul class=\"dropdown-menu\">
                <li role=\"presentation\"><a href=\"/show/cat/{$p2['cat_id']}.html\">{$p2['cat_name']}</a>";

                $c3 = $cat->find()->where(['pid'=>$p2['cat_id']])->all();
                if(empty($c3)){
                    $data .="</ul></li>";
                }
                foreach($c3 as $p3){
                    $data .= "| <span><a href=\"/show/cat/{$p3['cat_id']}.html\">{$p3['cat_name']}</a></span> ";
                }
                $data .="</ul></li></li>";
            }
        }
        //var_dump($data);exit();
        //$cats = $cat->shows();
        return $this->render('index',['data'=>$data]);
    }
}
