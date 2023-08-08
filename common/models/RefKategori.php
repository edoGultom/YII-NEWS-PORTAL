<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "ref_kategori".
 *
 * @property int $id
 * @property string|null $keterangan
 */
class RefKategori extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ref_kategori';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['keterangan'], 'string'],
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
        ];
    }
    public function getArtikel()
    {
        return $this->hasMany(Artikel::className(), ['kategori' => 'id']);
    }
}
