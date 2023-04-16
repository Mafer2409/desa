<?php
$id = $_GET['id'];
$sqlpenduduk = mysqli_query($con, "DELETE FROM penduduk WHERE penduduk_id = '$id'");

if ($sqlpenduduk) {
    echo "<script>alert('Hapus data Berhasil !');window.location='?page=penduduk';</script>";
} else {
    echo "<script>alert('Hapus data Gagal ! Ulangi Hapus data !');window.location='?page=penduduk';</script>";
}
