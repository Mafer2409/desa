<!-- Carousel Start -->
<?php
$idrt = $_SESSION['id_rt'];
$sqlrt = mysqli_query($con, "SELECT * FROM rt WHERE rt_id = '$idrt'");
$datart = mysqli_fetch_assoc($sqlrt);
$namart = $datart['rt'];

$iduser = $_SESSION['id_user'];
$sqlkelahiran = mysqli_query($con, "SELECT * FROM kelahiran WHERE kelahiran_user = '$iduser' AND kelahiran_notif = '0'");
$sqlkematian = mysqli_query($con, "SELECT * FROM kematian WHERE kematian_user = '$iduser' AND kematian_notif = '0'");
$sqladministrasi = mysqli_query($con, "SELECT * FROM administrasi WHERE administrasi_user = '$iduser' AND administrasi_notif = '0'");
$sqlizinusaha = mysqli_query($con, "SELECT * FROM izinusaha WHERE izinusaha_user = '$iduser' AND izinusaha_notif = '0'");
$sqldomisili = mysqli_query($con, "SELECT * FROM domisili WHERE domisili_user = '$iduser' AND domisili_notif = '0'");

$num_kelahiran = mysqli_num_rows($sqlkelahiran);
$num_kematian = mysqli_num_rows($sqlkematian);
$num_administrasi = mysqli_num_rows($sqladministrasi);
$num_izinusaha = mysqli_num_rows($sqlizinusaha);
$num_domisili = mysqli_num_rows($sqldomisili);
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
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close" onclick="location.href='?page=read-kelahiran&status=<?= $datakelahiran['kelahiran_status'] ?>&iduser=<?= $iduser ?>'">
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
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close" onclick="location.href='?page=read-kematian&status=<?= $datakematian['kematian_status'] ?>&iduser=<?= $iduser ?>'">
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
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close" onclick="location.href='?page=read-administrasi&status=<?= $dataadministrasi['administrasi_status'] ?>&iduser=<?= $iduser ?>'">
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
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close" onclick="location.href='?page=read-izinusaha&status=<?= $dataizinusaha['izinusaha_status'] ?>&iduser=<?= $iduser ?>'">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            <?php
                            }
                            ?>
                            <!-- ALERT IZIN USAHA -->
                            <!-- ALERT DOMISILI -->
                            <?php
                            if ($num_domisili > 0) {
                                $datadomisili = mysqli_fetch_assoc($sqldomisili);
                            ?>
                                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                    <strong><?= $num_domisili ?> Pemberitahuan!!</strong> Status pengajuan keterangan domisili: <strong><?= $datadomisili['domisili_status'] ?></strong>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close" onclick="location.href='?page=read-domisili&status=<?= $datadomisili['domisili_status'] ?>&iduser=<?= $iduser ?>'">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            <?php
                            }
                            ?>
                            <!-- ALERT IZIN USAHA -->
                            <p class="text-primary text-uppercase fw-bold mb-2">Hallo, <?= $_SESSION['nama_user'] ?></p>
                            <h1 class="display-1 text-light mb-4 animated slideInDown">Sistem Kependudukan Desa Nelelamadike</h1>
                            <p class="text-light fs-5 mb-4 pb-3"><?= $namart ?></p>
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
                            <p class="text-light fs-5 mb-4 pb-3"><?= $namart ?></p>
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