<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Products;

/**
 * ProductsSearch represents the model behind the search form about `app\models\Products`.
 */
class ProductsSearch extends Products
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['product_id', 'product_status', 'user_id', 'no_of_views'], 'integer'],
            [['product_name', 'price', 'product_bargainable', 'front_view_image', 'back_view_image', 'side_view_image', 'top_view_image', 'description', 'category', 'date_created'], 'safe'],
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
        $query = Products::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'product_id' => $this->product_id,
            'product_status' => $this->product_status,
            'user_id' => $this->user_id,
            'no_of_views' => $this->no_of_views,
            'date_created' => $this->date_created,
        ]);

        $query->andFilterWhere(['like', 'product_name', $this->product_name])
            ->andFilterWhere(['like', 'price', $this->price])
            ->andFilterWhere(['like', 'product_bargainable', $this->product_bargainable])
            ->andFilterWhere(['like', 'front_view_image', $this->front_view_image])
            ->andFilterWhere(['like', 'back_view_image', $this->back_view_image])
            ->andFilterWhere(['like', 'side_view_image', $this->side_view_image])
            ->andFilterWhere(['like', 'top_view_image', $this->top_view_image])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'category', $this->category]);

        return $dataProvider;
    }
}
