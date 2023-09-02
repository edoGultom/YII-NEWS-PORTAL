<?php

use yii\db\Migration;

/**
 * Class m230902_140455_add_column
 */
class m230902_140455_add_column extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('ta_pengusulan_surat', 'nama_lengkap', $this->text());
        $this->addColumn('ta_pengusulan_surat', 'tempat_lahir', $this->text());
        $this->addColumn('ta_pengusulan_surat', 'tgl_lahir', $this->date());
        $this->addColumn('ta_pengusulan_surat', 'jenis_kelamin', $this->string(20));
        $this->addColumn('ta_pengusulan_surat', 'alamat', $this->text());
        $this->addColumn('ta_pengusulan_surat', 'alamat_domisili', $this->text());
        $this->addColumn('ta_pengusulan_surat', 'keterangan_tempat_tinggal', $this->text());
        $this->addColumn('ta_pengusulan_surat', 'keterangan_keperluan_surat', $this->text());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m230902_140455_add_column cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230902_140455_add_column cannot be reverted.\n";

        return false;
    }
    */
}
