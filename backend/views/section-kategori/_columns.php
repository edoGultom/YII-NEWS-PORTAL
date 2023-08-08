<?php

use yii\helpers\Url;
use yii\helpers\Html;

return [
    // [
    //     'class' => 'kartik\grid\CheckboxColumn',
    //     'width' => '20px',
    // ],
    [
        'class' => 'kartik\grid\SerialColumn',
        'width' => '30px',
    ],
    [
        'class' => '\kartik\grid\DataColumn',
        'attribute' => 'keterangan',
    ],


    [
        'class' => 'kartik\grid\ActionColumn',
        'header' => 'Aksi',
        'width' => '130px',
        'template' => '{section}',
        'buttons' => [
            "section" => function ($url, $model, $key) {
                return Html::a('<span class="fas fa-circle-plus"></span> Section', ['section/index', 'id_kategori' => $model->id], ['class' => 'btn btn-info btn-block', 'role' => 'modal-remote', 'title' => 'Section', 'data-toggle' => 'tooltip']);
            },

        ],
        'vAlign' => 'middle',

    ],

];
