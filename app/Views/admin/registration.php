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

    <style>
        .indikator {
            display: flex;
            justify-content: space-between;
        }
    </style>

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
                                <h1 class="main-title float-left">Daftar PPDB</h1>
                                <ol class="breadcrumb float-right">
                                    <li class="breadcrumb-item">Beranda</li>
                                    <li class="breadcrumb-item active">Daftar PPDB</li>
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
                                    <h3><i class="fa fa-file-text-o"></i> PPDB (<?= $countData ?> data)</h3>
                                </div>

                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="tableRegistration" class="table table-bordered table-hover display">
                                            <thead>
                                                <tr class="text-center">
                                                    <th>#</th>
                                                    <th style="min-width: 200px;">Detail PPDB</th>
                                                    <th style="min-width: 100px;">Lainya</th>
                                                    <th style="max-width: 110px; min-width: 110px;">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $x = 1 ?>
                                                <?php foreach ($registration as $t) : ?>
                                                    <?php
                                                    $id = $t['id_registration'];
                                                    ?>
                                                    <tr>
                                                        <td class="text-center"><?= $x ?></td>
                                                        <td>
                                                            <strong><?= $t['fullName'] ?></strong><br>
                                                            <small><?= $t['gender'] ?></small><br>
                                                            <small><?= $t['phoneNumber'] ?></small>
                                                        </td>

                                                        <td>
                                                            <strong><?= $t['registCode'] ?></strong><br>
                                                            <small><?= $t['registStatus'] ?></small><br>
                                                            <small><?= $t['dateRegist'] ?></small>
                                                        </td>
                                                        <td class="text-center" style="max-width: 90px; min-width: 90px;">
                                                            <button id="edtBtn" class="d-inline btn btn-info mb-1" onclick="modalEdit('<?= $id ?>')"><i class="fa fa-pencil" aria-hidden="true"></i></button>
                                                            <button class="d-inline btn btn-warning mb-1" onclick="modalStatus('<?= $id ?>', '<?= $t['registCode'] ?>')"><i class="fa fa-warning" aria-hidden="true"></i></button>
                                                            <button class="d-inline btn btn-danger mb-1" onclick="modalDelete('<?= $id ?>', '<?= $t['registCode'] ?>')"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
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

                    <div class="modal fade custom-modal" tabindex="-1" role="dialog" aria-hidden="true" aria-labelledby="modal-detail-registration" id="modal-detail-registration">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title-registration">Detail PPDB</h5>
                                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                </div>

                                <div class="modal-body">

                                    <div class="nav nav-tabs indikator mb-3" role="tablist">

                                        <a role="button" href="#page1" class="btn btn-primary mb-2" aria-controls="page1" role="tab" data-toggle="tab"><i class="fa fa-arrow-left"></i></a>
                                        <a role="button" href="#page2" class="btn btn-primary mb-2" aria-controls="page2" role="tab" data-toggle="tab"><i class="fa fa-arrow-right"></i></a>
                                    </div>



                                    <div class="tab-content">
                                        <div role="tabpanel" class="tab-pane active" id="page1">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label>Kode Registrasi</label>
                                                        <input class="form-control" id="registCode" name="registCode" type="text" disabled />
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label>Tanggal Registrasi</label>
                                                        <input class="form-control" id="dateRegist" name="dateRegist" type="text" disabled />
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <label>Nama Lengkap</label>
                                                        <input class="form-control" id="fullName" name="fullName" type="text" disabled />
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label>Nama</label>
                                                        <input class="form-control" id="name" name="name" type="text" disabled />
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label>Jenis Kelamin</label>
                                                        <input class="form-control" id="gender" name="gender" type="text" disabled />
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <label>Tempat, Tanggal Lahir</label>
                                                        <input class="form-control" id="placeDateOfBirth" name="placeDateOfBirth" type="text" disabled />
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label>Agama</label>
                                                        <input class="form-control" id="religion" name="religion" type="text" disabled />
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label>Kewarganegaraan</label>
                                                        <input class="form-control" id="civics" name="civics" type="text" disabled />
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label>Anak Ke</label>
                                                        <input class="form-control" id="childNumber" name="childNumber" type="text" disabled />
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label>Jumlah Saudara Kandung</label>
                                                        <input class="form-control" id="siblings" name="siblings" type="text" disabled />
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label>Jumlah Saudara Tiri</label>
                                                        <input class="form-control" id="halfSiblings" name="halfSiblings" type="text" disabled />
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label>Jumlah Saudara Angkat</label>
                                                        <input class="form-control" id="adoptedSiblings" name="adoptedSiblings" type="text" disabled />
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <label>Bahasa Sehari-Hari</label>
                                                        <input class="form-control" id="language" name="language" type="text" disabled />
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label>Berat Badan (KG)</label>
                                                        <input class="form-control" id="weight" name="weight" type="text" disabled />
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label>Tinggi Badan (CM)</label>
                                                        <input class="form-control" id="height" name="height" type="text" disabled />
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-lg-4">
                                                    <div class="form-group">
                                                        <label>Golongan Darah</label>
                                                        <input class="form-control" id="bloodLine" name="bloodLine" type="text" disabled />
                                                    </div>
                                                </div>
                                                <div class="col-lg-8">
                                                    <div class="form-group">
                                                        <label>Penyakit</label>
                                                        <input class="form-control" id="disease" name="disease" type="text" disabled />
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <label>Alamat</label>
                                                        <textarea class="form-control" id="address" name="address" type="text" disabled></textarea>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label>Telepon</label>
                                                        <input class="form-control" id="phoneNumberNumber" name="phoneNumberNumber" type="text" disabled />
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label>Tempat Tinggal</label>
                                                        <input class="form-control" id="place" name="place" type="text" disabled />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div role="tabpanel" class="tab-pane" id="page2">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label>Nama Ayah Kandung</label>
                                                        <input class="form-control" id="fatherName" name="fatherName" type="text" disabled />
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label>Nama Ibu Kandung</label>
                                                        <input class="form-control" id="motherName" name="motherName" type="text" disabled />
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label>Pendidikan Ayah</label>
                                                        <input class="form-control" id="fatherEdu" name="fatherEdu" type="text" disabled />
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label>Pendidikan Ibu</label>
                                                        <input class="form-control" id="motherEdu" name="motherEdu" type="text" disabled />
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label>Pekerjaan Ayah</label>
                                                        <input class="form-control" id="fatherJob" name="fatherJob" type="text" disabled />
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label>Pekerjaan Ibu</label>
                                                        <input class="form-control" id="motherJob" name="motherJob" type="text" disabled />
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label>Nama Wali</label>
                                                        <input class="form-control" id="guardName" name="guardName" type="text" disabled />
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label>Pendidikan Wali</label>
                                                        <input class="form-control" id="guardEdu" name="guardEdu" type="text" disabled />
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label>Hubungan Dengan Siswa</label>
                                                        <input class="form-control" id="guardConnect" name="guardConnect" type="text" disabled />
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label>Pekerjaan Wali</label>
                                                        <input class="form-control" id="guardjob" name="guardjob" type="text" disabled />
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-lg-3">
                                                    <a role="button" href="#" target="_blank" id="fcKK" class="btn btn-primary w-100 d-flex align-items-start">
                                                        <span class="btn-label"><i class="fa fa-download"></i></span>FC KK
                                                    </a>
                                                </div>
                                                <div class="col-lg-3">
                                                    <a role="button" href="#" target="_blank" id="fcAK" class="btn btn-primary w-100 d-flex align-items-start">
                                                        <span class="btn-label"><i class="fa fa-download"></i></span>FC Akte
                                                    </a>
                                                </div>
                                                <div class="col-lg-3">
                                                    <a role="button" href="#" target="_blank" id="fcKTP" class="btn btn-primary w-100 d-flex align-items-start">
                                                        <span class="btn-label"><i class="fa fa-download"></i></span>FC KTP
                                                    </a>
                                                </div>
                                                <div class="col-lg-3">
                                                    <a role="button" href="#" target="_blank" id="formRegist" class="btn btn-primary w-100 d-flex align-items-start">
                                                        <span class="btn-label"><i class="fa fa-download"></i></span>Formulir
                                                    </a>
                                                </div>
                                            </div>



                                        </div>
                                    </div>

                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                </div>

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
                url: '<?= site_url('AdminController/getRegistration/') ?>' + id,
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

                    $('#fullName').val(data.registration.fullName);
                    $('#name').val(data.registration.name);
                    $('#gender').val(data.registration.gender);
                    $('#placeDateOfBirth').val(data.registration.placeDateOfBirth);
                    $('#religion').val(data.registration.religion);
                    $('#civics').val(data.registration.civics);
                    $('#childNumber').val(data.registration.childNumber);
                    $('#siblings').val(data.registration.siblings);
                    $('#halfSiblings').val(data.registration.halfSiblings);
                    $('#adoptedSiblings').val(data.registration.adoptedSiblings);
                    $('#language').val(data.registration.language);
                    $('#weight').val(data.registration.weight);
                    $('#height').val(data.registration.height);
                    $('#bloodLine').val(data.registration.bloodLine);
                    $('#disease').val(data.registration.disease);
                    $('#address').val(data.registration.address);
                    $('#phoneNumberNumber').val(data.registration.phoneNumberNumber);
                    $('#place').val(data.registration.place);
                    $('#fatherName').val(data.registration.fatherName);
                    $('#motherName').val(data.registration.motherName);
                    $('#fatherEdu').val(data.registration.fatherEdu);
                    $('#motherEdu').val(data.registration.motherEdu);
                    $('#fatherJob').val(data.registration.fatherJob);
                    $('#motherJob').val(data.registration.motherJob);
                    $('#guardName').val(data.registration.guardName);
                    $('#guardEdu').val(data.registration.guardEdu);
                    $('#guardConnect').val(data.registration.guardConnect);
                    $('#guardjob').val(data.registration.guardjob);
                    $('#dateRegist').val(data.registration.dateRegist);
                    $('#registCode').val(data.registration.registCode);

                    $("#fcKK").attr("href", `<?= site_url('data/') ?>${data.registration.fcKK}`);
                    $("#fcAK").attr("href", `<?= site_url('data/') ?>${data.registration.fcAK}`);
                    $("#fcKTP").attr("href", `<?= site_url('data/') ?>${data.registration.fcKTP}`);
                    $("#formRegist").attr("href", `<?= site_url('docx/') ?>${data.registration.registCode}`);

                    $('#modal-detail-registration').modal('show');
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    console.log('Error: ', thrownError);
                    Swal.close();
                    showAlert('error', thrownError);
                }
            });
        }

        function modalDelete(id, name) {
            $('.textBody').text(`Perubahan tidak bisa dikembalikan. Apakah anda yakin akan menghapus PPDB ${name}?`);
            $('#confirmFormBtn').attr("onclick", `deleteRegistration('${id}')`);
            $("#confirmFormBtn").attr('class', 'btn btn-danger');
            $("#modHead").attr('class', 'modal-header bg-danger');
            $('#confirmModal').modal('show');
        }

        function modalStatus(id, name) {
            $('.textBody').text(`Status akan diubah. Apakah anda yakin akan mengubah status PPDB ${name}?`);
            $('#confirmFormBtn').attr("onclick", `statusRegistration('${id}')`);
            $("#confirmFormBtn").attr('class', 'btn btn-warning');
            $("#modHead").attr('class', 'modal-header bg-warning');
            $('#confirmModal').modal('show');
        }

        function deleteRegistration(id) {
            location.href = `<?= base_url('AdminController/deleteRegistration/') ?>${id}`;
        }

        function statusRegistration(id) {
            location.href = `<?= base_url('AdminController/statusRegistration/') ?>${id}`;
        }
    </script>

    <script>
        $(document).ready(function() {
            $('#tableRegistration').DataTable();
        });
    </script>
    <!-- END Java Script for this page -->

</body>

</html>