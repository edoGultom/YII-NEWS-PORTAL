<?php

namespace backend\controllers;

use Yii;
use common\models\Artikel;
use common\models\UploadForm;
use backend\models\ArtikelSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use \yii\web\Response;
use yii\helpers\Html;
use yii\web\UploadedFile;
use common\models\AuthAssignment;
use yii\filters\Cors;

use yii\helpers\ArrayHelper;
use common\models\KategoriArtikel;

use yii\filters\AccessControl;
use common\models\LoginForm;

/**
 * ArtikelController implements the CRUD actions for Artikel model.
 */
class ArtikelController extends Controller
{
    /**
     * @inheritdoc
     */

    // public static function allowedDomains() {
    //     return [$_SERVER["REMOTE_ADDR"], 'http://dinkes.test'];
    // }


    // public function behaviors()
    // {
    //     $behaviors = parent::behaviors();

    //     return array_merge($behaviors, [

    //             'verbs' => [
    //                 'class' => VerbFilter::className(),
    //                 'actions' => [
    //                     'delete' => ['post'],
    //                     'bulk-delete' => ['post'],
    //                 ],
    //             ],
    //             'corsFilter'  => [
    //                 'class' => Cors::className(),
    //                 'cors'  => [
    //                     // restrict access to domains:
    //                     'Origin'                           => static::allowedDomains(),
    //                     'Access-Control-Request-Method'    => ['POST', 'GET', 'OPTIONS'],
    //                     'Access-Control-Allow-Credentials' => true,
    //                     'Access-Control-Max-Age'           => 3600,                 // Cache (seconds)
    //                     'Access-Control-Allow-Headers' => ['authorization','X-Requested-With','content-type']
    //                 ],
    //             ],
    //         ]);

    // }

    public function behaviors()
    {
        return ArrayHelper::merge([
            [
                'class' => Cors::className(),
            ],
        ], parent::behaviors());
    }

