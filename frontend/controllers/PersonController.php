<?php
namespace frontend\controllers;

use common\models\User;

use Yii;
use frontend\models\ValidateEmailForm;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use yii\base\Event;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;


class PersonController extends FrontendController{

    public function actionIndex(){
        return $this->render('index');
    }

    //上传头像
    public function actionAvatar(){
        return $this->render('avatar');
    }

}

