<div class="content-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body table-responsive">
                    <table id="bootstrap-data-table" class="table table-striped table-sm">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama</th>
                                <th>TTL</th>
                                <th>RT</th>
                                <th>Jenis Kelamin</th>
                                <th>Telepon</th>
                                <th>E-Mail</th>
                                <!-- <th>Opsi</th> -->
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            $sql = mysqli_query($con, "SELECT * FROM user, rt WHERE user.user_rt_id = rt.rt_id");
                            while ($data = mysqli_fetch_assoc($sql)) {
                            ?>
                                <tr>
                                    <td><?= $no++; ?>.</td>
                                    <td><?= $data['user_nama']; ?></td>
                                    <td><?= $data['user_tempat_lahir']; ?>, <?= $data['user_tgl_lahir']; ?></td>
                                    <td><?= $data['rt']; ?></td>
                                    <td><?= $data['user_jk']; ?></td>
                                    <td><?= $data['user_telepon']; ?></td>
                                    <td><?= $data['user_email']; ?></td>
                                    <!-- <td>
                                        <a href="?page=edit_jenis&id=<?= $data['jenis_id'] ?>" class="btn btn-info">Edit</a>
                                        <a href="?page=hapus_jenis&id=<?= $data['jenis_id'] ?>" onclick="return confirm('Yakin ingin menghapus data ini ???')" class="btn btn-danger">Hapus</a>
                                    </td> -->
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