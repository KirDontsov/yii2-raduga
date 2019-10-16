<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "proxy".
 *
 * @property int $id_pk
 * @property string $ip
 * @property int $port
 * @property string $http
 */
class Proxy extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'proxy';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ip', 'port', 'http'], 'required'],
            [['port'], 'integer'],
            [['http'], 'string'],
            [['ip'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_pk' => 'Id Pk',
            'ip' => 'Ip',
            'port' => 'Port',
            'http' => 'Http',
        ];
    }
}
