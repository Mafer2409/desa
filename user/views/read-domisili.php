<?php
$status = $_GET['status'];
$iduser = $_GET['iduser'];

$sql = mysqli_query($con, "UPDATE domisili SET domisili_notif = '1' WHERE domisili_user = '$iduser' AND domisili_status = '$status'");

if ($sql) {
    echo "<script>window.location='?page=home';</script>";
} else {
    echo "<script>window.location='?page=home';</script>";
}

echo $status;
