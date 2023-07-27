<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap\Modal;
use kartik\grid\GridView;
// use johnitvn\ajaxcrud\CrudAsset;
// use johnitvn\ajaxcrud\BulkButtonWidget;
use backend\assets\CrudAsset;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ArtikelSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Artikel';
$this->params['breadcrumbs'][] = $this->title;

CrudAsset::register($this);
$this->registerJsFile(
    '@web/js/ajax_tag.js',
    ['depends' => [\yii\web\JqueryAsset::className()]]
);
?>
<style>
    .kv-grid-container {
        overflow-x: hidden;
    }
</style>
<div class="artikel-index">
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
                'type' => 'warning',
                'heading' => '<i class="glyphicon glyphicon-list"></i> <span class="text-white">Artikels listing</span>',
                'before' =>
                Html::a(
                    '<i class="glyphicon glyphicon-plus"></i> Tambah Data',
                    ['create', 'idkategori' => $idkategori],
                    ['title' => 'Tambah Artikels', 'class' => 'btn btn-warning', 'data-pjax' => 0]
                ),
                'after' => '' .
                    '<div class="clearfix"></div>',
            ]
        ]) ?>
    </div>
</div>
<?php Modal::begin([
    "id" => "ajaxCrudModal",
    "footer" => "", // always need it for jquery pluginphp
    'options' => ['tabindex' => false],
]) ?>
<?php Modal::end(); ?>