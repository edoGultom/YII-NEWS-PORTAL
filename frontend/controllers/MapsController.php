<?php

namespace frontend\controllers;

use common\models\Artikel;
use common\models\KategoriArtikel;
use common\models\SectionKategori;
use yii\data\Pagination;

use yii;

class MapsController extends \yii\web\Controller
{
    // public function init()
    // {

    //     parent::init();
    //     $this->layout = '@frontend/views/layouts/main_halaman';
    // }

    public function actionIndex($kategori = NULL)
    {

        // if (isset($kategori)) {
        //     $kategori = str_replace('-', ' ', $kategori);
        //     $title = $kategori;
        //     $idkategori = SectionKategori::find()->where(['like', 'keterangan', $kategori])->one()->id;
        //     $query = Artikel::find()->where(['aktif' => 1, 'kategori' => $idkategori]);
        // } else {
        //     $title = 'News';

        //     $query = Artikel::find()->where(['aktif' => 1]);
        // }
        // $count = $query->count();
        // $pagination = new Pagination(['totalCount' => $count, 'pageSize' => 8]);
        // $data = $query->offset($pagination->offset)
        //     ->limit($pagination->limit)
        //     ->orderBy(['created_at' => SORT_DESC])
        //     ->all();

        // return $this->render('index', ['data' => $data, 'title' => $title, 'pagination' => $pagination]);
        return $this->render('index');
    }

    public function actionSlug($slug)
    {
        $data = Artikel::find()->where(['sub_judul' => $slug])->one();

        if (!is_null($data)) {

            $data->jumlah_visit = $data->jumlah_visit + 1;
            $data->save(false);

            $request = Yii::$app->request->cookies;
            if ($request->has($slug)) {
                $cookieValue = $request->getValue($slug);
            } else {

                $setcookies = Yii::$app->response->cookies;
                $setcookies->add(new \yii\web\Cookie([
                    'name' => $slug,
                    'value' => 'Aktif',
                    'expire' => strtotime('+1 days'),
                ]));
            }

            return $this->render('sub-news', [
                'data' => $data,
            ]);
        }
    }


    // public function actionArchives($bulan, $tahun)
    // {
    //     $query = Artikel::find()->where(["to_char(to_timestamp(created_at), 'yyyy-mm')" => $tahun . '-' . $bulan]);
    //     $count = $query->count();
    //     $pagination = new Pagination(['totalCount' => $count, 'pageSize' => 8]);
    //     $data = $query->offset($pagination->offset)
    //         ->limit($pagination->limit)
    //         ->orderBy(['created_at' => SORT_DESC])
    //         ->all();

    //     return $this->render('index', ['data' => $data, 'title' => 'Archives', 'pagination' => $pagination]);
    // }
}