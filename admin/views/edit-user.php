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
                            <input type="hidden" name="id_user" value="<?= $user_id ?>">
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
                                        $s = '';
                                        if ($datauser['user_rt_id'] == $datart['rt_id']) {
                                            $s = 'selected';
                                        }
                                    ?>
                                        <option value="<?= $datart['rt_id'] ?>" <?= $s ?>><?= $datart['rt'] ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <select class="form-control" name="user_agama">
                                    <option value="<?= $datauser['user_agama'] ?>" selected><?= $datauser['user_agama'] ?></option>
                                    <option value="Katolik">Katolik</option>
                                    <option value="Protestan">Protestan</option>
                                    <option value="Islam">Islam</option>
                                    <option value="Hindu">Hindu</option>
                                    <option value="Budha">Budha</option>
                                    <option value="Konghuchu">Konghuchu</option>
                                    <option value="Lainnya...">Lainnya...</option>
                                    <option value="">-- Pilih Agama --</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <select class="form-control" name="user_jk">
                                    <option value="<?= $datauser['user_jk'] ?>" selected><?= $datauser['user_jk'] ?></option>
                                    <option value="Laki-laki">Laki-laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                    <option value="">-- Pilih Jenis Kelamin --</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <select class="form-control" name="user_wn">
                                    <option value="<?= $datauser['user_wn'] ?>" selected><?= $datauser['user_wn'] ?></option>
                                    <option value="WNI">WNI</option>
                                    <option value="WNA">WNA</option>
                                    <option value="">-- Warga Negara --</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <textarea name="user_alamat" class="form-control" cols="20" rows="5" required placeholder="Alamat..."><?= $datauser['user_alamat'] ?></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="container">
                            <div class="form-group">
                                <select class="form-control" name="user_status_tinggal">
                                    <option value="<?= $datauser['user_status_tinggal'] ?>" selected><?= $datauser['user_status_tinggal'] ?></option>
                                    <option value="Tetap">Penduduk Tetap</option>
                                    <option value="Tidak Tetap">Penduduk Tidak Tetap</option>
                                    <option value="">-- Pilih Status Tinggal --</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <input type="text" name="user_pekerjaan" class="form-control form-control-lg" placeholder="Pekerjaan" required value="<?= $datauser['user_pekerjaan'] ?>">
                            </div>
                            <div class="form-group">
                                <select class="form-control" name="user_status_kawin">
                                    <option value="<?= $datauser['user_status_kawin'] ?>" selected><?= $datauser['user_status_kawin'] ?></option>
                                    <option value="Belum Menikah">Belum Menikah</option>
                                    <option value="Sudah Menikah">Sudah Menikah</option>
                                    <option value="Cerai Hidup">Cerai Hidup</option>
                                    <option value="Cerai Mati">Cerai Mati</option>
                                    <option value="Tidak Menikah">Tidak Menikah</option>
                                    <option value="">-- Pilih Status Kawin --</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <select class="form-control" name="user_jenjang_pendidikan">
                                    <option value="<?= $datauser['user_jenjang_pendidikan'] ?>" selected><?= $datauser['user_jenjang_pendidikan'] ?></option>
                                    <option value="TK">TK</option>
                                    <option value="SD">SD</option>
                                    <option value="SLTP/SMP">SLTP/SMP</option>
                                    <option value="SLTA/SMA/SMK">SLTA/SMA/SMK</option>
                                    <option value="S1">S1</option>
                                    <option value="S2">S2</option>
                                    <option value="S3">S3</option>
                                    <option value="Profesor">Profesor</option>
                                    <option value="Tidak Sekolah">Tidak Sekolah</option>
                                    <option value="">-- Pilih Pendidikan --</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <select class="form-control" name="user_status">
                                    <option value="<?= $datauser['user_status'] ?>" selected><?= $datauser['user_status'] ?></option>
                                    <option value="Aktif">Aktif</option>
                                    <option value="Non-Aktif">Non-Aktif</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <input type="email" name="user_email" class="form-control form-control-lg" placeholder="E-Mail" required value="<?= $datauser['user_email'] ?>">
                            </div>
                            <p class="text-danger"><i>Abaikan jika tidak ingin mengganti password !!!</i></p>
                            <div class="form-group">
                                <input type="password" name="user_password" class="form-control form-control-lg" placeholder="Password">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary btn-block" name="simpan" value="Simpan">
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
if (isset($_POST['simpan'])) {
    $id_user = $_POST['id_user'];
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

    $user_status = $_POST['user_status'];
    $user_email = $_POST['user_email'];
    $pass = $_POST['user_password'];

    if ($pass == '') {
        $sql = mysqli_query($con, "UPDATE user SET user_nik = '$user_nik', user_nama = '$user_nama', user_tempat_lahir = '$user_tempat_lahir', user_tgl_lahir = '$user_tanggal_lahir', user_rt_id = '$user_rt_id', user_agama = '$user_agama', user_jk = '$user_jk', user_wn = '$user_wn', user_alamat = '$user_alamat', user_status = '$user_status', user_status_tinggal = $user_status_tinggal, user_pekerjaan = $user_pekerjaan, user_status_kawin = '$user_status_kawin', user_jenjang_pendidikan = '$user_jenjang_pendidikan', user_email = '$user_email' WHERE user_id = '$id_user'");

        if ($sql) {
            echo "<script>alert('Ubah data Berhasil !');window.location='?page=user';</script>";
        } else {
            echo "<script>alert('Ubah data Gagal ! Ulangi Ubah data !');window.location='?page=user';</script>";
        }
    } else {
        $user_password = md5($_POST['user_password']);

        $sql = mysqli_query($con, "UPDATE user SET user_nik = '$user_nik', user_nama = '$user_nama', user_tempat_lahir = '$user_tempat_lahir', user_tgl_lahir = '$user_tanggal_lahir', user_rt_id = '$user_rt_id', user_agama = '$user_agama', user_jk = '$user_jk', user_wn = '$user_wn', user_alamat = '$user_alamat', user_status = '$user_status', user_status_tinggal = $user_status_tinggal, user_pekerjaan = $user_pekerjaan, user_status_kawin = '$user_status_kawin', user_jenjang_pendidikan = '$user_jenjang_pendidikan', user_email = '$user_email', user_password = '$user_password' WHERE user_id = '$id_user'");

        if ($sql) {
            echo "<script>alert('Ubah data Berhasil !');window.location='?page=user';</script>";
        } else {
            echo "<script>alert('Ubah data Gagal ! Ulangi Ubah data !');window.location='?page=user';</script>";
        }
    }
}
?>