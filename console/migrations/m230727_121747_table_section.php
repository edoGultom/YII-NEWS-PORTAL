<?php

use yii\db\Migration;

/**
 * Class m230727_121747_table_section
 */
class m230727_121747_table_section extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('section', [
            'id'  => $this->primaryKey(),
            'id_kategori'    => $this->integer(),
            'keterangan'     => $this->text(),
            'link'           => $this->text(),
            'created_at'     => $this->integer(),
            'updated_at'     => $this->integer()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m230727_121747_table_section cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230727_121747_table_section cannot be reverted.\n";

        return false;
    }
    */
}
