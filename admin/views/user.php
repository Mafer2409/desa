<div class="content-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h3>Data semua warga</h3>
            <div class="card">
                <form class="mx-3" action="" method="post">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="mt-3">Pilih RT</label>
                                <select name="rt_id" class="form-control">
                                    <option value="">- Pilih RT -</option>
                                    <?php
                                    $sqlrt = mysqli_query($con, "SELECT * FROM rt");
                                    while ($datart = mysqli_fetch_assoc($sqlrt)) {
                                    ?>
                                        <option value="<?= $datart['rt_id'] ?>"><?= $datart['rt'] ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="row">
                                <input type="submit" name="cari" class="btn btn-success mt-5" value="Cari">
                                <a href="../assets/report/report-user/report-user.php?idrt=0&s=0" class="btn btn-primary ml-2 mt-5" target="_blank">Cetak</a>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="card-body table-responsive">
                    <table id="bootstrap-data-table" class="table table-striped table-sm">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama</th>
                                <th>TTL</th>
                                <th>RW/RT</th>
                                <th>Jenis Kelamin</th>
                                <th>Pekerjaan</th>
                                <th>Status Tinggal</th>
                                <th>Status User</th>
                                <th>Opsi</th>
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
                                    <td><?= $data['user_pekerjaan']; ?></td>
                                    <td><?= $data['user_status_tinggal']; ?></td>
                                    <td><?= $data['user_status']; ?></td>
                                    <td>
                                        <a href="?page=info_user&id=<?= $data['user_id'] ?>" class="text-primary"><i class="fas fa-info-circle"></i></a>
                                        <!-- <a href="?page=edit_user&id=<?= $data['user_id'] ?>" class="text-info"><i class="fas fa-edit"></i></a>
                                        <a href="?page=hapus_user&id=<?= $data['user_id'] ?>" onclick="return confirm('Yakin ingin menghapus data ini ???')" class="text-danger"><i class="fas fa-trash"></i></a> -->
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
    $rt = $_POST['rt_id'];

    if ($rt == '') {
        echo "<script>window.location='?page=user';</script>";
    } else {
        echo "<script>window.location='?page=cari-user&idrt=$rt';</script>";
    }
}
