<?php
session_start();
session_destroy();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login Kepala Desa</title>
    <link rel="stylesheet" href="../admin/vendors/feather/feather.css">
    <link rel="stylesheet" href="../admin/vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="../admin/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="../admin/css/vertical-layout-light/style.css">
    <link rel="shortcut icon" href="../assets/img/logo-flotim.jpg" />
</head>

<body>
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-center auth px-0">
                <div class="row w-100 mx-0">
                    <div class="col-lg-4 mx-auto">
                        <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                            <div class="brand-logo text-center">
                                <img src="../assets/img/logo-flotim.jpg" alt="logo" class="ml-6">
                            </div>
                            <!-- <h4>Hello! let's get started</h4> -->
                            <h6 class="font-weight-light">Login Kepala Desa</h6>
                            <form class="pt-3" action="" method="post">
                                <div class="form-group">
                                    <input type="text" name="username" class="form-control form-control-lg" placeholder="Username" required>
                                </div>
                                <div class="form-group">
                                    <input type="password" name="password" class="form-control form-control-lg" placeholder="Password" required>
                                </div>
                                <div class="mt-3">
                                    <input type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" name="login" value="SIGN IN">
                                </div>
                            </form>
                            <?php
                            include '../system/koneksi.php';
                            if (isset($_POST['login'])) {
                                $username = $_POST['username'];
                                $password = md5($_POST['password']);

                                $sql = mysqli_query($con, "SELECT * FROM kepala_desa WHERE kepala_desa_username = '$username' AND kepala_desa_password = '$password'");

                                if (mysqli_num_rows($sql) > 0) {
                                    session_start();
                                    $data = mysqli_fetch_assoc($sql);
                                    $_SESSION['id_kepala_desa'] = $data['kepala_desa_id'];
                                    $_SESSION['nama_kepala_desa'] = $data['kepala_desa_nama'];

                                    echo "<script>alert('Login Berhasil !');window.location='main.php';</script>";
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
    <script src="../admin/vendors/js/vendor.bundle.base.js"></script>
    <script src="../admin/js/off-canvas.js"></script>
    <script src="../admin/js/hoverable-collapse.js"></script>
    <script src="../admin/js/template.js"></script>
    <script src="../admin/js/settings.js"></script>
    <script src="../admin/js/todolist.js"></script>
</body>

</html>