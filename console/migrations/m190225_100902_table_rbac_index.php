<?php

// use yii\db\Migration;
use yii\base\InvalidConfigException;
use yii\db\Migration;
use yii\rbac\DbManager;
/**
 * Class m190225_100902_table_rbac_index
 */
class m190225_100902_table_rbac_index extends Migration
{
    public $column = 'user_id';
    public $index = 'auth_assignment_user_id_idx';

    /**
     * @throws yii\base\InvalidConfigException
     * @return DbManager
     */
    protected function getAuthManager()
    {
        $authManager = Yii::$app->getAuthManager();
        if (!$authManager instanceof DbManager) {
            throw new InvalidConfigException('You should configure "authManager" component to use database before executing this migration.');
        }

        return $authManager;
    }

    /**
     * {@inheritdoc}
     */
    public function up()
    {
        $authManager = $this->getAuthManager();
        $this->db = $authManager->db;

        $this->createIndex($this->index, $authManager->assignmentTable, $this->column);
    }

    /**
     * {@inheritdoc}
     */
    public function down()
    {
        $authManager = $this->getAuthManager();
        $this->db = $authManager->db;

        $this->dropIndex($this->index, $authManager->assignmentTable);
    }
}
