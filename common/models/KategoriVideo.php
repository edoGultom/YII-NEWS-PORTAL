<?php

namespace common\models;

use Yii;

use yii\behaviors\TimestampBehavior;
use common\components\UserBehavior;

/**
 * This is the model class for table "kategori_video".
 *
 * @property int $id
 * @property string $kategori
 * @property string $captions
 * @property int $id_user
 * @property int $created_at
 * @property int $updated_at
 */
class KategoriVideo extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'kategori_video';
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
            [['captions'], 'string'],
            [['id_user', 'created_at', 'updated_at'], 'default', 'value' => null],
            [['id_user', 'created_at', 'updated_at'], 'integer'],
            [['kategori'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'kategori' => 'Kategori',
            'captions' => 'Captions',
            'id_user' => 'Id User',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    public function getVideo()
    {
        return $this->hasOne(Video::className(), ['id_kategori' => 'id'])->orderBy(['id'=>SORT_DESC]);
    }
}
