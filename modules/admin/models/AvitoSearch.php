<?php

namespace app\modules\admin\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\admin\models\AvitoParser;

/**
 * AvitoSearch represents the model behind the search form of `app\modules\admin\models\AvitoParser`.
 */
class AvitoSearch extends AvitoParser
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_pk', 'id', 'external_id', 'name', 'city_id', 'category_id', 'address', 'date', 'price', 'url', 'latitude', 'longitude', 'image', 'people_name', 'people_phone', 'created_at', 'updated_at', 'is_checked'], 'integer'],
            [['description'], 'safe'],
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
        $query = AvitoParser::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => ['defaultOrder' => ['id' => SORT_DESC]]
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id_pk' => $this->id_pk,
            'id' => $this->id,
            'external_id' => $this->external_id,
            'name' => $this->name,
            'city_id' => $this->city_id,
            'category_id' => $this->category_id,
            'address' => $this->address,
            'date' => $this->date,
            'price' => $this->price,
            'url' => $this->url,
            'latitude' => $this->latitude,
            'longitude' => $this->longitude,
            'image' => $this->image,
            'people_name' => $this->people_name,
            'people_phone' => $this->people_phone,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'is_checked' => $this->is_checked,
        ]);

        $query->andFilterWhere(['like', 'description', $this->description]);

        return $dataProvider;
    }
}
