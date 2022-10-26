<div class="content-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h3 class="mb-2">Kelahiran</h3>
            <div class="card">
                <div class="card-body table-responsive">
                    <table id="bootstrap-data-table" class="table table-striped table-sm">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama</th>
                                <th>Nama Anak</th>
                                <th>TTL</th>
                                <th>Jenis Kelamin</th>
                                <th>Nama Ayah</th>
                                <th>KTP Ayah</th>
                                <th>Nama Ibu</th>
                                <th>KTP Ibu</th>
                                <th>Surat Ket.</th>
                                <th>Status</th>
                                <th>Tgl Verifikasi</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql = mysqli_query($con, "SELECT * FROM kelahiran, user WHERE kelahiran.kelahiran_user = user.user_id");
                            $no = 1;
                            while ($data = mysqli_fetch_assoc($sql)) {
                            ?>
                                <tr>
                                    <td><?= $no++; ?>.</td>
                                    <td><?= $data['user_nama']; ?></td>
                                    <td><?= $data['kelahiran_nama_anak']; ?></td>
                                    <td><?= $data['kelahiran_tempat_lahir']; ?>, <?= $data['kelahiran_tanggal_lahir']; ?></td>
                                    <td><?= $data['kelahiran_jk']; ?></td>
                                    <td><?= $data['kelahiran_nama_ayah']; ?></td>
                                    <td>
                                        <a href="../assets/files/files-kelahiran/<?= $data['kelahiran_ktp_ayah']; ?>" class="text-primary" target="_blank"><i class="fas fa-image fa-sm"></i></a>
                                    </td>
                                    <td><?= $data['kelahiran_nama_ibu']; ?></td>
                                    <td>
                                        <a href="../assets/files/files-kelahiran/<?= $data['kelahiran_ktp_ibu']; ?>" class="text-primary" target="_blank"><i class="fas fa-image fa-sm"></i></a>
                                    </td>
                                    <td>
                                        <a href="../assets/files/files-kelahiran/<?= $data['kelahiran_sk_lahir']; ?>" class="text-primary" target="_blank"><i class="fas fa-image fa-sm"></i></a>
                                    </td>
                                    <td><?= $data['kelahiran_status']; ?></td>
                                    <td><?= $data['kelahiran_tanggal_verifikasi']; ?></td>
                                    <td>
                                        <?php
                                        if ($data['kelahiran_status'] == 'Telah Dikonfirmasi RT') {
                                        ?>
                                            <a href="?page=aksikelahiran&id=<?= $data['kelahiran_id'] ?>&aksi=Konfirmasi" class="text-success" onclick="return confirm('Apakah anda yakin ingin mengubah data ini?')"><i class="fas fa-check fa-md"></i></a>
                                            <a href="?page=aksikelahiran&id=<?= $data['kelahiran_id'] ?>&aksi=Ditolak" class="text-danger" onclick="return confirm('Apakah anda yakin ingin mengubah data ini?')"><i class="fas fa-times fa-md"></i></a>
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