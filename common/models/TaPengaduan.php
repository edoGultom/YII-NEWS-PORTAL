<?php

namespace common\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "ta_pengaduan".
 *
 * @property int $id
 * @property int|null $id_user
 * @property int|null $tgl_pengaduan
 * @property string|null $subjek
 * @property string|null $isi
 * @property int|null $status
 */
class TaPengaduan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ta_pengaduan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_user', 'tgl_pengaduan', 'status'], 'default', 'value' => null],
            [['id_user', 'status', 'id_file'], 'integer'],
            [['subjek', 'isi'], 'string'],
            ['tgl_pengaduan', 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_user' => 'Id User',
            'tgl_pengaduan' => 'Tgl Pengaduan',
            'subjek' => 'Subjek',
            'isi' => 'Isi',
            'status' => 'Status',
        ];
    }
    public function setTahap($tahap, $keterangan = NULL)
    {
        $this->status = $tahap;
        if ($this->save()) {
            return true;
        }
        return false;
    }
    public function getTahap()
    {
        return $this->hasOne(RefTahapUsulan::className(), ['id' => 'status']);
    }
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'id_user']);
    }
    public function getFile()
    {
        return $this->hasOne(UploadedFiledb::className(), ['id' => 'id_file']);
    }
    public function getTanggapan()
    {
        return $this->hasMany(TaTanggapan::className(), ['id_pengaduan' => 'id'])->orderBy(['tgl_tanggapan' => SORT_DESC])->andOnCondition(['id_admin' => Yii::$app->user->identity->id]);
    }
    public function getTanggapanById()
    {
        // $kategori = ArrayHelper::map(TaTanggapan::find()->where(['id_pengaduan'=>$this->id])->all(), 'id', 'keterangan');
        return TaTanggapan::find()->where(['id_pengaduan' => $this->id])->all();

        // return $this->hasMany(TaTanggapan::className(), ['id_pengaduan' => 'id'])->orderBy(['tgl_tanggapan' => SORT_DESC]);
    }
}
