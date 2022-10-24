<div class="container-xxl py-6">
    <div class="container">
        <h3 class="mb-2">Warga Pendaftar</h3>
        <table id="bootstrap-data-table" class="table table-striped table-sm">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Nama</th>
                    <th>TTL</th>
                    <th>Jenis Kelamin</th>
                    <th>Telepon</th>
                    <th>E-Mail</th>
                    <th>Status</th>
                    <th>Opsi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = mysqli_query($con, "SELECT * FROM user WHERE user_rt_id = '$idrt' AND user_status = 'Menunggu Verifikasi'");
                $no = 1;
                while ($data = mysqli_fetch_assoc($sql)) {
                ?>
                    <tr>
                        <td><?= $no++; ?>.</td>
                        <td><?= $data['user_nama']; ?></td>
                        <td><?= $data['user_tempat_lahir']; ?>, <?= $data['user_tgl_lahir']; ?></td>
                        <td><?= $data['user_jk']; ?></td>
                        <td><?= $data['user_telepon']; ?></td>
                        <td><?= $data['user_email']; ?></td>
                        <td><?= $data['user_status']; ?></td>
                        <td>
                            <a href="?page=aksiwarga&id=<?= $data['user_id'] ?>&aksi=Aktif" class="text-success" onclick="return confirm('Apakah anda yakin ingin mengubah data ini?')"><i class="fas fa-check fa-md"></i></a>
                            <a href="?page=aksiwarga&id=<?= $data['user_id'] ?>&aksi=Ditolak" class="text-danger" onclick="return confirm('Apakah anda yakin ingin mengubah data ini?')"><i class="fas fa-times fa-md"></i></a>
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
        <h3>Semua Warga RT: <?= $namart ?></h3>
        <table id="bootstrap-data-table" class="table table-striped table-sm">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Nama</th>
                    <th>TTL</th>
                    <th>Jenis Kelamin</th>
                    <th>Telepon</th>
                    <th>E-Mail</th>
                    <th>Status</th>
                    <th>Opsi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = mysqli_query($con, "SELECT * FROM user WHERE user_rt_id = '$idrt'");
                $no = 1;
                while ($data = mysqli_fetch_assoc($sql)) {
                ?>
                    <tr>
                        <td><?= $no++; ?>.</td>
                        <td><?= $data['user_nama']; ?></td>
                        <td><?= $data['user_tempat_lahir']; ?>, <?= $data['user_tgl_lahir']; ?></td>
                        <td><?= $data['user_jk']; ?></td>
                        <td><?= $data['user_telepon']; ?></td>
                        <td><?= $data['user_email']; ?></td>
                        <td><?= $data['user_status']; ?></td>
                        <td>
                            <?php
                            if ($data['user_status'] == 'Menunggu Verifikasi') {
                            ?>
                                <a href="?page=aksiwarga&id=<?= $data['user_id'] ?>&aksi=Aktif" class="text-success" onclick="return confirm('Apakah anda yakin ingin mengubah data ini?')"><i class="fas fa-check fa-md"></i></a>
                                <a href="?page=aksiwarga&id=<?= $data['user_id'] ?>&aksi=Ditolak" class="text-danger" onclick="return confirm('Apakah anda yakin ingin mengubah data ini?')"><i class="fas fa-times fa-md"></i></a>
                            <?php
                            } elseif ($data['user_status'] == 'Aktif') {
                            ?>
                                <a href="?page=aksiwarga&id=<?= $data['user_id'] ?>&aksi=Non-Aktif" class="text-danger" onclick="return confirm('Apakah anda yakin ingin mengubah data ini?')"><i class="fas fa-exclamation-circle fa-md"></i></a>
                            <?php
                            } else {
                            ?>
                                <a href="?page=aksiwarga&id=<?= $data['user_id'] ?>&aksi=Aktif" class="text-success" onclick="return confirm('Apakah anda yakin ingin mengubah data ini?')"><i class="fas fa-toggle-on fa-md"></i></a>
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
<!-- Facts End -->
<!-- Facts End -->