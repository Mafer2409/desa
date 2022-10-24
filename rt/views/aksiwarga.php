<?php
$id = $_GET['id'];
$aksi = $_GET['aksi'];

if ($aksi == 'Aktif') {
    $sql = mysqli_query($con, "UPDATE user SET user_status = 'Aktif' WHERE user_id = '$id'");
    echo "<script>alert('Berhasil !');window.location='?page=warga';</script>";
} elseif ($aksi == 'Ditolak') {
    $sql = mysqli_query($con, "UPDATE user SET user_status = 'Ditolak' WHERE user_id = '$id'");
    echo "<script>alert('Berhasil !');window.location='?page=warga';</script>";
} else {
    $sql = mysqli_query($con, "UPDATE user SET user_status = 'Non-Aktif' WHERE user_id = '$id'");
    echo "<script>alert('Berhasil !');window.location='?page=warga';</script>";
}
