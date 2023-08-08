<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap\Modal;
use kartik\grid\GridView;
use johnitvn\ajaxcrud\CrudAsset;
use johnitvn\ajaxcrud\BulkButtonWidget;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\PenggunaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Penggunas';
$this->params['breadcrumbs'][] = $this->title;

CrudAsset::register($this);

?>
<style>
.kv-grid-container {
    overflow-x: hidden;
}
</style>
<section class="section">
    <div class="section-header d-flex justify-content-between ">
        <h1 class="mr-5">
            <?= $this->title ?>
        </h1>
        <div>
            <?= Html::a(
                '<i class="fas fa-plus"></i> Tambah Data',
                ['create'],
                ['class' => 'btn btn-success', 'role' => 'modal-remote']
            ) ?>
        </div>
    </div>
</section>
<div class="pengguna-index">
    <div id="ajaxCrudDatatable">
        <?= GridView::widget([
            'id' => 'crud-datatable',
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'pjax' => true,
            'pager' => [
                'firstPageLabel' => 'Awal',
                'lastPageLabel' => 'Akhir'
            ],

            'columns' => require(__DIR__ . '/_columns.php'),
            'toolbar' => [
                [
                    'content' =>
                    Html::a(
                        '<i class="glyphicon glyphicon-repeat"></i> ',
                        [''],
                        ['data-pjax' => 1, 'class' => 'btn btn-default', 'title' => 'Reset Grid']
                    )
                ]
            ],
            'striped' => true,
            'condensed' => true,
            'responsive' => true,
            'panel' => [
                'type' => 'primary',
            ]
        ]) ?>
    </div>
</div>
<?php Modal::begin([
    "id" => "ajaxCrudModal",
    "footer" => "", // always need it for jquery plugin
]) ?>
<?php Modal::end(); ?>