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
        <h3 class="mb-2">Data Administrasi izinusaha | <small><?= $namauser ?></small></h3>
        <table id="bootstrap-data-table" class="table table-striped table-sm">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Pelapor</th>
                    <th>Tanggal lapor</th>
                    <th>Usaha</th>
                    <th>Pemilik</th>
                    <th>Status</th>
                    <th>Verifikasi</th>
                    <th>Opsi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = mysqli_query($con, "SELECT * FROM izinusaha, user WHERE izinusaha.izinusaha_user = user.user_id AND user.user_id = '$iduser'");
                $no = 1;
                while ($data = mysqli_fetch_assoc($sql)) {
                ?>
                    <tr>
                        <td><?= $no++; ?>.</td>
                        <td><?= $data['user_nama']; ?></td>
                        <td><?= date('d-m-Y', strtotime($data['izinusaha_tanggal'])); ?></td>
                        <td>
                            Nama : <?= $data['izinusaha_nama_usaha']; ?><br>
                            Jenis : <?= $data['izinusaha_jenis_usaha']; ?><br>
                            Alamat : <?= $data['izinusaha_alamat_usaha']; ?><br>
                        </td>
                        <td>
                            Nama : <?= $data['izinusaha_nama_pemilik']; ?><br>
                            NIK : <?= $data['izinusaha_nik_pemilik']; ?><br>
                            TTL : <?= $data['izinusaha_tempat_lahir_pemilik']; ?>, <?= date('d-m-Y', strtotime($data['izinusaha_tanggal_lahir_pemilik'])); ?><br>
                            Jenis kelamin : <?= $data['izinusaha_jenis_kelamin_pemilik']; ?><br>
                            Alamat : <?= $data['izinusaha_alamat_pemilik']; ?><br>
                        </td>
                        <td>
                            <?php
                            if ($data['izinusaha_status'] == 'Ditolak RT') {
                                echo $data['izinusaha_status'] . "(" . $data['izinusaha_ket'] . ")";
                            } else {
                                echo $data['izinusaha_status'];
                            }
                            ?>
                        </td>
                        <td><?= $data['izinusaha_tanggal_verifikasi']; ?></td>
                        <td>
                            <?php
                            if ($data['izinusaha_status'] == 'Selesai') {
                            ?>
                                <a href="../assets/report/report-izinusaha/report-izinusaha-user.php?id=<?= $data['izinusaha_id'] ?>" class="text-success" target="_blank"><i class="fas fa-print fa-md"></i></a>

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
                        <label>Nama pemilik</label>
                        <input type="text" name="izinusaha_nama_pemilik" class="form-control" placeholder="Nama pemilik" required>
                    </div>
                    <div class="form-group">
                        <label>NIK pemilik</label>
                        <input type="text" name="izinusaha_nik_pemilik" class="form-control" maxlength="16" minlength="16" placeholder="NIK pemilik" required>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <label>Tempat lahir pemilik</label>
                            <input type="text" name="izinusaha_tempat_lahir_pemilik" class="form-control" placeholder="Tempat lahir pemilik" required>
                        </div>
                        <div class="col-lg-6">
                            <label>Tanggal lahir pemilik</label>
                            <input type="date" name="izinusaha_tanggal_lahir_pemilik" class="form-control" placeholder="Tanggal lahir pemilik" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Jenis kelamin pemilik</label>
                        <select class="form-control" name="izinusaha_jenis_kelamin_pemilik" required>
                            <option value="">- Pilih Jenis Kelamin -</option>
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Alamat pemilik</label>
                        <textarea name="izinusaha_alamat_pemilik" class="form-control" cols="10" rows="4" required placeholder="Alamat pemilik"></textarea>
                    </div>


                    <div class="form-group">
                        <label>Nama usaha</label>
                        <input type="text" name="izinusaha_nama_usaha" class="form-control" placeholder="Nama usaha" required>
                    </div>
                    <div class="form-group">
                        <label>Bentuk usaha</label>
                        <select class="form-control" name="izinusaha_jenis_usaha" required>
                            <option value="">- Pilih Bentuk Usaha -</option>
                            <option value="PT">PT</option>
                            <option value="CV">CV</option>
                            <option value="Firma">Firma</option>
                            <option value="Koperasi">Koperasi</option>
                            <option value="Perseorangan">Perseorangan</option>
                            <option value="Lainnya">Lainnya</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Alamat usaha</label>
                        <textarea name="izinusaha_alamat_usaha" class="form-control" cols="10" rows="4" required placeholder="Alamat usaha"></textarea>
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
    $izinusaha_user = $iduser;
    $izinusaha_rt = $idrt;
    $izinusaha_tanggal = date('Y-m-d');

    $izinusaha_nama_pemilik = $_POST['izinusaha_nama_pemilik'];
    $izinusaha_nik_pemilik = $_POST['izinusaha_nik_pemilik'];
    $izinusaha_tempat_lahir_pemilik = $_POST['izinusaha_tempat_lahir_pemilik'];
    $izinusaha_tanggal_lahir_pemilik = $_POST['izinusaha_tanggal_lahir_pemilik'];
    $izinusaha_jenis_kelamin_pemilik = $_POST['izinusaha_jenis_kelamin_pemilik'];
    $izinusaha_alamat_pemilik = $_POST['izinusaha_alamat_pemilik'];
    $izinusaha_nama_usaha = $_POST['izinusaha_nama_usaha'];
    $izinusaha_jenis_usaha = $_POST['izinusaha_jenis_usaha'];
    $izinusaha_alamat_usaha = $_POST['izinusaha_alamat_usaha'];

    $izinusaha_status = 'Menunggu Verifikasi RT';
    $izinusaha_tanggal_verifikasi = '';
    $izinusaha_notif = '0';
    $izinusaha_ket = '';

    $sql = mysqli_query($con, "INSERT INTO izinusaha VALUES('', '$izinusaha_user', '$izinusaha_rt', '$izinusaha_tanggal', '$izinusaha_nama_pemilik', '$izinusaha_nik_pemilik', '$izinusaha_tempat_lahir_pemilik', '$izinusaha_tanggal_lahir_pemilik', '$izinusaha_jenis_kelamin_pemilik', '$izinusaha_alamat_pemilik', '$izinusaha_nama_usaha', '$izinusaha_jenis_usaha', '$izinusaha_alamat_usaha', '$izinusaha_status', '$izinusaha_tanggal_verifikasi', '$izinusaha_notif', '$izinusaha_ket')");

    if ($sql) {
        echo "<script>alert('Berhasil !');window.location='?page=izinusaha';</script>";
    } else {
        echo "<script>alert('Gagal !');window.location='?page=izinusaha';</script>";
    }
}
?>
?>