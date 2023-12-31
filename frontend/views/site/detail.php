<?php

use toriphes\lazyload\LazyLoad;
use yii\helpers\Html;
use yii\helpers\Url;

?>
<div class="blog-single">
    <div class="inner-box">
        <div class="upper-box">
            <!-- <ul class="breadcrumb-bar">
                <li><a href="#">Home</a></li>
                <li>Featured</li>
                <li>Movies: Midnight Special delivers a new short trailer</li>
            </ul> -->
            <ul class="tag-title">
                <!-- <li>Featured</li> -->
                <li><?= $data->kategoriArtikel ? $data->kategoriArtikel->keterangan : '' ?></li>
            </ul>
            <h2><?= $data->judul ?></h2>
            <ul class="post-meta">
                <li><span class="icon qb-clock"></span><?= date("d-m-Y", substr($data->created_at, 0, 10)) ?></li>
                <!-- <li><span class="icon qb-user2"></span>by <!?= $data->postingBy ? $data->postingBy->username : 'Admin'?></li> -->
                <!-- <li><span class="icon fa fa-comment-o"></span>3 comments</li> -->
                <li><span class="icon qb-eye"></span><?= $data->jumlah_visit ?> Views</li>
            </ul>
            <ul class="social-icon-one alternate">
                <li class="share">Share:</li>
                <!-- <li>
                    <a target="_blank" href="http://www.facebook.com/sharer.php?u=<!?=
                    'http://dinkes.sumutprov.go.id/artikel/'.$data->sub_judul?>">
                    <span class="fa fa-facebook"></span>
                    </a>
                </li> -->
                <!-- <li class="twitter">
                    <a target="_blank" href="https://twitter.com/intent/tweet?text=<!?=
					$data->judul?>&url=<!?=
                    'http://dinkes.sumutprov.go.id/artikel/'.$data->sub_judul?>">
                    <span class="fa fa-twitter"></span>
                    </a>
                </li> -->
                <li class="linkedin">
                    <a target="_blank" href="https://www.linkedin.com/sharing/share-offsite/?url=<?=
                                                                                                    'http://dinkes.sumutprov.go.id//artikel/' . $data->sub_judul ?>">
                        <span class="fa fa-linkedin-square"></span>
                    </a>
                </li>
                <li class="whatsapp">
                    <a target="_blank" href="whatsapp://send?text=<?= 'http://dinkes.sumutprov.go.id/artikel/' . $data->sub_judul ?>">
                        <span class="fa fa-whatsapp"></span>
                    </a>
                </li>
                <li>
                    <a target="_blank" href="https://t.me/share/url?url=<?= 'http://dinkes.sumutprov.go.id/artikel/' . $data->sub_judul ?>">
                        <?= Html::img('/img/telegram.png', ['height' => 20]); ?>
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