<div class="content-wrapper">
    <div class="row">
        <div class="col-lg-12">
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
                                <a href="../assets/report/report-user/report-user.php?idrt=0" class="btn btn-primary ml-2 mt-5" target="_blank">Cetak</a>
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

<?php
if (isset($_POST['cari'])) {
    $rt = $_POST['rt_id'];

    if ($rt == '') {
        echo "<script>window.location='?page=user';</script>";
    } else {
        echo "<script>window.location='?page=cari-user&idrt=$rt';</script>";
    }
}
