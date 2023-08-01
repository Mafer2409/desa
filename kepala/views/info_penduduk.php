<?php
$id = $_GET['id'];
$sqlpenduduk = mysqli_query($con, "SELECT * FROM penduduk, rt WHERE penduduk.penduduk_rt_id = rt.rt_id AND penduduk.penduduk_id = '$id'");
$datapenduduk = mysqli_fetch_assoc($sqlpenduduk);
?>

<div class="col-xl-12 col-lg-12">
    <div class="card shadow mb-4">
        <!-- Card Header - Dropdown -->
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary"><?= $datapenduduk['penduduk_nama'] ?></h6>
            <div class="dropdown no-arrow">
            </div>
        </div>
        <!-- Card Body -->
        <div class="card-body">
            <table class="table table-sm table-hover">
                <tr>
                    <td>NIK</td>
                    <td>:</td>
                    <td><?= $datapenduduk['penduduk_nik'] ?></td>
                </tr>
                <tr>
                    <td>Nama</td>
                    <td>:</td>
                    <td><?= $datapenduduk['penduduk_nama'] ?></td>
                </tr>
                <tr>
                    <td>Tempat/Tanggal Lahir</td>
                    <td>:</td>
                    <td><?= $datapenduduk['penduduk_tempat_lahir'] ?>, <?= $datapenduduk['penduduk_tgl_lahir'] ?></td>
                </tr>
                <tr>
                    <td>RT</td>
                    <td>:</td>
                    <td><?= $datapenduduk['rt'] ?></td>
                </tr>
                <tr>
                    <td>Agama</td>
                    <td>:</td>
                    <td><?= $datapenduduk['penduduk_agama'] ?></td>
                </tr>
                <tr>
                    <td>Jenis Kelamin</td>
                    <td>:</td>
                    <td><?= $datapenduduk['penduduk_jk'] ?></td>
                </tr>
                <tr>
                    <td>Warga Negara</td>
                    <td>:</td>
                    <td><?= $datapenduduk['penduduk_wn'] ?></td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td>:</td>
                    <td><?= $datapenduduk['penduduk_alamat'] ?></td>
                </tr>
                <tr>
                    <td>Status Tinggal</td>
                    <td>:</td>
                    <td><?= $datapenduduk['penduduk_status_tinggal'] ?></td>
                </tr>
                <tr>
                    <td>Pekerjaan</td>
                    <td>:</td>
                    <td><?= $datapenduduk['penduduk_pekerjaan'] ?></td>
                </tr>
                <tr>
                    <td>Status Kawin</td>
                    <td>:</td>
                    <td><?= $datapenduduk['penduduk_status_kawin'] ?></td>
                </tr>
                <tr>
                    <td>Jenjang Pendidikan</td>
                    <td>:</td>
                    <td><?= $datapenduduk['penduduk_jenjang_pendidikan'] ?></td>
                </tr>
            </table>

            <div class="row mt-4 ml-2">
                <a href="?page=edit_penduduk&id=<?= $id ?>" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i> Edit</a>
                <a href="?page=hapus_penduduk&id=<?= $id ?>" class="btn btn-sm btn-danger ml-2" onclick="return confirm('Yakin ingin menhapus data ini ?')"><i class="fas fa-trash"></i> Hapus</a>
            </div>
        </div>
    </div>
</div>