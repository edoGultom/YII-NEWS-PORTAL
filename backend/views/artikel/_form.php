<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

use dosamigos\ckeditor\CKEditor;
use yii\helpers\ArrayHelper;
use common\models\KategoriArtikel;
use common\models\RefKategori;
use kartik\select2\Select2;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $model common\models\Artikel */
/* @var $form yii\widgets\ActiveForm */

$disable = ($idkategori) ? true : false;
$this->registerJsFile(
    '@web/js/ajax_tag.js',
    ['depends' => [\yii\web\JqueryAsset::className()]]
);



$url = ($model->gambar) ? (Url::to(['/document/get-file', 'id' => $model->gambar])) : '';
$url2 = ($model->gambart_thumbnail) ? (Url::to(['/document/get-file', 'id' => $model->gambart_thumbnail])) : '';

// var_dump($url);
// exit;
if ($model->ambilgambar && $model->ambilgambar->type == 'application/pdf') {
    $content1 =  '<iframe id="prev-img" src="' .  $url . '" style="display:none;"></iframe>';
    $content2 = '<iframe id="prev-img-thumb" src="' . $url2 . '" style="display:none"></iframe>';
} else {
    $content1 =  '<img id="prev-img" src="' .  $url . '" style="display:none;width:100px;height:100px;"></img>';
    $content2 = '<img id="prev-img-thumb" src="' . $url2 . '" style="display:none;width:100px;height:100px;"></img>';
}
?>
<section class="section">
    <div class="section-header d-flex">
        <h1 class="mr-5">
            <?= $title ?>
        </h1>

    </div>
</section>
<div class="artikel-form">
    <div class="card p-5 rounded">
        <?php $form = ActiveForm::begin([
            'id' => 'form-artikel',
        ]); ?>

        <?= $form->field($model, 'judul')->textInput(['maxlength' => true]) ?>

        <?php // $form->field($model, 'sub_judul')->textInput(['maxlength' => true]) 
        ?>

        <?php
        echo $form->field($model, 'kategori')->widget(Select2::classname(), [
            'data' => ArrayHelper::map(RefKategori::find()->all(), 'id', 'keterangan'),
            'language' => 'en',
            'options' => ['placeholder' => 'Select a state ...'],
            'pluginOptions' => [
                'allowClear' => true,
                'disabled' => $disable
            ],
        ]);
        ?>

        <?php
        $model->baru = 1;
        $model->aktif = 1;
        ?>
        <?= $form->field($model, 'baru')->radioList(['1' => 'Ya', '0' => 'Tidak '], ['unselect' => null]) ?>

        <?= $form->field($model, 'aktif')->radioList(['1' => 'Ya', '0' => 'Tidak '], ['unselect' => null]) ?>

        <?= $form->field($model, 'isi')->widget(CKEditor::className(), [
            'options' => ['rows' => 6],
            'preset' => 'advanced'
        ]) ?>

        <?= $content1 ?>
        <?= $content2 ?>

        <?= $form->field($model, 'file')->fileInput(['multiple' => true, 'id' => 'file-upload-img']); ?>

        <?= $form->field($model, 'keterangan_gambar')->textInput(['maxlength' => true]) ?>

        <label class="control-label" for="artikel-tag"> Tag</label>
        <input type="text" id="tag" class="form-control tag-form" name="tag" maxlength="255"
            placeholder="Press enter after entry" aria-invalid="false" onkeyup='tambahtag(event)'>
        <!-- <button type="button" id="btn-tambah-tag">Tambah tag</button> -->
        <div id='tag-wrap' style="margin-top: 2px;">
            <?php if (count($tags) > 0) : ?>
            <?php foreach ($tags as $tag) : ?>
            <div class="tag badge badge-pill badge-primary">
                <span class="txt-tag"><?= $tag ?></span>
                <span style="color: black; font-weight: bold; cursor: pointer; padding-left: 3px;"
                    onClick="hapustag('<?= $tag ?>')">x<span>
            </div>
            <?php endforeach; ?>
            <?php endif; ?>
        </div>

        <?= $form->field($model, 'tag')->hiddenInput(['maxlength' => true])->label(false) ?>

        <?= $form->field($model, 'tanggalF')->textInput(['maxlength' => true, 'type' => 'date', 'value' => date('Y-m-d')])->label('Tanggal') ?>
        <?php if (!Yii::$app->request->isAjax) { ?>
        <div class="form-group">
            <?= Html::Button($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary', 'id' => 'submit-form']) ?>
        </div>
        <?php } ?>

        <?php ActiveForm::end(); ?>
    </div>
</div>
<?php
$this->registerJs(<<<JS
    const fileUploadImg = $("#file-upload-img");
    const prevImg = $("#prev-img");
    const prevThumb = $("#prev-img-thumb");

    if(prevImg.attr("src")){
        prevImg.show();
    }

    if(prevThumb.attr("src")){
        prevThumb.show();
    }

    fileUploadImg.on('change', function(e) {
        const urlImg = window.URL.createObjectURL(this.files[0]);
        prevImg.attr('src', urlImg);
        prevThumb.attr('src', urlImg);
        prevImg.show();
        prevThumb.show();
    });

    $('#submit-form').click(function() {
        $('#form-artikel').submit();

    });
JS);
?>