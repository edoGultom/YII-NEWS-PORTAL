<?php

use yii\db\Migration;

/**
 * Class m200807_105240_tambah_kategori
 */
class m200807_105240_tambah_kategori extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->batchInsert(
            'album',
            [   
                'nama_album',
                'id_user',
                'created_at',
                'updated_at',
            ], 
            [
                ['Infografis', 1, 1592281688, 1592281688],
            ]
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200807_105240_tambah_kategori cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200807_105240_tambah_kategori cannot be reverted.\n";

        return false;
    }
    */
}
