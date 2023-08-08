<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\KategoriArtikel */
?>
<div class="kategori-artikel-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'keterangan',
            'id_user',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
