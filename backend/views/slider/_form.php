<?php

use common\models\SectionKategori;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model common\models\Slider */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="slider-form">

	<?php $form = ActiveForm::begin(); ?>

	<?php
	echo $form->field($model, 'id_section')->widget(Select2::classname(), [
		'data' => ArrayHelper::map(SectionKategori::find()->all(), 'id', 'keterangan'),
		'language' => 'en',
		'options' => ['placeholder' => 'Select a Section ...'],
		'pluginOptions' => [
			'allowClear' => true,
		],
	]);
	?>
	<?= $form->field($model, 'nama_slider')->textarea(['rows' => 6]) ?>

	<?php if (!Yii::$app->request->isAjax) { ?>
		<div class="form-group">
			<?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
		</div>
	<?php } ?>

	<?php ActiveForm::end(); ?>

</div>