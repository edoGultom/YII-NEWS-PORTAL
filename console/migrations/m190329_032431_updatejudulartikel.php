<?php

use yii\db\Migration;

/**
 * Class m190329_032431_updatejudulartikel
 */
class m190329_032431_updatejudulartikel extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        
        // $this->execute("
            // update artikel set sub_judul = REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(
            // REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(
            // REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(
            // REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(
            // REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(
            // REPLACE(REPLACE(LOWER(TRIM(judul)),':', ''), ')', ''), '(', ''), ',', ''), '\\', ''), '/', ''), '"', ''), '?', ''), "'", ''), '&', ''), '!', ''), '.', ''), ' ', '-'), '--', '-'), '--', '-'),'ù','u'),
            // 'ú','u'),'û','u'),'ü','u'),'ý','y'),'ë','e'),'à','a'),'á','a'),'â','a'),'ã','a'), 
            // 'ä','a'),'å','a'),'æ','a'),'ç','c'),'è','e'),'é','e'),'ê','e'),'ë','e'),'ì','i'),
            // 'í','i'),'ě','e'), 'š','s'), 'č','c'),'ř','r'), 'ž','z'), 'î','i'),'ï','i'),'ð','o'),
            // 'ñ','n'),'ò','o'),'ó','o'),'ô','o'),'õ','o'),'ö','o'),'ø','o'),'%', '');
        // ");

        $this->addColumn('halaman', 'sub_judul', $this->string());

        // $this->execute("
            // update halaman set sub_judul = REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(
            // REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(
            // REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(
            // REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(
            // REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(
            // REPLACE(REPLACE(LOWER(TRIM(judul)),
            // ':', ''), ')', ''), '(', ''), ',', ''), '\\', ''), '/', ''), '"', ''), '?', ''),
            // "'", ''), '&', ''), '!', ''), '.', ''), ' ', '-'), '--', '-'), '--', '-'),'ù','u'),
            // 'ú','u'),'û','u'),'ü','u'),'ý','y'),'ë','e'),'à','a'),'á','a'),'â','a'),'ã','a'), 
            // 'ä','a'),'å','a'),'æ','a'),'ç','c'),'è','e'),'é','e'),'ê','e'),'ë','e'),'ì','i'),
            // 'í','i'),'ě','e'), 'š','s'), 'č','c'),'ř','r'), 'ž','z'), 'î','i'),'ï','i'),'ð','o'),
            // 'ñ','n'),'ò','o'),'ó','o'),'ô','o'),'õ','o'),'ö','o'),'ø','o'),'%', '');
        // ");
        
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190329_032431_updatejudulartikel cannot be reverted.\n";

        return false;
    }

}
