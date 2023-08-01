<?php
$id = $_GET['id'];
$aksi = $_GET['aksi'];
$domisili_tanggal_konfirmasi = date('Y-m-d');

if ($aksi == 'Konfirmasi') {
    $sql = mysqli_query($con, "UPDATE domisili SET domisili_status = 'Telah Dikonfirmasi RT', domisili_notif = '0', domisili_tanggal_verifikasi = '$domisili_tanggal_konfirmasi' WHERE domisili_id = '$id'");
    echo "<script>alert('Berhasil !');window.location='?page=domisili';</script>";
} elseif ($aksi == 'Ditolak') {
    $sql = mysqli_query($con, "UPDATE domisili SET domisili_status = 'Ditolak RT', domisili_notif = '0' WHERE domisili_id = '$id'");
    echo "<script>alert('Berhasil !');window.location='?page=domisili';</script>";
} else {
    $sql = mysqli_query($con, "UPDATE domisili SET domisili_status = 'Non-Aktif', domisili_notif = '0' WHERE user_id = '$id'");
    echo "<script>alert('Berhasil !');window.location='?page=domisili';</script>";
}
