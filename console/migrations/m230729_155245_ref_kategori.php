<?php

use yii\db\Migration;

/**
 * Class m230729_155245_ref_kategori
 */
class m230729_155245_ref_kategori extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('ref_kategori', [
            'id'            => $this->primaryKey(),
            'keterangan'   => $this->text(),
        ]);
        $this->batchInsert(
            'ref_kategori',
            [
                'keterangan',
            ],
            [
                ['Berita'],
                ['Info'],
                ['Kegiatan'],
                // ['Popular'],
            ]
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m230729_155245_ref_kategori cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230729_155245_ref_kategori cannot be reverted.\n";

        return false;
    }
    */
}
