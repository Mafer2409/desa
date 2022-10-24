<?php
$id = $_GET['id'];

$sql = mysqli_query($con, "DELETE FROM jenis WHERE jenis_id = '$id'");

if ($sql) {
    echo "<script>alert('Hapus Data Berhasil !');window.location='?page=jenis';</script>";
} else {
    echo "<script>alert('Hapus Data Gagal !');window.location='?page=jenis';</script>";
}
