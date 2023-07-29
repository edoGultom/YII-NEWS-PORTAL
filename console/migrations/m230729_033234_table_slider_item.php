<?php

use yii\db\Migration;

/**
 * Class m230729_033234_table_slider_item
 */
class m230729_033234_table_slider_item extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('slider', [
            'id'            => $this->primaryKey(),
            'id_section'   => $this->integer(),
            'nama_slider'   => $this->text(),
            'status'       => $this->tinyInteger(),
        ]);

        $this->createTable('slider_item', [
            'id'            => $this->primaryKey(),
            'id_slider'     => $this->integer(),
            'gambar'        => $this->integer(),
            'nama_slider'   => $this->string(),
            'captions'      => $this->text(),
            'id_user'       => $this->integer(),
            'aktif'       => $this->tinyInteger(),
            'created_at'    => $this->integer(),
            'updated_at'    => $this->integer()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m230729_033234_table_slider_item cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230729_033234_table_slider_item cannot be reverted.\n";

        return false;
    }
    */
}
