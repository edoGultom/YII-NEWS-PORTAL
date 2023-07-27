<?php

namespace common\models;

use yii\base\Model;
use common\models\UploadedFiledb;
use common\models\AlbumGambar;
use common\models\Album;

class UploadImage extends Model
{
    /**
     * @var UploadedFiledb
     */
    public $file;
    public $id_album_gambar;
    public $id_gambar;

    public function rules()
    {
        return [
            // [['file'], 'file', 'skipOnEmpty' => false, 'maxSize' => 1024*1024*25, 'tooBig' => 'Maksimal 20MB',],
            [['file'], 'file', 'skipOnEmpty' => false,],
        ];
    }

    public function upload()
    {
        // var_dump($this->file);exit;
        if ($this->validate()) {
            //0 gambar , 1 tumbnail
            $idUpload = [];
            $jenisGambar = null;
            $path = null;
            $imageType = $this->file->type;
            $fupload_name = $this->file->baseName;
            $albumgambar = AlbumGambar::findOne(['id' => $this->id_album_gambar]);
            $album = Album::find()->where(['id' => $albumgambar->id_album])->one();

            $random_number = rand();
            $new_folder = \Yii::getAlias('@common/upload/' . $album->nama_album . '/');
            if (!file_exists($new_folder)) {
                mkdir($new_folder, 0777, true);
            }
            $vdir_upload = \Yii::getAlias('@common/upload/' . $album->nama_album . '/' . $random_number . '.' . $this->file->extension);
            // upload file asli =========================================================
            $this->file->saveAs($vdir_upload);
            // var_dump($imageType);exit;
            if ($imageType !== "video/mp4") {
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

                if ($src_width >= 1000) {
                    $dst_width = 1000;
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
            }
            $model = new UploadedFiledb();
            $model->name = $this->file->name;
            $model->size = $this->file->size;
            $model->filename = $vdir_upload;
            $model->type = $this->file->type;
            $model->created_at = time();
            $model->updated_at = time();

            if ($albumgambar->id_file) {
                $cek = UploadedFiledb::find()->where(['id' => $albumgambar->id_file])->one();
                if (file_exists($cek->filename)) {
                    unlink($cek->filename);
                }

                $cek->name = $this->file->name;
                $cek->size = $this->file->size;
                $cek->filename = $vdir_upload;
                $cek->type = $this->file->type;
                $cek->created_at = time();
                $cek->updated_at = time();

                $cek->update();
                $idUpload[0] = $cek->id;
                $this->file->saveAs($vdir_upload);
            } else {
                if ($model->save(false)) {
                    $idUpload[0] = $model->id;
                    $this->file->saveAs($vdir_upload);
                }
            }

            if ($imageType !== "video/mp4") {
                imagedestroy($im_src);
            };
            // imagedestroy($im);


            if ($albumgambar && !empty($idUpload)) {
                $albumgambar->id_file = $idUpload[0];
                $albumgambar->save(false);
            }
            return true;
        } else {
            $errors = $this->getErrors();
            // var_dump($errors); //or print_r($errors)
            // exit;
            return $errors;
        }
    }
}
