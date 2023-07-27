<?php

use yii\helpers\Url;

return [

    [
        'class' => 'kartik\grid\SerialColumn',
        'width' => '30px',
    ],

    [
        'class' => '\kartik\grid\DataColumn',
        'attribute' => 'judul',
    ],
    [
        'class' => '\kartik\grid\DataColumn',
        'label' => 'Tanggal Post',
        'attribute' => 'created_at',
        'value' => function ($model) {
            return date('d M Y', $model->created_at);
        }
    ],

    [
        'class' => '\kartik\grid\DataColumn',
        'attribute' => 'Link',
        'value' => function ($model) {
            return '/halaman/' . $model->sub_judul;
        }
    ],
    [
        'class' => '\kartik\grid\DataColumn',
        'attribute' => 'Diposting Oleh',
        'value' => function ($model) {
            return $model->postingBy->username;
        }
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
                        <input type="checkbox" ' . $check . ' class="top" data-url=' . Url::to(['halaman/status', 'id' => $model->id]) . '>
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
