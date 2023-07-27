<?php

use yii\db\Migration;

/**
 * Class m201210_124157_tambah_kolom_status
 */
class m201210_124157_tambah_kolom_status extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{halaman}}', 'status', $this->tinyInteger());
        $this->addColumn('{{album}}', 'status', $this->tinyInteger());
        $this->addColumn('{{album_gambar}}', 'status', $this->tinyInteger());
        $this->addColumn('{{slider}}', 'status', $this->tinyInteger());
        $this->addColumn('{{video}}', 'status', $this->tinyInteger());
        $this->addColumn('{{unduhan}}', 'status', $this->tinyInteger());
        $this->addColumn('{{uploaded_file}}', 'status', $this->tinyInteger());
        $this->addColumn('{{polling}}', 'status', $this->tinyInteger());
    }
}
