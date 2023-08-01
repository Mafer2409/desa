<?php
$id = $_GET['id'];
$sql = mysqli_query($con, "DELETE FROM rt WHERE rt_id = '$id'");

if ($sql) {
    echo "<script>alert('Hapus Data Berhasil !');window.location='?page=rt';</script>";
} else {
    echo "<script>alert('Hapus Data Gagal !');window.location='?page=rt';</script>";
}
