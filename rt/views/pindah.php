<div class="container-xxl py-6">
    <div class="container">
        <h3 class="mb-2">Kelahiran Belum Verifikasi</h3>
        <table id="bootstrap-data-table" class="table table-striped table-sm">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Nama</th>
                    <th>Ket</th>
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
                $sql = mysqli_query($con, "SELECT * FROM administrasi, user WHERE administrasi.administrasi_user = user.user_id AND administrasi.administrasi_rt = '$idrt' AND administrasi.administrasi_status = 'Menunggu Verifikasi RT'");
                $no = 1;
                while ($data = mysqli_fetch_assoc($sql)) {
                ?>
                    <tr>
                        <td><?= $no++; ?>.</td>
                        <td><?= $data['user_nama']; ?></td>
                        <td><?= $data['administrasi_ket']; ?></td>
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
                            if ($data['administrasi_status'] == 'Menunggu Verifikasi RT') {
                            ?>
                                <a href="?page=aksipindah&id=<?= $data['administrasi_id'] ?>&aksi=Konfirmasi" class="text-success" onclick="return confirm('Apakah anda yakin ingin mengubah data ini?')"><i class="fas fa-check fa-md"></i></a>
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




<div class="container-xxl py-6">
    <div class="container">
        <h3 class="mb-2">Data Administrasi Kelahiran RT: <?= $namart ?></h3>
        <table id="bootstrap-data-table" class="table table-striped table-sm">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Nama</th>
                    <th>Ket</th>
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
                $sql = mysqli_query($con, "SELECT * FROM administrasi, user WHERE administrasi.administrasi_user = user.user_id AND administrasi.administrasi_rt = '$idrt'");
                $no = 1;
                while ($data = mysqli_fetch_assoc($sql)) {
                ?>
                    <tr>
                        <td><?= $no++; ?>.</td>
                        <td><?= $data['user_nama']; ?></td>
                        <td><?= $data['administrasi_ket']; ?></td>
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
                            if ($data['administrasi_status'] == 'Menunggu Verifikasi RT') {
                            ?>
                                <a href="?page=aksipindah&id=<?= $data['administrasi_id'] ?>&aksi=Konfirmasi" class="text-success" onclick="return confirm('Apakah anda yakin ingin mengubah data ini?')"><i class="fas fa-check fa-md"></i></a>
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