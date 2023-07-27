<?php

use yii\db\Migration;

/**
 * Class m190309_103612_table_unduhan
 */
class m190309_103612_table_unduhan extends Migration
{
    public function up()
    {
        $this->createTable('unduhan', [
            'id'            => $this->primaryKey(),
            'id_kategori'      => $this->integer(),
            'judul'         => $this->string(),
            'keterangan'    => $this->string(),
            'jumlah_download'=> $this->integer(),
            'id_file'       => $this->integer(),
            'id_user'       => $this->integer(),
            'created_at'    => $this->integer(),
            'updated_at'    => $this->integer()
        ]);
        $this->batchInsert(
            'unduhan',
            [   
                'id_kategori',
                'judul',
                'keterangan',
                'id_file',
                'id_user',
                'created_at',
                'updated_at'
            ], 
            [
                ['1','Judul 1','Ketarangan 1','11', '1', '1520144220', '1520144220'],
                ['1','Judul 2','Ketarangan 2','12', '1', '1520144220', '1520144220'],
            ]
        );
    }
    public function down()
    {
        $this->dropTable('unduhan');
    }
}
