<?php

use yii\db\Migration;

/**
 * Class m200807_100342_menu
 */
class m200807_100342_menu extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        Yii::$app->db->createCommand('DELETE FROM menu')->execute();
        $this->batchInsert(
            'menu',
            [   
                'id_menu',
                'id_kategori',
                'id_induk',
                'keterangan',
                'link',
                'id_user',
                'created_at',
                'updated_at',
            ], 
            [
                [68, 3,	NULL, "STRUKTUR ORGANISASI", "/",	1,	1592281688, 1592281688],
                [84, 4,	NULL, "Profil", "/",	1,	1592281688, 1592281688],
                [87, 4,	NULL, "PERUNDANGAN", "/",	1,	1592281688, 1592281688],
                [88, 4,	NULL, "INFORMASI PUBLIK", "/",	1,	1592281688, 1592281688],
                [91, 4,	NULL, "UNDUH", "/",	1,	1592281688, 1592281688],
                [92, 4,	NULL, "PETA SITUS", "/",	1,	1592281688, 1592281688],
                [93, 4,	NULL, "FAQ", "/",	1,	1592281688, 1592281688],
                [94, 4,	NULL, "HUBUNGI", "/",	1,	1592281688, 1592281688],
                [85, 4,	84, "STRUKTUR ORGANISASI", "/",	1, 1592281688, 1592281688],
                [89, 4,	95,	"PHOTO", "/photo", 1, 1592281688, 1592281688],
                [90, 4,	95,	"VIDEO", "/video", 1, 1592281688, 1592281688],
                [95, 4,	NULL, "GALERY", "/", 1, 1592281688, 1592281688],
                [86, 4,	84, "UNIT KERJA DAN PEJABAT", "/",	1,	1592281688, 1592281688],
                [67, 3,	NULL, "Profil", "/",	1,	1592281688, 1592281688],
                [69, 3,	NULL, "UNIT KERJA DAN PEJABAT", "/",	1,	1592281688, 1592281688],
                [70, 3,	NULL, "PERUNDANGAN", "/",	1,	1592281688, 1592281688],
                [71, 3,	NULL, "INFORMASI PUBLIK", "/",	1,	1592281688, 1592281688],
                [72, 3,	NULL, "PHOTO", "/photo", 1,	1592281688, 1592281688],
                [73, 3,	NULL, "VIDEO", "/video", 1,	1592281688, 1592281688],
                [74, 3,	NULL, "UNDUH", "/",	1,	1592281688, 1592281688],
                [75, 3,	NULL, "PETA SITUS", "/",	1,	1592281688, 1592281688],
                [76, 3,	NULL, "FAQ", "/",	1,	1592281688, 1592281688],
                [77, 3,	NULL, "HUBUNGI", "/",	1,	1592281688, 1592281688],
                [78, 1, NULL, "SEKRETARIAT", "/",	1,	1592281688,	1592281688],
                [79, 1, NULL, "BIDANG KESEHATAN MASYARAKAT", "/",	1,	1592281688, 1592281688],
                [80, 1, NULL, "BIDANG P2 PENYAKIT", "/",	1,	1592281688, 1592281688],
                [81, 1, NULL, "BIDANG YANKES", "/",	1,	1592281688, 1592281688],
                [82, 1, NULL, "BIDANG SUMBER DAYA KESEHATAN", "/",	1,	1592281688, 1592281688],
                [83, 1, NULL, "UPT", "/",	1,	1592281688, 1592281688],

            ]
        );

        $this->batchInsert(
            'menu_kategori',
            [   
                'id_menu_kategori',
                'keterangan',
                'id_user',
                'created_at',
                'updated_at',
            ], 
            [
                [4, 'Menu Scroll', '1', '1592281688', '1592281688'],
            ]
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200807_100342_menu cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200807_100342_menu cannot be reverted.\n";

        return false;
    }
    */
}
