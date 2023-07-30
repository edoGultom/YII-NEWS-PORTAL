<?php
use yii\helpers\Html;
use yii\helpers\Url;
$this->registerCssFile("@web/css/halaman.css", [
    'depends' => [\yii\bootstrap\BootstrapAsset::className()],
]);
?>
 <div id="notfound">
		<div class="notfound">
			<div class="notfound-bg">
				<div></div>
				<div></div>
				<div></div>
			</div>
			<h1>#<?= $exception->statusCode ?></h1>
            <h3 class="text-uppercase error-subtitle">MAAF!!!</h3>
			<p class="text-muted m-t-30 m-b-30"><?= $exception->getMessage() ?></p>
			<a  href="<?= Url::to(['site/logout']) ?>" data-method='POST'>Home</a>
			
		</div>
	</div>