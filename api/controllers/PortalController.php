<?php

namespace api\controllers;

use api\models\UploadForm;
use api\models\User;
use common\models\Artikel;
use Yii;
use yii\helpers\ArrayHelper;
use yii\rest\Controller;
use yii\web\Response;
use yii\filters\auth\HttpBearerAuth;
use yii\filters\auth\QueryParamAuth;
use filsh\yii2\oauth2server\filters\ErrorToExceptionFilter;
use filsh\yii2\oauth2server\filters\auth\CompositeAuth;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

class PortalController extends Controller

{
    public $pesan = '';
    public $data = '';
    public $status = false;

    public function beforeAction($action)
    {
        \Yii::$app->response->format = Response::FORMAT_JSON;
        return parent::beforeAction($action);
    }
    public function behaviors()
    {
        return ArrayHelper::merge(parent::behaviors(), [
            'authenticator' => [
                'class' => CompositeAuth::className(),
                'authMethods' => [
                    ['class' => HttpBearerAuth::className()],
                    ['class' => QueryParamAuth::className(), 'tokenParam' => 'accessToken'],
                ]
            ],
            'exceptionFilter' => [
                'class' => ErrorToExceptionFilter::className()
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'popular'  => ['GET'],
                ],
            ],
        ]);
    }

    public function actionPopular()
    {
        $data =   Artikel::find()->where(['aktif' => 1, 'popular' => 1])->all();

        if ($data) {
            $this->status = true;
            $this->pesan = "Data ditemukan";
            $this->data = $data;
        } else {
            $this->status = false;
            $this->pesan = 'Data tidak ditemukan';
        }


        return [
            'status' => $this->status,
            'pesan' => $this->pesan,
            'data' => $this->data,
        ];
    }
}
