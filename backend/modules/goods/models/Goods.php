<?php

namespace backend\modules\goods\models;

use Yii;

/**
 * This is the model class for table "goods".
 *
 * @property integer $goods_id
 * @property integer $cat_id
 * @property string $goods_name
 * @property integer $shop_price
 * @property integer $goods_number
 * @property string $goods_desc
 * @property string $goods_img
 * @property string $goods_thumb
 */
class Goods extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'goods';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cat_id', 'goods_name', 'shop_price', 'goods_desc'], 'required'],
            [['cat_id', 'shop_price', 'goods_number'], 'integer'],
            [['goods_desc'], 'string'],
            [['goods_name', 'goods_img', 'goods_thumb'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'goods_id' => 'Goods ID',
            'cat_id' => 'Cat ID',
            'goods_name' => 'Goods Name',
            'shop_price' => 'Shop Price',
            'goods_number' => 'Goods Number',
            'goods_desc' => 'Goods Desc',
            'goods_img' => 'Goods Img',
            'goods_thumb' => 'Goods Thumb',
        ];
    }
}
