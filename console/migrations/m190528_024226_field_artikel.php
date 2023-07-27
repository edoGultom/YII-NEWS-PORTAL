<?php

use yii\db\Migration;

/**
 * Class m190528_024226_field_artikel
 */
class m190528_024226_field_artikel extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{artikel}}', 'jumlah_visit', $this->integer()->defaultValue(0));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190528_024226_field_artikel cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190528_024226_field_artikel cannot be reverted.\n";

        return false;
    }
    */
}
