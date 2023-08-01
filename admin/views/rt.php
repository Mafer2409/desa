<div class="content-wrapper">
    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body table-responsive">
                    <table id="bootstrap-data-table" class="table table-striped table-sm">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>RW</th>
                                <th>RT</th>
                                <th>Ketua</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            $sql = mysqli_query($con, "SELECT * FROM rt, rw WHERE rt.rt_rw_id = rw.rw_id");
                            while ($data = mysqli_fetch_assoc($sql)) {
                                $idu = $data['rt_ketua'];
                                $sqluser = mysqli_query($con, "SELECT * FROM user WHERE user_id = '$idu'");
                                $datauser = mysqli_fetch_assoc($sqluser);
                            ?>
                                <tr>
                                    <td><?= $no++; ?>.</td>
                                    <td><?= $data['rw_nama']; ?></td>
                                    <td><?= $data['rt']; ?></td>
                                    <td>
                                        <?php
                                        if ($data['rt_ketua'] != '0') {
                                        ?>
                                            <?= $datauser['user_nama']; ?>
                                        <?php
                                        }
                                        ?>
                                    </td>
                                    <td>
                                        <a href="?page=edit_rt&id=<?= $data['rt_id'] ?>" class="btn btn-info">Edit</a>
                                        <a href="?page=hapus_rt&id=<?= $data['rt_id'] ?>" onclick="return confirm('Yakin ingin menghapus data ini ???')" class="btn btn-danger">Hapus</a>
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
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Tambah Data RT</h4>
                    <form class="forms-sample" action="" method="post">
                        <div class="form-group">
                            <label for="">RW</label>
                            <select name="rt_rw_id" class="form-control" required>
                                <option value="">-- Pilih RW --</option>
                                <?php
                                $sqlrw = mysqli_query($con, "SELECT * FROM rw ORDER BY rw_nama ASC");
                                while ($datarw = mysqli_fetch_assoc($sqlrw)) {
                                ?>
                                    <option value="<?= $datarw['rw_id'] ?>"><?= $datarw['rw_nama'] ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputUsername1">RT</label>
                            <input type="text" class="form-control" name="rt" placeholder="RT" value="000" required>
                        </div>
                        <input type="submit" name="simpanRT" class="btn btn-success btn-block" value="Simpan">
                    </form>
                </div>
            </div>
        </div>



        <!-- *********** RW ************************************************************************************* -->

        <div class="col-lg-8 mt-4">
            <div class="card">
                <div class="card-body table-responsive">
                    <table id="bootstrap-data-table" class="table table-striped table-sm">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>RW</th>
                                <th>Ketua</th>
                                <th>E-Mail</th>
                                <th>Status</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            $sql = mysqli_query($con, "SELECT * FROM rw");
                            while ($data = mysqli_fetch_assoc($sql)) {
                                //     $idu = $data['rt_ketua'];
                                //     $sqluser = mysqli_query($con, "SELECT * FROM user WHERE user_id = '$idu'");
                                //     $datauser = mysqli_fetch_assoc($sqluser);
                            ?>
                                <tr>
                                    <td><?= $no++; ?>.</td>
                                    <td><?= $data['rw_nama']; ?></td>
                                    <td><?= $data['rw_ketua']; ?></td>
                                    <td><?= $data['rw_email']; ?></td>
                                    <td><?= $data['rw_status']; ?></td>
                                    <td>
                                        <a href="?page=edit_rw&id=<?= $data['rw_id'] ?>" class="btn btn-info">Edit</a>
                                        <a href="?page=hapus_rw&id=<?= $data['rw_id'] ?>" onclick="return confirm('Yakin ingin menghapus data ini ???')" class="btn btn-danger">Hapus</a>
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
        <div class="col-lg-4 mt-4">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Tambah Data RW</h4>
                    <form class="forms-sample" action="" method="post">
                        <div class="form-group">
                            <label>Nama RW</label>
                            <input type="text" class="form-control" name="rw_nama" placeholder="RW Nama" required>
                        </div>
                        <div class="form-group">
                            <label>Ketua</label>
                            <input type="text" class="form-control" name="rw_ketua" placeholder="Ketua" required>
                        </div>
                        <div class="form-group">
                            <label>E-Mail</label>
                            <input type="email" class="form-control" name="rw_email" placeholder="E-Mail" required>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" name="rw_password" placeholder="Password" required>
                        </div>
                        <div class="form-group">
                            <label>Status</label>
                            <select name="rw_status" class="form-control" required>
                                <option value="">- Pilih status -</option>
                                <option value="Aktif">Aktif</option>
                                <option value="Non-aktif">Non-aktif</option>
                            </select>
                        </div>
                        <input type="submit" name="simpanRW" class="btn btn-success btn-block" value="Simpan">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
if (isset($_POST['simpanRW'])) {
    $rw_nama = $_POST['rw_nama'];
    $rw_ketua = $_POST['rw_ketua'];
    $rw_email = $_POST['rw_email'];
    $rw_password = md5($_POST['rw_password']);
    $rw_status = $_POST['rw_status'];

    $sql = mysqli_query($con, "INSERT INTO rw VALUES('', '$rw_nama', '$rw_ketua', '$rw_email', '$rw_password', '$rw_status')");

    if ($sql) {
        echo "<script>alert('Tambah Data Berhasil !');window.location='?page=rt';</script>";
    } else {
        echo "<script>alert('Tambah Data Gagal !');window.location='?page=rt';</script>";
    }
}
?>
<?php
if (isset($_POST['simpanRT'])) {
    $rt_rw_id = $_POST['rt_rw_id'];
    $rt = $_POST['rt'];

    $sql = mysqli_query($con, "INSERT INTO rt VALUES('', '$rt_rw_id', '$rt', '')");

    if ($sql) {
        echo "<script>alert('Tambah Data Berhasil !');window.location='?page=rt';</script>";
    } else {
        echo "<script>alert('Tambah Data Gagal !');window.location='?page=rt';</script>";
    }
}
?>