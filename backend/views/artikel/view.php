<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Artikel */
?>
<div class="artikel-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'judul',
            'sub_judul',
            'kategori',
            'baru',
            'aktif',
            'isi:ntext',
            'gambar',
            'gambart_thumbnail',
            'keterangan_gambar',
            'tag',
            'id_user',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
