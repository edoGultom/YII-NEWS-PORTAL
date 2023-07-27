<?php

use yii\db\Migration;

/**
 * Class m190301_094237_table_album
 */
class m190301_094237_table_album extends Migration
{
    public function up()
    {
        $this->createTable('album', [
            'id'                => $this->primaryKey(),
            'nama_album'        => $this->string(),
            'captions'          =>$this->text(),
            'id_user'           => $this->integer(),
            'created_at'        => $this->integer(),
            'updated_at'        => $this->integer()
        ]);

        $this->batchInsert(
            'album',
            [   
                'nama_album',
                'captions',
                'id_user',
                'created_at',
                'updated_at'
            ], 
            [
                ['Album 1', 'Captions 1', '1', '1520144220', '1520144220'],
                ['Album 2', 'Captions 2', '1', '1520144220', '1520144220'],
                ['Album 3', 'Captions 3', '1', '1520144220', '1520144220']
            ]
        );
        
    }

    public function down()
    {
        $this->dropTable('album');
    }
}
