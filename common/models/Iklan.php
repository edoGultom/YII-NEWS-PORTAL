<?php

namespace common\models;

use Yii;
use yii\db\Expression;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "iklan".
 *
 * @property int $id
 * @property string $nama
 * @property int $gambar
 * @property string $tanggal_mulai
 * @property string $tanggal_selesai
 * @property int $created_at
 * @property int $updated_at
 */
class Iklan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public $file;

    public static function tableName()
    {
        return 'iklan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            // [['gambar', 'created_at', 'updated_at'], 'default', 'value' => null],
            [['gambar', 'created_at', 'updated_at'], 'integer'],
            [['tanggal_mulai', 'tanggal_selesai'], 'safe'],
            [['nama'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */

    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nama' => 'Nama',
            'gambar' => 'Gambar',
            'tanggal_mulai' => 'Tanggal Mulai',
            'tanggal_selesai' => 'Tanggal Selesai',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    public function deleteImage()
    {
        $query = UploadedFiledb::findOne($this->gambar);
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

    public function getAmbilgambar()
    {
        return $this->hasOne(UploadedFiledb::className(), ['id' => 'gambar']);
    }

    public function getIklan()
    {
        $now = strtotime(date("Y-m-d"));
        $iklan = Iklan::find()->orderBy(new expression("random()"))->where(["<=","tanggal_mulai","now()"])->andWhere([">=", "tanggal_selesai", "now()"])->one();
        return $iklan;
    }
}
