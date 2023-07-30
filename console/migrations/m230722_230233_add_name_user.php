<?php

use yii\db\Migration;

/**
 * Class m230722_230233_add_name_user
 */
class m230722_230233_add_name_user extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%user}}', 'name', $this->text()->defaultValue(null));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m230722_230233_add_name_user cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230722_230233_add_name_user cannot be reverted.\n";

        return false;
    }
    */
}
