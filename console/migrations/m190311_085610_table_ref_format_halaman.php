<?php

use yii\db\Migration;

/**
 * Class m190311_085610_table_ref_format_halaman
 */
class m190311_085610_table_ref_format_halaman extends Migration
{
    public function up()
    {
        $this->createTable('ref_format_halaman', [
            'id'            => $this->primaryKey(),
            'nama'         => $this->string(),
            'layout'        => $this->string(),
            'id_user'       => $this->integer(),
            'created_at'    => $this->integer(),
            'updated_at'    => $this->integer()
        ]);
        $this->batchInsert(
            'ref_format_halaman',
            [   
                'nama',
                'layout',
                'id_user',
                'created_at',
                'updated_at'
            ], 
            [
                ['Dashboard','main', '1', '1520144220', '1520144220'],
                ['1 Kolom','Kolom', '1', '1520144220', '1520144220'],
                ['Album','album', '1', '1520144220', '1520144220'],
                ['Galery','galery', '1', '1520144220', '1520144220']
            ]
        );
    }
    public function down()
    {
        $this->dropTable('ref_format_halaman');
    }
}
