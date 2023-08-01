<?php
$id = $_GET['id'];
$sqlberita = mysqli_query($con, "SELECT * FROM berita WHERE berita_id = '$id'");
$databerita = mysqli_fetch_assoc($sqlberita);
?>

<div class="content-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h3 class="mb-2">Edit Berita</h3>
            <div class="card">
                <div class="card-body table-responsive">
                    <form class="pt-3" action="" method="post" enctype="multipart/form-data">
                        <div class="modal-body">
                            <div class="form-group">
                                <label>Judul Berita</label>
                                <input type="text" name="berita_judul" class="form-control" placeholder="Judul berita" value="<?= $databerita['berita_judul'] ?>" required>
                            </div>
                            <div class="form-group">
                                <label>Gambar Berita</label>
                                <img src="../assets/img/berita/<?= $databerita['berita_gambar'] ?>" width="100px" height="100px">
                                <a href="" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#ModalGambar"> Ubah Gambar</a>
                            </div>
                            <div class="form-group">
                                <label>Isi Berita</label>
                                <textarea class="ckeditor" id="ckedtor" name="berita_isi"><?= $databerita['berita_isi'] ?></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <input type="submit" class="btn btn-success" name="simpan" value="Simpan">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="ModalGambar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ubah Gambar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="" enctype="multipart/form-data" method="post">
                <div class="modal-body">
                    <label>Gambar Berita</label>
                    <input type="file" name="berita_gambar" class="form-control">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-primary" name="simpan_gambar" value="Simpan">
                </div>
            </form>
        </div>
    </div>
</div>



<?php
if (isset($_POST['simpan_gambar'])) {
    $gbr = $databerita['berita_gambar'];
    $filelama = "../assets/img/berita/" . $gbr;

    if (file_exists($filelama)) {
        unlink($filelama);
    }

    $extensi = explode(".", $_FILES['berita_gambar']['name']);
    $berita_gambar = "$berita_judul-" . round(microtime(true)) . "." . end($extensi);
    $sumber = $_FILES['berita_gambar']['tmp_name'];
    $upload = move_uploaded_file($sumber, "../assets/img/berita/" . $berita_gambar);

    $sql = mysqli_query($con, "UPDATE berita SET berita_gambar='$berita_gambar' WHERE berita_id = '$id'");

    if ($sql) {
        echo "<script>alert('Data berhasil diubah !');window.location='?page=edit-berita&id=$id';</script>";
    } else {
        echo "<script>alert('Data gagal diubah !');window.location='?page=edit-berita&id=$id';</script>";
    }
}



if (isset($_POST['simpan'])) {
    $berita_judul = $_POST['berita_judul'];
    $berita_tanggal = date('Y-m-d');
    $berita_isi = $_POST['berita_isi'];

    $sql = mysqli_query($con, "UPDATE berita SET berita_judul='$berita_judul', berita_tanggal='$berita_tanggal', berita_isi='$berita_isi' WHERE berita_id = '$id'");

    if ($sql) {
        echo "<script>alert('Data berhasil diubah !');window.location='?page=berita';</script>";
    } else {
        echo "<script>alert('Data gagal diubah !');window.location='?page=berita';</script>";
    }
}
