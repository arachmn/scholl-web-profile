<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?= $title ?></title>
    <meta name="description" content="Free Bootstrap 4 Admin Theme | Pike Admin">
    <meta name="author" content="Pike Web Development - https://www.pikephp.com">

    <!-- Favicon -->
    <link href="<?= base_url('img/profile/' . $profile->logo) ?>" rel="icon">

    <!-- Bootstrap CSS -->
    <link href="<?= base_url() ?>assets/admin/css/bootstrap.min.css" rel="stylesheet" type="text/css" />

    <!-- Font Awesome CSS -->
    <link href="<?= base_url() ?>assets/admin/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />

    <!-- Custom CSS -->
    <link href="<?= base_url() ?>assets/admin/css/style.css" rel="stylesheet" type="text/css" />

    <!-- BEGIN CSS for this page -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

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
                                <h1 class="main-title float-left">Berita</h1>
                                <ol class="breadcrumb float-right">
                                    <li class="breadcrumb-item">Beranda</li>
                                    <li class="breadcrumb-item active">Berita</li>
                                </ol>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                    <!-- end row -->

                    <div class="row">
                        <div class="col">
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

                            <div class="card mb-3">
                                <div class="card-header">
                                    <span class="pull-right"><button data-toggle="modal" data-target="#modal-add-article" class="btn btn-primary btn-sm"><i class="fa fa-plus" aria-hidden="true"></i> Tambah Data</button></span>
                                    <h3><i class="fa fa-file-text-o"></i> Berita (<?= $countData ?> data)</h3>
                                </div>

                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="tableArticle" class="table table-bordered table-hover display">
                                            <thead>
                                                <tr class="text-center">
                                                    <th>#</th>
                                                    <th>Detail Berita</th>
                                                    <th style="max-width: 110px; min-width: 110px;">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $x = 1 ?>
                                                <?php foreach ($article as $a) : ?>
                                                    <?php
                                                    $id = $a['id_article'];

                                                    if ($a['status'] == 1) {
                                                        $status = 'Tersedia';
                                                    } elseif ($a['status'] == 0) {
                                                        $status = 'Disembunyikan';
                                                    }
                                                    ?>
                                                    <tr>
                                                        <td class="text-center"><?= $x ?></td>
                                                        <td style="min-width: 620px;">
                                                            <div style="float: left; width: 160px; height: 90px; overflow: hidden;">
                                                                <img alt="image" style="width: 100%; height: 100%; object-fit: cover;" src="<?= base_url('img/article/' . $a['imgArticle']) ?>" />
                                                            </div>
                                                            <div style="margin-left: 170px; text-align: left;">
                                                                <h5 class="t-title"><?= $a['title'] ?></h5>
                                                                <i class="fa fa-pencil"></i> <?= $status ?>&nbsp;
                                                                <i class="fa fa-calendar"></i> <?= $a['date'] ?>&nbsp;
                                                                <i class="fa fa-user"></i> <?= $a['name'] ?><br>
                                                                <small class="t-content"><?= $a['content'] ?></small>
                                                            </div>
                                                        </td>
                                                        <td class="text-center">
                                                            <button id="edtBtn" class="d-inline btn btn-info mb-1" onclick="modalEdit('<?= $id ?>')"><i class="fa fa-pencil" aria-hidden="true"></i></button>
                                                            <button class="d-inline btn btn-warning mb-1" onclick="modalStatus('<?= $id ?>', '<?= $a['title'] ?>')"><i class="fa fa-warning" aria-hidden="true"></i></button>
                                                            <button class="d-inline btn btn-danger mb-1" onclick="modalDelete('<?= $id ?>', '<?= $a['title'] ?>')"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                                                        </td>
                                                    </tr>
                                                    <?php $x++ ?>
                                                <?php endforeach ?>
                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end card-->
                    </div>

                    <div class="modal fade custom-modal" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="confirmModal" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div id="modHead" class="modal-header">
                                    <h5 class="modal-title" id="confirmModalTitle">Apakah Anda Yakin?</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body" style="overflow-y: auto; max-height: 80vh">
                                    <p class="textBody"></p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                    <button id="confirmFormBtn" type="button" class="btn btn-primary" onclick="">Ya</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal fade custom-modal" tabindex="-1" role="dialog" aria-hidden="true" aria-labelledby="modal-add-article" id="modal-add-article">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">

                                <form action="<?= site_url('AdminController/saveArticle') ?>" method="post" enctype="multipart/form-data">
                                    <div class="modal-header">
                                        <h5 class="modal-title-article">Tambah Berita</h5>
                                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                    </div>

                                    <div class="modal-body" style="overflow-y: auto; max-height: 80vh">

                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label>Judul Berita</label>
                                                    <input class="form-control" id="title" name="title" type="text" required placeholder="Masukan Judul Berita" />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label>Konten Berita</label>
                                                    <textarea rows="12" class="form-control" id="content" name="content" type="text" required placeholder="Masukan Konten Berita"></textarea>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>Tanggal</label>
                                                    <input class="form-control" id="date" name="date" type="date" required />
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>Status</label>
                                                    <select name="status" id="status" class="form-control">
                                                        <option value="1" selected>Tersedia</option>
                                                        <option value="0">Disembunyikan</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label>Gambar</label>
                                                    <input type="file" class="form-control" id="imgArticle" name="imgArticle" required accept="image/*" />
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="modal-footer">
                                        <button type="Submit" class="btn btn-primary">Simpan</button>
                                    </div>

                                </form>

                            </div>
                        </div>
                    </div>

                    <div class="modal fade custom-modal" tabindex="-1" role="dialog" aria-hidden="true" aria-labelledby="modal-edit-article" id="modal-edit-article">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">

                                <form id="editForm" action="<?= site_url('AdminController/editArticle/') ?>" method="post" enctype="multipart/form-data">
                                    <div class="modal-header">
                                        <h5 class="modal-title-article">Edit Berita</h5>
                                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                    </div>

                                    <div class="modal-body" style="overflow-y: auto; max-height: 80vh">

                                        <input id="id_admin2" name="id_admin2" type="hidden" value="" />

                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label>Nama Admin</label>
                                                    <input class="form-control" id="nameAdmin" name="nameAdmin" type="text" disabled />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label>Judul Berita</label>
                                                    <input class="form-control" id="title2" name="title2" type="text" required placeholder="Masukan Judul Berita" />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label>Konten Berita</label>
                                                    <textarea rows="12" class="form-control" id="content2" name="content2" type="text" required placeholder="Masukan Konten Berita"></textarea>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>Tanggal</label>
                                                    <input class="form-control" id="date2" name="date2" type="date" />
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>Gambar</label>
                                                    <input type="file" class="form-control" id="imgArticle2" name="imgArticle2" accept="image/*" />
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="modal-footer">
                                        <button type="Submit" class="btn btn-primary">Simpan</button>
                                    </div>

                                </form>

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

    <!-- BEGIN Java Script for this page -->
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        $(function() {
            $(".t-content").each(function(i) {
                len = $(this).text().length;
                if (len > 160) {
                    $(this).text($(this).text().substr(0, 160) + '...');
                }
            });
            $(".t-title").each(function(i) {
                len = $(this).text().length;
                if (len > 50) {
                    $(this).text($(this).text().substr(0, 50) + '...');
                }
            });
        });

        function showAlert(status, message) {
            Swal.fire({
                icon: status,
                title: message
            });
        }

        function modalEdit(id) {

            $.ajax({
                url: '<?= site_url('AdminController/getArticle/') ?>' + id,
                dataType: 'json',
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

                    $('#id_admin2').val(data.article.id_admin);

                    getAdmin(data.article.id_admin);

                    $('#title2').val(data.article.title);
                    $('#content2').val(data.article.content);

                    $('#editForm').attr('action', `<?= site_url('AdminController/editArticle/') ?>${data.article.id_article}`);

                    $('#modal-edit-article').modal('show');
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    console.log('Error: ', thrownError);
                    Swal.close();
                    showAlert('error', thrownError);
                }
            });
        }

        function modalDelete(id, title) {
            $('.textBody').text(`Perubahan tidak bisa dikembalikan. Apakah anda yakin akan menghapus Berita ${title}?`);
            $('#confirmFormBtn').attr("onclick", `deleteArticle('${id}')`);
            $("#confirmFormBtn").attr('class', 'btn btn-danger');
            $("#modHead").attr('class', 'modal-header bg-danger');
            $('#confirmModal').modal('show');
        }

        function modalStatus(id, title) {
            $('.textBody').text(`Status akan diubah. Apakah anda yakin akan mengubah status Berita ${title}?`);
            $('#confirmFormBtn').attr("onclick", `statusArticle('${id}')`);
            $("#confirmFormBtn").attr('class', 'btn btn-warning');
            $("#modHead").attr('class', 'modal-header bg-warning');
            $('#confirmModal').modal('show');
        }

        function deleteArticle(id) {
            location.href = `<?= base_url('AdminController/deleteArticle/') ?>${id}`;
        }

        function statusArticle(id) {
            location.href = `<?= base_url('AdminController/statusArticle/') ?>${id}`;
        }

        function getAdmin(id) {
            $.ajax({
                url: '<?= site_url('AdminController/getAdmin/') ?>' + id,
                dataType: 'json',
                success: function(data) {
                    console.log(data);

                    if (!data) {
                        return 'No Data';
                        $('#nameAdmin').val('No Data');
                    }

                    if (data.status === 'error') {
                        return data.message;
                        $('#nameAdmin').val(data.message);
                    }

                    $('#nameAdmin').val(data.admin.name);
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    console.log('Error:', thrownError);
                    $('#nameAdmin').val(thrownError);
                }
            });
        }
    </script>

    <script>
        // START CODE FOR BASIC DATA TABLE 
        $(document).ready(function() {
            $('#tableArticle').DataTable();
        });
    </script>
    <!-- END Java Script for this page -->

</body>

</html>