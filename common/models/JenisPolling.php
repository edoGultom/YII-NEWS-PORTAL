<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use common\components\UserBehavior;

/**
 * This is the model class for table "jenis_polling".
 *
 * @property int $id
 * @property string $jenis_polling
 * @property string $pertanyaan
 * @property int $id_user
 * @property int $created_at
 * @property int $updated_at
 */
class JenisPolling extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'jenis_polling';
    }
    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
            UserBehavior::className()
        ];
    }
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['pertanyaan'], 'string'],
            [['id_user', 'created_at', 'updated_at'], 'integer'],
            [['jenis_polling'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'jenis_polling' => 'Jenis Polling',
            'pertanyaan' => 'Pertanyaan',
            'id_user' => 'Id User',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
