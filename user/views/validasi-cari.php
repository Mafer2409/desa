<?php
$penduduk_nik = $_POST['penduduk_nik'];

?>

<!-- Page Header Start -->
<div class="container-fluid page-header py-6 wow fadeIn" data-wow-delay="0.1s">
    <div class="container text-center pt-5 pb-3">
        <h2 class="display-4 text-white animated slideInDown mb-1">Validasi data anda</h2>
    </div>
</div>
<!-- Page Header End -->


<!-- About Start -->
<div class="container-xxl py-12">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-12 wow fadeInUp" data-wow-delay="0.1s">
                <div class="card">
                    <div class="card-body">
                        <form action="?page=validasi-cari" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <input type="text" name="penduduk_nik" class="form-control form-control-lg" placeholder="Masukan NIK Anda..." value="<?= $penduduk_nik ?>" required>
                                    </div>
                                    <div class="col-lg-6">
                                        <input type="submit" class="btn btn-primary btn-lg btn-block" name="Cari" value="Cari">
                                    </div>
                                </div>
                            </div>
                        </form>
                        <?php
                        $sql = mysqli_query($con, "SELECT * FROM penduduk, rt WHERE penduduk.penduduk_rt_id = rt.rt_id AND penduduk.penduduk_nik = '$penduduk_nik'");
                        if (mysqli_num_rows($sql) > 0) {
                            $datapenduduk = mysqli_fetch_assoc($sql);
                        ?>
                            <div class="row mt-5">
                                <div class="col-lg-6">
                                    <table class="table table-hover">
                                        <tr>
                                            <td>NIK</td>
                                            <td>:</td>
                                            <td><?= $datapenduduk['penduduk_nik'] ?></td>
                                        </tr>
                                        <tr>
                                            <td>Nama</td>
                                            <td>:</td>
                                            <td><?= $datapenduduk['penduduk_nama'] ?></td>
                                        </tr>
                                        <tr>
                                            <td>Tempat/Tanggal Lahir</td>
                                            <td>:</td>
                                            <td><?= $datapenduduk['penduduk_tempat_lahir'] ?>, <?= date('d-m-Y', strtotime($datapenduduk['penduduk_tgl_lahir'])) ?></td>
                                        </tr>
                                        <tr>
                                            <td>RT</td>
                                            <td>:</td>
                                            <td><?= $datapenduduk['rt'] ?></td>
                                        </tr>
                                        <tr>
                                            <td>Agama</td>
                                            <td>:</td>
                                            <td><?= $datapenduduk['penduduk_agama'] ?></td>
                                        </tr>
                                        <tr>
                                            <td>Jenis Kelamin</td>
                                            <td>:</td>
                                            <td><?= $datapenduduk['penduduk_jk'] ?></td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="col-lg-6">
                                    <table class="table table-hover">
                                        <tr>
                                            <td>Warga Negara</td>
                                            <td>:</td>
                                            <td><?= $datapenduduk['penduduk_wn'] ?></td>
                                        </tr>
                                        <tr>
                                            <td>Alamat</td>
                                            <td>:</td>
                                            <td><?= $datapenduduk['penduduk_alamat'] ?></td>
                                        </tr>
                                        <tr>
                                            <td>Status Tinggal</td>
                                            <td>:</td>
                                            <td><?= $datapenduduk['penduduk_status_tinggal'] ?></td>
                                        </tr>
                                        <tr>
                                            <td>Pekerjaan</td>
                                            <td>:</td>
                                            <td><?= $datapenduduk['penduduk_pekerjaan'] ?></td>
                                        </tr>
                                        <tr>
                                            <td>Status Kawin</td>
                                            <td>:</td>
                                            <td><?= $datapenduduk['penduduk_status_kawin'] ?></td>
                                        </tr>
                                        <tr>
                                            <td>Jenjang Pendidikan</td>
                                            <td>:</td>
                                            <td><?= $datapenduduk['penduduk_jenjang_pendidikan'] ?></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        <?php
                        } else {
                        ?>
                            <center>
                                <h3>Anda belum terdaftar !</h3>
                            </center>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- About End -->