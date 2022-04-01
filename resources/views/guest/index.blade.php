<!doctype html>
<html class="no-js" lang="zxx">

<head>

    <!--========= Required meta tags =========-->
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    
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

    <!-- hero area start -->
    <section class="hero-slider-area hero-slider-area-2 owl-carousel">
        <div class="single-hero-slide d-flex align-items-center">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 my-auto">
                        <div class="hero-content">
                            <h1 class="title" data-animation="fadeInUp" data-delay=".3s" data-duration=".5s">Sistem Informasi Digitasi KMS  <br>
                            <h3 class="sub-title" data-animation="fadeInUp" data-delay=".1s" data-duration=".3s">Untuk Memonitoring Gizi Bayi Balita.</h3>
                            <h5 class="sub-title" data-animation="fadeInUp" data-delay=".1s" data-duration=".3s">(PLKB Kecamatan Winongan Kabupate Pasuruan)</h5>
                            </h1>
                            <div class="hero-buttons">
                                <a href="{{ route('login') }}" class="site-btn" data-animation="fadeInUp" data-delay=".9s" data-duration=".7s">Login</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 d-none d-lg-block d-xl-block">
                        <div class="hero-slide-img">
                            <img src="assets/images/ilustration/ilustration-1.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="single-hero-slide d-flex align-items-center">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 my-auto">
                        <div class="hero-content">
                            <h1 class="title" data-animation="fadeInUp" data-delay=".3s" data-duration=".5s">Sistem Infromasi Digitasi KMS  <br>
                            <h4 class="sub-title" data-animation="fadeInUp" data-delay=".1s" data-duration=".3s">Untuk Memonitoring Gizi Bayi Balita.</h4>
                            <h5 class="sub-title" data-animation="fadeInUp" data-delay=".1s" data-duration=".3s">(PLKB Kecamatan Winongan Kabupate Pasuruan)</h5>
                            </h1>
                            <div class="hero-buttons">
                                <a href="service-details.html" class="site-btn" data-animation="fadeInUp" data-delay=".9s" data-duration=".7s">Login</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 d-none d-xl-block">
                        <div class="hero-slide-img">
                            <img src="assets/images/ilustration/ilustration-1.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- hero area end -->

    <!-- time-schedule area start -->
    {{-- <div class="time-schedule-area pt-50 pb-50">
        <div class="container">
            <div class="row mt-none-30">
                <div class="col-xl-3 col-lg-6 col-sm-6 mt-30">
                    <div class="single-time-schedule">
                        <div class="icon">
                            <i class="fal fa-arrow-down"></i>
                        </div>
                        <div class="content">
                            <h4 class="title">Select Time &amp; Date</h4>
                            <span>Mon - Fri: 8.00 - 16.00</span>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-sm-6 mt-30">
                    <div class="single-time-schedule">
                        <div class="icon">
                            <i class="fal fa-arrow-down"></i>
                        </div>
                        <div class="content">
                            <h4 class="title">Our Location</h4>
                            <span>Mon - Fri: 8.00 - 16.00</span>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-sm-6 mt-30">
                    <div class="single-time-schedule">
                        <div class="icon">
                            <i class="fal fa-arrow-up"></i>
                        </div>
                        <div class="content">
                            <h4 class="title">Our Top Doctors</h4>
                            <span>Rosalina D. William</span>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-sm-6 text-right mt-30">
                    <a href="contact.html" class="site-btn white">Get A Quote</a>
                </div>
            </div>
        </div>
    </div> --}}
    <!-- time-schedule area end -->
    <section class="feature-area pb-120">
        <div class="container feature-container">
            <div class="row justify-content-center">
                <div class="col-lg-6 col-md-8 col-sm-10 text-center">
                    <div class="section-heading mb-70">
                        <h2 class="section-title shape">Features</h2>
                        
                    </div>
                </div>
            </div>
            <div class="row justify-content-center mt-none-50">
                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-8 mt-50 text-center">
                    <div class="single-service-box">
                        <div class="icon">
                            <img src="assets/images/service/service-2-icon-1.png" alt="">
                        </div>
                        <div class="content">
                            <h4 class="title">Jadwal Posyandu</h4>
                            <p> Jadwal Posyandu di Kecamatan Wionongan</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-8 mt-50 text-center">
                    <div class="single-service-box">
                        <div class="icon">
                            <img src="assets/images/service/service-2-icon-4.png" alt="">
                        </div>
                        <div class="content">
                            <h4 class="title">Penyuluhan</h4>
                            <p>Materi Penyuluhan untuk Ibu Bayi/Balita</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- service area end -->

    <!-- about area start -->
    <section class="about-area about-area-2 about-area-3 pt-130 pb-145">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="about-thumb-wrap about-thumb-wrap-3 mt-60">
                        <div class="about-thumb-big">
                            <img src="assets/images/about/kantor.jpg" alt="">
                            <span class="shape">
                                <img src="assets/images/about/shape.png" alt="">
                            </span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about-content about-content-3">
                        <div class="section-heading mb-35">
                            <h4 class="sub-title">About Us</h4>
                            <h2 class="section-title">Penyuluh Lapangan Keluarga Berencana 
                            (PLKB)</h2>
                            <p>Penyuluh Lapangan Keluarga Berencana (PLKB) yang berlokasi di Jalan Raya Winongan Lor ,
                                Kecamatan Winongan, Kabupaten pasuruan merupakan suatu lembaga pemerintahan yang diberikan 
                                tugas, tanggungjawab, wewenang, dan hak secara penuh oleh pejabat yang berwenang untuk
                                melaksanakan kegiatan penyuluhan, pelayanan, evaluasi dan pengembangan KB nasional. 
                                Selain menangani pengembangan KB nasional, PLKB juga membawahi organisasi kesehatan seperti posyandu (Pos Pelayanan Terpadu).
                                Posyandu merupakan salah satu bentuk Upaya Kesehatan Bersumberdaya Masyarakat (UKBM) yang dilaksanakan oleh, dari dan bersama masyarakat, 
                                untuk memberdayakan dan memberikan kemudahan kepada masyarakat guna memperoleh
                                pelayanan kesehatan bagi ibu, bayi dan anak balita.</p>
                        </div>
                        <a href="{{route ('about')}}" class="site-btn transparent">Learn More</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- about area end -->

    <!-- department area start -->
    <section class="department-area department-area-2 bg-2 pt-110 pb-110">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 text-center">
                    <div class="section-heading mb-55">
                        <h4 class="sub-title">process</h4>
                        <h2 class="section-title">Ranah Kerja PLKB</h2>
                        <p>Ranah Kerja PLKB dalam bidang Kesehatan.</p>
                    </div>
                </div>
            </div>
            <div class="row mt-none-50">
                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 mt-50 text-center">
                    <div class="single-department single-department-2">
                        <div class="thumb-wrap">
                            <div class="shape"><img src="assets/images/icons/process-icon-shape-01.png" alt=""></div>
                            <div class="thumb">
                                <img src="assets/images/icons/process-icon-01.png" alt="">
                                <span class="count">01</span>
                            </div>
                        </div>
                        <div class="content">
                            <h4 class="title">Make Appointment</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod temp.</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 mt-50 text-center">
                    <div class="single-department single-department-2 small-box">
                        <div class="thumb-wrap">
                            <div class="shape"><img src="assets/images/icons/process-icon-shape-02.png" alt=""></div>
                            <div class="thumb">
                                <img src="assets/images/icons/process-icon-02.png" alt="">
                                <span class="count">02</span>
                            </div>
                        </div>
                        <div class="content">
                            <h4 class="title">Ready To Go</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod temp.</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 mt-50 text-center">
                    <div class="single-department single-department-2">
                        <div class="thumb-wrap extra-margin">
                            <div class="shape"><img src="assets/images/icons/process-icon-shape-03.png" alt=""></div>
                            <div class="thumb">
                                <img src="assets/images/icons/process-icon-03.png" alt="">
                                <span class="count">03</span>
                            </div>
                        </div>
                        <div class="content">
                            <h4 class="title">Get Consultant</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod temp.</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 mt-50 text-center">
                    <div class="single-department single-department-2 small-box">
                        <div class="thumb-wrap">
                            <div class="shape"><img src="assets/images/icons/process-icon-shape-04.png" alt=""></div>
                            <div class="thumb">
                                <img src="assets/images/icons/process-icon-04.png" alt="">
                                <span class="count">04</span>
                            </div>
                        </div>
                        <div class="content">
                            <h4 class="title">Get Relief</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod temp.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- department area end -->


    <!-- appointment start -->
    <section class="appointment-area appointment-area-3 pt-100 pb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="appointment-box appointment-box-3 bg-2">
                        <div class="row">
                            <div class="col-xl-7 col-lg-10">
                                <div class="section-heading">
                                    <h4 class="sub-title">With</h4>
                                    <h2 class="section-title">Bidan Desa <br> Kader<span>.</span></h2>
                                </div>
                            </div>
                        </div>
                        <div class="appointment-ilustration">
                            <img src="assets/images/ilustration/ilustration-2.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- appointment end -->

    <!-- pricing area start -->
    <section class="pricing-area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12 text-center">
                    <div class="section-heading mb-70">
                        <h4 class="sub-title">Dokumentasi</h4>
                        <h2 class="section-title">Dokumentasi Kegiatan<span>.</span></h2>
                    </div>
                </div>
            </div>
            
        </div>
    </section>
    <!-- pricing area end -->

   

    <!-- testimonial area start -->
    <div class="testimonial-area pt-140 pb-100 bg_img" data-background="assets/images/bg/testimonial-bg.jpeg">
        <div class="container">
            <div class="row justify-content-end">
                <div class="col-lg-7">
                    <div class="testimonial-wrap">
                        <div class="single-testimonial">
                            <div class="thumb">
                                <img src="assets/images/about/testimonial-authore-1.png" alt="">
                            </div>
                            <div class="content">
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing
                                elit, sed do eiusmod tempor incididunt ut labore et
                                dolore magna aliqua. Ut enim ad minim veniam.</p>
                                <h4 class="title">Rosalina D. William</h4>
                                <h5 class="sub-title">Founder, Coxer Co.</h5>
                            </div>
                        </div>
                        <div class="single-testimonial">
                            <div class="thumb">
                                <img src="assets/images/about/testimonial-authore-2.png" alt="">
                            </div>
                            <div class="content">
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing
                                elit, sed do eiusmod tempor incididunt ut labore et
                                dolore magna aliqua. Ut enim ad minim veniam.</p>
                                <h4 class="title">Kilixer D. Brawni</h4>
                                <h5 class="sub-title">Founder, Coxer Co.</h5>
                            </div>
                        </div>
                        <div class="single-testimonial">
                            <div class="thumb">
                                <img src="assets/images/about/testimonial-authore-3.png" alt="">
                            </div>
                            <div class="content">
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing
                                elit, sed do eiusmod tempor incididunt ut labore et
                                dolore magna aliqua. Ut enim ad minim veniam.</p>
                                <h4 class="title">Miranda H. Halimix</h4>
                                <h5 class="sub-title">Founder, Coxer Co.</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- testimonial area end -->

    <!-- news area start -->
    <section class="news-area bg-2 pt-110 pb-110">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 text-center">
                    <div class="section-heading mb-70">
                        <h4 class="sub-title">Materi Penyuluhan</h4>
                        <h2 class="section-title">Materi Penyluhan <span>.</span></h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod temp
                            or incididunt ut labore et dolore magna aliqua.</p>
                    </div>
                </div>
            </div>
            <div class="row mt-none-30">
                <div class="col-xl-4 col-lg-6 col-md-12 mt-30">
                    <div class="single-news-box">
                        <div class="thumb">
                            <img src="assets/images/blog/01.jpg" alt="">
                        </div>
                        <div class="content">
                            <div class="news-meta-date">
                                <span>23</span>
                                Mar
                            </div>
                            <div class="news-meta">
                                <ul>
                                    <li><a href="#0"><i class="fal fa-user"></i> Rosali D.</a></li>
                                    <li><a href="#0"><i class="fal fa-calendar-alt"></i> 24th Feb 2020</a></li>
                                </ul>
                            </div>
                            <h4 class="title"><a href="blog-details.html">The Medical Department Is
                                    Comprised Of Medical.</a></h4>
                            <a href="blog-details.html" class="inline-btn">Read More</a>
                            <span class="count">01</span>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-12 mt-30">
                    <div class="single-news-box">
                        <div class="thumb">
                            <img src="assets/images/blog/02.jpg" alt="">
                        </div>
                        <div class="content">
                            <div class="news-meta-date">
                                <span>10</span>
                                Feb
                            </div>
                            <div class="news-meta">
                                <ul>
                                    <li><a href="#0"><i class="fal fa-user"></i> Rosali D.</a></li>
                                    <li><a href="#0"><i class="fal fa-calendar-alt"></i> 24th Feb 2020</a></li>
                                </ul>
                            </div>
                            <h4 class="title"><a href="blog-details.html">With In-depth Experience In
                                    Broad Range Of Disease.</a></h4>
                            <a href="blog-details.html" class="inline-btn">Read More</a>
                            <span class="count">02</span>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-12 mt-30">
                    <div class="single-news-box">
                        <div class="thumb">
                            <img src="assets/images/blog/03.jpg" alt="">
                        </div>
                        <div class="content">
                            <div class="news-meta-date">
                                <span>04</span>
                                Mar
                            </div>
                            <div class="news-meta">
                                <ul>
                                    <li><a href="#0"><i class="fal fa-user"></i> Rosali D.</a></li>
                                    <li><a href="#0"><i class="fal fa-calendar-alt"></i> 24th Feb 2020</a></li>
                                </ul>
                            </div>
                            <h4 class="title"><a href="blog-details.html">Experience In A Broad Range
                                    of disease states.</a></h4>
                            <a href="blog-details.html" class="inline-btn">Read More</a>
                            <span class="count">03</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- news area end -->

    <!-- footer area start -->
    <footer class="site-footer site-footer-2 site-footer-3">
        <div class="container">
            <div class="col-lg-12 text-center">
                <div class="copyright-text copyright-text-2">
                    <p>Copyright By@<span>Example</span> - 2020</p>
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
    <script src="assets/js/slick.min.js"></script>
    <script src="assets/js/wow.min.js"></script>
    <script src="assets/js/waypoint.js"></script>
    <script src="assets/js/main.js"></script>
</body>

</html>