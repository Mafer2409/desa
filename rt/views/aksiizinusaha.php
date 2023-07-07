<?php
$id = $_GET['id'];
$aksi = $_GET['aksi'];
$izinusaha_tanggal_konfirmasi = date('Y-m-d');

if ($aksi == 'Konfirmasi') {
    $sql = mysqli_query($con, "UPDATE izinusaha SET izinusaha_status = 'Telah Dikonfirmasi RT', izinusaha_notif = '0', izinusaha_tanggal_verifikasi = '$izinusaha_tanggal_konfirmasi' WHERE izinusaha_id = '$id'");
    echo "<script>alert('Berhasil !');window.location='?page=izinusaha';</script>";
} elseif ($aksi == 'Ditolak') {
    $sql = mysqli_query($con, "UPDATE izinusaha SET izinusaha_status = 'Ditolak RT', izinusaha_notif = '0' WHERE izinusaha_id = '$id'");
    echo "<script>alert('Berhasil !');window.location='?page=izinusaha';</script>";
} else {
    $sql = mysqli_query($con, "UPDATE izinusaha SET izinusaha_status = 'Non-Aktif', izinusaha_notif = '0' WHERE user_id = '$id'");
    echo "<script>alert('Berhasil !');window.location='?page=izinusaha';</script>";
}
