<?php require_once "./init.php"; ?>

<?php
$posts = $postService->listWithImage();
$first = array_shift($posts);
?>

<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>ZenZet News</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="manifest" href="site.webmanifest">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">

    <!-- CSS here -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/ticker-style.css">
    <link rel="stylesheet" href="assets/css/flaticon.css">
    <link rel="stylesheet" href="assets/css/slicknav.css">
    <link rel="stylesheet" href="assets/css/animate.min.css">
    <link rel="stylesheet" href="assets/css/magnific-popup.css">
    <link rel="stylesheet" href="assets/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/slick.css">
    <link rel="stylesheet" href="assets/css/nice-select.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>

    <?php require_once "./layouts/header.php" ?>

    <main>
        <!-- Trending Area Start -->
        <div class="trending-area fix">
            <div class="container">
                <div class="trending-main">
                    <!-- Trending Tittle -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="trending-tittle">
                                <strong>Trending</strong>
                                <!-- <p>Rem ipsum dolor sit amet, consectetur adipisicing elit.</p> -->
                                <div class="trending-animated">
                                    <ul id="js-news" class="js-hidden">
                                        <li class="news-item">Agresi Israel terhadap Palestina</li>
                                        <li class="news-item">Amazon Memberhentikan Puluhan Karyawannyas</li>
                                        <li class="news-item">NASA memperkirakan gerhana matahari total akan terjadi pada tahun 2024</li>
                                    </ul>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-8">
                            <!-- Trending Top -->
                            <div class="trending-top mb-30">
                                <div class="trend-top-img">
                                    <img src="<?= $first['url'] ?>" alt="<?= $first['alt'] ?>">
                                    <div class="trend-top-cap">
                                        <span>Appetizers</span>
                                        <h2><a href="details.php?id=<?= $first['id'] ?>"><?= $first['title'] ?></h2>
                                    </div>
                                </div>
                            </div>
                            <!-- Trending Bottom -->
                            <div class="trending-bottom">
                                <div class="row">
                                    <?php foreach ($posts as $post) { ?>

                                        <div class="col-lg-4">
                                            <div class="single-bottom mb-35">
                                                <div class="trend-bottom-img mb-30">
                                                    <img src="<?= $post['url'] ?>" alt="<?= $post['alt'] ?>">
                                                </div>
                                                <div class="trend-bottom-cap">
                                                    <span class="color1"><?= $post['category'] ?></span>
                                                    <h4><a href="details.php?id=<?= $post['id'] ?>"><?= $post['title'] ?></a></h4>

                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                        <!-- Riht content -->
                        <div class="col-lg-4">
                            <div class="trand-right-single d-flex">
                                <div class="trand-right-img">
                                    <img src="assets/img/trending/right1.jpg" alt="">
                                </div>
                                <div class="trand-right-cap">
                                    <span class="color1">Konser</span>
                                    <h4><a href="details.html">Presiden Filipina Naik Helikopter Kepresidenan untuk Nonton Konser Coldplay</a></h4>
                                </div>
                            </div>
                            <div class="trand-right-single d-flex">
                                <div class="trand-right-img">
                                    <img src="assets/img/trending/right2.jpg" alt="">
                                </div>
                                <div class="trand-right-cap">
                                    <span class="color3">Dunia Selancar</span>
                                    <h4><a href="details.html">Bali Jadi Tuan Rumah Kompetisi Selancar Kelas Dunia Red Bull Airborne </a></h4>
                                </div>
                            </div>
                            <div class="trand-right-single d-flex">
                                <div class="trand-right-img">
                                    <img src="assets/img/trending/right3.jpg" alt="">
                                </div>
                                <div class="trand-right-cap">
                                    <span class="color2">Balap Motor</span>
                                    <h4><a href="details.html">Lomba Motor Trail Rusak Kebun Edelweiss di Ranca Upas</a></h4>
                                </div>
                            </div>
                            <div class="trand-right-single d-flex">
                                <div class="trand-right-img">
                                    <style>
                                        .trand-right-img {
                                            float: right;
                                            margin-left: 10px;
                                        }

                                        .trand-right-img img {
                                            max-width: 100px;
                                            /* Menentukan lebar maksimum foto */
                                            height: auto;
                                        }
                                    </style>
                                    <img src="assets/img/trending/nba.jpg" alt="">
                                </div>
                                <div class="trand-right-cap">
                                    <span class="color4">Basket</span>
                                    <h4><a href="details.html">Big Three Suns Memanas dan Jungkalkan Pacers</a></h4>
                                </div>
                            </div>
                            <div class="trand-right-single d-flex">
                                <div class="trand-right-img">
                                    <img src="assets/img/trending/right5.jpg" alt="">
                                </div>
                                <div class="trand-right-cap">
                                    <span class="color1">Skeping</span>
                                    <h4><a href="details.html">Medina Khaira Fastabiqa meraih emas di ajang Putrajaya Ice Skating Championship 2</a></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Whats New Start -->
        <section class="whats-news-area pt-50 pb-20">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="row d-flex justify-content-between">
                            <div class="col-lg-3 col-md-3">
                                <div class="section-tittle mb-30">
                                    <h3>Whats New</h3>
                                </div>
                            </div>
                            <div class="col-lg-9 col-md-9">
                                <div class="properties__button">
                                    <!--Nav Button  -->
                                    <nav>
                                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                            <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">All</a>
                                            <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Ekonomi</a>
                                            <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Politik</a>
                                            <a class="nav-item nav-link" id="nav-last-tab" data-toggle="tab" href="#nav-last" role="tab" aria-controls="nav-contact" aria-selected="false">Busana</a>
                                            <a class="nav-item nav-link" id="nav-Sports" data-toggle="tab" href="#nav-nav-Sport" role="tab" aria-controls="nav-contact" aria-selected="false">Olahraga</a>
                                            <a class="nav-item nav-link" id="nav-technology" data-toggle="tab" href="#nav-techno" role="tab" aria-controls="nav-contact" aria-selected="false">Teknologi</a>
                                        </div>
                                    </nav>
                                    <!--End Nav Button  -->
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <!-- Nav Card -->
                                <div class="tab-content" id="nav-tabContent">
                                    <!-- card one -->
                                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                        <div class="whats-news-caption">
                                            <div class="row">
                                                <div class="col-lg-6 col-md-6">
                                                    <div class="single-what-news mb-100">
                                                        <div class="what-img">
                                                            <img src="assets/img/news/pantai.jpeg" alt="">
                                                        </div>
                                                        <div class="what-cap">
                                                            <span class="color1">Cek This Out</span>
                                                            <h4><a href="#"></a>Ide Outfit Kece Saat Liburan Di Pantai</h4>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6">
                                                    <div class="single-what-news mb-100">
                                                        <div class="what-img">
                                                            <img src="assets/img/news/tom.jpeg" alt="">
                                                        </div>
                                                        <div class="what-cap">
                                                            <span class="color1">Cek This Out</span>
                                                            <h4><a href="#">Tommy Hilfiger realisasikan digitalisasi dengan desain 3D</a></h4>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6">
                                                    <div class="single-what-news mb-100">
                                                        <div class="what-img">
                                                            <img src="assets/img/news/greenflation.jpg" alt="">
                                                        </div>
                                                        <div class="what-cap">
                                                            <span class="color1">Cek This Out</span>
                                                            <h4><a href="#">Menengok Ancaman Greenflation yang Jadi Ketakutan Gibran</a></h4>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6">
                                                    <div class="single-what-news mb-100">
                                                        <div class="what-img">
                                                            <img src="assets/img/news/trail.jpeg" alt="">
                                                        </div>
                                                        <div class="what-cap">
                                                            <span class="color1">Cek This Out</span>
                                                            <h4><a href="#">Beach Race Pangkalpinang, Balapan Motor Trail di Pantai Sekaligus Promosi Pariwisata</a></h4>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Card two -->
                                    <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                                        <div class="whats-news-caption">
                                            <div class="row">
                                                <div class="col-lg-6 col-md-6">
                                                    <div class="single-what-news mb-100">
                                                        <div class="what-img">
                                                            <img src="assets/img/news/china.jpeg" alt="">
                                                        </div>
                                                        <div class="what-cap">
                                                            <span class="color1">Cek This Out</span>
                                                            <h4><a href="#">Pertumbuhan Ekonomi China 2023 Diproyeksi 5,2%, Lampaui Target Pemerintah</a></h4>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6">
                                                    <div class="single-what-news mb-100">
                                                        <div class="what-img">
                                                            <img src="assets/img/news/ojk.jpg" alt="">
                                                        </div>
                                                        <div class="what-cap">
                                                            <span class="color1">Cek This Out</span>
                                                            <h4><a href="#">Bos OJK Ungkap Kondisi Sektor Jasa Keuangan RI di Tengah Perlambatan Ekonomi Global</a></h4>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6">
                                                    <div class="single-what-news mb-100">
                                                        <div class="what-img">
                                                            <img src="assets/img/news/greenflation.jpg" alt="">
                                                        </div>
                                                        <div class="what-cap">
                                                            <span class="color1">Cek This Out</span>
                                                            <h4><a href="#">Menengok Ancaman Greenflation yang Jadi Ketakutan Gibran</a></h4>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6">
                                                    <div class="single-what-news mb-100">
                                                        <div class="what-img">
                                                            <img src="assets/img/news/niluh.jpeg" alt="">
                                                        </div>
                                                        <div class="what-cap">
                                                            <span class="color1">Cek This Out</span>
                                                            <h4><a href="#">Temui Menparekraf, Ni Luh Djelantik Ungkap Dampak Pajak Hiburan 40% Bagi Pariwisata Bali </a></h4>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Card three -->
                                    <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                                        <div class="whats-news-caption">
                                            <div class="row">
                                                <div class="col-lg-6 col-md-6">
                                                    <div class="single-what-news mb-100">
                                                        <div class="what-img">
                                                            <img src="assets/img/news/mahfud.jpeg" alt="">
                                                        </div>
                                                        <div class="what-cap">
                                                            <span class="color1">Cek This Out</span>
                                                            <h4><a href="#">Mahfud Sindir Food Estate, Mentan Balas Itu Bukan Proyek Instan</a></h4>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6">
                                                    <div class="single-what-news mb-100">
                                                        <div class="what-img">
                                                            <img src="assets/img/news/lembong.jpg" alt="">
                                                        </div>
                                                        <div class="what-cap">
                                                            <span class="color1">Cek This Out</span>
                                                            <h4><a href="#">Profil Tom Lembong, 'Eks Orang' Jokowi yang Disebut Gibran di Debat</a></h4>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6">
                                                    <div class="single-what-news mb-100">
                                                        <div class="what-img">
                                                            <img src="assets/img/news/capres.jpg" alt="">
                                                        </div>
                                                        <div class="what-cap">
                                                            <span class="color1">Cek This Out</span>
                                                            <h4><a href="#">8 Hasil Survei Terbaru Elektabilitas Anies, Prabowo, Ganjar Januari</a></h4>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6">
                                                    <div class="single-what-news mb-100">
                                                        <div class="what-img">
                                                            <img src="assets/img/news/pbb.jpeg" alt="">
                                                        </div>
                                                        <div class="what-cap">
                                                            <span class="color1">Cek This Out</span>
                                                            <h4><a href="#">Rusia-China Mulai Ribut soal Status India di DK PBB, Ada Apa?</a></h4>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- card four -->
                                    <div class="tab-pane fade" id="nav-last" role="tabpanel" aria-labelledby="nav-last-tab">
                                        <div class="whats-news-caption">
                                            <div class="row">
                                                <div class="col-lg-6 col-md-6">
                                                    <div class="single-what-news mb-100">
                                                        <div class="what-img">
                                                            <img src="assets/img/news/pantai.jpeg" alt="">
                                                        </div>
                                                        <div class="what-cap">
                                                            <span class="color1">Cek This Out</span>
                                                            <h4><a href="#">Ide Outfit Kece Saat Liburan Di Pantai</a></h4>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6">
                                                    <div class="single-what-news mb-100">
                                                        <div class="what-img">
                                                            <img src="assets/img/news/dior.jpeg" alt="">
                                                        </div>
                                                        <div class="what-cap">
                                                            <span class="color1">Cek This Out</span>
                                                            <h4><a href="#">Maria Grazia Chiuri dan Pencarian Makna Aura untuk Dior Haute Couture</a></h4>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6">
                                                    <div class="single-what-news mb-100">
                                                        <div class="what-img">
                                                            <img src="assets/img/news/lv.jpeg" alt="">
                                                        </div>
                                                        <div class="what-cap">
                                                            <span class="color1">Cek This Out</span>
                                                            <h4><a href="#">Raihan Fahriza Ramaikan Panggung Louis Vuitton di Paris Fashion Week</a></h4>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6">
                                                    <div class="single-what-news mb-100">
                                                        <div class="what-img">
                                                            <img src="assets/img/news/tina.jpeg" alt="">
                                                        </div>
                                                        <div class="what-cap">
                                                            <span class="color1">Cek This Out</span>
                                                            <h4><a href="#">Christina Aguilera Manggung Pakai Gaun Rancangan Desainer Indonesia</a></h4>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- card Five -->
                                    <div class="tab-pane fade" id="nav-nav-Sport" role="tabpanel" aria-labelledby="nav-Sports">
                                        <div class="whats-news-caption">
                                            <div class="row">
                                                <div class="col-lg-6 col-md-6">
                                                    <div class="single-what-news mb-100">
                                                        <div class="what-img">
                                                            <img src="assets/img/news/marc.jpeg" alt="">
                                                        </div>
                                                        <div class="what-cap">
                                                            <span class="color1">Cek This Out</span>
                                                            <h4><a href="#">Marquez Bakal Jajal Motor WSBK di Portimao</a></h4>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6">
                                                    <div class="single-what-news mb-100">
                                                        <div class="what-img">
                                                            <img src="assets/img/news/trail.jpeg" alt="">
                                                        </div>
                                                        <div class="what-cap">
                                                            <span class="color1">Cek This Out</span>
                                                            <h4><a href="#">Beach Race Pangkalpinang, Balapan Motor Trail di Pantai Sekaligus Promosi Pariwisata</a></h4>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6">
                                                    <div class="single-what-news mb-100">
                                                        <div class="what-img">
                                                            <img src="assets/img/news/japan.jpeg" alt="">
                                                        </div>
                                                        <div class="what-cap">
                                                            <span class="color1">Cek This Out</span>
                                                            <h4><a href="#">Takuma Asano Anggap Lawan Indonesia Seperti Final Piala Asia</a></h4>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6">
                                                    <div class="single-what-news mb-100">
                                                        <div class="what-img">
                                                            <img src="assets/img/news/wemba.jpeg" alt="">
                                                        </div>
                                                        <div class="what-cap">
                                                            <span class="color1">Cek This Out</span>
                                                            <h4><a href="#">Victor Wembanyama, Bintang Baru yang Langsung Bersinar Terang di NBA</a></h4>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- card Six -->
                                    <div class="tab-pane fade" id="nav-techno" role="tabpanel" aria-labelledby="nav-technology">
                                        <div class="whats-news-caption">
                                            <div class="row">
                                                <div class="col-lg-6 col-md-6">
                                                    <div class="single-what-news mb-100">
                                                        <div class="what-img">
                                                            <img src="assets/img/news/nuklir.jpeg" alt="">
                                                        </div>
                                                        <div class="what-cap">
                                                            <span class="color1">Cek This Out</span>
                                                            <h4><a href="#">Sebelum China, UGM Pernah Kembangkan Baterai Nuklir Tahan 40 Tahun</a></h4>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6">
                                                    <div class="single-what-news mb-100">
                                                        <div class="what-img">
                                                            <img src="assets/img/news/spy.jpeg" alt="">
                                                        </div>
                                                        <div class="what-cap">
                                                            <span class="color1">Cek This Out</span>
                                                            <h4><a href="#">Bahaya Social Spy WhatsApp, Platform Pencari Klik</a></h4>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6">
                                                    <div class="single-what-news mb-100">
                                                        <div class="what-img">
                                                            <img src="assets/img/news/dokter.jpeg" alt="">
                                                        </div>
                                                        <div class="what-cap">
                                                            <span class="color1">Cek This Out</span>
                                                            <h4><a href="#">Teknologi Virtual Reality Membantu Seorang Dokter NHS Menemukan Tanda-Tanda Sepsis</a></h4>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6">
                                                    <div class="single-what-news mb-100">
                                                        <div class="what-img">
                                                            <img src="assets/img/news/home.jpg" alt="">
                                                        </div>
                                                        <div class="what-cap">
                                                            <span class="color1">Cek This Out</span>
                                                            <h4><a href="#">Smart Home Menunjukkan Bagaimana Teknologi Dapat Membantu Penyandang Disabilitas</a></h4>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Nav Card -->
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <!-- Section Tittle -->
                        <div class="section-tittle mb-40">
                            <h3>Follow Us</h3>
                        </div>
                        <!-- Flow Socail -->
                        <div class="single-follow mb-45">
                            <div class="single-box">
                                <div class="follow-us d-flex align-items-center">
                                    <div class="follow-social">
                                        <a href="#"><img src="assets/img/news/icon-fb.png" alt=""></a>
                                    </div>
                                    <div class="follow-count">
                                        <span>7,212</span>
                                        <p>Facebook</p>
                                    </div>
                                </div>
                                <div class="follow-us d-flex align-items-center">
                                    <div class="follow-social">
                                        <a href="#"><img src="assets/img/news/icon-tw.png" alt=""></a>
                                    </div>
                                    <div class="follow-count">
                                        <span>6,327</span>
                                        <p>Twitter</p>
                                    </div>
                                </div>
                                <div class="follow-us d-flex align-items-center">
                                    <div class="follow-social">
                                        <a href="#"><img src="assets/img/news/icon-ins.png" alt=""></a>
                                    </div>
                                    <div class="follow-count">
                                        <span>12,479</span>
                                        <p>Instagram</p>
                                    </div>
                                </div>
                                <div class="follow-us d-flex align-items-center">
                                    <div class="follow-social">
                                        <a href="#"><img src="assets/img/news/icon-yo.png" alt=""></a>
                                    </div>
                                    <div class="follow-count">
                                        <span>2,104</span>
                                        <p>Youtube</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- New Poster -->
                        <div class="news-poster d-none d-lg-block">
                            <img src="assets/img/news/news_card.jpg" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Whats New End -->
        <!--   Weekly2-News start -->
        <div class="weekly2-news-area  weekly2-pading gray-bg">
            <div class="container">
                <div class="weekly2-wrapper">
                    <!-- section Tittle -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="section-tittle mb-30">
                                <h3>Weekly Top News</h3>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="weekly2-news-active dot-style d-flex dot-style">
                                <div class="weekly2-single">
                                    <div class="weekly2-img">
                                        <img src="assets/img/news/ramen.jpg" alt="">
                                    </div>
                                    <div class="weekly2-caption">
                                        <span class="color1">Makanan</span>
                                        <h4><a href="#">Nikmatnya Restoran Ramen Viral di Jepang</a></h4>
                                    </div>
                                </div>
                                <div class="weekly2-single">
                                    <div class="weekly2-img">
                                        <img src="assets/img/news/abah.jpeg" alt="">
                                    </div>
                                    <div class="weekly2-caption">
                                        <span class="color1">Pariwisata</span>
                                        <h4><a href="#">Ironi dari Tempat Wisata yang Dulu Viral</a></h4>
                                    </div>
                                </div>
                                <div class="weekly2-single">
                                    <div class="weekly2-img">
                                        <img src="assets/img/news/savana.jpg" alt="">
                                    </div>
                                    <div class="weekly2-caption">
                                        <span class="color1">Travelling</span>
                                        <h4><a href="#">Hidden Gem di Bali dengan Pemandangan Berlatar Gunung Agung.</a></h4>
                                    </div>
                                </div>
                                <div class="weekly2-single">
                                    <div class="weekly2-img">
                                        <img src="assets/img/news/dpr.jpeg" alt="">
                                    </div>
                                    <div class="weekly2-caption">
                                        <span class="color1">Nasional</span>
                                        <h4><a href="#">Ketua Banggar DPR Sebut Tak Ada Swasembada Beras di 2019-2022</a></h4>
                                    </div>
                                </div>
                                <div class="weekly2-single">
                                    <div class="weekly2-img">
                                        <img src="assets/img/news/dilan.jpeg" alt="">
                                    </div>
                                    <div class="weekly2-caption">
                                        <span class="color1">Hiburan</span>
                                        <h4><a href="#">Ancika: Dia yang Bersamaku 1995 Berhasil Tembus 1 Juta Penonton</a></h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Weekly-News -->

        <!--  Recent Articles start -->
        <div class="recent-articles">
            <div class="container">
                <div class="recent-wrapper">
                    <!-- section Tittle -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="section-tittle mb-30">
                                <h3>Artikel Terkini</h3>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="recent-active dot-style d-flex dot-style">
                                <div class="single-recent mb-100">
                                    <div class="what-img">
                                        <img src="assets/img/news/gas.jpeg" alt="">
                                    </div>
                                    <div class="what-cap">
                                        <span class="color1">Chek This Out</span>
                                        <h4><a href="#">Harga Minyak dan Gas Kembali Naik Karena Meningkatnya Risiko Pasokan</a></h4>
                                    </div>
                                </div>
                                <div class="single-recent mb-100">
                                    <div class="what-img">
                                        <img src="assets/img/news/world.jpg" alt="">
                                    </div>
                                    <div class="what-cap">
                                        <span class="color1">Chek This Out</span>
                                        <h4><a href="#">WEF luncurkan dana 45 Triliun untuk atasi perubahan iklim</a></h4>
                                    </div>
                                </div>
                                <div class="single-recent mb-100">
                                    <div class="what-img">
                                        <img src="assets/img/news/russia.jpg" alt="">
                                    </div>
                                    <div class="what-cap">
                                        <span class="color1">Chek This Out</span>
                                        <h4><a href="#">Serangan Rusia melemahkan Ukraina</a></h4>
                                    </div>
                                </div>
                                <div class="single-recent mb-100">
                                    <div class="what-img">
                                        <img src="assets/img/news/haley.jpeg" alt="">
                                    </div>
                                    <div class="what-cap">
                                        <span class="color1">Chek This Out</span>
                                        <h4><a href="#">Haley Akan Menyiarkan Iklan di New Hampshire</a></h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--Recent Articles End -->
        <!--Start pagination -->
        <div class="pagination-area pb-45 text-center">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="single-wrap d-flex justify-content-center">
                            <nav aria-label="Page navigation example">
                                <ul class="pagination justify-content-start">
                                    <li class="page-item"><a class="page-link" href="#"><span class="flaticon-arrow roted"></span></a></li>
                                    <li class="page-item active"><a class="page-link" href="#">01</a></li>
                                    <li class="page-item"><a class="page-link" href="#">02</a></li>
                                    <li class="page-item"><a class="page-link" href="#">03</a></li>
                                    <li class="page-item"><a class="page-link" href="#"><span class="flaticon-arrow right-arrow"></span></a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End pagination  -->
    </main>

    <?php require_once "./layouts/footer.php" ?>

</body>

</html>