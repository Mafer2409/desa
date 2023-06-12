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
                    <div class="col-lg-6 mx-auto mt-5 mb-5">
                        <div class="card bg-success">
                            <div class="card-body">
                                <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                                    <div class="brand-logo">
                                        <!-- <img src="assets/images/logo.svg" alt="logo"> -->
                                    </div>
                                    <h4 class="text-light mb-4">Hello! Member</h4>
                                    <h6 class="text-light">Silahkan daftar dibawah ini!</h6>
                                    <form class="pt-3" action="" method="post">
                                        <div class="mb-2">
                                            <div class="form-group">
                                                <input type="text" name="user_nik" minlength="16" maxlength="16" id="user_nik" class="form-control form-control-lg" placeholder="NIK" required>
                                            </div>
                                            <!-- <div class="container mb-5" align="center">
                                        <h4 id="status">Isilah NIK anda diatas!</h4>
                                    </div> -->
                                        </div>

                                        <div id="valid">
                                            <!-- <div class="form-group">
                                        <input type="email" name="user_email" class="form-control form-control-lg" placeholder="E-Mail" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="user_password" class="form-control form-control-lg" placeholder="Password" required>
                                    </div>
                                    <div class="mt-3">
                                        <input type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" name="daftar" value="Daftar">
                                    </div> -->
                                        </div>
                                    </form>
                                    <?php
                                    include 'system/koneksi.php';
                                    if (isset($_POST['daftar'])) {
                                        $user_id = $_POST['user_id'];
                                        $user_nik = $_POST['user_nik'];
                                        // $user_nama = $_POST['user_nama'];
                                        // $user_tempat_lahir = $_POST['user_tempat_lahir'];
                                        // $user_tanggal_lahir = $_POST['user_tanggal_lahir'];
                                        // $user_rt_id = $_POST['user_rt_id'];
                                        // $user_agama = $_POST['user_agama'];
                                        // $user_jk = $_POST['user_jk'];
                                        // $user_wn = $_POST['user_wn'];
                                        // $user_alamat = $_POST['user_alamat'];
                                        // $user_status_tinggal = $_POST['user_status_tinggal'];
                                        // $user_pekerjaan = $_POST['user_pekerjaan'];
                                        // $user_status_kawin = $_POST['user_status_kawin'];
                                        // $user_jenjang_pendidikan = $_POST['user_jenjang_pendidikan'];

                                        $user_email = $_POST['user_email'];
                                        $user_password = md5($_POST['user_password']);

                                        // $sqlcekrt = mysqli_query($con, "SELECT * FROM rt WHERE rt_id = '$user_rt_id'");
                                        // $datacekrt = mysqli_fetch_assoc($sqlcekrt);

                                        // if ($datacekrt['rt_ketua'] == '0') {
                                        //     $user_status = 'Aktif';
                                        // } else {
                                        //     $user_status = 'Menunggu Verifikasi';
                                        // }

                                        // $sql = mysqli_query($con, "INSERT INTO user VALUES('', '$user_nik', '$user_nama', '$user_tempat_lahir', '$user_tanggal_lahir', '$user_rt_id', '$user_agama', '$user_jk', '$user_wn', '$user_alamat', '$user_status', '$user_status_tinggal', '$user_pekerjaan', '$user_status_kawin', '$user_jenjang_pendidikan', '$user_email', '$user_password')");
                                        $sql = mysqli_query($con, "UPDATE user SET user_status='Aktif', user_email='$user_email', user_password='$user_password' WHERE user_id = '$user_id'");

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

    <script>
        $(document).ready(function() {
            $('#user_nik').keyup(function() {
                var usernik = $('#user_nik').val();

                // AJAX ------------------------------------
                $.ajax({
                    type: 'POST',
                    url: 'validasi-nik.php',
                    data: {
                        nikuser: usernik
                    },
                    success: function(data) {
                        $('#valid').html(data);
                    }
                });
            });
        });
    </script>
</body>

</html>