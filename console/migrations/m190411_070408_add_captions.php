<?php

use yii\db\Migration;

/**
 * Class m190411_070408_add_captions
 */
class m190411_070408_add_captions extends Migration
{
    public function up()
    {
        $this->addColumn('uploaded_file', 'captions', $this->string());
        
    }
    public function down()
    {
        $this->dropColumn('uploaded_file', 'captions');
        
    }
}