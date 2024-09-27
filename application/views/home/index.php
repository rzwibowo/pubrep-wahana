<!--
	Author: W3layouts
	Author URL: http://w3layouts.com
	License: Creative Commons Attribution 3.0 Unported
	License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html lang="en">
<!-- Head -->

<head>
    <title>Wahana Manjat.</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <meta name="keywords" content="Travel Zone a Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />

    <!-- //for-mobile-apps -->
    <link href="<?php echo base_url() ?>web/css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
    <link href="<?php echo base_url(); ?>assets/plugins/jquery-ui/jquery-ui.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url() ?>web/css/font-awesome.min.css" rel="stylesheet" type="text/css" media="all">
    <link href="<?php echo base_url(); ?>assets/plugins/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />

    <link rel="stylesheet" href="<?php echo base_url() ?>web/css/flexslider.css" type="text/css" media="screen" />

    <link href="<?php echo base_url() ?>web/css/style.css" rel="stylesheet" type="text/css" media="all" />

    <!-- <link href="<?php echo base_url() ?>web/css/simpleLightbox.css" rel="stylesheet" type="text/css" /> -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>web/lightgallery/css/lightgallery.min.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>web/slick/slick.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>web/slick/slick-theme.css" />
    <!--fonts-->
    <!-- <link href="//fonts.googleapis.com/css?family=Comfortaa:300,400,700&amp;subset=cyrillic,cyrillic-ext,greek,latin-ext,vietnamese" rel="stylesheet"> -->
    <link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese" rel="stylesheet">

    <!--//fonts-->
    <style>
        @font-face {
            font-family: 'Advent Pro';
            src: url('<?php echo base_url() ?>web/fonts/adventpro-regular.ttf') format('truetype')
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            font-family: 'Advent Pro', sans-serif;
        }

        @media only screen and (max-width: 767px) {
            .slick-slide {
                background-size: 100% !important;
                margin-top: 6em;
                padding-bottom: 0;
                background-position: center !important;
            }

            .slick-arrow {
                top: 65%;
            }
        }

        .slick-arrow {
            z-index: 999;
            height: 80px;
            width: 40px;
            background: rgb(117, 117, 117);
            opacity: .3;
            transition: all 1s;
        }

        .slick-arrow:hover {
            opacity: 1;
            background: rgb(117, 117, 117);
        }

        .slick-arrow:focus {
            opacity: .7;
            background: rgb(117, 117, 117);
        }

        .slick-prev {
            left: 0;
            background: linear-gradient(270deg, rgba(117, 117, 117, 0) 0%, rgba(117, 117, 117, 1) 30%, rgba(117, 117, 117, 1) 70%);
        }
        
        .slick-next {
            right: 0;
            background: linear-gradient(90deg, rgba(117, 117, 117, 0) 0%, rgba(117, 117, 117, 1) 30%, rgba(117, 117, 117, 1) 70%);
        }

        .slick-dots {
            bottom: 0;
        }

        .slick-dots button::before {
            color: rgba(127, 140, 141, 1.0) !important;
        }

        .swal2-popup {
            font-size: 1.6rem !important;
        }

        .contact label {
            text-shadow: 2px 2px 2px rgba(42, 42, 42, 0.8)
        }

        /* https://w3bits.com/css-masonry/ */
        /* The Masonry Container */
        .masonry {
            margin: 1.5em auto;
            max-width: 90vw;
        }

        /* The Masonry Brick */
        .masonry>.item {
            background: #fff;
            padding: .5em;
            display: block;
        }

        .masonry>.item:hover {
            transform: scale3d(1.1, 1.1, 1.1);
            opacity: .7;
        }

        .masonry>.item>img {
            width: 100%;
        }

        /* Masonry on large screens */
        @media only screen and (min-width: 1024px) {
            .masonry {
                column-count: 5;
            }
        }

        /* Masonry on medium-sized screens */
        @media only screen and (max-width: 1023px) and (min-width: 768px) {
            .masonry {
                column-count: 3;
            }
        }

        /* Masonry on small screens */
        @media only screen and (max-width: 767px) and (min-width: 540px) {
            .masonry {
                column-count: 2;
            }
        }

        #lg-counter>span {
            color: #999 !important;
        }
    </style>

