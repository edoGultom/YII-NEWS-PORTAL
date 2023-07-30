<?php

namespace api\controllers;

use api\models\User;
use Yii;
use yii\rest\Controller;
use yii\web\Response;

class SiteController extends Controller
{
    public $pesan = '';
    public $data = '';
    public $status = false;

    public function beforeAction($action)
    {
        \Yii::$app->response->format = Response::FORMAT_JSON;
        return parent::beforeAction($action);
    }

    public function actionIndex()
    {
        return 'Hello World!';
    }
}
