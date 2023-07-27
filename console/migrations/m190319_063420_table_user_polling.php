<?php

use yii\db\Migration;

/**
 * Class m190319_063420_table_user_polling
 */
class m190319_063420_table_user_polling extends Migration
{
    public function up()
    {
        $this->createTable('user_polling', [
            'id'                => $this->primaryKey(),
            'id_jenis_polling'  => $this->integer(),
            'id_polling'           => $this->string(),
            'ip'                => $this->string(),
            'browser'           => $this->string(),
            'created_at'        => $this->integer(),
            'updated_at'        => $this->integer()
        ]);
        
    }

    public function down()
    {
        $this->dropTable('user_polling');
    } 
}
