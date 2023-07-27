<?php

use yii\db\Migration;

/**
 * Class m190330_034400_table_video
 */
class m190330_034400_table_video extends Migration{
        public function up()
        {
            $this->createTable('video', [
                'id'                => $this->primaryKey(),
                'nama'              => $this->string(),
                'captions'          => $this->text(),
                'link'              => $this->string(),
                'id_user'           => $this->integer(),
                'created_at'        => $this->integer(),
                'updated_at'        => $this->integer()
            ]);
        }

        public function down()
        {
            $this->dropTable('video');
        }
}
