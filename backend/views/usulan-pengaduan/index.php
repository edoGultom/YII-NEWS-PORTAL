<?php

use yii\helpers\Url;
use yii\helpers\Html;
use johnitvn\ajaxcrud\CrudAsset;
use yii\bootstrap\Modal;
use yii\helpers\ArrayHelper;

CrudAsset::register($this);

?>
<section class="section">
    <div class="section-header">
        <h1>Daftar Pengaduan</h1>
    </div>

    <div class="section-body">
        <h2 class="section-title">Bantu Pelanggan Anda</h2>
        <p class="section-lead">
            Beberapa pelanggan membutuhkan bantuan Anda.
        </p>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Daftar Pengaduan</h4>
                    </div>
                    <div class="card-body">
                        <a href="#" class="btn btn-primary btn-icon icon-left btn-lg btn-block mb-4 d-md-none" data-toggle-slide="#ticket-items">
                            <i class="fas fa-list"></i> All Tickets
                        </a>
                        <div class="tickets">

                            <?php
                            $dataContent =   Yii::$app->runAction('/usulan-pengaduan/data-content', ['id' => $idActive]);
                            if (!empty($dataPengaduan)) {
                            ?>
                                <div class="ticket-items" id="ticket-items">
                                    <?php
                                    $no = 0;
                                    foreach ($dataPengaduan as $key => $value) {
                                        $no++;
                                    ?>
                                        <a href="<?= Url::to(['/usulan-pengaduan/index', 'idActive' => $value->id]) ?>">
                                            <div class="ticket-item <?= ($value->id == $idActive) ? 'active' : '' ?>">
                                                <div class="ticket-title">
                                                    <h4>
                                                        <?= strlen($value->subjek) >= 20 ? substr($value->subjek, 0, 18) . '...' : $value->subjek; ?>
                                                    </h4>

                                                </div>
                                                <div class="ticket-desc">
                                                    <div><?= $value->user->name ?? 'no_user' ?></div>
                                                    <div class="bullet"></div>
                                                    <div><?= Yii::$app->formatter->asDateTime($value->tgl_pengaduan, 'php:d F Y H:i:s') ?></div>
                                                </div>
                                            </div>
                                        </a>
                                    <?php
                                    }
                                    ?>
                                </div>
                                <?= $this->render('_content', [
                                    'model' => $model,
                                    'content' => $dataContent,
                                    'idActive' => $idActive
                                ]); ?>
                            <?php
                            } else {
                                echo '<div class="d-flex w-100 justify-content-center"><p class="text-muted text-center">Data Tidak Ditemukan</p></div>';
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php Modal::begin([
    "id" => "ajaxCrudModal",
    "footer" => "", // always need it for jquery plugin
]) ?>
<?php Modal::end(); ?>