<?php

namespace app\modules\admin\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\admin\models\Product;

/**
 * ProductSearch represents the model behind the search form of `app\modules\admin\models\Product`.
 */
class ProductSearch extends Product
{
    public $min_price;
    public $max_price;
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'category_id', 'min_price', 'max_price', 'street_id'], 'integer'],
            [['name', 'content', 'contact', 'keywords', 'description', 'img', 'new', 'phone', 'h_condition'], 'safe'],
            [['price', 'square', 'floor', 'h_number', 'rooms', 'code'], 'number'],
            [['hit'], 'boolean'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = Product::find();

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
            'id' => $this->id,
            'category_id' => $this->category_id,
            'price' => $this->price,
        ]);

        if($this->min_price > 0) {
            $query->andFilterWhere(['>=', 'price', $this->min_price]);
        }
        if($this->max_price > 0) {
            $query->andFilterWhere(['<=', 'price', $this->max_price]);
        }

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'content', $this->content])
            ->andFilterWhere(['like', 'keywords', $this->keywords])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'img', $this->img])
            ->andFilterWhere(['like', 'hit', $this->hit])
            ->andFilterWhere(['like', 'new', $this->new])
            ->andFilterWhere(['like', 'square', $this->square])
            ->andFilterWhere(['like', 'code', $this->code])
            ->andFilterWhere(['like', 'contact', $this->contact])
            ->andFilterWhere(['like', 'phone', $this->phone])
            ->andFilterWhere(['like', 'floor', $this->floor])
            ->andFilterWhere(['like', 'h_number', $this->h_number])
            ->andFilterWhere(['like', 'rooms', $this->rooms])
            ->andFilterWhere(['like', 'h_condition', $this->h_condition])
            ->andFilterWhere(['like', 'street_id', $this->street_id]);


        return $dataProvider;
    }
}
