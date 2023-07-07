<?php
$status = $_GET['status'];
$iduser = $_GET['iduser'];

$sql = mysqli_query($con, "UPDATE izinusaha SET izinusaha_notif = '1' WHERE izinusaha_user = '$iduser' AND izinusaha_status = '$status'");

if ($sql) {
    echo "<script>window.location='?page=home';</script>";
} else {
    echo "<script>window.location='?page=home';</script>";
}

echo $status;
