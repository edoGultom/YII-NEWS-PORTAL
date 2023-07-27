<?php

namespace backend\controllers;

use common\models\UploadedFiledb;
use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;

/**
 * FileController implements the CRUD actions for AlbumGambar model.
 */
class DocumentController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                    'bulk-delete' => ['post'],
                ],
            ],
        ];
    }

    public function actionGetFile($id = null)
    {
        $file = UploadedFiledb::find()->where(['id' => $id])->one();
        // $storagePath = Yii::getAlias('@uploadUrl');
        // check filename for allowed chars (do not allow ../ to avoid security issue: downloading arbitrary files)
        if (!$file) {
            throw new \yii\web\NotFoundHttpException('The file does not exists.');
        }
        return Yii::$app->response->sendFile($file->filename, $file->filename);
    }
}
