<?php

namespace api\models;

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
                    ->save(Yii::getAlias('@uploads/' . $newNameFile), ['quality' => 100]);
                unlink(Yii::getAlias('@temp/') . $nameFile);
                $path = 'uploads/' . $newNameFile;
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
}
