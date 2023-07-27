<?php

namespace common\models;


use Yii;
use yii\behaviors\TimestampBehavior;
use common\components\UserBehavior;

/**
 * This is the model class for table "identitas".
 *
 * @property int $id_identitas
 * @property string $nama_website
 * @property string $url
 * @property string $fb_fanpage
 * @property string $twitter
 * @property string $meta_deskripsi
 * @property string $meta_keyword
 * @property string $email
 * @property string $no_telp
 * @property string $no_rekening
 * @property string $hari_kerja
 * @property string $jam_kerja
 * @property string $alamat
 * @property int $gambar_favicon
 * @property int $id_user
 * @property int $created_at
 * @property int $updated_at
 */
class Identitas extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'identitas';
    }

    public function behaviors()
    {
        return [
 
            [
                'class' => 'mdm\upload\UploadBehavior',
                'attribute' => 'file', // required, use to receive input file
                'savedAttribute' => 'gambar_favicon', // optional, use to link model with saved file.
                'uploadPath' => '@common/upload', // saved directory. default to '@runtime/upload'
                'autoSave' => true, // when true then uploaded file will be save before ActiveRecord::save()
                'autoDelete' => true, // when true then uploaded file will deleted before ActiveRecord::delete()
            ],
            
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
            [['alamat'], 'string'],
            [['gambar_favicon', 'id_user', 'created_at', 'updated_at'], 'integer'],
            [['nama_website', 'url', 'fb_fanpage', 'twitter', 'meta_deskripsi', 'meta_keyword', 'email', 'no_telp', 'no_rekening', 'hari_kerja', 'jam_kerja'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_identitas' => 'Id Identitas',
            'nama_website' => 'Nama Website',
            'url' => 'Url',
            'fb_fanpage' => 'Fb Fanpage',
            'twitter' => 'Twitter',
            'meta_deskripsi' => 'Meta Deskripsi',
            'meta_keyword' => 'Meta Keyword',
            'email' => 'Email',
            'no_telp' => 'No Telp',
            'no_rekening' => 'No Rekening',
            'hari_kerja' => 'Hari Kerja',
            'jam_kerja' => 'Jam Kerja',
            'alamat' => 'Alamat',
            'gambar_favicon' => 'Gambar Favicon',
            'id_user' => 'Id User',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    public function getIdentitas() 
    {
        $query = Identitas::find()->one();
        return $query;
    }
}
