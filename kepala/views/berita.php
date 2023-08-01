<div class="content-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h3 class="mb-2">Berita</h3>
            <div class="card">
                <div class="float-right">
                    <!-- <a href="?page=tambah-berita" class="btn btn-success btn-sm ml-3 mt-3"><i class="fas fa-plus"></i> Tambah Data</a> -->
                </div>
                <div class="card-body table-responsive">
                    <table id="bootstrap-data-table" class="table table-striped table-sm">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Tanggal</th>
                                <th>Judul</th>
                                <th>Gambar</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql = mysqli_query($con, "SELECT * FROM berita");
                            $no = 1;
                            while ($data = mysqli_fetch_assoc($sql)) {
                            ?>
                                <tr>
                                    <td><?= $no++; ?>.</td>
                                    <td><?= $data['berita_tanggal']; ?></td>
                                    <td><?= $data['berita_judul']; ?></td>
                                    <td>
                                        <img src="../assets/img/berita/<?= $data['berita_gambar']; ?>" class="img-fluid" width="50px" height="50px">
                                    </td>
                                    <td>
                                        <a href="?page=edit-berita&id=<?= $data['berita_id'] ?>" class="text-parimary"><i class="fas fa-edit fa-md"></i></a>
                                        <!-- <a href="?page=hapus-berita&id=<?= $data['berita_id'] ?>" class="text-danger" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')"><i class="fas fa-trash fa-md"></i></a> -->
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
    </div>
</div>