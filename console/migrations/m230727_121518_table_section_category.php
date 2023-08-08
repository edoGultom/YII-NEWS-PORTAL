<?php

use yii\db\Migration;

/**
 * Class m230727_121518_table_section_category
 */
class m230727_121518_table_section_category extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('section_kategori', [
            'id'  => $this->primaryKey(),
            'keterangan'        => $this->string(),
            'id_user'           => $this->integer(),
            'created_at'        => $this->integer(),
            'updated_at'        => $this->integer()
        ]);

        $this->batchInsert(
            'section_kategori',
            [
                'keterangan',
                'id_user',
                'created_at',
                'updated_at'
            ],
            [
                ['Section Header', '1', '1520144220', '1520144220'],
                ['Section Jumbotron', '1', '1520144220', '1520144220'],
                ['Section Content', '1', '1520144220', '1520144220'],
                ['Section Footer', '1', '1520144220', '1520144220']
            ]
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m230727_121518_table_section_category cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230727_121518_table_section_category cannot be reverted.\n";

        return false;
    }
    */
}
