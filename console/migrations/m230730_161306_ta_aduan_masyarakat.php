<?php

use yii\db\Migration;

/**
 * Class m230730_161306_ta_aduan_masyarakat
 */
class m230730_161306_ta_aduan_masyarakat extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('ta_pengaduan', [
            'id'            => $this->primaryKey(),
            'id_user'           => $this->integer(),
            'tgl_pengaduan'        => $this->datetime(),
            'subjek'        => $this->text(),
            'isi'        => $this->text(),
            'id_file'        => $this->integer(),
            'status'        => $this->tinyInteger(),
        ]);
        $this->createTable('ta_tanggapan', [
            'id'            => $this->primaryKey(),
            'id_pengaduan'           => $this->integer(),
            'tgl_tanggapan'        => $this->datetime(),
            'tanggapan'        => $this->text(),
            'id_admin'        => $this->tinyInteger(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m230730_161306_ta_aduan_masyarakat cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230730_161306_ta_aduan_masyarakat cannot be reverted.\n";

        return false;
    }
    */
}
