<div class="content-wrapper">
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
    </div>
</div>


<?php
$tahun_now = date('Y');
$kelahiran = mysqli_query($con, "SELECT MONTH(kelahiran_tanggal) as bulan FROM kelahiran WHERE YEAR(kelahiran_tanggal) = '$tahun_now' GROUP BY MONTH(kelahiran_tanggal)");
while ($rowkelahiran = mysqli_fetch_array($kelahiran)) {
    $nama_bulan[] = $rowkelahiran['bulan'];

    $kelahiran2 = mysqli_query($con, "SELECT * FROM kelahiran WHERE MONTH(kelahiran_tanggal) = '" . $rowkelahiran['bulan'] . "' AND YEAR(kelahiran_tanggal) = '$tahun_now'");
    $jumlah[] = mysqli_num_rows($kelahiran2);
}
?>

<script>
    var ctx = document.getElementById("kelahiran").getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: <?php echo json_encode($nama_bulan); ?>,
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
    $nama_bulan_kematian[] = $rowkematian['bulan'];

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
    $nama_bulan_masuk[] = $rowadministrasi_masuk['bulan'];

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
    $nama_bulan_keluar[] = $rowadministrasi_keluar['bulan'];

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