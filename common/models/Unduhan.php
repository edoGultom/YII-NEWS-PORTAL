<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use common\components\UserBehavior;
use common\models\UploadedFiledb;


use yii\helpers\Html;


/**
 * This is the model class for table "unduhan".
 *
 * @property int $id
 * @property int $id_kategori
 * @property string $judul
 * @property string $keterangan
 * @property int $id_file
 * @property int $id_user
 * @property int $created_at
 * @property int $updated_at
 */
class Unduhan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'unduhan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_kategori', 'id_file', 'id_user', 'created_at', 'updated_at','jumlah_download'], 'integer'],
            [['judul', 'keterangan'], 'string', 'max' => 255],
            [['status'], 'default', 'value' => 1],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_kategori' => 'Id Kategori',
            'judul' => 'Judul',
            'keterangan' => 'Keterangan',
            'id_file' => 'Id File',
            'id_user' => 'Id User',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    public function behaviors()
    {
        return [
            [
                'class' => 'mdm\upload\UploadBehavior',
                'attribute' => 'file', // required, use to receive input file
                'savedAttribute' => 'id_file', // optional, use to link model with saved file.
                'uploadPath' => '@common/upload', // saved directory. default to '@runtime/upload'
                'autoSave' => true, // when true then uploaded file will be save before ActiveRecord::save()
                'autoDelete' => true, // when true then uploaded file will deleted before ActiveRecord::delete()
            ],
            
            TimestampBehavior::className(),
            UserBehavior::className()
            
        ];
    }

    public function getUnduhanfile()
    {
        return $this->hasOne(UploadedFiledb::className(), ['id' => 'id_file']);
    }
    public function getKategoriunduhan()
    {
        return $this->hasOne(KategoriUnduhan::className(),['id'=>'id_kategori']);
    }
}
