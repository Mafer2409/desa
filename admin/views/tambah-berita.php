<div class="content-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h3 class="mb-2">Tambah Berita</h3>
            <div class="card">
                <div class="card-body table-responsive">
                    <form class="pt-3" action="" method="post" enctype="multipart/form-data">
                        <div class="modal-body">
                            <div class="form-group">
                                <label>Judul Berita</label>
                                <input type="text" name="berita_judul" class="form-control" placeholder="Judul berita" required>
                            </div>
                            <div class="form-group">
                                <label>Gambar Berita</label>
                                <input type="file" name="berita_gambar" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Isi Berita</label>
                                <textarea class="ckeditor" id="ckedtor" name="berita_isi"></textarea>
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

<?php
if (isset($_POST['simpan'])) {

    $berita_judul = $_POST['berita_judul'];
    $berita_tanggal = date('Y-m-d');
    $berita_isi = $_POST['berita_isi'];

    $extensi = explode(".", $_FILES['berita_gambar']['name']);
    $berita_gambar = "$berita_judul-" . round(microtime(true)) . "." . end($extensi);
    $sumber = $_FILES['berita_gambar']['tmp_name'];
    $upload = move_uploaded_file($sumber, "../assets/img/berita/" . $berita_gambar);

    $sql = mysqli_query($con, "INSERT INTO berita VALUES('', '$berita_judul', '$berita_tanggal', '$berita_isi', '$berita_gambar')");

    if ($sql) {
        echo "<script>alert('Data berhasil ditambah !');window.location='?page=berita';</script>";
    } else {
        echo "<script>alert('Data gagal ditambah !');window.location='?page=berita';</script>";
    }
}
