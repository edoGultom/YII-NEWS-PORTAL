<?php

use yii\db\Migration;

/**
 * Class m191009_073246_tambah_kolom_urutan_banner
 */
class m191009_073246_tambah_kolom_urutan_banner extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{banner}}', 'urutan', $this->integer());

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m191009_073246_tambah_kolom_urutan_banner cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m191009_073246_tambah_kolom_urutan_banner cannot be reverted.\n";

        return false;
    }
    */
}
