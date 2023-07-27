<?php

use yii\db\Migration;

/**
 * Class m190528_062557_perundangan_jumlah_download
 */
class m190528_062557_perundangan_jumlah_download extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{perundangan}}', 'jumlah_download', $this->integer()->defaultValue(0));

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190528_062557_perundangan_jumlah_download cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190528_062557_perundangan_jumlah_download cannot be reverted.\n";

        return false;
    }
    */
}
