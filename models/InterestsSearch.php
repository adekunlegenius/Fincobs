<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Interests;

/**
 * InterestsSearch represents the model behind the search form about `app\models\Interests`.
 */
class InterestsSearch extends Interests
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['interest_id', 'user_id', 'product_id', 'status'], 'integer'],
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
        $query = Interests::find();

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
            'interest_id' => $this->interest_id,
            'user_id' => $this->user_id,
            'product_id' => $this->product_id,
            'status' => $this->status,
        ]);

        return $dataProvider;
    }
}
