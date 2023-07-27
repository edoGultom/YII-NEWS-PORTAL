<?php

use yii\db\Migration;

/**
 * Class m190228_033543_table_kategori_artikel
 */
class m190228_033543_table_kategori_artikel extends Migration
{
    public function up()
    {
        $this->createTable('kategori_artikel', [
            'id'                => $this->primaryKey(),
            'keterangan'        => $this->string(),
            'id_user'           => $this->integer(),
            'created_at'        => $this->integer(),
            'updated_at'        => $this->integer()
        ]);

        
    }

    public function down()
    {
        $this->dropTable('kategori_artikel');
    }
}
