<?php

use yii\db\Migration;

/**
 * Class m230727_170403_uploaded_file
 */
class m230727_170403_uploaded_file extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('uploaded_file', [
            'id'                => $this->primaryKey(),
            'name'              => $this->string(),
            'filename'          => $this->string(),
            'captions'          => $this->text(),
            'size'              => $this->integer(),
            'type'              => $this->string(),
            'status'              => $this->tinyInteger(),
            'created_at'              => $this->integer(),
            'updated_at'              => $this->integer()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m230727_170403_uploaded_file cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230727_170403_uploaded_file cannot be reverted.\n";

        return false;
    }
    */
}
