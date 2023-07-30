<?php

namespace common\models;

use yii\behaviors\TimestampBehavior;
use Yii;

/**
 * This is the model class for table "section".
 *
 * @property int $id
 * @property int|null $id_kategori
 * @property string|null $keterangan
 * @property string|null $link
 * @property int|null $created_at
 * @property int|null $updated_at
 */
class Section extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'section';
    }

    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }
    public function rules()
    {
        return [
            [['id_kategori', 'created_at', 'updated_at'], 'default', 'value' => null],
            [['id_kategori', 'created_at', 'updated_at'], 'integer'],
            [['keterangan', 'link'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_kategori' => 'Section Kategori',
            'keterangan' => 'Keterangan',
            'link' => 'Link',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
    public function getSecKategori()
    {
        return $this->hasMany(SectionKategori::className(), ['id' => 'id_kategori']);
    }
}