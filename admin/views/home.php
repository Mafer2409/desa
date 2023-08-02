<?php
$tahun_now = date('Y');

$sqlkelahiran = mysqli_query($con, "SELECT * FROM kelahiran WHERE kelahiran_status = 'Telah Dikonfirmasi RT'");
$sqlkematian = mysqli_query($con, "SELECT * FROM kematian WHERE kematian_status = 'Telah Dikonfirmasi RT'");
$sqladministrasi = mysqli_query($con, "SELECT * FROM administrasi WHERE administrasi_status = 'Telah Dikonfirmasi RT'");
$sqlizinusaha = mysqli_query($con, "SELECT * FROM izinusaha WHERE izinusaha_status = 'Telah Dikonfirmasi RT'");
$sqldomisili = mysqli_query($con, "SELECT * FROM domisili WHERE domisili_status = 'Telah Dikonfirmasi RT'");

$num_kelahiran = mysqli_num_rows($sqlkelahiran);
$num_kematian = mysqli_num_rows($sqlkematian);
$num_administrasi = mysqli_num_rows($sqladministrasi);
$num_izinusaha = mysqli_num_rows($sqlizinusaha);
$num_domisili = mysqli_num_rows($sqldomisili);
?>

<div class="content-wrapper">
    <div class="row">
        <div class="col-xl-12 col-lg-12">
            <div class="card shadow mb-4">
                <form action="" method="post">
                    <div class="row mt-4 mb-4 ml-4 mr-4">
                        <div class="col-lg-10">
                            <select name="tahunnow" class="form-control" required>
                                <option value="<?= date('Y') ?>" selected><?= date('Y') ?></option>
                                <option value="2019">2019</option>
                                <option value="2020">2020</option>
                                <option value="2021">2021</option>
                                <option value="2022">2022</option>
                                <option value="2023">2023</option>
                                <option value="2024">2024</option>
                                <option value="2025">2025</option>
                                <option value="2026">2026</option>
                                <option value="2027">2027</option>
                                <option value="2028">2028</option>
                                <option value="2029">2029</option>
                                <option value="2030">2030</option>
                            </select>
                        </div>
                        <div class="col-lg-2">
                            <input type="submit" name="cari" class="btn btn-primary" value="Cari">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php
    if (@$_POST['cari']) {
        $tahunnow = $_POST['tahunnow'];

        echo "<script>window.location='?page=cari-home&tahunnow=$tahunnow';</script>";
    }
    ?>
    <div class="col-xl-12 col-lg-12">
        <!-- ALERT KELAHIRAN -->
        <?php
        if ($num_kelahiran > 0) {
            $datakelahiran = mysqli_fetch_assoc($sqlkelahiran);
        ?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong><?= $num_kelahiran ?> Pemberitahuan!!</strong> Status pengajuan keterangan kelahiran : <strong><?= $datakelahiran['kelahiran_status'] ?></strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php
        }
        ?>
        <!-- ALERT KELAHIRAN -->
        <!-- ALERT KEMATIAN -->
        <?php
        if ($num_kematian > 0) {
            $datakematian = mysqli_fetch_assoc($sqlkematian);
        ?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong><?= $num_kematian ?> Pemberitahuan!!</strong> Status pengajuan kematian: <strong><?= $datakematian['kematian_status'] ?></strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php
        }
        ?>
        <!-- ALERT KEMATIAN -->
        <!-- ALERT ADMINISTRASI -->
        <?php
        if ($num_administrasi > 0) {
            $dataadministrasi = mysqli_fetch_assoc($sqladministrasi);
        ?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong><?= $num_administrasi ?> Pemberitahuan!!</strong> Status pengajuan pindah penduduk: <strong><?= $dataadministrasi['administrasi_status'] ?></strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php
        }
        ?>
        <!-- ALERT ADMINISTRASI -->
        <!-- ALERT IZIN USAHA -->
        <?php
        if ($num_izinusaha > 0) {
            $dataizinusaha = mysqli_fetch_assoc($sqlizinusaha);
        ?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong><?= $num_izinusaha ?> Pemberitahuan!!</strong> Status pengajuan izin usaha: <strong><?= $dataizinusaha['izinusaha_status'] ?></strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php
        }
        ?>
        <!-- ALERT IZIN USAHA -->
        <!-- ALERT DOMISILI -->
        <?php
        if ($num_domisili > 0) {
            $datadomisili = mysqli_fetch_assoc($sqldomisili);
        ?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong><?= $num_domisili ?> Pemberitahuan!!</strong> Status pengajuan domisili: <strong><?= $datadomisili['domisili_status'] ?></strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php
        }
        ?>
        <!-- ALERT DOMISILI -->
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Grafik Kependudukan Tahun <?= $tahun_now ?></h6>
                <div class="dropdown no-arrow">
                </div>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <canvas id="kependudukan"></canvas>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="col-xl-6 col-lg-6">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Grafik Kelahiran</h6>
                        <div class="dropdown no-arrow">
                        </div>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <canvas id="kelahiran"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Grafik Kematian</h6>
                        <div class="dropdown no-arrow">
                        </div>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <canvas id="kematian"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12 grid-margin stretch-card">
            <div class="col-xl-6 col-lg-6">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Grafik Pindah Masuk</h6>
                        <div class="dropdown no-arrow">
                        </div>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <canvas id="pindahmasuk"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Grafik Pindah Keluar</h6>
                        <div class="dropdown no-arrow">
                        </div>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <canvas id="pindahkeluar"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12 grid-margin stretch-card">
            <div class="col-xl-6 col-lg-6">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Grafik Izin Usaha</h6>
                        <div class="dropdown no-arrow">
                        </div>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <canvas id="izinusaha"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Grafik Domisili</h6>
                        <div class="dropdown no-arrow">
                        </div>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <canvas id="domisili"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




