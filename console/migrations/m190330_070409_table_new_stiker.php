<?php

use yii\db\Migration;

/**
 * Class m190330_070409_table_new_stiker
 */
class m190330_070409_table_new_stiker extends Migration
{
    public function up()
    {
        $this->createTable('new_stiker', [
            'id'                => $this->primaryKey(),
            'info'              => $this->string(),
            'url'               => $this->string(),
            'aktif'             => $this->integer(),
            'id_user'           => $this->integer(),
            'created_at'        => $this->integer(),
            'updated_at'        => $this->integer()
        ]);
    }

    public function down()
    {
        $this->dropTable('new_stiker');
    }
}
