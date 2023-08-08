<?php

namespace api\controllers;

use common\models\UploadedFiledb;
use common\models\Uploadfile;
use yii\rest\Controller;
use \yii\web\Response;

use Yii;

// class LihatFileController extends \yii\rest\Controller
class LihatFileController extends Controller

{
    public function actionProfile($path) // khusus lihat foto
    {
        // $file = \Yii::getAlias("@"  . $path);
        $file = \Yii::getAlias("@"  . $path);
        $response = Yii::$app->getResponse();
        if (file_exists($file)) {
            return $response->sendFile($file, 'file', [
                'inline' => true
            ]);
        } else {
            $file = \Yii::getAlias("@api/web/images/empty.png");
            return $response->sendFile($file, 'file', [
                'inline' => true
            ]);
        }
    }
    public function actionById($id) // khusus lihat foto
    {
        $response = Yii::$app->getResponse();
        if (!empty($id)) {
            $UploadedFiledb = UploadedFiledb::findOne(['id' => $id]);
            $filenameExplode = explode('/common', $UploadedFiledb->filename);

            $file = \Yii::getAlias("@common" . $filenameExplode[1]);
            if (file_exists($file)) {
                return $response->sendFile($file, 'file', [
                    'inline' => true
                ]);
            }
        }
        $file = \Yii::getAlias("@api/web/images/empty.png");
        return $response->sendFile($file, 'file', [
            'inline' => true
        ]);
    }
}
