<?php

use yii\db\Migration;

/**
 * Class m230722_222119_add_auth_item_user
 */
class m230722_222119_add_auth_item_user extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->batchInsert(
            'auth_item',
            [
                'name',
                'type',
                'description',
                'rule_name',
                'data',
                'created_at',
                'updated_at'
            ],
            [

                [
                    'user', 1, NULL, NULL, NULL, time(), time()
                ],
            ]
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m230722_222119_add_auth_item_user cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230722_222119_add_auth_item_user cannot be reverted.\n";

        return false;
    }
    */
}
