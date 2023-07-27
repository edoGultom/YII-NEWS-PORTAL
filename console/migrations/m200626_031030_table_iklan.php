<?php

use yii\db\Migration;

/**
 * Class m200626_031030_table_iklan
 */
class m200626_031030_table_iklan extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function up()
    {
        $this->createTable('iklan', [
            'id' => $this->primarykey(),
            'nama' => $this->string(),
            'gambar' => $this->integer(),
            'tanggal_mulai' => $this->date(),
            'tanggal_selesai' => $this->date(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function down()
    {
        $this->dropTable('iklan');

    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200626_031030_table_iklan cannot be reverted.\n";

        return false;
    }
    */
}
