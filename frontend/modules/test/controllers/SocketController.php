<?php
/**
 * Created by PhpStorm.
 * User: wodrow
 * Date: 09/05/16
 * Time: 下午 03:45
 */

namespace frontend\modules\test\controllers;


class SocketController extends TestController
{
    public function actionIndex()
    {
        return $this->redirect(['test-fsocketopen']);
    }

    /**
     * file_get_contents
     * @return string
     */
    public function actionOpenWeb()
    {
        return $this->render('open-web');
    }

    public function actionTestFsocketopen()
    {
        return $this->render('test-fsocketopen');
    }
}