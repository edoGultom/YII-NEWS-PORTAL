<?php

use yii\db\Migration;

/**
 * Class m230727_152217_tabel_halaman
 */
class m230727_152217_tabel_halaman extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('halaman', [
            'id'            => $this->primaryKey(),
            'nama'         => $this->string()->notNull()->unique(),
            'judul'         => $this->string(),
            'sub_judul'         => $this->string(),
            'isi'           => $this->text(),
            'format_halaman' => $this->integer(),
            'id_user'       => $this->integer(),
            'status'       => $this->tinyInteger(),
            'created_at'    => $this->integer(),
            'updated_at'    => $this->integer()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m230727_152217_tabel_halaman cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230727_152217_tabel_halaman cannot be reverted.\n";

        return false;
    }
    */
}
