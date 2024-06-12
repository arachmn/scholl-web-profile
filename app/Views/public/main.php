<!DOCTYPE html>
<html lang="en">

<head>

    <title><?= $profile->name ?></title>

    <link href="<?= base_url('img/profile/' . $profile->logo) ?>" rel="icon">

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <link rel="stylesheet" href="<?= base_url('assets/public/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/public/css/font-awesome.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/public/css/owl.carousel.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/public/css/owl.theme.default.min.css') ?>">

    <!-- MAIN CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/public/css/templatemo-style.css') ?>">

    <!-- Other CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

    <style>
        .home-slider .item-first {
            background-image: url(<?= base_url('img/profile/') . $profile->banner1 ?>);
            width: 100%;
        }

        .home-slider .item-second {
            background-image: url(<?= base_url('img/profile/') . $profile->banner2 ?>);
            width: 100%;
        }

        .home-slider .item-third {
            background-image: url(<?= base_url('img/profile/') . $profile->banner3 ?>);
            width: 100%;
        }
    </style>

</head>

<body id="top" data-spy="scroll" data-target=".navbar-collapse" data-offset="50" style="width: 100vw;">

    <!-- PRE LOADER -->
    <section class="preloader">
        <div class="spinner">

            <span class="spinner-rotate"></span>

        </div>
    </section>


    <!-- MENU -->
    <section class="navbar custom-navbar navbar-fixed-top" role="navigation" style="width: 100vw">
        <div class="container">

            <div class="navbar-header">
                <button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon icon-bar"></span>
                    <span class="icon icon-bar"></span>
                    <span class="icon icon-bar"></span>
                </button>

                <!-- lOGO TEXT HERE -->
                <a href="<?= site_url() ?>" class="navbar-brand"><?= $profile->name ?></a>
            </div>

            <!-- MENU LINKS -->
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav navbar-nav-first">
                    <li><a href="#top" class="smoothScroll">Beranda</a></li>
                    <li><a href="#about" class="smoothScroll">Tentang Kami</a></li>
                    <li><a href="#team" class="smoothScroll">Pendidik</a></li>
                    <li><a href="#courses" class="smoothScroll">Fasilitas</a></li>
                    <li><a href="#testimonial" class="smoothScroll">Galeri</a></li>
                    <li><a href="<?= site_url('berita/1') ?>" class="smoothScroll">Berita</a></li>
                    <li><a href="<?= site_url('ppdb') ?>" class="smoothScroll">PPDB</a></li>
                </ul>

                <ul class="nav navbar-nav navbar-right">
                    <li><a href="https://wa.me/<?= $profile->phone ?>" target="_blank"><i class="fa fa-phone"></i> <?= $profile->phone ?></a></li>
                </ul>
            </div>

        </div>
    </section>


    <!-- HOME -->
    <section id="home">
        <div class="row" style="width: 100vw; margin: 0 !important; padding: 0 !important;">

            <div class="owl-carousel owl-theme home-slider">
                <div class="item item-first" style="margin: 0 !important; padding: 0 !important;">
                    <div class="caption">
                        <div class="container">
                            <div class="col-md-6 col-sm-12">
                                <h1><?= $profile->textBanner1 ?></h1>
                                <h3><?= $profile->subTextBanner1 ?></h3>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="item item-second" style="margin: 0 !important; padding: 0 !important;">
                    <div class="caption">
                        <div class="container">
                            <div class="col-md-6 col-sm-12">
                                <h1><?= $profile->textBanner2 ?></h1>
                                <h3><?= $profile->subTextBanner2 ?></h3>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="item item-third" style="margin: 0 !important; padding: 0 !important;">
                    <div class="caption">
                        <div class="container">
                            <div class="col-md-6 col-sm-12">
                                <h1><?= $profile->textBanner3 ?></h1>
                                <h3><?= $profile->subTextBanner3 ?></h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>


    <!-- FEATURE -->
    <section id="feature">
        <div class="container">
            <div class="row">

                <div class="col-md-6 col-sm-6">
                    <div class="feature-thumb">
                        <span>01</span>
                        <h3>Visi</h3>
                        <p><?= $profile->visi ?></p>
                    </div>
                </div>

                <div class="col-md-6 col-sm-6">
                    <div class="feature-thumb">
                        <span>02</span>
                        <h3>Misi</h3>
                        <p><?= $profile->misi ?></p>
                    </div>
                </div>

            </div>
        </div>
    </section>


    <!-- ABOUT -->
    <section id="about">
        <div class="container">
            <div class="row">

                <div class="col-md-6 col-sm-12">
                    <div class="about-info">
                        <h2 style="margin-top: 0;">Tentang Kami</h2>

                        <figure>
                            <span><i class="fa fa-users"></i></span>
                            <figcaption>
                                <h3>Pendidik Profesional</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sint ipsa voluptatibus.</p>
                            </figcaption>
                        </figure>

                        <figure>
                            <span><i class="fa fa-certificate"></i></span>
                            <figcaption>
                                <h3>Fasilitas Berkualitas</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sint ipsa voluptatibus.</p>
                            </figcaption>
                        </figure>

                        <figure>
                            <span><i class="fa fa-bar-chart-o"></i></span>
                            <figcaption>
                                <h3>Kegiatan Menyenangkan</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sint ipsa voluptatibus.</p>
                            </figcaption>
                        </figure>
                    </div>
                </div>

                <div class="col-md-offset-1 col-md-4 col-sm-12">
                    <img class="img-about" src="<?= base_url('img/profile/' . $profile->about) ?>" alt="Smiling Two Girls" style="object-fit: cover; width: 100%;">
                </div>

            </div>
        </div>
    </section>


    <!-- TEACHER -->
    <section id="team">
        <div class="container">
            <div class="section-title">
                <h2>Pendidik Kami <small>Temui Pendidik Profesional</small></h2>
            </div>
            <div class="row team-slider">

                <?php foreach ($teacher as $t) : ?>

                    <div class="col-md-3 col-sm-6">
                        <div class="team-thumb">
                            <div class="team-image">
                                <img src="<?= base_url('img/teacher/' . $t['image']) ?>" class="img-responsive imgTeacher" alt="<?= $t['name'] ?>" style="object-fit: cover;width: 100%;">
                            </div>
                            <div class="team-info">
                                <h3><?= $t['name'] ?></h3>
                                <span><?= $t['job'] ?></span>
                            </div>
                        </div>
                    </div>

                <?php endforeach ?>

            </div>
        </div>
    </section>


    <!-- FACILITY -->
    <section id="courses">
        <div class="container">
            <div class="row">

                <div class="col-md-12 col-sm-12">
                    <div class="section-title">
                        <h2>Fasilitas Sekolah <small>Rasakan Fasilitas Berkualitas</small></h2>
                    </div>

                    <div class="owl-carousel owl-theme owl-courses">

                        <?php foreach ($facility as $f) : ?>

                            <div class="col-md-4 col-sm-4">
                                <div class="item">
                                    <div class="courses-thumb">
                                        <div class="courses-top">
                                            <div class="courses-image">
                                                <img src="<?= base_url('img/facility/' . $f['image']) ?>" class="img-responsive imgFacility" alt="<?= $f['title'] ?>" style="object-fit: cover; width: 100%;">
                                            </div>
                                        </div>

                                        <div class="courses-detail">
                                            <h3><?= $f['title'] ?></h3>
                                            <p><?= $f['description'] ?></p>
                                        </div>

                                        <div class="courses-info">
                                            <div class="courses-price">
                                                <span><?= $f['cuality'] ?></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        <?php endforeach ?>

                    </div>

                </div>
            </div>
        </div>
    </section>


    <!-- GALLERY -->
    <section id="testimonial">
        <div class="container">
            <div class="row">

                <div class="col-md-12 col-sm-12">
                    <div class="section-title">
                        <h2>Galeri Kegiatan <small>Nikmati Kegiatan Menyenangkan</small></h2>
                    </div>

                    <div class="owl-carousel owl-theme owl-client">

                        <?php foreach ($gallery as $g) : ?>

                            <div class="col-md-4 col-sm-4">
                                <div class="item">
                                    <div class="courses-thumb">
                                        <div class="courses-top">
                                            <div class="courses-image">
                                                <img src="<?= base_url('img/gallery/' . $g['image']) ?>" class="img-responsive imgGallery" alt="<?= $g['title'] ?>" style="object-fit: cover; width: 100%;">
                                            </div>
                                            <div class="courses-date">
                                                <span><i class="fa fa-calendar"></i> <?= $g['date'] ?></span>
                                            </div>
                                        </div>

                                        <div class="courses-detail">
                                            <p><?= $g['title'] ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        <?php endforeach ?>

                    </div>

                </div>
            </div>
        </div>
    </section>


    <!-- FOOTER -->
    <footer id="footer">
        <div class="container">
            <div class="row">

                <div class="col-md-6 col-sm-12">
                    <div class="footer-info">
                        <div class="section-title">
                            <h2>Alamat Kami</h2>
                        </div>
                        <address>
                            <p><?= $profile->address ?></p>
                        </address>

                        <ul class="social-icon">
                            <li><a href="<?= $profile->facebookLink ?>" class="fa fa-facebook-square" attr="facebook icon"></a></li>
                            <li><a href="<?= $profile->youtubeLink ?>" class="fa fa-youtube"></a></li>
                            <li><a href="<?= $profile->instagramLink ?>" class="fa fa-instagram"></a></li>
                        </ul>

                        <div class="copyright-text">
                            <p>Copyright &copy; <?= date('Y') ?> <?= $profile->name ?></p>
                        </div>

                    </div>
                </div>

                <div class="col-md-6 col-sm-12">
                    <div class="footer-info">
                        <div class="section-title">
                            <h2>Kontak Kami</h2>
                        </div>
                        <address>
                            <p><?= $profile->phone ?></p>
                            <p><a href="<?= $profile->email ?>"><?= $profile->email ?></a></p>
                        </address>
                    </div>
                </div>

            </div>
        </div>
    </footer>


    <!-- SCRIPTS -->
    <script src="<?= base_url('assets/public/js/jquery.js') ?>"></script>
    <script src="<?= base_url('assets/public/js/bootstrap.min.js') ?>"></script>
    <script src="<?= base_url('assets/public/js/owl.carousel.min.js') ?>"></script>
    <script src="<?= base_url('assets/public/js/smoothscroll.js') ?>"></script>
    <script src="<?= base_url('assets/public/js/custom.js') ?>"></script>

    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        var loaderArt = `<div class="spinner-border" role="status">
                                <span class="sr-only">Loading...</span>
                            </div>`;

        var openRegist = '<?= $profile->ppdb ?>';

        function showAlert(status, message) {
            Swal.fire({
                icon: status,
                title: message
            });
        }

        function setMinHeight(selector) {
            var minHeight = Math.min.apply(null, $(selector).map(function() {
                return $(this).height();
            }).get());
            $(selector).height(minHeight);
        }

        function setElementHeight(selector, target) {
            var maxHeight = 0;
            $(selector).each(function() {
                maxHeight = Math.max(maxHeight, $(this).height());
            });
            $(target).height(maxHeight);
        }

        setMinHeight('.imgTeacher');
        setMinHeight('.imgFacility');
        setMinHeight('.imgGallery');
        setElementHeight('.feature-thumb', '.feature-thumb');
        setElementHeight('.courses-detail', '.courses-detail');
        setElementHeight('.team-info', '.team-info');

        $(document).ready(function() {


            $('.team-slider').slick({
                slidesToShow: 4,
                slidesToScroll: 1,
                autoplay: true,
                autoplaySpeed: 1000,
                pauseOnHover: true,
                responsive: [{
                        breakpoint: 1024,
                        settings: {
                            slidesToShow: 3,
                        }
                    },
                    {
                        breakpoint: 768,
                        settings: {
                            slidesToShow: 2,
                        }
                    },
                    {
                        breakpoint: 480,
                        settings: {
                            slidesToShow: 1,
                        }
                    }
                ]
            });

            var aboutInfoHeight = $('.about-info').outerHeight();
            $('.img-about').css('height', aboutInfoHeight + 'px');
        });
    </script>



</body>

</html>