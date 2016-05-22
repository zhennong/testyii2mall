<?php

namespace frontend\modules\test\controllers;


/**
 * Default controller for the `test` module
 */
class DefaultController extends TestController
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * 自定义widget
     */
    public function actionTest1()
    {
        return $this->render('test1');
    }
}
