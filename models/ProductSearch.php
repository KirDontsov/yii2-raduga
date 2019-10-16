<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Category;

/**
 * ProductSearch represents the model behind the search form of `app\models\Product`.
 */
class ProductSearch extends Category
{
    /**
     * {@inheritdoc}
     */
    public $category_id;
    public $code;
    public $floor;
    public $h_number;
    public $rooms;
    public $street_id;
    public $city_id;
    public $min_price;
    public $max_price;
    public $latitude;
    public $longitude;
    public $content;
    public $img;
    public $hit;
    public $new;
    public $square;
    public $contact;
    public $phone;
    public $h_condition;

    public function rules()
    {
        return [
            [['id', 'category_id', 'code', 'floor', 'h_number', 'rooms', 'street_id', 'city_id'], 'integer'],
            [['name', 'content', 'keywords', 'description', 'img', 'hit', 'new', 'square', 'contact', 'phone', 'h_condition'], 'safe'],
            [['min_price', 'max_price', 'latitude', 'longitude'], 'number'],
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
            
            'code' => $this->code,
            'floor' => $this->floor,
            'h_number' => $this->h_number,
            'rooms' => $this->rooms,
            'latitude' => $this->latitude,
            'longitude' => $this->longitude,
            'street_id' => $this->street_id,
            'city_id' => $this->city_id,
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
            ->andFilterWhere(['like', 'contact', $this->contact])
            ->andFilterWhere(['like', 'phone', $this->phone])
            ->andFilterWhere(['like', 'h_condition', $this->h_condition]);

        return $dataProvider;
    }
}
