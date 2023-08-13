<?php
$sqlcek = mysqli_query($con, "SELECT * FROM penduduk WHERE penduduk_nik = '$nikuser'");
?>

<div class="container-xxl py-6">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <a href="" class="btn btn-md btn-success" data-toggle="modal" data-target="#ModalTambah"><i class="fas fa-plus"></i> Tambah Data</a>
            </div>
        </div>
        <h3 class="mb-2">Data Administrasi kk | <small><?= $namauser ?></small></h3>
        <table id="bootstrap-data-table" class="table table-striped table-sm">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Nama</th>
                    <th>Akta</th>
                    <th>Status</th>
                    <th>Tgl Verifikasi</th>
                    <th>Opsi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = mysqli_query($con, "SELECT * FROM kk, user WHERE kk.kk_user = user.user_id AND user.user_id = '$iduser'");
                $no = 1;
                while ($data = mysqli_fetch_assoc($sql)) {
                ?>
                    <tr>
                        <td><?= $no++; ?>.</td>
                        <td><?= $data['user_nama']; ?></td>
                        <td>
                            <a href="../assets/files/files-kk/<?= $data['kk_akta']; ?>" class="text-primary" target="_blank"><i class="fas fa-image fa-sm"></i></a>
                        </td>
                        <td>
                            <?php
                            if ($data['kk_status'] == 'Ditolak RT') {
                                echo $data['kk_status'] . "(" . $data['kk_ket'] . ")";
                            } else {
                                echo $data['kk_status'];
                            }
                            ?>
                        </td>
                        <td><?= $data['kk_tanggal_verifikasi']; ?></td>
                        <td>
                            <?php
                            if ($data['kk_status'] == 'Selesai') {
                            ?>
                                <a href="../assets/report/report-kk/report-kk-user.php?id=<?= $data['kk_id'] ?>" class="text-success" target="_blank"><i class="fas fa-print fa-md"></i></a>
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
                        <label>Akta (Pdf File)</label>
                        <input type="file" name="kk_akta" accept="application/pdf" class="form-control">
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
    $kk_user = $iduser;
    $kk_rt = $idrt;
    $kk_tanggal = date('Y-m-d');

    $extensi = explode(".", $_FILES['kk_akta']['name']);
    $kk_akta = "$namauser - Akta - " . round(microtime(true)) . "." . end($extensi);
    $sumber = $_FILES['kk_akta']['tmp_name'];
    $upload = move_uploaded_file($sumber, "../assets/files/files-kk/" . $kk_akta);

    $kk_status = 'Menunggu Verifikasi RT';
    $kk_tanggal_verifikasi = '';
    $kk_ket = '';

    $sql = mysqli_query($con, "INSERT INTO kk VALUES('', '$kk_user', '$kk_rt', '$kk_tanggal', '$kk_akta', '$kk_status', '$kk_tanggal_verifikasi', '0', '$kk_ket')");

    if ($sql) {
        echo "<script>alert('Berhasil !');window.location='?page=kk';</script>";
    } else {
        echo "<script>alert('Gagal !');window.location='?page=kk';</script>";
    }
}
?>
?>