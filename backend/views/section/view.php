<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Section */
?>
<div class="section-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'id_kategori',
            'keterangan:ntext',
            'link:ntext',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
