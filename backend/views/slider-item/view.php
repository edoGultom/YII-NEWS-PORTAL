<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\SliderItem */
?>
<div class="slider-item-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'id_slider',
            'gambar',
            'nama_slider',
            'captions:ntext',
            'id_user',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
