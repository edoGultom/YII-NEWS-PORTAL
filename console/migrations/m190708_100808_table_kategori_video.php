<?php

use yii\db\Migration;

/**
 * Class m190708_100808_table_kategori_video
 */
class m190708_100808_table_kategori_video extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('kategori_video', [
            'id'                => $this->primaryKey(),
            'kategori'        => $this->string(),
            'captions'          =>$this->text(),
            'id_user'           => $this->integer(),
            'created_at'        => $this->integer(),
            'updated_at'        => $this->integer()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190708_100808_table_kategori_video cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190708_100808_table_kategori_video cannot be reverted.\n";

        return false;
    }
    */
}
