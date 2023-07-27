<?php

use yii\db\Migration;

/**
 * Class m190708_102202_tambah_kolom_video
 */
class m190708_102202_tambah_kolom_video extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{video}}', 'id_kategori', $this->integer());

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190708_102202_tambah_kolom_video cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190708_102202_tambah_kolom_video cannot be reverted.\n";

        return false;
    }
    */
}
