<?php

namespace backend\modules\goods\models;
use Yii;

/**
 * This is the model class for table "goods".
 *
 * @property integer $id
 * @property integer $cat_id
 * @property string $name
 * @property integer $shop_price
 * @property integer $number
 * @property string $desc
 * @property string $img
 * @property string $xthumb
 * @property string $dthumb
 * @property integer $status
 */
class Goods extends \yii\db\ActiveRecord
{
    const STATUS_DEFAULT = 0 ;
    const STATUS_UP      = 1 ;
    const STATUS_DOWN    = 2 ;

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
            [['cat_id', 'name', 'shop_price', 'desc',], 'required'],
            [['cat_id', 'shop_price', 'number', 'status'], 'integer'],
            [['desc','xthumb', 'img','dthumb'], 'string'],
            [['name', 'img', 'xthumb', 'dthumb'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'cat_id' => 'Cat ID',
            'name' => 'Name',
            'shop_price' => 'Shop Price',
            'number' => 'Number',
            'desc' => 'Desc',
            'img' => 'Img',
            'xthumb' => 'Xthumb',
            'dthumb' => 'Dthumb',
            'status' => 'Status',
        ];
    }
}
