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
        <h3 class="mb-2">Data Administrasi ktp | <small><?= $namauser ?></small></h3>
        <table id="bootstrap-data-table" class="table table-striped table-sm">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Nama</th>
                    <th>KK</th>
                    <th>Status</th>
                    <th>Tgl Verifikasi</th>
                    <th>Opsi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = mysqli_query($con, "SELECT * FROM ktp, user WHERE ktp.ktp_user = user.user_id AND user.user_id = '$iduser'");
                $no = 1;
                while ($data = mysqli_fetch_assoc($sql)) {
                ?>
                    <tr>
                        <td><?= $no++; ?>.</td>
                        <td><?= $data['user_nama']; ?></td>
                        <td>
                            <a href="../assets/files/files-ktp/<?= $data['ktp_kk']; ?>" class="text-primary" target="_blank"><i class="fas fa-image fa-sm"></i></a>
                        </td>
                        <td>
                            <?php
                            if ($data['ktp_status'] == 'Ditolak RT') {
                                echo $data['ktp_status'] . "(" . $data['ktp_ket'] . ")";
                            } else {
                                echo $data['ktp_status'];
                            }
                            ?>
                        </td>
                        <td><?= $data['ktp_tanggal_verifikasi']; ?></td>
                        <td>
                            <?php
                            if ($data['ktp_status'] == 'Selesai') {
                            ?>
                                <a href="../assets/report/report-ktp/report-ktp-user.php?id=<?= $data['ktp_id'] ?>" class="text-success" target="_blank"><i class="fas fa-print fa-md"></i></a>
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
                        <label>KK (Pdf File)</label>
                        <input type="file" name="ktp_kk" accept="application/pdf" class="form-control">
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
    $ktp_user = $iduser;
    $ktp_rt = $idrt;
    $ktp_tanggal = date('Y-m-d');

    $extensi = explode(".", $_FILES['ktp_kk']['name']);
    $ktp_kk = "$namauser - KK - " . round(microtime(true)) . "." . end($extensi);
    $sumber = $_FILES['ktp_kk']['tmp_name'];
    $upload = move_uploaded_file($sumber, "../assets/files/files-ktp/" . $ktp_kk);

    $ktp_status = 'Menunggu Verifikasi RT';
    $ktp_tanggal_verifikasi = '';
    $ktp_ket = '';

    $sql = mysqli_query($con, "INSERT INTO ktp VALUES('', '$ktp_user', '$ktp_rt', '$ktp_tanggal', '$ktp_kk', '$ktp_status', '$ktp_tanggal_verifikasi', '0', '$ktp_ket')");

    if ($sql) {
        echo "<script>alert('Berhasil !');window.location='?page=ktp';</script>";
    } else {
        echo "<script>alert('Gagal !');window.location='?page=ktp';</script>";
    }
}
?>
?>