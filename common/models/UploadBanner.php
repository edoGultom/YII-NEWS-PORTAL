<?php

namespace common\models;

use yii\base\Model;
use common\models\UploadedFiledb;
use common\models\Banner;
use yii\helpers\FileHelper;

class UploadBanner extends Model
{
    /**
     * @var UploadedFiledb
     */
    public $file;
    public $id_banner;
    public $id_gambar;

    public function rules()
    {
        return [
            // [['file'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg, pjpeg, jpeg', 'maxSize' => 20000, 'tooBig' => 'Maksimal 20MB',],
            [['file'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg, pjpeg, jpeg'],
        ];
    }

    public function upload()
    {
        if ($this->validate()) {
            $random_number = rand();

            $new_folder = \Yii::getAlias('@common/upload/banner/');
            FileHelper::createDirectory($new_folder, $mode = 0775, $recursive = true);

            $vdir_upload = \Yii::getAlias('@common/upload/banner/' . $random_number . '.' . $this->file->extension);
            $this->file->saveAs($vdir_upload);
            $imageType = $this->file->type;

            switch ($imageType) {
                case "image/gif":
                    $im_src = imagecreatefromgif($vdir_upload);
                    break;
                case "image/pjpeg":
                case "image/jpeg":
                case "image/jpg":
                    $im_src = imagecreatefromjpeg($vdir_upload);
                    break;

                case "image/png":
                case "image/x-png":
                    $im_src = imagecreatefrompng($vdir_upload);
                    break;
            }

            $get_banner = Banner::findOne(['id' => $this->id_banner]);
            // if ($get_banner->kategoribanner->captions === "720x110") {
            //     $src_width = imageSX($im_src);
            //     $src_height = imageSY($im_src);
            //     $y = $src_height / 2;
            //     $x = $src_width / 2;
            //     $im = imagecreatetruecolor(720, 110);
            //     imagecopy($im, $im_src, 0, 0, 0, 0, $src_width, $src_height);
            // } else {
            //     $src_width = imageSX($im_src);
            //     $src_height = imageSY($im_src);

            //     if ($src_width >= 600) {
            //         $dst_width = 600;
            //     } else {
            //         $dst_width = $src_width;
            //     }

            //     $dst_height = ($dst_width / $src_width) * $src_height;
            //     $im = imagecreatetruecolor($dst_width, $dst_height);
            //     imagecopyresampled($im, $im_src, 0, 0, 0, 0, $dst_width, $dst_height, $src_width, $src_height);
            // }

            // switch ($imageType) {
            //     case "image/gif":
            //         imagegif($im, $vdir_upload);
            //         header("Content-Length: " . filesize($vdir_upload));
            //         break;
            //     case "image/pjpeg":
            //     case "image/jpeg":
            //     case "image/jpg":
            //         imagejpeg($im, $vdir_upload);
            //         header("Content-Length: " . filesize($vdir_upload));
            //         break;
            //     case "image/png":
            //     case "image/x-png":
            //         imagepng($im, $vdir_upload);
            //         header("Content-Length: " . filesize($vdir_upload));
            //         break;
            // }

            $model = new UploadedFiledb();
            $model->name = $random_number . '.' . $this->file->extension;
            $model->size = $this->file->size;
            $model->filename = $vdir_upload;
            $model->type = $this->file->type;
            $model->created_at = time();
            $model->updated_at = time();

            if ($get_banner->id_file) {
                $cek = UploadedFiledb::find()->where(['id' => $get_banner->id_file])->one();
                if (file_exists($cek->filename)) {
                    unlink($cek->filename);
                }

                $cek->name = $this->file->name;
                $cek->size = $this->file->size;
                $cek->filename = $vdir_upload;
                $cek->type = $this->file->type;
                $cek->created_at = time();
                $cek->updated_at = time();

                $cek->save(false);
                $idUpload[0] = $cek->id;

                $this->file->saveAs($vdir_upload);
            } else {

                if ($model->save(false)) {
                    $idUpload[0] = $model->id;
                    $this->file->saveAs($vdir_upload);
                }
            }

            // imagedestroy($im);
            imagedestroy($im_src);

            $banner = Banner::findOne(['id' => $this->id_banner]);

            if ($banner && !empty($idUpload)) {
                $banner->id_file = $idUpload[0];
                $banner->save(false);
            }
            return true;
        } else {
            return false;
        }
    }
}
