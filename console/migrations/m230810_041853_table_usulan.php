<?php

use yii\db\Migration;

/**
 * Class m230810_041853_table_usulan
 */
class m230810_041853_table_usulan extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('ref_jenis_surat', [
            'id'            => $this->primaryKey(),
            'jenis'    => $this->text(),
        ]);
        $this->batchInsert(
            'ref_jenis_surat',
            [
                'jenis',
            ],
            [
                ['Surat Domisili'],
            ]
        );
        $this->createTable('ref_tahap_usulan', [
            'id'            => $this->primaryKey(),
            'tahap'    => $this->text(),
        ]);
        $this->batchInsert(
            'ref_tahap_usulan',
            [
                'tahap',
            ],
            [
                ['Mengusulkan'],
                ['Verifikasi'],
                ['Selesai'],
                ['Tolak'],
            ]
        );
        $this->createTable('ta_pengusulan_surat', [
            'id'            => $this->primaryKey(),
            'id_jenis_surat' => $this->integer(),
            'id_file'        => $this->tinyInteger(),
            'id_user'        => $this->integer(),
            'jenis_surat' => $this->string(255),
            'tanggal' => $this->date(),
            'keterangan'        => $this->text(),
            'status'        => $this->tinyInteger(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m230810_041853_table_usulan cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230810_041853_table_usulan cannot be reverted.\n";

        return false;
    }
    */
}
