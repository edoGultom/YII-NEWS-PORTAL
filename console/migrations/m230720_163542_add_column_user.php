<?php

use yii\db\Migration;

/**
 * Class m230720_163542_add_column_user
 */
class m230720_163542_add_column_user extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%user}}', 'address', $this->string()->defaultValue(null));
        $this->addColumn('{{%user}}', 'phone_number', $this->string()->defaultValue(null));
        $this->addColumn('{{%user}}', 'kelurahan', $this->string()->defaultValue(null));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m230720_163542_add_column_user cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230720_163542_add_column_user cannot be reverted.\n";

        return false;
    }
    */
}
