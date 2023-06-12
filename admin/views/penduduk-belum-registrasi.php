<div class="content-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h3>Data penduduk yang belum registrasi</h3>
            <!-- <a href="#" class="btn btn-md btn-success mb-2" data-toggle="modal" data-target="#ModalTambah"><i class="fas fa-plus"></i> Tambah penduduk</a> -->
            <div class="card">
                <form class="mx-3" action="" method="post">
                    <!-- <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="mt-3">Pilih RT</label>
                                <select name="rt_id" class="form-control">
                                    <option value="">- Pilih RT -</option>
                                    <?php
                                    $sqlrt = mysqli_query($con, "SELECT * FROM rt");
                                    while ($datart = mysqli_fetch_assoc($sqlrt)) {
                                    ?>
                                        <option value="<?= $datart['rt_id'] ?>"><?= $datart['rt'] ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="row">
                                <input type="submit" name="cari" class="btn btn-success mt-5" value="Cari">
                                <a href="../assets/report/report-user/report-user.php?idrt=0&s=0" class="btn btn-primary ml-2 mt-5" target="_blank">Cetak</a>
                            </div>
                        </div>
                    </div> -->
                </form>
                <div class="card-body table-responsive">
                    <table id="bootstrap-data-table" class="table table-striped table-sm">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>NIK</th>
                                <th>Nama</th>
                                <th>TTL</th>
                                <th>RW/RT</th>
                                <th>Status User</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            $sql = mysqli_query($con, "SELECT * FROM user, rt WHERE user.user_rt_id = rt.rt_id AND user.user_status = 'Belum registrasi'");
                            while ($data = mysqli_fetch_assoc($sql)) {
                            ?>
                                <tr>
                                    <td><?= $no++; ?>.</td>
                                    <td><?= $data['user_nik']; ?></td>
                                    <td><?= $data['user_nama']; ?></td>
                                    <td><?= $data['user_tempat_lahir']; ?>, <?= $data['user_tgl_lahir']; ?></td>
                                    <td><?= $data['rt']; ?></td>

                                    <td><?= $data['user_status']; ?></td>
                                    <td>
                                        <a href="?page=info_user&id=<?= $data['user_id'] ?>" class="text-primary"><i class="fas fa-info-circle"></i></a>
                                        <!-- <a href="?page=edit_user&id=<?= $data['user_id'] ?>" class="text-info"><i class="fas fa-edit"></i></a>
                                        <a href="?page=hapus_user&id=<?= $data['user_id'] ?>" onclick="return confirm('Yakin ingin menghapus data ini ???')" class="text-danger"><i class="fas fa-trash"></i></a> -->
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
if (isset($_POST['cari'])) {
    $rt = $_POST['rt_id'];

    if ($rt == '') {
        echo "<script>window.location='?page=user';</script>";
    } else {
        echo "<script>window.location='?page=cari-user&idrt=$rt';</script>";
    }
}
?>


<!-- Modal -->
<div class="modal fade" id="ModalTambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="" enctype="multipart/form-data" method="post">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah penduduk</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" name="user_nik" class="form-control form-control-lg" placeholder="NIK" required>
                    </div>
                    <div class="form-group">
                        <input type="text" name="user_nama" class="form-control form-control-lg" placeholder="Nama Lengkap" required>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <input type="text" name="user_tempat_lahir" class="form-control form-control-lg" placeholder="Tempat Lahir" required>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <input type="date" name="user_tanggal_lahir" class="form-control form-control-lg" required>
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
                    <div class="form-group">
                        <textarea name="user_alamat" class="form-control" cols="20" rows="5" required placeholder="Alamat..."></textarea>
                    </div>
                    <div class="form-group">
                        <select class="form-control" name="user_status_tinggal" required>
                            <option value="">-- Pilih Status Tinggal --</option>
                            <option value="Tetap">Penduduk Tetap</option>
                            <option value="Tidak Tetap">Penduduk Tidak Tetap</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="text" name="user_pekerjaan" class="form-control form-control-lg" placeholder="Pekerjaan" required>
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
                    <!-- <div class="form-group">
                        <input type="email" name="user_email" class="form-control form-control-lg" placeholder="E-Mail" required>
                    </div>
                    <div class="form-group">
                        <input type="password" name="user_password" class="form-control form-control-lg" placeholder="Password" required>
                    </div> -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-primary" name="daftar" value="Daftar">
                </div>
            </form>
        </div>
    </div>
</div>

<?php
if (isset($_POST['daftar'])) {
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
    // $user_email = $_POST['user_email'];
    // $user_password = md5($_POST['user_password']);
    $user_email = '';
    $user_password = '';

    $sqlcekrt = mysqli_query($con, "SELECT * FROM rt WHERE rt_id = '$user_rt_id'");
    $datacekrt = mysqli_fetch_assoc($sqlcekrt);

    if ($datacekrt['rt_ketua'] == '0') {
        $user_status = 'Aktif';
    } else {
        $user_status = 'Belum registrasi';
    }

    $sql = mysqli_query($con, "INSERT INTO user VALUES('', '$user_nik', '$user_nama', '$user_tempat_lahir', '$user_tanggal_lahir', '$user_rt_id', '$user_agama', '$user_jk', '$user_wn', '$user_alamat', '$user_status', '$user_status_tinggal', '$user_pekerjaan', '$user_status_kawin', '$user_jenjang_pendidikan', '$user_email', '$user_password')");

    if ($sql) {
        echo "<script>alert('Pendaftaran Berhasil !');window.location='?page=user';</script>";
    } else {
        echo "<script>alert('Pendaftaran Gagal ! Ulangi Pendaftaran !');window.location='?page=user';</script>";
    }
}
?>