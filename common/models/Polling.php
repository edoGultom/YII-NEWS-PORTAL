<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
/**
 * This is the model class for table "polling".
 *
 * @property int $id
 * @property int $id_jenis_polling
 * @property string $polling
 * @property int $created_at
 * @property int $updated_at
 */
class Polling extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'polling';
    }
    public function behaviors()
    {
        return [
            TimestampBehavior::className()
        ];
    }
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_jenis_polling', 'created_at', 'updated_at'], 'integer'],
            [['status'], 'default', 'value' => 1],
            [['polling'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_jenis_polling' => 'Id Jenis Polling',
            'polling' => 'Polling',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
