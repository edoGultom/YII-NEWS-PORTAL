<?php

use yii\db\Migration;

/**
 * Class m200807_072432_menu_atas
 */
class m200807_072432_menu_atas extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        Yii::$app->db->createCommand('DELETE FROM menu')->execute();
        Yii::$app->db->createCommand('DELETE FROM menu_kategori')->execute();
        $this->batchInsert(
            'menu',
            [   
                'id_kategori',
                'keterangan',
                'link',
                'id_user',
                'created_at',
                'updated_at',
            ], 
            [
                [3, 'Profil', '/', '1', '1592281688', '1592281688'],
                [3, 'STRUKTUR ORGANISASI', '/', '1', '1592281688', '1592281688'],
                [3, 'UNIT KERJA DAN PEJABAT', '/', '1', '1592281688', '1592281688'],
                [3, 'PERUNDANGAN', '/', '1', '1592281688', '1592281688'],
                [3, 'INFORMASI PUBLIK', '/', '1', '1592281688', '1592281688'],
                [3, 'PHOTO', '/photo', '1', '1592281688', '1592281688'],
                [3, 'VIDEO', '/video', '1', '1592281688', '1592281688'],
                [3, 'UNDUH', '/', '1', '1592281688', '1592281688'],
                [3, 'PETA SITUS', '/', '1', '1592281688', '1592281688'],
                [3, 'FAQ', '/', '1', '1592281688', '1592281688'],
                [3, 'HUBUNGI', '/', '1', '1592281688', '1592281688'],


            ]
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200807_072432_menu_atas cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200807_072432_menu_atas cannot be reverted.\n";

        return false;
    }
    */
}
