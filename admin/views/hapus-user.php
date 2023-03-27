<?php
$id = $_GET['id'];
$sqluser = mysqli_query($con, "DELETE FROM user WHERE user_id = '$id'");

if ($sqluser) {
    echo "<script>alert('Hapus data Berhasil !');window.location='?page=user';</script>";
} else {
    echo "<script>alert('Hapus data Gagal ! Ulangi Hapus data !');window.location='?page=user';</script>";
}
