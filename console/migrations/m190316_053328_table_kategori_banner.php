<?php

use yii\db\Migration;

/**
 * Class m190316_053328_table_kategori_banner
 */
class m190316_053328_table_kategori_banner extends Migration
{
    public function up()
    {
        $this->createTable('kategori_banner', [
            'id'                => $this->primaryKey(),
            'nama_banner'        => $this->string(),
            'captions'          =>$this->text(),
            'id_user'           => $this->integer(),
            'created_at'        => $this->integer(),
            'updated_at'        => $this->integer()
        ]);

        $this->batchInsert(
            'kategori_banner',
            [   
                'nama_banner',
                'captions',
                'id_user',
                'created_at',
                'updated_at'
            ], 
            [
                ['Banner 1', 'Captions 1', '1', '1520144220', '1520144220'],
                ['Banner 2', 'Captions 2', '1', '1520144220', '1520144220'],
                ['Banner 3', 'Captions 3', '1', '1520144220', '1520144220']
            ]
        );
        
    }

    public function down()
    {
        $this->dropTable('kategori_banner');
    }
}
