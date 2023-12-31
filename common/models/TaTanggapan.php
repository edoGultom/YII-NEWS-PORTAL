<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "ta_tanggapan".
 *
 * @property int $id
 * @property int|null $id_pengaduan
 * @property int|null $tgl_tanggapan
 * @property string|null $tanggapan
 * @property int|null $id_user
 */
class TaTanggapan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ta_tanggapan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_pengaduan', 'tgl_tanggapan', 'id_user'], 'default', 'value' => null],
            [['id_pengaduan', 'id_user'], 'integer'],
            ['tgl_tanggapan', 'safe'],
            [['tanggapan'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_pengaduan' => 'Id Pengaduan',
            'tgl_tanggapan' => 'Tgl Tanggapan',
            'tanggapan' => 'Tanggapan',
            'id_user' => 'Id Admin',
        ];
    }
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'id_user']);
    }
}
