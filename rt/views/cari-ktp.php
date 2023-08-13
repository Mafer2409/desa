<?php
$bln = $_GET['bln'];
$thn = $_GET['thn'];
$idrt = $_GET['idrt'];
?>

<div class="container-xxl py-6">
    <div class="container">
        <div class="card-header">
            <form class="mx-3" action="" method="post">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="mt-3">Pilih Bulan</label>
                            <select name="bln" class="form-control">
                                <option value="">- Pilih bulan -</option>
                                <option value="01">Januari</option>
                                <option value="02">Februari</option>
                                <option value="03">Maret</option>
                                <option value="04">April</option>
                                <option value="05">Mei</option>
                                <option value="06">Juni</option>
                                <option value="07">Juli</option>
                                <option value="08">Agustus</option>
                                <option value="09">September</option>
                                <option value="10">Oktober</option>
                                <option value="11">November</option>
                                <option value="12">Desember</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="mt-3">Pilih Tahun</label>
                            <select name="thn" class="form-control" required>
                                <option value="">- Pilih tahun -</option>
                                <option value="2019">2019</option>
                                <option value="2020">2020</option>
                                <option value="2021">2021</option>
                                <option value="2022">2022</option>
                                <option value="2023">2023</option>
                                <option value="2024">2024</option>
                                <option value="2025">2025</option>
                                <option value="2026">2026</option>
                                <option value="2027">2027</option>
                                <option value="2028">2028</option>
                                <option value="2029">2029</option>
                                <option value="2030">2030</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="row">
                            <input type="submit" name="cari" class="btn btn-success mt-5" value="Cari">
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="row">
                            <a href="../assets/report/report-rt/report-ktp-rt.php?bln=<?= $bln ?>&thn=<?= $thn ?>&idrt=<?= $idrt ?>" class="btn btn-primary ml-2 mt-5" target="_blank">Cetak</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>




<div class="container-xxl py-6">
    <div class="container">
        <h3 class="mb-2">Data Administrasi ktp RT: <?= $namart ?></h3>
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
                if ($bln == 0) {
                    $sql = mysqli_query($con, "SELECT * FROM ktp, user WHERE ktp.ktp_user = user.user_id AND YEAR(ktp.ktp_tanggal_verifikasi) = '$thn' AND ktp.ktp_rt = '$idrt'");
                } else {
                    $sql = mysqli_query($con, "SELECT * FROM ktp, user WHERE ktp.ktp_user = user.user_id AND YEAR(ktp.ktp_tanggal_verifikasi) = '$thn' AND MONTH(ktp.ktp_tanggal_verifikasi) = '$bln' AND ktp.ktp_rt = '$idrt'");
                }
                $no = 1;
                while ($data = mysqli_fetch_assoc($sql)) {
                ?>
                    <tr>
                        <td><?= $no++; ?>.</td>
                        <td><?= $data['user_nama']; ?></td>
                        <td>
                            <a href="../assets/files/files-ktp/<?= $data['ktp_kk']; ?>" class="text-primary" target="_blank"><i class="fas fa-image fa-sm"></i></a>
                        </td>
                        </td>
                        <td><?= $data['ktp_status']; ?></td>
                        <td><?= $data['ktp_tanggal_verifikasi']; ?></td>
                        <td>
                            <?php
                            if ($data['ktp_status'] == 'Menunggu Verifikasi RT') {
                            ?>
                                <a href="?page=aksiktp&id=<?= $data['ktp_id'] ?>&aksi=Konfirmasi" class="text-success" onclick="return confirm('Apakah anda yakin ingin mengubah data ini?')"><i class="fas fa-check fa-md"></i></a>
                                <a href="?page=aksiktp&id=<?= $data['ktp_id'] ?>&aksi=Ditolak" class="text-danger" onclick="return confirm('Apakah anda yakin ingin mengubah data ini?')"><i class="fas fa-times fa-md"></i></a>
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


<?php
if (isset($_POST['cari'])) {
    $bln = $_POST['bln'];
    $thn = $_POST['thn'];

    if ($bln == '') {
        echo "<script>window.location='?page=cari-ktp&bln=0&thn=$thn&idrt=$idrt';</script>";
    } else {
        echo "<script>window.location='?page=cari-ktp&bln=$bln&thn=$thn&idrt=$idrt';</script>";
    }
}
