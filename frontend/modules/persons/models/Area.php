<?php

namespace frontend\modules\persons\models;

use Yii;

/**
 * This is the model class for table "area".
 *
 * @property integer $id
 * @property string $name
 * @property integer $pid
 * @property string $code
 * @property integer $level
 * @property string $typename
 */
class Area extends \yii\db\ActiveRecord
{
    public $select_head = [
        ["id"=>0, "name"=>"请选择"],
        ["id"=>0, "name"=>"请选择省"],
        ["id"=>0, "name"=>"请选择市"],
        ["id"=>0, "name"=>"请选择区"],
    ];
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'area';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['pid', 'level'], 'integer'],
            [['name'], 'string', 'max' => 45],
            [['code'], 'string', 'max' => 5],
            [['typename'], 'string', 'max' => 4],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'pid' => 'Pid',
            'code' => 'Code',
            'level' => 'Level',
            'typename' => 'Typename',
        ];
    }
    /**
     * 获取子列表
     * @param $pid
     * @return static[]
     */
    public static function getChildrenList($pid,$level=0)
    {
        $x[] = (new static)->select_head[$level];
        return array_merge($x,static::findAll(['pid'=>$pid]));
    }
}
