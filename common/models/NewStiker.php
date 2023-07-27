<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use common\components\UserBehavior;

/**
 * This is the model class for table "new_stiker".
 *
 * @property int $id
 * @property string $info
 * @property string $url
 * @property int $aktif
 * @property int $id_user
 * @property int $created_at
 * @property int $updated_at
 */
class NewStiker extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'new_stiker';
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
            [['aktif', 'id_user', 'created_at', 'updated_at'], 'default', 'value' => null],
            [['aktif', 'id_user', 'created_at', 'updated_at'], 'integer'],
            [['info', 'url'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'info' => 'Info',
            'url' => 'Url',
            'aktif' => 'Aktif',
            'id_user' => 'Id User',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
