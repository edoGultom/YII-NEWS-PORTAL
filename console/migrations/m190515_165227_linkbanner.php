<?php

use yii\db\Migration;

/**
 * Class m190515_165227_linkbanner
 */
class m190515_165227_linkbanner extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('banner', 'link', $this->text());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190515_165227_linkbanner cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190515_165227_linkbanner cannot be reverted.\n";

        return false;
    }
    */
}
