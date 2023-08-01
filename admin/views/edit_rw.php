<?php
$id = $_GET['id'];

$sql = mysqli_query($con, "SELECT * FROM rw WHERE rw_id = '$id'");
$data = mysqli_fetch_assoc($sql);
?>

<div class="content-wrapper">
    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Edit Data RW</h4>
                    <form class="forms-sample" action="" method="post">
                        <div class="form-group">
                            <label>Nama RW</label>
                            <input type="text" class="form-control" name="rw_nama" placeholder="RW Nama" value="<?= $data['rw_nama'] ?>" required>
                        </div>
                        <div class="form-group">
                            <label>Ketua</label>
                            <input type="text" class="form-control" name="rw_ketua" placeholder="Ketua" value="<?= $data['rw_ketua'] ?>" required>
                        </div>
                        <div class="form-group">
                            <label>E-Mail</label>
                            <input type="email" class="form-control" name="rw_email" placeholder="E-Mail" value="<?= $data['rw_email'] ?>" required>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" name="rw_password" placeholder="Password">
                        </div>
                        <div class="form-group">
                            <label>Status</label>
                            <select name="rw_status" class="form-control" required>
                                <option value="<?= $data['rw_status'] ?>" selected><?= $data['rw_status'] ?></option>
                                <option value="Aktif">Aktif</option>
                                <option value="Non-aktif">Non-aktif</option>
                            </select>
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
    $rw_nama = $_POST['rw_nama'];
    $rw_ketua = $_POST['rw_ketua'];
    $rw_email = $_POST['rw_email'];
    $rw_pass = $_POST['rw_password'];
    $rw_status = $_POST['rw_status'];

    if ($rw_pass == '') {
        $sql = mysqli_query($con, "UPDATE rw SET rw_nama = '$rw_nama', rw_ketua = '$rw_ketua', rw_email = '$rw_email', rw_status = '$rw_status' WHERE rw_id = '$id'");
    } else {
        $rw_password = md5($_POST['rw_password']);
        $sql = mysqli_query($con, "UPDATE rw SET rw_nama = '$rw_nama', rw_ketua = '$rw_ketua', rw_email = '$rw_email', rw_password = '$rw_password', rw_status = '$rw_status' WHERE rw_id = '$id'");
    }


    if ($sql) {
        echo "<script>alert('Ubah Data Berhasil !');window.location='?page=rt';</script>";
    } else {
        echo "<script>alert('Ubah Data Gagal !');window.location='?page=rt';</script>";
    }
}
?>