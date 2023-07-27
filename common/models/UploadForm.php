<?php

namespace common\models;

use yii\base\Model;
use common\models\UploadedFiledb;

class UploadForm extends Model
{
    /**
     * @var UploadedFiledb
     */
    public $file;
    public $id_artikel;
    public $id_iklan;
    public $id_gambar;
    public $id_thumbnail;

    public function rules()
    {
        return [
            // [['file'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg,  jpeg', 'maxSize' => 160000, 'tooBig' => 'Maksimal 20MB',],
            [['file'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg,  jpeg',],
        ];
    }

    public function upload()
    {

        if (!empty($this->file) && $this->validate()) {
            $idUpload = [];
            $jenisGambar = null;
            $path = null;
            $imageType = $this->file->type;
            $fupload_name = $this->file->baseName;


            $random_number = rand();
            $vdir_upload = \Yii::getAlias('@common/upload/' . $random_number . '.' . $this->file->extension);
            $vdir_upload2 = \Yii::getAlias('@common/upload/thumbnail_' . $random_number . '.' . $this->file->extension);
            // upload file asli =========================================================

            $this->file->saveAs($vdir_upload);
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

            $src_width = imageSX($im_src);
            $src_height = imageSY($im_src);

            if ($src_width >= 600) {
                $dst_width = 600;
            } else {
                $dst_width = $src_width;
            }
            $dst_height = ($dst_width / $src_width) * $src_height;
            $im = imagecreatetruecolor($dst_width, $dst_height);
            imagecopyresampled($im, $im_src, 0, 0, 0, 0, $dst_width, $dst_height, $src_width, $src_height);

            switch ($imageType) {
                case "image/gif":
                    imagegif($im, $vdir_upload);
                    header("Content-Length: " . filesize($vdir_upload));
                    break;
                case "image/pjpeg":
                case "image/jpeg":
                case "image/jpg":
                    imagejpeg($im, $vdir_upload);
                    header("Content-Length: " . filesize($vdir_upload));
                    break;
                case "image/png":
                case "image/x-png":
                    imagepng($im, $vdir_upload);
                    header("Content-Length: " . filesize($vdir_upload));
                    break;
            }
            $model = new UploadedFiledb();
            $model->name = $random_number . '.' . $this->file->extension;
            $model->size = $this->file->size;
            $model->filename = $vdir_upload;
            $model->type = $this->file->type;

            $get_artikel = Artikel::find()->where(['id' => $this->id_artikel])->one();
            if ($get_artikel) {

                $cek = UploadedFiledb::find()->where(['id' => $get_artikel->gambar])->one();
                if ($cek) {

                    if (file_exists($cek->filename)) {
                        unlink($cek->filename);
                    }
                } else {
                    $cek = new UploadedFiledb();
                }

                $cek->name = $random_number . '.' . $this->file->extension;
                $cek->size = $this->file->size;
                $cek->filename = $vdir_upload;
                $cek->type = $this->file->type;
                if (!$cek->validate()) {
                    return $cek->getErrors();
                }
                $cek->save(false);
                $idUpload[0] = $cek->id;
                $this->file->saveAs($vdir_upload);
            } else {
                if (!$model->validate()) {
                    return $model->getErrors();
                }
                if ($model->save(false)) {
                    $idUpload[0] = $model->id;
                    $this->file->saveAs($vdir_upload);
                }
            }

            $dst_width2 = 416;
            $dst_height2 = ($dst_width2 / $src_width) * $src_height;

            $im2 = imagecreatetruecolor($dst_width2, $dst_height2);
            imagecopyresampled($im2, $im_src, 0, 0, 0, 0, $dst_width2, $dst_height2, $src_width, $src_height);

            switch ($imageType) {
                case "image/gif":
                    imagegif($im2, $vdir_upload2);
                    header("Content-Length: " . filesize($vdir_upload2));

                    break;

                case "image/pjpeg":
                case "image/jpeg":
                case "image/jpg":

                    imagejpeg($im2, $vdir_upload2);
                    header("Content-Length: " . filesize($vdir_upload2));

                    break;

                case "image/png":
                case "image/x-png":
                    imagepng($im2, $vdir_upload2);
                    header("Content-Length: " . filesize($vdir_upload2));
                    break;
            }

            $model = new UploadedFiledb();
            $model->name = 'thumbnail_' . $random_number . '.' . $this->file->extension;
            $model->size = $this->file->size;
            $model->filename = $vdir_upload2;
            $model->type = $this->file->type;

            $get_thumbnail = Artikel::find()->where(['id' => $this->id_artikel])->one();
            if ($get_thumbnail->gambart_thumbnail) {
                $cek = UploadedFiledb::find()->where(['id' => $get_thumbnail->gambart_thumbnail])->one();
                if (file_exists($cek->filename)) {
                    unlink($cek->filename);
                }

                $cek->name = 'thumbnail_' . $random_number . '.' . $this->file->extension;
                $cek->size = $this->file->size;
                $cek->filename = $vdir_upload2;
                $cek->type = $this->file->type;

                $cek->save(false);
                $idUpload[1] = $cek->id;
            } else {
                if ($model->save(false)) {
                    $idUpload[1] = $model->id;
                }
            }


            imagedestroy($im_src);
            imagedestroy($im2);

            $artikel = Artikel::findOne(['id' => $this->id_artikel]);
            if ($artikel && !empty($idUpload)) {

                $artikel->gambar = $idUpload[0];
                $artikel->gambart_thumbnail = $idUpload[1];
                $artikel->save(false);
            }

            return true;
        } else {
            return $this->getErrors();
            return false;
        }
    }
}
