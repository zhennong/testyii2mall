<?php

namespace frontend\modules\show\models;

use Yii;

/**
 * This is the model class for table "order".
 *
 * @property integer $id
 * @property string $code
 * @property integer $status
 * @property integer $buyer_id
 * @property integer $receipt_id
 * @property double $amount
 * @property integer $pay_type
 * @property integer $add_time
 * @property integer $update_time
 * @property integer $pay_time
 *
 * @property OrderGoods[] $orderGoods
 */
class Order extends \yii\db\ActiveRecord
{
    const STATUS_FU = 0 ;    //等待买家付款
    const STATUS_FA = 1 ;    //买家已付款，等待卖家发货
    const STATUS_GO = 2 ;    //卖家已发货，配送中
    const STATUS_SH = 3 ;    //已收货


    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'order';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['code', 'buyer_id', 'receipt_id', 'add_time', 'update_time', 'pay_time'], 'required'],
            [['status', 'buyer_id', 'receipt_id', 'pay_type', 'add_time', 'update_time', 'pay_time'], 'integer'],
            [['amount'], 'number'],
            [['code'], 'string', 'max' => 32],
            [['code'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'code' => 'Code',
            'status' => 'Status',
            'buyer_id' => 'Buyer ID',
            'receipt_id' => 'Receipt ID',
            'amount' => 'Amount',
            'pay_type' => 'Pay Type',
            'add_time' => 'Add Time',
            'update_time' => 'Update Time',
            'pay_time' => 'Pay Time',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrderGoods()
    {
        return $this->hasMany(OrderGoods::className(), ['order_id' => 'id']);
    }
}
