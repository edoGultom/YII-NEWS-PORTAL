<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Pengguna */
?>
<div class="pengguna-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'username',
            'email:email',
            'status',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
