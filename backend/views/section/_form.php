<?php

use common\models\SectionKategori;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model common\models\Section */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="section-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php
    echo $form->field($model, 'id_kategori')->widget(Select2::classname(), [
        'data' => Arrayhelper::map(SectionKategori::find()->all(), 'id', 'keterangan'),
        'language' => 'en',
        'options' => ['placeholder' => 'Select a Section Kategori ...'],
        'pluginOptions' => [
            'allowClear' => true,
            'dropdownParent' => new yii\web\JsExpression('$("#ajaxCrudModal")'),
            'disabled' => (isset($model->id_kategori) ? 'disabled' : '')

        ],
    ]);
    ?>
    <?= $form->field($model, 'keterangan')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'link')->textarea(['rows' => 6]) ?>


    <?php if (!Yii::$app->request->isAjax) { ?>
        <div class="form-group">
            <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>
    <?php } ?>

    <?php ActiveForm::end(); ?>

</div>