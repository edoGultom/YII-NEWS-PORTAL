<?php

use yii\db\Migration;

/**
 * Class m190228_035720_table_kategori_perundangan
 */
class m190228_035720_table_kategori_perundangan extends Migration
{
    public function up()
    {
        $this->createTable('kategori_perundangan', [
            'id'                => $this->primaryKey(),
            'keterangan'        => $this->string(),
            'id_user'           => $this->integer(),
            'created_at'        => $this->integer(),
            'updated_at'        => $this->integer()
        ]);
        
    }

    public function down()
    {
        $this->dropTable('kategori_perundangan');
    }
}
