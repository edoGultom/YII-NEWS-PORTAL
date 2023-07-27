<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "statistik".
 *
 * @property int $id
 * @property string $ip
 * @property string $tanggal
 * @property int $hits
 * @property string $online
 */
class Statistik extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'statistik';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ip', 'tanggal', 'hits', 'online'], 'required'],
            [['tanggal'], 'safe'],
            [['hits'], 'default', 'value' => null],
            [['hits'], 'integer'],
            [['ip', 'online'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'ip' => 'Ip',
            'tanggal' => 'Tanggal',
            'hits' => 'Hits',
            'online' => 'Online',
        ];
    }
}
