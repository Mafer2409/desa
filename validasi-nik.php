<?php
include 'system/koneksi.php';;
$nikuser = $_POST['nikuser'];

$sql = mysqli_query($con, "SELECT * FROM user WHERE user_nik = '$nikuser'");

$out = '';

if (mysqli_num_rows($sql) > 0) {
    $datauser = mysqli_fetch_assoc($sql);
    $namauser = $datauser['user_nama'];
    $idrt = $datauser['user_rt_id'];
    $sqlrt = mysqli_query($con, "SELECT * FROM rt WHERE rt_id = '$idrt'");
    $datart = mysqli_fetch_assoc($sqlrt);

    $out .= '<h4 class="text-light mb-3">Anda telah terdaftar!</h4>';
    $out .= '<p class="text-light">Nama : ' . $datauser['user_nama'] . '</p>';
    $out .= '<p class="text-light">TTL : ' . $datauser['user_tempat_lahir'] . ', ' . date('d-m-Y', strtotime($datauser['user_tgl_lahir'])) . '</p>';
    $out .= '<p class="text-light">RT : ' . $datart['rt'] . '</p>';
    $out .= '<p class="text-light">Agama : ' . $datauser['user_agama'] . '</p>';
    $out .= '<p class="text-light">Jenis kelamin : ' . $datauser['user_jk'] . '</p>';
    $out .= '<p class="text-light">Warga negara : ' . $datauser['user_wn'] . '</p>';
    $out .= '<p class="text-light">Alamat : ' . $datauser['user_alamat'] . '</p>';
    $out .= '<p class="text-light">Status : ' . $datauser['user_status'] . '</p>';
    $out .= '<p class="text-light">Status tinggal : ' . $datauser['user_status_tinggal'] . '</p>';
    $out .= '<p class="text-light">Pekerjaan : ' . $datauser['user_pekerjaan'] . '</p>';
    $out .= '<p class="text-light">Ststus kawin : ' . $datauser['user_status_kawin'] . '</p>';
    $out .= '<p class="text-light">Pendidikan : ' . $datauser['user_jenjang_pendidikan'] . '</p>';

    if ($datauser['user_status'] == 'Belum registrasi') {
        $out .= '<div class="form-group"><input type="hidden" name="user_id" value="' . $datauser['user_id'] . '" required></div>';
        $out .= '<div class="form-group"><input type="email" name="user_email" class="form-control form-control-lg" placeholder="E-Mail" required></div>';
        $out .= '<div class="form-group"><input type="password" name="user_password" class="form-control form-control-lg" placeholder="Password" required></div>';
        $out .= '<div class="mt-3"><input type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" name="daftar" value="Daftar"></div>';
    }
} else {
    $out .= '<h4 class="text-light">Anda belum terdaftar!</h4>';
}
// while ($data = mysqli_fetch_assoc($sql)) {
//     $out .= '<option value="' . $data['rayon_id'] . '">' . $data['rayon_nama'] . '</option>';
// }

echo $out;
