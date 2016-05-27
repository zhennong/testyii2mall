<?php

namespace frontend\modules\persons\models;

use Yii;

/**
 * This is the model class for table "receipt_address".
 *
 * @property integer $id
 * @property integer $uid
 * @property string $consignee
 * @property string $telephone
 * @property string $receipt
 * @property string $address
 */
class ReceiptAddress extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'receipt_address';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['uid', 'consignee', 'telephone', 'receipt', 'address'], 'required'],
            [['uid'], 'integer'],
            [['consignee', 'telephone', 'receipt'], 'string', 'max' => 30],
            [['address'], 'string', 'max' => 32],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'uid' => '用户id',
            'consignee' => '收货人',
            'telephone' => '手机号码',
            'receipt' => '邮编',
            'address' => '收货地址',
        ];
    }
}
