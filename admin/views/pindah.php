<div class="content-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h3 class="mb-2">Pindah</h3>
            <div class="card">
                <div class="card-body table-responsive">
                    <table id="bootstrap-data-table" class="table table-striped table-sm">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama</th>
                                <th>Ket</th>
                                <th>Dari</th>
                                <th>Tujuan</th>
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
                            $sql = mysqli_query($con, "SELECT * FROM administrasi, user WHERE administrasi.administrasi_user = user.user_id");
                            $no = 1;
                            while ($data = mysqli_fetch_assoc($sql)) {
                            ?>
                                <tr>
                                    <td><?= $no++; ?>.</td>
                                    <td><?= $data['user_nama']; ?></td>
                                    <td><?= $data['administrasi_ket']; ?></td>
                                    <td><?= $data['administrasi_dari']; ?></td>
                                    <td><?= $data['administrasi_tujuan']; ?></td>
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