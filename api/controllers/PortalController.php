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
use yii\helpers\Url;
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

    public function actionArticles()
    {
        // return Yii::$app->request->hostInfo;
        $data =   Artikel::find()->where(['aktif' => 1])->all();

        if ($data) {
            $this->status = true;
            $this->pesan = "Data ditemukan";
            $arr = [];
            foreach ($data as $key => $value) {

                $idGambar = $value->ambilgambar->id ?? NULL;
                $idGambarThumb = $value->ambilgambarthumbnail->id ?? NULL;
                $arr[$key]['id'] = $value->id;
                $arr[$key]['judul'] = $value->judul;
                $arr[$key]['sub_judul'] = $value->sub_judul;
                $arr[$key]['isi'] = strip_tags($value->isi);
                $arr[$key]['kategori'] = $value->kategoriArtikel->keterangan ?? '-';
                $arr[$key]['baru'] = $value->baru;
                $arr[$key]['aktif'] = $value->aktif;
                $arr[$key]['popular'] = $value->popular;
                $arr[$key]['jumlah_visit'] = $value->jumlah_visit;
                $arr[$key]['tanggal_posting'] =  date('dd-mm-YYYY', $value->created_at);
                $arr[$key]['picturePath'] = Yii::$app->request->hostInfo . '/api/lihat-file/by-id?id=' . $idGambar;
                $arr[$key]['picturePathThumb'] = Yii::$app->request->hostInfo . '/api/lihat-file/by-id?id=' . $idGambarThumb;
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
    public function actionArticleByType($type)
    {
        $query =  Artikel::find();
        if ($type == 'popular') {
            $data =  $query->where(['aktif' => 1, 'kategori' => 1, 'popular' => 1])->all();
        }
        if ($type == 'kegiatan') {
            $data =   Artikel::find()->where(['aktif' => 1, 'kategori' => 3])->all();
        }

        if ($data) {
            $this->status = true;
            $this->pesan = "Data ditemukan";
            $arr = [];
            foreach ($data as $key => $value) {

                $idGambar = $value->ambilgambar->id ?? NULL;
                $idGambarThumb = $value->ambilgambarthumbnail->id ?? NULL;
                $arr[$key]['id'] = $value->id;
                $arr[$key]['judul'] = $value->judul;
                $arr[$key]['sub_judul'] = $value->sub_judul;
                // $arr[$key]['isi'] = strip_tags($value->isi);
                $arr[$key]['isi'] = $value->isi;
                $arr[$key]['kategori'] = $value->kategoriArtikel->keterangan ?? '-';
                $arr[$key]['baru'] = $value->baru;
                $arr[$key]['aktif'] = $value->aktif;
                $arr[$key]['popular'] = $value->popular;
                $arr[$key]['jumlah_visit'] = $value->jumlah_visit;
                $arr[$key]['tanggal_posting'] =   Yii::$app->formatter->asDate($value->created_at, 'php: d mm Y');
                $arr[$key]['picturePath'] = Yii::$app->request->hostInfo . '/api/lihat-file/by-id?id=' . $idGambar;
                $arr[$key]['picturePathThumb'] = Yii::$app->request->hostInfo . '/api/lihat-file/by-id?id=' . $idGambarThumb;
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
