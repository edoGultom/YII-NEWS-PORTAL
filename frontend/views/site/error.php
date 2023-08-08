<?php

/** @var yii\web\View $this */
/** @var string $name */
/** @var string $message */
/** @var Exception $exception*/

use yii\helpers\Html;

$this->title = $name;
$statusCode = Yii::$app->response->statusCode;

?>
<div class="error-big-text"><?= $statusCode ?></div>
<h2>Opps!! Looks like somthing went wrong</h2>
<div class="text"> <?= nl2br(Html::encode($message)) ?>.</div>
<div class="error-options">
    <a href="/" class="theme-btn btn-style-four">Go Home</a>
</div>