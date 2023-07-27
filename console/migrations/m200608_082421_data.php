<?php

use yii\db\Migration;

/**
 * Class m200608_082421_data
 */
class m200608_082421_data extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->execute('drop table data_statistik');
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
                    0, 'Profil Ketenagakerjaan', 0, '', '', 1
                ],

                [
                    1, 'Tahun', 2018, 'Tahun', 'Tahun dari data', 2
                ],
                [
                    2, 'Penduduk Usia Kerja', 9910, 'Ribu', '-', 3
                ],
                [
                    3, 'Bukan Angkatan Kerja', 2795, 'Ribu', '-', 4
                ],
                [
                    3, 'Angkatan kerja', 7124, 'Ribu', '-', 4
                ],
                [
                    4, 'Sekolah', 865, 'Ribu', '-', 5
                ],
                [
                    4, 'Mengurus Rumah Tangga', 1588, 'Ribu', '-', 5
                ],
                [
                    4, 'Lainnya', 341, 'Ribu', '-', 5
                ],

                [
                    5, 'Penganggur Terbuka', 396, 'Ribu', 'TPT(5, 56%)', 5
                ],
                [
                    5, 'Bekerja', 6728, 'Ribu', 'TPAK(71,82%)', 5
                ],

                [
                    10, 'Pekerja Tidak Penuh', 396, 'Ribu (31,93%)', '(<35 jam/ minggu)', 6
                ],
                [
                    10, 'Pekerjaan Penuh', 6728, 'Ribu (68, 07%)', '(>34 jam/ minggu)', 6
                ],
                
            ]
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200608_082421_data cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200608_082421_data cannot be reverted.\n";

        return false;
    }
    */
}
