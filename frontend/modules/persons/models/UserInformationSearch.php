<?php

namespace frontend\modules\persons\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\modules\persons\models\UserInformation;

/**
 * UserInformationSearch represents the model behind the search form about `frontend\models\UserInformation`.
 */
class UserInformationSearch extends UserInformation
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'sex', 'birthday', 'area_id', 'created_at', 'updated_at'], 'integer'],
            [['avatar', 'nickname', 'main_page', 'telephone', 'mobilephone', 'qq', 'country', 'address', 'company', 'personalized_signature'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = UserInformation::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'user_id' => $this->user_id,
            'sex' => $this->sex,
            'birthday' => $this->birthday,
            'area_id' => $this->area_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'avatar', $this->avatar])
            ->andFilterWhere(['like', 'nickname', $this->nickname])
            ->andFilterWhere(['like', 'main_page', $this->main_page])
            ->andFilterWhere(['like', 'telephone', $this->telephone])
            ->andFilterWhere(['like', 'mobilephone', $this->mobilephone])
            ->andFilterWhere(['like', 'qq', $this->qq])
            ->andFilterWhere(['like', 'country', $this->country])
            ->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['like', 'company', $this->company])
            ->andFilterWhere(['like', 'personalized_signature', $this->personalized_signature]);

        return $dataProvider;
    }
}
