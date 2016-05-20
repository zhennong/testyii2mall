<?php

namespace backend\modules\cat\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\cat\models\Cat;

/**
 * CatSearch represents the model behind the search form about `backend\modules\cat\models\Cat`.
 */
class CatSearch extends Cat
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cat_id', 'pid'], 'integer'],
            [['cat_name'], 'safe'],
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
        $query = Cat::find();

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
            'cat_id' => $this->cat_id,
            'pid' => $this->pid,
        ]);

        $query->andFilterWhere(['like', 'cat_name', $this->cat_name]);

        return $dataProvider;
    }
}