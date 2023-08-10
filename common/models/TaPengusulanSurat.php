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
            [['id_jenis_surat', 'id_file', 'id_user', 'status'], 'integer'],
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
            'id_user' => 'Id User',
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
    public function getJenisSurat()
    {
        return $this->hasOne(RefJenisSurat::className(), ['id' => 'id_jenis_surat']);
    }
    public function getTahap()
    {
        $model = $this->hasOne(RefTahapUsulan::className(), ['id' => 'status'])->one();
        if ($model) {
            if ($this->status == 1) {
                return '<span class="badge bade-primary ">' . $model->tahap . '</span>';
            } else if ($this->status == 2) {
                return '<span class="badge badge-success">' . $model->tahap . '</span>';
            } else {
                $status =  '<span class="badge badge-danger">' . $model->tahap . '</span>';
                $alasan = '<p class="text-muted">Keterangan : ' . $this->keterangan . '</p>';
                return $status . $alasan;
            }
        }
        return false;
    }
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'id_user']);
    }
}
