<div class="container-xxl py-6">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <a href="" class="btn btn-md btn-success" data-toggle="modal" data-target="#ModalTambah"><i class="fas fa-plus"></i> Tambah Data</a>
            </div>
        </div>
        <h3 class="mb-2">Data Administrasi Kelahiran | <small><?= $namauser ?></small></h3>
        <table id="bootstrap-data-table" class="table table-striped table-sm">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Nama</th>
                    <th>Nama Anak</th>
                    <th>TTL</th>
                    <th>Jenis Kelamin</th>
                    <th>Nama Ayah</th>
                    <th>KTP Ayah</th>
                    <th>Nama Ibu</th>
                    <th>KTP Ibu</th>
                    <th>Surat Ket.</th>
                    <th>Status</th>
                    <th>Tgl Verifikasi</th>
                    <th>Opsi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = mysqli_query($con, "SELECT * FROM kelahiran, user WHERE kelahiran.kelahiran_user = user.user_id AND user.user_id = '$iduser'");
                $no = 1;
                while ($data = mysqli_fetch_assoc($sql)) {
                ?>
                    <tr>
                        <td><?= $no++; ?>.</td>
                        <td><?= $data['user_nama']; ?></td>
                        <td><?= $data['kelahiran_nama_anak']; ?></td>
                        <td><?= $data['kelahiran_tempat_lahir']; ?>, <?= $data['kelahiran_tanggal_lahir']; ?></td>
                        <td><?= $data['kelahiran_jk']; ?></td>
                        <td><?= $data['kelahiran_nama_ayah']; ?></td>
                        <td>
                            <a href="../assets/files/files-kelahiran/<?= $data['kelahiran_ktp_ayah']; ?>" class="text-primary" target="_blank"><i class="fas fa-image fa-sm"></i></a>
                        </td>
                        <td><?= $data['kelahiran_nama_ibu']; ?></td>
                        <td>
                            <a href="../assets/files/files-kelahiran/<?= $data['kelahiran_ktp_ibu']; ?>" class="text-primary" target="_blank"><i class="fas fa-image fa-sm"></i></a>
                        </td>
                        <td>
                            <a href="../assets/files/files-kelahiran/<?= $data['kelahiran_sk_lahir']; ?>" class="text-primary" target="_blank"><i class="fas fa-image fa-sm"></i></a>
                        </td>
                        <td><?= $data['kelahiran_status']; ?></td>
                        <td><?= $data['kelahiran_tanggal_verifikasi']; ?></td>
                        <td>
                            <?php
                            if ($data['kelahiran_status'] == 'Selesai') {
                            ?>
                                <a href="../assets/report/report-kelahiran/report-kelahiran-user.php?id=<?= $data['kelahiran_id'] ?>" class="text-success" target="_blank"><i class="fas fa-print fa-md"></i></a>
                            <?php
                            }
                            ?>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</div>



<!-- Modal Tambah Data-->
<div class="modal fade" id="ModalTambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Tambah Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="pt-3" action="" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nama Anak</label>
                        <input type="text" name="kelahiran_nama_anak" class="form-control" placeholder="Nama Lengkap Anak" required>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Tempat lahir</label>
                                <input type="text" name="kelahiran_tempat_lahir" class="form-control" placeholder="Tempat Lahir" required>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Tanggal lahir</label>
                                <input type="date" name="kelahiran_tanggal_lahir" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Jenis Kelamin</label>
                        <select class="form-control" name="kelahiran_jk" required>
                            <option value="">- Pilih Jenis Kelamin -</option>
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Agama</label>
                        <select class="form-control" name="kelahiran_agama" required>
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
                        <label>Alamat</label>
                        <textarea name="kelahiran_alamat" class="form-control" cols="10" rows="4" required></textarea>
                    </div>
                    <div class="form-group">
                        <label>Nama ayah</label>
                        <input type="text" name="kelahiran_nama_ayah" class="form-control" placeholder="Nama Lengkap Ayah">
                    </div>
                    <div class="form-group">
                        <label>KTP ayah</label>
                        <input type="file" name="kelahiran_ktp_ayah" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Nama ibu</label>
                        <input type="text" name="kelahiran_nama_ibu" class="form-control" placeholder="Nama Lengkap Ibu">
                    </div>
                    <div class="form-group">
                        <label>KTP ibu</label>
                        <input type="file" name="kelahiran_ktp_ibu" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Surat ket. lahir</label>
                        <input type="file" name="kelahiran_sk_lahir" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-success" name="simpan" value="Simpan">
                </div>
            </form>
        </div>
    </div>
</div>

<?php
if (isset($_POST['simpan'])) {
    $kelahiran_user = $iduser;
    $kelahiran_rt = $idrt;
    $kelahiran_tanggal = date('Y-m-d');
    $kelahiran_nama_anak = $_POST['kelahiran_nama_anak'];
    $kelahiran_tempat_lahir = $_POST['kelahiran_tempat_lahir'];
    $kelahiran_tanggal_lahir = $_POST['kelahiran_tanggal_lahir'];
    $kelahiran_jk = $_POST['kelahiran_jk'];
    $kelahiran_agama = $_POST['kelahiran_agama'];
    $kelahiran_alamat = $_POST['kelahiran_alamat'];
    $kelahiran_nama_ayah = $_POST['kelahiran_nama_ayah'];

    $extensi = explode(".", $_FILES['kelahiran_ktp_ayah']['name']);
    $kelahiran_ktp_ayah = "$namauser - KTP Ayah - " . round(microtime(true)) . "." . end($extensi);
    $sumber = $_FILES['kelahiran_ktp_ayah']['tmp_name'];
    $upload = move_uploaded_file($sumber, "../assets/files/files-kelahiran/" . $kelahiran_ktp_ayah);

    $kelahiran_nama_ibu = $_POST['kelahiran_nama_ibu'];

    $extensi = explode(".", $_FILES['kelahiran_ktp_ibu']['name']);
    $kelahiran_ktp_ibu = "$namauser - KTP Ibu - " . round(microtime(true)) . "." . end($extensi);
    $sumber = $_FILES['kelahiran_ktp_ibu']['tmp_name'];
    $upload = move_uploaded_file($sumber, "../assets/files/files-kelahiran/" . $kelahiran_ktp_ibu);

    $extensi = explode(".", $_FILES['kelahiran_sk_lahir']['name']);
    $kelahiran_sk_lahir = "$namauser - SK Lahir - " . round(microtime(true)) . "." . end($extensi);
    $sumber = $_FILES['kelahiran_sk_lahir']['tmp_name'];
    $upload = move_uploaded_file($sumber, "../assets/files/files-kelahiran/" . $kelahiran_sk_lahir);

    $kelahiran_status = 'Menunggu Verifikasi RT';
    $kelahiran_tanggal_verifikasi = '';

    $sql = mysqli_query($con, "INSERT INTO kelahiran VALUES('', '$kelahiran_user', '$kelahiran_rt', '$kelahiran_tanggal', '$kelahiran_nama_anak', '$kelahiran_tempat_lahir', '$kelahiran_tanggal_lahir', '$kelahiran_jk', '$kelahiran_agama', '$kelahiran_alamat', '$kelahiran_nama_ayah', '$kelahiran_ktp_ayah', '$kelahiran_nama_ibu', '$kelahiran_ktp_ibu', '$kelahiran_sk_lahir', '$kelahiran_status', '$kelahiran_tanggal_verifikasi')");

    if ($sql) {
        echo "<script>alert('Berhasil !');window.location='?page=kelahiran';</script>";
    } else {
        echo "<script>alert('Gagal !');window.location='?page=kelahiran';</script>";
    }
}
?>
?>