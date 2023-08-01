<div class="content-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h3 class="mb-2">Pindah</h3>
            <div class="card">

                <div class="card-header">
                    <form class="mx-3" action="" method="post">
                        <div class="row">
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label class="mt-3">Pilih Pindah</label>
                                    <select name="pin" class="form-control">
                                        <option value="">- Pilih Pindah -</option>
                                        <option value="Masuk">Masuk</option>
                                        <option value="Keluar">Keluar</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-3">
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
                            <div class="col-lg-3">
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
                            <div class="col-lg-3">
                                <div class="row">
                                    <input type="submit" name="cari" class="btn btn-success mt-5" value="Cari">
                                    <a href="../assets/report/report-admin/report-pindah.php?bln=0&thn=0&pin=0" class="btn btn-primary ml-2 mt-5" target="_blank">Cetak</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="card-body table-responsive">
                    <table id="bootstrap-data-table" class="table table-striped table-sm">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama</th>
                                <th>Ket</th>
                                <th>RW/RT</th>
                                <th>Dari</th>
                                <th>Tujuan</th>
                                <th>Alasan</th>
                                <th>KTP</th>
                                <th>KK</th>
                                <!-- <th>Surat Ket.</th> -->
                                <th>Status</th>
                                <th>Tgl Verifikasi</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql = mysqli_query($con, "SELECT * FROM administrasi, user, rt, rw WHERE rt.rt_rw_id = rw.rw_id AND administrasi.administrasi_rt = rt.rt_id AND administrasi.administrasi_user = user.user_id");
                            $no = 1;
                            while ($data = mysqli_fetch_assoc($sql)) {
                                $idrw = $data['rt_rw_id'];
                                $sqlrw = mysqli_query($con, "SELECT * FROM rw WHERE rw_id = '$idrw'");
                                $datarw = mysqli_fetch_assoc($sqlrw);
                            ?>
                                <tr>
                                    <td><?= $no++; ?>.</td>
                                    <td><?= $data['user_nama']; ?></td>
                                    <td><?= $data['administrasi_ket']; ?></td>
                                    <td>RW:<?= $datarw['rw_nama']; ?> / RT:<?= $data['rt']; ?></td>
                                    <td><?= $data['administrasi_dari']; ?></td>
                                    <td><?= $data['administrasi_tujuan']; ?></td>
                                    <td><?= $data['administrasi_alasan']; ?></td>
                                    <td>
                                        <a href="../assets/files/files-pindah/<?= $data['administrasi_ktp']; ?>" class="text-primary" target="_blank"><i class="fas fa-image fa-sm"></i></a>
                                    </td>
                                    <td>
                                        <a href="../assets/files/files-pindah/<?= $data['administrasi_kk']; ?>" class="text-primary" target="_blank"><i class="fas fa-image fa-sm"></i></a>
                                    </td>
                                    <!-- <td>
                                        <a href="../assets/files/files-pindah/<?= $data['administrasi_sk_pindah']; ?>" class="text-primary" target="_blank"><i class="fas fa-image fa-sm"></i></a>
                                    </td> -->
                                    <td><?= $data['administrasi_status']; ?></td>
                                    <td><?= $data['administrasi_tanggal_verifikasi']; ?></td>
                                    <td>
                                        <?php
                                        if ($data['administrasi_status'] == 'Telah Dikonfirmasi RT') {
                                        ?>
                                            <a href="?page=aksipindah&id=<?= $data['administrasi_id'] ?>&aksi=Konfirmasi&ket=<?= $data['administrasi_ket'] ?>&uid=<?= $data['user_id'] ?>" class="text-success" onclick="return confirm('Apakah anda yakin ingin mengubah data ini?')"><i class="fas fa-check fa-md"></i></a>
                                            <a href="?page=aksipindah&id=<?= $data['administrasi_id'] ?>&aksi=Ditolak" class="text-danger" onclick="return confirm('Apakah anda yakin ingin mengubah data ini?')"><i class="fas fa-times fa-md"></i></a>
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
        </div>
    </div>
</div>


<?php
if (isset($_POST['cari'])) {
    $pin = $_POST['pin'];
    $bln = $_POST['bln'];
    $thn = $_POST['thn'];

    if ($bln == '') {
        if ($pin == '') {
            echo "<script>window.location='?page=cari-pindah&bln=0&thn=$thn&pin=0';</script>";
        } else {
            echo "<script>window.location='?page=cari-pindah&bln=0&thn=$thn&pin=$pin';</script>";
        }
    } else {
        if ($pin == '') {
            echo "<script>window.location='?page=cari-pindah&bln=$bln&thn=$thn&pin=0';</script>";
        } else {
            echo "<script>window.location='?page=cari-pindah&bln=$bln&thn=$thn&pin=$pin';</script>";
        }
    }
}
