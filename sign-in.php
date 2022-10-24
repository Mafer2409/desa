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
                            <h4>Hello! Member</h4>
                            <h6 class="font-weight-light">Silahkan login terlebih dahulu!</h6>
                            <form class="pt-3" action="" method="post">
                                <div class="form-group">
                                    <input type="email" name="email" class="form-control form-control-lg" placeholder="E-Mail" required>
                                </div>
                                <div class="form-group">
                                    <input type="password" name="password" class="form-control form-control-lg" placeholder="Password" required>
                                </div>
                                <div class="mt-3">
                                    <input type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" name="login" value="SIGN IN">
                                </div>
                            </form>
                            <?php
                            include 'system/koneksi.php';
                            if (isset($_POST['login'])) {
                                $email = $_POST['email'];
                                $password = md5($_POST['password']);

                                $sql = mysqli_query($con, "SELECT * FROM user WHERE user_email = '$email' AND user_password = '$password' AND user_status = 'Aktif'");

                                if (mysqli_num_rows($sql) > 0) {
                                    session_start();
                                    $data = mysqli_fetch_assoc($sql);
                                    $idketua = $data['user_id'];
                                    $sqlrt = mysqli_query($con, "SELECT * FROM rt WHERE rt_ketua = '$idketua'");
                                    $datart = mysqli_fetch_assoc($sqlrt);
                                    if (mysqli_num_rows($sqlrt) > 0) {
                                        $_SESSION['id_rt'] = $datart['rt_id'];
                                        $_SESSION['nama_rt'] = $datart['rt'];
                                        $_SESSION['id_user'] = $data['user_id'];
                                        $_SESSION['nama_user'] = $data['user_nama'];
                                        echo "<script>alert('Login Berhasil !');window.location='rt/main.php';</script>";
                                    } else {
                                        $_SESSION['id_user'] = $data['user_id'];
                                        $_SESSION['nama_user'] = $data['user_nama'];
                                        $_SESSION['id_rt'] = $data['user_rt_id'];
                                        echo "<script>alert('Login Berhasil !');window.location='user/main.php';</script>";
                                    }
                                } else {
                                    echo "<script>alert('Login Gagal ! Masukan username dan password yang valid !');window.location='index.php';</script>";
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