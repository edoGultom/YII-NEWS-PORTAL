<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use common\components\UserBehavior;
/**
 * This is the model class for table "album".
 *
 * @property int $id
 * @property string $nama_album
 * @property string $captions
 * @property int $id_user
 * @property int $created_at
 * @property int $updated_at
 */
class Album extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'album';
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
            [['id_user', 'created_at', 'updated_at'], 'integer'],
            [['status'], 'default', 'value' => 1],
            [['nama_album'], 'string', 'max' => 255],
            [['nama_album'],'required', 'message' => 'Nama Album tidak boleh kosong.'],
            [['nama_album'],'unique', 'message' => 'Nama Album sudah pernah digunakan.'],

        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nama_album' => 'Nama Album',
            'captions' => 'Captions',
            'id_user' => 'Id User',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    public function getAlbum()
    {
        return $this->hasOne(AlbumGambar::className(), ['id_album' => 'id']);
    }
}
