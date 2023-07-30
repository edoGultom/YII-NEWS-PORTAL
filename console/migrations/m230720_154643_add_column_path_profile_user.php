<?php

use yii\db\Migration;

/**
 * Class m230720_154643_add_column_path_profile_user
 */
class m230720_154643_add_column_path_profile_user extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%user}}', 'profile_photo_path', $this->string()->defaultValue(null));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m230720_154643_add_column_path_profile_user cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230720_154643_add_column_path_profile_user cannot be reverted.\n";

        return false;
    }
    */
}
