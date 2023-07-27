<?php

use yii\helpers\Inflector;
use yii\helpers\StringHelper;
use yii\bootstrap\Modal;
use yii\helpers\Url;
use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $generator yii\gii\generators\crud\Generator */

$urlParams = $generator->generateUrlParams();
$nameAttribute = $generator->getNameAttribute();
echo "<?php\n";
?>
use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap4\Modal;
use kartik\grid\GridView;
/* use johnitvn\ajaxcrud\CrudAsset; */
use frontend\assets\CrudAsset;
use johnitvn\ajaxcrud\BulkButtonWidget;

/* @var $this yii\web\View */
<?= !empty($generator->searchModelClass) ? "/* @var \$searchModel " . ltrim($generator->searchModelClass, '\\') . " */\n" : '' ?>
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title =
<?= $generator->generateString(Inflector::camel2words(StringHelper::basename($generator->modelClass))) ?>;
$this->params['breadcrumbs'][] = $this->title;

CrudAsset::register($this);

?>
<section class="section">
    <div class="section-header ">
        <h1 class="mr-5">
            <?= "<?=" ?>$this->title <?= "?>\n" ?>
        </h1>
        <div>
            <?= "<?=" ?>Html::a(
            '<i class="fa fa-circle-plus"></i> Tambah Data',
            ['create'],
            ['class' => 'btn btn-success font-weight-normal', 'role' => 'modal-remote']
            )<?= "?>\n" ?>
        </div>
    </div>
</section>
<div class="row">
    <div class="col-md-12">
        <div id="ajaxCrudDatatable">
            <div id="table-responsive">
                <?= "<?=" ?>GridView::widget([
                'id'=>'crud-datatable',
                'pager' => [
                'firstPageLabel' => 'Awal',
                'lastPageLabel' => 'Akhir'
                ],
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'pjax'=>true,
                'columns' => require(__DIR__.'/_columns.php'),
                'toolbar'=> [
                ['content'=>
                Html::a('<i class="fa fa-repeat"></i> ', [''],
                ['data-pjax'=>1, 'class'=>'btn btn-default', 'title'=>'Reset Grid']).
                '{toggleData}'
                // .'{export}'
                ],
                ],
                'striped' => true,
                'condensed' => true,
                'responsive' => true,
                'panel' => [
                'before'=> "",
                ]
                ])<?= "?>\n" ?>
            </div>
        </div>
    </div>
</div>
<?= '<?php Modal::begin([
    "id"=>"ajaxCrudModal",
    "footer"=>"",// always need it for jquery plugin
])?>' . "\n" ?>
<?= '<?php Modal::end(); ?>' ?>