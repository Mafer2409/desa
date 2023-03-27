<?php
$id = $_GET['id'];
$sqluser = mysqli_query($con, "SELECT * FROM user, rt WHERE user.user_rt_id = rt.rt_id AND user.user_id = '$id'");
$datauser = mysqli_fetch_assoc($sqluser);
?>

<div class="content-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h3>Edit Data Warga | <small><?= $datauser['user_nama'] ?></small></h3>
        </div>

        <div class="card">
            <form class="mx-3" action="" method="post">
                <div class="row mt-3">
                    <div class="col-lg-6">
                        <div class="container">
                            <div class="form-group">
                                <input type="text" name="user_nik" class="form-control form-control-lg" placeholder="NIK" required value="<?= $datauser['user_nik'] ?>">
                            </div>
                            <div class="form-group">
                                <input type="text" name="user_nama" class="form-control form-control-lg" placeholder="Nama Lengkap" required value="<?= $datauser['user_nama'] ?>">
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <input type="text" name="user_tempat_lahir" class="form-control form-control-lg" placeholder="Tempat Lahir" required value="<?= $datauser['user_tempat_lahir'] ?>">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <input type="date" name="user_tanggal_lahir" class="form-control form-control-lg" required value="<?= $datauser['user_tgl_lahir'] ?>">
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
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="container">
                            <div class="form-group">
                                <textarea name="user_alamat" class="form-control" cols="20" rows="5" required placeholder="Alamat..."><?= $datauser['user_alamat'] ?></textarea>
                            </div>
                            <div class="form-group">
                                <select class="form-control" name="user_status_tinggal" required>
                                    <option value="">-- Pilih Status Tinggal --</option>
                                    <option value="Tetap">Penduduk Tetap</option>
                                    <option value="Tidak Tetap">Penduduk Tidak Tetap</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <input type="text" name="user_pekerjaan" class="form-control form-control-lg" placeholder="Pekerjaan" required value="<?= $datauser['user_pekerjaan'] ?>">
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
                                <input type="email" name="user_email" class="form-control form-control-lg" placeholder="E-Mail" required value="<?= $datauser['user_email'] ?>">
                            </div>
                            <div class="form-group">
                                <input type="password" name="user_password" class="form-control form-control-lg" placeholder="Password" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary btn-block" name="daftar" value="Daftar">
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>