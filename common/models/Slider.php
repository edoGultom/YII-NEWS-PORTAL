<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "slider".
 *
 * @property int $id
 * @property string|null $nama_slider
 */
class Slider extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'slider';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama_slider'], 'string'],
            [['id_section'], 'integer'],
            [['status'], 'default', 'value' => 1],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_section' => 'Section',
            'nama_slider' => 'Nama Slider',
        ];
    }
    public function getSection()
    {
        return $this->hasOne(SectionKategori::className(), ['id' => 'id_section']);
    }
    public function getSliderItem()
    {
        return $this->hasMany(SliderItem::className(), ['id_slider' => 'id']);
    }
}
