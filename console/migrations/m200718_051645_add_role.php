<?php

use yii\db\Migration;

/**
 * Class m200718_051645_add_role
 */
class m200718_051645_add_role extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function up()
    {
        $this->batchInsert(
            'auth_item',
            [
                'name',
                'type',
                'description',
                'rule_name',
                'data',
                'created_at',
                'updated_at'
            ],
            [
                [
                    'Site', 1, NULL, NULL, NULL, time(), time()
                ],
                [
                    'Artikel', 1, NULL, NULL, NULL, time(), time()
                ],
                [
                    'Kategori Artikel', 1, NULL, NULL, NULL, time(), time()
                ],
                [
                    'Perundangan', 1, NULL, NULL, NULL, time(), time()
                ],
                [
                    'Kategori Perundangan', 1, NULL, NULL, NULL, time(), time()
                ],
                [
                    'Halaman', 1, NULL, NULL, NULL, time(), time()
                ],
                [
                    'Stiker', 1, NULL, NULL, NULL, time(), time()
                ],
                [
                    'Arsip Link', 1, NULL, NULL, NULL, time(), time()
                ],
                [
                    'Album', 1, NULL, NULL, NULL, time(), time()
                ],
                [
                    'Album Gambar', 1, NULL, NULL, NULL, time(), time()
                ],
                [
                    'Banner', 1, NULL, NULL, NULL, time(), time()
                ],
                [
                    'Kategori Banner', 1, NULL, NULL, NULL, time(), time()
                ],
                [
                    'Slider', 1, NULL, NULL, NULL, time(), time()
                ],
                [
                    'Slider Item', 1, NULL, NULL, NULL, time(), time()
                ],
                [
                    'Video', 1, NULL, NULL, NULL, time(), time()
                ],
                [
                    'Kategori Video', 1, NULL, NULL, NULL, time(), time()
                ],
                [
                    'Iklan', 1, NULL, NULL, NULL, time(), time()
                ],
                [
                    'Unduhan', 1, NULL, NULL, NULL, time(), time()
                ],
                [
                    'Kategori Unduhan', 1, NULL, NULL, NULL, time(), time()
                ],
                [
                    'Upload', 1, NULL, NULL, NULL, time(), time()
                ],
                [
                    'Polling', 1, NULL, NULL, NULL, time(), time()
                ],
                [
                    'Kategori Polling', 1, NULL, NULL, NULL, time(), time()
                ],
                [
                    'Role', 1, NULL, NULL, NULL, time(), time()
                ],
                [
                    'Route', 1, NULL, NULL, NULL, time(), time()
                ],
                [
                    'Pengguna', 1, NULL, NULL, NULL, time(), time()
                ],
                [
                    'Profil', 1, NULL, NULL, NULL, time(), time()
                ],
                [
                    'Identitas', 1, NULL, NULL, NULL, time(), time()
                ],
                [
                    'Menu', 1, NULL, NULL, NULL, time(), time()
                ],
                [
                    'Menu Kategori', 1, NULL, NULL, NULL, time(), time()
                ],

                [
                    '/site/*', 2, NULL, NULL, NULL, time(), time()
                ],
                [
                    '/artikel/*', 2, NULL, NULL, NULL, time(), time()
                ],
                [
                    '/kategori-artikel/*', 2, NULL, NULL, NULL, time(), time()
                ],
                [
                    '/perundangan/*', 2, NULL, NULL, NULL, time(), time()
                ],
                [
                    '/kategori-perundangan/*', 2, NULL, NULL, NULL, time(), time()
                ],
                [
                    '/halaman/*', 2, NULL, NULL, NULL, time(), time()
                ],
                [
                    '/stiker/*', 2, NULL, NULL, NULL, time(), time()
                ],
                [
                    '/arsip-link/*', 2, NULL, NULL, NULL, time(), time()
                ],
                [
                    '/album/*', 2, NULL, NULL, NULL, time(), time()
                ],
                [
                    '/album-gambar/*', 2, NULL, NULL, NULL, time(), time()
                ],
                [
                    '/banner/*', 2, NULL, NULL, NULL, time(), time()
                ],
                [
                    '/kategori-banner/*', 2, NULL, NULL, NULL, time(), time()
                ],
                [
                    '/slider/*', 2, NULL, NULL, NULL, time(), time()
                ],
                [
                    '/slider-item/*', 2, NULL, NULL, NULL, time(), time()
                ],
                [
                    '/video/*', 2, NULL, NULL, NULL, time(), time()
                ],
                [
                    '/kategori-video/*', 2, NULL, NULL, NULL, time(), time()
                ],
                [
                    '/iklan/*', 2, NULL, NULL, NULL, time(), time()
                ],
                [
                    '/unduhan/*', 2, NULL, NULL, NULL, time(), time()
                ],
                [
                    '/kategori-unduhan/*', 2, NULL, NULL, NULL, time(), time()
                ],
                [
                    '/uploaded-file/*', 2, NULL, NULL, NULL, time(), time()
                ],
                [
                    '/polling/*', 2, NULL, NULL, NULL, time(), time()
                ],
                [
                    '/jenis-polling/*', 2, NULL, NULL, NULL, time(), time()
                ],
                [
                    '/role/*', 2, NULL, NULL, NULL, time(), time()
                ],
                [
                    '/route/*', 2, NULL, NULL, NULL, time(), time()
                ],
                [
                    '/pengguna/*', 2, NULL, NULL, NULL, time(), time()
                ],
                [
                    '/profil/*', 2, NULL, NULL, NULL, time(), time()
                ],
                [
                    '/identitas/*', 2, NULL, NULL, NULL, time(), time()
                ],
                [
                    '/menu/*', 2, NULL, NULL, NULL, time(), time()
                ],
                [
                    '/menu-kategori/*', 2, NULL, NULL, NULL, time(), time()
                ],
            ]
        );

        $this->batchInsert(
            'auth_item_child',
            [
                'parent',
                'child',
            ],
            [
                [
                    'Site', '/site/*'
                ],
                [
                    'Artikel', '/artikel/*'
                ],
                [
                    'Kategori Artikel', '/kategori-artikel/*'
                ],
                [
                    'Perundangan', '/perundangan/*'
                ],
                [
                    'Kategori Perundangan', '/kategori-perundangan/*'
                ],
                [
                    'Halaman', '/halaman/*'
                ],
                [
                    'Stiker', '/stiker/*'
                ],
                [
                    'Arsip Link', '/arsip-link/*'
                ],
                [
                    'Album', '/album/*'
                ],
                [
                    'Album Gambar', '/album-gambar/*'
                ],
                [
                    'Banner', '/banner/*'
                ],
                [
                    'Kategori Banner', '/kategori-banner/*'
                ],
                [
                    'Slider', '/slider/*'
                ],
                [
                    'Slider Item', '/slider-item/*'
                ],
                [
                    'Video', '/video/*'
                ],
                [
                    'Kategori Video', '/kategori-video/*'
                ],
                [
                    'Iklan', '/iklan/*'
                ],
                [
                    'Unduhan', '/unduhan/*'
                ],
                [
                    'Kategori Unduhan', '/kategori-unduhan/*'
                ],
                [
                    'Upload', '/uploaded-file/*'
                ],
                [
                    'Polling', '/polling/*'
                ],
                [
                    'Kategori Polling', '/jenis-polling/*'
                ],
                [
                    'Role', '/role/*'
                ],
                [
                    'Route', '/route/*'
                ],
                [
                    'Pengguna', '/pengguna/*'
                ],
                [
                    'Profil', '/profil/*'
                ],
                [
                    'Identitas', '/identitas/*'
                ],
                [
                    'Menu', '/menu/*'
                ],
                [
                    'Menu Kategori', '/menu-kategori/*'
                ],
            ]
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200718_051645_add_role cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200718_051645_add_role cannot be reverted.\n";

        return false;
    }
    */
}
