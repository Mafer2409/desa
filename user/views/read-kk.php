<?php
$status = $_GET['status'];
$iduser = $_GET['iduser'];

$sql = mysqli_query($con, "UPDATE kk SET kk_notif = '1' WHERE kk_user = '$iduser' AND kk_status = '$status'");

if ($sql) {
    echo "<script>window.location='?page=home';</script>";
} else {
    echo "<script>window.location='?page=home';</script>";
}

echo $status;
