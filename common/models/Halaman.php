<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use common\components\UserBehavior;
use yii\behaviors\SluggableBehavior;


/**
 * This is the model class for table "halaman".
 *
 * @property int $id
 * @property string $nama
 * @property string $judul
 * @property string $isi
 * @property string $format_halaman
 * @property int $id_user
 * @property int $created_at
 * @property int $updated_at
 */
class Halaman extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'halaman';
    }

    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
            UserBehavior::className(),
            [
                'class' => SluggableBehavior::className(),
                'attribute' => 'judul',
                'slugAttribute' => 'sub_judul',
            ],
        ];
    }
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama'], 'required'],
            [['isi'], 'string'],
            [['status'], 'default', 'value' => 1],
            [['id_user', 'created_at', 'updated_at','format_halaman'], 'integer'],
            [['nama', 'judul',], 'string', 'max' => 255],
            [['nama'], 'unique'],
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
            'judul' => 'Judul',
            'sub_judul'=>'Sub Judul',
            'isi' => 'Isi',
            'format_halaman' => 'Format Halaman',
            'id_user' => 'Id User',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    public function getFormathalaman()
    {
        return $this->hasOne(RefFormatHalaman::className(), ['id' => 'format_halaman']);    
    }

    // public function getKategoriArtikel(){
    //     return $this->hasOne(KategoriArtikel::className(), ['id' => 'id_user']);
    // }

    public function getPostingBy()
    {
        return $this->hasOne(User::className(), ['id' => 'id_user']);
    }
}