<script>
    var ctx = document.getElementById("kependudukan").getContext('2d');
    var kependudukan = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ["Kelahiran", "Kematian", "Pindah (Keluar)", "Pindah (Masuk)", "Izin usaha", "Domisili", "Penduduk Tetap", "Penduduk Tidak Tetap"],
            datasets: [{
                label: '',
                data: [
                    <?php
                    $kep_kelahiran = mysqli_query($con, "SELECT * FROM kelahiran WHERE YEAR(kelahiran_tanggal) = '$tahun_now'");
                    echo mysqli_num_rows($kep_kelahiran);
                    ?>,
                    <?php
                    $kep_kematian = mysqli_query($con, "SELECT * FROM kematian WHERE YEAR(kematian_tanggal_meninggal) = '$tahun_now'");
                    echo mysqli_num_rows($kep_kematian);
                    ?>,
                    <?php
                    $kep_keluar = mysqli_query($con, "SELECT * FROM administrasi WHERE administrasi_ket = 'Keluar' AND YEAR(administrasi_tanggal_verifikasi) = '$tahun_now'");
                    echo mysqli_num_rows($kep_keluar);
                    ?>,
                    <?php
                    $kep_masuk = mysqli_query($con, "SELECT * FROM administrasi WHERE administrasi_ket = 'Masuk' AND YEAR(administrasi_tanggal_verifikasi) = '$tahun_now'");
                    echo mysqli_num_rows($kep_masuk);
                    ?>,
                    <?php
                    $kep_izinusaha = mysqli_query($con, "SELECT * FROM izinusaha WHERE YEAR(izinusaha_tanggal_verifikasi) = '$tahun_now'");
                    echo mysqli_num_rows($kep_izinusaha);
                    ?>,
                    <?php
                    $kep_domisili = mysqli_query($con, "SELECT * FROM domisili WHERE YEAR(domisili_tanggal_verifikasi) = '$tahun_now'");
                    echo mysqli_num_rows($kep_domisili);
                    ?>,
                    <?php
                    $kep_tetap = mysqli_query($con, "SELECT * FROM user WHERE user_status_tinggal = 'Tetap'");
                    echo mysqli_num_rows($kep_tetap);
                    ?>,
                    <?php
                    $kep_tidak_tetap = mysqli_query($con, "SELECT * FROM user WHERE user_status_tinggal = 'Tidak Tetap'");
                    echo mysqli_num_rows($kep_tidak_tetap);
                    ?>,
                ],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(45, 115, 12, 0.2)',
                    'rgba(124, 37, 133, 0.2)',
                    'rgba(175, 192, 192, 0.2)',
                    'rgba(75, 192, 152, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                ],
                borderColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(45, 115, 12, 0.2)',
                    'rgba(124, 37, 133, 0.2)',
                    'rgba(175, 192, 192, 0.2)',
                    'rgba(75, 192, 152, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
</script>

















<?php
$bulan = '';
$kelahiran = mysqli_query($con, "SELECT MONTH(kelahiran_tanggal) as bulan FROM kelahiran WHERE YEAR(kelahiran_tanggal) = '$tahun_now' GROUP BY MONTH(kelahiran_tanggal)");
while ($rowkelahiran = mysqli_fetch_array($kelahiran)) {

    if ($rowkelahiran['bulan'] == '01') {
        $bulan = 'Jan';
    } elseif ($rowkelahiran['bulan'] == '02') {
        $bulan = 'Feb';
    } elseif ($rowkelahiran['bulan'] == '03') {
        $bulan = 'Mar';
    } elseif ($rowkelahiran['bulan'] == '04') {
        $bulan = 'Apr';
    } elseif ($rowkelahiran['bulan'] == '05') {
        $bulan = 'Mei';
    } elseif ($rowkelahiran['bulan'] == '06') {
        $bulan = 'Jun';
    } elseif ($rowkelahiran['bulan'] == '07') {
        $bulan = 'Jul';
    } elseif ($rowkelahiran['bulan'] == '08') {
        $bulan = 'Agu';
    } elseif ($rowkelahiran['bulan'] == '09') {
        $bulan = 'Sep';
    } elseif ($rowkelahiran['bulan'] == '10') {
        $bulan = 'Okt';
    } elseif ($rowkelahiran['bulan'] == '11') {
        $bulan = 'Nov';
    } else {
        $bulan = 'Des';
    }

    $nama_bulan_kelahiran[] = $bulan;

    $kelahiran2 = mysqli_query($con, "SELECT * FROM kelahiran WHERE MONTH(kelahiran_tanggal) = '" . $rowkelahiran['bulan'] . "' AND YEAR(kelahiran_tanggal) = '$tahun_now'");
    $jumlah[] = mysqli_num_rows($kelahiran2);
}
?>

<script>
    var ctx = document.getElementById("kelahiran").getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: <?php echo json_encode($nama_bulan_kelahiran); ?>,
            datasets: [{
                label: 'Grafik Kelahiran Per-Bulan <?= $tahun_now ?>',
                data: <?php echo json_encode($jumlah); ?>,
                backgroundColor: ["white"],
                borderColor: 'red',
                borderWidth: 4
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
</script>


<?php
$kematian = mysqli_query($con, "SELECT MONTH(kematian_tanggal_meninggal) as bulan FROM kematian WHERE YEAR(kematian_tanggal_meninggal) = '$tahun_now' GROUP BY MONTH(kematian_tanggal_meninggal)");
while ($rowkematian = mysqli_fetch_array($kematian)) {
    // $nama_bulan_kematian[] = $rowkematian['bulan'];

    if ($rowkematian['bulan'] == '01') {
        $bulan = 'Jan';
    } elseif ($rowkematian['bulan'] == '02') {
        $bulan = 'Feb';
    } elseif ($rowkematian['bulan'] == '03') {
        $bulan = 'Mar';
    } elseif ($rowkematian['bulan'] == '04') {
        $bulan = 'Apr';
    } elseif ($rowkematian['bulan'] == '05') {
        $bulan = 'Mei';
    } elseif ($rowkematian['bulan'] == '06') {
        $bulan = 'Jun';
    } elseif ($rowkematian['bulan'] == '07') {
        $bulan = 'Jul';
    } elseif ($rowkematian['bulan'] == '08') {
        $bulan = 'Agu';
    } elseif ($rowkematian['bulan'] == '09') {
        $bulan = 'Sep';
    } elseif ($rowkematian['bulan'] == '10') {
        $bulan = 'Okt';
    } elseif ($rowkematian['bulan'] == '11') {
        $bulan = 'Nov';
    } else {
        $bulan = 'Des';
    }

    $nama_bulan_kematian[] = $bulan;

    $kematian2 = mysqli_query($con, "SELECT * FROM kematian WHERE MONTH(kematian_tanggal_meninggal) = '" . $rowkematian['bulan'] . "' AND YEAR(kematian_tanggal_meninggal) = '$tahun_now'");
    $jumlah_kematian[] = mysqli_num_rows($kematian2);
}
?>

<script>
    var ctx = document.getElementById("kematian").getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: <?php echo json_encode($nama_bulan_kematian); ?>,
            datasets: [{
                label: 'Grafik kematian Per-Bulan <?= $tahun_now ?>',
                data: <?php echo json_encode($jumlah_kematian); ?>,
                backgroundColor: ["white"],
                borderColor: 'black',
                borderWidth: 4
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
</script>






<?php
$administrasi_masuk = mysqli_query($con, "SELECT MONTH(administrasi_tanggal_verifikasi) as bulan FROM administrasi WHERE YEAR(administrasi_tanggal_verifikasi) = '$tahun_now' AND administrasi_ket = 'Masuk' AND administrasi_status = 'Selesai' GROUP BY MONTH(administrasi_tanggal_verifikasi)");
while ($rowadministrasi_masuk = mysqli_fetch_array($administrasi_masuk)) {
    // $nama_bulan_masuk[] = $rowadministrasi_masuk['bulan'];

    if ($rowadministrasi_masuk['bulan'] == '01') {
        $bulan = 'Jan';
    } elseif ($rowadministrasi_masuk['bulan'] == '02') {
        $bulan = 'Feb';
    } elseif ($rowadministrasi_masuk['bulan'] == '03') {
        $bulan = 'Mar';
    } elseif ($rowadministrasi_masuk['bulan'] == '04') {
        $bulan = 'Apr';
    } elseif ($rowadministrasi_masuk['bulan'] == '05') {
        $bulan = 'Mei';
    } elseif ($rowadministrasi_masuk['bulan'] == '06') {
        $bulan = 'Jun';
    } elseif ($rowadministrasi_masuk['bulan'] == '07') {
        $bulan = 'Jul';
    } elseif ($rowadministrasi_masuk['bulan'] == '08') {
        $bulan = 'Agu';
    } elseif ($rowadministrasi_masuk['bulan'] == '09') {
        $bulan = 'Sep';
    } elseif ($rowadministrasi_masuk['bulan'] == '10') {
        $bulan = 'Okt';
    } elseif ($rowadministrasi_masuk['bulan'] == '11') {
        $bulan = 'Nov';
    } else {
        $bulan = 'Des';
    }

    $nama_bulan_masuk[] = $bulan;

    $administrasi_masuk2 = mysqli_query($con, "SELECT * FROM administrasi WHERE MONTH(administrasi_tanggal_verifikasi) = '" . $rowadministrasi_masuk['bulan'] . "' AND YEAR(administrasi_tanggal_verifikasi) = '$tahun_now' AND administrasi_status = 'Selesai' AND administrasi_ket = 'Masuk'");
    $jumlah_masuk[] = mysqli_num_rows($administrasi_masuk2);
}
?>

<script>
    var ctx = document.getElementById("pindahmasuk").getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: <?php echo json_encode($nama_bulan_masuk); ?>,
            datasets: [{
                label: 'Grafik pindah (masuk) Per-Bulan <?= $tahun_now ?>',
                data: <?php echo json_encode($jumlah_masuk); ?>,
                backgroundColor: ["white"],
                borderColor: 'green',
                borderWidth: 4
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
</script>


<?php
$administrasi_keluar = mysqli_query($con, "SELECT MONTH(administrasi_tanggal_verifikasi) as bulan FROM administrasi WHERE YEAR(administrasi_tanggal_verifikasi) = '$tahun_now' AND administrasi_ket = 'Keluar' AND administrasi_status = 'Selesai' GROUP BY MONTH(administrasi_tanggal_verifikasi)");
while ($rowadministrasi_keluar = mysqli_fetch_array($administrasi_keluar)) {
    // $nama_bulan_keluar[] = $rowadministrasi_keluar['bulan'];

    if ($rowadministrasi_keluar['bulan'] == '01') {
        $bulan = 'Jan';
    } elseif ($rowadministrasi_keluar['bulan'] == '02') {
        $bulan = 'Feb';
    } elseif ($rowadministrasi_keluar['bulan'] == '03') {
        $bulan = 'Mar';
    } elseif ($rowadministrasi_keluar['bulan'] == '04') {
        $bulan = 'Apr';
    } elseif ($rowadministrasi_keluar['bulan'] == '05') {
        $bulan = 'Mei';
    } elseif ($rowadministrasi_keluar['bulan'] == '06') {
        $bulan = 'Jun';
    } elseif ($rowadministrasi_keluar['bulan'] == '07') {
        $bulan = 'Jul';
    } elseif ($rowadministrasi_keluar['bulan'] == '08') {
        $bulan = 'Agu';
    } elseif ($rowadministrasi_keluar['bulan'] == '09') {
        $bulan = 'Sep';
    } elseif ($rowadministrasi_keluar['bulan'] == '10') {
        $bulan = 'Okt';
    } elseif ($rowadministrasi_keluar['bulan'] == '11') {
        $bulan = 'Nov';
    } else {
        $bulan = 'Des';
    }

    $nama_bulan_keluar[] = $bulan;

    $administrasi_keluar2 = mysqli_query($con, "SELECT * FROM administrasi WHERE MONTH(administrasi_tanggal_verifikasi) = '" . $rowadministrasi_keluar['bulan'] . "' AND YEAR(administrasi_tanggal_verifikasi) = '$tahun_now' AND administrasi_status = 'Selesai' AND administrasi_ket = 'Keluar'");
    $jumlah_keluar[] = mysqli_num_rows($administrasi_keluar2);
}
?>

<script>
    var ctx = document.getElementById("pindahkeluar").getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: <?php echo json_encode($nama_bulan_keluar); ?>,
            datasets: [{
                label: 'Grafik pindah (keluar) Per-Bulan <?= $tahun_now ?>',
                data: <?php echo json_encode($jumlah_keluar); ?>,
                backgroundColor: ["white"],
                borderColor: 'blue',
                borderWidth: 4
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
</script>



<?php
$izinusaha = mysqli_query($con, "SELECT MONTH(izinusaha_tanggal_verifikasi) as bulan FROM izinusaha WHERE YEAR(izinusaha_tanggal_verifikasi) = '$tahun_now' AND izinusaha_status = 'Selesai' GROUP BY MONTH(izinusaha_tanggal_verifikasi)");
while ($rowizinusaha = mysqli_fetch_array($izinusaha)) {
    // $nama_bulan[] = $rowizinusaha['bulan'];

    if ($rowizinusaha['bulan'] == '01') {
        $bulan = 'Jan';
    } elseif ($rowizinusaha['bulan'] == '02') {
        $bulan = 'Feb';
    } elseif ($rowizinusaha['bulan'] == '03') {
        $bulan = 'Mar';
    } elseif ($rowizinusaha['bulan'] == '04') {
        $bulan = 'Apr';
    } elseif ($rowizinusaha['bulan'] == '05') {
        $bulan = 'Mei';
    } elseif ($rowizinusaha['bulan'] == '06') {
        $bulan = 'Jun';
    } elseif ($rowizinusaha['bulan'] == '07') {
        $bulan = 'Jul';
    } elseif ($rowizinusaha['bulan'] == '08') {
        $bulan = 'Agu';
    } elseif ($rowizinusaha['bulan'] == '09') {
        $bulan = 'Sep';
    } elseif ($rowizinusaha['bulan'] == '10') {
        $bulan = 'Okt';
    } elseif ($rowizinusaha['bulan'] == '11') {
        $bulan = 'Nov';
    } else {
        $bulan = 'Des';
    }

    $nama_bulan_izinusaha[] = $bulan;

    $izinusaha2 = mysqli_query($con, "SELECT * FROM izinusaha WHERE MONTH(izinusaha_tanggal_verifikasi) = '" . $rowizinusaha['bulan'] . "' AND YEAR(izinusaha_tanggal_verifikasi) = '$tahun_now' AND izinusaha_status = 'Selesai'");
    $jumlah_izinusaha[] = mysqli_num_rows($izinusaha2);
}
?>

<script>
    var ctx = document.getElementById("izinusaha").getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: <?php echo json_encode($nama_bulan_izinusaha); ?>,
            datasets: [{
                label: 'Grafik izin usaha Per-Bulan <?= $tahun_now ?>',
                data: <?php echo json_encode($jumlah_izinusaha); ?>,
                backgroundColor: ["white"],
                borderColor: 'yellow',
                borderWidth: 4
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
</script>



<?php
$domisili = mysqli_query($con, "SELECT MONTH(domisili_tanggal_verifikasi) as bulan FROM domisili WHERE YEAR(domisili_tanggal_verifikasi) = '$tahun_now' AND domisili_status = 'Selesai' GROUP BY MONTH(domisili_tanggal_verifikasi)");
while ($rowdomisili = mysqli_fetch_array($domisili)) {
    // $nama_bulan[] = $rowdomisili['bulan'];

    if ($rowdomisili['bulan'] == '01') {
        $bulan = 'Jan';
    } elseif ($rowdomisili['bulan'] == '02') {
        $bulan = 'Feb';
    } elseif ($rowdomisili['bulan'] == '03') {
        $bulan = 'Mar';
    } elseif ($rowdomisili['bulan'] == '04') {
        $bulan = 'Apr';
    } elseif ($rowdomisili['bulan'] == '05') {
        $bulan = 'Mei';
    } elseif ($rowdomisili['bulan'] == '06') {
        $bulan = 'Jun';
    } elseif ($rowdomisili['bulan'] == '07') {
        $bulan = 'Jul';
    } elseif ($rowdomisili['bulan'] == '08') {
        $bulan = 'Agu';
    } elseif ($rowdomisili['bulan'] == '09') {
        $bulan = 'Sep';
    } elseif ($rowdomisili['bulan'] == '10') {
        $bulan = 'Okt';
    } elseif ($rowdomisili['bulan'] == '11') {
        $bulan = 'Nov';
    } else {
        $bulan = 'Des';
    }

    $nama_bulan_domisili[] = $bulan;

    $domisili2 = mysqli_query($con, "SELECT * FROM domisili WHERE MONTH(domisili_tanggal_verifikasi) = '" . $rowdomisili['bulan'] . "' AND YEAR(domisili_tanggal_verifikasi) = '$tahun_now' AND domisili_status = 'Selesai'");
    $jumlah_domisili[] = mysqli_num_rows($domisili2);
}
?>

<script>
    var ctx = document.getElementById("domisili").getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: <?php echo json_encode($nama_bulan_domisili); ?>,
            datasets: [{
                label: 'Grafik domisili Per-Bulan <?= $tahun_now ?>',
                data: <?php echo json_encode($jumlah_domisili); ?>,
                backgroundColor: ["white"],
                borderColor: 'purple',
                borderWidth: 4
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
</script>