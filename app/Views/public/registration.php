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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

    <style>
        .form-control-container {
            display: flex;
            gap: 10px;
        }

        .form-control-container .form-control {
            width: 50%;
            margin-top: 0 !important;
        }

        .form-control-container #bloodLine {
            width: 30%;
            margin-top: 0 !important;
        }

        .form-control-container #disease {
            width: 70%;
            margin-top: 0 !important;
        }

        .form-control {
            height: 48px !important;
            margin-bottom: 10px;
        }

        #address {
            height: auto !important;
        }

        .custom-file-input-container {
            display: flex;
            flex-direction: column;
        }

        .file-input-container {
            position: relative;
            margin-bottom: 10px;
        }

        .file-input {
            opacity: 0;
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            cursor: pointer;
            border-radius: 5px;
            z-index: 2;
        }

        .file-input-label {
            position: relative;
            padding: 6px 12px;
            box-sizing: border-box;
            cursor: pointer;
            background-color: #fff;
            color: #808080;
            height: 48px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            border-radius: 5px;
            z-index: 1;
            margin-bottom: 0;
        }

        .file-input:hover+.file-input-label,
        .file-input:focus+.file-input-label {
            background-color: #f5f5f5;
        }

        .file-input:disabled+.file-input-label {
            opacity: 0.6;
            cursor: not-allowed;
        }

        .file-input.has-file+.file-input-label::after {
            display: none;
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
                    <li><a href="<?= site_url() ?>#top" class="smoothScroll">Beranda</a></li>
                    <li><a href="<?= site_url() ?>#about" class="smoothScroll">Tentang Kami</a></li>
                    <li><a href="<?= site_url() ?>#team" class="smoothScroll">Pendidik</a></li>
                    <li><a href="<?= site_url() ?>#courses" class="smoothScroll">Fasilitas</a></li>
                    <li><a href="<?= site_url() ?>#testimonial" class="smoothScroll">Galeri</a></li>
                    <li><a href="<?= site_url('berita/1') ?>" class="smoothScroll">Berita</a></li>
                    <li class="active"><a href="<?= site_url('ppdb') ?>" class="smoothScroll">PPDB</a></li>
                </ul>

                <ul class="nav navbar-nav navbar-right">
                    <li><a href="https://wa.me/<?= $profile->phone ?>" target="_blank"><i class="fa fa-phone"></i> <?= $profile->phone ?></a></li>
                </ul>
            </div>

        </div>
    </section>

    <!-- CONTACT -->
    <section id="contact">
        <div class="container">
            <div class="row">
                <div class="section-title text-center">
                    <h2 id="clRegist">PPDB Belum Dibuka</h2>
                    <h2 id="opRegist">PPDB Online TA <?= $profile->year ?> <small>Harap isi form dengan benar!</small></h2>
                    <h4 id="cekRegist" style="color: white;">Sudah registrasi? <a href="#" data-toggle="modal" data-target="#statusModal"> Cek status</a></h4>
                </div>
                <form id="formRegist" enctype="multipart/form-data">
                    <div class="col-md-6 col-sm-12">


                        <div class="col-md-12 col-sm-12">
                            <input type="text" class="form-control" id="fullName" name="fullName" placeholder="Nama Lengkap" required />


                            <div class="form-control-container">
                                <input type="text" class="form-control" id="name" name="name" placeholder="Nama Panggilan" required />
                                <select class="form-control" id="gender" name="gender" required>
                                    <option value="" selected disabled hidden>Jenis Kelamin</option>
                                    <option value="Laki-Laki">Laki-Laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>

                            <div class="form-control-container">
                                <input type="text" class="form-control" id="placeBirth" name="placeBirth" placeholder="Tempat Lahir" required />
                                <input type="date" class="form-control" id="dateBirth" name="dateBirth">
                            </div>

                            <div class="form-control-container">
                                <select class="form-control" id="religion" name="religion" required>
                                    <option value="" selected disabled hidden>Agama</option>
                                    <option value="Islam">Islam</option>
                                    <option value="Protestanisme">Protestanisme</option>
                                    <option value="Katolik">Katolik</option>
                                    <option value="Hindu">Hindu</option>
                                    <option value="Buddha">Buddha</option>
                                    <option value="Khonghucu">Khonghucu</option>
                                </select>

                                <select class="form-control" id="civics" name="civics" required>
                                    <option value="" selected disabled hidden>Kewarganegaraan</option>
                                    <option value="WNI">WNI</option>
                                    <option value="WNA">WNA</option>
                                </select>
                            </div>

                            <div class="form-control-container">
                                <input type="number" class="form-control" id="childNumber" name="childNumber" placeholder="Anak Nomer Ke" required />
                                <input type="number" class="form-control" id="siblings" name="siblings" placeholder="Jumlah Saudara Kandung" required />
                            </div>
                            <div class="form-control-container">
                                <input type="number" class="form-control" id="halfSiblings" name="halfSiblings" placeholder="Jumlah Saudara Tiri" required />
                                <input type="number" class="form-control" id="adoptedSiblings" name="adoptedSiblings" placeholder="Jumlah Saudara Angkat" required />
                            </div>

                            <input type="text" class="form-control" id="language" name="language" placeholder="Bahasa Sehari-Hari" required style="margin-top: 0 !important;" />

                            <div class="form-control-container">
                                <input type="number" class="form-control" placeholder="Berat Badan (KG)" id="weight" name="weight">
                                <input type="number" class="form-control" placeholder="Tinggi Badan (CM)" id="height" name="height">
                            </div>

                            <div class="form-control-container">
                                <select class="form-control" id="bloodLine" name="bloodLine" required>
                                    <option value="" selected disabled hidden>Golongan Darah</option>
                                    <option value="A">A</option>
                                    <option value="B">B</option>
                                    <option value="AB">AB</option>
                                    <option value="O">O</option>
                                    <option value="-">-</option>
                                </select>
                                <input type="text" class="form-control" id="disease" name="disease" placeholder="Penyakit Berat Yang Pernah Diderita" required />
                            </div>
                            <div class="form-control-container">
                                <input type="text" class="form-control" id="phoneNumber" name="phoneNumber" placeholder="Nomer Telepon" required />
                                <select class="form-control" id="place" name="place" required>
                                    <option value="" selected disabled hidden>Tempat Tinggal</option>
                                    <option value="Orang Tua">Orang Tua</option>
                                    <option value="Menumpang">Menumpang</option>
                                    <option value="Asrama">Asrama</option>
                                </select>
                            </div>

                            <textarea rows="8" type="text" class="form-control" id="address" name="address" placeholder="Alamat" required style="margin-top: 0 !important;"></textarea>

                        </div>

                        <div class="col-md-4 col-sm-12">
                            <button id="submitForm" class="form-control">Kirim</button>
                        </div>


                    </div>

                    <div class="col-md-6 col-sm-12">


                        <div class="col-md-12 col-sm-12">
                            <input type="text" class="form-control" id="fatherName" name="fatherName" placeholder="Nama Ayah Kandung" required />
                            <input type="text" class="form-control" id="motherName" name="motherName" placeholder="Nama Ibu Kandung" required />
                            <input type="text" class="form-control" id="fatherEdu" name="fatherEdu" placeholder="Pendidikan Tertinggi Ayah Kandung" required />
                            <input type="text" class="form-control" id="motherEdu" name="motherEdu" placeholder="Pendidikan Tertinggi Ibu Kandung" required />


                            <input type="text" class="form-control" id="fatherJob" name="fatherJob" placeholder="Pekerjaan Ayah" required />

                            <input type="text" class="form-control" id="motherJob" name="motherJob" placeholder="Pekerjaan Ibu" required />



                            <input type="text" class="form-control" id="guardName" name="guardName" placeholder="Nama Wali Siswa" required />


                            <input type="text" class="form-control" id="guardEdu" name="guardEdu" placeholder="Pendidikan Tertinggi" required />


                            <input type="text" class="form-control" id="guardConnect" name="guardConnect" placeholder="Hubungan Terhadap Anak" required />

                            <input type="text" class="form-control" id="guardjob" name="guardjob" placeholder="Pekerjaan" required />

                            <div class="custom-file-input-container">
                                <div class="file-input-container">
                                    <input type="file" class="file-input" id="fcKK" name="fcKK" required accept="image/*">
                                    <label for="fcKK" class="file-input-label">FC Kartu Keluarga</label>
                                </div>

                                <div class="file-input-container">
                                    <input type="file" class="file-input" id="fcAK" name="fcAK" required accept="image/*">
                                    <label for="fcAK" class="file-input-label">FC Akte Kelahiran</label>
                                </div>

                                <div class="file-input-container">
                                    <input type="file" class="file-input" id="fcKTP" name="fcKTP" required accept="image/*">
                                    <label for="fcKTP" class="file-input-label">FC KTP</label>
                                </div>
                            </div>

                        </div>
                    </div>
                </form>
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

    <!-- Modal -->
    <div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Registrasi Berhasil</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </div>
                <div class="modal-body">
                    <strong><a href="#" id="codeCopy"></a></strong>
                    <p>Ini adalah kode registrasi anda, harap disimpan dengan baik.</p>
                    <strong><a href="" target="_blank" id="codeLink">Klik disini</a></strong>
                    <p>Untuk Mengunduh Formulir.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="statusModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Cek Status</h5>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="cekKodeRegist" placeholder="Kode Registrasi">
                    </div>
                    <div id="stat">

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="clearData()">Tutup</button>
                    <button type="button" class="btn btn-primary" onclick="cekStatus()">Kirim</button>
                </div>
            </div>
        </div>
    </div>


    <!-- SCRIPTS -->
    <script src="<?= base_url('assets/public/js/jquery.js') ?>"></script>
    <script src="<?= base_url('assets/public/js/bootstrap.min.js') ?>"></script>
    <script src="<?= base_url('assets/public/js/smoothscroll.js') ?>"></script>
    <script src="<?= base_url('assets/public/js/custom.js') ?>"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        var loaderArt = `<div class="spinner-border" role="status">
                                <span class="sr-only">Loading...</span>
                            </div>`;

        var openRegist = '<?= $profile->ppdb ?>';

        setStatus(openRegist);

        setFileInputLabel();

        function setFileInputLabel() {
            $('.file-input').on('change', function() {
                var fileName = $(this).val().split('\\').pop();
                $(this).next('.file-input-label').text(fileName);
            });
        }

        function showAlert(status, message) {
            Swal.fire({
                icon: status,
                title: message
            });
        }

        function setStatus(status) {
            if (status == 'Dibuka') {
                $("#formRegist").show();
                $("#clRegist").hide();
                $("#opRegist").show();
                $("#cekRegist").show();
            } else if (status == 'Ditutup') {
                $("#formRegist").hide();
                $("#clRegist").show();
                $("#opRegist").hide();
                $("#cekRegist").hide();
            }
        }

        function clearData() {
            $("#stat").html("");
        }

        function cekStatus() {
            var codeRegist = $('#cekKodeRegist').val();

            $.ajax({
                url: "<?= site_url('PublicController/getStatausRegist/') ?>" + codeRegist,
                dataType: "json",
                beforeSend: function(data) {
                    $("#stat").html(loaderArt);
                },
                success: function(data) {
                    $("#stat").html("");
                    if (data.status == 'success') {
                        var pesan = '';
                        if (data.registStatus == 'Terverifikasi') {
                            pesan = 'Data terverifikasi, Silahkan hubungi kontak kami';
                        } else {
                            pesan = 'Data sedang diverifikasi, Mohon ditunggu';
                        }

                        var html = `<div class="alert alert-success" role="alert">
                                    <h4 class="alert-heading">${codeRegist}</h4>
                                    <hr>
                                    <table style="font-size: 15px">
                                        <tr>
                                            <td style="padding: 5px;">Nama</td>
                                            <td style="padding: 5px;">:</td>
                                            <td style="padding: 5px;"><strong>${data.fullName}</strong></td>
                                        </tr>
                                        <tr>
                                            <td style="padding: 5px;">Status</td>
                                            <td style="padding: 5px;">:</td>
                                            <td style="padding: 5px;"><strong>${data.registStatus}</strong></td>
                                        </tr>
                                    </table>                                    
                                    <hr>
                                    <p><strong>${pesan}</strong></p>
                                    <hr>
                                    <a href="<?= site_url('docx/') ?>${codeRegist}" target="_blank"><strong>Unduh Formulir</strong></a>
                                </div>`;
                    } else {
                        var html = `<div class="alert alert-success" role="alert">
                                    <h4 class="alert-heading">Data Tidak Ditemukan!</h4>                                    
                                </div>`;
                    }
                    $("#stat").append(html);

                },
                error: function(xhr, ajaxOptions, thrownError) {
                    $("#stat").html(thrownError);
                }
            });
        }

        $(document).ready(function() {

            $('#submitForm').click(function() {
                event.preventDefault();
                var isFormFilled = true;
                $('#formRegist select, #formRegist input').each(function() {
                    if ($(this).is('select')) {
                        if ($(this).find('option:selected').length === 0) {
                            isFormFilled = false;
                            showAlert('error', 'Harap isi semua data');
                            return false;
                        }
                    } else {
                        // Check for other input elements
                        if ($(this).val() === '') {
                            isFormFilled = false;
                            showAlert('error', 'Harap isi semua data');
                            return false;
                        }
                    }
                });


                if (isFormFilled) {
                    Swal.fire({
                        title: 'Konfirmasi',
                        text: 'Apakah Anda yakin ingin mengirim formulir?',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Ya, Kirim!'
                    }).then((result) => {
                        if (result.isConfirmed) {

                            var formData = new FormData($('#formRegist')[0]);

                            $.ajax({
                                type: 'POST',
                                url: '<?= site_url('PublicController/newRegist') ?>',
                                data: formData,
                                contentType: false,
                                processData: false,
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

                                    try {
                                        if (typeof data === 'string') {
                                            data = JSON.parse(data);
                                        }
                                    } catch (e) {
                                        showAlert('error', e);
                                        return;
                                    }

                                    if (data.status === 'error') {
                                        showAlert('error', data.message);
                                        return;
                                    }

                                    $('#codeCopy').text(data.registCode);
                                    $('#codeLink').attr('href', `<?= site_url('docx/') ?>${data.registCode}`);

                                    $('#successModal').modal('show');
                                    $('#formRegist')[0].reset();
                                },
                                error: function(xhr, ajaxOptions, thrownError) {
                                    console.log('Error:', thrownError);
                                    Swal.close();
                                    showAlert('error', thrownError);
                                }
                            });
                        }
                    });
                }
            });
        });
    </script>



</body>

</html>