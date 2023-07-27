<?php

use yii\db\Migration;

/**
 * Class m201211_031851_update_data_status
 */
class m201211_031851_update_data_status extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->execute("UPDATE halaman SET status = 1");
        $this->execute("UPDATE album SET status = 1");
        $this->execute("UPDATE album_gambar SET status = 1");
        $this->execute("UPDATE slider SET status = 1");
        $this->execute("UPDATE video SET status = 1");
        $this->execute("UPDATE unduhan SET status = 1");
        $this->execute("UPDATE uploaded_file SET status = 1");
        $this->execute("UPDATE polling SET status = 1");
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m201211_031851_update_data_status cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m201211_031851_update_data_status cannot be reverted.\n";

        return false;
    }
    */
}
