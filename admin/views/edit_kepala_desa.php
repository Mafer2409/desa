<?php
$id = $_GET['id'];
$sql = mysqli_query($con, "SELECT * FROM kepala_desa WHERE kepala_desa_id = '$id'");
$data = mysqli_fetch_assoc($sql);
?>

<div class="content-wrapper">
    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Edit Kepala Desa</h4>
                    <form class="forms-sample" action="" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="exampleInputUsername1">Nama Kepala Desa</label>
                            <input type="text" class="form-control" name="kepala_desa_nama" value="<?= $data['kepala_desa_nama'] ?>" required>
                        </div>
                        <!-- <div class="form-group">
                            <label for="exampleInputUsername1">TTD Kepala Desa</label>
                            <div class="container mt-3 mb-3">
                                <img src="../assets/img/<?= $data['kepala_desa_ttd'] ?>" width="100px" height="100px">
                            </div>
                            <input type="file" class="form-control" name="kepala_desa_ttd">
                        </div> -->
                        <input type="submit" name="simpan" class="btn btn-success btn-block" value="Simpan">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
if (isset($_POST['simpan'])) {
    $kepala_desa_nama = $_POST['kepala_desa_nama'];

    // $pict1 = $_FILES['kepala_desa_ttd']['name'];
    // $extensi1 = explode(".", $_FILES['kepala_desa_ttd']['name']);
    // $kepala_desa_ttd = "$kepala_desa_nama" . round(microtime(true)) . "." . end($extensi1);
    // $sumber1 = $_FILES['kepala_desa_ttd']['tmp_name'];

    // if ($pict1 != '') {
    //     $sql = mysqli_query($con, "UPDATE kepala_desa SET kepala_desa_nama = '$kepala_desa_nama', kepala_desa_ttd = '$kepala_desa_ttd' WHERE kepala_desa_id = '$id'");

    //     $gbr_awal = $data['kepala_desa_ttd'];
    //     unlink("../assets/img/" . $gbr_awal);
    //     $upload = move_uploaded_file($sumber1, "../assets/img/" . $kepala_desa_ttd);

    //     if ($sql) {
    //         echo "<script>alert('Ubah Data Berhasil !');window.location='?page=kepala_desa';</script>";
    //     } else {
    //         echo "<script>alert('Ubah Data Gagal !');window.location='?page=kepala_desa';</script>";
    //     }
    // } else {
    $sql = mysqli_query($con, "UPDATE kepala_desa SET kepala_desa_nama = '$kepala_desa_nama' WHERE kepala_desa_id = '$id'");
    if ($sql) {
        echo "<script>alert('Ubah Data Berhasil !');window.location='?page=kepala_desa';</script>";
    } else {
        echo "<script>alert('Ubah Data Gagal !');window.location='?page=kepala_desa';</script>";
    }
    // }
}
?>