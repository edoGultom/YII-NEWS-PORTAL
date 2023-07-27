<?php
namespace common\models;

use yii\base\Model;
use common\models\UploadedFiledb;
use common\models\Banner;

class UploadThumbnailVideo extends Model
{
    /**
     * @var UploadThumbnailVideo
     */
    public $file;
    public $id_video;

    public function rules()
    {
        return [
            [['file'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg, pjpeg, jpeg', 'maxSize' => 1024*1024*25, 'tooBig' => 'Maksimal 20MB',],
        ];
    }

    public function upload()
    {

        if ($this->validate()) {

            $idUpload = 0;
            $jenisGambar = null;
            $path = null;
            $imageType = $this->file->type;
            $fupload_name = $this->file->baseName;

            $random_number = rand();
            $vdir_upload = \Yii::getAlias('@common/upload/'.$random_number.'.'.$this->file->extension);

            $this->file->saveAs($vdir_upload);

            switch($imageType) {
                case "image/gif":
                    $im_src=imagecreatefromgif($vdir_upload);
                break;
                case "image/pjpeg":
                case "image/jpeg":
                case "image/jpg":
                    $im_src=imagecreatefromjpeg($vdir_upload);
                break;

                case "image/png":
                case "image/x-png":
                    $im_src=imagecreatefrompng($vdir_upload);
                break;

            }
            $src_width = imageSX($im_src);
            $src_height = imageSY($im_src);

            if($src_width>=600){
                $dst_width =600;}
            else {
                $dst_width = $src_width;
            }

            $dst_height = ($dst_width/$src_width)*$src_height;
            $im = imagecreatetruecolor($dst_width,$dst_height);
            imagecopyresampled($im, $im_src, 0, 0, 0, 0, $dst_width, $dst_height, $src_width, $src_height);

            switch($imageType) {
                case "image/gif":
                    imagegif($im,$vdir_upload);
                    header("Content-Length: " . filesize($vdir_upload));
                break;
                case "image/pjpeg":
                case "image/jpeg":
                case "image/jpg":
                    imagejpeg($im,$vdir_upload);
                    header("Content-Length: " . filesize($vdir_upload));
                break;
                case "image/png":
                case "image/x-png":
                    imagepng($im,$vdir_upload);
                    header("Content-Length: " . filesize($vdir_upload));
                break;
            }

            $video = Video::find()->where(['id' => $this->id_video])->one();

            if ($video){
                $model = UploadedFiledb::find()->where(['id' => $video->thumbnail])->one();
                if ($model){
                    if(file_exists($model->filename)) {
                        unlink($model->filename);
                    }
                }else{
                    $model = new UploadedFiledb();
                }
            }else{
                $model = new UploadedFiledb();
            }

            $model->name = $random_number.'.'.$this->file->extension;
            $model->size = $this->file->size;
            $model->filename = $vdir_upload;
            $model->type = $this->file->type;
            $model->created_at=time();
            $model->updated_at=time();
            $model->save(false);


            $this->file->saveAs($vdir_upload);

            imagedestroy($im_src);
            $video->thumbnail = $model->id;
            $video->save();

            return true;
        } else {
            return false;
        }
    }
}
?>