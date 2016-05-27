<?php

namespace backend\modules\goods\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\goods\models\Goods;

/**
 * GoodsSearch represents the model behind the search form about `backend\modules\goods\models\Goods`.
 */
class GoodsSearch extends Goods
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'cat_id', 'shop_price', 'number'], 'integer'],
            [['name', 'desc', 'img', 'xthumb', 'dthumb'], 'safe'],
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
        $query = Goods::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'pagination' => ['pageSize' => 8],
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
            'id' => $this->id,
            'cat_id' => $this->cat_id,
            'shop_price' => $this->shop_price,
            'number' => $this->number,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'desc', $this->desc])
            ->andFilterWhere(['like', 'img', $this->img])
            ->andFilterWhere(['like', 'xthumb', $this->xthumb])
            ->andFilterWhere(['like', 'dthumb', $this->dthumb]);

        return $dataProvider;
    }
}
