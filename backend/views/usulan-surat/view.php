<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\TaPengusulanSurat */
?>
<div class="ta-pengusulan-surat-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'id_jenis_surat',
            'jenis_surat',
            'tanggal',
            'id_file',
            'keterangan:ntext',
            'status',
            'id_user',
        ],
    ]) ?>

</div>
