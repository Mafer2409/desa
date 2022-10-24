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
                    <div class="col-lg-4 mx-auto">
                        <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                            <!-- <div class="brand-logo">
                                <img src="images/logo.svg" alt="logo">
                            </div> -->
                            <!-- <h4>Hello! Member</h4> -->
                            <h6 class="font-weight-light">Silahkan daftar dibawah ini!</h6>
                            <form class="pt-3" action="" method="post">
                                <div class="form-group">
                                    <input type="text" name="nama" class="form-control form-control-lg" placeholder="Nama Lengkap" required>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <input type="text" name="tempatlahir" class="form-control form-control-lg" placeholder="Tempat Lahir" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <input type="date" name="tanggallahir" class="form-control form-control-lg" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <select class="form-control" name="rt" required>
                                        <option value="">-- Pilih RT --</option>
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
                                    <select class="form-control" name="jk" required>
                                        <option value="">-- Pilih Jenis Kelamin --</option>
                                        <option value="Laki-laki">Laki-laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="telepon" class="form-control form-control-lg" placeholder="Telepon" required>
                                </div>
                                <div class="form-group">
                                    <input type="email" name="email" class="form-control form-control-lg" placeholder="E-Mail" required>
                                </div>
                                <div class="form-group">
                                    <input type="password" name="password" class="form-control form-control-lg" placeholder="Password" required>
                                </div>
                                <div class="mt-3">
                                    <input type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" name="daftar" value="Daftar">
                                </div>
                            </form>
                            <?php
                            include 'system/koneksi.php';
                            if (isset($_POST['daftar'])) {
                                $nama = $_POST['nama'];
                                $tempatlahir = $_POST['tempatlahir'];
                                $tanggallahir = $_POST['tanggallahir'];
                                $rt = $_POST['rt'];
                                $jk = $_POST['jk'];
                                $telepon = $_POST['telepon'];
                                $email = $_POST['email'];
                                $password = md5($_POST['password']);
                                $status = 'Menunggu Verifikasi';

                                $sql = mysqli_query($con, "INSERT INTO user VALUES('', '$nama', '$tempatlahir', '$tanggallahir', '$rt', '$jk', '$telepon', '$email', '$password', '$status')");

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