<?php

namespace common\models;

use yii\behaviors\TimestampBehavior;
use common\components\UserBehavior;
use Yii;

/**
 * This is the model class for table "kategori_artikel".
 *
 * @property int $id
 * @property string|null $keterangan
 * @property int|null $id_user
 * @property int|null $status
 * @property int|null $created_at
 * @property int|null $updated_at
 */
class KategoriArtikel extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'kategori_artikel';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_user', 'status', 'created_at', 'updated_at'], 'default', 'value' => null],
            [['id_user', 'status', 'created_at', 'updated_at'], 'integer'],
            [['keterangan'], 'string', 'max' => 255],
        ];
    }
    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
            UserBehavior::className(),
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'keterangan' => 'Keterangan',
            'id_user' => 'Id User',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
