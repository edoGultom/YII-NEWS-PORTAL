<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "user_polling".
 *
 * @property int $id
 * @property int $id_jenis_polling
 * @property string $id_polling
 * @property string $ip
 * @property string $browser
 * @property int $created_at
 * @property int $updated_at
 */
class UserPolling extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user_polling';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_jenis_polling', 'created_at', 'updated_at'], 'integer'],
            [['id_polling', 'ip', 'browser'], 'string', 'max' => 255],
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
            'id_polling' => 'Id Polling',
            'ip' => 'Ip',
            'browser' => 'Browser',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
