<?php

namespace frontend\modules\persons\models;
use common\models\User;
use frontend\modules\persons\models\Area;
use Yii;

/**
 * This is the model class for table "user_information".
 *
 * @property integer $user_id
 * @property string $avatar
 * @property string $nickname
 * @property integer $sex
 * @property integer $birthday
 * @property string $main_page
 * @property string $telephone
 * @property string $mobilephone
 * @property string $qq
 * @property string $country
 * @property integer $area_id
 * @property string $address
 * @property string $company
 * @property string $personalized_signature
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property User $user
 */
class UserInformation extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public $province_area_id =0;
    public $city_area_id =0;
    public $county_area_id =0;

    public static function tableName()
    {
        return 'user_information';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'nickname','created_at', 'updated_at'], 'required'],
            [['user_id', 'sex', 'birthday', 'area_id', 'created_at', 'updated_at'], 'integer'],
            [['avatar', 'main_page', 'qq', 'country', 'address', 'company', 'personalized_signature'], 'string', 'max' => 255],
            [['nickname'], 'string', 'max' => 16],
            [['telephone'], 'string', 'max' => 13],
            [['mobilephone'], 'string', 'max' => 11],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'user_id' => Yii::t('common', 'user_id'),
            'avatar' => Yii::t('common', 'avatar'),
            'nickname' => Yii::t('common', 'nickname'),
            'sex' => Yii::t('common', 'sex'),
            'birthday' => Yii::t('common', 'birthday'),
            'main_page' => Yii::t('common', 'main_page'),
            'telephone' => Yii::t('common', 'telephone'),
            'mobilephone' => Yii::t('common', 'mobilephone'),
            'qq' => Yii::t('common', 'qq'),
            'country' => Yii::t('common', 'country'),
            'area_id' => Yii::t('common', 'area_id'),
            'address' => Yii::t('common', 'address'),
            'company' => Yii::t('common', 'company'),
            'personalized_signature' => Yii::t('common', 'personalized_signature'),
            'created_at' => Yii::t('common', 'created_at'),
            'updated_at' => Yii::t('common', 'updated_at'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    public function afterFind(){
        parent::afterFind();
        $this->setProvinceCityCounty($this->area_id);
    }

    private function setProvinceCityCounty($area_id)
    {
        $Area = new Area();
        $area_info = $Area::findOne($area_id);
        if($area_info){
            switch($area_info->level){
                case 1:
                    $this->province_area_id = $area_info->id;
                    break;
                case 2:
                    $this->province_area_id = $area_info->pid;
                    $this->city_area_id = $area_info->id;
                    break;
                case 3:
                    //$this->province_area_id = $Area::getParentId($area_info->pid);
                    //$this->city_area_id = $area_info->pid;
                    //$this->county_area_id = $area_info->id;
                    break;
            }
        }
    }
}
