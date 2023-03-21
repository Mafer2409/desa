<?php
session_start();
session_destroy();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>DESA</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&family=Playfair+Display:wght@600;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="bootstrap/dist/css/bootstrap.min.css" crossorigin="anonymous">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-center auth px-0">
                <div class="row w-100 mx-0">
                    <div class="col-lg-8 mx-auto">
                        <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                            <!-- <div class="brand-logo">
                                <img src="images/logo.svg" alt="logo">
                            </div> -->
                            <!-- <h4>Hello! Member</h4> -->
                            <h6 class="font-weight-light">Silahkan daftar dibawah ini!</h6>
                            <form class="pt-3" action="" method="post">
                                <div class="form-group">
                                    <input type="text" name="user_nik" class="form-control form-control-lg" placeholder="NIK" required>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="user_nama" class="form-control form-control-lg" placeholder="Nama Lengkap" required>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <input type="text" name="user_tempat_lahir" class="form-control form-control-lg" placeholder="Tempat Lahir" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <input type="date" name="user_tanggal_lahir" class="form-control form-control-lg" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <select class="form-control" name="user_rt_id" required>
                                        <option value="">-- Pilih RW / RT --</option>
                                        <?php
                                        include 'system/koneksi.php';
                                        $sqlrt = mysqli_query($con, "SELECT * FROM rt");
                                        while ($datart = mysqli_fetch_assoc($sqlrt)) {
                                        ?>
                                            <option value="<?= $datart['rt_id'] ?>"><?= $datart['rt'] ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <select class="form-control" name="user_agama" required>
                                        <option value="">-- Pilih Agama --</option>
                                        <option value="Katolik">Katolik</option>
                                        <option value="Protestan">Protestan</option>
                                        <option value="Islam">Islam</option>
                                        <option value="Hindu">Hindu</option>
                                        <option value="Budha">Budha</option>
                                        <option value="Konghuchu">Konghuchu</option>
                                        <option value="Lainnya...">Lainnya...</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <select class="form-control" name="user_jk" required>
                                        <option value="">-- Pilih Jenis Kelamin --</option>
                                        <option value="Laki-laki">Laki-laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <select class="form-control" name="user_wn" required>
                                        <option value="">-- Warga Negara --</option>
                                        <option value="WNI">WNI</option>
                                        <option value="WNA">WNA</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <textarea name="user_alamat" class="form-control" cols="20" rows="5" required placeholder="Alamat..."></textarea>
                                </div>
                                <div class="form-group">
                                    <select class="form-control" name="user_status_tinggal" required>
                                        <option value="">-- Pilih Status Tinggal --</option>
                                        <option value="Tetap">Penduduk Tetap</option>
                                        <option value="Tidak Tetap">Penduduk Tidak Tetap</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="user_pekerjaan" class="form-control form-control-lg" placeholder="Pekerjaan" required>
                                </div>
                                <div class="form-group">
                                    <select class="form-control" name="user_status_kawin" required>
                                        <option value="">-- Pilih Status Kawin --</option>
                                        <option value="Belum Menikah">Belum Menikah</option>
                                        <option value="Sudah Menikah">Sudah Menikah</option>
                                        <option value="Cerai Hidup">Cerai Hidup</option>
                                        <option value="Cerai Mati">Cerai Mati</option>
                                        <option value="Tidak Menikah">Tidak Menikah</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <select class="form-control" name="user_jenjang_pendidikan" required>
                                        <option value="">-- Pilih Pendidikan --</option>
                                        <option value="TK">TK</option>
                                        <option value="SD">SD</option>
                                        <option value="SLTP/SMP">SLTP/SMP</option>
                                        <option value="SLTA/SMA/SMK">SLTA/SMA/SMK</option>
                                        <option value="S1">S1</option>
                                        <option value="S2">S2</option>
                                        <option value="S3">S3</option>
                                        <option value="Profesor">Profesor</option>
                                        <option value="Tidak Sekolah">Tidak Sekolah</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <input type="email" name="user_email" class="form-control form-control-lg" placeholder="E-Mail" required>
                                </div>
                                <div class="form-group">
                                    <input type="password" name="user_password" class="form-control form-control-lg" placeholder="Password" required>
                                </div>
                                <div class="mt-3">
                                    <input type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" name="daftar" value="Daftar">
                                </div>
                            </form>
                            <?php
                            include 'system/koneksi.php';
                            if (isset($_POST['daftar'])) {
                                $user_nik = $_POST['user_nik'];
                                $user_nama = $_POST['user_nama'];
                                $user_tempat_lahir = $_POST['user_tempat_lahir'];
                                $user_tanggal_lahir = $_POST['user_tanggal_lahir'];
                                $user_rt_id = $_POST['user_rt_id'];
                                $user_agama = $_POST['user_agama'];
                                $user_jk = $_POST['user_jk'];
                                $user_wn = $_POST['user_wn'];
                                $user_alamat = $_POST['user_alamat'];
                                $user_status_tinggal = $_POST['user_status_tinggal'];
                                $user_pekerjaan = $_POST['user_pekerjaan'];
                                $user_status_kawin = $_POST['user_status_kawin'];
                                $user_jenjang_pendidikan = $_POST['user_jenjang_pendidikan'];
                                $user_email = $_POST['user_email'];
                                $user_password = md5($_POST['user_password']);

                                $sqlcekrt = mysqli_query($con, "SELECT * FROM rt WHERE rt_id = '$user_rt_id'");
                                $datacekrt = mysqli_fetch_assoc($sqlcekrt);

                                if ($datacekrt['rt_ketua'] == '0') {
                                    $user_status = 'Aktif';
                                } else {
                                    $user_status = 'Menunggu Verifikasi';
                                }

                                $sql = mysqli_query($con, "INSERT INTO user VALUES('', '$user_nik', '$user_nama', '$user_tempat_lahir', '$user_tanggal_lahir', '$user_rt_id', '$user_agama', '$user_jk', '$user_wn', '$user_alamat', '$user_status', '$user_status_tinggal', '$user_pekerjaan', '$user_status_kawin', '$user_jenjang_pendidikan', '$user_email', '$user_password')");

                                if ($sql) {
                                    echo "<script>alert('Pendaftaran Berhasil !');window.location='index.php';</script>";
                                } else {
                                    echo "<script>alert('Pendaftaran Gagal ! Ulangi Pendaftaran !');window.location='sign-up.php';</script>";
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" crossorigin="anonymous"></script>
    <script src="bootstrap/dist/js/bootstrap.min.js" crossorigin="anonymous"></script>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script> -->
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/counterup/counterup.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>