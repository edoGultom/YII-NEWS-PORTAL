<?php

namespace common\models;

use yii\behaviors\TimestampBehavior;
use common\components\UserBehavior;
use yii\behaviors\SluggableBehavior;
use Yii;

/**
 * This is the model class for table "halaman".
 *
 * @property int $id
 * @property string $nama
 * @property string|null $judul
 * @property string|null $sub_judul
 * @property string|null $isi
 * @property int|null $format_halaman
 * @property int|null $id_user
 * @property int|null $status
 * @property int|null $created_at
 * @property int|null $updated_at
 */
class Halaman extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'halaman';
    }

    /**
     * {@inheritdoc}
     */

    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
            UserBehavior::className(),
            [
                'class' => SluggableBehavior::className(),
                'attribute' => 'judul',
                'slugAttribute' => 'sub_judul',
            ],
        ];
    }

    public function rules()
    {
        return [
            [['nama'], 'required'],
            [['isi'], 'string'],
            [['format_halaman', 'id_user', 'status', 'created_at', 'updated_at'], 'default', 'value' => null],
            [['format_halaman', 'id_user', 'status', 'created_at', 'updated_at'], 'integer'],
            [['nama', 'judul', 'sub_judul'], 'string', 'max' => 255],
            [['nama'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nama' => 'Nama',
            'judul' => 'Judul',
            'sub_judul' => 'Sub Judul',
            'isi' => 'Isi',
            'format_halaman' => 'Format Halaman',
            'id_user' => 'Id User',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
    public function getPostingBy()
    {
        return $this->hasOne(User::className(), ['id' => 'id_user']);
    }
}
