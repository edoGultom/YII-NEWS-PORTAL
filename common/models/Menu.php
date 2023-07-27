<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use common\components\UserBehavior;


/**
 * This is the model class for table "menu".
 *
 * @property int $id_menu
 * @property int $id_kategori
 * @property int $id_induk
 * @property string $keterangan
 * @property string $link
 * @property int $id_user
 * @property int $created_at
 * @property int $updated_at
 */
class Menu extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'menu';
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
            [['id_kategori', 'id_induk', 'id_user', 'created_at', 'updated_at'], 'integer'],
            [['keterangan', 'link'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_menu' => 'Id Menu',
            'id_kategori' => 'Kategori',
            'id_induk' => 'Id Induk',
            'keterangan' => 'Keterangan',
            'link' => 'Link',
            'id_user' => 'Id User',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    public function getMenuKategori()
    {
        return $this->hasOne(MenuKategori::className(), ['id_menu_kategori' => 'id_kategori']);
    }

    public function getIndukMenu()
    {
        return $this->hasOne(Menu::className(), ['id_menu' => 'id_induk']);
    }
    public function getMenuAnak()
    {
        return $this->hasMany(Menu::className(), ['id_induk' => 'id_menu'])->orderBy(['id_menu'=>SORT_ASC])->all();
    }
}
