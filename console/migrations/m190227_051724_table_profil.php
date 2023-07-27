<?php

use yii\db\Migration;

/**
 * Class m190227_051724_table_profil
 */
class m190227_051724_table_profil extends Migration
{
    public function up()
    {
        $this->createTable('profil', [
            'id_profil'     => $this->primaryKey(),
            'judul'         => $this->string(),
            'deskripsi'     => $this->text(),
            'gambar'        => $this->integer(),
            'id_user'       => $this->integer(),
            'created_at'    => $this->integer(),
            'updated_at'    => $this->integer()
        ]);
    }

    public function down()
    {
        $this->dropTable('profil');
    }
}
