<?php

namespace api\controllers;

use \yii\web\Response;

use Yii;

class LihatFileController extends \yii\rest\Controller
{
    public function actionProfile($path) // khusus lihat foto
    {
        $file = \Yii::getAlias("@" . $path);
        $response = Yii::$api->getResponse();
        if (file_exists($file)) {
            return $response->sendFile($file, 'file', [
                'inline' => true
            ]);
        } else {
            $file = \Yii::getAlias("@uploads/image.jpg");
            return $response->sendFile($file, 'file', [
                'inline' => true
            ]);
        }
    }
}