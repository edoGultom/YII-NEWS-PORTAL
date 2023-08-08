<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap\Modal;
use kartik\grid\GridView;
use johnitvn\ajaxcrud\CrudAsset; 
use johnitvn\ajaxcrud\BulkButtonWidget;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\SliderSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Sliders';
$this->params['breadcrumbs'][] = $this->title;

CrudAsset::register($this);
$js = <<<JS
    $('.top').click(function() {
        var url = $(this).data('url');
        var status = 0;
        if($(this).is(":checked")) {
            status = 1;
        }else{
            status = 0;
        }

        $.ajax({
            type: "POST",
            url:url,
            data:{status:status},
            success: function(isi){
            },
            error: function(){
            }
        });
    });
JS;
$this->registerJs($js);
?>
<style>
.switch {
    position: relative;
    display: inline-block;
    width: 60px;
    height: 34px;
}

.switch input {
    opacity: 0;
    width: 0;
    height: 0;
}

.slider {
    position: absolute;
    cursor: pointer;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: #ccc;
    -webkit-transition: .4s;
    transition: .4s;
}

.slider:before {
    position: absolute;
    content: "";
    height: 26px;
    width: 26px;
    left: 4px;
    bottom: 4px;
    background-color: white;
    -webkit-transition: .4s;
    transition: .4s;
}

input:checked+.slider {
    background-color: #2196F3;
}

input:focus+.slider {
    box-shadow: 0 0 1px #2196F3;
}

input:checked+.slider:before {
    -webkit-transform: translateX(26px);
    -ms-transform: translateX(26px);
    transform: translateX(26px);
}
</style>
<section class="section">
    <div class="section-header d-flex justify-content-between ">
        <h1 class="mr-5">
            <?= $this->title ?>
        </h1>
        <div>
            <?= Html::a(
                '<i class="fa fa-circle-plus"></i> Tambah Data',
                ['create'],
                ['class' => 'btn btn-success', 'role' => 'modal-remote']
            ) ?>
        </div>
    </div>
</section>
<div class="slider-index">
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
    "id"=>"ajaxCrudModal",
    "footer"=>"",// always need it for jquery plugin
])?>
<?php Modal::end(); ?>