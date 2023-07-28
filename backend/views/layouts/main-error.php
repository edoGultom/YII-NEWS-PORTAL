<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use backend\assets\AppAsset;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">

<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>

<body class="horizontal">
    <?php $this->beginBody() ?>

    <section class="section">
        <div class="container mt-5">
            <div class="page-error">
                <?= $content ?>
            </div>
            <!-- <div class="simple-footer mt-5">
          Copyright &copy; Stisla 2018
        </div> -->
        </div>
    </section>
    <?php $this->endBody() ?>
</body>

</html>
<?php $this->endPage() ?>