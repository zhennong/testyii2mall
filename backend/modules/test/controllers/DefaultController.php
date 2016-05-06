<?php

namespace backend\modules\test\controllers;

use Yii;
use kartik\mpdf\Pdf;
use yii\web\Controller;

/**
 * Default controller for the `test` module
 */
class DefaultController extends Controller
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
     * mpdf
     * @return string
     */
    public function actionTest1()
    {
        /*$pdf = Yii::$app->mpdf;
        $pdf->content = $this->renderPartial('test1');
        return $pdf->render();*/
        return $this->render('test1');
    }

    /**
     * grid
     * @return string
     */
    public function actionTest2()
    {
        return $this->render('test2');
    }
}
