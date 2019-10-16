<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "avito".
 *
 * @property int $id
 * @property int $external_id
 * @property int $name
 * @property int $city_id
 * @property int $category_id
 * @property int $address
 * @property int $date
 * @property string $description
 * @property int $price
 * @property int $url
 * @property int $latitude
 * @property int $longitude
 * @property int $image
 * @property int $people_name
 * @property int $people_phone
 * @property int $created_at
 * @property int $updated_at
 * @property int $is_checked
 */
class AvitoParser extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'avito';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['external_id', 'name', 'city_id', 'category_id'], 'required'],
            [['city_id', 'category_id', 'is_checked'], 'integer'],
            [['date', 'created_at', 'updated_at'], 'safe'],
            [['description'], 'string'],
            [['external_id', 'name', 'address', 'price', 'url', 'latitude', 'longitude', 'image', 'people_phone', 'people_name'], 'string', 'max' => 255],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['category_id' => 'id']],
            [['city_id'], 'exist', 'skipOnError' => true, 'targetClass' => City::className(), 'targetAttribute' => ['city_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'external_id' => 'External ID',
            'name' => 'Name',
            'city_id' => 'City ID',
            'category_id' => 'Category ID',
            'address' => 'Address',
            'date' => 'Date',
            'description' => 'Description',
            'price' => 'Price',
            'url' => 'Url',
            'latitude' => 'Latitude',
            'longitude' => 'Longitude',
            'image' => 'Image',
            'people_name' => 'People Name',
            'people_phone' => 'People Phone',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'is_checked' => 'Is Checked',
        ];
    }

    /**
     * @param bool $insert
     * @return bool
     */
    public function beforeSave($insert)
    {
        if(parent::beforeSave($insert)) {
            if($this->isNewRecord) {
                $this->created_at = date("Y-m-d H:i:s");
            }
            $this->updated_at = date("Y-m-d H:i:s");

            return true;
        }
        return false;
    }

//    /**
//     * @return \yii\db\ActiveQuery
//     */
//    public function getFieldStorages()
//    {
//        return $this->hasMany(FieldStorage::className(), ['offer_id' => 'id']);
//    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCity()
    {
        return $this->hasOne(City::className(), ['id' => 'city_id']);
    }
}
