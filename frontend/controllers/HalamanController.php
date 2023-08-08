<?php

namespace frontend\controllers;

use common\models\Halaman;

class HalamanController extends \yii\web\Controller
{

  public function init()
  {
    parent::init();
    $this->layout = '@frontend/views/layouts/main_halaman';
  }

  public function actionIndex()
  {
    return $this->render('index');
  }

  public function actionSlug($slug)
  {
    $data = Halaman::find()->where(['sub_judul' => $slug, 'status' => 1])->one();
    if (!is_null($data)) {
      return $this->render('index', [
        'data' => $data,
      ]);
    } else {
      return $this->redirect('/');
    }
  }
}