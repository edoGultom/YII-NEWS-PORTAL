<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use common\components\UserBehavior;

/**
 * This is the model class for table "slider_item".
 *
 * @property int $id
 * @property int $id_slider
 * @property int $gambar
 * @property string $nama_slider
 * @property string $captions
 * @property int $id_user
 * @property string $created_at
 * @property string $updated_at
 */
class SliderItem extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'slider_item';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_slider', 'gambar', 'id_user','aktif','id_induk'], 'integer'],
            [['captions'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['nama_slider'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_slider' => 'Id Slider',
            'gambar' => 'Gambar',
            'nama_slider' => 'Nama Slider',
            'captions' => 'Captions',
            'aktif'=>'Aktif',
            'id_user' => 'Id User',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'id_induk' => 'Induk'
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
            UserBehavior::className()
            
        ];
    }

    public function getPostingBy()
    {
        return $this->hasOne(User::className(), ['id' => 'id_user']);
    }


    public function getAmbilgambar()
    {
        return $this->hasOne(UploadedFiledb::className(), ['id' => 'gambar']);
    }
}
