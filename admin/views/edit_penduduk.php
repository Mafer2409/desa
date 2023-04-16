<?php
$id = $_GET['id'];
$sqlpenduduk = mysqli_query($con, "SELECT * FROM penduduk, rt WHERE penduduk.penduduk_rt_id = rt.rt_id AND penduduk.penduduk_id = '$id'");
$datapenduduk = mysqli_fetch_assoc($sqlpenduduk);
?>

<div class="content-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h3>Edit Data Penduduk | <small><?= $datapenduduk['penduduk_nama'] ?></small></h3>
        </div>

        <div class="card">
            <form class="mx-3" action="" method="post">
                <div class="row mt-3">
                    <div class="col-lg-6">
                        <div class="container">
                            <input type="hidden" name="id_penduduk" value="<?= $penduduk_id ?>">
                            <div class="form-group">
                                <input type="text" name="penduduk_nik" class="form-control form-control-lg" placeholder="NIK" required value="<?= $datapenduduk['penduduk_nik'] ?>">
                            </div>
                            <div class="form-group">
                                <input type="text" name="penduduk_nama" class="form-control form-control-lg" placeholder="Nama Lengkap" required value="<?= $datapenduduk['penduduk_nama'] ?>">
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <input type="text" name="penduduk_tempat_lahir" class="form-control form-control-lg" placeholder="Tempat Lahir" required value="<?= $datapenduduk['penduduk_tempat_lahir'] ?>">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <input type="date" name="penduduk_tanggal_lahir" class="form-control form-control-lg" required value="<?= $datapenduduk['penduduk_tgl_lahir'] ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <select class="form-control" name="penduduk_rt_id" required>
                                    <option value="">-- Pilih RW / RT --</option>
                                    <?php
                                    include 'system/koneksi.php';
                                    $sqlrt = mysqli_query($con, "SELECT * FROM rt");
                                    while ($datart = mysqli_fetch_assoc($sqlrt)) {
                                        $s = '';
                                        if ($datapenduduk['penduduk_rt_id'] == $datart['rt_id']) {
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
                                <select class="form-control" name="penduduk_agama">
                                    <option value="<?= $datapenduduk['penduduk_agama'] ?>" selected><?= $datapenduduk['penduduk_agama'] ?></option>
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
                                <select class="form-control" name="penduduk_jk">
                                    <option value="<?= $datapenduduk['penduduk_jk'] ?>" selected><?= $datapenduduk['penduduk_jk'] ?></option>
                                    <option value="Laki-laki">Laki-laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                    <option value="">-- Pilih Jenis Kelamin --</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <select class="form-control" name="penduduk_wn">
                                    <option value="<?= $datapenduduk['penduduk_wn'] ?>" selected><?= $datapenduduk['penduduk_wn'] ?></option>
                                    <option value="WNI">WNI</option>
                                    <option value="WNA">WNA</option>
                                    <option value="">-- Warga Negara --</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <textarea name="penduduk_alamat" class="form-control" cols="20" rows="5" required placeholder="Alamat..."><?= $datapenduduk['penduduk_alamat'] ?></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="container">
                            <div class="form-group">
                                <select class="form-control" name="penduduk_status_tinggal">
                                    <option value="<?= $datapenduduk['penduduk_status_tinggal'] ?>" selected><?= $datapenduduk['penduduk_status_tinggal'] ?></option>
                                    <option value="Tetap">Penduduk Tetap</option>
                                    <option value="Tidak Tetap">Penduduk Tidak Tetap</option>
                                    <option value="">-- Pilih Status Tinggal --</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <input type="text" name="penduduk_pekerjaan" class="form-control form-control-lg" placeholder="Pekerjaan" required value="<?= $datapenduduk['penduduk_pekerjaan'] ?>">
                            </div>
                            <div class="form-group">
                                <select class="form-control" name="penduduk_status_kawin">
                                    <option value="<?= $datapenduduk['penduduk_status_kawin'] ?>" selected><?= $datapenduduk['penduduk_status_kawin'] ?></option>
                                    <option value="Belum Menikah">Belum Menikah</option>
                                    <option value="Sudah Menikah">Sudah Menikah</option>
                                    <option value="Cerai Hidup">Cerai Hidup</option>
                                    <option value="Cerai Mati">Cerai Mati</option>
                                    <option value="Tidak Menikah">Tidak Menikah</option>
                                    <option value="">-- Pilih Status Kawin --</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <select class="form-control" name="penduduk_jenjang_pendidikan">
                                    <option value="<?= $datapenduduk['penduduk_jenjang_pendidikan'] ?>" selected><?= $datapenduduk['penduduk_jenjang_pendidikan'] ?></option>
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
    $id_penduduk = $_POST['id_penduduk'];
    $penduduk_nik = $_POST['penduduk_nik'];
    $penduduk_nama = $_POST['penduduk_nama'];
    $penduduk_tempat_lahir = $_POST['penduduk_tempat_lahir'];
    $penduduk_tanggal_lahir = $_POST['penduduk_tanggal_lahir'];
    $penduduk_rt_id = $_POST['penduduk_rt_id'];
    $penduduk_agama = $_POST['penduduk_agama'];
    $penduduk_jk = $_POST['penduduk_jk'];
    $penduduk_wn = $_POST['penduduk_wn'];
    $penduduk_alamat = $_POST['penduduk_alamat'];
    $penduduk_status_tinggal = $_POST['penduduk_status_tinggal'];
    $penduduk_pekerjaan = $_POST['penduduk_pekerjaan'];
    $penduduk_status_kawin = $_POST['penduduk_status_kawin'];
    $penduduk_jenjang_pendidikan = $_POST['penduduk_jenjang_pendidikan'];

    $sql = mysqli_query($con, "UPDATE penduduk SET penduduk_nik = '$penduduk_nik', penduduk_nama = '$penduduk_nama', penduduk_tempat_lahir = '$penduduk_tempat_lahir', penduduk_tgl_lahir = '$penduduk_tanggal_lahir', penduduk_rt_id = '$penduduk_rt_id', penduduk_agama = '$penduduk_agama', penduduk_jk = '$penduduk_jk', penduduk_wn = '$penduduk_wn', penduduk_alamat = '$penduduk_alamat', penduduk_status_tinggal = '$penduduk_status_tinggal', penduduk_pekerjaan = '$penduduk_pekerjaan', penduduk_status_kawin = '$penduduk_status_kawin', penduduk_jenjang_pendidikan = '$penduduk_jenjang_pendidikan' WHERE penduduk_id = '$id'");

    if ($sql) {
        echo "<script>alert('Ubah data Berhasil !');window.location='?page=penduduk';</script>";
    } else {
        die(mysqli_error($con));
    }
}
?>