<?php

use yii\db\Migration;

/**
 * Class m190311_084448_table_halaman
 */
class m190311_084448_table_halaman extends Migration
{
   public function up()
    {
        $this->createTable('halaman', [
            'id'            => $this->primaryKey(),
            'nama'         => $this->string()->notNull()->unique(),
            'judul'         => $this->string(),
            'isi'           => $this->text(),
            'format_halaman'=> $this->integer(),
            'id_user'       => $this->integer(),
            'created_at'    => $this->integer(),
            'updated_at'    => $this->integer()
        ]);
        $this->batchInsert(
            'halaman',
            [   
                'nama',
                'judul',
                'isi',
                'format_halaman',
                'id_user',
                'created_at',
                'updated_at'
            ], 
            [
                [
                    'Halaman 1',
                    'Judul 1',
                    '<p>Isi 1</p>',
                    '1',
                    '1', 
                    '1520144220', 
                    '1520144220'
                ]
            ]
        );
    }
    public function down()
    {
        $this->dropTable('halaman');
    }
}
