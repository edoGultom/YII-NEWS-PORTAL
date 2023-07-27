<?php

use yii\db\Migration;

/**
 * Class m190301_095513_table_album_gambar
 */
class m190301_095513_table_album_gambar extends Migration
{
    public function up()
    {
        $this->createTable('album_gambar', [
            'id'            => $this->primaryKey(),
            'id_album'      => $this->integer(),
            'captions'      => $this->text(),
            'id_file'       => $this->integer(),
            'id_user'       => $this->integer(),
            'created_at'    => $this->integer(),
            'updated_at'    => $this->integer()
        ]);
        $this->batchInsert(
            'album_gambar',
            [   
                'id_album',
                'captions',
                'id_file',
                'id_user',
                'created_at',
                'updated_at'
            ], 
            [
                ['1','Captions 1','2', '1', '1520144220', '1520144220'],
                ['1','Captions 2','7', '1', '1520144220', '1520144220'],
                ['1','Captions 3','8', '1', '1520144220', '1520144220']
            ]
        );
    }

    /**
     * {@inheritdoc}
     */
    public function down()
    {
        $this->dropTable('album_gambar');
    }
}
