<?php

use yii\db\Migration;

/**
 * Class m190524_063818_table_visitor
 */
class m190524_063818_table_visitor extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('statistik', [
            'id'                => $this->primaryKey(),
            'ip'                => $this->string()->notNull(),
            'tanggal'           => $this->date()->notNull(),
            'hits'              => $this->integer()->notNull(),
            'online'            => $this->string()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190524_063818_table_visitor cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190524_063818_table_visitor cannot be reverted.\n";

        return false;
    }
    */
}
