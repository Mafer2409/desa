<?php
$id = $_GET['id'];
$aksi = $_GET['aksi'];
$ktp_tanggal_konfirmasi = date('Y-m-d');

if ($aksi == 'Konfirmasi') {
    $sql = mysqli_query($con, "UPDATE ktp SET ktp_status = 'Telah Dikonfirmasi RT', ktp_notif = '0', ktp_tanggal_verifikasi = '$ktp_tanggal_konfirmasi' WHERE ktp_id = '$id'");
    echo "<script>alert('Berhasil !');window.location='?page=ktp';</script>";
} elseif ($aksi == 'Ditolak') {
    $sql = mysqli_query($con, "UPDATE ktp SET ktp_status = 'Ditolak RT', ktp_notif = '0' WHERE ktp_id = '$id'");
    echo "<script>alert('Berhasil !');window.location='?page=ktp';</script>";
} else {
    $sql = mysqli_query($con, "UPDATE ktp SET ktp_status = 'Non-Aktif', ktp_notif = '0' WHERE user_id = '$id'");
    echo "<script>alert('Berhasil !');window.location='?page=ktp';</script>";
}
