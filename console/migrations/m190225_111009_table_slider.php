<?php

use yii\db\Migration;

/**
 * Class m190225_111009_table_slider
 */
class m190225_111009_table_slider extends Migration
{
   public function up()
    {
        $this->createTable('slider', [
            'id'            => $this->primaryKey(),
            'nama_slider'   => $this->text()
        ]);
        $this->batchInsert(
            'slider',
            [   
                'nama_slider'
            ], 
            [
                ['slider pertama',],
            ]
        );
    }

    /**
     * {@inheritdoc}
     */
    public function down()
    {
        $this->dropTable('slider');
    }
}
