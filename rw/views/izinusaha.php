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
                            <!-- <a href="../assets/report/report-rt/report-izinusaha-rt.php?bln=0&thn=0&idrt=<?= $idrt ?>" class="btn btn-primary ml-2 mt-5" target="_blank">Cetak</a> -->
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <h3 class="mb-2">Izin usaha Belum Verifikasi</h3>
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
                    <!-- <th>Opsi</th> -->
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = mysqli_query($con, "SELECT * FROM izinusaha, user, rt WHERE user.user_rt_id = rt.rt_id AND rt.rt_rw_id = '$idrw' AND izinusaha.izinusaha_user = user.user_id AND izinusaha.izinusaha_status = 'Menunggu Verifikasi RT' GROUP BY user.user_id");
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
                        <!-- <td>
                            <?php
                            if ($data['izinusaha_status'] == 'Menunggu Verifikasi RT') {
                            ?>
                                <a href="?page=aksiizinusaha&id=<?= $data['izinusaha_id'] ?>&aksi=Konfirmasi" class="text-success" onclick="return confirm('Apakah anda yakin ingin mengubah data ini?')"><i class="fas fa-check fa-md"></i></a>
                                <a href="" class="text-danger" data-toggle="modal" data-target="#tolakIzinUsaha<?= $data['izinusaha_id'] ?>"><i class="fas fa-times fa-md"></i></a>
                            <?php
                            }
                            ?>
                        </td> -->
                    </tr>
                    <!-- Modal Tolak izinusaha -->
                    <div class="modal fade" id="tolakIzinUsaha<?= $data['izinusaha_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Alasan Penolakan Permintaan</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="" method="post">
                                    <div class="modal-body">
                                        <label for="">Alasan :</label>
                                        <input type="hidden" class="form-control" name="izinusaha_id" value="<?= $data['izinusaha_id'] ?>" required>
                                        <input type="text" class="form-control" name="izinusaha_ket" required>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <input type="submit" name="simpan_izinusaha" class="btn btn-primary" value="Kirim">
                                    </div>
                                </form>
                                <?php
                                if (isset($_POST['simpan_izinusaha'])) {
                                    $izinusaha_ket = $_POST['izinusaha_ket'];
                                    $izinusaha_id = $_POST['izinusaha_id'];

                                    $sql_izinusaha = mysqli_query($con, "UPDATE izinusaha SET izinusaha_ket = '$izinusaha_ket' WHERE izinusaha_id = '$izinusaha_id'");

                                    echo "<script>window.location='?page=aksiizinusaha&id=$izinusaha_id&aksi=Ditolak';</script>";
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</div>




<div class="container-xxl py-6">
    <div class="container">
        <h3 class="mb-2">Data Administrasi Izin usaha RW: <?= $namarw ?></h3>
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
                    <!-- <th>Opsi</th> -->
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = mysqli_query($con, "SELECT * FROM izinusaha, user, rt WHERE user.user_rt_id = rt.rt_id AND rt.rt_rw_id = '$idrw' AND izinusaha.izinusaha_user = user.user_id GROUP BY user.user_id");
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
                        <!-- <td>
                            <?php
                            if ($data['izinusaha_status'] == 'Menunggu Verifikasi RT') {
                            ?>
                                <a href="?page=aksiizinusaha&id=<?= $data['izinusaha_id'] ?>&aksi=Konfirmasi" class="text-success" onclick="return confirm('Apakah anda yakin ingin mengubah data ini?')"><i class="fas fa-check fa-md"></i></a>

                            <?php
                            }
                            ?>
                        </td> -->
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
        echo "<script>window.location='?page=cari-izinusaha&bln=0&thn=$thn&idrt=$idrt';</script>";
    } else {
        echo "<script>window.location='?page=cari-izinusaha&bln=$bln&thn=$thn&idrt=$idrt';</script>";
    }
}
