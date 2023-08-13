<?php
$status = $_GET['status'];
$iduser = $_GET['iduser'];

$sql = mysqli_query($con, "UPDATE ktp SET ktp_notif = '1' WHERE ktp_user = '$iduser' AND ktp_status = '$status'");

if ($sql) {
    echo "<script>window.location='?page=home';</script>";
} else {
    echo "<script>window.location='?page=home';</script>";
}

echo $status;
