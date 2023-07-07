<!-- Carousel Start -->
<?php
$idrt = $_SESSION['id_rt'];
$sqlrt = mysqli_query($con, "SELECT * FROM rt WHERE rt_id = '$idrt'");
$datart = mysqli_fetch_assoc($sqlrt);
$namart = $datart['rt'];

$sqlkelahiran = mysqli_query($con, "SELECT * FROM kelahiran WHERE kelahiran_rt = '$idrt' AND kelahiran_status = 'Menunggu Verifikasi RT'");
$sqlkematian = mysqli_query($con, "SELECT * FROM kematian WHERE kematian_rt = '$idrt' AND kematian_status = 'Menunggu Verifikasi RT'");
$sqladministrasi = mysqli_query($con, "SELECT * FROM administrasi WHERE administrasi_rt = '$idrt' AND administrasi_status = 'Menunggu Verifikasi RT'");
$sqlizinusaha = mysqli_query($con, "SELECT * FROM izinusaha WHERE izinusaha_rt = '$idrt' AND izinusaha_status = 'Menunggu Verifikasi RT'");

$num_kelahiran = mysqli_num_rows($sqlkelahiran);
$num_kematian = mysqli_num_rows($sqlkematian);
$num_administrasi = mysqli_num_rows($sqladministrasi);
$num_izinusaha = mysqli_num_rows($sqlizinusaha);


$sqldaftar = mysqli_query($con, "SELECT * FROM user WHERE user_rt_id = '$idrt' AND user_status = 'Menunggu Verifikasi'");
$num_daftar = mysqli_num_rows($sqldaftar);

?>

<div class="container-fluid p-0 pb-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="owl-carousel header-carousel position-relative">
        <div class="owl-carousel-item position-relative">
            <img class="img-fluid" src="../assets/img/3.jpeg" alt="">
            <div class="owl-carousel-inner">
                <div class="container">
                    <div class="row justify-content-start">
                        <div class="col-lg-12">
                            <!-- ALERT KELAHIRAN -->
                            <?php
                            if ($num_kelahiran > 0) {
                                $datakelahiran = mysqli_fetch_assoc($sqlkelahiran);
                            ?>
                                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                    <strong><?= $num_kelahiran ?> Pemberitahuan!!</strong> Status pengajuan keterangan kelahiran : <strong><?= $datakelahiran['kelahiran_status'] ?></strong>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            <?php
                            }
                            ?>
                            <!-- ALERT KELAHIRAN -->
                            <!-- ALERT KEMATIAN -->
                            <?php
                            if ($num_kematian > 0) {
                                $datakematian = mysqli_fetch_assoc($sqlkematian);
                            ?>
                                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                    <strong><?= $num_kematian ?> Pemberitahuan!!</strong> Status pengajuan keterangan kematian: <strong><?= $datakematian['kematian_status'] ?></strong>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            <?php
                            }
                            ?>
                            <!-- ALERT KEMATIAN -->
                            <!-- ALERT ADMINISTRASI -->
                            <?php
                            if ($num_administrasi > 0) {
                                $dataadministrasi = mysqli_fetch_assoc($sqladministrasi);
                            ?>
                                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                    <strong><?= $num_administrasi ?> Pemberitahuan!!</strong> Status pengajuan keterangan pindah penduduk: <strong><?= $dataadministrasi['administrasi_status'] ?></strong>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            <?php
                            }
                            ?>
                            <!-- ALERT ADMINISTRASI -->
                            <!-- ALERT IZIN USAHA -->
                            <?php
                            if ($num_izinusaha > 0) {
                                $dataizinusaha = mysqli_fetch_assoc($sqlizinusaha);
                            ?>
                                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                    <strong><?= $num_izinusaha ?> Pemberitahuan!!</strong> Status pengajuan keterangan izin usaha: <strong><?= $dataizinusaha['izinusaha_status'] ?></strong>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            <?php
                            }
                            ?>
                            <!-- ALERT IZIN USAHA -->
                            <!-- ALERT DAFTAR -->
                            <?php
                            if ($num_daftar > 0) {
                            ?>
                                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                    <strong>Pemberitahuan!! <?= $num_daftar ?> Warga menunggu verifikasi registrasi !</strong>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            <?php
                            }
                            ?>
                            <!-- ALERT DAFTAR -->
                            <p class="text-primary text-uppercase fw-bold mb-2">Hallo, <?= $_SESSION['nama_user'] ?></p>
                            <h1 class="display-1 text-light mb-4 animated slideInDown">Sistem Kependudukan Desa Nelelamadike</h1>
                            <p class="text-light fs-5 mb-4 pb-3">KETUA RT : <?= $namart ?></p>
                            <!-- <div class="row">
                                <div class="col-lg-3 mx-">
                                    <a href="sign-in.php" class="btn btn-primary rounded-pill py-3 px-5">Sign In!</a>
                                </div>
                                <div class="col-lg-6 mx-">
                                    <a href="sign-up.php" class="btn btn-primary rounded-pill py-3 px-5">Sign Up!</a>
                                </div>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="owl-carousel-item position-relative">
            <img class="img-fluid" src="../assets/img/4.jpeg" alt="">
            <div class="owl-carousel-inner">
                <div class="container">
                    <div class="row justify-content-start">
                        <div class="col-lg-8">
                            <p class="text-primary text-uppercase fw-bold mb-2">Hallo, <?= $_SESSION['nama_user'] ?></p>
                            <h1 class="display-1 text-light mb-4 animated slideInDown">Sistem Kependudukan Desa Nelelamadike</h1>
                            <p class="text-light fs-5 mb-4 pb-3">KETUA RT : <?= $namart ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Carousel End -->

<div class="container-xxl py-6">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <a href="?page=kelahiran">
                    <div class="wow fadeIn" data-wow-delay="0.3s">
                        <div class="fact-item bg-light rounded text-center h-100 p-5">
                            <i class="fa fa-users fa-4x text-primary mb-4"></i>
                            <p class="mb-2">Kelahiran</p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-3">
                <a href="?page=kematian">
                    <div class="wow fadeIn" data-wow-delay="0.3s">
                        <div class="fact-item bg-light rounded text-center h-100 p-5">
                            <i class="fa fa-users fa-4x text-primary mb-4"></i>
                            <p class="mb-2">Kematian</p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-3">
                <a href="?page=pindah">
                    <div class="wow fadeIn" data-wow-delay="0.3s">
                        <div class="fact-item bg-light rounded text-center h-100 p-5">
                            <i class="fa fa-users fa-4x text-primary mb-4"></i>
                            <p class="mb-2">Keluar</p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-3">
                <a href="?page=pindah">
                    <div class="wow fadeIn" data-wow-delay="0.3s">
                        <div class="fact-item bg-light rounded text-center h-100 p-5">
                            <i class="fa fa-users fa-4x text-primary mb-4"></i>
                            <p class="mb-2">Masuk</p>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>
<!-- Facts End -->