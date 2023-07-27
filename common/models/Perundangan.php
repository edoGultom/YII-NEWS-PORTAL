<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use common\components\UserBehavior;
use yii\behaviors\SluggableBehavior;

/**
 * This is the model class for table "perundangan".
 *
 * @property int $id
 * @property string $judul
 * @property string $sub_judul
 * @property int $kategori
 * @property int $aktif
 * @property string $isi
 * @property int $gambar
 * @property string $keterangan_gambar
 * @property string $tag
 * @property int $id_user
 * @property int $created_at
 * @property int $updated_at
 */
class Perundangan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'perundangan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['kategori', 'aktif', 'gambar', 'id_user', 'created_at', 'updated_at'], 'integer'],
            [['isi'], 'string'],
            [['judul', 'sub_judul', 'keterangan_gambar', 'tag'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'judul' => 'Judul',
            'sub_judul' => 'Sub Judul',
            'kategori' => 'Kategori',
            'aktif' => 'Aktif',
            'isi' => 'Isi',
            'gambar' => 'Gambar',
            'keterangan_gambar' => 'Keterangan Gambar',
            'tag' => 'Tag',
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
                'savedAttribute' => 'gambar', // optional, use to link model with saved file.
                'uploadPath' => '@common/upload', // saved directory. default to '@runtime/upload'
                'autoSave' => true, // when true then uploaded file will be save before ActiveRecord::save()
                'autoDelete' => true, // when true then uploaded file will deleted before ActiveRecord::delete()
            ],
            
            TimestampBehavior::className(),
            UserBehavior::className(),
            [
                'class' => SluggableBehavior::className(),
                'attribute' => 'judul',
                'slugAttribute' => 'sub_judul',
            ],
            
        ];
    }

    public function getNamefile()
    {
        return $this->hasOne(UploadedFiledb::className(), ['id' => 'gambar']);
    }

    public function getKategoriperundangan()
    {
        return $this->hasOne(KategoriPerundangan::className(),['id'=>'kategori']);
    }
}
