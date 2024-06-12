<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?= $title ?></title>

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
    <!-- END CSS for this page -->

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
                                <h1 class="main-title float-left">Daftar Guru</h1>
                                <ol class="breadcrumb float-right">
                                    <li class="breadcrumb-item">Beranda</li>
                                    <li class="breadcrumb-item active">Daftar Guru</li>
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
                                    <span class="pull-right"><button data-toggle="modal" data-target="#modal-add-teacher" class="btn btn-primary btn-sm"><i class="fa fa-plus" aria-hidden="true"></i> Tambah Data</button></span>
                                    <h3><i class="fa fa-file-text-o"></i> Guru (<?= $countData ?> data)</h3>
                                </div>

                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="tableTeacher" class="table table-bordered table-hover display">
                                            <thead>
                                                <tr class="text-center">
                                                    <th>#</th>
                                                    <th style="min-width: 300px;">Detail Guru</th>
                                                    <th style="min-width: 150px;">Lainya</th>
                                                    <th style="max-width: 110px; min-width: 110px;">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $x = 1 ?>
                                                <?php foreach ($teacher as $t) : ?>
                                                    <?php
                                                    $t['status'] == 1 ? $status = 'Tersedia' : $status = 'Disembunyikan';
                                                    $id = $t['id_teacher'];
                                                    ?>
                                                    <tr>
                                                        <td class="text-center"><?= $x ?></td>
                                                        <td>
                                                            <div style="float: left; margin-right: 10px; text-align: left;">
                                                                <img alt="image" style="width: 60px; height: 60px; border-radius: 50%; object-fit: cover;" src="<?= base_url('img/teacher/') . $t['image'] ?>" />

                                                            </div>
                                                            <div style="float: left; text-align: left;">
                                                                <strong><?= $t['name'] ?></strong><br>
                                                                <small><?= $t['nrp'] ?></small><br>
                                                                <small><?= $t['phone'] ?></small>
                                                            </div>
                                                        </td>

                                                        <td>
                                                            <strong><?= $t['job'] ?></strong><br>
                                                            <small><?= $status ?></small>
                                                        </td>
                                                        <td class="text-center" style="max-width: 90px; min-width: 90px;">
                                                            <button id="edtBtn" class="d-inline btn btn-info mb-1" onclick="modalEdit('<?= $id ?>')"><i class="fa fa-pencil" aria-hidden="true"></i></button>
                                                            <button class="d-inline btn btn-warning mb-1" onclick="modalStatus('<?= $id ?>', '<?= $t['name'] ?>')"><i class="fa fa-warning" aria-hidden="true"></i></button>
                                                            <button class="d-inline btn btn-danger mb-1" onclick="modalDelete('<?= $id ?>', '<?= $t['name'] ?>')"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
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

                    <div class="modal fade custom-modal" tabindex="-1" role="dialog" aria-hidden="true" aria-labelledby="modal-add-teacher" id="modal-add-teacher">
                        <div class="modal-dialog">
                            <div class="modal-content">

                                <form action="<?= site_url('AdminController/saveTeacher') ?>" method="post" enctype="multipart/form-data">
                                    <div class="modal-header">
                                        <h5 class="modal-title-teacher">Tambah Guru</h5>
                                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                    </div>

                                    <div class="modal-body">

                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label>NRP</label>
                                                    <input class="form-control" id="nrp" name="nrp" type="text" required placeholder="Masukan NRP" />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label>Nama Guru</label>
                                                    <input class="form-control" id="name" name="name" type="text" required placeholder="Masukan Nama Guru" />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label>Posisi</label>
                                                    <input class="form-control" id="job" name="job" type="text" required placeholder="Masukan Posisi" />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label>Telepon</label>
                                                    <input class="form-control" id="phone" name="phone" type="text" required placeholder="Masukan Telepon" />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>Status</label>
                                                    <select name="status" id="status" class="form-control">
                                                        <option value="1" selected>Tersedia</option>
                                                        <option value="0">Disembunyikan</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <div class="form-group">
                                                        <label>Gambar</label>
                                                        <input type="file" class="form-control" id="image" name="image" required accept="image/*" />
                                                    </div>
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

                    <div class="modal fade custom-modal" tabindex="-1" role="dialog" aria-hidden="true" aria-labelledby="modal-edit-teacher" id="modal-edit-teacher">
                        <div class="modal-dialog">
                            <div class="modal-content">

                                <form id="editForm" action="<?= site_url('AdminController/editTeacher') ?>" method="post" enctype="multipart/form-data">
                                    <div class="modal-header">
                                        <h5 class="modal-title-teacher">Edit Guru</h5>
                                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                    </div>

                                    <div class="modal-body">

                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label>NRP</label>
                                                    <input class="form-control" id="nrp2" name="nrp2" type="text" required placeholder="Masukan NRP" />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label>Nama Guru</label>
                                                    <input class="form-control" id="name2" name="name2" type="text" required placeholder="Masukan Nama Guru" />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label>Posisi</label>
                                                    <input class="form-control" id="job2" name="job2" type="text" required placeholder="Masukan Posisi" />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label>Telepon</label>
                                                    <input class="form-control" id="phone2" name="phone2" type="text" required placeholder="Masukan Telepon" />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <div class="form-group">
                                                        <label>Gambar</label>
                                                        <input type="file" class="form-control" id="image2" name="image2" accept="image/*" />
                                                    </div>
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


                    <div class="modal fade custom-modal" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="confirmModal" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div id="modHead" class="modal-header">
                                    <h5 class="modal-title" id="confirmModalTitle">Apakah Anda Yakin?</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p class="textBody"></p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                    <button id="confirmFormBtn" type="button" class="btn btn-primary" onclick="">Ya</button>
                                </div>
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
        function modalEdit(id) {

            $.ajax({
                url: '<?= site_url('AdminController/getTeacher/') ?>' + id,
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

                    $('#nrp2').val(data.teacher.nrp);
                    $('#name2').val(data.teacher.name);
                    $('#phone2').val(data.teacher.phone);
                    $('#job2').val(data.teacher.job);

                    $('#editForm').attr('action', `<?= site_url('AdminController/editTeacher/') ?>${data.teacher.id_teacher}`);

                    $('#modal-edit-teacher').modal('show');
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    console.log('Error: ', thrownError);
                    Swal.close();
                    showAlert('error', thrownError);
                }
            });
        }

        function modalDelete(id, name) {
            $('.textBody').text(`Perubahan tidak bisa dikembalikan. Apakah anda yakin akan menghapus guru ${name}?`);
            $('#confirmFormBtn').attr("onclick", `deleteTeacher('${id}')`);
            $("#confirmFormBtn").attr('class', 'btn btn-danger');
            $("#modHead").attr('class', 'modal-header bg-danger');
            $('#confirmModal').modal('show');
        }

        function modalStatus(id, name) {
            $('.textBody').text(`Status akan diubah. Apakah anda yakin akan mengubah status guru ${name}?`);
            $('#confirmFormBtn').attr("onclick", `statusTeacher('${id}')`);
            $("#confirmFormBtn").attr('class', 'btn btn-warning');
            $("#modHead").attr('class', 'modal-header bg-warning');
            $('#confirmModal').modal('show');
        }

        function deleteTeacher(id) {
            location.href = `<?= base_url('AdminController/deleteTeacher/') ?>${id}`;
        }

        function statusTeacher(id) {
            location.href = `<?= base_url('AdminController/statusTeacher/') ?>${id}`;
        }
    </script>

    <script>
        // START CODE FOR BASIC DATA TABLE 
        $(document).ready(function() {
            $('#tableTeacher').DataTable();
        });
    </script>
    <!-- END Java Script for this page -->

</body>

</html>