<?php
$this->title = $data->judul;
$this->params['breadcrumbs'][] = ['label' => 'Artikel', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

use toriphes\lazyload\LazyLoad;
use yii\helpers\Html;
use yii\helpers\Url;

?>

<div class="blog-single">
    <div class="inner-box">
        <div class="upper-box">

            <ul class="tag-title">
                <li><?= $data->kategoriArtikel ? $data->kategoriArtikel->keterangan : '' ?></li>
            </ul>
            <h2><?= $data->judul ?></h2>
            <ul class="post-meta">
                <li><span class="icon qb-clock"></span><?= date("d-m-Y", substr($data->created_at, 0, 10)) ?></li>
                <li><span class="icon qb-eye"></span><?= $data->jumlah_visit ?> Views</li>
            </ul>
            <ul class="social-icon-one alternate">
                <li class="share">Share:</li>

                <li class="whatsapp">
                    <a target="_blank" href="whatsapp://send?text=<?= 'http://dinkes.sumutprov.go.id/artikel/' . $data->sub_judul ?>">
                        <!-- <span class="fa fa-whatsapp"></span> -->
                        <i class="fa fa-brands fa-whatsapp"></i>
                    </a>
                </li>
                <li class="twitter">
                    <a target="_blank" href="whatsapp://send?text=<?= 'http://dinkes.sumutprov.go.id/artikel/' . $data->sub_judul ?>">
                        <!-- <span class="fa fa-whatsapp"></span> -->
                        <i class="fa fa-brands fa-twitter"></i>
                    </a>
                </li>
                <li class="g_plus">
                    <a target="_blank" href="whatsapp://send?text=<?= 'http://dinkes.sumutprov.go.id/artikel/' . $data->sub_judul ?>">
                        <!-- <span class="fa fa-whatsapp"></span> -->
                        <i class="fa fa-brands fa-google-plus"></i>
                    </a>
                </li>
            </ul>
        </div>
        <div class="post-gallery">
            <?php
            $image = '';
            if ($data->ambilgambar) {
                $path = $data->ambilgambar->filename;
                $image  = explode("common/upload", $path);
                if (count($image) > 1) {
                    $image  = $image[1];
                } else {
                    $image = '';
                }
            }
            echo LazyLoad::widget([
                'src' => Url::to(['/document/get-file', 'id' =>  $data->ambilgambar->id ?? NULL]),
            ]);
            ?>

        </div>
        <div>
            <span class="image-caption">Keterangan Gambar : <?= $data->keterangan_gambar ?>
            </span>
            <br>
            <br>
        </div>
        <div class="text">
            <?= $data->isi ?>
        </div>
        <!--post-share-options-->
        <div class="post-share-options">
            <div class="tags clearfix">
                <?php
                foreach (array_keys($data->getAllTags()) as $value) {
                    if ($value !== '-') {
                ?>
                        <a href="#"><?= $value ?></a>
                <?php
                    }
                }
                ?>
            </div>
        </div>

    </div>
</div>