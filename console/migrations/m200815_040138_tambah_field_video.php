<?php

use yii\db\Migration;

/**
 * Class m200815_040138_tambah_field_video
 */
class m200815_040138_tambah_field_video extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('video', 'thumbnail', $this->integer());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200815_040138_tambah_field_video cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200815_040138_tambah_field_video cannot be reverted.\n";

        return false;
    }
    */
}
