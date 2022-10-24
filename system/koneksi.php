<?php
date_default_timezone_set('Asia/Ujung_Pandang');
$con = mysqli_connect("localhost", "root", "", "desa");

// Check connection
if (mysqli_connect_errno()) {
    echo "Koneksi database gagal : " . mysqli_connect_error();
}
