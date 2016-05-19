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
            [['goods_id', 'cat_id', 'shop_price', 'goods_number'], 'integer'],
            [['goods_name', 'goods_desc', 'goods_img', 'goods_thumb'], 'safe'],
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
            'goods_id' => $this->goods_id,
            'cat_id' => $this->cat_id,
            'shop_price' => $this->shop_price,
            'goods_number' => $this->goods_number,
        ]);

        $query->andFilterWhere(['like', 'goods_name', $this->goods_name])
            ->andFilterWhere(['like', 'goods_desc', $this->goods_desc])
            ->andFilterWhere(['like', 'goods_img', $this->goods_img])
            ->andFilterWhere(['like', 'goods_thumb', $this->goods_thumb]);

        return $dataProvider;
    }
}