</head>
<!-- //Head -->

<body>

    <!-- <div class="col-md-6 top-middle">
        <ul>
            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
        </ul>
    </div> -->

    <!--Header-->
    <div class="header" id="home">
        <!--Top-Bar-->
        <div class="top-bar">
            <div class="container-fluid">
                <div class="header-nav">
                    <nav class="navbar navbar-default">
                        <!-- Brand and toggle get grouped for better mobile display -->
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <h1><a class="navbar-brand" href="<?php echo base_url() ?>home">Wahana <span> Manjat</span></a></h1>
                        </div>
                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="collapse navbar-collapse nav-wil" id="bs-example-navbar-collapse-1">
                            <nav class="cl-effect-15" id="cl-effect-15">
                                <ul>
                                    <li><a href="#home" class="active" data-hover="Home">Home</a></li>
                                    <li><a href="#about" class="scroll" data-hover="Tentang">Tentang</a></li>
                                    <!-- <li><a href="#services" class="scroll" data-hover="Services">Services</a></li> -->
                                    <!-- <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-hover="Dropdown" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
                                        <ul class="dropdown-menu">
                                            <li><a href="#testimonials" class="scroll" data-hover="Testimonials">Testimonials</a></li>
                                        </ul>
                                    </li> -->
                                    <li><a href="#gallery" class="scroll" data-hover="Galeri">Galeri</a></li>
                                    <li><a href="#testimonials" class="scroll" data-hover="Testimoni">Testimoni</a></li>
                                    <li><a href="#contact" class="scroll" data-hover="Booking">Booking</a></li>
                                </ul>
                            </nav>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
        <!--//Top-Bar-->
        <!--Slider-->
        <div class="slider">
            <div class="callbacks_container">
                <div class="rslides" id="slider">
                    <?php foreach ($galeri as $g) { ?>
                        <div class="slider-info" style="background: url(<?php echo base_url() . 'assets/img/uploads/' . $g->nama_galeri ?>) no-repeat 0px 0px;"></div>
                    <?php } ?>
                </div>
                <!-- <div class="modal fade" id="myModal1" tabindex="-1" role="dialog"> -->
                <!-- Modal1 -->
                <!-- <div class="modal-dialog"> -->
                <!-- Modal content-->
                <!-- <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4>Travel Zone</h4>
                                <img src="<?php echo base_url() ?>web/images/b1.jpg" alt=" " class="img-responsive">
                                <h5>Lorem Ipsum</h5>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting.</p>
                            </div>
                        </div> -->
                <!-- </div>
                </div> -->
                <!-- //Modal1 -->
            </div>
            <div class="clearfix"></div>
        </div>

        <!--//Slider-->
    </div>
    <!--//Header-->

    <!-- About -->
    <div class="about" id="about">
        <div class="container">
            <h2 class="heading">Tentang Wahana Pendakian</h2>
            <div class="col-md-6 about-left">
                <p>
                    Gunung Prahu (terkadang dieja Gunung Prau) (2.565 mdpl) terletak di kawasan Dataran Tinggi Dieng,
                    Jawa Tengah, Indonesia. Gunung Prahu terletak pada koordinat 7°11′13″S 109°55′22″E. Gunung Prahu
                    merupakan tapal batas antara tiga kabupaten yaitu Kabupaten Batang, Kabupaten Kendal dan Kabupaten Wonosobo.
                </p>
                <p>
                    Puncak Gunung Prahu merupakan padang rumput luas yang memanjang dari barat ke timur. Bukit-bukit kecil dan
                    sabana dengan sedikit pepohonan dapat kita jumpai di puncak. Gunung Prahu merupakan puncak tertinggi di kawasan
                    Dataran Tinggi Dieng, dengan beberapa puncak yang lebih rendah di sekitarnya, antara lain Gunung Sipandu, Gunung
                    Pangamun-amun, dan Gunung Juranggrawah.
                </p>
            </div>
            <div class="col-md-6 about-right">
                <img src="<?php echo base_url() ?>web/images/b1.jpg" alt="">
                <div class="about-right1">
                    <img src="<?php echo base_url() ?>web/images/b.jpg" alt="">
                </div>
                <div class="about-right2">
                    <img src="<?php echo base_url() ?>web/images/bb.jpg" alt="">
                </div>
            </div>

            <div class="clearfix"></div>
        </div>
    </div>
    <!-- //About -->

    <!-- video starts here -->
    <div data-vide-bg="<?php echo base_url() ?>web/video/Ipad">
        <div class="center-container">
            <div class="video-info">
                <div class="container">
                    <h3 class="heading1">Pemandangan Alam Menakjubkan</h3>
                    <p>Gunung Prahu (terkadang dieja Gunung Prau) (2.565 mdpl) terletak di kawasan Dataran Tinggi Dieng,
                        Jawa Tengah, Indonesia. Gunung Prahu terletak pada koordinat 7°11′13″S 109°55′22″E. Gunung Prahu
                        merupakan tapal batas antara tiga kabupaten yaitu Kabupaten Batang, Kabupaten Kendal dan Kabupaten Wonosobo.</p>
                    <ul>
                        <!-- <li><a href="#contact" class="scroll w3l_contact">Contact Us</a></li> -->
                        <!-- <li><a href="#" class="w3ls_more" data-toggle="modal" data-target="#myModal1">Read More</a></li> -->
                        <li><a href="#contact" class="scroll w3l_contact">Booking Sekarang</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- video ends here -->

    <!-- Services -->
    <!-- <div class="services agileits w3layouts" id="services">
        <div class="container">
            <h3 class="heading">Services</h3>
            <div class="col-md-6 col-sm-6 agileits w3layouts services-grid services-grid-1">
                <div class="col-md-4 col-sm-4 agileits w3layouts services-info services-info-1">
                    <i class="fa fa-plane" aria-hidden="true"></i>
                    <h4 class="agileits w3layouts">PLANE</h4>
                </div>
                <div class="col-md-4 col-sm-4 agileits w3layouts services-info services-info-2">
                    <i class="fa fa-taxi" aria-hidden="true"></i>
                    <h4 class="agileits w3layouts">TAXI</h4>
                </div>
                <div class="col-md-4 col-sm-4 services-info agileits w3layouts services-info-3">
                    <i class="fa fa-subway" aria-hidden="true"></i>
                    <h4 class="agileits w3layouts">SUBWAY</h4>
                </div>
                <div class="col-md-4 agileits w3layouts col-sm-4 services-info services-info-4">
                    <i class="fa fa-motorcycle" aria-hidden="true"></i>
                    <h4 class="agileits w3layouts">MOTORCYCLE</h4>
                </div>
                <div class="col-md-4 col-sm-4 services-info services-info-5 agileits w3layouts">
                    <i class="fa fa-ship" aria-hidden="true"></i>
                    <h4 class="agileits w3layouts">SHIP</h4>
                </div>
                <div class="col-md-4 agileits w3layouts col-sm-4 services-info services-info-6">
                    <i class="fa fa-globe" aria-hidden="true"></i>
                    <h4 class="agileits w3layouts">WORLD</h4>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="col-md-6 agileits w3layouts col-sm-6 services-grid services-grid-2">
                <h4 class="agileits w3layouts">Porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit beguiled
                    and demoralized by the charms desire, pain and trouble that are bound to ensue that they cannot
                    foresee the of pleasure blame belongs to those who fail in their duty through weakness of will.</h4>
                <p class="agileits w3layouts">Demoralized by the charms of pleasure of the moment, so blinded by desire, so adipisci velit...</p>
            </div>
            <div class="clearfix"></div>
        </div>
    </div> -->
    <!-- //Services -->



    <!-- gallery -->
    <div id="gallery" class="gallery">
        <h3 class="heading">Galeri</h3>
        <div class="w3ls_banner_bottom_grids masonry">
            <?php foreach ($galeri_konten as $g) { ?>
                <a class="item" href="<?php echo base_url() . 'assets/img/uploads/' . $g->nama_galeri ?>">
                    <img src="<?php echo base_url() . 'assets/img/uploads/' . $g->nama_galeri ?>">
                    <div class="overlay">
                        <i class="fa fa-magnify"></i>
                    </div>
                </a>
            <?php } ?>
        </div>
    </div>

    <!-- //gallery -->

    <!-- testimonials -->
    <div class="testimonials" id="testimonials">
        <div class="container">
            <h3 class="heading">Testimoni</h3>
            <div class="flexslider-info">
                <section class="slider">
                    <div class="flexslider">
                        <ul class="slides">
                            <li>
                                <div class="w3l-info1">
                                    <div class="col-md-4 testimonials-grid-1">
                                        <img src="<?php echo base_url() ?>web/images/t1.jpg" alt="" />
                                    </div>
                                    <div class="col-md-8 testimonials-grid-2">
                                        <h4>Jedar</h4>
                                        <h5>karyawan rumah tangga</h5>
                                        <p>Udaranya dingin banget gaes. Saya kira saya lupa tutup kulkas, ternyata saya lagi di gunung.</p>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="w3l-info1">
                                    <div class="col-md-4 testimonials-grid-1">
                                        <img src="<?php echo base_url() ?>web/images/t2.jpg" alt="" />
                                    </div>
                                    <div class="col-md-8 testimonials-grid-2">
                                        <h4>Anya</h4>
                                        <h5>pegawai negeri swasta</h5>
                                        <p>Pemandangan dari atas keren banget. Rasanya pengen loncat ke awan, tapi nggak boleh sama mamang loket.</p>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="w3l-info1">
                                    <div class="col-md-4 testimonials-grid-1">
                                        <img src="<?php echo base_url() ?>web/images/t4.jpg" alt="" />
                                    </div>
                                    <div class="col-md-8 testimonials-grid-2">
                                        <h4>Gisel</h4>
                                        <h5>bakul bakso</h5>
                                        <p>Tempat paling indah di pulau Jawa. Kalau belum pernah muncak di sini mending segerakan saja. Barangkali besok tiket harga naik.</p>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </section>
            </div>
        </div>
    </div>
    <!-- //testimonials -->


    <!-- contact -->
    <div class="contact" id="contact">
        <div class="container">
            <h3 class="heading">Booking</h3>
            <?php echo form_open('home/booking') ?>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label>NIK</label>
                        <input name="nik_customer" type="text" class="form-control" placeholder="NIK" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Nama Lengkap</label>
                        <input name="nama_customer" type="text" class="form-control" placeholder="Nama Lengkap" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label style="display: block;">Jenis Kelamin</label>
                        <label class="radio-inline">
                            <input type="radio" name="jenis_kelamin_customer" value="L"> Laki-laki
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="jenis_kelamin_customer" value="P"> Perempuan
                        </label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Telepon</label>
                        <input name="telepon_customer" type="tel" class="form-control" placeholder="Nomor Telepon/HP">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Alamat</label>
                        <textarea name="alamat_customer" class="form-control" rows="2" placeholder="Alamat Lengkap" required></textarea>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Propinsi</label>
                        <select name="id_propinsi" class="form-control" onchange="loadKabupaten()" required>
                            <option value=""></option>
                            <?php foreach ($propinsi as $p) { ?>
                                <option value="<?php echo $p->id_propinsi ?>"><?php echo $p->nama_propinsi ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-4" style="margin-bottom: 14px;">
                    <div class="form-group" style="margin-bottom: 0;">
                        <label>Kabupaten</label>
                        <select name="id_kabupaten" class="form-control" required>
                            <option value=""></option>
                        </select>
                    </div>
                    <div class="progress" id="proses" style="display: none; height: 5px;">
                        <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
                            <span class="sr-only">Loading Kabupaten</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Tanggal Pendakian</label>
                        <input type="text" name="tanggal_transaksi_tiket" class="form-control" placeholder="Tanggal Pendakian" autocomplete="off" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Keterangan</label>
                        <input type="text" name="keterangan_transaksi_tiket" class="form-control" placeholder="Jumlah Rombongan: ...">
                    </div>
                </div>
            </div>
            <div class="col-lg-12" data-aos="zoom-in">
                <button type="submit" class="btn btn-primary" style="width: initial;">Booking Tiket</button>
            </div>
            <div class="clearfix"></div>
            <?php echo form_close() ?>
        </div>
    </div>
    <!-- map -->
    <div class="map">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31665.75806396411!2d109.89875415589198!3d-7.215754954658271!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e700ce34714804d%3A0xf71779c2d538ad1!2sDieng%20Plateau!5e0!3m2!1sen!2sid!4v1607738972686!5m2!1sen!2sid" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
    </div>
    <!-- //map -->

    <!--footer-->
    <div class="footer">
        <div class="footer-main">
            <div class="col-md-4 ftr-grid">
                <div class="col-md-2 address">
                    <i class="fa fa-map-marker" aria-hidden="true"></i>
                </div>
                <div class="col-md-10 address add">
                    <h4>Alamat</h4>
                    <span class="ftr-line"> </span>
                    <p>Gunung Prau</p>
                    <p>Wonosobo </p>
                </div>
                <div class="clearfix"> </div>
            </div>
            <div class="col-md-4 ftr-grid ftr-mid">
                <div class="col-md-2 address">
                    <i class="fa fa-phone" aria-hidden="true"></i>
                </div>
                <div class="col-md-10 address phone add">
                    <h4>Telepon</h4>
                    <span class="ftr-line"> </span>
                    <p>+021 365 412 7777</p>
                    <p>+021 365 366 7778</p>
                </div>
                <div class="clearfix"> </div>
            </div>
            <div class="col-md-4 ftr-grid ftr-rit">
                <div class="col-md-2 address">
                    <i class="fa fa-paper-plane" aria-hidden="true"></i>
                </div>
                <div class="col-md-10 address add">
                    <h4>Email</h4>
                    <span class="ftr-line"> </span>
                    <p><a href="mailto:example@mail.com"> mail@example.com</a></p>
                    <p><a href="mailto:example@mail.com"> mail@example1.com</a></p>
                </div>
                <div class="clearfix"> </div>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
    <!--//footer-->

    <div class="footer-w3layouts">
        <div class="container">
            <div class="agile-copy">
                <p>© 2020 - <?php echo date('Y') == 2020 ? 'Now' : date('Y') ?> | CV. BOS AMPUH. All rights reserved | Design by <a href="http://w3layouts.com/">W3layouts</a></p>
            </div>
            <div class="agileits-social">
                <ul>
                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fa fa-rss"></i></a></li>
                    <li><a href="#"><i class="fa fa-vk"></i></a></li>
                </ul>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>



    <!-- js -->
    <script type="text/javascript" src="<?php echo base_url() ?>web/js/jquery-2.1.4.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/sweetalert2/sweetalert2.min.js" type="text/javascript"></script>

    <script type="text/javascript" src="<?php echo base_url() ?>web/js/bootstrap-3.1.1.min.js"></script>

    <script src="<?php echo base_url() ?>web/js/responsiveslides.min.js"></script>
    <script>
        $(function() {
            // $("#slider").responsiveSlides({
            //     auto: true,
            //     pager: true,
            //     nav: true,
            //     speed: 1000,
            //     namespace: "callbacks",
            //     before: function() {
            //         $('.events').append("<li>before event fired.</li>");
            //     },
            //     after: function() {
            //         $('.events').append("<li>after event fired.</li>");
            //     }
            // });
            $('#slider').slick({
                autoplay: true,
                autoplaySpeed: 3000,
                mobileFirst: true,
                dots: true,
                // adaptiveHeight: true
            })
        });
    </script>

    <!--search-bar-->
    <script src="<?php echo base_url() ?>web/js/main.js"></script>
    <!--//search-bar-->

    <script defer src="<?php echo base_url() ?>web/js/jquery.flexslider.js"></script>
    <!--Start-slider-script-->
    <script type="text/javascript">
        $(window).load(function() {
            $('.flexslider').flexslider({
                animation: "slide",
                start: function(slider) {
                    $('body').removeClass('loading');
                }
            });
        });
    </script>
    <!--End-slider-script-->


    <!-- start-smooth-scrolling -->

    <script src="<?php echo base_url() ?>web/js/SmoothScroll.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>web/js/move-top.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>web/js/easing.js"></script>
    <script type="text/javascript">
        jQuery(document).ready(function($) {
            $(".scroll").click(function(event) {
                event.preventDefault();
                $('html,body').animate({
                    scrollTop: $(this.hash).offset().top
                }, 1000);
            });
        });
    </script>
    <!-- start-smooth-scrolling -->
    <!-- here stars scrolling icon -->
    <script type="text/javascript">
        $(document).ready(function() {
            /*
            	var defaults = {
            	containerID: 'toTop', // fading element id
            	containerHoverID: 'toTopHover', // fading element hover id
            	scrollSpeed: 1200,
            	easingType: 'linear' 
            	};
            */

            $().UItoTop({
                easingType: 'easeOutQuart'
            });

        });
    </script>
    <!-- //here ends scrolling icon -->

    <script src="<?php echo base_url() ?>web/js/jquery.vide.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>web/slick/slick.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>web/lightgallery/js/lightgallery.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>web/lightgallery/js/lg-zoom.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/axios.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/FileSaver.min.js" type="text/javascript"></script>

    <script>
        let notif = ''
        <?php if ($this->session->flashdata('notifikasi') != null) echo "notif='" . $this->session->flashdata('notifikasi') . "';" ?>

        let id_tiket = ''
        <?php if ($this->session->flashdata('id_transaksi_tiket') != '') echo "id_tiket='" . $this->session->flashdata('id_transaksi_tiket') . "';" ?>

        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            width: 600,
            timer: 3000
        })

        switch (notif) {
            case 'save-ok':
                Toast.fire({
                    type: 'success',
                    title: 'Berhasil booking'
                })
                break
            case 'save-err':
                Toast.fire({
                    type: 'error',
                    title: 'Gagal booking'
                })
                break

            default:
                break
        }

        if (id_tiket) {
            window.open('<?php echo base_url() ?>home/cetakTiketBooking/' + id_tiket)
            // axios.post('<?php echo base_url() ?>home/cetakTiketBooking', {
            //         id_transaksi_tiket: id_tiket
            //     })
            //     .then(res => {
            //         const blob = new Blob([res.data], {
            //             type: "application/pdf"
            //         });
            //         saveAs(blob, `Tiket Booking Wahana.pdf`)
            //     })
            //     .catch(err => alert('Terjadi kesalahan, ' + err))
        }

        $('input[name=tanggal_transaksi_tiket]').datepicker({
            dateFormat: 'dd-mm-yy',
            minDate: new Date()
        })

        function loadKabupaten() {
            const id_propinsi = $('select[name=id_propinsi]').val()

            if (id_propinsi) {
                $('#proses').show()
                $('select[name=id_kabupaten]').prop('disabled', true)

                axios.get('<?php echo base_url() ?>home/getKabByProp/' + id_propinsi)
                    .then(res => {
                        const data = res.data
                        const data_kabupaten = data.map(item => {
                            return `<option value="${item.id_kabupaten}">
                            ${item.nama_kabupaten}
                        </option>`
                        }).join('')

                        $('select[name=id_kabupaten]').html(data_kabupaten)
                    })
                    .catch(err => alert('Terjadi kesalahan, ' + err))
                    .then(() => {
                        $('#proses').hide()
                        $('select[name=id_kabupaten]').prop('disabled', false)
                    })
            } else {
                $('select[name=id_kabupaten]').html('')
            }
        }

        $('.w3ls_banner_bottom_grids').lightGallery({
            download: false
        })
    </script>
</body>

</html>