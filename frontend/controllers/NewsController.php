<?php

namespace frontend\controllers;

use common\models\Artikel;
use common\models\KategoriArtikel;
use common\models\RefKategori;
use common\models\SectionKategori;
use yii\data\Pagination;

use yii;

class NewsController extends \yii\web\Controller
{
    // public function init()
    // {

    //     parent::init();
    //     $this->layout = '@frontend/views/layouts/main_halaman';
    // }

    public function actionIndex()
    {
        $title = 'News';
        $idKategori = RefKategori::find()->where([''like'', 'lower(keterangan)', 'berita'])->one();
        $query = Artikel::find()->where(['aktif' => 1])->andWhere(['=', 'kategori', ($idKategori) ? $idKategori->id : '']);
        $count = $query->count();
        $pagination = new Pagination(['totalCount' => $count, 'pageSize' => 8]);
        $data = $query->offset($pagination->offset)
            ->limit($pagination->limit)
            ->orderBy(['created_at' => SORT_DESC])
            ->all();

        return $this->render('index', ['data' => $data, 'title' => $title, 'pagination' => $pagination]);
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
