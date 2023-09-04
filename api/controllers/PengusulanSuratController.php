<?php

namespace api\controllers;

use api\models\UploadForm;
use common\models\RefJenisSurat;
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
                    'create'  => ['POST'],
                ],
            ],
        ]);
    }
    public function actionCreate()
    {
        $post = Yii::$app->request->post();
        // return $post;
        $nama_lengkap = array_key_exists('nama_lengkap', $post) ? $post['nama_lengkap'] : NULL;
        $tempat_lahir = array_key_exists('tempat_lahir', $post) ? $post['tempat_lahir'] : NULL;
        $tgl_lahir = array_key_exists('tgl_lahir', $post) ? $post['tgl_lahir'] : NULL;
        $jenis_kelamin = array_key_exists('jenis_kelamin', $post) ? $post['jenis_kelamin'] : NULL;
        $alamat = array_key_exists('alamat', $post) ? $post['alamat'] : NULL;
        $alamat_domisili = array_key_exists('alamat_domisili', $post) ? $post['alamat_domisili'] : NULL;
        $keterangan_tempat_tinggal = array_key_exists('keterangan_tempat_tinggal', $post) ? $post['keterangan_tempat_tinggal'] : NULL;
        $keterangan_keperluan_surat = array_key_exists('keterangan_keperluan_surat', $post) ? $post['keterangan_keperluan_surat'] : NULL;
        $files = UploadedFile::getInstancesByName("file");

        $jenisSurat = RefJenisSurat::findOne(['id' => 1]);
        $model = new TaPengusulanSurat();
        $model->id_jenis_surat = 1;
        $model->id_user =  Yii::$app->user->identity->id;
        $model->jenis_surat = $jenisSurat->jenis;
        $model->tanggal = date('Y-m-d');
        $model->nama_lengkap = $nama_lengkap;
        $model->tempat_lahir = $tempat_lahir;
        $model->tgl_lahir = $tgl_lahir;
        $model->jenis_kelamin = $jenis_kelamin;
        $model->alamat = $alamat;
        $model->alamat_domisili = $alamat_domisili;
        $model->keterangan_tempat_tinggal = $keterangan_tempat_tinggal;
        $model->keterangan_keperluan_surat = $keterangan_keperluan_surat;
        $connection = Yii::$app->db;
        $transaction = $connection->beginTransaction();
        try {
            if (!empty($files)) {
                $upload = new UploadForm();
                $upload->imageFile = $files[0];
                $idFile = $upload->uploadFileKtp();

                if ($idFile) {
                    $model->id_file = $idFile;
                    if ($model->setTahap(1)) {
                        $this->status = true;
                        $this->pesan = "Berhasil Upload Dokumen";
                        $transaction->commit();
                    } else {
                        $this->status = $model;
                        $this->pesan = $model->getErrors();
                    }
                } else {
                    $this->status = false;
                    $this->pesan = $idFile;
                }
            } else {
                $this->status = false;
                $this->pesan = 'File Kosong!';
            }
        } catch (\Exception $e) {
            $transaction->rollBack();
            $this->status = false;
            $this->pesan = $e->getMessage();
        } catch (\Throwable $e) {
            $transaction->rollBack();
            $this->status = false;
            $this->pesan = $e->getMessage();
        }

        return [
            'status' => $this->status,
            'pesan' => $this->pesan,
            'data' => $this->data,
        ];
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
