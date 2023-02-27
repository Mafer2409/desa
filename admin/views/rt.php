<div class="content-wrapper">
    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body table-responsive">
                    <table id="bootstrap-data-table" class="table table-striped table-sm">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama RT</th>
                                <th>Ketua</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            $sql = mysqli_query($con, "SELECT * FROM rt");
                            while ($data = mysqli_fetch_assoc($sql)) {
                                $idu = $data['rt_ketua'];
                                $sqluser = mysqli_query($con, "SELECT * FROM user WHERE user_id = '$idu'");
                                $datauser = mysqli_fetch_assoc($sqluser);
                            ?>
                                <tr>
                                    <td><?= $no++; ?>.</td>
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
                            <label for="exampleInputUsername1">RW / RT</label>
                            <input type="text" class="form-control" name="rt" placeholder="RT" value="RW:000 / RT:000" required>
                        </div>
                        <input type="submit" name="simpan" class="btn btn-success btn-block" value="Simpan">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
if (isset($_POST['simpan'])) {
    $rt = $_POST['rt'];

    $sql = mysqli_query($con, "INSERT INTO rt VALUES('', '$rt', '')");

    if ($sql) {
        echo "<script>alert('Tambah Data Berhasil !');window.location='?page=rt';</script>";
    } else {
        echo "<script>alert('Tambah Data Gagal !');window.location='?page=rt';</script>";
    }
}
?>