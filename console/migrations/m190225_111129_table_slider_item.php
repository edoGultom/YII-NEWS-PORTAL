<?php

use yii\db\Migration;

/**
 * Class m190225_111129_table_slider_item
 */
class m190225_111129_table_slider_item extends Migration
{
    public function up()
    {
        $this->createTable('slider_item', [
            'id'            => $this->primaryKey(),
            'id_slider'     => $this->integer(),
            'gambar'        => $this->integer(),
            'nama_slider'   => $this->string(),
            'captions'      => $this->text(),
            'id_user'       => $this->integer(),
            'created_at'    => $this->integer(),
            'updated_at'    => $this->integer()
        ]);

        $this->batchInsert(
            'slider_item',
            [   
                'id_slider',
                'gambar',
                'nama_slider',
                'captions',
                'id_user',
                'created_at',
                'updated_at'
            ], 
            [
                ['1','14','Slider 1','Slider 1 yang pertama kali di upload','10','1551415139','1551415139'],
                ['1','15','Slider 1','Slider 1 yang kedua kali di upload','10','1551415139','1551415139'],
                ['1','16','Slider 1','Slider 1 yang ketiga kali di upload','10','1551415139','1551415139']
            ]
        );
    }

    /**
     * {@inheritdoc}
     */
    public function down()
    {
        $this->dropTable('slider_item');
    }
}
