<div class="container-xxl py-6">
    <div class="container">
        <h3 class="mb-2">Kematian Belum Verifikasi</h3>
        <table id="bootstrap-data-table" class="table table-striped table-sm">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Nama</th>
                    <th>Yang Meninggal</th>
                    <th>TTM</th>
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
                $sql = mysqli_query($con, "SELECT * FROM kematian, user WHERE kematian.kematian_user = user.user_id AND kematian.kematian_rt = '$idrt' AND kematian.kematian_status = 'Menunggu Verifikasi RT'");
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
                            <a href="?page=aksikematian&id=<?= $data['kematian_id'] ?>&aksi=Konfirmasi" class="text-success" onclick="return confirm('Apakah anda yakin ingin mengubah data ini?')"><i class="fas fa-check fa-md"></i></a>
                            <a href="?page=aksikematian&id=<?= $data['kematian_id'] ?>&aksi=Ditolak" class="text-danger" onclick="return confirm('Apakah anda yakin ingin mengubah data ini?')"><i class="fas fa-times fa-md"></i></a>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</div>




<div class="container-xxl py-6">
    <div class="container">
        <h3 class="mb-2">Data Administrasi Kematian RT: <?= $namart ?></h3>
        <table id="bootstrap-data-table" class="table table-striped table-sm">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Nama</th>
                    <th>Yang Meninggal</th>
                    <th>TTM</th>
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
                $sql = mysqli_query($con, "SELECT * FROM kematian, user WHERE kematian.kematian_user = user.user_id AND kematian.kematian_rt = '$idrt'");
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
                            if ($data['kematian_status'] == 'Menunggu Verifikasi RT') {
                            ?>
                                <a href="?page=aksikematian&id=<?= $data['kematian_id'] ?>&aksi=Konfirmasi" class="text-success" onclick="return confirm('Apakah anda yakin ingin mengubah data ini?')"><i class="fas fa-check fa-md"></i></a>
                                <a href="?page=aksikematian&id=<?= $data['kematian_id'] ?>&aksi=Ditolak" class="text-danger" onclick="return confirm('Apakah anda yakin ingin mengubah data ini?')"><i class="fas fa-times fa-md"></i></a>
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