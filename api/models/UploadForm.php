<?php

namespace api\models;

use common\models\RefJenisSurat;
use common\models\TaPengaduan;
use common\models\TaPengusulanSurat;
use common\models\UploadedFiledb;
use Yii;

use yii\base\Model;
use yii\web\UploadedFile;

use yii\imagine\Image;
use Imagine\Gd;
use Imagine\Image\Box;
use Imagine\Image\BoxInterface;

class UploadForm extends Model
{
    /**
     * @var UploadedFile
     */
    public $imageFile;

    public function rules()
    {
        return [
            [['imageFile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg'],
        ];
    }

    public function uploadProfile()
    {
        if ($this->validate()) {
            $connection = Yii::$app->db;
            $transaction = $connection->beginTransaction();
            try {
                $ext = $this->imageFile->extension;
                $nameFile =  'profil_' . Yii::$app->user->identity->id . '.' . $ext;
                $this->imageFile->saveAs('@temp/' . $nameFile);

                $newNameFile =   'profil_' . Yii::$app->user->identity->id . '_compressed.' . $ext;
                Image::getImagine()->open(Yii::getAlias('@temp/') . $nameFile)
                    ->thumbnail(new Box(200, 200))
                    ->save(Yii::getAlias('@upload/' . $newNameFile), ['quality' => 100]);
                unlink(Yii::getAlias('@temp/') . $nameFile);
                $path = 'upload/' . $newNameFile;
                $user = User::find()->where(['id' => Yii::$app->user->identity->id])->one();

                if ($user) {
                    $user->profile_photo_path = $path;
                    $user->save(false);
                    $transaction->commit();
                    return $path;
                }
                return  false;
            } catch (\Exception $e) {
                $transaction->rollBack();
                return $e->getMessage();
            } catch (\Throwable $e) {
                $transaction->rollBack();
                return $e->getMessage();
            }
        } else {
            return false;
        }
    }
    public function uploadFileKtp()
    {
        if (!empty($this->imageFile) && $this->validate()) {
            $connection = Yii::$app->db;
            $transaction = $connection->beginTransaction();
            try {

                $ext = $this->imageFile->extension;
                $nameFile =  'Ktp_' . Yii::$app->user->identity->id . '.' . $ext;
                $this->imageFile->saveAs('@temp/' . $nameFile);

                $newNameFile =   'Ktp_' . Yii::$app->user->identity->id . '_compressed.' . $ext;
                $newPath = Yii::getAlias('@upload/FileKtp/' . $newNameFile);
                Image::getImagine()->open(Yii::getAlias('@temp/') . $nameFile)
                    ->thumbnail(new Box(500, 500))
                    ->save($newPath, ['quality' => 100]);
                unlink(Yii::getAlias('@temp/') . $nameFile);

                $fileDb = new UploadedFiledb();
                $fileDb->name = $nameFile;
                $fileDb->size = $this->imageFile->size;
                $fileDb->filename = $newPath;
                $fileDb->type = $this->imageFile->type;
                if (!$fileDb->validate()) {
                    return $fileDb->getErrors();
                }

                if ($fileDb->save()) {
                    $this->imageFile->saveAs($newPath);
                    $transaction->commit();
                    return  $fileDb->id;
                }
            } catch (\Exception $e) {
                $transaction->rollBack();
                return $e->getMessage();
            } catch (\Throwable $e) {
                $transaction->rollBack();
                return $e->getMessage();
            }
        } else {
            return $this->getErrors();
        }
    }
    public function uploadFilePengaduan($id)
    {
        if (!empty($this->imageFile) && $this->validate()) {
            $connection = Yii::$app->db;
            $transaction = $connection->beginTransaction();
            try {


                $ext = $this->imageFile->extension;
                $nameFile =  'PengaduanFile_' . Yii::$app->user->identity->id . '_' . $id . '.' . $ext;
                $this->imageFile->saveAs('@temp/' . $nameFile);

                $newNameFile =   'PengaduanFile_' . Yii::$app->user->identity->id . '_' . $id . '_compressed.' . $ext;
                $newPath = Yii::getAlias('@upload/FilePengaduan/' . $newNameFile);

                $fileDb = new UploadedFiledb();
                $fileDb->name = $this->imageFile->name;
                $fileDb->size = $this->imageFile->size;
                $fileDb->filename = $newPath;
                $fileDb->type = $this->imageFile->type;
                if (!$fileDb->validate()) {
                    return $fileDb->getErrors();
                }
                if ($fileDb->save()) {
                    Image::getImagine()->open(Yii::getAlias('@temp/') . $nameFile)
                        ->thumbnail(new Box(500, 500))
                        ->save($newPath, ['quality' => 100]);
                    unlink(Yii::getAlias('@temp/') . $nameFile);
                    $this->imageFile->saveAs($newPath);

                    $pengaduan = TaPengaduan::findOne(['id' => $id]);
                    $pengaduan->id_file = $fileDb->id;
                    if ($pengaduan->save()) {
                        $transaction->commit();
                        return true;
                    }
                }
                return  false;
            } catch (\Exception $e) {
                $transaction->rollBack();
                return $e->getMessage();
            } catch (\Throwable $e) {
                $transaction->rollBack();
                return $e->getMessage();
            }
        } else {
            return false;
        }
    }
}
