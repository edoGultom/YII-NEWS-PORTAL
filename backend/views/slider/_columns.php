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
    [
        'class' => '\kartik\grid\DataColumn',
        'width' => '100px',
        'attribute' => 'section.keterangan',
    ],
    [
        'class' => '\kartik\grid\DataColumn',
        'width' => '700px',
        'attribute' => 'nama_slider',
    ],
    [
        'class' => 'kartik\grid\ActionColumn',
        'header' => '',
        'template' => '{slideritem}',
        'buttons' => [
            "slideritem" => function ($url, $model, $key) {
                return Html::a('Slider Item', ['slider-item/', 'idslider' => $model->id], ['class' => 'btn btn-info btn-block', 'data-pjax' => "0"]);
            },

        ],
        'vAlign' => 'middle',
    ],
    [
        'class' => 'kartik\grid\ActionColumn',
        'header' => 'Status',
        'template' => '{toggle}',
        'buttons' => [
            "toggle" => function ($url, $model, $key) {
                $check = $model->status === 1 ? 'checked' : '';
                return '
                    <label class="onof switch">
                        <input type="checkbox" ' . $check . ' class="top" data-url=' . Url::to(['status', 'id' => $model->id]) . '>
                        <span class="slider round"></span>
                    </label>
                ';
            },
        ]
    ],
    [
        'class' => 'kartik\grid\ActionColumn',
        'dropdown' => false,
        'vAlign' => 'middle',
        'urlCreator' => function ($action, $model, $key, $index) {
            return Url::to([$action, 'id' => $key]);
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
