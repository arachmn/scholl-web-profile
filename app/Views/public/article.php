<!DOCTYPE html>
<html lang="en">

<head>

    <title><?= $title ?></title>

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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <style>
        .pagination-container {
            text-align: center;
        }

        .pagination>li>a,
        .pagination>li>span {
            color: #29ca8e;
        }

        .pagination>li.active>a {
            background: #29ca8e;
            color: #fff;
            border-color: #29ca8e;
        }
    </style>

</head>

<body id="top" data-spy="scroll" data-target=".navbar-collapse" data-offset="50" style="width: 100vw;">
    <script src="<?= base_url('assets/public/js/jquery.js') ?>"></script>

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
                    <li><a href="<?= site_url() ?>#top" class="smoothScroll">Beranda</a></li>
                    <li><a href="<?= site_url() ?>#about" class="smoothScroll">Tentang Kami</a></li>
                    <li><a href="<?= site_url() ?>#team" class="smoothScroll">Pendidik</a></li>
                    <li><a href="<?= site_url() ?>#courses" class="smoothScroll">Fasilitas</a></li>
                    <li><a href="<?= site_url() ?>#testimonial" class="smoothScroll">Galeri</a></li>
                    <li class="active"><a href="<?= site_url('berita/1') ?>" class="smoothScroll">Berita</a></li>
                    <li><a href="<?= site_url('ppdb') ?>" class="smoothScroll">PPDB</a></li>
                </ul>

                <ul class="nav navbar-nav navbar-right">
                    <li><a href="https://wa.me/<?= $profile->phone ?>" target="_blank"><i class="fa fa-phone"></i> <?= $profile->phone ?></a></li>
                </ul>
            </div>

        </div>
    </section>


    <section id="courses">
        <div class="container">
            <div class="row">

                <div class="col-md-12 col-sm-12" style="margin-bottom: 20px;">
                    <div class="section-title">
                        <h2>Berita Sekolah <small>Pantau kegiatan kami disini</small></h2>
                    </div>

                    <div class="owl-carousel owl-theme owl-article">

                        <?php $count = 0; ?>
                        <?php foreach ($article as $a) : ?>
                            <?php if ($count < 3) : ?>
                                <div class="col-md-4 col-sm-4">
                                    <div class="item">
                                        <div class="courses-thumb">
                                            <div class="courses-top">
                                                <div class="courses-image">
                                                    <img id src="<?= base_url('img/article/') . $a['imgArticle'] ?>" class="img-responsive" alt="" style="height: 100%; object-fit: cover">
                                                </div>
                                                <div class="courses-date">
                                                    <span><i class="fa fa-calendar"></i> <?= $a['date'] ?></span>
                                                </div>
                                            </div>

                                            <div class="courses-detail">
                                                <h3><a id="clickContent<?= $count ?>" href="#"><?= $a['title'] ?></a></h3>
                                                <p><?= $a['content'] ?></p>
                                            </div>

                                            <div class="courses-info">
                                                <div class="courses-author">
                                                    <img id="img<?= $count ?>" src="" class="img-responsive" alt="">
                                                    <span id="name<?= $count ?>"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php $count++; ?>
                            <?php endif; ?>
                        <?php endforeach ?>

                    </div>

                </div>

                <div class="col-md-12 col-sm-12">

                    <div class="owl-carousel owl-theme owl-article">

                        <?php foreach ($article as $index => $a) : ?>
                            <?php if ($index >= 3 && $index < 6) : ?>
                                <div class="col-md-4 col-sm-4">
                                    <div class="item">
                                        <div class="courses-thumb">
                                            <div class="courses-top">
                                                <div class="courses-image">
                                                    <img src="<?= base_url('img/article/') . $a['imgArticle'] ?>" class="img-responsive" alt="" style="height: 100%; object-fit: cover">
                                                </div>
                                                <div class="courses-date">
                                                    <span><i class="fa fa-calendar"></i> <?= $a['date'] ?></span>
                                                </div>
                                            </div>

                                            <div class="courses-detail">
                                                <h3><a id="clickContent<?= $index ?>" href="#"><?= $a['title'] ?></a></h3>
                                                <p><?= $a['content'] ?></p>
                                            </div>

                                            <div class="courses-info">
                                                <div class="courses-author">
                                                    <img id="img<?= $index ?>" src="" class="img-responsive" alt="">
                                                    <span id="name<?= $index ?>"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; ?>

                    </div>

                </div>

                <div class="col-md-12 col-sm-12 pagination-container">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                            <li class="page-item <?= $page > 1 ? '' : 'disabled' ?>">
                                <a class="page-link" href="<?= $page > 1 ? site_url('berita/' . (intval($page) - 1)) : 'javascript:void(0)' ?>"><i class="fa fa-angle-left"></i></a>
                            </li>
                            <?php for ($i = 1; $i <= $countPage; $i++) : ?>
                                <li class="page-item <?= $i == $page ? 'active disabled' : '' ?>">
                                    <a class="page-link" href="<?= $i == $page ? 'javascript:void(0)' : site_url('berita/' . $i) ?>"><?= $i; ?></a>
                                </li>
                            <?php endfor; ?>
                            <li class="page-item <?= $page < $countPage ? '' : 'disabled' ?>">
                                <a class="page-link" href="<?= $page < $countPage ? site_url('berita/' . (intval($page) + 1)) : 'javascript:void(0)' ?>"><i class="fa fa-angle-right"></i></a>
                            </li>
                        </ul>
                    </nav>
                </div>



            </div>
    </section>

    <div class="modal fade custom-modal" tabindex="-1" role="dialog" aria-hidden="true" aria-labelledby="modal-content" id="modal-content">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <div class="modal-body" style="overflow-y: auto; max-height: 80vh;">
                    <h3 id="titleContent" style="margin-bottom: 7px"></h3>
                    <span class="dateContent" style="margin-right: 7px;">
                        <i class="fa fa-calendar"></i> 01/01/2024
                    </span>
                    <span class="adminContent">
                        <i class="fa fa-user"></i> Admin
                    </span>

                    <div style="position: relative; width: 100%; margin-top: 7px">
                        <img src="" id="imgArticleContent" alt="" style="position: absolute; width: 100%; height: 100%; object-fit: cover;">
                        <div style="padding-bottom: 56.25%;"></div>
                    </div>

                    <div id="contentArticle" style="margin-top: 10px;"></div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                </div>

            </div>
        </div>
    </div>



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

    <script src="<?= base_url('assets/public/js/bootstrap.min.js') ?>"></script>
    <script src="<?= base_url('assets/public/js/owl.carousel.min.js') ?>"></script>
    <script src="<?= base_url('assets/public/js/smoothscroll.js') ?>"></script>
    <script src="<?= base_url('assets/public/js/custom.js') ?>"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        window.onload = function() {
            <?php $count = 0; ?>
            <?php foreach ($article as $a) : ?>
                <?php if ($count < 3) : ?>
                    getAdmin('<?= $a['id_admin'] ?>', '<?= $count ?>', '<?= $a['id_article'] ?>');
                    <?php $count++; ?>
                <?php endif; ?>
            <?php endforeach ?>

            <?php foreach ($article as $index => $a) : ?>
                <?php if ($index >= 3 && $index < 6) : ?>
                    getAdmin('<?= $a['id_admin'] ?>', '<?= $index ?>', '<?= $a['id_article'] ?>');
                <?php endif; ?>
            <?php endforeach ?>

        };


        setMinHeight('.courses-image');

        function setMinHeight(selector) {
            var minHeight = Math.max.apply(null, $(selector).map(function() {
                return $(this).height();
            }).get());
            $(selector).height(minHeight);
        }

        function getAdmin(id, num, idArt) {

            $.ajax({
                url: '<?= site_url('AdminController/getAdminData/') ?>' + id,
                dataType: 'json',
                success: function(data) {
                    console.log(data);

                    if (!data) {
                        $(`#name${num}`).text('No Respon');
                        $(`#img${num}`).attr('src', `<?= base_url('img/admin/admin.png') ?>`);
                        return;
                    }

                    if (data.status === 'error') {
                        $(`#name${num}`).text('Some Error');
                        $(`#img${num}`).attr('src', `<?= base_url('img/admin/admin.png') ?>`);
                        return;
                    }

                    $(`#name${num}`).text(data.admin.name);
                    $(`#img${num}`).attr('src', `<?= base_url('img/admin/') ?>${data.admin.image}`);
                    $(`#clickContent${num}`).click(function() {
                        getContent(idArt, data.admin.name)
                    });
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    console.log('Error: ', thrownError);
                    $(`#name${num}`).text(thrownError);
                    $(`#img${num}`).attr('src', `<?= base_url('img/admin/admin.png') ?>`);
                }
            });
        }

        function showAlert(status, message) {
            Swal.fire({
                icon: status,
                title: message
            });
        }

        function getContent(code, name) {

            $.ajax({
                url: "<?= site_url('PublicController/getArticle/') ?>" + code,
                dataType: "json",
                beforeSend: function(data) {
                    Swal.fire({
                        title: 'Memuat data...',
                        showConfirmButton: false,
                        didOpen: () => {
                            Swal.showLoading();
                        }
                    });
                },
                success: function(data) {
                    $("#contentArticle").html("");
                    $("#titleArticle").text("");
                    Swal.close();
                    console.log(data);

                    if (!data) {
                        showAlert('error', 'Server tidak merespon');
                        return;
                    }

                    if (data.status === 'error') {
                        showAlert('error', data.message);
                        return;
                    }

                    $("#contentArticle").append(data.article.content);
                    $("#titleArticle").text(data.article.title);
                    $("#titleContent").text(data.article.title);
                    $('#imgArticleContent').attr('src', `<?= base_url('img/article/') ?>${data.article.imgArticle}`);
                    $('.dateContent').html(`<i class="fa fa-calendar"></i> ${data.article.date}`);
                    $('.adminContent').html(`<i class="fa fa-user"></i> ${name}`);


                    $('#modal-content').modal('show');

                },
                error: function(xhr, ajaxOptions, thrownError) {
                    console.log('Error:', thrownError);
                    Swal.close();
                    showAlert('error', thrownError);
                }
            });
        }
        $(document).ready(function() {
            $('.courses-detail p').each(function() {
                var maxLength = 120;
                var text = $(this).text();

                if (text.length > maxLength) {
                    var truncatedText = text.substring(0, maxLength) + '...';
                    $(this).text(truncatedText);
                }
            });
            $('.courses-detail a').each(function() {
                var maxLength = 55;
                var text = $(this).text();

                if (text.length > maxLength) {
                    var truncatedText = text.substring(0, maxLength) + '...';
                    $(this).text(truncatedText);
                }
            });

            var maxHeight = 0;
            $('.courses-detail p').each(function() {
                var currentHeight = $(this).height();
                if (currentHeight > maxHeight) {
                    maxHeight = currentHeight;
                }
            });
            $('.courses-detail p').height(maxHeight);

            var maxHeight = 0;
            $('.courses-detail h3').each(function() {
                var currentHeight = $(this).height();
                if (currentHeight > maxHeight) {
                    maxHeight = currentHeight;
                }
            });
            $('.courses-detail h3').height(maxHeight);
        });
    </script>



</body>

</html>