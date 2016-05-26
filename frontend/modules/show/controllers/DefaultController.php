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
        $good  = Goods::find();
        $pages = new Pagination([
            //每页要显示的条数
            'defaultPageSize'=>4,
            'totalCount' => $good->where(['status'=>1])->count(),
        ]);
        $goods = $good->where(['status'=>1])
            ->orderBy('id')
            ->offset($pages->offset)
            ->limit($pages->limit)
            ->all();
        return $this->render('index',[
            'goods'=>$goods,
            'pages' => $pages,
        ]);
    }
}
