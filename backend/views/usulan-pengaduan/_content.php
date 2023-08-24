<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap\Modal;
use kartik\grid\GridView;
use johnitvn\ajaxcrud\CrudAsset;
use johnitvn\ajaxcrud\BulkButtonWidget;
use yii\widgets\LinkPager;
use yii\widgets\Pjax;
use yii\bootstrap4\ActiveForm;

$path = $content->user ? Url::to(['usulan-pengaduan/profile?path=' . $content->user->profile_photo_path])  : '/admin/images/avatar/avatar-5.png';
?>

<div class="ticket-content">
    <div class="ticket-header">
        <div class="ticket-sender-picture img-shadow">
            <img src="<?= $path ?>" alt="image">
        </div>

        <div class="d-flex w-100">
            <div class="ticket-detail flex-grow-1">
                <div class="ticket-title">
                    <h4><?= $content->subjek ?></h4>
                </div>
                <div class="ticket-info">
                    <div class="font-weight-600"><?= $content->user->name ?? 'no_user' ?></div>
                    <div class="bullet"></div>
                    <div class="text-primary font-weight-600"><?= Yii::$app->formatter->asDate($content->tgl_pengaduan, 'php:d F Y') ?></div>
                </div>
            </div>
            <div class="float-right">
                <?= Html::a(
                    '<i class="fas fa-close"></i> Close',
                    ['slider-item/', 'idslider' => $content->id],
                    [
                        'role' => 'modal-remote',
                        'class' => 'my-2 btn btn-danger d-block',
                        'data-confirm' => false, 'data-method' => false, // for overide yii data api
                        'data-request-method' => 'post',
                        'data-toggle' => 'tooltip',
                        'data-confirm-title' => 'Apakah anda yakin?',
                        'data-confirm-message' => 'Apakah Anda Yakin ingin menutup laporan pengaduan ini ???',
                    ]
                ); ?>
            </div>
        </div>
    </div>

    <div class="ticket-description">
        <p><?= $content->isi ?></p>
        <div class="gallery">
            <div class="gallery-item" data-image="<?= Url::to(['/document/get-file', 'id' => $content->id_file]) ?>" data-title="Image 1"></div>
        </div>
        <div class="media-links text-right">
            <!-- <a href="#komentar" class="text-muted btn-replay"> <i class="fa-solid fa-reply"></i> Balas</a> -->
            <?= Html::a('<i class="fa-solid fa-reply"></i> Balas', ['index'], ['class' => 'text-muted btn-replay']); ?>
        </div>
        <div class="ticket-divider"></div>
        <?php
        if (!empty($content->tanggapan)) {
        ?>
            <div class="card-body">

                <ul class="list-unstyled list-unstyled-border list-unstyled-noborder">
                    <?php
                    foreach ($content->tanggapan as $key => $tanggapan) {
                    ?>
                        <li class="media">
                            <img alt="image" class="mr-3 rounded" width="45" height="45" src="<?= $path ?>" style="">
                            <div class="media-body">
                                <div class="media-title mb-1"><?= $tanggapan->user->name ?? 'no_user' ?></div>
                                <div class="text-time"><?= Yii::$app->formatter->asDate($tanggapan->tgl_tanggapan, 'php:d F Y') ?></div>
                                <div class="media-description text-muted"><?= $tanggapan->tanggapan ?></div>
                                <div class="media-links">
                                    <?= Html::a('<i class="fa-solid fa-edit"></i> Ubah', ['index', 'idTanggapan' => $tanggapan->id], ['class' => 'text-muted btn-replay']); ?>
                                    <?= Html::a('<i class="fa-solid fa-trash"></i> Hapus', ['hapus', 'id' => $tanggapan->id], ['class' => 'text-danger']); ?>
                                </div>
                            </div>
                        </li>
                    <?php
                    }
                    ?>
                </ul>
                <div class="ticket-divider"></div>
            </div>
        <?php
        }
        ?>

        <div class="ticket-form " id="komentar">
            <?php $form = ActiveForm::begin([
                'method' => 'POST'
            ]); ?>
            <?= $form->field($model, 'tanggapan')->textarea(['class' => 'summernote  tanggapan', 'placeholder' => "Type a reply ..."])->label(false) ?>
            <div class="form-group text-right">
                <button class="btn btn-primary btn-lg">
                    <i class="fas fa-send"></i> Kirim
                </button>
            </div>
            <?php ActiveForm::end(); ?>
        </div>

    </div>
</div>

<?php
$this->registerJs(<<<JS
    $(".btn-replay").click(function() {
        $(".ticket-form").removeClass("d-none");
        $('.note-editable').focus();
    });
    $(document).ready(function() {
        $('.note-editable').focus();
    });
JS);
?>