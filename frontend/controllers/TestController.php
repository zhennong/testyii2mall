<?php
/**
 * Created by PhpStorm.
 * User: wodrow
 * Date: 4/29/16
 * Time: 9:22 PM
 */

namespace frontend\controllers;


class TestController extends FrontendController
{
    public function actionIndex()
    {
        #
    }

    public function actionTest1()
    {
        #
    }

    /**
     * a sign up test
     * @return string
     */
    public function actionTestSignup()
    {
        return $this->render('test-signup');
    }
}