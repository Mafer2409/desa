<?php
$id = $_GET['id'];
$aksi = $_GET['aksi'];
$kelahiran_tanggal_konfirmasi = date('Y-m-d');

if ($aksi == 'Konfirmasi') {
    $sql = mysqli_query($con, "UPDATE kelahiran SET kelahiran_status = 'Telah Dikonfirmasi RT', kelahiran_notif = '0', kelahiran_tanggal_verifikasi = '$kelahiran_tanggal_konfirmasi' WHERE kelahiran_id = '$id'");
    echo "<script>alert('Berhasil !');window.location='?page=kelahiran';</script>";
} elseif ($aksi == 'Ditolak') {
    $sql = mysqli_query($con, "UPDATE kelahiran SET kelahiran_status = 'Ditolak RT', kelahiran_notif = '0' WHERE kelahiran_id = '$id'");
    echo "<script>alert('Berhasil !');window.location='?page=kelahiran';</script>";
} else {
    $sql = mysqli_query($con, "UPDATE kelahiran SET kelahiran_status = 'Non-Aktif', kelahiran_notif = '0' WHERE user_id = '$id'");
    echo "<script>alert('Berhasil !');window.location='?page=kelahiran';</script>";
}
