<?php

/** @var yii\web\View $this */
/** @var string $name */
/** @var string $message */
/** @var Exception $exception*/

use yii\helpers\Html;

$this->title = $name;
$statusCode = Yii::$app->response->statusCode;

?>
<div class="page-inner">
    <h1><?= $statusCode ?></h1>
    <div class="page-description">
        <?= nl2br(Html::encode($message)) ?>
    </div>
    <div class="page-search">
        <div class="mt-3">
            <a href="/admin" class="btn btn-primary">Back to Home</a>
        </div>
    </div>
</div>