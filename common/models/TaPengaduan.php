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
            [['id_user', 'status'], 'integer'],
            [['subjek', 'isi', 'id_file'], 'string'],
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
    public function getUserBy($id_user)
    {
        $model =  User::findOne(['id' => $id_user]);
        if ($model) {
            return $model->name;
        }
        return 'tidak ditemukan';
    }
    public function getRoleUser($id_user)
    {
        $model =  AuthAssignment::findOne(['user_id' => $id_user]);
        if ($model) {
            return $model->item_name;
        }
        return 'tidak ditemukan';
    }
    public function getFile()
    {
        return $this->hasOne(UploadedFiledb::className(), ['id' => 'id_file']);
    }
    public function getTanggapan()
    {
        return $this->hasMany(TaTanggapan::className(), ['id_pengaduan' => 'id'])->orderBy(['tgl_tanggapan' => SORT_ASC]);
        // ->andOnCondition(['id_user' => Yii::$app->user->identity->id]);
    }
    public function getTanggapanById()
    {
        $model = TaTanggapan::find()->where(['id_pengaduan' => $this->id])->orderBy(['tgl_tanggapan' => SORT_ASC])->asArray()->all();
        foreach ($model as $key => $value) {
            $model[$key]['tgl_tanggapan'] =  Yii::$app->formatter->asDate($model[$key]['tgl_tanggapan'], 'php:d F Y H:i:s');
            $model[$key]['username'] =  $this->getUserBy($model[$key]['id_user']);
            $model[$key]['role'] =  $this->getRoleUser($model[$key]['id_user']);
        }
        return $model;
    }
}
