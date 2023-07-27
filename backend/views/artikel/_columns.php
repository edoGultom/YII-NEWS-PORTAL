<?php
use yii\helpers\Url;

return [
    // [
    //     'class' => 'kartik\grid\CheckboxColumn',
    //     'width' => '20px',
    // ],
    [
        'class' => 'kartik\grid\SerialColumn',
        'width' => '30px',
    ],
        // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'id',
    // ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'judul',
    ],
    // [
    //     'class'=>'\kartik\grid\DataColumn',
    //     'attribute'=>'sub_judul',
    // ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'Aktif',
        'value' => function($model) {
            if($model->aktif === 1) {
                return "Yes";
            } else if($model->aktif === 0) {
                return "No";
            }
        }
    ],

    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'kategori',
        'filter' => $kategori,
        'label' => 'Kategori',
        'value'=> function($model) {
            if ($model->kategoriArtikel){
                return $model->kategoriArtikel->keterangan;
            }
            return '';
        },
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'tag',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'label'=>'Tanggal Posting',
        'attribute'=>'created_at',
        'value'=>function($model){
            return date('d  M Y', $model->created_at);
        }
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'Oleh',
        'value'=>'postingBy.username'
    ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'gambar',
    // ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'gambart_thumbnail',
    // ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'keterangan_gambar',
    // ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'tag',
    // ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'id_user',
    // ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'created_at',
    // ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'updated_at',
    // ],
    [
        'class' => 'kartik\grid\ActionColumn',
        'dropdown' => false,
        'vAlign'=>'middle',
        'urlCreator' => function($action, $model, $key, $index) use ($idkategori){
                return Url::to([$action,'id'=>$key, 'idkategori'=>$idkategori]);
        },
        'viewOptions'=>['role'=>'modal-remote','title'=>'View','data-toggle'=>'tooltip'],
        'updateOptions'=>['data-pjax'=>'0','title'=>'Update', 'data-toggle'=>'tooltip'],
        'deleteOptions'=>['role'=>'modal-remote','title'=>'Delete',
                          'data-confirm'=>false, 'data-method'=>false,// for overide yii data api
                          'data-request-method'=>'post',
                          'data-toggle'=>'tooltip',
                          'data-confirm-title'=>'Are you sure?',
                          'data-confirm-message'=>'Are you sure want to delete this item'],
    ],

];