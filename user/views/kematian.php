<div class="container-xxl py-6">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <a href="" class="btn btn-md btn-success" data-toggle="modal" data-target="#ModalTambah"><i class="fas fa-plus"></i> Tambah Data</a>
            </div>
        </div>
        <h3 class="mb-2">Data Administrasi Kematian | <small><?= $namauser ?></small></h3>
        <table id="bootstrap-data-table" class="table table-striped table-sm">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Nama</th>
                    <th>Yang Meninggal</th>
                    <th>TTM</th>
                    <th>Sebab Meninggal</th>
                    <th>Surat Ket. Meninggal</th>
                    <th>KTP Almarhum</th>
                    <th>Akte</th>
                    <th>Status</th>
                    <th>Tgl Verifikasi</th>
                    <th>Opsi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = mysqli_query($con, "SELECT * FROM kematian, user WHERE kematian.kematian_user = user.user_id AND kematian.kematian_user = '$iduser'");
                $no = 1;
                while ($data = mysqli_fetch_assoc($sql)) {
                    $iduserm = $data['kematian_user_meninggal'];
                    $sqluserm = mysqli_query($con, "SELECT * FROM user WHERE user_id = '$iduserm'");
                    $datam = mysqli_fetch_assoc($sqluserm);
                ?>
                    <tr>
                        <td><?= $no++; ?>.</td>
                        <td><?= $data['user_nama']; ?></td>
                        <td><?= $datam['user_nama']; ?></td>
                        <td><?= $data['kematian_tempat_meninggal']; ?>, <?= $data['kematian_tanggal_meninggal']; ?></td>
                        <td><?= $data['kematian_sebab_meninggal']; ?></td>
                        <td>
                            <a href="../assets/files/files-kematian/<?= $data['kematian_sk_dokter']; ?>" class="text-primary" target="_blank"><i class="fas fa-image fa-sm"></i></a>
                        </td>
                        <td>
                            <a href="../assets/files/files-kematian/<?= $data['kematian_ktp_almarhum']; ?>" class="text-primary" target="_blank"><i class="fas fa-image fa-sm"></i></a>
                        </td>
                        <td>
                            <a href="../assets/files/files-kematian/<?= $data['kematian_akte']; ?>" class="text-primary" target="_blank"><i class="fas fa-image fa-sm"></i></a>
                        </td>
                        <td><?= $data['kematian_status']; ?></td>
                        <td><?= $data['kematian_tanggal_verifikasi']; ?></td>
                        <td>
                            <?php
                            if ($data['kematian_status'] == 'Selesai') {
                            ?>
                                <a href="../assets/report/report-kematian/report-kematian-user.php?id=<?= $data['kematian_id'] ?>" class="text-success" target="_blank"><i class="fas fa-print fa-md"></i></a>
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
                        <label>Nama Yang Meninggal</label>
                        <select class="form-control" name="kematian_user_meninggal" required>
                            <option value="">- Pilih User -</option>
                            <?php
                            $sqlu = mysqli_query($con, "SELECT * FROM user");
                            while ($datau = mysqli_fetch_assoc($sqlu)) {
                            ?>
                                <option value="<?= $datau['user_id'] ?>"><?= $datau['user_nama'] ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Tempat Meninggal</label>
                                <input type="text" name="kematian_tempat_meninggal" class="form-control" placeholder="Tempat meninggal" required>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Tanggal Meninggal</label>
                                <input type="date" name="kematian_tanggal_meninggal" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Sebab Meninggal</label>
                        <input type="text" name="kematian_sebab_meninggal" class="form-control" placeholder="Sebab Meninggal" required>
                    </div>
                    <div class="form-group">
                        <label>Surat Ket. Meninggal</label>
                        <input type="file" name="kematian_sk_dokter" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>KTP Almarhum</label>
                        <input type="file" name="kematian_ktp_almarhum" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Akte Almarhum</label>
                        <input type="file" name="kematian_akte" class="form-control">
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
    $kematian_user = $iduser;
    $kematian_rt = $idrt;
    $kematian_tanggal = date('Y-m-d');
    $kematian_user_meninggal = $_POST['kematian_user_meninggal'];
    $kematian_tempat_meninggal = $_POST['kematian_tempat_meninggal'];
    $kematian_tanggal_meninggal = $_POST['kematian_tanggal_meninggal'];
    $kematian_sebab_meninggal = $_POST['kematian_sebab_meninggal'];

    $extensi = explode(".", $_FILES['kematian_sk_dokter']['name']);
    $kematian_sk_dokter = "$namauser - Surat Ket - " . round(microtime(true)) . "." . end($extensi);
    $sumber = $_FILES['kematian_sk_dokter']['tmp_name'];
    $upload = move_uploaded_file($sumber, "../assets/files/files-kematian/" . $kematian_sk_dokter);

    $extensi = explode(".", $_FILES['kematian_ktp_almarhum']['name']);
    $kematian_ktp_almarhum = "$namauser - KTP Almarhum - " . round(microtime(true)) . "." . end($extensi);
    $sumber = $_FILES['kematian_ktp_almarhum']['tmp_name'];
    $upload = move_uploaded_file($sumber, "../assets/files/files-kematian/" . $kematian_ktp_almarhum);

    $extensi = explode(".", $_FILES['kematian_akte']['name']);
    $kematian_akte = "$namauser - Akte - " . round(microtime(true)) . "." . end($extensi);
    $sumber = $_FILES['kematian_akte']['tmp_name'];
    $upload = move_uploaded_file($sumber, "../assets/files/files-kematian/" . $kematian_akte);

    $kematian_status = 'Menunggu Verifikasi RT';
    $kematian_tanggal_verifikasi = '';

    $sql = mysqli_query($con, "INSERT INTO kematian VALUES('', '$kematian_user', '$kematian_rt', '$kematian_tanggal', '$kematian_user_meninggal', '$kematian_tempat_meninggal', '$kematian_tanggal_meninggal', '$kematian_sebab_meninggal', '$kematian_sk_dokter', '$kematian_ktp_almarhum', '$kematian_akte', '$kematian_status', '$kematian_tanggal_verifikasi')");

    if ($sql) {
        echo "<script>alert('Berhasil !');window.location='?page=kematian';</script>";
    } else {
        echo "<script>alert('Gagal !');window.location='?page=kematian';</script>";
    }
}
?>
?>