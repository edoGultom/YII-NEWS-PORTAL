<?php

namespace common\models;

use yii\base\Model;
use yii\web\UploadedFile;

use common\models\UploadedFiledb;

class Uploadfile extends Model
{
    /**
     * @var UploadedFile
     */
    public $file;
    public $captions;
    public $id;

    public function rules()
    {
        return [
            [['file'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg, jpeg, jpeg, doc, pdf, docx', 'maxSize' => 1024*1024*25, 'tooBig' => 'Maksimal 20MB',],
            [['captions'], 'string'],
            [['id'],'integer'],
        ];
    }

    public function upload()
    {
        if ($this->validate()) {
            $dir = \Yii::getAlias('@common/upload/' . $this->file->baseName . date('Hi').'.' . $this->file->extension);

            if (isset($this->id)){
                $model = UploadedFiledb::findOne($this->id);
                if (isset($model->filename)){
                    unlink($model->filename);
                }

                $model->name = $this->file->name;
                $model->size = $this->file->size;
                $model->filename = $dir;
                $model->type = $this->file->type;
                $model->created_at=time();
                $model->updated_at=time();
                $model->captions = $this->captions;
                if ($model->save(false)){
                    $this->file->saveAs($dir);
                }
            }
            return true;
        } else {
            return false;
        }
    }
}