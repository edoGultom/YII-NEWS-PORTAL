<?php

use yii\db\Migration;

/**
 * Class m190319_063332_table_polling
 */
class m190319_063332_table_polling extends Migration
{
    public function up()
    {
        $this->createTable('polling', [
            'id'                => $this->primaryKey(),
            'id_jenis_polling'  => $this->integer(),
            'polling'           => $this->string(),
            'created_at'        => $this->integer(),
            'updated_at'        => $this->integer()
        ]);

        $this->batchInsert(
            'polling',
            [   
                'id_jenis_polling',
                'polling',
                'created_at',
                'updated_at'
            ], 
            [
                ['1', 'Sangat Bagus', '1520144220', '1520144220'],
                ['2', 'Bagus', '1520144220', '1520144220'],
                ['3', 'Kurang Bagus', '1520144220', '1520144220']
            ]
        );
        
    }

    public function down()
    {
        $this->dropTable('polling');
    } 
}
