<?php

use yii\widgets\LinkPager;
use toriphes\lazyload\LazyLoad;
use yii\helpers\Url;

/** @var yii\web\View $this */

$this->title = 'Desa Beringin';
?>
<!--Content Side-->
<div class="category-tabs-box">
    <!--Product Tabs-->
    <div class="prod-tabs tabs-box">
        <!--Tabs Container-->
        <div class="tabs-content">

            <!--Tab / Active Tab-->
            <div class="tab active-tab" id="prod-alls">
                <div class="content">
                    <div class="sec-title">
                        <h2>Popular</h2>
                    </div>
                    <div class="row clearfix">

                        <!-- News Block Two -->

                        <?php
                        if (empty($popular)) {
                        ?>
                            <div class="news-block-two col-lg-6 col-md-6 col-sm-12">
                                <div class="inner-box">
                                    <div class="single-item-carousel owl-carousel owl-theme" style="max-height: 208px">
                                        <div class="image">
                                            <a href="#"><img src="images/resource/news-1.jpg" alt="" /></a>
                                            <div class="category"><a href="# ?>">Lorem Ipsum</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="lower-box">
                                        <h3><a href="#">Lorem Ipsum is simply dummy text of the printing and typesetting
                                                industry. Lorem Ipsum has been the </a></h3>
                                        <ul class="post-meta">
                                            <li>
                                                <span class="icon fa fa-clock-o"></span>tanggal
                                            </li>
                                            <li><span class="icon fa fa-eye"></span>0</li>
                                        </ul>
                                        <div class="text">Lorem Ipsum is simply dummy text of the printing and typesetting
                                            industry. Lorem Ipsum has been the</div>
                                        <a href="# ?>" class="read-more">Read
                                            More
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <?php
                        } else {
                            foreach ($popular as $key => $value) {
                                $image = '';
                                $id = 'none';
                                if ($value->ambilgambar) {

                                    $path = $value->ambilgambar->filename;
                                    $image  = explode("common/upload", $path);
                                    if (count($image) > 1) {
                                        $image  = $image[1];
                                        $id  =   $value->ambilgambar->id;
                                    } else {
                                        $id = '';
                                        $image = '';
                                        $id = 'none';
                                    }
                                }
                                $isi = strip_tags($value->isi);
                            ?>
                                <div class="news-block-two col-lg-6 col-md-6 col-sm-12">
                                    <div class="inner-box">
                                        <div class="single-item-carousel owl-carousel owl-theme" style="max-height: 208px">
                                            <div class="image">
                                                <?=
                                                LazyLoad::widget(['src' => Url::to(['/document/get-file', 'id' => $value->ambilgambar->id ?? NULL])]);
                                                ?>

                                                <div class="category"><a href="<?= Url::to(['/artikel/' . $value->sub_judul]) ?>"><?= $value->kategoriArtikel ? $value->kategoriArtikel->keterangan : '' ?></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="lower-box">
                                            <h3><a href="<?= Url::to(['/artikel/' . $value->sub_judul]) ?>"><?= $value->judul ?></a>
                                            </h3>
                                            <ul class="post-meta">
                                                <li><span class="icon fa fa-clock-o"></span><?= date("d-m-Y", substr($value->created_at, 0, 10)) ?>
                                                </li>
                                                <!-- <li><span class="icon fa fa-comment-o"></span>3</li> -->
                                                <li><span class="icon fa fa-eye"></span><?= $value->jumlah_visit ?></li>
                                            </ul>
                                            <div class="text"><?= implode(' ', array_slice(explode(' ', $isi), 0, 35)) ?></div>
                                            <a href="<?= Url::to(['/artikel/' . $value->sub_judul]) ?>" class="read-more">Read
                                                More
                                            </a>
                                        </div>
                                    </div>
                                </div>
                        <?php
                            }
                        }
                        ?>


                    </div>

                    <div class="styled-pagination">
                        <?php
                        echo LinkPager::widget([
                            'pagination' => $paginationdataPopular,
                        ]);
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>