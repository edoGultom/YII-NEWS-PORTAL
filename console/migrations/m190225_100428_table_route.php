<?php

// use yii\base\InvalidConfigException;
// use yii\rbac\DbManager;
use yii\db\Schema;
use yii\db\Migration;

/**
 * Class m190225_100428_table_route
 */
class m190225_100428_table_route extends Migration
{
  public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%route}}', [
            'name' => $this->string(64),
            'alias' => $this->string(64)->notNull(),
            'type' => $this->string(64)->notNull(),
            'status' => $this->smallInteger()->notNull()->defaultValue(1),
            'PRIMARY KEY(name)',
        ], $tableOptions);
    }

    public function down()
    {
        echo "m151024_072453_create_route_table cannot be reverted.\n";

        $this->dropTable('{{%route}}');
        return false;
    }

}
