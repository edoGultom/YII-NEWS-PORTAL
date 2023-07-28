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
        'width' => '5%',
    ],
    // [
    // 'class'=>'\kartik\grid\DataColumn',
    // 'attribute'=>'id',
    // ],
    [
        'class' => '\kartik\grid\DataColumn',
        'width' => '20%',
        'attribute' => 'username',
    ],

    [
        'class' => '\kartik\grid\DataColumn',
        'width' => '20%',
        'attribute' => 'email',
    ],
    [
        'class' => 'kartik\grid\ActionColumn',
        'header' => '',
        'width' => '20%',
        'template' => '{reset}',
        'buttons' => [
            "reset" => function ($url, $model, $key) {
                return Html::a('Reset Password', ['pengguna/reset-password', 'id' => $model->id], ['class' => 'btn btn-info btn-block', 'data-pjax' => "0", 'role' => 'modal-remote', 'title' => 'Reset', 'data-toggle' => 'tooltip']) . Html::a('Hak Akses', ['pengguna/hakakses', 'id' => $model->id], ['class' => 'btn btn-info btn-block', 'data-pjax' => "0", 'role' => 'modal-remote', 'title' => 'Hak Akses', 'data-toggle' => 'tooltip']);
            },

        ],
        'vAlign' => 'middle',

    ],

    [
        'class' => 'kartik\grid\ActionColumn',
        'dropdown' => false,
        'width' => '5%',
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
