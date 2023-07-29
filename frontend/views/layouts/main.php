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

AppAsset::register($this);
$sectionHeader = Yii::$app->Template->sectionHeader(1);
$sliderJumbotron = Yii::$app->Template->SliderJumbotron(2);

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
                            <div class="logo"><a href="index.html"><span class="letter">Desa</span><img src="img/logo.svg" width="100" height="100" alt="" /></a></div>
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
                                    foreach ($sectionHeader as $key => $value) {
                                    ?>
                                        <li class="<?= ($value->id == 1) ? 'current' : '' ?>">
                                            <a href="<?= $value->link ?>"><?= $value->keterangan ?></a>
                                        </li>
                                    <?php
                                    }
                                    ?>
                                </ul>
                            </div>
                        </nav>

                        <!-- Main Menu End-->
                        <div class="outer-box">
                            <div class="pull-right mt-2">
                                <?= Html::a('Login', ['/admin'], ['class' => 'theme-btn cart-btn btn-style-four btn-sm btn', 'data-pjax' => 0, 'target' => '_blank']) ?>
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
                        <a href="index.html" title="">
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
                                    <li class="current"><a href="#">Home</a></li>
                                    <li><a>News</a></li>
                                    <li><a>Maps</a></li>
                                    <li><a>Document</a></li>
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
                    <a href="index.html">
                        <span class="letter">Desa</span>
                        <!-- <img src="images/mobile-logo.png" alt="" /> -->
                    </a>
                </div>
                <!-- .Side-menu -->
                <div class="side-menu">
                    <!--navigation-->
                    <ul class="navigation clearfix">
                        <?php
                        foreach ($sectionHeader as $key => $value) {
                        ?>
                            <li class="<?= ($value->id == 1) ? 'current' : '' ?>">
                                <a href="<?= $value->link ?>"><?= $value->keterangan ?></a>
                            </li>
                        <?php
                        }
                        ?>
                    </ul>
                </div>
                <!-- /.Side-menu -->


            </div><!-- / Hidden Bar Wrapper -->

        </section>
        <!-- End / Hidden Bar -->

        <!--Main Slider Two-->
        <section class="main-slider-two">
            <div class="single-item-carousel owl-carousel owl-theme">

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
                    // $image = '';
                    $url = Url::to(['/document/get-file', 'id' =>  $value->ambilgambar->id ?? NULL]);
                ?>
                    <!--Slide-->
                    <div class="news-block-six">
                        <div class="inner-box">
                            <div class="image-box">
                                <div class="image">
                                    <img id="slider" src="<?= Url::to(['/document/get-file', 'id' =>  $value->ambilgambar->id ?? NULL]) ?>" alt="images/main-slider/1.jpg" />

                                    <div class="overlay-box">
                                        <div class="overlay-inner">
                                            <div class="content">
                                                <!-- <div class="category"><a href="blog-single.html">Sports</a></div> -->
                                                <h2><?= $value->nama_slider ?></a>
                                                    <!-- <div class="post-date">March 16, 2017</div> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>

        </section>
        <!--End Main Slider Two-->

        <!--Sidebar Page Container-->
        <div class="sidebar-page-container">
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
                                            <li data-tab="#prod-popular" class="tab-btn active-btn">Info</li>
                                            <li data-tab="#prod-comment" class="tab-btn">Kegiatan</li>
                                        </ul>

                                        <!--Tabs Container-->
                                        <div class="tabs-content">

                                            <!--Tab / Active Tab-->
                                            <div class="tab active-tab" id="prod-popular">
                                                <div class="content">

                                                    <article class="widget-post">
                                                        <figure class="post-thumb"><a href="blog-single.html"><img src="images/resource/post-thumb-1.jpg" alt=""></a>
                                                            <div class="overlay"><span class="icon qb-play-arrow"></span></div>
                                                        </figure>
                                                        <div class="text"><a href="blog-single.html">Historical Placed &
                                                                his photoshopped</a></div>
                                                        <div class="post-info">April 01, 2017</div>
                                                    </article>

                                                    <article class="widget-post">
                                                        <figure class="post-thumb"><a href="blog-single.html"><img src="images/resource/post-thumb-2.jpg" alt=""></a>
                                                            <div class="overlay"><span class="icon qb-play-arrow"></span></div>
                                                        </figure>
                                                        <div class="text"><a href="blog-single.html">the Poor Man use
                                                                cycling for is Business improvement</a></div>
                                                        <div class="post-info">April 02, 2017</div>
                                                    </article>

                                                    <article class="widget-post">
                                                        <figure class="post-thumb"><a href="blog-single.html"><img src="images/resource/post-thumb-3.jpg" alt=""></a>
                                                            <div class="overlay"><span class="icon qb-play-arrow"></span></div>
                                                        </figure>
                                                        <div class="text"><a href="blog-single.html">American Black Film
                                                                Festival New projects from film TV</a></div>
                                                        <div class="post-info">April 03, 2017</div>
                                                    </article>

                                                    <article class="widget-post">
                                                        <figure class="post-thumb"><a href="blog-single.html"><img src="images/resource/post-thumb-4.jpg" alt=""></a>
                                                            <div class="overlay"><span class="icon qb-play-arrow"></span></div>
                                                        </figure>
                                                        <div class="text"><a href="blog-single.html">Amy Schumer swaps
                                                                lives with Anna Wintour</a></div>
                                                        <div class="post-info">April 04, 2017</div>
                                                    </article>

                                                    <article class="widget-post">
                                                        <figure class="post-thumb"><a href="blog-single.html"><img src="images/resource/post-thumb-9.jpg" alt=""></a>
                                                            <div class="overlay"><span class="icon qb-play-arrow"></span></div>
                                                        </figure>
                                                        <div class="text"><a href="blog-single.html">Historical Placed &
                                                                his photoshopped</a></div>
                                                        <div class="post-info">April 26, 2017</div>
                                                    </article>

                                                </div>
                                            </div>

                                            <!--Tab-->
                                            <div class="tab" id="prod-recent">
                                                <div class="content">

                                                    <article class="widget-post">
                                                        <figure class="post-thumb"><a href="blog-single.html"><img src="images/resource/post-thumb-2.jpg" alt=""></a>
                                                            <div class="overlay"><span class="icon qb-play-arrow"></span></div>
                                                        </figure>
                                                        <div class="text"><a href="blog-single.html">the Poor Man use
                                                                cycling for is Business improvement</a></div>
                                                        <div class="post-info">April 02, 2017</div>
                                                    </article>

                                                    <article class="widget-post">
                                                        <figure class="post-thumb"><a href="blog-single.html"><img src="images/resource/post-thumb-3.jpg" alt=""></a>
                                                            <div class="overlay"><span class="icon qb-play-arrow"></span></div>
                                                        </figure>
                                                        <div class="text"><a href="blog-single.html">American Black Film
                                                                Festival New projects from film TV</a></div>
                                                        <div class="post-info">April 03, 2017</div>
                                                    </article>

                                                </div>
                                            </div>

                                            <!--Tab-->
                                            <div class="tab" id="prod-comment">
                                                <div class="content">

                                                    <article class="widget-post">
                                                        <figure class="post-thumb"><a href="blog-single.html"><img src="images/resource/post-thumb-3.jpg" alt=""></a>
                                                            <div class="overlay"><span class="icon qb-play-arrow"></span></div>
                                                        </figure>
                                                        <div class="text"><a href="blog-single.html">American Black Film
                                                                Festival New projects from film TV</a></div>
                                                        <div class="post-info">April 03, 2017</div>
                                                    </article>

                                                    <article class="widget-post">
                                                        <figure class="post-thumb"><a href="blog-single.html"><img src="images/resource/post-thumb-4.jpg" alt=""></a>
                                                            <div class="overlay"><span class="icon qb-play-arrow"></span></div>
                                                        </figure>
                                                        <div class="text"><a href="blog-single.html">Amy Schumer swaps
                                                                lives with Anna Wintour</a></div>
                                                        <div class="post-info">April 04, 2017</div>
                                                    </article>

                                                    <article class="widget-post">
                                                        <figure class="post-thumb"><a href="blog-single.html"><img src="images/resource/post-thumb-1.jpg" alt=""></a>
                                                            <div class="overlay"><span class="icon qb-play-arrow"></span></div>
                                                        </figure>
                                                        <div class="text"><a href="blog-single.html">Historical Placed &
                                                                his photoshopped</a></div>
                                                        <div class="post-info">April 01, 2017</div>
                                                    </article>

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
