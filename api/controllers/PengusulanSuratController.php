<?php

namespace api\controllers;

use api\models\UploadForm;
use common\models\TaPengusulanSurat;
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

class PengusulanSuratController extends Controller

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
                    'cek-surat'  => ['GET'],
                    'notification'  => ['GET'],
                ],
            ],
        ]);
    }
    public function actionCekSurat($userId)
    {
        $resp = TaPengusulanSurat::findOne(['id_user' => $userId]);

        if ($resp) {
            $this->status = true;
            $this->pesan = "Sudah mengusulkan tanggal " . Yii::$app->formatter->asDate($resp->tanggal, 'php:d F Y');
        } else {
            $this->status = false;
            $this->pesan = 'Data Tidak Ditemukan';
        }

        return [
            'status' => $this->status,
            'pesan' => $this->pesan,
            'data' => $this->data,
        ];
    }
    public function actionNotification($userId)
    {
        $resp = TaPengusulanSurat::find()->where(['id_user' => $userId])->orderBy(['tanggal' => SORT_DESC])->all();

        $arr = [];
        if ($resp) {
            $this->status = true;
            foreach ($resp as $key => $value) {
                $arr[$key]['id'] = $value->id;
                $arr[$key]['jenis_surat'] = $value->jenis_surat;
                $arr[$key]['tanggal'] = Yii::$app->formatter->asDate($value->tanggal, 'php:d F Y');
                $arr[$key]['keterangan'] = $value->keterangan;
                $arr[$key]['status'] = $value->tahapUsulan->tahap ?? '-';
            }
            $this->data = $arr;
            $this->pesan = "Data Ditemukan";
        } else {
            $this->status = false;
            $this->pesan = 'Data Tidak Ditemukan';
        }

        return [
            'status' => $this->status,
            'pesan' => $this->pesan,
            'data' => $this->data,
        ];
    }
}