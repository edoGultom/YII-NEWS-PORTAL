<?php

use yii\db\Migration;
use common\models\UploadedFiledb;

/**
 * Class m190401_102756_add_creat_update_upload
 */
class m190401_102756_add_creat_update_upload extends Migration
{
    public function up()
    {
        $models = UploadedFiledb::find()->all();
        foreach ($models as $model) {
            $model->created_at = time();
            $model->updated_at = time();
            $model->update(false); // skipping validation as no user input is involved
        }
    }

    public function down()
    {
        $this->dropColumn('uploaded_file', 'created_at');
        $this->dropColumn('uploaded_file', 'updated_at');
    }
}
