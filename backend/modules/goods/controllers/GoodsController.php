<?php

namespace backend\modules\goods\controllers;

use Yii;
use backend\modules\goods\models\Goods;
use backend\modules\goods\models\GoodsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use common\models\ThumbImg;

/**
 * GoodsController implements the CRUD actions for Goods model.
 */
class GoodsController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Goods models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new GoodsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * 是否上架的修改
     */
    public function actionUpStatus(){
        if (Yii::$app->request->isAjax) {
            $data = Yii::$app->request->post();
            $id = $data['id'];
            $status = $data['status'];
            $goods = Goods::findOne($id);
            $goods->status = $status;
            if ($goods->save()) {
                return "修改成功";
            }
        }
    }

    /**
     * Displays a single Goods model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Goods model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Goods();
        //文件上传路径设置
        Yii::$app->params['uploadPath'] = Yii::$app->basePath.'/web/images/uploads/';

        if ($model->load(Yii::$app->request->post())) {
            //提交的img信息
            $img      = UploadedFile::getInstance($model,'img');
            //img的后缀
            $img_ext  = end(explode(".",$img->name));
            //新的img文件名称
            $img_new  = Yii::$app->security->generateRandomString().".{$img_ext}";
            //原图存放的地址
            $path     = Yii::$app->params['uploadPath'].$img_new;
            $xthumb   = Yii::$app->params['uploadPath'].'x_'.$img_new;
            $dthumb   = Yii::$app->params['uploadPath'].'b_'.$img_new;
            //保存上传图片及生成缩略图
            if($img -> saveAs($path)) {
                $x_img = new ThumbImg($path, 200, 200, $xthumb);
                $d_img = new ThumbImg($path, 400, 400, $dthumb);
                $x_img->produce();
                $d_img->produce();

                //缩略图生成后删除原图
                unlink($path);
                $model->img    = '';
                $model->xthumb = '/images/uploads/x_' . $img_new;
                $model->dthumb = '/images/uploads/b_' . $img_new;
            }
            if ($model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        }
        return $this->render('create', [
            'model' => $model,
        ]);
    }
    /**
     * Updates an existing Goods model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Goods model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Goods model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Goods the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Goods::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
