<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Artikel */

?>
<div class="artikel-create">
    <?= $this->render('_form', [
        'model' => $model,
        'idkategori' => $idkategori,
        'title' => $title,
        'tags' => []
    ]) ?>
</div>