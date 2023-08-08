<?php

namespace common\models;

use yii\behaviors\TimestampBehavior;
use common\components\UserBehavior;
use Yii;

/**
 * This is the model class for table "section_kategori".
 *
 * @property int $id
 * @property string|null $keterangan
 * @property int|null $id_user
 * @property int|null $created_at
 * @property int|null $updated_at
 */
class SectionKategori extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'section_kategori';
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
            [['id_user', 'created_at', 'updated_at'], 'default', 'value' => null],
            [['id_user', 'created_at', 'updated_at'], 'integer'],
            [['keterangan'], 'string', 'max' => 255],
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
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
