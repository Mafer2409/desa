<div class="container-xxl py-6">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <a href="" class="btn btn-md btn-success" data-toggle="modal" data-target="#ModalTambah"><i class="fas fa-plus"></i> Tambah Data</a>
            </div>
        </div>
        <h3 class="mb-2">Data Administrasi Pindah | <small><?= $namauser ?></small></h3>
        <table id="bootstrap-data-table" class="table table-striped table-sm">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Nama</th>
                    <th>Ket</th>
                    <th>Dari</th>
                    <th>Tujuan</th>
                    <th>KTP</th>
                    <th>KK</th>
                    <th>Surat Ket.</th>
                    <th>Status</th>
                    <th>Tgl Verifikasi</th>
                    <th>Opsi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = mysqli_query($con, "SELECT * FROM administrasi, user WHERE administrasi.administrasi_user = user.user_id AND user.user_id = '$iduser'");
                $no = 1;
                while ($data = mysqli_fetch_assoc($sql)) {
                ?>
                    <tr>
                        <td><?= $no++; ?>.</td>
                        <td><?= $data['user_nama']; ?></td>
                        <td><?= $data['administrasi_ket']; ?></td>
                        <td><?= $data['administrasi_dari']; ?></td>
                        <td><?= $data['administrasi_tujuan']; ?></td>
                        <td>
                            <a href="../assets/files/files-pindah/<?= $data['administrasi_ktp']; ?>" class="text-primary" target="_blank"><i class="fas fa-image fa-sm"></i></a>
                        </td>
                        <td>
                            <a href="../assets/files/files-pindah/<?= $data['administrasi_kk']; ?>" class="text-primary" target="_blank"><i class="fas fa-image fa-sm"></i></a>
                        </td>
                        <td>
                            <a href="../assets/files/files-pindah/<?= $data['administrasi_sk_pindah']; ?>" class="text-primary" target="_blank"><i class="fas fa-image fa-sm"></i></a>
                        </td>
                        <td><?= $data['administrasi_status']; ?></td>
                        <td><?= $data['administrasi_tanggal_verifikasi']; ?></td>
                        <td>
                            <?php
                            if ($data['administrasi_status'] == 'Selesai') {
                            ?>
                                <a href="../assets/report/report-pindah/report-pindah-user.php?id=<?= $data['administrasi_id'] ?>" class="text-success" target="_blank"><i class="fas fa-print fa-md"></i></a>
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
                        <label>Masuk/Keluar</label>
                        <select name="administrasi_ket" class="form-control" required>
                            <option value="">- Pilih -</option>
                            <option value="Masuk">Masuk</option>
                            <option value="Keluar">Keluar</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Dari</label>
                        <input type="text" name="administrasi_dari" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Tujuan</label>
                        <input type="text" name="administrasi_tujuan" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>KTP</label>
                        <input type="file" name="administrasi_ktp" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>KK</label>
                        <input type="file" name="administrasi_kk" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Surat ket.</label>
                        <input type="file" name="administrasi_sk_pindah" class="form-control">
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
    $administrasi_user = $iduser;
    $administrasi_rt = $idrt;
    $administrasi_tanggal = date('Y-m-d');
    $administrasi_ket = $_POST['administrasi_ket'];
    $administrasi_dari = $_POST['administrasi_dari'];
    $administrasi_tujuan = $_POST['administrasi_tujuan'];

    $extensi = explode(".", $_FILES['administrasi_ktp']['name']);
    $administrasi_ktp = "$namauser - KTP - " . round(microtime(true)) . "." . end($extensi);
    $sumber = $_FILES['administrasi_ktp']['tmp_name'];
    $upload = move_uploaded_file($sumber, "../assets/files/files-pindah/" . $administrasi_ktp);

    $extensi = explode(".", $_FILES['administrasi_kk']['name']);
    $administrasi_kk = "$namauser - KK - " . round(microtime(true)) . "." . end($extensi);
    $sumber = $_FILES['administrasi_kk']['tmp_name'];
    $upload = move_uploaded_file($sumber, "../assets/files/files-pindah/" . $administrasi_kk);

    $extensi = explode(".", $_FILES['administrasi_sk_pindah']['name']);
    $administrasi_sk_pindah = "$namauser - SK Pindah - " . round(microtime(true)) . "." . end($extensi);
    $sumber = $_FILES['administrasi_sk_pindah']['tmp_name'];
    $upload = move_uploaded_file($sumber, "../assets/files/files-pindah/" . $administrasi_sk_pindah);

    $administrasi_status = 'Menunggu Verifikasi RT';
    $administrasi_tanggal_verifikasi = '';

    $sql = mysqli_query($con, "INSERT INTO administrasi VALUES('', '$administrasi_user', '$administrasi_rt', '$administrasi_tanggal', '$administrasi_ket', '$administrasi_dari', '$administrasi_tujuan', '$administrasi_ktp', '$administrasi_kk', '$administrasi_sk_pindah', '$administrasi_status', '$administrasi_tanggal_verifikasi', '0')");

    if ($sql) {
        echo "<script>alert('Berhasil !');window.location='?page=pindah';</script>";
    } else {
        echo "<script>alert('Gagal !');window.location='?page=pindah';</script>";
    }
}
?>