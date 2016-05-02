<?php

/**
 * Created by PhpStorm.
 * User: wodrow
 * Date: 02/05/16
 * Time: 上午 08:29
 */

namespace backend\models;

use Yii;
use common\models\User;

/**
 * Class LoginForm
 * @property $verifyCode
 */
class LoginForm extends \common\models\LoginForm
{
    public function rules()
    {
        $rules = array_merge(parent::rules(), [
            ['username', 'isAdmin'],
        ]);
        return $rules;
    }

    public function isAdmin($attribute)
    {
        $User = User::findOne(['username'=>$this->username]);
        if($User&&$User->is_admin<1){
            $this->addError($attribute, Yii::t('common','Your account is not an administrator!'));
        }
    }
}