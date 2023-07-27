<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\KategoriArtikel */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="kategori-artikel-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'keterangan')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'status')->radioList(['1' => 'Utama', '2' => 'Lainnya']) ?>

  
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
