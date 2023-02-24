<?php
$id = $_GET['id'];
$sqlberita = mysqli_query($con, "SELECT * FROM berita WHERE berita_id = '$id'");
$databerita = mysqli_fetch_assoc($sqlberita);

$gbr = $databerita['berita_gambar'];
$filelama = "../assets/img/berita/" . $gbr;

if (file_exists($filelama)) {
    unlink($filelama);
}

$sql = mysqli_query($con, "DELETE FROM berita WHERE berita_id = '$id'");

if ($sql) {
    echo "<script>alert('Data berhasil dihapus !');window.location='?page=berita';</script>";
} else {
    echo "<script>alert('Data gagal dihapus !');window.location='?page=berita';</script>";
}
