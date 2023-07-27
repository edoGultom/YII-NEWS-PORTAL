<?php

use yii\db\Migration;

/**
 * Class m200702_073854_tambah_kategori_banner
 */
class m200702_073854_tambah_kategori_banner extends Migration
{
    public function safeUp()
    {
        $this->batchInsert(
            'kategori_banner',
            [   
                'nama_banner',
                'captions',
                'id_user',
                'created_at',
                'updated_at',
            ], 
            [
                ['Banner Atas', '720x110', '1', '1592281688', '1592281688'],
                ['Banner Bawah', '720x110', '1', '1592281688', '1592281688'],
                ['Banner Tengah', '720x110', '1', '1592281688', '1592281688'],
            ]
        );
    }


    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200702_073854_tambah_kategori_banner cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200702_073854_tambah_kategori_banner cannot be reverted.\n";

        return false;
    }
    */
}
