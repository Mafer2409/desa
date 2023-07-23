<div class="content-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body table-responsive">
                    <table id="bootstrap-data-table" class="table table-striped table-sm">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama Kepala Desa</th>
                                <!-- <th>Tanda Tangan</th> -->
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            $sql = mysqli_query($con, "SELECT * FROM kepala_desa");
                            while ($data = mysqli_fetch_assoc($sql)) {
                            ?>
                                <tr>
                                    <td><?= $no++; ?>.</td>
                                    <td><?= $data['kepala_desa_nama']; ?></td>
                                    <!-- <td>
                                        <img src="../assets/img/<?= $data['kepala_desa_ttd'] ?>" class="img-fluid" width="100px" height="100px">
                                    </td> -->
                                    <td>
                                        <a href="?page=edit_kepala_desa&id=<?= $data['kepala_desa_id'] ?>" class="btn btn-info">Edit</a>
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