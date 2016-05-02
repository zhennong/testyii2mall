<?php
namespace common\models;

use Yii;
use yii\base\Model;

/**
 * Login form
 * @property $username
 * @property $password
 * @property $verifyCode
 * @property $rememberMe
 */
class LoginForm extends Model
{
    public $username;
    public $password;
    public $verifyCode;
    public $rememberMe = true;

    private $_user;

    public function attributeLabels()
    {
        return [
            'username' => Yii::t('common', 'Username'),
            'password' => Yii::t('common', 'Password'),
            'rememberMe' => Yii::t('common', 'Remember Me'),
        ];
    }
    
    public function rules()
    {
        return [
            // username and password are both required
            [['username', 'password'], 'required'],
            // rememberMe must be a boolean value
            ['rememberMe', 'boolean'],
            // password is validated by validatePassword()
            ['password', 'validatePassword'],
            // email validate?
            ['password', 'isEmailValidate'],
            ['verifyCode', 'captcha'],
        ];
    }

    /**
     * Validates the password.
     * This method serves as the inline validation for password.
     *
     * @param string $attribute the attribute currently being validated
     * @param array $params the additional name-value pairs given in the rule
     */
    public function validatePassword($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $user = $this->getUser();
            if (!$user || !$user->validatePassword($this->password)) {
                $this->addError($attribute, 'Incorrect username or password.');
            }
        }
    }

    /**
     * check email active or not
     * @param $attribute
     */
    public function isEmailValidate($attribute)
    {
        $User = User::findOne(['username'=>$this->username]);
        if($User&&$User->email_validate_code!=''){
            $error_msg = Yii::t('common','Your email is not activity!');
            $this->addError($attribute, $error_msg);
            Yii::$app->response->redirect(Yii::$app->params['frontUrl'].Yii::$app->urlManager->createUrl(['/site/validate-email', 'email'=>$User->email, 'error_msg'=>$error_msg]));
        }
    }

    /**
     * Logs in a user using the provided username and password.
     *
     * @return boolean whether the user is logged in successfully
     */
    public function login()
    {
        if ($this->validate()) {
            return Yii::$app->user->login($this->getUser(), $this->rememberMe ? 3600 * 24 * 30 : 0);
        } else {
            return false;
        }
    }

    /**
     * Finds user by [[username]]
     *
     * @return User|null
     */
    protected function getUser()
    {
        if ($this->_user === null) {
            $this->_user = User::findByUsername($this->username);
        }

        return $this->_user;
    }
}
