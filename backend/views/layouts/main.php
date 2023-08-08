<?php

/** @var \yii\web\View $this */
/** @var string $content */

use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;
use yii\widgets\ActiveForm;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">

<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>

<body class="d-flex flex-column h-100">
    <?php $this->beginBody() ?>


    <div id="app">
        <div class="main-wrapper">
            <?= $this->render('header') ?>
            <?= $this->render('sidebar') ?>
            <!-- <div class="container"> -->
            <div class="main-content">
                <?= Alert::widget() ?>
                <?= $content ?>
            </div>
            <?= $this->render('footer') ?>
        </div>
    </div>


    <?php $this->endBody() ?>
</body>

</html>
<?php $this->endPage();
