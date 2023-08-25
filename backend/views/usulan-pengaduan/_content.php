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

$path = $content && $content->user ? Url::to(['usulan-pengaduan/profile?path=' . $content->user->profile_photo_path])  : '/admin/images/avatar/avatar-5.png';
?>

<div class="ticket-content">
    <div class="ticket-header">
        <div class="ticket-sender-picture img-shadow">
            <img src="<?= $path ?>" alt="image">
        </div>

        <div class="d-flex w-100">
            <div class="ticket-detail flex-grow-1">
                <div class="ticket-title">
                    <h4><?= $content->subjek ?? '' ?></h4>
                </div>
                <div class="ticket-info">
                    <div class="font-weight-600"><?= $content->user->name ?? 'no_user' ?></div>
                    <div class="bullet"></div>
                    <div class="text-primary font-weight-600"><?= Yii::$app->formatter->asDateTime($content->tgl_pengaduan ?? NULL, 'php:d F Y H:i:s') ?></div>
                </div>
            </div>
            <div class="float-right">
                <?php Pjax::begin(['id' => '_content']) ?>
                <?php
                if ($content->status ?? 0 == 1) {
                    echo  Html::a(
                        '<i class="fas fa-close"></i> Close',
                        ['close', 'idPengaduan' => $content->id ?? NULL],
                        [
                            'role' => 'modal-remote',
                            'class' => 'my-2 btn btn-danger d-block',
                            'data-confirm' => false, 'data-method' => false, // for overide yii data api
                            'data-request-method' => 'post',
                            'data-toggle' => 'tooltip',
                            'data-confirm-title' => 'Apakah anda yakin?',
                            'data-confirm-message' => 'Apakah Anda Yakin ingin menutup laporan pengaduan ini ???',
                        ]
                    );
                } else if ($content->status ?? 0 == 2) {
                    echo '<div class="badge badge-pill badge-primary mb-1 float-right">Completed</div>';
                }
                ?>
            </div>
            <?php Pjax::end() ?>

        </div>
    </div>

    <div class="ticket-description">
        <p><?= $content->isi ?? NULL ?></p>
        <?php
        if ($content->id_file) {
        ?>
            <div class="gallery">
                <div class="gallery-item gallery-more" data-image="<?= Url::to(['/document/get-file', 'id' => $content->id_file ?? NULL]) ?>" data-title="Image">
                    <div><i class="fas fa-eye"></i></div>
                </div>
            </div>
        <?php
        }
        ?>

        <div class="media-links text-right">
            <a href="#komentar" class="text-muted btn-reply-induk"> <i class="fa-solid fa-reply"></i> Balas</a>
        </div>
        <div class="ticket-divider"></div>
        <?php
        // echo "<pre>";
        // print_r($content->tanggapan);
        // echo "</pre>";
        // exit();
        if (!empty($content->tanggapan)) {
        ?>
            <div class="card-body">
                <ul class="list-unstyled list-unstyled-border list-unstyled-noborder">
                    <?php
                    $no = 1;
                    foreach ($content->tanggapan as $key => $tanggapan) {
                    ?>
                        <li class="media">
                            <img alt="image" class="mr-3 rounded" width="45" height="45" src="<?= $path ?>" style="">
                            <div class="media-body">
                                <div class="media-title mb-1"><?= $tanggapan->user->name ?? 'no_user' ?></div>
                                <div class="text-time"><?= Yii::$app->formatter->asDateTime($tanggapan->tgl_tanggapan, 'php:d F Y H:i:s') ?></div>
                                <div class="media-description text-muted"><?= $tanggapan->tanggapan ?></div>
                                <div class="media-links">
                                    <a href="#form" class="text-muted btn-reply" data-tanggapan="<?= $tanggapan->id ?>"> <i class="fa-solid fa-edit"></i> Ubah</a>
                                    <?= Html::a('<i class="fa-solid fa-trash"></i> Hapus', ['hapus', 'id' => $tanggapan->id, 'idActive' => $idActive], ['class' => 'text-danger']); ?>
                                </div>
                            </div>

                        </li>
                        <div class="ticket ticket-form-<?= $key ?>" style="display:none;" id="form">
                            <?php $form = ActiveForm::begin([
                                'method' => 'POST',
                                'action' => '/admin/usulan-pengaduan/index?idActive=' . $idActive . '&idTanggapan=' . $tanggapan->id,
                                'id' => 'ticket-' . $key
                            ]); ?>
                            <?= $form->field($model, 'tanggapan')->textarea(['class' => 'summernote  tanggapan', 'placeholder' => "Type a reply ..."])->label(false) ?>
                            <div class="form-group text-right">
                                <button class="btn btn-primary btn-lg">
                                    <i class="fas fa-send"></i> Kirim
                                </button>
                            </div>
                            <?php ActiveForm::end(); ?>
                        </div>
                    <?php
                    }
                    ?>
                </ul>

                <div class="ticket-divider"></div>

            </div>
        <?php
        }
        ?>

        <div class="ticket-form" style="display:none;" id="komentar">
            <?php $form = ActiveForm::begin([
                'method' => 'POST',
                'action' => '/admin/usulan-pengaduan/index?idActive=' . $idActive
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
    $(document).ready(function() {
        $(".btn-reply-induk").on('click',function() {
            $('.note-editable').focus();
            $(".ticket-form").hide();
            $(".ticket-form").show();
        });
        $(".btn-reply").on('click',function() {
            var content = "";
            let idTanggapan = $(this).data("tanggapan")
            $.ajax({
                    type: "GET",
                    url: "/admin/usulan-pengaduan/tanggapan?idTanggapan=" +idTanggapan ,
                success: function (res) {
                    content = res.tanggapan;
                },
                error: function (err) {
                    console.log(err);
                },
                async: false
            })
            console.log(content,'content');
            let index = $('.btn-reply').index(this);
            $(".ticket").hide();
            $(".ticket-form-"+index).show();
            $('.note-editable').html(content);
            $('.note-editable').focus();
        });
        
    });
JS);
?>