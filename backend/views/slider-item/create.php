<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\SliderItem */

?>
<div class="slider-item-create">
    <?= $this->render('_form', [
        'model' => $model,
        'idslider' => $idslider,

    ]) ?>
</div>