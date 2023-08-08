<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\Slider;
use kartik\select2\Select2;
/* @var $this yii\web\View */
/* @var $model common\models\SliderItem */
/* @var $form yii\widgets\ActiveForm */

$disable = ($idslider) ? true : false;
?>

<div class="slider-item-form">

    <?php $form = ActiveForm::begin(); ?>


    <?php
    echo $form->field($model, 'id_slider')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(Slider::find()->all(), 'id', 'nama_slider'),
        'language' => 'en',
        'options' => ['placeholder' => 'Select a state ...'],
        'pluginOptions' => [
            'allowClear' => true,
            'disabled' => $disable
        ],
    ]);
    ?>
    <?= (isset($idslider)) ? '<p class="m-0">Panduan ukuran : </p> <img src="/images/main-slider/1.jpg" alt="" width="100%" height="150"  class="mb-2"/>' : '' ?>

    <?=
    Html::img(['/file', 'id' => $model->gambar], ['width' => '100']) ?>

    <?= $form->field($model, 'file')->fileInput(); ?>

    <?= $form->field($model, 'nama_slider')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'captions')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'aktif')->radioList(['1' => 'Ya', '0' => 'Tidak'], ['unselect' => null]) ?>

    <?php if (!Yii::$app->request->isAjax) { ?>
        <div class="form-group">
            <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>
    <?php } ?>

    <?php ActiveForm::end(); ?>

</div>