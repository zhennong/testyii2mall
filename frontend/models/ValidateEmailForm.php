<?php
/**
 * Created by PhpStorm.
 * User: wodrow
 * Date: 30/04/16
 * Time: 下午 03:24
 */

namespace frontend\models;

use Yii;
use yii\base\Model;

class ValidateEmailForm extends Model
{
    public $email;
    public $email_validate_code;

    public function attributeLabels()
    {
        return [
            'email' => Yii::t('common', 'Email'),
            'email_validate_code' => Yii::t('common', 'Email Validate Code'),
        ];
    }

    public function rules()
    {
        return [
            ['email', 'filter', 'filter' => 'trim'],
            ['email_validate_code', 'required'],
            ['email_validate_code', 'string', 'max' => 32, 'min'=>32],
        ];
    }
}