<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Artikel */
?>
<div class="artikel-update">

    <?= $this->render('_form', [
        'model' => $model,
        'idkategori' => $idkategori,
        'title' => $title,
        'tags' => $tags
    ]) ?>
</div>