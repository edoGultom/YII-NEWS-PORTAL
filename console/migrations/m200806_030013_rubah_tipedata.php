<?php

use yii\db\Migration;

/**
 * Class m200806_030013_rubah_tipedata
 */
class m200806_030013_rubah_tipedata extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->alterColumn('artikel', 'keterangan_gambar',$this->text());
        $this->alterColumn('uploaded_file', 'captions',$this->text());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200806_030013_rubah_tipedata cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200806_030013_rubah_tipedata cannot be reverted.\n";

        return false;
    }
    */
}
