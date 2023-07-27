<?php

use yii\db\Migration;

/**
 * Class m200611_040945_change
 */
class m200611_040945_change extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->alterColumn('data_statistik', 'nilai','float');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200611_040945_change cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200611_040945_change cannot be reverted.\n";

        return false;
    }
    */
}
