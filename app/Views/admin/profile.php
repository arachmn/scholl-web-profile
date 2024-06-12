<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?= $title ?></title>
    <meta name="description" content="Bootstrap 4 Admin Theme | Pike Admin">
    <meta name="author" content="Pike Web Development - https://www.pikephp.com">

    <!-- Favicon -->
    <link href="<?= base_url('img/profile/' . $profile->logo) ?>" rel="icon">

    <!-- Switchery css -->
    <link href="<?= base_url() ?>assets/admin/plugins/switchery/switchery.min.css" rel="stylesheet" />

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
                                <h1 class="main-title float-left">Profil Sekolah</h1>
                                <ol class="breadcrumb float-right">
                                    <li class="breadcrumb-item">Beranda</li>
                                    <li class="breadcrumb-item active">Profil Sekolah</li>
                                </ol>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                    <!-- end row -->

                    <div class="row">

                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <?php if (session()->getFlashData('success')) : ?>
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong>Sukses!</strong> <?= session()->getFlashData('success') ?>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            <?php endif ?>
                            <?php if (session()->getFlashData('failed')) : ?>
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <strong>Error!</strong> <?= session()->getFlashData('failed') ?>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            <?php endif ?>
                            <form action="<?= site_url('AdminController/saveProfile') ?>" method="post" enctype="multipart/form-data">
                                <?= csrf_field() ?>
                                <div class="card mb-3">

                                    <div class="card-header">
                                        <h3><i class="fa fa-file-text-o"></i> Pengaturan Profile Sekolah</h3>
                                    </div>
                                    <!-- end card-header -->

                                    <div class="card-body">
                                        <input name="idProfile" id="idProfile" type="hidden" value="<?= $profile->id_profile ?>">
                                        <div class="form-group">
                                            <label>Nama Sekolah</label>
                                            <input class="form-control" name="name" id="name" type="text" placeholder="Masukan Nama Sekolah" value="<?= $profile->name ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Nama Panel</label>
                                            <input class="form-control" name="panel" id="panel" type="text" placeholder="Masukan Nama Panel" value="<?= $profile->panel ?>" required>
                                        </div>

                                        <div class="form-group">
                                            <label>Visi</label>
                                            <textarea rows="4" class="form-control" name="visi" id="visi" placeholder="Masukan Visi Sekolah" required><?= $profile->visi ?></textarea>
                                        </div>

                                        <div class="form-group">
                                            <label>Misi</label>
                                            <textarea rows="4" class="form-control" name="misi" id="misi" placeholder="Masukan Misi Sekolah" required><?= $profile->misi ?></textarea>
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <label>Email</label>
                                                <input type="email" class="form-control" name="email" id="email" value="<?= $profile->email ?>" placeholder="Masukan Email">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Telepon</label>
                                                <input type="number" class="form-control" name="phone" id="phone" value="<?= $profile->phone ?>" placeholder="Masukan Telepon">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label>Alamat Sekolah</label>
                                            <textarea rows="4" class="form-control" name="address" id="address" placeholder="Masukan Alamat Sekolah" required><?= $profile->address ?></textarea>
                                        </div>

                                        <div class="form-row">
                                            <div class="form-group col-md-4">
                                                <label>URL Youtube</label>
                                                <input type="text" class="form-control" name="youtubeLink" id="youtubeLink" placeholder="Masukan URL Youtube" value="<?= $profile->youtubeLink ?>">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label>URL Facebook</label>
                                                <input type="text" class="form-control" name="facebookLink" id="facebookLink" placeholder="Masukan URL Facebook" value="<?= $profile->facebookLink ?>">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label>URL Instagram</label>
                                                <input type="text" class="form-control" name="instagramLink" id="instagramLink" placeholder="Masukan URL Instagram" value="<?= $profile->instagramLink ?>">
                                            </div>

                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label>Logo Sekolah</label>
                                                <input class="form-control" name="logo" id="logo" type="file">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Banner About</label>
                                                <input type="file" class="form-control" name="about" id="about">
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-4">
                                                <label>Banner 1</label>
                                                <input type="file" class="form-control" name="banner1" id="banner1">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label>Banner 2</label>
                                                <input type="file" class="form-control" name="banner2" id="banner2">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label>Banner 3</label>
                                                <input type="file" class="form-control" name="banner3" id="banner3">
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label>Banner Title 1</label>
                                                <input type="text" class="form-control" name="textBanner1" id="textBanner1" placeholder="Masukan Banner Title 1" value="<?= $profile->textBanner1 ?>">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Banner Sub Title 1</label>
                                                <input type="text" class="form-control" name="subTextBanner1" id="subTextBanner1" placeholder="Masukan Banner Sub Title 1" value="<?= $profile->subTextBanner1 ?>">
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label>Banner Title 2</label>
                                                <input type="text" class="form-control" name="textBanner2" id="textBanner2" placeholder="Masukan Banner Title 2" value="<?= $profile->textBanner2 ?>">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Banner Sub Title 2</label>
                                                <input type="text" class="form-control" name="subTextBanner2" id="subTextBanner2" placeholder="Masukan Banner Sub Title 2" value="<?= $profile->subTextBanner2 ?>">
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label>Banner Title 3</label>
                                                <input type="text" class="form-control" name="textBanner3" id="textBanner3" placeholder="Masukan Banner Title 3" value="<?= $profile->textBanner3 ?>">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Banner Sub Title 3</label>
                                                <input type="text" class="form-control" name="subTextBanner3" id="subTextBanner3" placeholder="Masukan Banner Sub Title 3" value="<?= $profile->subTextBanner3 ?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                        </div>

                                    </div>
                                    <!-- end card-body -->

                                </div>
                                <!-- end card -->



                                <div class="card mb-3">

                                    <div class="card-header">
                                        <h3><i class="fa fa-file-text-o"></i> Pengaturan PPDB Online</h3>
                                    </div>
                                    <!-- end card-header -->

                                    <div class="card-body">

                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label>PPDB Online</label>
                                                <select name="ppdb" class="form-control">
                                                    <?php if ($profile->ppdb == 'Dibuka') : ?>
                                                        <option value="Dibuka" selected>Dibuka</option>
                                                        <option value="Ditutup">Ditutup</option>
                                                    <?php else : ?>
                                                        <option value="Ditutup" selected>Ditutup</option>
                                                        <option value="Dibuka">Dibuka</option>
                                                    <?php endif ?>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Tahun Ajaran</label>
                                                <select name="year" class="form-control">
                                                    <?php
                                                    $currentYear = date('Y');
                                                    for ($year = $currentYear; $year <= $currentYear + 10; $year++) :
                                                        $selected = ($profile->year == $year . '-' . ($year + 1)) ? 'selected' : '';
                                                    ?>
                                                        <option value="<?= $year . '-' . ($year + 1) ?>" <?= $selected ?>><?= $year . '-' . ($year + 1) ?></option>
                                                    <?php endfor; ?>
                                                </select>

                                            </div>

                                        </div>


                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                        </div>

                                    </div>
                                    <!-- end card-body -->

                                </div>
                                <!-- end card -->

                            </form>


                        </div>
                        <!-- end col -->

                    </div>
                    <!-- end row -->





                </div>
                <!-- END container-fluid -->

            </div>
            <!-- END content -->

        </div>
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
    <script src="<?= base_url() ?>assets/admin/js/jquery.scrollTo.min.js"></script>
    <script src="<?= base_url() ?>assets/admin/plugins/switchery/switchery.min.js"></script>

    <!-- App js -->
    <script src="<?= base_url() ?>assets/admin/js/pikeadmin.js"></script>
    <!-- END Java Script for this page -->

</body>

</html>