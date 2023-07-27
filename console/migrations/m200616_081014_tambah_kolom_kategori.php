<?php

use yii\db\Migration;

/**
 * Class m200616_081014_tambah_kolom_kategori
 */
class m200616_081014_tambah_kolom_kategori extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('kategori_artikel', 'status', $this->integer());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200616_081014_tambah_kolom_kategori cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200616_081014_tambah_kolom_kategori cannot be reverted.\n";

        return false;
    }
    */
}
