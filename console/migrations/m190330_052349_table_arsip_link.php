<?php

use yii\db\Migration;

/**
 * Class m190330_052349_table_arsip_link
 */
class m190330_052349_table_arsip_link extends Migration
{
    public function up()
    {
        $this->createTable('arsip_link', [
            'id'                => $this->primaryKey(),
            'nama'              => $this->string(),
            'url'               => $this->string(),
            'aktif'             => $this->integer(),
            'id_user'           => $this->integer(),
            'created_at'        => $this->integer(),
            'updated_at'        => $this->integer()
        ]);
    }

    public function down()
    {
        $this->dropTable('arsip_link');
    }
}
