<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "ta_pengusulan_surat".
 *
 * @property int $id
 * @property int|null $id_jenis_surat
 * @property string|null $jenis_surat
 * @property string|null $tanggal
 * @property int|null $id_file
 * @property string|null $kieterangan
 * @property int|null $status
 */
class TaPengusulanSurat extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ta_pengusulan_surat';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_jenis_surat', 'id_file', 'status'], 'integer'],
            [['tanggal'], 'safe'],
            [['keterangan'], 'string'],
            [['jenis_surat'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_jenis_surat' => 'Id Jenis Surat',
            'jenis_surat' => 'Jenis Surat',
            'tanggal' => 'Tanggal',
            'id_file' => 'Id File',
            'keterangan' => 'keterangan',
            'status' => 'Status',
        ];
    }
    public function setTahap($tahap, $keterangan = NULL)
    {
        $this->status = $tahap;
        $this->keterangan = $keterangan;
        if ($this->save()) {
            return true;
        }
        return false;
    }
}
