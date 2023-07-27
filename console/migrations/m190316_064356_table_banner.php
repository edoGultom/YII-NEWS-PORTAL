<?php

use yii\db\Migration;

/**
 * Class m190316_064356_table_banner
 */
class m190316_064356_table_banner extends Migration
{
    public function up()
    {
        $this->createTable('banner', [
            'id'            => $this->primaryKey(),
            'kategori_banner' => $this->integer(),
            'captions'      => $this->text(),
            'id_file'       => $this->integer(),
            'id_user'       => $this->integer(),
            'created_at'    => $this->integer(),
            'updated_at'    => $this->integer()
        ]);
        $this->batchInsert(
            'banner',
            [   
                'kategori_banner',
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
        $this->dropTable('banner');
    }
}
