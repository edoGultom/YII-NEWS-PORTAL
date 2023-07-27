<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use common\components\UserBehavior;

/**
 * This is the model class for table "video".
 *
 * @property int $id
 * @property string $nama
 * @property string $captions
 * @property string $link
 * @property int $id_user
 * @property int $created_at
 * @property int $updated_at
 */
class Video extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public $file;

    public static function tableName()
    {
        return 'video';
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
            [['status'], 'default', 'value' => 1],
            [['id_user', 'created_at', 'updated_at'], 'default', 'value' => null],
            [['id_user', 'created_at', 'updated_at','id_kategori', 'thumbnail'], 'integer'],
            [['file'], 'file', 'maxSize' =>  5210000],
            [['nama', 'link'], 'string', 'max' => 255],
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
            'captions' => 'Captions',
            'link' => 'Link',
            'id_user' => 'Id User',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'id_kategori'=>'Kategori',
            'thumbnail' => 'Thumbnail'
        ];
    }

    public function getKategoriVideo()
    {
        return $this->hasOne(KategoriVideo::className(), ['id' => 'id_kategori']);
    }

    public function getVideo()
    {
        $query = Video::find()->orderBy(['created_at' => SORT_DESC]);
        return $query;
    }

    public function getAmbilgambar()
    {
        return $this->hasOne(UploadedFiledb::className(), ['id' => 'thumbnail']);
    }
}
