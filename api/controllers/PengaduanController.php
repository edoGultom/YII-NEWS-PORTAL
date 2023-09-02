<?php

namespace api\controllers;

use api\models\UploadForm;
use common\models\TaPengaduan;
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

class PengaduanController extends Controller

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
                    'pengaduan'  => ['POST'],
                    'data'  => ['GET'],
                ],
            ],
        ]);
    }

    public function actionTambah()
    {

        $post = Yii::$app->request->post();

        $model = new TaPengaduan();
        $model->id_user = Yii::$app->user->identity->id;
        $model->tgl_pengaduan = (new \DateTime())->format('Y-m-d H:i:s');
        $model->subjek =  array_key_exists('subjek', $post) ? $post['subjek'] : NULL;
        $model->isi = array_key_exists('isi', $post) ? $post['isi'] : NULL;
        if ($model->setTahap(1)) {
            $this->status = true;
            $this->pesan = "Data Berhasil Disimpan";
            $upload = new UploadForm();
            $upload->imageFile =  UploadedFile::getInstanceByName('file');
            if (!empty($upload->imageFile)) {
                $resp = $upload->uploadFilePengaduan($model->id);
                if (!$resp) {
                    $this->pesan = $resp;
                    $this->status = false;
                }
            }
            $this->data = $model;
        } else {
            $this->status = false;
            $this->pesan = $model->getErrors();
        }

        return [
            'status' => $this->status,
            'pesan' => $this->pesan,
            'data' => $this->data,
        ];
    }
    public function actionData()
    {
        $query =  TaPengaduan::find()->where(['id_user' => Yii::$app->user->identity->id])->orderBy(['tgl_pengaduan' => SORT_DESC, 'id' => SORT_DESC])->all();

        if ($query) {
            $this->status = true;
            $this->pesan = "Data ditemukan";
            $arr = [];
            foreach ($query as $key => $value) {
                $idGambar = $value->file->id ?? NULL;
                $arr[$key]['id'] = $value->id;
                $arr[$key]['subjek'] = $value->subjek;
                $arr[$key]['isi'] = $value->isi;
                $arr[$key]['tgl_pengaduan'] = Yii::$app->formatter->asDate($value->tgl_pengaduan, 'php:d F Y');
                $arr[$key]['status'] = $value->tahap->tahap ?? '';
                $arr[$key]['tanggapan'] = $value->tanggapanById;
                $arr[$key]['idFile'] = $value->file->id ?? '';
                $arr[$key]['picturePath'] = Yii::$app->request->hostInfo . '/api/lihat-file/by-id?id=' . $idGambar;
            }
            $this->data = $arr;
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
