<?php

use yii\db\Migration;

/**
 * Class m190319_063302_table_jenis_poling
 */
class m190319_063302_table_jenis_poling extends Migration
{
    public function up()
    {
        $this->createTable('jenis_polling', [
            'id'                => $this->primaryKey(),
            'jenis_polling'     => $this->string(),
            'pertanyaan'        => $this->text(),
            'id_user'           => $this->integer(),
            'created_at'        => $this->integer(),
            'updated_at'        => $this->integer()
        ]);

        $this->batchInsert(
            'jenis_polling',
            [   
                'jenis_polling',
                'pertanyaan',
                'id_user',
                'created_at',
                'updated_at'
            ], 
            [
                ['Polling Kesehatan', 'Apakah Website in bermanfaat untuk anda dalam info kesehatan?','1', '1520144220', '1520144220'],
                ['Polling Kehutanan', 'Apakah Website in bermanfaat untuk anda dalam info kehutanan?','1', '1520144220', '1520144220'],
                ['Polling Pendidikan', 'Apakah Website in bermanfaat untuk anda dalam info pendidikan?','1', '1520144220', '1520144220']
            ]
        );
        
    }

    public function down()
    {
        $this->dropTable('jenis_polling');
    }
}
