<?php

use yii\db\Migration;

/**
 * Class m190228_034437_table_perundangan
 */
class m190228_034437_table_perundangan extends Migration
{
    public function up()
    {
        $this->createTable('perundangan', [
            'id'            => $this->primaryKey(),
            'judul'         => $this->string(),
            'sub_judul'     => $this->string(),
            'kategori'      => $this->integer(),
            'aktif'         => $this->tinyInteger(Null),
            'isi'           => $this->text(),
            'gambar'        => $this->integer(),
            'keterangan_gambar'         => $this->string(),
            'tag'           => $this->string(),
            'id_user'       => $this->integer(),
            'created_at'    => $this->integer(),
            'updated_at'    => $this->integer()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function down()
    {
        $this->dropTable('perundangan');
    }
}
