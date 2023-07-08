<?php
$id = $_GET['id'];

$sql = mysqli_query($con, "SELECT * FROM rt WHERE rt_id = '$id'");
$data = mysqli_fetch_assoc($sql);
?>

<div class="content-wrapper">
    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Edit Data RT</h4>
                    <form class="forms-sample" action="" method="post">
                        <div class="form-group">
                            <label>Nama RT</label>
                            <input type="text" class="form-control" name="rt" placeholder="RT" value="<?= $data['rt'] ?>" required>
                        </div>
                        <div class="form-group">
                            <label>Ketua RT</label>
                            <select class="form-control" name=" rt_ketua" id="rt_ketua">
                                <option value="">- Pilih RT -</option>
                                <?php
                                $sqluser = mysqli_query($con, "SELECT * FROM user WHERE user_rt_id = '$id'");
                                while ($datauser = mysqli_fetch_assoc($sqluser)) {
                                    $s = '';
                                    if ($data['rt_ketua'] == $datauser['user_id']) {
                                        $s = 'selected';
                                    }
                                ?>
                                    <option value="<?= $datauser['user_id'] ?>" <?= $s ?> style="margin-top: -100px;"><?= $datauser['user_nama'] ?></option>
                                <?php
                                }
                                ?>
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
    $rt = $_POST['rt'];
    $rt_ketua = $_POST['rt_ketua'];

    $sql = mysqli_query($con, "UPDATE rt SET rt = '$rt', rt_ketua = '$rt_ketua' WHERE rt_id = '$id'");

    if ($sql) {
        echo "<script>alert('Ubah Data Berhasil !');window.location='?page=rt';</script>";
    } else {
        echo "<script>alert('Ubah Data Gagal !');window.location='?page=rt';</script>";
    }
}
?>