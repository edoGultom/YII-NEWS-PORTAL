<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "ta_pengusulan_surat".
 *
 * @property int $id
 * @property int|null $id_jenis_surat
 * @property int|null $id_file
 * @property int|null $id_user
 * @property string|null $jenis_surat
 * @property string|null $tanggal
 * @property string|null $keterangan
 * @property int|null $status
 * @property string|null $nama_lengkap
 * @property string|null $tempat_lahir
 * @property string|null $tgl_lahir
 * @property string|null $jenis_kelamin
 * @property string|null $alamat
 * @property string|null $alamat_domisili
 * @property string|null $keterangan_tempat_tinggal
 * @property string|null $keterangan_keperluan_surat
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
            [['tanggal', 'tgl_lahir'], 'safe'],
            [['keterangan', 'nama_lengkap', 'tempat_lahir', 'alamat', 'alamat_domisili', 'keterangan_tempat_tinggal', 'keterangan_keperluan_surat'], 'string'],
            [['jenis_surat'], 'string', 'max' => 255],
            [['jenis_kelamin'], 'string', 'max' => 20],
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
            'id_file' => 'Id File',
            'id_user' => 'Id User',
            'jenis_surat' => 'Jenis Surat',
            'tanggal' => 'Tanggal',
            'keterangan' => 'Keterangan',
            'status' => 'Status',
            'nama_lengkap' => 'Nama Lengkap',
            'tempat_lahir' => 'Tempat Lahir',
            'tgl_lahir' => 'Tgl Lahir',
            'jenis_kelamin' => 'Jenis Kelamin',
            'alamat' => 'Alamat',
            'alamat_domisili' => 'Alamat Domisili',
            'keterangan_tempat_tinggal' => 'Keterangan Tempat Tinggal',
            'keterangan_keperluan_surat' => 'Keterangan Keperluan Surat',
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
    public function getTahapUsulan()
    {
        return $this->hasOne(RefTahapUsulan::className(), ['id' => 'status']);
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
