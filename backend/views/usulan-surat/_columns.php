<?php

use kartik\date\DatePicker;
use toriphes\lazyload\LazyLoad;
use yii\helpers\Html;
use yii\helpers\Url;

return [
    [
        'class' => 'kartik\grid\SerialColumn',
        'width' => '30px',
    ],
    // [
    // 'class'=>'\kartik\grid\DataColumn',
    // 'attribute'=>'id',
    // ],
    [
        'class' => '\kartik\grid\DataColumn',
        'header' => 'Jenis Surat',
        'attribute' => 'jenisSurat.jenis',
    ],
    [
        'class' => '\kartik\grid\DataColumn',
        'header' => 'User',
        'attribute' => 'name',
        'value' => function ($model) {
            return  $model->user->name ?? '-';
        },
    ],

    [
        'class' => '\kartik\grid\DataColumn',
        'format' => 'raw',
        'header' => 'File',
        'value' => function ($model) {
            return
                LazyLoad::widget([
                    'src' => Url::to(['/document/get-file', 'id' =>  $model->id_file]),
                    'cssClass' => 'w-100 '
                ]);
        },
    ],

    [
        'class' => '\kartik\grid\DataColumn',
        'attribute' => 'keterangan',
    ],
    [
        'class' => '\kartik\grid\DataColumn',
        'header' => 'Status',
        'format' => 'raw',
        'value' => function ($model) {
            $tanggal =  '<span class="text-muted">Tanggal :</span> 
            <span style="margin-top:-10px">' . Yii::$app->formatter->asDate($model->tanggal, 'php:d F Y') . '</span>';
            $label =  '<span class="text-muted mt-2">Status :</span> ' . $model->tahap;

            return $tanggal . '<br/>' . $label;
        },
    ],
    [
        'class' => 'kartik\grid\ActionColumn',
        'header' => '',
        'width' => '20%',
        'template' => '{reset}{selesai}',
        'buttons' => [
            "reset" => function ($url, $model, $key) {
                if ($model->status == 1) {
                    return  Html::a('<i class="fa-2x fa-solid fa-square-check wd-12 ht-12 stroke-wd-3 "></i> Terima ', ['terima', 'id' => $model->id], [
                        'class' => 'btn btn-success btn-block ',
                        'role' => 'modal-remote', 'title' => 'Terima',
                        'data-confirm' => false, 'data-method' => false, // for overide yii data api
                        'data-request-method' => 'post',
                        'data-toggle' => 'tooltip',
                        'data-confirm-title' => 'Terima',
                        'data-confirm-ok' => 'Yakin',
                        'data-confirm-cancel' => 'Kembali',
                        'data-confirm-message' => 'Apakah kamu yakin ingin menerima usulan ini?'
                    ]) .
                        Html::a('<i class="fa-2x fa-solid fa-circle-xmark  stroke-wd-3"></i> Tolak', ['tolak', 'id' => $model->id], ['class' => 'btn btn-danger btn-block', 'role' => "modal-remote", 'role' => 'modal-remote', 'title' => 'Reset', 'data-toggle' => 'tooltip']);
                }
            },
            "selesai" => function ($url, $model, $key) {
                if ($model->status == 2) {
                    return  Html::a('<i class="fa-2x fa-solid fa-square-check"></i> Selesai ', ['selesai', 'id' => $model->id], [
                        'class' => 'btn btn-info btn-block ',
                        'role' => 'modal-remote', 'title' => 'Selesai',
                        'data-confirm' => false, 'data-method' => false, // for overide yii data api
                        'data-request-method' => 'post',
                        'data-toggle' => 'tooltip',
                        'data-confirm-title' => 'Selesai',
                        'data-confirm-ok' => 'Yakin',
                        'data-confirm-cancel' => 'Kembali',
                        'data-confirm-message' => 'Apakah kamu yakin usulan ini sudah selesai ???'
                    ]);
                }
            },
        ],
        'vAlign' => 'middle',

    ],
];
