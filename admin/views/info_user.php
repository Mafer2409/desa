<?php
$id = $_GET['id'];
$sqluser = mysqli_query($con, "SELECT * FROM user, rt WHERE user.user_rt_id = rt.rt_id AND user.user_id = '$id'");
$datauser = mysqli_fetch_assoc($sqluser);
?>

<div class="col-xl-12 col-lg-12">
    <div class="card shadow mb-4">
        <!-- Card Header - Dropdown -->
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary"><?= $datauser['user_nama'] ?></h6>
            <div class="dropdown no-arrow">
            </div>
        </div>
        <!-- Card Body -->
        <div class="card-body">
            <table class="table table-sm table-hover">
                <tr>
                    <td>NIK</td>
                    <td>:</td>
                    <td><?= $datauser['user_nik'] ?></td>
                </tr>
                <tr>
                    <td>Nama</td>
                    <td>:</td>
                    <td><?= $datauser['user_nama'] ?></td>
                </tr>
                <tr>
                    <td>Tempat/Tanggal Lahir</td>
                    <td>:</td>
                    <td><?= $datauser['user_tempat_lahir'] ?>, <?= $datauser['user_tgl_lahir'] ?></td>
                </tr>
                <tr>
                    <td>RT</td>
                    <td>:</td>
                    <td><?= $datauser['rt'] ?></td>
                </tr>
                <tr>
                    <td>Agama</td>
                    <td>:</td>
                    <td><?= $datauser['user_agama'] ?></td>
                </tr>
                <tr>
                    <td>Jenis Kelamin</td>
                    <td>:</td>
                    <td><?= $datauser['user_jk'] ?></td>
                </tr>
                <tr>
                    <td>Warga Negara</td>
                    <td>:</td>
                    <td><?= $datauser['user_wn'] ?></td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td>:</td>
                    <td><?= $datauser['user_alamat'] ?></td>
                </tr>
                <tr>
                    <td>Status</td>
                    <td>:</td>
                    <td><?= $datauser['user_status'] ?></td>
                </tr>
                <tr>
                    <td>Status Tinggal</td>
                    <td>:</td>
                    <td><?= $datauser['user_status_tinggal'] ?></td>
                </tr>
                <tr>
                    <td>Pekerjaan</td>
                    <td>:</td>
                    <td><?= $datauser['user_pekerjaan'] ?></td>
                </tr>
                <tr>
                    <td>Status Kawin</td>
                    <td>:</td>
                    <td><?= $datauser['user_status_kawin'] ?></td>
                </tr>
                <tr>
                    <td>Jenjang Pendidikan</td>
                    <td>:</td>
                    <td><?= $datauser['user_jenjang_pendidikan'] ?></td>
                </tr>
                <tr>
                    <td>E-Mail</td>
                    <td>:</td>
                    <td><?= $datauser['user_email'] ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>