<!doctype html>
<html class="no-js" lang="zxx">

    <head>

        <!--========= Required meta tags =========-->
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
        <!--====== Title ======-->
        <title>SIMDIG || KMS </title>
    
        <!--====== Favicon ======-->
        <link rel="shortcut icon" href="assets/images/logo/favicon.png" type="images/x-icon" />
    
        <!--====== CSS Here ======-->
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/css/animate.min.css">
        <link rel="stylesheet" href="assets/css/font-awesome.min.css">
        <link rel="stylesheet" href="assets/css/lightcase.css">
        <link rel="stylesheet" href="assets/css/meanmenu.css">
        <link rel="stylesheet" href="assets/css/nice-select.css">
        <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
        <link rel="stylesheet" href="assets/css/datepicker.min.css">
        <link rel="stylesheet" href="assets/css/jquery-ui.min.css">
        <link rel="stylesheet" href="assets/css/slick.css">
        <link rel="stylesheet" href="assets/css/default.css">
        <link rel="stylesheet" href="assets/css/style.css">
        <link rel="stylesheet" href="assets/css/responsive.css">
    
    </head>
    
    <body>
            <!-- preloader  -->
            <div id="preloader">
                <div id="ctn-preloader" class="ctn-preloader">
                    <div class="animation-preloader">
                        <div class="spinner"></div>
                        <div class="txt-loading">
                            <span data-text-preloader="P" class="letters-loading">
                                P
                            </span>
                            <span data-text-preloader="L" class="letters-loading">
                                L
                            </span>
                            <span data-text-preloader="K" class="letters-loading">
                                K
                            </span>
                            <span data-text-preloader="B" class="letters-loading">
                                B
                            </span>
                        </div>
                    </div>
                    <div class="loader">
                        <div class="row">
                            <div class="col-3 loader-section section-left">
                                <div class="bg"></div>
                            </div>
                            <div class="col-3 loader-section section-left">
                                <div class="bg"></div>
                            </div>
                            <div class="col-3 loader-section section-right">
                                <div class="bg"></div>
                            </div>
                            <div class="col-3 loader-section section-right">
                                <div class="bg"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- preloader end -->
            @include('guest.header')

    <!-- breadcrumb area start -->
    <section class="breadcrumb-area bg_img pb-160" data-overlay="8"
        data-background="assets/images/bg/crop.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb-content">
                        <h2 class="title">Materi Penyuluhan</h2>
                        <ul>
                            <li><a href="index.html">Home</a></li>
                            <li>|</li>
                            <li>Informasi</li>
                        </ul>
                        <h1 class="back-title">Penyuluhan</h1>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb area end -->

    <!-- blog-area start -->
    <div class="blog-area bg-2 pt-120 pb-120">
        <div class="container">
            <div class="row mt-none-30">
                @foreach($penyuluhan as $key => $data)
                <div class="col-xl-6 col-lg-6 col-sm-12 mt-30">
                    <div class="single-news-box">
                        <div class="thumb">
                            <img src="assets/images/service/med.jpg" alt="">
                        </div>
                        <div class="content">
                            <div class="news-meta-date">
                                <span>{{ ++$key }}</span>
                            </div>
                            <div class="news-meta">
                                <ul>
                                    <li><a href="#0"><i class="fal fa-calendar-day"></i> {{ $data->hari }}</a></li>
                                    <li><a href="#0"><i class="fal fa-calendar-alt"></i> {{ $data->tanggal }}</a></li>
                                </ul>
                            </div>
                            <h4 class="title"><a href="">{{ $data->materi }}</a></h4>
                            <a href="{{ $data->video }}" class="inline-btn"><i class="fal fa-video"></i> Lihat Video</a>
                            <span class="count">01</span>
                        </div>
                    </div>
                </div>
                @endforeach
                <div class="col-lg-12">
                    <div class="basic-pagination basic-pagination-2 mt-40">
                        <ul>
                            <li><a href="#0"><i class="fas fa-angle-double-left"></i></a></li>
                            <li><a href="#0">01</a></li>
                            <li class="active"><a href="#0">02</a></li>
                            <li><a href="#0">03</a></li>
                            <li><a href="#0"><i class="fas fa-ellipsis-h"></i></a></li>
                            <li><a href="#0"><i class="fas fa-angle-double-right"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- blog-area end -->
  
      <!-- footer area start -->
      <footer class="site-footer site-footer-2 site-footer-3">
        <div class="container">
            <div class="col-lg-12 text-center">
                <div class="copyright-text copyright-text-2">
                    <p>Copyright By@<span>SIMDIG KMS</span> - 2022</p>
                </div>
            </div>
        </div>
    </footer>
    <!-- footer area end -->

    

    <!--========= JS Here =========-->
    <script src="assets/js/jquery-2.2.4.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/counterup.min.js"></script>
    <script src="assets/js/datepicker.min.js"></script>
    <script src="assets/js/datepicker.en.js"></script>
    <script src="assets/js/jquery-ui.min.js"></script>
    <script src="assets/js/jquery.nice-select.min.js"></script>
    <script src="assets/js/lightcase.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/jquery.meanmenu.min.js"></script>
    <script src="assets/js/imagesloaded.pkgd.min.js"></script>
    <script src="assets/js/isotope.pkgd.min.js"></script>
    <script src="assets/js/wow.min.js"></script>
    <script src="assets/js/waypoint.js"></script>
    <script src="assets/js/main.js"></script>
</body>

</html>