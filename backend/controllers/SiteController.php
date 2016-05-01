<?php
namespace backend\controllers;

use common\models\User;
use Yii;
use yii\filters\AccessControl;
use common\models\LoginForm;
use yii\filters\VerbFilter;

/**
 * Site controller
 */
class SiteController extends BackendController
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['login', 'error'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'index'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionLogin()
    {
        $this->layout = 'main-login';
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post())) {
            $User = User::findOne(['username'=>$model->username]);
            if(!$User->is_admin > User::IS_ADMIN_FALSE){
                Yii::$app->session->setFlash('error', Yii::t('common','Your account is not an administrator!'));
                return $this->goBack();
            }
            if($User->email_validate_code!=User::EMAIL_ENABLE){
                Yii::$app->session->setFlash('error', Yii::t('common','Your account is not activity!'));
                Yii::$app->response->redirect(Yii::$app->params['frontUrl'].Yii::$app->urlManager->createUrl(['/site/validate-email', 'email'=>$User->email]));
            }else{
                if($model->login()){
                    return $this->goHome();
                }
            }
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }
}
