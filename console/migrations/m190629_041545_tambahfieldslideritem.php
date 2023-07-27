<?php

use yii\db\Migration;

/**
 * Class m190629_041545_tambahfieldslideritem
 */
class m190629_041545_tambahfieldslideritem extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{slider_item}}', 'id_induk', $this->integer()->defaultValue(0));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190629_041545_tambahfieldslideritem cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190629_041545_tambahfieldslideritem cannot be reverted.\n";

        return false;
    }
    */
}
