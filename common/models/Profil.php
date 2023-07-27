<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use common\components\UserBehavior;

/**
 * This is the model class for table "profil".
 *
 * @property int $id_profil
 * @property string $judul
 * @property string $deskripsi
 * @property string $gambar
 * @property int $id_user
 * @property int $created_at
 * @property int $updated_at
 */
class Profil extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'profil';
    }

    // public function behaviors()
    // {
    //     return [
    //         TimestampBehavior::className(),
    //         UserBehavior::className()
    //     ];
    // }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['deskripsi'], 'string'],
            [['id_user', 'created_at', 'updated_at'], 'integer'],
            [['judul', 'gambar'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_profil' => 'Id Profil',
            'judul' => 'Judul',
            'deskripsi' => 'Deskripsi',
            'gambar' => 'Gambar',
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
            UserBehavior::className()
            
        ];
    }
}
