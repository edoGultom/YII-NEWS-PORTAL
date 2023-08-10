<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "ref_tahap_usulan".
 *
 * @property int $id
 * @property string|null $tahap
 */
class RefTahapUsulan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ref_tahap_usulan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tahap'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'tahap' => 'Tahap',
        ];
    }
}
