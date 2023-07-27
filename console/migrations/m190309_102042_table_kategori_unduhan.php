<?php

use yii\db\Migration;

/**
 * Class m190309_102042_table_kategori_unduhan
 */
class m190309_102042_table_kategori_unduhan extends Migration
{
   public function up()
    {
        $this->createTable('kategori_unduhan', [
            'id'                => $this->primaryKey(),
            'kategori_unduhan'  => $this->string(),
            'id_user'           => $this->integer(),
            'created_at'        => $this->integer(),
            'updated_at'        => $this->integer()
        ]);
        $this->batchInsert(
            'kategori_unduhan',
            [   
                'kategori_unduhan',
                'id_user',
                'created_at',
                'updated_at'
            ], 
            [
                ['Unduhan Perundangan','1', '1520144220', '1520144220']
            ]
        );
        
    }
    public function down()
    {
        $this->dropTable('kategori_unduhan');
    }
}
