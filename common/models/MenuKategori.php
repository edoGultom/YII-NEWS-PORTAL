<?php

namespace common\models;
use Yii;
use yii\behaviors\TimestampBehavior;
use common\components\UserBehavior;


/**
 * This is the model class for table "menu_kategori".
 *
 * @property int $id_menu_kategori
 * @property string $keterangan
 * @property int $id_user
 * @property int $created_at
 * @property int $updated_at
 */
class MenuKategori extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'menu_kategori';
    }

    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
            UserBehavior::className()
        ];
    }
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_user', 'created_at', 'updated_at'], 'integer'],
            [['keterangan'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_menu_kategori' => 'Id Menu Kategori',
            'keterangan' => 'Keterangan',
            'id_user' => 'Id User',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
