<?php
include 'system/koneksi.php';;
$nikuser = $_POST['nikuser'];

$sql = mysqli_query($con, "SELECT * FROM user WHERE user_nik = '$nikuser'");

$out = '';

if (mysqli_num_rows($sql) > 0) {
    $datauser = mysqli_fetch_assoc($sql);
    $namauser = $datauser['user_nama'];
    $out .= '<h4 class="text-light">Selamat, anda telah terdaftar!</h4>';
    $out .= '<div class="form-group"><input type="email" name="user_email" class="form-control form-control-lg" placeholder="E-Mail" required></div>';
    $out .= '<div class="form-group"><input type="password" name="user_password" class="form-control form-control-lg" placeholder="Password" required></div>';
    $out .= '<div class="mt-3"><input type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" name="daftar" value="Daftar"></div>';
} else {
    $out .= '<h4 class="text-light">Anda belum terdaftar!</h4>';
}
// while ($data = mysqli_fetch_assoc($sql)) {
//     $out .= '<option value="' . $data['rayon_id'] . '">' . $data['rayon_nama'] . '</option>';
// }

echo $out;
