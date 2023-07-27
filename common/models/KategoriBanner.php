<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use common\components\UserBehavior;

/**
 * This is the model class for table "kategori_banner".
 *
 * @property int $id
 * @property string $nama_banner
 * @property string $captions
 * @property int $id_user
 * @property int $created_at
 * @property int $updated_at
 */
class KategoriBanner extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'kategori_banner';
    }
    public function behaviors()
    {
        return [
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
            [['captions'], 'string'],
            [['id_user', 'created_at', 'updated_at'], 'integer'],
            [['nama_banner'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nama_banner' => 'Nama Banner',
            'captions' => 'Captions',
            'id_user' => 'Id User',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    public function getBanner()
    {
        return $this->hasMany(Banner::className(), ['kategori_banner' => 'id'])->where(['aktif'=>1])->orderBy(['urutan'=>SORT_ASC]);
    }

    public function getBannerOne()
    {
        return $this->hasOne(Banner::className(), ['kategori_banner' => 'id'])->where(['aktif'=>1])->orderBy(['urutan'=>SORT_ASC]);
    }
}
