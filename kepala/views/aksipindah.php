<?php
$id = $_GET['id'];
$aksi = $_GET['aksi'];
$ket = $_GET['ket'];
$uid = $_GET['uid'];
$administrasi_tanggal_konfirmasi = date('Y-m-d');

if ($aksi == 'Konfirmasi') {

    if ($ket == 'Keluar') {
        $sqluser = mysqli_query($con, "UPDATE user SET user_status_tinggal = 'Pindah' WHERE user_id = '$uid'");
    }

    $sql = mysqli_query($con, "UPDATE administrasi SET administrasi_status = 'Selesai', administrasi_notif = '0', administrasi_tanggal_verifikasi = '$administrasi_tanggal_konfirmasi' WHERE administrasi_id = '$id'");
    echo "<script>alert('Berhasil !');window.location='?page=pindah';</script>";
} elseif ($aksi == 'Ditolak') {
    $sql = mysqli_query($con, "UPDATE administrasi SET administrasi_status = 'Ditolak Admin', administrasi_notif = '0' WHERE administrasi_id = '$id'");
    echo "<script>alert('Berhasil !');window.location='?page=pindah';</script>";
} else {
    $sql = mysqli_query($con, "UPDATE administrasi SET administrasi_status = 'Non-Aktif', administrasi_notif = '0' WHERE user_id = '$id'");
    echo "<script>alert('Berhasil !');window.location='?page=pindah';</script>";
}