    /**
     * Lists all Artikel models.
     * @return mixed
     */
    public function actionIndex($idkategori = null)
    {
        $searchModel = new ArtikelSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $kategori = ArrayHelper::map(KategoriArtikel::find()->all(), 'id', 'keterangan');
        $identity = Yii::$app->user->identity->id;
        if (isset($identity)) {
            $auth_assignment = AuthAssignment::findOne(['user_id' => $identity, 'item_name' => "Super Admin"]);
            if (!$auth_assignment) {
                $dataProvider->query->andFilterWhere(['id_user' => $identity]);
            }
        }
        $dataProvider->query->orderBy(['created_at' => SORT_DESC]);

        if ($idkategori) {
            $dataProvider->query->andFilterWhere(['kategori' => $idkategori])->orderBy(['created_at' => SORT_DESC]);
        }

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'idkategori' => $idkategori,
            'kategori' => $kategori
        ]);
    }


    /**
     * Displays a single Artikel model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $request = Yii::$app->request;
        if ($request->isAjax) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            return [
                'title' => "Artikel #" . $id,
                'content' => $this->renderAjax('view', [
                    'model' => $this->findModel($id),
                ]),
                'footer' => Html::button('Close', ['class' => 'btn btn-default pull-left', 'data-dismiss' => "modal"]) .
                    Html::a('Edit', ['update', 'id' => $id], ['class' => 'btn btn-primary', 'role' => 'modal-remote'])
            ];
        } else {
            return $this->render('view', [
                'model' => $this->findModel($id),
            ]);
        }
    }

    /**
     * Creates a new Artikel model.
     * For ajax request will return json object
     * and for non-ajax request if creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($idkategori = null)
    {
        $request = Yii::$app->request;
        $model = new Artikel();
        $upload = new UploadForm();
        $model->tanggalF = date("Y/m/d");

        // echo $model->tanggalF;exit;
        if ($idkategori) {
            $model->kategori = $idkategori;
        }
        $title = 'Tambah Artikel';
        if ($request->isAjax) {
            /*
            *   Process for ajax request
            */
            Yii::$app->response->format = Response::FORMAT_JSON;
            if ($request->isGet) {
                return [
                    'title' => "Tambah Artikel",
                    'content' => $this->renderAjax('create', [
                        'model' => $model,
                        'idkategori' => $idkategori,
                        'upload' => $upload,
                        'title' => $title,
                    ]),
                    'footer' => Html::button('Close', ['class' => 'btn btn-default pull-left', 'data-dismiss' => "modal"]) .
                        Html::button('Save', ['class' => 'btn btn-primary', 'type' => "submit"])

                ];
            } else if ($model->load($request->post()) && $model->save()) {
                $model->created_at = strtotime($model->tanggalF);
                // $model->judul = $model->judul .' '.$model->created_at;
                $model->sub_judul = $model->sub_judul . '-' . $model->created_at;
                $model->save();

                $upload->id_artikel = $model->id;
                $upload->file = UploadedFile::getInstance($model, 'file');

                $upload->upload();

                return [
                    'forceReload' => '#crud-datatable-pjax',
                    'title' => "Tambah Artikel",
                    'content' => '<span class="text-success">Create Artikel success</span>',
                    'footer' => Html::button('Close', ['class' => 'btn btn-default pull-left', 'data-dismiss' => "modal"]) .
                        Html::a('Create More', ['create', 'idKategori' => $idkategori], ['class' => 'btn btn-primary', 'role' => 'modal-remote', 'onClick' => 'btnMore()'])

                ];
            } else {
                return [
                    'title' => "Tambah Artikel",
                    'content' => $this->renderAjax('create', [
                        'model' => $model,
                        'idkategori' => $idkategori,
                        'upload' => $upload,
                        'title' => $title,
                    ]),
                    'footer' => Html::button('Close', ['class' => 'btn btn-default pull-left', 'data-dismiss' => "modal"]) .
                        Html::button('Save', ['class' => 'btn btn-primary', 'type' => "submit"])
                ];
            }
        } else {
            /*
            *   Process for non-ajax request
            */
            if ($model->load($request->post()) && $model->save()) {
                $model->created_at = strtotime($model->tanggalF);
                // $model->judul = $model->judul .' '.$model->created_at;
                $model->sub_judul = $model->sub_judul . '-' . $model->created_at;
                $model->save();

                $upload->id_artikel = $model->id;
                $upload->file = UploadedFile::getInstance($model, 'file');
                $upload->upload();

                return $this->redirect(['index', 'idkategori' => $idkategori]);
            } else {
                return $this->render('create', [
                    'model' => $model,
                    'idkategori' => $idkategori,
                    'title' => $title,
                    'upload' => $upload,
                ]);
            }
        }
    }

    /**
     * Updates an existing Artikel model.
     * For ajax request will return json object
     * and for non-ajax request if update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */

    public function actionUpdate($id, $idkategori = null)
    {
        $request = Yii::$app->request;
        $model = $this->findModel($id);
        $upload = new UploadForm();
        $tags = explode(',', $model->tag);
        $title = 'Ubah Artikel';
        if ($request->isAjax) {
            /*
            *   Process for ajax request
            */
            Yii::$app->response->format = Response::FORMAT_JSON;
            if ($request->isGet) {
                return [
                    'title' => "Update Artikel #" . $id,
                    'content' => $this->renderAjax('update', [
                        'model' => $model,
                        'idkategori' => $idkategori,
                        'tags' => $tags,
                        'title' => $title,
                    ]),
                    'footer' => Html::button('Close', ['class' => 'btn btn-default pull-left', 'data-dismiss' => "modal"]) .
                        Html::button('Save', ['class' => 'btn btn-primary', 'type' => "submit"])
                ];
            } else if ($model->load($request->post()) && $model->save()) {

                $upload->id_artikel = $model->id;
                $upload->file = UploadedFile::getInstance($model, 'file');
                $upload->upload();

                return [
                    'forceReload' => '#crud-datatable-pjax',
                    'title' => "Artikel #" . $id,
                    'content' => $this->renderAjax('view', [
                        'model' => $model,
                        'idkategori' => $idkategori,
                        'title' => $title,
                        'tags' => $tags,
                    ]),
                    'footer' => Html::button('Close', ['class' => 'btn btn-default pull-left', 'data-dismiss' => "modal"]) .
                        Html::a('Edit', ['update', 'id' => $id, 'idkategori' => $idkategori], ['class' => 'btn btn-primary', 'role' => 'modal-remote'])
                ];
            } else {
                return [
                    'title' => "Update Artikel #" . $id,
                    'content' => $this->renderAjax('update', [
                        'model' => $model,
                        'title' => $title,
                        'idkategori' => $idkategori,
                        'tags' => $tags,

                    ]),
                    'footer' => Html::button('Close', ['class' => 'btn btn-default pull-left', 'data-dismiss' => "modal"]) .
                        Html::button('Save', ['class' => 'btn btn-primary', 'type' => "submit"])
                ];
            }
        } else {
            /*
            *   Process for non-ajax request
            */
            if ($model->load($request->post()) && $model->save()) {
                $upload->id_artikel = $model->id;
                $upload->file = UploadedFile::getInstance($model, 'file');

                $upload->upload();
                return $this->redirect(['index', 'idkategori' => $idkategori]);
            } else {
                return $this->render('update', [
                    'model' => $model,
                    'idkategori' => $idkategori,
                    'title' => $title,
                    'tags' => $tags,
                ]);
            }
        }
    }

    /**
     * Delete an existing Artikel model.
     * For ajax request will return json object
     * and for non-ajax request if deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $request = Yii::$app->request;
        $model = $this->findModel($id);
        if ($model->deleteImage()) {
            $model->delete();
            if ($request->isAjax) {
                /*
                *   Process for ajax request
                */
                Yii::$app->response->format = Response::FORMAT_JSON;
                return ['forceClose' => true, 'forceReload' => '#crud-datatable-pjax'];
            } else {
                /*
                *   Process for non-ajax request
                */
                return $this->redirect(['index']);
            }
        } else {
            $request = Yii::$app->request;
            if ($request->isAjax) {
                Yii::$app->response->format = Response::FORMAT_JSON;
                return [
                    'title' => "AlbumGambar #" . $id,
                    'content' => 'Gagal Menghapus Data',
                    'footer' => Html::button('Close', ['class' => 'btn btn-default pull-left', 'data-dismiss' => "modal"])
                ];
            } else {
                return $this->redirect(['index']);
            }
        }
    }

    /**
     * Delete multiple existing Artikel model.
     * For ajax request will return json object
     * and for non-ajax request if deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionBulkDelete()
    {
        $request = Yii::$app->request;
        $pks = explode(',', $request->post('pks')); // Array or selected records primary keys
        foreach ($pks as $pk) {
            $model = $this->findModel($pk);
            if ($model->deleteImage()) {
                $model->delete();
            }
        }
        if ($request->isAjax) {
            /*
            *   Process for ajax request
            */
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ['forceClose' => true, 'forceReload' => '#crud-datatable-pjax'];
        } else {
            /*
            *   Process for non-ajax request
            */
            return $this->redirect(['index']);
        }
    }

    /**
     * Finds the Artikel model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Artikel the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Artikel::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionTambahTag()
    {
        $request = Yii::$app->request;
        $tag = $request->post('tag');
        return $tag;
    }
}
