<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "data_statistik".
 *
 * @property int $id
 * @property int $id_induk
 * @property string $nama_variabel
 * @property double $nilai
 * @property string $satuan
 * @property string $keterangan
 * @property int $no_tingkat
 */
class DataStatistik extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'data_statistik';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_induk', 'no_tingkat'], 'default', 'value' => null],
            [['id_induk', 'no_tingkat'], 'integer'],
            [['nilai'], 'number'],
            [['keterangan'], 'string'],
            [['nama_variabel', 'satuan'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_induk' => 'Id Induk',
            'nama_variabel' => 'Nama Variabel',
            'nilai' => 'Nilai',
            'satuan' => 'Satuan',
            'keterangan' => 'Keterangan',
            'no_tingkat' => 'No Tingkat',
        ];
    }

    public function getInduk(){
        return $this->hasOne(DataStatistik::className(), ['id' => 'id_induk']);    
    }
    public function getSemuaInduk(){
        return $this->hasMany(DataStatistik::className(), ['id_induk' => 'id'])->orderBy(['id' => SORT_ASC]);    
    }
}
