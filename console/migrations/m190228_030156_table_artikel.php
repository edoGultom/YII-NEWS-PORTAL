<?php

use yii\db\Migration;

/**
 * Class m190228_030156_table_artikel
 */
class m190228_030156_table_artikel extends Migration
{
    public function up()
    {
        $this->createTable('artikel', [
            'id'            => $this->primaryKey(),
            'judul'         => $this->string(),
            'sub_judul'     => $this->string(),
            'kategori'      => $this->integer(),
            'baru'          => $this->tinyInteger(Null),
            'aktif'         => $this->tinyInteger(Null),
            'isi'           => $this->text(),
            'gambar'        => $this->integer(),
            'gambart_thumbnail'         => $this->integer(),
            'keterangan_gambar'         => $this->string(),
            'tag'           => $this->string(),
            'id_user'       => $this->integer()->notNull(),
            'created_at'    => $this->integer(),
            'updated_at'    => $this->integer()
        ]);
        $this->batchInsert(
            'artikel',
            [   
                'judul',
                'sub_judul',
                'kategori',
                'baru',
                'aktif',
                'isi',
                'gambar',
                'gambart_thumbnail',
                'keterangan_gambar',
                'tag',
                'id_user',
                'created_at',
                'updated_at'
            ], 
            [
                [
                    'Sumatera Utara Miliki 840 Tenaga Kerja Asing, Paling Banyak dari Tiongkok',
                    'Sumatera Utara Miliki 840 Tenaga Kerja Asing, Paling Banyak dari Tiongkok',
                    '1',
                    '1',
                    '1',
                    'Dinas Tenaga Kerja (Disnaker) Provinsi Sumatera Utara melalui Kepala Bidang (Kabid) Pengawasan Tenagakerjaan, Frans Bangun mengatakan, ada 10678 ribu perusahaan tersebut seluruh Sumut menurut data tahun 2018, Selasa (29/1/2019).

                    "10678 perusahaan yang berada di Sumut," katanya.

                    Untuk jumlah pekerja Tenaga Kerja Asing (TKA), Frans Bangun menyampaikan, jumlah berada pada angkat 840 lebih.

                    "Jumlah tenaga kerja asing 840 lebih lah," ucapnya.

                    Saat Disnaker sedang melakukan pendataan ulang atau pengawasan kepada seluruh perusahaan yang berada di Sumut.

                    Frans Bangun juga menagatakan, bahwa pendataan saat ini dilakukan dengan sistem digital atau online pada tiap-tiap perusahaan.

                    "Kita mengawasi perusahaan-perusahaan mendata seluruh tenaga kerja yang berada di Sumut. Baik itu tenaga kerja asing dan tenaga kerja lokal. Kita sedang data seluruh perusahaan dan juga pekerjanya. Nanti kita akan melakukan pendataan kepada perusahaan dengan menggunakan digital. Setiap perusahaan harus melampirkan sleuruh datanya melalui digital atau online," ucapnya.

                    Kemudian, dari jumlah perusahaan 10678 ribu tersebut, Frans Bangun menyampaikan, untuk TKA dan pekerja lokal mencapai sejuta lebih, meliputi seluruh kabupaten/kota seluruh Sumut.

                    Tetapi, Frans Bangun menyebutkan, pendataan akan dilakukan ulang melalui sistem online terbaru tersebut.

                    "Pada angkat 10678 ini jumlah perkerja yang terdata itu mencapai 1 juta lebih, itu gabungan dari TKA dan pekerja lokal tahun 2018. Saat ini kita tengah melakukan pendataan update. Sistem online juga sudah berjalan," katanya.',
                    '3',
                    '4',
                    'Kepala Bidang (Kabid) Pengawasan Tenagakerja Disnaker Sumut, Frans Bangun.',
                    '-',
                    '1', 
                    '1520144220', 
                    '1520144220'
                ],
                [
                    'Penyerapan Tenaga Kerja Di Sumut Didominasi Sektor Pertanian',
                    'Penyerapan Tenaga Kerja Di Sumut Didominasi Sektor Pertanian',
                    '1',
                    '1',
                    '1',
                    '<p>Penyerapan tenaga kerja di Sumatera Utara (Sumut) masih didominasi di sektor pertanian, dimana status pekerjaan utama yang terbanyak sebagai buruh atau karyawan atau pegawai.</p>',
                    '5',
                    '6',
                    '-',
                    '-',
                    '1', 
                    '1520144220', 
                    '1520144220'
                ]                
            ]
        );

        
    }

    public function down()
    {
        $this->dropTable('artikel');
    }
}
