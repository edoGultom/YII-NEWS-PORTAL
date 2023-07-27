<?php

/** @var \yii\web\View $this */
/** @var string $content */

use common\widgets\Alert;
use frontend\assets\AppAsset;
use yii\widgets\Breadcrumbs;
use yii\bootstrap\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;


AppAsset::register($this);
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
                                    <li class="current dropdown"><a href="#">Home</a>
                                        <ul>
                                            <li><a href="index-1.html">Home 01</a></li>
                                            <li><a href="index-2.html">Home 02</a></li>
                                            <li><a href="index-3.html">Home 03</a></li>
                                            <li class="dropdown"><a href="#">Header Styles</a>
                                                <ul>
                                                    <li><a href="index-1.html">Header 01</a></li>
                                                    <li><a href="index-2.html">Header 02</a></li>
                                                    <li><a href="index-3.html">Header 03</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="dropdown"><a href="#">About Us</a>
                                        <ul>
                                            <li><a href="about.html">About Us</a></li>
                                            <li><a href="about-2.html">About Us Two</a></li>
                                            <li><a href="faq.html">Faq</a></li>
                                            <li><a href="error-page.html">Error Page</a></li>
                                            <li><a href="comming-soon.html">Comming Soon</a></li>
                                        </ul>
                                    </li>
                                    <li class="dropdown"><a href="#">Projects</a>
                                        <ul>
                                            <li><a href="project-threecolumn.html">Projects 3 Column</a></li>
                                            <li><a href="project-fourcolumn.html">Projects 4 Column</a></li>
                                            <li><a href="project-fullscreen.html">Projects Full Screen</a></li>
                                            <li><a href="project-detail.html">Projects Details</a></li>
                                        </ul>
                                    </li>
                                    <li class="dropdown"><a href="#">Blog</a>
                                        <ul>
                                            <li><a href="blog.html">Our blog</a></li>
                                            <li><a href="blog-sidebar.html">blog Sidebar</a></li>
                                            <li><a href="blog-single.html">Blog Single</a></li>
                                        </ul>
                                    </li>
                                    <li class="dropdown"><a href="#">Shop</a>
                                        <ul>
                                            <li><a href="shop.html">Shop</a></li>
                                            <li><a href="shop-single.html">Shop Details</a></li>
                                            <li><a href="shoping-cart.html">Cart Page</a></li>
                                            <li><a href="checkout.html">Checkout Page</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="contact.html">Contact</a></li>
                                </ul>
                            </div>
                        </nav>
                        <!-- Main Menu End-->

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
                        <a href="index.html" title=""><span class="letter">n</span><img src="images/logo-small.png" alt="" /></a>
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
                                    <li class="current dropdown"><a href="#">Home</a>
                                        <ul>
                                            <li><a href="index-1.html">Home 01</a></li>
                                            <li><a href="index-2.html">Home 02</a></li>
                                            <li><a href="index-3.html">Home 03</a></li>
                                            <li class="dropdown"><a href="#">Header Styles</a>
                                                <ul>
                                                    <li><a href="index-1.html">Header 01</a></li>
                                                    <li><a href="index-2.html">Header 02</a></li>
                                                    <li><a href="index-3.html">Header 03</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="dropdown"><a href="#">About Us</a>
                                        <ul>
                                            <li><a href="about.html">About Us</a></li>
                                            <li><a href="about-2.html">About Us Two</a></li>
                                            <li><a href="faq.html">Faq</a></li>
                                            <li><a href="error-page.html">Error Page</a></li>
                                            <li><a href="comming-soon.html">Comming Soon</a></li>
                                        </ul>
                                    </li>
                                    <li class="dropdown"><a href="#">Projects</a>
                                        <ul>
                                            <li><a href="project-threecolumn.html">Projects 3 Column</a></li>
                                            <li><a href="project-fourcolumn.html">Projects 4 Column</a></li>
                                            <li><a href="project-fullscreen.html">Projects Full Screen</a></li>
                                            <li><a href="project-detail.html">Projects Details</a></li>
                                        </ul>
                                    </li>
                                    <li class="dropdown"><a href="#">Blog</a>
                                        <ul>
                                            <li><a href="blog.html">Our blog</a></li>
                                            <li><a href="blog-sidebar.html">blog Sidebar</a></li>
                                            <li><a href="blog-single.html">Blog Single</a></li>
                                        </ul>
                                    </li>
                                    <li class="dropdown"><a href="#">Shop</a>
                                        <ul>
                                            <li><a href="shop.html">Shop</a></li>
                                            <li><a href="shop-single.html">Shop Details</a></li>
                                            <li><a href="shoping-cart.html">Cart Page</a></li>
                                            <li><a href="checkout.html">Checkout Page</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="contact.html">Contact</a></li>
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
                    <a href="index.html"><span class="letter">n</span><img src="images/mobile-logo.png" alt="" /></a>
                </div>
                <!-- .Side-menu -->
                <div class="side-menu">
                    <!--navigation-->
                    <ul class="navigation clearfix">
                        <li class="current dropdown"><a href="#">Home</a>
                            <ul>
                                <li><a href="index-1.html">Home 01</a></li>
                                <li><a href="index-2.html">Home 02</a></li>
                                <li><a href="index-3.html">Home 03</a></li>
                                <li class="dropdown"><a href="#">Header Styles</a>
                                    <ul>
                                        <li><a href="index-1.html">Header 01</a></li>
                                        <li><a href="index-2.html">Header 02</a></li>
                                        <li><a href="index-3.html">Header 03</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li class="dropdown"><a href="#">About Us</a>
                            <ul>
                                <li><a href="about.html">About Us</a></li>
                                <li><a href="about-2.html">About Us Two</a></li>
                                <li><a href="faq.html">Faq</a></li>
                                <li><a href="error-page.html">Error Page</a></li>
                                <li><a href="comming-soon.html">Comming Soon</a></li>
                            </ul>
                        </li>
                        <li class="dropdown"><a href="#">Projects</a>
                            <ul>
                                <li><a href="project-threecolumn.html">Projects 3 Column</a></li>
                                <li><a href="project-fourcolumn.html">Projects 4 Column</a></li>
                                <li><a href="project-fullscreen.html">Projects Full Screen</a></li>
                                <li><a href="project-detail.html">Projects Details</a></li>
                            </ul>
                        </li>
                        <li class="dropdown"><a href="#">Blog</a>
                            <ul>
                                <li><a href="blog.html">Our blog</a></li>
                                <li><a href="blog-sidebar.html">blog Sidebar</a></li>
                                <li><a href="blog-single.html">Blog Single</a></li>
                            </ul>
                        </li>
                        <li class="dropdown"><a href="#">Shop</a>
                            <ul>
                                <li><a href="shop.html">Shop</a></li>
                                <li><a href="shop-single.html">Shop Details</a></li>
                                <li><a href="shoping-cart.html">Cart Page</a></li>
                                <li><a href="checkout.html">Checkout Page</a></li>
                            </ul>
                        </li>
                        <li><a href="contact.html">Contact</a></li>
                    </ul>
                </div>
                <!-- /.Side-menu -->

                <!--Options Box-->
                <div class="options-box">
                    <!--Sidebar Search-->
                    <div class="sidebar-search">
                        <form method="post" action="contact.html">
                            <div class="form-group">
                                <input type="search" name="text" value="" placeholder="Search ..." required="">
                                <button type="submit" class="theme-btn"><span class="fa fa-search"></span></button>
                            </div>
                        </form>
                    </div>

                    <!--Mobile Cart-->
                    <div class="mobile-cart">
                        <a href="shop-single.html" class="clearfix">
                            <div class="pull-left">
                                <div class="text">0 items 0.00$</div>
                            </div>
                            <div class="pull-right">
                                <span class="icon fa fa-shopping-cart"></span>
                            </div>
                        </a>
                    </div>

                    <!--Language Dropdown-->
                    <div class="language dropdown"><a class="btn btn-default dropdown-toggle" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" href="#"> English <span class="icon fa fa-angle-down"></span></a>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
                            <li><a href="#">English</a></li>
                            <li><a href="#">German</a></li>
                            <li><a href="#">Arabic</a></li>
                            <li><a href="#">Hindi</a></li>
                        </ul>
                    </div>

                    <!--Social Links-->
                    <ul class="social-links clearfix">
                        <li><a href="#"><span class="fa fa-facebook-f"></span></a></li>
                        <li><a href="#"><span class="fa fa-twitter"></span></a></li>
                        <li><a href="#"><span class="fa fa-instagram"></span></a></li>
                        <li><a href="#"><span class="fa fa-pinterest"></span></a></li>
                    </ul>

                </div>

            </div><!-- / Hidden Bar Wrapper -->

        </section>
        <!-- End / Hidden Bar -->

        <!--Main Slider Two-->
        <section class="main-slider-two">
            <div class="single-item-carousel owl-carousel owl-theme">

                <!--Slide-->
                <div class="slide">
                    <div class="clearfix">
                        <!--Slide Column-->
                        <div class="slide-column col-lg-6 col-md-12 col-sm-12">
                            <!--News Block Three-->
                            <div class="news-block-three style-two">
                                <div class="inner-box">
                                    <div class="image">
                                        <img src="images/resource/news-15.jpg" alt="" />
                                        <div class="overlay-box">
                                            <div class="content">
                                                <div class="tag"><a href="blog-single.html">Travel</a></div>
                                                <h3><a href="blog-single.html">Jeep festival begins in China amid
                                                        widespread criticism</a></h3>
                                                <ul class="post-meta">
                                                    <li><span class="icon qb-clock"></span>March 17, 2017</li>
                                                    <li><span class="icon fa fa-comment-o"></span>9</li>
                                                    <li><span class="icon qb-eye"></span>2470</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--Slide Column-->
                        <div class="slide-column col-lg-6 col-md-12 col-sm-12">
                            <div class="row clearfix">
                                <div class="inner-slide col-lg-12 col-md-12 col-sm-12">
                                    <!--News Block Three-->
                                    <div class="news-block-three style-three">
                                        <div class="inner-box">
                                            <div class="image">
                                                <img src="images/resource/news-16.jpg" alt="" />
                                                <div class="overlay-box">
                                                    <div class="content">
                                                        <div class="tag"><a href="blog-single.html">Design</a></div>
                                                        <h3><a href="blog-single.html">Lady Gaga join Billboard campaign
                                                                to stop violence</a></h3>
                                                        <ul class="post-meta">
                                                            <li><span class="icon qb-clock"></span>March 17, 2017</li>
                                                            <li><span class="icon fa fa-comment-o"></span>9</li>
                                                            <li><span class="icon qb-eye"></span>2470</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="inner-slide col-lg-6 col-md-6 col-sm-12">
                                    <!--News Block Three-->
                                    <div class="news-block-three style-four">
                                        <div class="inner-box">
                                            <div class="image">
                                                <img src="images/resource/news-17.jpg" alt="" />
                                                <div class="overlay-box">
                                                    <div class="content">
                                                        <div class="tag"><a href="blog-single.html">Style</a></div>
                                                        <h3><a href="blog-single.html">Food has last laugh as
                                                                Universal</a></h3>
                                                        <ul class="post-meta">
                                                            <li><span class="icon qb-clock"></span>March 17, 2017</li>
                                                            <li><span class="icon fa fa-comment-o"></span>9</li>
                                                            <li><span class="icon qb-eye"></span>2470</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="inner-slide col-lg-6 col-md-6 col-sm-12">
                                    <!--News Block Three-->
                                    <div class="news-block-three style-four">
                                        <div class="inner-box">
                                            <div class="image">
                                                <img src="images/resource/news-18.jpg" alt="" />
                                                <div class="overlay-box">
                                                    <div class="content">
                                                        <div class="tag"><a href="blog-single.html">Fashion</a></div>
                                                        <h3><a href="blog-single.html">Lady Chopra got what
                                                                photoshopped?</a></h3>
                                                        <ul class="post-meta">
                                                            <li><span class="icon qb-clock"></span>March 17, 2017</li>
                                                            <li><span class="icon fa fa-comment-o"></span>9</li>
                                                            <li><span class="icon qb-eye"></span>2470</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <!--Slide-->
                <div class="slide">
                    <div class="clearfix">
                        <!--Slide Column-->
                        <div class="slide-column col-lg-6 col-md-12 col-sm-12">
                            <!--News Block Three-->
                            <div class="news-block-three style-two">
                                <div class="inner-box">
                                    <div class="image">
                                        <img src="images/resource/news-15.jpg" alt="" />
                                        <div class="overlay-box">
                                            <div class="content">
                                                <div class="tag"><a href="blog-single.html">Travel</a></div>
                                                <h3><a href="blog-single.html">Jeep festival begins in China amid
                                                        widespread criticism</a></h3>
                                                <ul class="post-meta">
                                                    <li><span class="icon qb-clock"></span>March 17, 2017</li>
                                                    <li><span class="icon fa fa-comment-o"></span>9</li>
                                                    <li><span class="icon qb-eye"></span>2470</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--Slide Column-->
                        <div class="slide-column col-lg-6 col-md-12 col-sm-12">
                            <div class="row clearfix">
                                <div class="inner-slide col-lg-12 col-md-12 col-sm-12">
                                    <!--News Block Three-->
                                    <div class="news-block-three style-three">
                                        <div class="inner-box">
                                            <div class="image">
                                                <img src="images/resource/news-16.jpg" alt="" />
                                                <div class="overlay-box">
                                                    <div class="content">
                                                        <div class="tag"><a href="blog-single.html">Design</a></div>
                                                        <h3><a href="blog-single.html">Lady Gaga join Billboard campaign
                                                                to stop violence</a></h3>
                                                        <ul class="post-meta">
                                                            <li><span class="icon qb-clock"></span>March 17, 2017</li>
                                                            <li><span class="icon fa fa-comment-o"></span>9</li>
                                                            <li><span class="icon qb-eye"></span>2470</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="inner-slide col-lg-6 col-md-6 col-sm-12">
                                    <!--News Block Three-->
                                    <div class="news-block-three style-four">
                                        <div class="inner-box">
                                            <div class="image">
                                                <img src="images/resource/news-17.jpg" alt="" />
                                                <div class="overlay-box">
                                                    <div class="content">
                                                        <div class="tag"><a href="blog-single.html">Style</a></div>
                                                        <h3><a href="blog-single.html">Food has last laugh as
                                                                Universal</a></h3>
                                                        <ul class="post-meta">
                                                            <li><span class="icon qb-clock"></span>March 17, 2017</li>
                                                            <li><span class="icon fa fa-comment-o"></span>9</li>
                                                            <li><span class="icon qb-eye"></span>2470</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="inner-slide col-lg-6 col-md-6 col-sm-12">
                                    <!--News Block Three-->
                                    <div class="news-block-three style-four">
                                        <div class="inner-box">
                                            <div class="image">
                                                <img src="images/resource/news-18.jpg" alt="" />
                                                <div class="overlay-box">
                                                    <div class="content">
                                                        <div class="tag"><a href="blog-single.html">Fashion</a></div>
                                                        <h3><a href="blog-single.html">Lady Chopra got what
                                                                photoshopped?</a></h3>
                                                        <ul class="post-meta">
                                                            <li><span class="icon qb-clock"></span>March 17, 2017</li>
                                                            <li><span class="icon fa fa-comment-o"></span>9</li>
                                                            <li><span class="icon qb-eye"></span>2470</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </section>
        <!--End Main Slider Two-->

        <!--Sidebar Page Container-->
        <div class="sidebar-page-container">
            <div class="auto-container">
                <div class="row clearfix">

                    <!--Content Side-->
                    <div class="content-side pull-right col-lg-8 col-md-12 col-sm-12">

                        <!--Economics Blog Boxed-->
                        <div class="economics-category">
                            <!--Sec Title-->
                            <div class="sec-title">
                                <h2>Popular News</h2>
                            </div>
                            <div class="economics-items-carousel owl-carousel owl-theme">

                                <div class="slide">
                                    <div class="row clearfix">
                                        <div class="column col-lg-6 col-md-6 col-sm-12">

                                            <!--News Block Two-->
                                            <div class="news-block-two with-margin">
                                                <div class="inner-box">
                                                    <div class="image">
                                                        <a href="blog-single.html"><img src="images/resource/news-5.jpg" alt="" /></a>
                                                        <div class="category"><a href="blog-single.html">Sports</a>
                                                        </div>
                                                    </div>
                                                    <div class="lower-box">
                                                        <h3><a href="blog-single.html">Wooden skyscrapers are springing
                                                                up across the world universal</a></h3>
                                                        <ul class="post-meta">
                                                            <li><span class="icon fa fa-clock-o"></span>March 26, 2017
                                                            </li>
                                                            <li><span class="icon fa fa-comment-o"></span>3</li>
                                                            <li><span class="icon fa fa-eye"></span>7420</li>
                                                        </ul>
                                                        <div class="text">Lorem ipsum dolor sit amet, consectetuer
                                                            adipiscing elit doli. Aenean commodo ligula eget dolor.
                                                            Aenean massa. Cumtipsu sociis natoque penatibus et magnis
                                                            dis montesti, nascetur ridiculus mus. Donec quam…</div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!--Widget Post-->
                                            <article class="widget-post">
                                                <figure class="post-thumb"><a href="blog-single.html"><img src="images/resource/post-thumb-5.jpg" alt=""></a></figure>
                                                <div class="text"><a href="blog-single.html">Wooden skyscrapers are
                                                        springing up across the world</a></div>
                                                <div class="post-info">August 16, 2017</div>
                                            </article>

                                            <!--Widget Post-->
                                            <article class="widget-post">
                                                <figure class="post-thumb"><a href="blog-single.html"><img src="images/resource/post-thumb-6.jpg" alt=""></a></figure>
                                                <div class="text"><a href="blog-single.html">New York state and
                                                        california are also close to cracking</a></div>
                                                <div class="post-info">August 17, 2017</div>
                                            </article>

                                        </div>

                                        <div class="column col-lg-6 col-md-6 col-sm-12">

                                            <!--News Block Two-->
                                            <div class="news-block-two with-margin">
                                                <div class="inner-box">
                                                    <div class="image">
                                                        <a href="blog-single.html"><img src="images/resource/news-6.jpg" alt="" /></a>
                                                        <div class="category"><a href="blog-single.html">Design</a>
                                                        </div>
                                                    </div>
                                                    <div class="lower-box">
                                                        <h3><a href="blog-single.html">A great personality in the world,
                                                                What he use for his personality ?</a></h3>
                                                        <ul class="post-meta">
                                                            <li><span class="icon fa fa-clock-o"></span>March 27, 2017
                                                            </li>
                                                            <li><span class="icon fa fa-comment-o"></span>4</li>
                                                            <li><span class="icon fa fa-eye"></span>5740</li>
                                                        </ul>
                                                        <div class="text">Lorem ipsum dolor sit amet, consectetuer
                                                            adipiscing elit doli. Aenean commodo ligula eget dolor.
                                                            Aenean massa. Cumtipsu sociis natoque penatibus et magnis
                                                            dis montesti, nascetur ridiculus mus. Donec quam…</div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!--Widget Post-->
                                            <article class="widget-post">
                                                <figure class="post-thumb"><a href="blog-single.html"><img src="images/resource/post-thumb-7.jpg" alt=""></a></figure>
                                                <div class="text"><a href="blog-single.html">Critics of sites like
                                                        Airbnb have long claimed that the remove</a></div>
                                                <div class="post-info">August 18, 2017</div>
                                            </article>

                                            <!--Widget Post-->
                                            <article class="widget-post">
                                                <figure class="post-thumb"><a href="blog-single.html"><img src="images/resource/post-thumb-8.jpg" alt=""></a></figure>
                                                <div class="text"><a href="blog-single.html">Six of the displaced Food
                                                        filed a lawsuit against</a></div>
                                                <div class="post-info">August 19, 2017</div>
                                            </article>

                                        </div>
                                    </div>
                                </div>

                                <div class="slide">
                                    <div class="row clearfix">
                                        <div class="column col-lg-6 col-md-6 col-sm-12">

                                            <!--News Block Two-->
                                            <div class="news-block-two with-margin">
                                                <div class="inner-box">
                                                    <div class="image">
                                                        <a href="blog-single.html"><img src="images/resource/news-5.jpg" alt="" /></a>
                                                        <div class="category"><a href="blog-single.html">Sports</a>
                                                        </div>
                                                    </div>
                                                    <div class="lower-box">
                                                        <h3><a href="blog-single.html">Wooden skyscrapers are springing
                                                                up across the world universal</a></h3>
                                                        <ul class="post-meta">
                                                            <li><span class="icon fa fa-clock-o"></span>March 26, 2017
                                                            </li>
                                                            <li><span class="icon fa fa-comment-o"></span>3</li>
                                                            <li><span class="icon fa fa-eye"></span>7420</li>
                                                        </ul>
                                                        <div class="text">Lorem ipsum dolor sit amet, consectetuer
                                                            adipiscing elit doli. Aenean commodo ligula eget dolor.
                                                            Aenean massa. Cumtipsu sociis natoque penatibus et magnis
                                                            dis montesti, nascetur ridiculus mus. Donec quam…</div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!--Widget Post-->
                                            <article class="widget-post">
                                                <figure class="post-thumb"><a href="blog-single.html"><img src="images/resource/post-thumb-5.jpg" alt=""></a></figure>
                                                <div class="text"><a href="blog-single.html">Wooden skyscrapers are
                                                        springing up across the world</a></div>
                                                <div class="post-info">August 16, 2017</div>
                                            </article>

                                            <!--Widget Post-->
                                            <article class="widget-post">
                                                <figure class="post-thumb"><a href="blog-single.html"><img src="images/resource/post-thumb-6.jpg" alt=""></a></figure>
                                                <div class="text"><a href="blog-single.html">New York state and
                                                        california are also close to cracking</a></div>
                                                <div class="post-info">August 17, 2017</div>
                                            </article>

                                        </div>

                                        <div class="column col-lg-6 col-md-6 col-sm-12">

                                            <!--News Block Two-->
                                            <div class="news-block-two with-margin">
                                                <div class="inner-box">
                                                    <div class="image">
                                                        <a href="blog-single.html"><img src="images/resource/news-6.jpg" alt="" /></a>
                                                        <div class="category"><a href="blog-single.html">Design</a>
                                                        </div>
                                                    </div>
                                                    <div class="lower-box">
                                                        <h3><a href="blog-single.html">A great personality in the world,
                                                                What he use for his personality ?</a></h3>
                                                        <ul class="post-meta">
                                                            <li><span class="icon fa fa-clock-o"></span>March 27, 2017
                                                            </li>
                                                            <li><span class="icon fa fa-comment-o"></span>4</li>
                                                            <li><span class="icon fa fa-eye"></span>5740</li>
                                                        </ul>
                                                        <div class="text">Lorem ipsum dolor sit amet, consectetuer
                                                            adipiscing elit doli. Aenean commodo ligula eget dolor.
                                                            Aenean massa. Cumtipsu sociis natoque penatibus et magnis
                                                            dis montesti, nascetur ridiculus mus. Donec quam…</div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!--Widget Post-->
                                            <article class="widget-post">
                                                <figure class="post-thumb"><a href="blog-single.html"><img src="images/resource/post-thumb-7.jpg" alt=""></a></figure>
                                                <div class="text"><a href="blog-single.html">Critics of sites like
                                                        Airbnb have long claimed that the remove</a></div>
                                                <div class="post-info">August 18, 2017</div>
                                            </article>

                                            <!--Widget Post-->
                                            <article class="widget-post">
                                                <figure class="post-thumb"><a href="blog-single.html"><img src="images/resource/post-thumb-8.jpg" alt=""></a></figure>
                                                <div class="text"><a href="blog-single.html">Six of the displaced Food
                                                        filed a lawsuit against</a></div>
                                                <div class="post-info">August 19, 2017</div>
                                            </article>

                                        </div>
                                    </div>
                                </div>

                                <div class="slide">
                                    <div class="row clearfix">
                                        <div class="column col-lg-6 col-md-6 col-sm-12">

                                            <!--News Block Two-->
                                            <div class="news-block-two with-margin">
                                                <div class="inner-box">
                                                    <div class="image">
                                                        <a href="blog-single.html"><img src="images/resource/news-5.jpg" alt="" /></a>
                                                        <div class="category"><a href="blog-single.html">Sports</a>
                                                        </div>
                                                    </div>
                                                    <div class="lower-box">
                                                        <h3><a href="blog-single.html">Wooden skyscrapers are springing
                                                                up across the world universal</a></h3>
                                                        <ul class="post-meta">
                                                            <li><span class="icon fa fa-clock-o"></span>March 26, 2017
                                                            </li>
                                                            <li><span class="icon fa fa-comment-o"></span>3</li>
                                                            <li><span class="icon fa fa-eye"></span>7420</li>
                                                        </ul>
                                                        <div class="text">Lorem ipsum dolor sit amet, consectetuer
                                                            adipiscing elit doli. Aenean commodo ligula eget dolor.
                                                            Aenean massa. Cumtipsu sociis natoque penatibus et magnis
                                                            dis montesti, nascetur ridiculus mus. Donec quam…</div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!--Widget Post-->
                                            <article class="widget-post">
                                                <figure class="post-thumb"><a href="blog-single.html"><img src="images/resource/post-thumb-5.jpg" alt=""></a></figure>
                                                <div class="text"><a href="blog-single.html">Wooden skyscrapers are
                                                        springing up across the world</a></div>
                                                <div class="post-info">August 16, 2017</div>
                                            </article>

                                            <!--Widget Post-->
                                            <article class="widget-post">
                                                <figure class="post-thumb"><a href="blog-single.html"><img src="images/resource/post-thumb-6.jpg" alt=""></a></figure>
                                                <div class="text"><a href="blog-single.html">New York state and
                                                        california are also close to cracking</a></div>
                                                <div class="post-info">August 17, 2017</div>
                                            </article>

                                        </div>

                                        <div class="column col-lg-6 col-md-6 col-sm-12">

                                            <!--News Block Two-->
                                            <div class="news-block-two with-margin">
                                                <div class="inner-box">
                                                    <div class="image">
                                                        <a href="blog-single.html"><img src="images/resource/news-6.jpg" alt="" /></a>
                                                        <div class="category"><a href="blog-single.html">Design</a>
                                                        </div>
                                                    </div>
                                                    <div class="lower-box">
                                                        <h3><a href="blog-single.html">A great personality in the world,
                                                                What he use for his personality ?</a></h3>
                                                        <ul class="post-meta">
                                                            <li><span class="icon fa fa-clock-o"></span>March 27, 2017
                                                            </li>
                                                            <li><span class="icon fa fa-comment-o"></span>4</li>
                                                            <li><span class="icon fa fa-eye"></span>5740</li>
                                                        </ul>
                                                        <div class="text">Lorem ipsum dolor sit amet, consectetuer
                                                            adipiscing elit doli. Aenean commodo ligula eget dolor.
                                                            Aenean massa. Cumtipsu sociis natoque penatibus et magnis
                                                            dis montesti, nascetur ridiculus mus. Donec quam…</div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!--Widget Post-->
                                            <article class="widget-post">
                                                <figure class="post-thumb"><a href="blog-single.html"><img src="images/resource/post-thumb-7.jpg" alt=""></a></figure>
                                                <div class="text"><a href="blog-single.html">Critics of sites like
                                                        Airbnb have long claimed that the remove</a></div>
                                                <div class="post-info">August 18, 2017</div>
                                            </article>

                                            <!--Widget Post-->
                                            <article class="widget-post">
                                                <figure class="post-thumb"><a href="blog-single.html"><img src="images/resource/post-thumb-8.jpg" alt=""></a></figure>
                                                <div class="text"><a href="blog-single.html">Six of the displaced Food
                                                        filed a lawsuit against</a></div>
                                                <div class="post-info">August 19, 2017</div>
                                            </article>

                                        </div>
                                    </div>
                                </div>

                                <div class="slide">
                                    <div class="row clearfix">
                                        <div class="column col-lg-6 col-md-6 col-sm-12">

                                            <!--News Block Two-->
                                            <div class="news-block-two with-margin">
                                                <div class="inner-box">
                                                    <div class="image">
                                                        <a href="blog-single.html"><img src="images/resource/news-5.jpg" alt="" /></a>
                                                        <div class="category"><a href="blog-single.html">Sports</a>
                                                        </div>
                                                    </div>
                                                    <div class="lower-box">
                                                        <h3><a href="blog-single.html">Wooden skyscrapers are springing
                                                                up across the world universal</a></h3>
                                                        <ul class="post-meta">
                                                            <li><span class="icon fa fa-clock-o"></span>March 26, 2017
                                                            </li>
                                                            <li><span class="icon fa fa-comment-o"></span>3</li>
                                                            <li><span class="icon fa fa-eye"></span>7420</li>
                                                        </ul>
                                                        <div class="text">Lorem ipsum dolor sit amet, consectetuer
                                                            adipiscing elit doli. Aenean commodo ligula eget dolor.
                                                            Aenean massa. Cumtipsu sociis natoque penatibus et magnis
                                                            dis montesti, nascetur ridiculus mus. Donec quam…</div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!--Widget Post-->
                                            <article class="widget-post">
                                                <figure class="post-thumb"><a href="blog-single.html"><img src="images/resource/post-thumb-5.jpg" alt=""></a></figure>
                                                <div class="text"><a href="blog-single.html">Wooden skyscrapers are
                                                        springing up across the world</a></div>
                                                <div class="post-info">August 16, 2017</div>
                                            </article>

                                            <!--Widget Post-->
                                            <article class="widget-post">
                                                <figure class="post-thumb"><a href="blog-single.html"><img src="images/resource/post-thumb-6.jpg" alt=""></a></figure>
                                                <div class="text"><a href="blog-single.html">New York state and
                                                        california are also close to cracking</a></div>
                                                <div class="post-info">August 17, 2017</div>
                                            </article>

                                        </div>

                                        <div class="column col-lg-6 col-md-6 col-sm-12">

                                            <!--News Block Two-->
                                            <div class="news-block-two with-margin">
                                                <div class="inner-box">
                                                    <div class="image">
                                                        <a href="blog-single.html"><img src="images/resource/news-6.jpg" alt="" /></a>
                                                        <div class="category"><a href="blog-single.html">Design</a>
                                                        </div>
                                                    </div>
                                                    <div class="lower-box">
                                                        <h3><a href="blog-single.html">A great personality in the world,
                                                                What he use for his personality ?</a></h3>
                                                        <ul class="post-meta">
                                                            <li><span class="icon fa fa-clock-o"></span>March 27, 2017
                                                            </li>
                                                            <li><span class="icon fa fa-comment-o"></span>4</li>
                                                            <li><span class="icon fa fa-eye"></span>5740</li>
                                                        </ul>
                                                        <div class="text">Lorem ipsum dolor sit amet, consectetuer
                                                            adipiscing elit doli. Aenean commodo ligula eget dolor.
                                                            Aenean massa. Cumtipsu sociis natoque penatibus et magnis
                                                            dis montesti, nascetur ridiculus mus. Donec quam…</div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!--Widget Post-->
                                            <article class="widget-post">
                                                <figure class="post-thumb"><a href="blog-single.html"><img src="images/resource/post-thumb-7.jpg" alt=""></a></figure>
                                                <div class="text"><a href="blog-single.html">Critics of sites like
                                                        Airbnb have long claimed that the remove</a></div>
                                                <div class="post-info">August 18, 2017</div>
                                            </article>

                                            <!--Widget Post-->
                                            <article class="widget-post">
                                                <figure class="post-thumb"><a href="blog-single.html"><img src="images/resource/post-thumb-8.jpg" alt=""></a></figure>
                                                <div class="text"><a href="blog-single.html">Six of the displaced Food
                                                        filed a lawsuit against</a></div>
                                                <div class="post-info">August 19, 2017</div>
                                            </article>

                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <!--End Category-->
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
                                            <li data-tab="#prod-popular" class="tab-btn active-btn">Stories</li>
                                            <li data-tab="#prod-comment" class="tab-btn">Quick Bites</li>
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
                                <div class="copyright">&copy; Copyright Noor_tech. All rights reserved.</div>
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
