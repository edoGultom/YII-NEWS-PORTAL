<?php

use yii\db\Migration;

/**
 * Class m190227_053722_table_menu
 */
class m190227_053722_table_menu extends Migration
{
    public function up()
    {
        $this->createTable('menu', [
            'id_menu'           => $this->primaryKey(),
            'id_kategori'       => $this->integer(),
            'id_induk'          => $this->integer(),
            'keterangan'        => $this->string(),
            'link'              => $this->string(),
            'id_user'           => $this->integer(),
            'created_at'        => $this->integer(),
            'updated_at'        => $this->integer()
        ]);
        // $this->addPrimaryKey('id_menu', 'menu', ['id_menu', 'id_kategori']);
        // $this->alterColumn('{{%menu}}', 'id_menu','AUTO_INCREMENT');

        $this->batchInsert(
            'menu',
            [   
                'id_kategori',
                'id_induk',
                'keterangan',
                'link',
                'id_user',
                'created_at',
                'updated_at'
            ], 
            [
                ['1', '', 'Sekretariat', 'localhost.test','1','1551336718','1551411618'],
                ['1', '', 'Bidang PPP Tenaga Kerja', 'localhost.test','1','1551336718','1551411618'],
                ['1', '', 'Bidang Hubungan Industrial', 'localhost.test','1','1551336718','1551411618'],
                ['1', '', 'Bidang Perlindungan Ketnagakerjaan', 'localhost.test','1','1551336718','1551411618'],
                ['1', '', 'Bidang Ketranmigrasian', 'localhost.test','1','1551336718','1551411618'],
                ['1', '', 'UPT', 'localhost.test','1','1551336718','1551411618'],
                ['1', '1', 'Sub Bagian Umum Dan Kepegawain', 'localhost.test','1','1551336718','1551411618'],
                ['1', '1', 'Sub bagian keuangan', 'localhost.test','1','1551336718','1551411618'],
                ['1', '1', 'Sub Bagian Keuangan', 'localhost.test','1','1551336718','1551411618'],
                ['1', '2', 'Seksi Pengembangan Perluasan Kesempatan Kerja', 'localhost.test','1','1551336718','1551411618'],
                ['1', '2', 'Seksi Penempatan Tenaga Kerja', 'localhost.test','1','1551336718','1551411618'],
                ['1', '2', 'Seksi latihan, Standarisasi dan kompetensi Kerja', 'localhost.test','1','1551336718','1551411618'],
                ['1', '3', 'Seksi pengupahan dan Jaminan Sosial Tenaga Kerja', 'localhost.test','1','1551336718','1551411618'],
                ['1', '3', 'Seksi Persyaratan Kerja', 'localhost.test','1','1551336718','1551411618'],
                ['1', '3', 'Seksi Penyelesaian Persilisihan Hubungan Industrial', 'localhost.test','1','1551336718','1551411618'],

                ['1', '4', 'Seksi Penegakan Hukum Ketenagakerjaan', 'localhost.test','1','1551336718','1551411618'],
                ['1', '4', 'Seksi Norma keselamatan, kesehatan kerja', 'localhost.test','1','1551336718','1551411618'],
                ['1', '4', 'Seksi ketenagakerjaan', 'localhost.test','1','1551336718','1551411618'],

                ['1', '5', 'Seksi Fasilitasi penyiapan lahan dan Penyelesaian Permasalahan', 'localhost.test','1','1551336718','1551411618'],
                ['1', '5', 'Seksi Pembangunan Pemukiman', 'localhost.test','1','1551336718','1551411618'],
                ['1', '5', 'Level 2, Has Dropdown', 'localhost.test','1','1551336718','1551411618'],
                ['1', '5', 'Seksi Pembangunan Ekonomi Transmigrasi', 'localhost.test','1','1551336718','1551411618'],

                ['1', '6', 'UPT WILAYAH I', 'localhost.test','1','1551336718','1551411618'],
                ['1', '6', 'UPT WILAYAH II', 'localhost.test','1','1551336718','1551411618'],
                ['1', '6', 'UPT WILAYAH III', 'localhost.test','1','1551336718','1551411618'],
                ['1', '6', 'UPT WILAYAH IV', 'localhost.test','1','1551336718','1551411618'],

                ['4', '', 'Beranda', 'localhost.test','1','1551336718','1551411618'],
                ['4', '', 'Profil', 'localhost.test','1','1551336718','1551411618'],
                ['4', '', 'SARANA DAN SUMBER DAYA MANUSIA', 'localhost.test','1','1551336718','1551411618'],
                ['4', '', 'Rencana Kerja', 'localhost.test','1','1551336718','1551411618'],
                ['4', '', 'Galery Foto', 'localhost.testsite/galeryfoto','1','1551336718','1551411618'],
                ['4', '', 'Galery Video', 'localhost.test','1','1551336718','1551411618'],
                ['4', '', 'Data', 'localhost.test','1','1551336718','1551411618'],
                ['4', '', 'Berita', 'localhost.test','1','1551336718','1551411618'],
                ['4', '', 'Kategori Unduhan', 'localhost.testsite/kategoriunduhan','1','1551336718','1551411618'],
                ['3', '', 'Beranda', 'localhost.test','1','1551336718','1551411618'],
                ['3', '', 'Hubungi', 'localhost.test','1','1551336718','1551411618'],
                ['3', '', 'Peta Situs', 'localhost.test','1','1551336718','1551411618']
            ]
        );
    }

    public function down()
    {
        $this->dropTable('menu');
    }
}