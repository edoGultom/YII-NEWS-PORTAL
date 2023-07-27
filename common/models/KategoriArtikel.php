<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use common\components\UserBehavior;

/**
 * This is the model class for table "kategori_artikel".
 *
 * @property int $id
 * @property string $keterangan
 * @property int $id_user
 * @property int $created_at
 * @property int $updated_at
 * @property int $status
 * 
 */
class KategoriArtikel extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'kategori_artikel';
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
            [['id_user', 'created_at', 'updated_at', 'status'], 'integer'],
            [['keterangan'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'keterangan' => 'Keterangan',
            'id_user' => 'Id User',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'status' => 'status',
        ];
    }

    public function getKategori()
    {
        $categories = KategoriArtikel::find()->All();
        return $categories;
    }


    public function getJumlahArtikel()
    {
        return $this->hasMany(Artikel::className(), ['kategori' => 'id']);
    }

    public function getSingleArtikel()
    {
        return $this->hasOne(Artikel::className(), ['kategori' => 'id'])->orderBy(['id' => SORT_DESC]);
    }

    // public function arrayJumlahKategori() {
    //     $get_categories = $this->hasMany(KategoryArtikel::className(), ['id' => 'id'])->orderBy(['id' => SORT_ASC]);    
    //     $categories = [];
    //     foreach($get_categories as $category) {
    //         if(count($get_categories) > 0) {
    //             array_push($categories, [
    //                 "name" => $category->keterangan,
    //                 "count" => $category->getJumlahArtikel()->count(),
    //             ]);
    //         }
    //     }
    //     return $categories;
    // }
}
