<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?= $profile->name ?></title>
    <meta name="description" content="Free Bootstrap 4 Admin Theme | Pike Admin">
    <meta name="author" content="Pike Web Development - https://www.pikephp.com">

    <!-- Favicon -->
    <link href="<?= base_url() ?>img/profile/<?= $profile->logo ?>" rel="icon">

    <!-- Bootstrap CSS -->
    <link href="<?= base_url() ?>assets/admin/css/bootstrap.min.css" rel="stylesheet" type="text/css" />

    <!-- Font Awesome CSS -->
    <link href="<?= base_url() ?>assets/admin/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />

    <!-- Custom CSS -->
    <link href="<?= base_url() ?>assets/admin/css/style.css" rel="stylesheet" type="text/css" />

    <!-- BEGIN CSS for this page -->

    <!-- END CSS for this page -->

</head>

<body>

    <div id="main">

        <!-- top bar navigation -->
        <?= $this->include('admin/layout/navbar'); ?>
        <!-- End Navigation -->


        <!-- Left Sidebar -->
        <?= $this->include('admin/layout/sidebar'); ?>
        <!-- End Sidebar -->


        <div class="content-page">

            <!-- Start content -->
            <div class="content">

                <div class="container-fluid">



                    <div class="row">
                        <div class="col-xl-12">
                            <div class="breadcrumb-holder">
                                <h1 class="main-title float-left">Beranda</h1>
                                <ol class="breadcrumb float-right">
                                    <li class="breadcrumb-item active">Beranda</li>
                                </ol>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                    <!-- end row -->



                    <div class="row">

                        <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
                            <div class="card-box noradius noborder bg-success">
                                <i class="fa fa-user float-right text-white"></i>
                                <h6 class="text-white text-uppercase m-b-20">Guru</h6>
                                <h1 class="m-b-20 text-white counter"><?= $teacher ?></h1>
                                <span class="text-white"><?= $teacher ?> Guru</span>
                            </div>
                        </div>
                        <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
                            <div class="card-box noradius noborder bg-warning">
                                <i class="fa fa-bar-chart float-right text-white"></i>
                                <h6 class="text-white text-uppercase m-b-20">Pendaftar</h6>
                                <h1 class="m-b-20 text-white counter"><?= $regist ?></h1>
                                <span class="text-white"><?= $regist ?> Data</span>
                            </div>
                        </div>

                        <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
                            <div class="card-box noradius noborder bg-info">
                                <i class="fa fa-picture-o float-right text-white"></i>
                                <h6 class="text-white text-uppercase m-b-20">Galeri</h6>
                                <h1 class="m-b-20 text-white counter"><?= $gallery ?></h1>
                                <span class="text-white"><?= $gallery ?> Data</span>
                            </div>
                        </div>

                        <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
                            <div class="card-box noradius noborder bg-danger">
                                <i class="fa fa-fw fa-th float-right text-white"></i>
                                <h6 class="text-white text-uppercase m-b-20">Fasilitas</h6>
                                <h1 class="m-b-20 text-white counter"><?= $facility ?></h1>
                                <span class="text-white"><?= $facility ?> Data</span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END container-fluid -->

            </div>
            <!-- END content -->

        </div>
        <!-- END content-page -->

        <?= $this->include('admin/layout/footer'); ?>

    </div>
    <!-- END main -->

    <script src="<?= base_url() ?>assets/admin/js/modernizr.min.js"></script>
    <script src="<?= base_url() ?>assets/admin/js/jquery.min.js"></script>
    <script src="<?= base_url() ?>assets/admin/js/moment.min.js"></script>

    <script src="<?= base_url() ?>assets/admin/js/popper.min.js"></script>
    <script src="<?= base_url() ?>assets/admin/js/bootstrap.min.js"></script>

    <script src="<?= base_url() ?>assets/admin/js/detect.js"></script>
    <script src="<?= base_url() ?>assets/admin/js/fastclick.js"></script>
    <script src="<?= base_url() ?>assets/admin/js/jquery.blockUI.js"></script>
    <script src="<?= base_url() ?>assets/admin/js/jquery.nicescroll.js"></script>

    <!-- App js -->
    <script src="<?= base_url() ?>assets/admin/js/pikeadmin.js"></script>

</body>

</html>