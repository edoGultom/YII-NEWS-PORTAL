<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Halaman */
?>
<div class="halaman-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'nama',
            'judul',
            'sub_judul',
            'isi:ntext',
            'format_halaman',
            'id_user',
            'status',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
