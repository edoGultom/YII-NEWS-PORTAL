<?php

use yii\db\Migration;

/**
 * Class m200731_115516_kategori_artikel
 */
class m200731_115516_kategori_artikel extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->batchInsert(
            'kategori_artikel',
            [   
                'keterangan',
                'id_user',
                'created_at',
                'updated_at',
                'status'
            ], 
            [
                ['Berita', '1', '1592281688', '1592281688', 1],
                ['Kegiatan', '1', '1592281688', '1592281688', 1],
                ['Ragam/Info Kesehatan', '1', '1592281688', '1592281688', 1],
            ]
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200731_115516_kategori_artikel cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200731_115516_kategori_artikel cannot be reverted.\n";

        return false;
    }
    */
}
