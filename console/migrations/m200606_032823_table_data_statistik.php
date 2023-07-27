<?php

use yii\db\Migration;

/**
 * Class m200606_032823_table_data_statistik
 */
class m200606_032823_table_data_statistik extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('data_statistik', [
            'id'                => $this->primaryKey(),
            'id_induk'        => $this->integer(),
            'nama_variabel'          => $this->string(),
            'nilai'           => $this->bigInteger(),
            'satuan'        => $this->string(),
            'keterangan'        => $this->text(),
            'no_tingkat' => $this->integer()
        ]);

        $this->batchInsert(
            'data_statistik',
            [   
                'id_induk',
                'nama_variabel',
                'nilai',
                'satuan',
                'keterangan',
                'no_tingkat',
            ], 
            [
                [
                    0, 'Tahun', 2018, 'Tahun', 'Tahun dari data', 1
                ],
                [
                    1, 'Penduduk usia kerja', 9910, 'Ribu', '-', 2
                ],
                [
                    2, 'Pbukan angkatan kerja', 2795, 'Ribu', '-', 3
                ],
                [
                    2, 'Angkatan kerja', 7124, 'Ribu', '-', 3
                ],
            ]
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200606_032823_table_data_statistik cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200606_032823_table_data_statistik cannot be reverted.\n";

        return false;
    }
    */
}
