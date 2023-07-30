<?php

/** @var \yii\web\View $this */
/** @var string $content */

use common\widgets\Alert;
use frontend\assets\AppAsset;
use yii\widgets\Breadcrumbs;
use yii\bootstrap\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\helpers\Url;
use toriphes\lazyload\LazyLoad;

AppAsset::register($this);
$sectionHeader = Yii::$app->Template->sectionHeader(1);
$sliderJumbotron = Yii::$app->Template->SliderJumbotron(2);
$sectionContent = (array)Yii::$app->Template->sectionContent(3);
// echo '<pre>';
// print_r($sectionContent);
// echo '</pre>';
// exit();
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">

<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>

<body class="d-flex flex-column h-100">
    <?php $this->beginBody() ?>

    <div class="page-wrapper">

        <!-- Preloader -->
        <div class="preloader"></div>

        <!-- Main Header -->
        <header class="main-header">

            <!--Header-Upper-->
            <div class="header-upper">
                <div class="auto-container">
                    <div class="inner-container clearfix">

                        <div class="pull-left logo-outer">
                            <div class="logo"><a href="/"><span class="letter">Desa</span><img src="<?= Url::to('@web/img/logo.svg') ?>" width="100" height="100" alt="" /></a>
                            </div>
                        </div>

                        <div class="pull-right upper-right clearfix">

                            <!--Info Box-->
                            <div class="upper-column info-box">
                                <div class="icon-box"><span class="fa fa-map-marker"></span></div>
                                <ul>
                                    <li><strong>Call Us</strong>+123-456-7890 & 23</li>
                                </ul>
                            </div>

                            <!--Info Box-->
                            <div class="upper-column info-box">
                                <div class="icon-box"><span class="fa fa-envelope-o"></span></div>
                                <ul>
                                    <li><strong>Email at</strong>Support@news.com</li>
                                </ul>
                            </div>

                            <!--Info Box-->
                            <div class="upper-column info-box">
                                <div class="icon-box"><span class="fa fa-clock-o"></span></div>
                                <ul>
                                    <li><strong>Office Hrs</strong>Mon - Sat: 9.00am to 18.00pm</li>
                                </ul>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
            <!--End Header Upper-->

            <!--Header Lower-->
            <div class="header-lower">
                <div class="auto-container">
                    <div class="nav-outer clearfix">
                        <!-- Main Menu -->
                        <nav class="main-menu navbar-expand-md">
                            <div class="navbar-header">
                                <!-- Toggle Button -->
                                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                            </div>

                            <div class="navbar-collapse collapse clearfix" id="navbarSupportedContent">
                                <ul class="navigation clearfix">
                                    <?php
                                    if (empty($sectionHeader)) {
                                    ?>
                                        <li><a href="#">Lorem Ipsum</a></li>
                                        <li><a href="#">Lorem Ipsum</a></li>
                                        <li><a href="#">Lorem Ipsum</a></li>
                                        <?php
                                    } else {
                                        foreach ($sectionHeader as $key => $value) {
                                            $status = ' ';
                                            if (str_contains($value->link, Yii::$app->controller->id)) {
                                                $status = 'current';
                                            }
                                            if (strtolower($value->link) === '/') {
                                                $status = 'current';
                                            }
                                        ?>
                                            <li class='<?= str_contains($value->link, Yii::$app->controller->id) ? 'current' : (Yii::$app->controller->id === 'site' && strtolower($value->link) == '/') ? 'current' : '' ?>'>
                                                <a href="<?= $value->link ?>"><?= $value->keterangan ?></a>
                                            </li>
                                    <?php
                                        }
                                    }
                                    ?>
                                </ul>
                            </div>
                        </nav>

                        <!-- Main Menu End-->
                        <div class="outer-box">
                            <div class="pull-right mt-2">
                                <?= Html::a('Login', ['/admin'], ['class' => 'theme-btn cart-btn btn-style-four btn-sm btn', 'data-pjax' => 0, 'target' => '_blank']) ?>
                                <?= Html::a('Register', ['/admin'], ['class' => 'theme-btn cart-btn btn-style-four btn-sm btn', 'data-pjax' => 0, 'target' => '_blank']) ?>
                            </div>
                        </div>

                        <!-- Hidden Nav Toggler -->
                        <div class="nav-toggler">
                            <button class="hidden-bar-opener"><span class="icon qb-menu1"></span></button>
                        </div>

                    </div>

                </div>
            </div>
            <!--End Header Lower-->

            <!--Sticky Header-->
            <div class="sticky-header">
                <div class="auto-container clearfix">
                    <!--Logo-->
                    <div class="logo pull-left">
                        <a href="/" title="">
                            <span class="letter">Desa</span>
                            <!-- <img src="images/logo-small.png" alt="" /> -->
                        </a>
                    </div>

                    <!--Right Col-->
                    <div class="right-col pull-right">
                        <!-- Main Menu -->
                        <nav class="main-menu navbar-expand-md">
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent1" aria-controls="navbarSupportedContent1" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>

                            <div class="navbar-collapse collapse clearfix" id="navbarSupportedContent1">
                                <ul class="navigation clearfix">
                                    <?php
                                    if (empty($sectionHeader)) {
                                    ?>
                                        <li><a href="#">Lorem Ipsum</a></li>
                                        <li><a href="#">Lorem Ipsum</a></li>
                                        <li><a href="#">Lorem Ipsum</a></li>
                                        <?php
                                    } else {
                                        foreach ($sectionHeader as $key => $value) {
                                            $status = ' ';
                                            if (str_contains($value->link, Yii::$app->controller->id)) {
                                                $status = 'current';
                                            }
                                            if (strtolower($value->link) === '/') {
                                                $status = 'current';
                                            }
                                        ?>
                                            <li class='<?= str_contains($value->link, Yii::$app->controller->id) ? 'current' : (Yii::$app->controller->id === 'site' && strtolower($value->link) == '/') ? 'current' : '' ?>'>
                                                <a href="<?= $value->link ?>"><?= $value->keterangan ?></a>
                                            </li>
                                    <?php
                                        }
                                    }
                                    ?>
                                </ul>
                            </div>
                        </nav><!-- Main Menu End-->
                    </div>

                </div>
            </div>
            <!--End Sticky Header-->

        </header>
        <!--End Header Style Two -->

        <!-- Hidden Navigation Bar -->
        <section class="hidden-bar left-align">

            <div class="hidden-bar-closer">
                <button><span class="qb-close-button"></span></button>
            </div>

            <!-- Hidden Bar Wrapper -->
            <div class="hidden-bar-wrapper">
                <div class="logo">
                    <a href="/">
                        <span class="letter">Desa</span>
                        <!-- <img src="images/mobile-logo.png" alt="" /> -->
                    </a>
                </div>
                <!-- .Side-menu -->
                <div class="side-menu">
                    <!--navigation-->
                    <ul class="navigation clearfix">
                        <?php
                        if (empty($sectionHeader)) {
                        ?>
                            <li><a href="#">Lorem Ipsum</a></li>
                            <li><a href="#">Lorem Ipsum</a></li>
                            <li><a href="#">Lorem Ipsum</a></li>
                            <?php
                        } else {
                            foreach ($sectionHeader as $key => $value) {
                                $status = ' ';
                                if (str_contains($value->link, Yii::$app->controller->id)) {
                                    $status = 'current';
                                }
                                if (strtolower($value->link) === '/') {
                                    $status = 'current';
                                }
                            ?>
                                <li class='<?= str_contains($value->link, Yii::$app->controller->id) ? 'current' : (Yii::$app->controller->id === 'site' && strtolower($value->link) == '/') ? 'current' : '' ?>'>
                                    <a href="<?= $value->link ?>"><?= $value->keterangan ?></a>
                                </li>
                        <?php
                            }
                        }
                        ?>
                    </ul>
                </div>
                <!-- /.Side-menu -->


            </div><!-- / Hidden Bar Wrapper -->

        </section>
        <!-- End / Hidden Bar -->

        <!--Main Slider Two-->
        <section class="main-slider">

            <div class="rev_slider_wrapper fullwidthbanner-container" id="rev_slider_one_wrapper" data-source="gallery">
                <div class="rev_slider fullwidthabanner" id="rev_slider_one" data-version="5.4.1">
                    <ul>

                        <?php
                        if (empty($sliderJumbotron)) {
                            echo '
                                <div class="news-block-six">
                                    <div class="inner-box">
                                        <div class="image-box">
                                            <div class="image">
                                                <img src="images/main-slider/1.jpg" alt="" />
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="news-block-six">
                                    <div class="inner-box">
                                        <div class="image-box">
                                            <div class="image">
                                                <img src="images/main-slider/1.jpg" alt="" />
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            ';
                        }
                        foreach ($sliderJumbotron as $key => $value) {
                            $image = '';
                            if ($value->ambilgambar) {
                                $path = $value->ambilgambar->filename;
                                $image  = explode("common/upload", $path);
                                if (count($image) > 1) {
                                    $image  = $image[1];
                                } else {
                                    $image = '';
                                }
                            }

                        ?>
                            <li data-description="Slide Description" data-easein="default" data-easeout="default" data-fsmasterspeed="1500" data-fsslotamount="7" data-fstransition="fade" data-hideafterloop="0" data-hideslideonmobile="off" data-index="rs-<?= $key + 1 ?>" data-masterspeed="default" data-param1="" data-param10="" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-rotate="0" data-saveperformance="off" data-slotamount="default" data-thumb="<?= $image ?>" data-title="Slide Title" data-transition="parallaxvertical">
                                <img alt="" class="rev-slidebg" data-bgfit="cover" data-bgparallax="10" data-bgposition="center center" data-bgrepeat="no-repeat" data-no-retina="" src="<?= Url::to(['/document/get-file', 'id' =>  $value->ambilgambar->id ?? NULL]) ?>">
                                <div class="tp-caption" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingtop="[0,0,0,0]" data-responsive_offset="on" data-type="text" data-height="none" data-width="['600','600','650','450']" data-whitespace="normal" data-hoffset="['15','15','15','15']" data-voffset="['-20','0','0','0']" data-x="['right','right','right','right']" data-y="['middle','middle','middle','middle']" data-textalign="['top','top','top','top']" data-frames='[{"from":"y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","speed":1500,"to":"o:1;","delay":10000,"ease":"Power3.easeInOut"},{"delay":"wait","speed":1000,"to":"auto:auto;","mask":"x:0;y:0;s:inherit;e:inherit;","ease":"Power3.easeInOut"}]' style="z-index: 7; white-space: nowrap;text-transform:left;">
                                </div>
                            </li>
                        <?php
                        }
                        ?>

                    </ul>

                </div>
            </div>
        </section>
        <!--End Main Slider Two-->

        <!--Sidebar Page Container-->
        <div class="sidebar-page-container mt-3" style="padding: unset !important;">
            <div class="auto-container">
                <div class="row clearfix">

                    <!--Content Side-->
                    <div class="content-side pull-right col-lg-8 col-md-12 col-sm-12">
                        <?= $content ?>
                    </div>

                    <!--Sidebar Side-->
                    <div class="sidebar-side pull-left col-lg-4 col-md-12 col-sm-12">
                        <aside class="sidebar default-sidebar left-sidebar">

                            <!-- Search -->
                            <div class="sidebar-widget search-box">
                                <form method="post" action="contact.html">
                                    <div class="form-group">
                                        <input type="search" name="search-field" value="" placeholder="Search" required>
                                        <button type="submit"><span class="icon fa fa-search"></span></button>
                                    </div>
                                </form>
                            </div>



                            <!--News Post Widget-->
                            <div class="sidebar-widget posts-widget">
                                <!--Product widget Tabs-->
                                <div class="product-widget-tabs">
                                    <!--Product Tabs-->
                                    <div class="prod-tabs tabs-box">

                                        <!--Tab Btns-->
                                        <ul class="tab-btns tab-buttons clearfix">
                                            <li data-tab="#prod-info" class="tab-btn active-btn">Info</li>
                                            <li data-tab="#prod-kegiatan" class="tab-btn">Kegiatan</li>
                                        </ul>

                                        <!--Tabs Container-->
                                        <div class="tabs-content">

                                            <!--Tab / Active Tab-->
                                            <div class="tab active-tab" id="prod-info">
                                                <div class="content">
                                                    <?php
                                                    // echo count($sectionContent);
                                                    // die();
                                                    if (count($sectionContent) < 1) {
                                                        echo '
                                                                <article class="widget-post">
                                                                <figure class="post-thumb"><a href="#"><img src="images/resource/post-thumb-1.jpg" alt=""></a>
                                                                </figure>
                                                                <div class="text"><a href="#">Lorem Ipsum is simply dummy text </a></div>
                                                                <div class="post-info">Month Day, Year</div>
                                                            </article>
                                                                ';
                                                    } else {
                                                        foreach ($sectionContent['info']['data'] as $key => $value) :

                                                    ?>
                                                            <article class="widget-post">
                                                                <figure class="post-thumb">
                                                                    <a href="<?= $sectionContent['info']['section']['link'] ?>">
                                                                        <?= LazyLoad::widget([
                                                                            'src' => Url::to(['/document/get-file', 'id' =>  $value['gambar'] ?? NULL]),
                                                                        ]); ?>
                                                                    </a>
                                                                </figure>
                                                                <div class="text"><a href="<?= $sectionContent['info']['section']['link'] ?>"><?= implode(' ', array_slice(explode(' ', $value['judul']), 0, 25)) ?></a>
                                                                </div>
                                                                <div class="post-info">
                                                                    <?= Yii::$app->formatter->asDate($value['created_at'], 'php: d mm Y') ?>
                                                                </div>
                                                            </article>
                                                    <?php endforeach;
                                                    }
                                                    ?>
                                                </div>
                                            </div>

                                            <!--Tab-->
                                            <div class="tab" id="prod-kegiatan">
                                                <div class="content">
                                                    <!-- <article class="widget-post">
                                                        <figure class="post-thumb"><a href="blog-single.html"><img
                                                                    src="images/resource/post-thumb-3.jpg" alt=""></a>
                                                            <div class="overlay"><span
                                                                    class="icon qb-play-arrow"></span></div>
                                                        </figure>
                                                        <div class="text"><a href="blog-single.html">American Black Film
                                                                Festival New projects from film TV</a></div>
                                                        <div class="post-info">April 03, 2017</div>
                                                    </article> -->

                                                    <?php
                                                    if (count($sectionContent) <  1) {
                                                        echo '
                                                        <article class="widget-post">
                                                            <figure class="post-thumb"><a href="#"><img src="images/resource/post-thumb-3.jpg" alt=""></a>
                                                                <div class="overlay"><span class="icon qb-play-arrow"></span></div>
                                                            </figure>
                                                            <div class="text"><a href="#">Lorem Ipsum is simply dummy tex</a></div>
                                                            <div class="post-info">Month Day, Year</div>
                                                        </article>
                                                                ';
                                                    } else {
                                                        foreach ($sectionContent['kegiatan']['data'] as $key => $value) :
                                                    ?>
                                                            <article class="widget-post">
                                                                <figure class="post-thumb">
                                                                    <a href="<?= $sectionContent['kegiatan']['section']['link'] ?>">
                                                                        <?= LazyLoad::widget([
                                                                            'src' => Url::to(['/document/get-file', 'id' =>  $value['gambar'] ?? NULL,]),
                                                                        ]); ?>
                                                                    </a>
                                                                </figure>
                                                                <div class="text"><a href="<?= $sectionContent['kegiatan']['section']['link'] ?>"><?= implode(' ', array_slice(explode(' ', $value['judul']), 0, 25)) ?></a>
                                                                </div>
                                                                <div class="post-info">
                                                                    <?= Yii::$app->formatter->asDate($value['created_at'], 'php: d mm Y') ?>
                                                                </div>
                                                            </article>
                                                    <?php endforeach;
                                                    }
                                                    ?>


                                                </div>
                                            </div>

                                        </div>

                                    </div>

                                </div>
                                <!--End Product Info Tabs-->
                            </div>
                            <!--End Post Widget-->

                        </aside>
                    </div>

                </div>

            </div>
        </div>
        <!--End Sidebar Page Container-->



        <!--Main Footer-->
        <footer class="main-footer">

            <!--Footer Bottom-->
            <div class="footer-bottom">
                <!--Copyright Section-->
                <div class="copyright-section">
                    <div class="auto-container">
                        <div class="row clearfix">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="copyright">&copy; Copyright 2023</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!--End Main Footer-->

    </div>
    <?php $this->endBody() ?>
</body>

</html>
<?php $this->endPage();
