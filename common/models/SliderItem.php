<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use common\components\UserBehavior;

/**
 * This is the model class for table "slider_item".
 *
 * @property int $id
 * @property int|null $id_slider
 * @property int|null $gambar
 * @property string|null $nama_slider
 * @property string|null $captions
 * @property int|null $id_user
 * @property int|null $aktif
 * @property int|null $created_at
 * @property int|null $updated_at
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
            [['id_slider', 'gambar', 'id_user', 'aktif', 'created_at', 'updated_at'], 'default', 'value' => null],
            [['id_slider', 'gambar', 'id_user', 'aktif', 'created_at', 'updated_at'], 'integer'],
            [['captions'], 'string'],
            [['nama_slider'], 'string', 'max' => 255],
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
    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_slider' => 'Slider',
            'gambar' => 'Gambar',
            'nama_slider' => 'Nama Slider',
            'captions' => 'Captions',
            'id_user' => 'Id User',
            'aktif' => 'Aktif',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
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
