<?php

namespace backend\controllers;

use Yii;
use backend\models\UsulanPengaduanSearch;
use common\models\TaPengaduan;
use common\models\TaPengusulanSurat;
use common\models\TaTanggapan;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use \yii\web\Response;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\data\Pagination;

/**
 * UsulanPengaduanController implements the CRUD actions for Section model.
 */
class UsulanPengaduanController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                    'bulk-delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Section models.
     * @return mixed
     */
    public function actionTolak($id)
    {
        $request = Yii::$app->request;
        $model = TaPengusulanSurat::findOne($id);
        if ($request->isAjax) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            if ($request->isGet) {
                return [
                    'title' => "Penolakan Usulan",
                    'size' => "medium",
                    'content' => $this->renderAjax('_form_tolak', [
                        'model' => $model
                    ]),
                    'footer' => Html::button('Tutup', ['class' => 'btn btn-secondary pull-left', 'data-bs-dismiss' => "modal"]) .
                        Html::button('Simpan', ['class' => 'btn btn-danger', 'type' => "submit"])
                ];
            } else if ($model->load($request->post())) {
                if ($model->setTahap(4, $model->keterangan)) {
                    return [
                        'forceReload' => '#crud-datatable-pjax',
                        'size' => 'small',
                        'title' => "Informasi",
                        'content' => '
                            <div class="alert alert-success">
                            Berhasil melakukan penolakan
                            </div>',
                        'footer' => Html::button('Tutup', ['class' => 'btn btn-secondary pull-left', 'data-bs-dismiss' => "modal"])
                    ];
                }
                return [
                    'title' => "Penolakan Usulan",
                    'forceReload' => '#crud-datatable-pjax',
                    'size' => "small",
                    'content' => '<div class="alert alert-danger">Gagal membatalkan usulan</div>',
                    'footer' => Html::button('Batal', ['class' => 'btn btn-secondary pull-left', 'data-bs-dismiss' => "modal"])
                ];
            } else {
                return [
                    'title' => "Penolakan Usulan",
                    'size' => "medium",
                    'content' => '<div class="alert alert-danger">Gagal membatalkan usulan</div>',
                    'footer' => Html::button('Tutup', ['class' => 'btn btn-secondary pull-left', 'data-bs-dismiss' => "modal"])
                ];
            }
        } else {
            return $this->render('_form_tolak', [
                'model' => $this->findModel($id),
            ]);
        }
    }
    public function actionSelesai($id)
    {
        $request = Yii::$app->request;
        $model = TaPengusulanSurat::find()->where(['id' => $id])->one();
        if ($request->isAjax) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            if ($model->setTahap(3)) {
                return [
                    'title' => "Informasi",
                    'forceReload' => '#crud-datatable-pjax',
                    'size' => "small",
                    'content' => '
                        <div class="alert alert-success">
                            Uslan telah selesai
                        </div>',
                    'footer' => Html::button('Tutup', ['class' => 'btn btn-secondary pull-left', 'data-bs-dismiss' => "modal"])
                ];
            } else {
                return [
                    'title' => "Informasi",
                    'size' => "small",
                    'content' => '<div class="alert alert-danger">Gagal memverifikasi</div>',
                    'footer' => Html::button('Batal', ['class' => 'btn btn-secondary pull-left', 'data-bs-dismiss' => "modal"])
                ];
            }
        }
    }
    public function actionTerima($id)
    {
        $request = Yii::$app->request;
        $model = TaPengusulanSurat::find()->where(['id' => $id])->one();
        if ($request->isAjax) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            if ($model->setTahap(2)) {
                return [
                    'title' => "Informasi",
                    'forceReload' => '#crud-datatable-pjax',
                    'size' => "small",
                    'content' => '
                        <div class="alert alert-success">
                            Berhasil menerima usulan
                        </div>',
                    'footer' => Html::button('Tutup', ['class' => 'btn btn-secondary pull-left', 'data-bs-dismiss' => "modal"])
                ];
            } else {
                return [
                    'title' => "Informasi",
                    'size' => "small",
                    'content' => '<div class="alert alert-danger">Gagal mengirim usulan</div>',
                    'footer' => Html::button('Batal', ['class' => 'btn btn-secondary pull-left', 'data-bs-dismiss' => "modal"]) .
                        Html::a('Edit', ['update', 'id' => $id], ['class' => 'btn btn-danger', 'role' => 'modal-remote'])
                ];
            }
        }
    }
    public function actionIndex($idActive = 1, $idTanggapan = null)
    {
        $request = Yii::$app->request;
        $model = TaTanggapan::find()->where(['id' => $idTanggapan])->one();
        if (!$model) {
            $model = new TaTanggapan();
        }
        $data = TaPengaduan::find()->where(['status' => 1])->all();
        if ($model->load($request->post())) {
            $model->id_pengaduan = $idActive;
            $model->tgl_tanggapan = date('Y-m-d');
            $model->id_admin = Yii::$app->user->identity->id;
            $model->save();
            $model->tanggapan = NULL;
            return $this->redirect(['index', 'idActive' => $idActive]);
        }
        return $this->render('index', [
            'data' => $data,
            'idActive' => $idActive,
            'model' => $model,
        ]);
    }
    public function actionUbah($idTanggapan = null)
    {
        return $this->redirect(['index', [
            'idTanggapan' => $idTanggapan
        ]]);
    }
    public function actionProfile($path) // khusus lihat foto
    {
        // $file = \Yii::getAlias("@"  . $path);
        $file = \Yii::getAlias("@"  . $path);
        $response = Yii::$app->getResponse();
        if (file_exists($file)) {
            return $response->sendFile($file, 'file', [
                'inline' => true
            ]);
        } else {
            $file = \Yii::getAlias("@api/web/images/empty.png");
            return $response->sendFile($file, 'file', [
                'inline' => true
            ]);
        }
    }
    public function actionDataContent($id = null)
    {
        $data = TaPengaduan::find()->where(['id' => $id])->one();
        return $data;
    }

    public function actionTanggapan($idTanggapan = null)
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        $data = TaTanggapan::find()->where(['id' => $idTanggapan])->one();
        return $data;
    }

    /**
     * Displays a single Section model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $request = Yii::$app->request;
        if ($request->isAjax) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            return [
                'title' => "Section #" . $id,
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
     * Creates a new Section model.
     * For ajax request will return json object
     * and for non-ajax request if creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id_kategori = null)
    {
        $request = Yii::$app->request;
        $model = new Section();
        $model->id_kategori = $id_kategori;

        if ($request->isAjax) {
            /*
            *   Process for ajax request
            */
            Yii::$app->response->format = Response::FORMAT_JSON;
            if ($request->isGet) {
                return [
                    'title' => "Create new Section",
                    'content' => $this->renderAjax('create', [
                        'model' => $model,
                    ]),
                    'footer' => Html::button('Close', ['class' => 'btn btn-default pull-left', 'data-dismiss' => "modal"]) .
                        Html::button('Save', ['class' => 'btn btn-primary', 'type' => "submit"])

                ];
            } else if ($model->load($request->post()) && $model->save()) {
                return [
                    'forceReload' => '#crud-datatable-pjax',
                    'title' => "Create new Section",
                    'content' => '<span class="text-success">Create Section success</span>',
                    'footer' => Html::button('Close', ['class' => 'btn btn-default pull-left', 'data-dismiss' => "modal"]) .
                        Html::a('Create More', ['create', 'id_kategori' => $id_kategori], ['class' => 'btn btn-primary', 'role' => 'modal-remote'])

                ];
            } else {
                return [
                    'title' => "Create new Section",
                    'content' => $this->renderAjax('create', [
                        'model' => $model,
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
                return $this->redirect(['view', 'id' => $model->id]);
            } else {
                return $this->render('create', [
                    'model' => $model,
                ]);
            }
        }
    }

    /**
     * Updates an existing Section model.
     * For ajax request will return json object
     * and for non-ajax request if update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $request = Yii::$app->request;
        $model = $this->findModel($id);

        if ($request->isAjax) {
            /*
            *   Process for ajax request
            */
            Yii::$app->response->format = Response::FORMAT_JSON;
            if ($request->isGet) {
                return [
                    'title' => "Update Section #" . $id,
                    'content' => $this->renderAjax('update', [
                        'model' => $model,
                    ]),
                    'footer' => Html::button('Close', ['class' => 'btn btn-default pull-left', 'data-dismiss' => "modal"]) .
                        Html::button('Save', ['class' => 'btn btn-primary', 'type' => "submit"])
                ];
            } else if ($model->load($request->post()) && $model->save()) {
                return [
                    'forceReload' => '#crud-datatable-pjax',
                    'title' => "Section #" . $id,
                    'content' => $this->renderAjax('view', [
                        'model' => $model,
                    ]),
                    'footer' => Html::button('Close', ['class' => 'btn btn-default pull-left', 'data-dismiss' => "modal"]) .
                        Html::a('Edit', ['update', 'id' => $id], ['class' => 'btn btn-primary', 'role' => 'modal-remote'])
                ];
            } else {
                return [
                    'title' => "Update Section #" . $id,
                    'content' => $this->renderAjax('update', [
                        'model' => $model,
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
                return $this->redirect(['view', 'id' => $model->id]);
            } else {
                return $this->render('update', [
                    'model' => $model,
                ]);
            }
        }
    }

    /**
     * Delete an existing Section model.
     * For ajax request will return json object
     * and for non-ajax request if deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionHapus($id)
    {
        $request = Yii::$app->request;
        // $this->findModel($id)->delete();
        $model  = TaTanggapan::find()->where(['id' => $id])->one();
        if ($model) {
            $model->delete();
        }
        // Yii::$app->response->format = Response::FORMAT_JSON;
        // return ['forceClose' => true, 'forceReload' => '#_content_pjax'];
        return $this->redirect(['index']);
    }

    /**
     * Delete multiple existing Section model.
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
            $model->delete();
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
     * Finds the Section model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Section the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Section::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
