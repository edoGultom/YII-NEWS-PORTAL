<?php

use yii\helpers\Url;
use yii\helpers\Html;


return [

    [
        'class' => 'kartik\grid\SerialColumn',
        'width' => '30px',
    ],
    // [
    // 'class'=>'\kartik\grid\DataColumn',
    // 'attribute'=>'id',
    // ],
    // [
    //     'class'=>'\kartik\grid\DataColumn',
    //     'attribute'=>'id_slider',
    // ],
    // [
    //     'class'=>'\kartik\grid\DataColumn',
    //     'attribute'=>'gambar',
    // ],
    [
        'class' => '\kartik\grid\DataColumn',
        'attribute' => 'nama_slider',
    ],
    [
        'class' => '\kartik\grid\DataColumn',
        'attribute' => 'captions',
    ],
    [
        'attribute' => 'logo',
        'class' => '\kartik\grid\DataColumn',
        'format' => 'raw',
        'label' => 'Image',
        'headerOptions' => ['class' => 'text-center', 'style' => 'color:green',],
        'value' => function ($model) {
            // return Html::img(['/file','id'=>$model->gambar],
            //     ['width' => '200px']);
            // },
            return Html::img(
                '/file?id=' . $model->gambar,
                ['width' => '200px']
            );
        },
        'contentOptions' => ['style' => 'width: 200px;', 'class' => 'text-left'],
    ],
    [
        'class' => '\kartik\grid\DataColumn',
        'attribute' => 'aktif',
        'width' => '10px',
        'value' => function ($model) {
            if ($model->aktif == 1) {
                return "Aktif";
            } else {
                return "Tidak Aktif";
            }
        }
    ],
    // [
    //     'class' => '\kartik\grid\DataColumn',
    //     'attribute' => 'id_induk',
    //     'header' => 'induk',
    //     'value' => function ($model) {
    //         if ($model->id_induk == 0 || $model->id_induk == null) {
    //             return "Induk";
    //         } else {
    //             return "Anak";
    //         }
    //     }
    // ],
    // [
    // 'class'=>'\kartik\grid\DataColumn',
    // 'attribute'=>'updated_at',
    // ],
    [
        'class' => 'kartik\grid\ActionColumn',
        'dropdown' => false,
        'vAlign' => 'middle',
        'urlCreator' => function ($action, $model, $key, $index) use ($idslider) {
            return Url::to([$action, 'id' => $key, 'idslider' => $idslider]);
        },
        'viewOptions' => ['role' => 'modal-remote', 'title' => 'View', 'data-toggle' => 'tooltip'],
        'updateOptions' => ['role' => 'modal-remote', 'title' => 'Update', 'data-toggle' => 'tooltip'],
        'deleteOptions' => [
            'role' => 'modal-remote', 'title' => 'Delete',
            'data-confirm' => false, 'data-method' => false, // for overide yii data api
            'data-request-method' => 'post',
            'data-toggle' => 'tooltip',
            'data-confirm-title' => 'Are you sure?',
            'data-confirm-message' => 'Are you sure want to delete this item'
        ],
    ],

];