<?php

namespace api\models;

use common\models\RefJenisSurat;
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
                    $jenisSurat = RefJenisSurat::findOne(['id' => 1]);
                    $model = new TaPengusulanSurat();
                    $model->id_jenis_surat = 1;
                    $model->id_file = $fileDb->id;
                    $model->id_user =  Yii::$app->user->identity->id;
                    $model->jenis_surat = $jenisSurat->jenis;
                    $model->tanggal = date('Y-m-d');

                    if ($model->setTahap(1)) {
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
