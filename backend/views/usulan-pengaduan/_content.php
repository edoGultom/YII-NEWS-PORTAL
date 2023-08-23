<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap\Modal;
use kartik\grid\GridView;
use johnitvn\ajaxcrud\CrudAsset;
use johnitvn\ajaxcrud\BulkButtonWidget;
use yii\widgets\LinkPager;
use yii\bootstrap4\ActiveForm;

CrudAsset::register($this);
$path = $content->user ? Url::to(['usulan-pengaduan/profile?path=' . $content->user->profile_photo_path])  : '/admin/images/avatar/avatar-5.png';
?>
<div class="ticket-content">
    <div class="ticket-header">
        <div class="ticket-sender-picture img-shadow">
            <img src="<?= $path ?>" alt="image">
        </div>
        <div class="ticket-detail">
            <div class="ticket-title">
                <h4><?= $content->subjek ?></h4>
            </div>
            <div class="ticket-info">
                <div class="font-weight-600"><?= $content->user->name ?? 'no_user' ?></div>
                <div class="bullet"></div>
                <div class="text-primary font-weight-600"><?= Yii::$app->formatter->asDate($content->tgl_pengaduan, 'php:d F Y') ?></div>
            </div>
        </div>
    </div>
    <div class="ticket-description">
        <p><?= $content->isi ?></p>

        <div class="gallery">
            <div class="gallery-item" data-image="<?= Url::to(['/document/get-file', 'id' => $content->id_file]) ?>" data-title="Image 1"></div>
        </div>

        <div class="ticket-divider"></div>

        <div class="ticket-form">
            <?php $form = ActiveForm::begin([
                'id' => 'form-artikel',
            ]); ?>
            <div class="form-group">
                <?= $form->field($model, 'tanggapan')->textarea(['class' => 'summernote form-control', 'placeholder' => "Type a reply ..."])->label(false) ?>
            </div>
            <div class="form-group text-right">
                <button class="btn btn-primary btn-lg">
                    Balas
                </button>
            </div>
            <?php ActiveForm::end(); ?>

        </div>
    </div>
</div>