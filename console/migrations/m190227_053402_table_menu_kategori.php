<?php

use yii\db\Migration;

/**
 * Class m190227_053402_table_menu_kategori
 */
class m190227_053402_table_menu_kategori extends Migration
{
    public function up()
    {
        $this->createTable('menu_kategori', [
            'id_menu_kategori'  => $this->primaryKey(),
            'keterangan'        => $this->string(),
            'id_user'           => $this->integer(),
            'created_at'        => $this->integer(),
            'updated_at'        => $this->integer()
        ]);
        
        $this->batchInsert(
            'menu_kategori',
            [   
                'keterangan',
                'id_user',
                'created_at',
                'updated_at'
            ], 
            [
                ['menu_utama', '1', '1520144220', '1520144220'],
                ['menu_sidebar', '1', '1520144220', '1520144220'],
                ['menu_footer', '1', '1520144220', '1520144220'],
                ['Menu Topbar', '1', '1520144220', '1520144220']
            ]
        );
    }

    public function down()
    {
        $this->dropTable('menu_kategori');
    }
}
