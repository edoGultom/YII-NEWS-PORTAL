<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use common\components\UserBehavior;


/**
 * This is the model class for table "ref_format_halaman".
 *
 * @property int $id
 * @property string $nama
 * @property string $layout
 * @property int $id_user
 * @property int $created_at
 * @property int $updated_at
 */
class RefFormatHalaman extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ref_format_halaman';
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
            [['id_user', 'created_at', 'updated_at'], 'integer'],
            [['nama', 'layout'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nama' => 'Nama',
            'layout' => 'Layout',
            'id_user' => 'Id User',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
