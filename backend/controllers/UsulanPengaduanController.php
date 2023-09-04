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

    public function actionIndex($idActive = null, $idTanggapan = null)
    {
        $request = Yii::$app->request;
        $data = TaPengaduan::find()
            ->where(['status' => 1])
            ->orderBy(['tgl_pengaduan' => SORT_DESC])
            ->all();
        if (empty($idActive)) {
            $idActive =  (!empty($data)) ? ArrayHelper::getColumn($data, 'id')[0] : NULL;
        }
        // echo "<pre>";
        // print_r($idActive);
        // echo "</pre>";
        // exit();
        $model = TaTanggapan::find()->where(['id' => $idTanggapan])->one();

        if (!$model) {
            $model = new TaTanggapan();
        }
        if ($model->load($request->post())) {
            $model->id_pengaduan = $idActive;
            $model->tgl_tanggapan = (new \DateTime())->format('Y-m-d H:i:s');
            $model->id_user = Yii::$app->user->identity->id;
            $model->save();
            $model->tanggapan = NULL;
            return $this->redirect(['index', 'idActive' => $idActive]);
        }
        return $this->render('index', [
            'dataPengaduan' => $data,
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
        $data = TaPengaduan::find()
            ->orderBy(['tgl_pengaduan' => SORT_DESC])
            ->where(['status' => 1])
            ->andWhere(['id' => $id])
            ->one();
        return $data;
    }

    public function actionTanggapan($idTanggapan = null)
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        $data = TaTanggapan::find()->where(['id' => $idTanggapan])->orderBy(['tgl_tanggapan' => SORT_DESC])->one();
        return $data;
    }

    public function actionClose($idPengaduan)
    {
        $request = Yii::$app->request;
        $model  = TaPengaduan::find()->where(['id' => $idPengaduan])->one();
        if ($model) {
            $model->setTahap(3);
        }
        Yii::$app->response->format = Response::FORMAT_JSON;
        return $this->redirect(['index']);
    }
    public function actionHapus($id, $idActive = null)
    {
        $request = Yii::$app->request;
        $model  = TaTanggapan::find()->where(['id' => $id])->one();
        if ($model) {
            $model->delete();
        }
        // Yii::$app->response->format = Response::FORMAT_JSON;
        // return ['forceClose' => true, 'forceReload' => '#_content_pjax'];
        return $this->redirect(['index', 'idActive' => $idActive]);
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
