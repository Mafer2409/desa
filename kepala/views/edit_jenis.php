<?php
$id = $_GET['id'];
$sql = mysqli_query($con, "SELECT * FROM jenis WHERE jenis_id = '$id'");
$data = mysqli_fetch_assoc($sql);
?>

<div class="content-wrapper">
    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Edit Data Jenis</h4>
                    <form class="forms-sample" action="" method="post">
                        <div class="form-group">
                            <label for="exampleInputUsername1">Nama jenis</label>
                            <input type="text" class="form-control" name="nama" value="<?= $data['jenis_nama'] ?>">
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

    $sql = mysqli_query($con, "UPDATE jenis SET jenis_nama = '$nama' WHERE jenis_id = '$id'");

    if ($sql) {
        echo "<script>alert('Ubah Data Berhasil !');window.location='?page=jenis';</script>";
    } else {
        echo "<script>alert('Ubah Data Gagal !');window.location='?page=jenis';</script>";
    }
}
?>