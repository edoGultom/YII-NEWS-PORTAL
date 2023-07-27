<?php

namespace common\models;

use yii\helpers\Url;
use Yii;
use yii\behaviors\TimestampBehavior;
use common\components\UserBehavior;

/**
 * This is the model class for table "album_gambar".
 *
 * @property int $id
 * @property int $id_album
 * @property string $captions
 * @property int $id_file
 * @property int $id_user
 * @property int $created_at
 * @property int $updated_at
 */
class AlbumGambar extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public $file;


    public static function tableName()
    {
        return 'album_gambar';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_album'], 'required'],
            [['status'], 'default', 'value' => 1],
            [['id_album', 'id_file', 'id_user', 'created_at', 'updated_at'], 'integer'],
            [['captions'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_album' => 'Id Album',
            'captions' => 'Captions',
            'id_file' => 'Id File',
            'id_user' => 'Id User',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    public function behaviors()
    {
        return [

            // [
            //     'class' => 'mdm\upload\UploadBehavior',
            //     'attribute' => 'file', // required, use to receive input file
            //     'savedAttribute' => 'id_file', // optional, use to link model with saved file.
            //     'uploadPath' => '@common/upload', // saved directory. default to '@runtime/upload'
            //     'autoSave' => true, // when true then uploaded file will be save before ActiveRecord::save()
            //     'autoDelete' => true, // when true then uploaded file will deleted before ActiveRecord::delete()
            // ],

            TimestampBehavior::className(),
            UserBehavior::className()

        ];
    }

    public function getAlbum()
    {
        return $this->hasOne(Album::className(), ['id' => 'id_album']);
    }

    public function getUpload()
    {
        return $this->hasOne(UploadedFiledb::className(), ['id' => 'id_file']);
    }

    public function deleteImage()
    {
        $query = UploadedFiledb::findOne($this->id_file);
        if ($query) {
            if (file_exists($query->filename)) {
                if (unlink($query->filename)) {
                    return true;
                } else {
                    return false;
                }
            } else {
                return true;
            }
        } else {
            return true;
        }
    }

    public function getAlbumGambar()
    {
        $query = AlbumGambar::find()->orderBy(['created_at' => SORT_DESC]);
        return $query;
    }

    public function getAmbilGambarUpload()
    {
        return $this->hasOne(UploadedFiledb::className(), ['id' => 'id_file']);
    }
}
