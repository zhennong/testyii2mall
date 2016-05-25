<?php

namespace frontend\modules\persons\controllers;

use Yii;
use frontend\modules\persons\models\UserInformation;
use frontend\modules\persons\models\UserInformationSearch;
use frontend\modules\persons\models\Area;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\models\User;
use common\models\AccountForm;

/**
 * UserInfoController implements the CRUD actions for UserInformation model.
 */
class UserInformationController extends Controller
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
     * Lists all UserInformation models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new UserInformationSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single UserInformation model.
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
     * Creates a new UserInformation model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new UserInformation();
        if($model->load(Yii::$app->request->post())){
            $uid = Yii::$app->user->id;
            $model->user_id = $uid;
            $model->avatar = "/images/icon/uid{$uid}.png";
            $model->area_id = $_POST['UserInformation']['area_id'];
            $model->created_at = time();
            $model->updated_at = time();
            if($model->save()){
                return $this->redirect(['view', 'id' => $model->user_id]);
            }
        }
        return $this->render('create',['model'=>$model]);
    }

    /**
     * Updates an existing UserInformation model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        if($model->load(Yii::$app->request->post())){
            $model->area_id = $_POST['UserInformation']['area_id'];
            $model->updated_at = time();
            //var_dump($_POST);exit();
            if($model->save()){
                return $this->redirect(['view', 'id' => $model->user_id]);
            }
        }
        return $this->render('update',['model'=>$model]);
    }

    /**
     * Deletes an existing UserInformation model.
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
     * Finds the UserInformation model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return UserInformation the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = UserInformation::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    

}
