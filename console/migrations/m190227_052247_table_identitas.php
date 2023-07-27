<?php

use yii\db\Migration;

/**
 * Class m190227_052247_table_identitas
 */
class m190227_052247_table_identitas extends Migration
{
   public function up()
    {
        $this->createTable('identitas', [
            'id_identitas'      => $this->primaryKey(),
            'nama_website'      => $this->string(),
            'url'               => $this->string(),
            'fb_fanpage'        => $this->string(),
            'twitter'           => $this->string(),
            'meta_deskripsi'    => $this->string(),
            'meta_keyword'      => $this->string(),
            'email'             => $this->string(),
            'no_telp'        => $this->string(),
            'no_rekening'       => $this->string(),
            'hari_kerja'        => $this->string(),
            'jam_kerja'         => $this->string(),
            'alamat'            => $this->text(),
            'gambar_favicon'    => $this->integer(),
            'id_user'           => $this->integer(),
            'created_at'        => $this->integer(),
            'updated_at'        => $this->integer()
        ]);
    }

    public function down()
    {
        $this->dropTable('identitas');
    }
}
