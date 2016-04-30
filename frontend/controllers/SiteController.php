<?php
namespace frontend\controllers;

use common\models\User;
use frontend\models\ValidateEmailForm;
use Yii;
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

/**
 * Site controller
 */
class SiteController extends FrontendController
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
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
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Logs in a user.
     *
     * @return mixed
     */
    public function actionLogin()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post())) {
            $User = User::findOne(['username'=>$model->username]);
            if($User->email_validate_code!=''){
                Yii::$app->session->setFlash('error', Yii::t('common','Your account is not activity!'));
                Yii::$app->response->redirect(Yii::$app->urlManager->createUrl(['/site/validate-email', 'email'=>$User->email]));
            }else{
                if($model->login()){
                    return $this->goBack();
                }
            }
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return mixed
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
            } else {
                Yii::$app->session->setFlash('error', 'There was an error sending email.');
            }

            return $this->refresh();
        } else {
            return $this->render('contact', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Displays about page.
     *
     * @return mixed
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    /**
     * Signs user up.
     *
     * @return mixed
     */
    public function actionSignup()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->signup()) {
                $is_send = Yii::$app->mailer->compose(['html' => 'emailValidateToken-html', 'text' => 'emailValidateToken-text'], ['user' => $user])
                    ->setFrom([\Yii::$app->params['supportEmail'] => \Yii::$app->name . ' robot'])
                    ->setTo($model->email)
                    ->setSubject('Enable account for ' . \Yii::$app->name)
                    ->send();
                if($is_send){
                    $this->redirect(Yii::$app->urlManager->createUrl(['/site/validate-email','email'=>$user->email]));
                }else{}
            }
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }

    public function actionValidateEmail($email)
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $email_validate_code = Yii::$app->request->get('token');
        if($email_validate_code){
            $User = User::findOne(['email'=>$email, 'email_validate_code'=>$email_validate_code]);
            if(!$User){
                Yii::$app->session->setFlash('error', 'Incorrect validate code');
            }else{
                $User->email_validate_code = '';
                if($User->save()){
                    Yii::$app->session->setFlash('success', 'Your account is activity.');
                    if($User&&Yii::$app->getUser()->login($User)){
                        return $this->goHome();
                    }
                }else{
                    Yii::$app->session->setFlash('error', $User->getErrors());
                }
            }
        }
        if($email){
            Yii::$app->session->setFlash('success', 'A signup validate message has send to your email ('.$email.') .
            Place fill in the validate code below or click the validate link in you email .');
            $model = new ValidateEmailForm();
            $model->email = $email;
            return $this->render('validate-email',['model'=>$model]);
        }else{
            Yii::$app->session->setFlash('error', Yii::t('common','no user find by this email!'));
        }
    }

    /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
            } else {
                Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for email provided.');
            }
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }

    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'New password was saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }
}
