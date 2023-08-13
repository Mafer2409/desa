<?php
$id = $_GET['id'];
$aksi = $_GET['aksi'];
$kk_tanggal_konfirmasi = date('Y-m-d');

if ($aksi == 'Konfirmasi') {
    $sql = mysqli_query($con, "UPDATE kk SET kk_status = 'Telah Dikonfirmasi RT', kk_notif = '0', kk_tanggal_verifikasi = '$kk_tanggal_konfirmasi' WHERE kk_id = '$id'");
    echo "<script>alert('Berhasil !');window.location='?page=kk';</script>";
} elseif ($aksi == 'Ditolak') {
    $sql = mysqli_query($con, "UPDATE kk SET kk_status = 'Ditolak RT', kk_notif = '0' WHERE kk_id = '$id'");
    echo "<script>alert('Berhasil !');window.location='?page=kk';</script>";
} else {
    $sql = mysqli_query($con, "UPDATE kk SET kk_status = 'Non-Aktif', kk_notif = '0' WHERE user_id = '$id'");
    echo "<script>alert('Berhasil !');window.location='?page=kk';</script>";
}
