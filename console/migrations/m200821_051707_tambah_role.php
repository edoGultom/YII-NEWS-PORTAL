<?php

use yii\db\Migration;

/**
 * Class m200821_051707_tambah_role
 */
class m200821_051707_tambah_role extends Migration
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
                    '/new-stiker/*', 2, NULL, NULL, NULL, time(), time()
                ],




            ]
        );

        $this->batchInsert(
            'auth_item_child',
            [
                'parent',
                'child',
            ],
            [
                [
                    'Stiker', '/new-stiker/*'
                ],


            ]
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200821_051707_tambah_role cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200821_051707_tambah_role cannot be reverted.\n";

        return false;
    }
    */
}
