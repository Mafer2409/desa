<?php
$status = $_GET['status'];
$iduser = $_GET['iduser'];

$sql = mysqli_query($con, "UPDATE kelahiran SET kelahiran_notif = '1' WHERE kelahiran_user = '$iduser' AND kelahiran_status = '$status'");

if ($sql) {
    echo "<script>window.location='?page=home';</script>";
} else {
    echo "<script>window.location='?page=home';</script>";
}

echo $status;
