<?php

namespace api\controllers;

use api\models\UploadForm;
use api\models\User;
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

class UpdateUserController extends Controller

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
                    'upload'  => ['POST'],
                ],
            ],
        ]);
    }

    public function actionUser($username)
    {
        $post = Yii::$app->request->post();
        $model = User::find();

        if (empty($post)) {
            return [
                'status' => false,
                'pesan' => 'data yang dikirim kosong',
            ];
        }
        if ($model->where(['email' => $post['email']])->exists()) {
            return [
                'status' =>  false,
                'pesan' => 'Email sudah digunakan, silahkan gunakan email yang lain'
            ];
        }
        $User = User::find();
        $data = $User->where(['username' => $username])->one();
        $data->name = $post['name'];
        $data->email = $post['email'];
        $data->phone_number = $post['phone_number'];
        $data->address = $post['address'];
        $data->kelurahan = $post['kelurahan'];
        if ($data->save()) {
            // file is uploaded successfully
            $this->status = true;
            $this->pesan = "Berhasil Upload Dokumen";
            $query = (new \yii\db\Query());
            $query->select('*')
                ->from('user')
                ->where([''like'', 'lower(username)',  strtolower($data->username)])->one();
            $command = $query->createCommand();
            $data = $command->queryOne();

            $this->data = $data;
        } else {
            $this->status = false;
            $this->pesan = 'Gagal Simpan';
        }


        return [
            'status' => $this->status,
            'pesan' => $this->pesan,
            'data' => $this->data,
        ];
    }
}