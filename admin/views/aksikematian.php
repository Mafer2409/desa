<?php
$id = $_GET['id'];
$aksi = $_GET['aksi'];
$kematian_tanggal_konfirmasi = date('Y-m-d');

if ($aksi == 'Konfirmasi') {
    $sql = mysqli_query($con, "UPDATE kematian SET kematian_status = 'Selesai', kematian_tanggal_verifikasi = '$kematian_tanggal_konfirmasi' WHERE kematian_id = '$id'");
    echo "<script>alert('Berhasil !');window.location='?page=kematian';</script>";
} elseif ($aksi == 'Ditolak') {
    $sql = mysqli_query($con, "UPDATE kematian SET kematian_status = 'Ditolak Admin' WHERE kematian_id = '$id'");
    echo "<script>alert('Berhasil !');window.location='?page=kematian';</script>";
} else {
    $sql = mysqli_query($con, "UPDATE kematian SET kematian_status = 'Non-Aktif' WHERE user_id = '$id'");
    echo "<script>alert('Berhasil !');window.location='?page=kematian';</script>";
}
