<?php

use yii\helpers\Url;
use yii\helpers\Html;
use toriphes\lazyload\LazyLoad;
use yii\widgets\LinkPager;
/* @var $this yii\web\View */

$this->title = $title;
?>
<!--Category Tabs Box-->
<div class="category-tabs-box">
    <!--Product Tabs-->
    <div class="prod-tabs tabs-box">


        <!--Tabs Container-->
        <div class="tabs-content">

            <!--Tab / Active Tab-->
            <div class="tab active-tab" id="prod-alls">
                <div class="content">
                    <div class="sec-title">
                        <h2><?= $this->title ?></h2>
                    </div>
                    <div class="row clearfix">
                        <!-- News Block Two -->
                        <?php
                        foreach ($data as $key => $value) {
                            $image = '';
                            if ($value->ambilgambar) {
                                $path = $value->ambilgambar->filename;
                                $image  = explode("common/upload", $path);
                                if (count($image) > 1) {
                                    $image  = $image[1];
                                    // $image  = $value->ambilgambar->id;
                                } else {
                                    $image = '';
                                }
                            }
                            $isi = strip_tags($value->isi);
                        ?>
                            <div class="news-block-two col-lg-6 col-md-6 col-sm-12">
                                <div class="inner-box">
                                    <div class="single-item-carousel owl-carousel owl-theme">
                                        <div class="image">
                                            <!-- <img src="/images/resource/news-37.jpg" alt="" /> -->
                                            <?= LazyLoad::widget([
                                                'src' => Url::to(['/document/get-file', 'id' =>  $value->ambilgambar->id ?? NULL]),
                                            ]); ?>
                                            <div class="category">
                                                <a href="<?= Url::to(['/news/' . $value->sub_judul]) ?>"><?= $value->kategoriArtikel->keterangan ?? '-' ?></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="lower-box">
                                        <h3>
                                            <a href="<?= Url::to(['/news/' . $value->sub_judul]) ?>"><?= $value->judul ?></a>
                                        </h3>
                                        <ul class="post-meta">
                                            <li><span class="icon fa fa-clock-o"></span><?= date("d-m-Y", substr($value->created_at, 0, 10)) ?>
                                            </li>
                                            <li><span class="icon fa fa-eye"></span><?= $value->jumlah_visit ?? 0 ?></li>
                                        </ul>
                                        <div class="text"><?= implode(' ', array_slice(explode(' ', $isi), 0, 25)) ?></div>
                                        <a href="<?= Url::to(['/news/' . $value->sub_judul]) ?>" class="read-more">Read
                                            More </a>
                                    </div>
                                </div>
                            </div>
                        <?php
                        }
                        ?>


                    </div>

                    <!-- PAGINATION -->
                    <div class="styled-pagination">
                        <?php
                        echo LinkPager::widget([
                            'pagination' => $pagination,
                        ]);
                        ?>
                    </div>
                    <!-- END PAGINATION -->
                </div>
            </div>

        </div>
    </div>

</div>
<!--End Category Info Tabs-->