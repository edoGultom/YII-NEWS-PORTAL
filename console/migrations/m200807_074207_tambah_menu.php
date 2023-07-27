<?php

use yii\db\Migration;

/**
 * Class m200807_074207_tambah_menu
 */
class m200807_074207_tambah_menu extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
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
                [1, 'SEKRETARIAT', '/', '1', '1592281688', '1592281688'],
                [1, 'BIDANG KESEHATAN MASYARAKAT', '/', '1', '1592281688', '1592281688'],
                [1, 'BIDANG P2 PENYAKIT', '/', '1', '1592281688', '1592281688'],
                [1, 'BIDANG YANKES', '/', '1', '1592281688', '1592281688'],
                [1, 'BIDANG SUMBER DAYA KESEHATAN', '/', '1', '1592281688', '1592281688'],
                [1, 'UPT', '/', '1', '1592281688', '1592281688']
            ]
        );

        $this->batchInsert(
            'menu_kategori',
            [   
                'id_menu_kategori',
                'keterangan',
                'id_user',
                'created_at',
                'updated_at',
            ], 
            [
                [1, 'Menu Utama', '1', '1592281688', '1592281688'],
                [2, 'Menu Bawah', '1', '1592281688', '1592281688'],
                [3, 'Menu Atas', '1', '1592281688', '1592281688']
            ]
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200807_074207_tambah_menu cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200807_074207_tambah_menu cannot be reverted.\n";

        return false;
    }
    */
}
