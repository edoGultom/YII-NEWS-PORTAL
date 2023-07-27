<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap\Modal;
use kartik\grid\GridView;
use johnitvn\ajaxcrud\CrudAsset;
use johnitvn\ajaxcrud\BulkButtonWidget;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\KategoriArtikelSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Kategori Artikels';
$this->params['breadcrumbs'][] = $this->title;

CrudAsset::register($this);

?>
<style>
    .kv-grid-container {
        overflow-x: hidden;
    }
</style>
<div class="kategori-artikel-index">
    <div id="ajaxCrudDatatable">
        <?= GridView::widget([
            'id' => 'crud-datatable',
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'pjax' => true,
            'options' => [
                'class' => 'panel-body panel-collapse table-flip-scroll',
            ],
            'columns' => require(__DIR__ . '/_columns.php'),
            'toolbar' => [
                // ['content'=>

                //     Html::a('<i class="glyphicon glyphicon-repeat"></i>', [''],
                //     ['data-pjax'=>1, 'class'=>'btn btn-default', 'title'=>'Reset Grid']).
                //     '{toggleData}'.
                //     '{export}'
                // ],
            ],
            'striped' => true,
            'condensed' => true,
            'responsive' => true,
            'panel' => [
                'type' => 'primary',
                'heading' => '<i class="glyphicon glyphicon-list"></i> Kategori Artikels listing',
                'before' =>  Html::a(
                    '<i class="glyphicon glyphicon-plus"></i> Tambah Data',
                    ['create'],
                    ['role' => 'modal-remote', 'title' => 'Tambah Kategori Artikels', 'class' => 'btn btn-primary']
                ),
                'after' => ''
            ]
        ]) ?>
    </div>
</div>
<?php Modal::begin([
    "id" => "ajaxCrudModal",
    "footer" => "", // always need it for jquery plugin
]) ?>
<?php Modal::end(); ?>