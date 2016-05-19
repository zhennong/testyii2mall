<?php

namespace backend\modules\cat\models;

use Yii;

/**
 * This is the model class for table "cat".
 *
 * @property integer $cat_id
 * @property string $cat_name
 * @property integer $pid
 */
class Cat extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cat';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cat_name'], 'required'],
            [['pid'], 'integer'],
            [['cat_name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'cat_id' => 'Cat ID',
            'cat_name' => 'Cat Name',
            'pid' => 'Pid',
        ];
    }
}
