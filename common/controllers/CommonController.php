<?php
/**
 * Created by PhpStorm.
 * User: wodrow
 * Date: 01/05/16
 * Time: 上午 10:51
 */

namespace common\controllers;


use yii\web\Controller;

class CommonController extends Controller
{
    protected $_user_id;

    public function init()
    {
        parent::init(); // TODO: Change the autogenerated stub
        $this->_user_id = \Yii::$app->user->identity?\Yii::$app->user->identity->getId():null;
    }
}