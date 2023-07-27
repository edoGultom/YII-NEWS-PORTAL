<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use common\components\UserBehavior;
use yii\db\Expression;

/**
 * This is the model class for table "banner".
 *
 * @property int $id
 * @property int $kategori_banner
 * @property string $captions
 * @property int $id_file
 * @property int $id_user
 * @property int $created_at
 * @property int $updated_at
 */
class Banner extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public $file;

    public static function tableName()
    {
        return 'banner';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['kategori_banner', 'id_file', 'id_user', 'created_at', 'updated_at','aktif','urutan'], 'integer'],
            [['captions','link'], 'string'],

        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'kategori_banner' => 'Kategori Banner',
            'captions' => 'Captions',
            'id_file' => 'Id File',
            'aktif'=>'Aktif',
            'id_user' => 'Id User',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'link' => 'Link',
            'urutan' => 'urutan'
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

    public function deleteImage()
    {
        $query = UploadedFiledb::findOne($this->id_file);
        if ($query){
            if (file_exists($query->filename)){
                if (unlink($query->filename)){
                    return true;
                }else{
                    return false;
                }
            }else{
                return true;
            }
        }else{
            return true;
        }
    }

    public function getBanner()
    {
        return $this->hasMany(Banner::className(), ['id' => 'id_file']);
    }

    public function getKategoribanner()
    {
        return $this->hasOne(KategoriBanner::className(), ['id' => 'kategori_banner']);
    }

    public function getAmbilgambar()
    {
        return $this->hasOne(UploadedFiledb::className(), ['id' => 'id_file']);
    }

    public function getBannerAtas()
    {
        $kategori = KategoriBanner::find()->where(['nama_banner' => 'Banner Atas'])->one();
        $query = Banner::find()->where(['kategori_banner' => $kategori->id])->orderBy(['id' => SORT_DESC])->one();
        return $query;
    }

    public function getBannerBawah()
    {
        $kategori = KategoriBanner::find()->where(['nama_banner' => 'Banner Bawah'])->one();
        $query = Banner::find()->where(['kategori_banner' => $kategori->id])->orderBy(['id' => SORT_DESC])->one();
        return $query;
    }

    public function getBannerTengah()
    {
        $kategori = KategoriBanner::find()->where(['nama_banner' => 'Banner Tengah'])->one();
        $query = Banner::find()->where(['kategori_banner' => $kategori->id])->orderBy(new Expression('random()'))->one();
        return $query;
    }

    // public function getBannerTengah1()
    // {
    //     $kategori = KategoriBanner::find()->where(['nama_banner' => 'Banner Tengah 1'])->one();
    //     $query = Banner::find()->where(['kategori_banner' => $kategori->id])->orderBy(['id' => SORT_DESC])->one();
    //     return $query;
    // }

    // public function getBannerTengah2()
    // {
    //     $kategori = KategoriBanner::find()->where(['nama_banner' => 'Banner Tengah 2'])->one();
    //     $query = Banner::find()->where(['kategori_banner' => $kategori->id])->orderBy(['id' => SORT_DESC])->one();
    //     return $query;
    // }

    // public function getBannerTengah3()
    // {
    //     $kategori = KategoriBanner::find()->where(['nama_banner' => 'Banner Tengah 3'])->one();
    //     $query = Banner::find()->where(['kategori_banner' => $kategori->id])->orderBy(['id' => SORT_DESC])->one();
    //     return $query;
    // }
}
