<?php

use yii\db\Migration;

/**
 * Class m230727_161718_table_artikel
 */
class m230727_161718_table_artikel extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('artikel', [
            'id'            => $this->primaryKey(),
            'judul'         => $this->string(),
            'sub_judul'     => $this->string(),
            'kategori'      => $this->integer(),
            'baru'          => $this->tinyInteger(Null),
            'popular'       => $this->tinyInteger(Null),
            'aktif'         => $this->tinyInteger(Null),
            'isi'           => $this->text(),
            'gambar'        => $this->integer(),
            'gambart_thumbnail'         => $this->integer(),
            'keterangan_gambar'         => $this->text(),
            'tag'           => $this->string(),
            'id_user'       => $this->integer(),
            'jumlah_visit'   => $this->integer()->defaultValue(0),
            'created_at'    => $this->integer(),
            'updated_at'    => $this->integer()
        ]);

        // $this->createTable('kategori_artikel', [
        //     'id'                => $this->primaryKey(),
        //     'keterangan'        => $this->string(),
        //     'id_user'           => $this->integer(),
        //     'status'           => $this->tinyInteger(),
        //     'created_at'        => $this->integer(),
        //     'updated_at'        => $this->integer()
        // ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m230727_161718_table_artikel cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230727_161718_table_artikel cannot be reverted.\n";

        return false;
    }
    */
}
