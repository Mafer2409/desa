<?php
$id = $_GET['id'];
$aksi = $_GET['aksi'];
$administrasi_tanggal_konfirmasi = date('Y-m-d');

if ($aksi == 'Konfirmasi') {
    $sql = mysqli_query($con, "UPDATE administrasi SET administrasi_status = 'Telah Dikonfirmasi RT', administrasi_notif = '0', administrasi_tanggal_verifikasi = '$administrasi_tanggal_konfirmasi' WHERE administrasi_id = '$id'");
    echo "<script>alert('Berhasil !');window.location='?page=pindah';</script>";
} elseif ($aksi == 'Ditolak') {
    $sql = mysqli_query($con, "UPDATE administrasi SET administrasi_status = 'Ditolak RT', administrasi_notif = '0' WHERE administrasi_id = '$id'");
    echo "<script>alert('Berhasil !');window.location='?page=pindah';</script>";
} else {
    $sql = mysqli_query($con, "UPDATE administrasi SET administrasi_status = 'Non-Aktif', administrasi_notif = '0' WHERE user_id = '$id'");
    echo "<script>alert('Berhasil !');window.location='?page=pindah';</script>";
}
