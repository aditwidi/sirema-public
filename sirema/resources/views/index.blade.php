<!DOCTYPE html>
<html class="no-js" lang="en">
<!--<![endif]-->

<head>

    <!--- basic page needs
    ================================================== -->
    <meta charset="utf-8">
    <title>Welcome to Sirema</title>
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- mobile specific metas
    ================================================== -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSS
    ================================================== -->
    <link rel="stylesheet" href="{{ asset("css/base.css") }}">
    <link rel="stylesheet" href="{{ asset("css/vendor.css") }}">
    <link rel="stylesheet" href="{{ asset("css/main.css") }}">

    <!-- script
    ================================================== -->
    <script src="{{ asset("js/modernizr.js") }}"></script>
    <script src="{{ asset("js/pace.min.js") }}"></script>

    <!-- favicons
    ================================================== -->
    <link rel="shortcut icon" href="{{ asset("/favicon.ico") }}" type="image/x-icon">
    <link rel="icon" type="image/x-icon" href="{{ asset('img/favicon/favicon.ico') }}">

</head>

<body id="top">

    <!-- header
    ================================================== -->
    <header class="s-header">

        <div class="header-logo">
            <a class="site-logo" href="{{ url()->current() }}">
                <img src="{{ asset("img/logo.png") }}" alt="Homepage">
            </a>
        </div>

        <nav class="header-nav">

            <a href="{{ url("#0") }}" class="header-nav__close" title="close"><span>Close</span></a>

            <div class="header-nav__content">
                <h3>Menu</h3>

                <ul class="header-nav__list">
                    <li class="current"><a class="smoothscroll"  href="{{ url("#home") }}" title="home">Home</a></li>
                    <li><a class="smoothscroll"  href="{{ url("#about") }}" title="about">About</a></li>
                    <li><a class="smoothscroll"  href="{{ url("#services") }}" title="services">Services</a></li>
                    <li><a class="smoothscroll"  href="{{ url("#works") }}" title="works">Works</a></li>
                    <!-- <li><a class="smoothscroll"  href="#clients" title="clients">Clients</a></li> -->
                    <li><a class="smoothscroll"  href="{{ url("#contact") }}" title="contact">Contact</a></li>
                </ul>

                <ul class="header-nav__social">
                    <li>
                        <a href="{{ url("https://www.facebook.com/MKSTIS") }}" target="_blank"><i class="fa fa-facebook"></i></a>
                    </li>
                    <li>
                        <a href="{{ url("https://twitter.com/MediaKampusSTIS") }}" target="_blank"><i class="fa fa-twitter"></i></a>
                    </li>
                    <li>
                        <a href="{{ url("https://instagram.com/mkstis") }}" target="_blank"><i class="fa fa-instagram"></i></a>
                    </li>
                </ul>

            </div> <!-- end header-nav__content -->

        </nav>  <!-- end header-nav -->

        <a class="header-menu-toggle" href="{{ url("#0") }}">
            <span class="header-menu-text">Menu</span>
            <span class="header-menu-icon"></span>
        </a>

    </header> <!-- end s-header -->


    <!-- home
    ================================================== -->
    <section id="home" class="s-home target-section" data-parallax="scroll" data-image-src="img/hero-bg2.png" data-natural-width=3000 data-natural-height=2000 data-position-y=center>

        <div class="overlay"></div>
        <div class="shadow-overlay"></div>

        <div class="home-content">

            <div class="row home-content__main">

                <h3>Welcome to Sirema</h3>

                <h1>
                    Temukan bagaimana kami <br>
                    dapat mengubah impian <br>
                    kreatif Anda menjadi <br>
                    kenyataan.
                </h1>

                <div class="home-content__buttons">
                    <a href="{{ route('login') }}" class="btn btn--stroke">
                        Mulai Request
                    </a>
                    <a href="{{ url("#about") }}" class="smoothscroll btn btn--stroke">
                        Tentang Kami
                    </a>
                </div>

            </div>

            <div class="home-content__scroll">
                <a href="{{ url("#about") }}" class="scroll-link smoothscroll">
                    <span>Scroll Down</span>
                </a>
            </div>

            <div class="home-content__line"></div>

        </div> <!-- end home-content -->


        <ul class="home-social">
            <li>
                <a href="{{ url("https://www.facebook.com/MKSTIS") }}" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i><span>Facebook</span></a>
            </li>
            <li>
                <a href="{{ url("https://twitter.com/MediaKampusSTIS") }}" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i><span>Twiiter</span></a>
            </li>
            <li>
                <a href="{{ url("https://instagram.com/mkstis") }}" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i><span>Instagram</span></a>
            </li>
        </ul>
        <!-- end home-social -->

    </section> <!-- end s-home -->


    <!-- about
    ================================================== -->
    <section id='about' class="s-about">

        <div class="row section-header has-bottom-sep" data-aos="fade-up">
            <div class="col-full">
                <h3 class="subhead subhead--dark">Hello There</h3>
                <h1 class="display-1 display-1--light">We Are Media Kampus</h1>
            </div>
        </div> <!-- end section-header -->

        <div class="row about-desc" data-aos="fade-up" style="color: white;">
            <div class="col-full">
                <p>
                    UKM Media Kampus adalah wadah komunikasi dan kreativitas yang berlokasi di Politeknik Statistika STIS, berperan penting dalam menjalankan fungsi jurnalistik untuk dokumentasi dan publikasi berbagai kegiatan internal maupun eksternal yang terkait dengan institusi. Sebagai salah satu pilar penting dalam komunikasi dan informasi, UKM Media Kampus juga mengemban peran sebagai Humas Politeknik STIS, memastikan terjalinnya komunikasi yang baik antara institusi dengan pihak-pihak terkait.
                </p>
            </div>
        </div> <!-- end about-desc -->

        <div class="row about-stats stats block-1-4 block-m-1-2 block-mob-full" data-aos="fade-up">

            <div class="col-block stats__col ">
                <div class="stats__count">64</div>
                <h5>Total Angkatan</h5>
            </div>
            <div class="col-block stats__col">
                <div class="stats__count">57</div>
                <h5>Jumlah Anggota</h5>
            </div>
            <div class="col-block stats__col">
                <div class="stats__count">100+</div>
                <h5>Project Terselesaikan</h5>
            </div>
            <div class="col-block stats__col">
                <div class="stats__count">50+</div>
                <h5>Klien Terlayani</h5>
            </div>

        </div> <!-- end about-stats -->

        <div class="about__line"></div>

    </section> <!-- end s-about -->


    <!-- services
    ================================================== -->
    <section id='services' class="s-services">

        <div class="row section-header has-bottom-sep" data-aos="fade-up">
            <div class="col-full">
                <h3 class="subhead">What We Do</h3>
                <h1 class="display-2">Capturing Moments, Creating Memories, and Bringing Your Story to Life</h1>
            </div>
        </div> <!-- end section-header -->

        <div class="row services-list block-1-2 block-tab-full">

            <div class="col-block service-item" data-aos="fade-up">
                <div class="service-icon">
                    <i class="fa fa-camera"></i>
                </div>
                <div class="service-text" style="text-align:justify;">
                    <h3 class="h2">Liputan</h3>
                    <p>
                        Melakukan pemberitaan suatu peristiwa
                        dengan cara mengabadikannya dalam bentuk foto.
                        Foto-foto tersebut menyampaikan informasi
                        berupa gambar kepada khalayak tanpa proses
                        pengeditan yang berlebihan dengan tujuan
                        tetap menjaga fakta yang terkandung pada foto-foto tersebut.
                    </p>
                </div>
            </div>

            <div class="col-block service-item" data-aos="fade-up">
                <div class="service-icon">
                    <i class="fa fa-pencil"></i>
                </div>
                <div class="service-text" style="text-align:justify;">
                    <h3 class="h2">Kepenulisan</h3>
                    <p>
                        Membuat karya tulis yang menarik dan informatif.
                        Divisi kepenulisan mengolah dan menyajikan informasi 
                        dalam bentuk artikel. Tidak hanya artikel,
                        divisi ini juga kerap menghasilkan karya sastra, 
                        seperti puisi dan cerita pendek.
                    </p>
                </div>
            </div>

            <div class="col-block service-item" data-aos="fade-up">
                <div class="service-icon">
                    <i class="fa fa-laptop"></i>
                </div>
                <div class="service-text" style="text-align:justify;">
                    <h3 class="h2">Design</h3>
                    <p>
                        Menggunakan gambar untuk menyampaikan informasi
                        seefektif mungkin. Divisi ini mendesain 
                        publikasi yang rapi dan menarik, sehingga publik 
                        lebih tertarik untuk mengetahui suatu informasi.
                        Divisi ini juga kerap menghasilkan karya grafis
                        di luar konteks publikasi. 
                    </p>
                </div>
            </div>

            <div class="col-block service-item" data-aos="fade-up">
                <div class="service-icon">
                    <i class="fa fa-youtube-play"></i>
                </div>
                <div class="service-text" style="text-align:justify;">
                    <h3 class="h2">Video</h3>
                    <p>
                        Bergerak dalam bidang pembuatan video. 
                        Video ialah teknologi pengiriman sinyal 
                        elektronik dari suatu gambar bergerak.
                        Divisi ini melakukan pengambilan video, 
                        pengeditan video, ataupun keduanya sekaligus.
                    </p>
                </div>
            </div>

            <!-- <div class="col-block service-item" data-aos="fade-up">
                <div class="service-icon">
                    <i class="icon-cube"></i>
                </div>
                <div class="service-text">
                    <h3 class="h2">Packaging Design</h3>
                    <p>Nemo cupiditate ab quibusdam quaerat impedit magni. Earum suscipit ipsum laudantium.
                    Quo delectus est. Maiores voluptas ab sit natus veritatis ut. Debitis nulla cumque veritatis.
                    Sunt suscipit voluptas ipsa in tempora esse soluta sint.
                    </p>
                </div>
            </div> -->

            <!-- <div class="col-block service-item" data-aos="fade-up">
                <div class="service-icon"><i class="icon-lego-block"></i></div>
                <div class="service-text">
                    <h3 class="h2">Web Development</h3>
                    <p>Nemo cupiditate ab quibusdam quaerat impedit magni. Earum suscipit ipsum laudantium.
                    Quo delectus est. Maiores voluptas ab sit natus veritatis ut. Debitis nulla cumque veritatis.
                    Sunt suscipit voluptas ipsa in tempora esse soluta sint.
                    </p>
                </div>
            </div> -->

        </div> <!-- end services-list -->

    </section> <!-- end s-services -->


    <!-- works
    ================================================== -->
    <section id='works' class="s-works">

        <div class="intro-wrap">

            <div class="row section-header has-bottom-sep light-sep" data-aos="fade-up">
                <div class="col-full">
                    <h3 class="subhead">Recent Works</h3>
                    <h1 class="display-2 display-2--light">Check out some of our latest works</h1>
                </div>
            </div> <!-- end section-header -->

        </div> <!-- end intro-wrap -->

        <div class="row works-content">
            <div class="col-full masonry-wrap">
                <div class="masonry">

                    <div class="masonry__brick" data-aos="fade-up">
                        <div class="item-folio">

                            <div class="item-folio__thumb">
                                <a href="{{ url("img/portfolio/gallery/f38.jpg") }}" class="thumb-link" title="By Awika Yuliati" data-size="2304x4096">
                                    <img src="{{ asset("img/portfolio/f38_1x.jpg") }}"
                                         srcset="img/portfolio/f38_1x.jpg 1x, img/portfolio/f38_2x.jpg 2x" alt="">
                                </a>
                            </div>

                            <div class="item-folio__text">
                                <h3 class="item-folio__title">
                                    Galeri Karya
                                </h3>
                                <p class="item-folio__cat">
                                    By Awika Yuliati
                                </p>
                            </div>

                            <a href="https://www.behance.net/" class="item-folio__project-link" title="Project link">
                                <i class="icon-link"></i>
                            </a>

                            <div class="item-folio__caption">
                                <p>Fotografi oleh Awika Yuliati</p>
                            </div>

                        </div>
                    </div> <!-- end masonry__brick -->

                    <div class="masonry__brick" data-aos="fade-up">
                        <div class="item-folio">

                            <div class="item-folio__thumb">
                                <a href="{{ url("img/portfolio/gallery/d7.jpg") }}" class="thumb-link" title="By Ferzya Dhea S. D." data-size="4000x2250">
                                    <img src="{{ asset("img/portfolio/d7_1x.jpg") }}"
                                         srcset="img/portfolio/d7_1x.jpg 1x, img/portfolio/d7_2x.jpg 2x" alt="">
                                </a>
                            </div>

                            <div class="item-folio__text">
                                <h3 class="item-folio__title">
                                    Galeri Karya
                                </h3>
                                <p class="item-folio__cat">
                                    By Ferzya Dhea S. D.
                                </p>
                            </div>

                            <a href="https://www.behance.net/" class="item-folio__project-link" title="Project link">
                                <i class="icon-link"></i>
                            </a>

                            <div class="item-folio__caption">
                                <p>Desain Grafis oleh Ferzya Dhea S. D.</p>
                            </div>

                        </div>
                    </div> <!-- end masonry__brick -->

                    <div class="masonry__brick" data-aos="fade-up">
                        <div class="item-folio">

                            <div class="item-folio__thumb">
                                <a href="{{ url("img/portfolio/gallery/Maret23_d18_1.png") }}" class="thumb-link" title="By Bela Novita Sari" data-size="1920x1080">
                                    <img src="{{ asset("img/portfolio/Maret23_d18_1x.png") }}"
                                         srcset="img/portfolio/Maret23_d18_1x.png 1x, img/portfolio/Maret23_d18_2x.png 2x" alt="">
                                </a>
                            </div>

                            <div class="item-folio__text">
                                <h3 class="item-folio__title">
                                    Galeri Karya
                                </h3>
                                <p class="item-folio__cat">
                                    By Bela Novita Sari
                                </p>
                            </div>

                            <a href="https://www.behance.net/" class="item-folio__project-link" title="Project link">
                                <i class="icon-link"></i>
                            </a>

                            <div class="item-folio__caption">
                                <p>Desain Grafis oleh Bela Novita Sari</p>
                            </div>

                        </div>
                    </div> <!-- end masonry__brick -->

                    <div class="masonry__brick" data-aos="fade-up">
                        <div class="item-folio">

                            <div class="item-folio__thumb">
                                <a href="{{ url("img/portfolio/gallery/d10.png") }}" class="thumb-link" title="By Siti Mutiah R. U." data-size="1920x1080">
                                    <img src="{{ asset("img/portfolio/d10_1x.png") }}"
                                         srcset="img/portfolio/d10_1x.png 1x, img/portfolio/d10_2x.png 2x" alt="">
                                </a>
                            </div>

                            <div class="item-folio__text">
                                <h3 class="item-folio__title">
                                    Galeri Karya
                                </h3>
                                <p class="item-folio__cat">
                                    By Siti Mutiah R. U.
                                </p>
                            </div>

                            <a href="https://www.behance.net/" class="item-folio__project-link" title="Project link">
                                <i class="icon-link"></i>
                            </a>

                            <div class="item-folio__caption">
                                <p>Desain Grafis oleh Siti Mutiah R. U.</p>
                            </div>

                        </div>
                    </div> <!-- end masonry__brick -->

                    <div class="masonry__brick" data-aos="fade-up">
                        <div class="item-folio">

                            <div class="item-folio__thumb">
                                <a href="{{ url("img/portfolio/gallery/f29.jpg") }}" class="thumb-link" title="By Jasmine A. H." data-size="1215x2160">
                                    <img src="{{ asset("img/portfolio/f29_1x.jpg") }}"
                                         srcset="img/portfolio/f29_1x.jpg 1x, img/portfolio/f29_2x.jpg 2x" alt="">
                                </a>
                            </div>

                            <div class="item-folio__text">
                                <h3 class="item-folio__title">
                                    Galeri Karya
                                </h3>
                                <p class="item-folio__cat">
                                    By Jasmine A. H.
                                </p>
                            </div>

                            <a href="https://www.behance.net/" class="item-folio__project-link" title="Project link">
                                <i class="icon-link"></i>
                            </a>

                            <div class="item-folio__caption">
                                <p>Fotografi oleh Jasmine A. H.</p>
                            </div>

                        </div>
                    </div> <!-- end masonry__brick -->

                    <div class="masonry__brick" data-aos="fade-up">
                        <div class="item-folio">

                            <div class="item-folio__thumb">
                                <a href="{{ url("img/portfolio/gallery/bs19.png") }}" class="thumb-link" title="Buletin Statistik" data-size="423x598">
                                    <img src="{{ asset("img/portfolio/bs19.png") }}"
                                         srcset="img/portfolio/bs19_1x.png 1x, img/portfolio/bs19_2x.png 2x" alt="">
                                </a>
                            </div>

                            <div class="item-folio__text">
                                <h3 class="item-folio__title">
                                    Buletin Statistik
                                </h3>
                                <p class="item-folio__cat">
                                    Perubahan STIS Menjadi Polstat STIS
                                </p>
                            </div>

                            <a href="https://www.behance.net/" class="item-folio__project-link" title="Project link">
                                <i class="icon-link"></i>
                            </a>

                            <div class="item-folio__caption">
                                <p>New Identity New History</p>
                            </div>

                        </div>
                    </div> <!-- end masonry__brick -->

                </div> <!-- end masonry -->
            </div> <!-- end col-full -->
        </div> <!-- end works-content -->

    </section> <!-- end s-works -->

    <!-- contact
    ================================================== -->
    <section id="contact" class="s-contact">

        <div class="overlay"></div>
        <div class="contact__line"></div>

        <div class="row section-header" data-aos="fade-up">
            <div class="col-full">
                <h3 class="subhead">Contact Us</h3>
                <h1 class="display-2 display-2--light">Reach out for a new project or just say hello</h1>
            </div>
        </div>

        <div class="row contact-content" data-aos="fade-up">

            

            <div class="contact-secondary">
                <div class="contact-info">

                    <h3 class="h6 hide-on-fullwidth">Contact Info</h3>

                    <div class="cinfo">
                        <h5>Where to Find Us</h5>
                        <p>
                            Jl. Otto Iskandardinata No.64C<br>
                            Bidara Cina, Jatinegara, Jakarta Timur<br>
                        </p>
                    </div>

                    <div class="cinfo">
                        <h5>Email Us At</h5>
                        <p>
                            mediakampus@stis.ac.id<br>

                        </p>
                    </div>

                    <ul class="contact-social">
                        <li>
                            <a href="{{ url("https://www.facebook.com/MKSTIS") }}" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                        </li>
                        <li>
                            <a href="{{ url("https://twitter.com/MediaKampusSTIS") }}" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                        </li>
                        <li>
                            <a href="{{ url("https://instagram.com/mkstis") }}" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                        </li>
                    </ul> <!-- end contact-social -->

                </div> <!-- end contact-info -->
            </div> <!-- end contact-secondary -->

        </div> <!-- end contact-content -->

    </section> <!-- end s-contact -->


    <!-- footer
    ================================================== -->
    <footer>

        <div class="row footer-main">

            <div class="col-six tab-full left footer-desc">

                <div class="footer-logo"></div>
                UKM Media Kampus adalah UKM pada Politeknik Statistika yang bergerak di
                bidang Fotografi, Videografi, Desain Grafis, serta Reportase dan Kepenulisan.
                UKM ini menyediakan permintaan jasa seperti Liputan maupun
                Desain dari mahasiswa maupun dosen.

            </div>

            <div class="col-six tab-full right footer-subscribe">

                <h4>Get Notified</h4>
                <p>Dapatkan Pemberitahuan Terbaru di Sirema! Dapatkan informasi terkini tentang project yang kami lakukan. Jadilah yang pertama tahu dan jangan lewatkan perkembangan terbaru. Bergabunglah dengan komunitas kami untuk mendapatkan aliran informasi yang lancar, tepat di ujung jari Anda.</p>

                <!-- <div class="subscribe-form">
                    <form id="mc-form" class="group" novalidate="true">
                        <input type="email" value="" name="EMAIL" class="email" id="mc-email" placeholder="Email Address" required="">
                        <input type="submit" name="subscribe" value="Subscribe">
                        <label for="mc-email" class="subscribe-message"></label>
                    </form>
                </div> -->

            </div>

        </div> <!-- end footer-main -->

        <div class="row footer-bottom">

            <div class="col-twelve">
                <div class="copyright">
                    <span>© SIREMA 2023</span>
                    <!-- <span>Site Template by <a href="https://www.colorlib.com/">Colorlib</a></span>	 -->
                </div>

                <div class="go-top">
                    <a class="smoothscroll" title="Back to Top" href="{{ url("#top") }}"><i class="icon-arrow-up" aria-hidden="true"></i></a>
                </div>
            </div>

        </div> <!-- end footer-bottom -->

    </footer> <!-- end footer -->


    <!-- photoswipe background
    ================================================== -->
    <div aria-hidden="true" class="pswp" role="dialog" tabindex="-1">

        <div class="pswp__bg"></div>
        <div class="pswp__scroll-wrap">

            <div class="pswp__container">
                <div class="pswp__item"></div>
                <div class="pswp__item"></div>
                <div class="pswp__item"></div>
            </div>

            <div class="pswp__ui pswp__ui--hidden">
                <div class="pswp__top-bar">
                    <div class="pswp__counter"></div><button class="pswp__button pswp__button--close" title="Close (Esc)"></button> <button class="pswp__button pswp__button--share" title=
                    "Share"></button> <button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button> <button class="pswp__button pswp__button--zoom" title=
                    "Zoom in/out"></button>
                    <div class="pswp__preloader">
                        <div class="pswp__preloader__icn">
                            <div class="pswp__preloader__cut">
                                <div class="pswp__preloader__donut"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
                    <div class="pswp__share-tooltip"></div>
                </div><button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)"></button> <button class="pswp__button pswp__button--arrow--right" title=
                "Next (arrow right)"></button>
                <div class="pswp__caption">
                    <div class="pswp__caption__center"></div>
                </div>
            </div>

        </div>

    </div> <!-- end photoSwipe background -->


    <!-- preloader
    ================================================== -->
    <div id="preloader">
        <div id="loader">
            <div class="line-scale-pulse-out">
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
            </div>
        </div>
    </div>


    <!-- Java Script
    ================================================== -->
    <script src="{{ asset("js/jquery-3.2.1.min.js") }}"></script>
    <script src="{{ asset("js/plugins.js") }}"></script>
    <script src="{{ asset("js/index.js") }}"></script>

</body>

</html>
