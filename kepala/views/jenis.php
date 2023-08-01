<div class="content-wrapper">
    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body table-responsive">
                    <table id="bootstrap-data-table" class="table table-striped table-sm">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama jenis</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            $sql = mysqli_query($con, "SELECT * FROM jenis");
                            while ($data = mysqli_fetch_assoc($sql)) {
                            ?>
                                <tr>
                                    <td><?= $no++; ?>.</td>
                                    <td><?= $data['jenis_nama']; ?></td>
                                    <td>
                                        <a href="?page=edit_jenis&id=<?= $data['jenis_id'] ?>" class="btn btn-info">Edit</a>
                                        <a href="?page=hapus_jenis&id=<?= $data['jenis_id'] ?>" onclick="return confirm('Yakin ingin menghapus data ini ???')" class="btn btn-danger">Hapus</a>
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
                    <h4 class="card-title">Tambah Data Jenis</h4>
                    <form class="forms-sample" action="" method="post">
                        <div class="form-group">
                            <label for="exampleInputUsername1">Nama jenis</label>
                            <input type="text" class="form-control" name="nama" placeholder="Nama Jenis">
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
    $nama = $_POST['nama'];

    $sql = mysqli_query($con, "INSERT INTO jenis VALUES('', '$nama')");

    if ($sql) {
        echo "<script>alert('Tambah Data Berhasil !');window.location='?page=jenis';</script>";
    } else {
        echo "<script>alert('Tambah Data Gagal !');window.location='?page=jenis';</script>";
    }
}
?>