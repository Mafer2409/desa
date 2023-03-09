<?php
ob_start();
require('../../fpdf16/fpdf.php');

include '../../../system/koneksi.php';

$bln = $_GET['bln'];
$thn = $_GET['thn'];
$pin = $_GET['pin'];

$tglnow = date('d - m - Y');

$pdf = new FPDF('L', 'mm', 'A4');
$pdf->AddPage();

// $pdf->Image('logo-paroki.jpeg', 25, 20, 25, 25);
// ======================================================================================

$pdf->Cell(189, 10, '', 0, 1);

$bulan = '';
if ($bln == '01') {
    $bulan = 'Januari';
} elseif ($bln == '02') {
    $bulan = 'Februari';
} elseif ($bln == '03') {
    $bulan = 'Maret';
} elseif ($bln == '04') {
    $bulan = 'April';
} elseif ($bln == '05') {
    $bulan = 'Mei';
} elseif ($bln == '06') {
    $bulan = 'Juni';
} elseif ($bln == '07') {
    $bulan = 'Juli';
} elseif ($bln == '08') {
    $bulan = 'Agustus';
} elseif ($bln == '09') {
    $bulan = 'September';
} elseif ($bln == '10') {
    $bulan = 'Oktober';
} elseif ($bln == '11') {
    $bulan = 'November';
} else {
    $bulan = 'Desember';
}

if ($thn == 0) {
    if ($bln == 0) {
        if ($pin == 0) {
            $pdf->SetFont('Arial', 'B', 18, 'C');
            $pdf->Cell(95, 0);
            $pdf->Cell(45, 10, 'Laporan Data Pindah Penduduk', 0, 1);
        } else {
            $pdf->SetFont('Arial', 'B', 18, 'C');
            $pdf->Cell(95, 0);
            $pdf->Cell(45, 10, 'Laporan Data Pindah Penduduk ' . $pin, 0, 1);
        }
    } else {
        if ($pin == 0) {
            $pdf->SetFont('Arial', 'B', 18, 'C');
            $pdf->Cell(95, 0);
            $pdf->Cell(45, 10, 'Laporan Data Pindah Penduduk ' . $bln, 0, 1);
        } else {
            $pdf->SetFont('Arial', 'B', 18, 'C');
            $pdf->Cell(95, 0);
            $pdf->Cell(45, 10, 'Laporan Data Pindah Penduduk Bulan ' . $bln, 0, 1);
        }
    }
} else {
    if ($bln == 0) {
        if ($pin == 0) {
            $pdf->SetFont('Arial', 'B', 18, 'C');
            $pdf->Cell(95, 0);
            $pdf->Cell(45, 10, 'Laporan Data Pindah Penduduk Tahun ' . $thn, 0, 1);
        } else {
            $pdf->SetFont('Arial', 'B', 18, 'C');
            $pdf->Cell(95, 0);
            $pdf->Cell(45, 10, 'Laporan Data Pindah Penduduk ' . $pin . ' Tahun ' . $thn, 0, 1);
        }
    } else {
        if ($pin == 0) {
            $pdf->SetFont('Arial', 'B', 18, 'C');
            $pdf->Cell(95, 0);
            $pdf->Cell(45, 10, 'Laporan Data Pindah Penduduk Bulan ' . $bln . ' Tahun ' . $thn, 0, 1);
        } else {
            $pdf->SetFont('Arial', 'B', 18, 'C');
            $pdf->Cell(95, 0);
            $pdf->Cell(45, 10, 'Laporan Data Pindah Penduduk ' . $pin . ' Bulan ' . $bln . ' Tahun ' . $thn, 0, 1);
        }
    }
}

$pdf->SetFont('Arial', 'B', 15, 'C');
$pdf->Cell(110, 0);
$pdf->Cell(58, 10, 'Kantor Desa Nelelamadike', 0, 1);

$pdf->SetFont('Arial', 'I', 12, 'C');
$pdf->Cell(80, 0);
$pdf->Cell(30, 10, 'Jl. Trans Waiwerang, Desa Nelelamadike, Kec. Ile Boleng, Flores Timur', 0, 1);

$pdf->Cell(189, 10, '', 0, 1);

$pdf->Line(20, 50, 289, 50);
$pdf->SetLineWidth(0);
$pdf->Line(20, 50, 289, 50);

$pdf->Cell(189, 10, '', 0, 1);

$pdf->SetFont('Arial', '', 8);
$pdf->Cell(1, 5, '', 0, 0);
$pdf->Cell(6, 5, 'No.', 1, 0);
$pdf->Cell(40, 5, 'Nama', 1, 0);
$pdf->Cell(40, 5, 'RW/RT', 1, 0);
$pdf->Cell(40, 5, 'Pindah', 1, 0);
$pdf->Cell(40, 5, 'Dari', 1, 0);
$pdf->Cell(40, 5, 'Tujuan', 1, 0);
$pdf->Cell(30, 5, 'Verifikasi', 1, 1);

$pdf->SetFont('Arial', '', 8);
$no = 1;

if ($thn == 0) {
    if ($bln == 0) {
        if ($pin == 0) {
            $sql = mysqli_query($con, "SELECT * FROM administrasi, user, rt WHERE administrasi.administrasi_rt = rt.rt_id AND administrasi.administrasi_user = user.user_id");
        } else {
            $sql = mysqli_query($con, "SELECT * FROM administrasi, user, rt WHERE administrasi.administrasi_rt = rt.rt_id AND administrasi.administrasi_user = user.user_id AND administrasi.administrasi_ket = '$pin'");
        }
    } else {
        if ($pin == 0) {
            $sql = mysqli_query($con, "SELECT * FROM administrasi, user, rt WHERE administrasi.administrasi_rt = rt.rt_id AND administrasi.administrasi_user = user.user_id AND MONTH(administrasi.administrasi_tanggal_verifikasi) = '$bln'");
        } else {
            $sql = mysqli_query($con, "SELECT * FROM administrasi, user, rt WHERE administrasi.administrasi_rt = rt.rt_id AND administrasi.administrasi_user = user.user_id AND administrasi.administrasi_ket = '$pin' AND MONTH(administrasi.administrasi_tanggal_verifikasi) = '$bln'");
        }
    }
} else {
    if ($bln == 0) {
        if ($pin == 0) {
            $sql = mysqli_query($con, "SELECT * FROM administrasi, user, rt WHERE administrasi.administrasi_rt = rt.rt_id AND administrasi.administrasi_user = user.user_id AND YEAR(administrasi.administrasi_tanggal_verifikasi) = '$thn'");
        } else {
            $sql = mysqli_query($con, "SELECT * FROM administrasi, user, rt WHERE administrasi.administrasi_rt = rt.rt_id AND administrasi.administrasi_user = user.user_id AND administrasi.administrasi_ket = '$pin' AND YEAR(administrasi.administrasi_tanggal_verifikasi) = '$thn'");
        }
    } else {
        if ($pin == 0) {
            $sql = mysqli_query($con, "SELECT * FROM administrasi, user, rt WHERE administrasi.administrasi_rt = rt.rt_id AND administrasi.administrasi_user = user.user_id AND MONTH(administrasi.administrasi_tanggal_verifikasi) = '$bln' AND YEAR(administrasi.administrasi_tanggal_verifikasi) = '$thn'");
        } else {
            $sql = mysqli_query($con, "SELECT * FROM administrasi, user, rt WHERE administrasi.administrasi_rt = rt.rt_id AND administrasi.administrasi_user = user.user_id AND administrasi.administrasi_ket = '$pin' AND MONTH(administrasi.administrasi_tanggal_verifikasi) = '$bln' AND YEAR(administrasi.administrasi_tanggal_verifikasi) = '$thn'");
        }
    }
}

while ($data = mysqli_fetch_assoc($sql)) {
    $pdf->Cell(1, 5, '', 0, 0);
    $pdf->Cell(6, 5, $no++ . '.', 1, 0);
    $pdf->Cell(40, 5, $data['user_nama'], 1, 0);
    $pdf->Cell(40, 5, $data['rt'], 1, 0);
    $pdf->Cell(40, 5, $data['administrasi_ket'], 1, 0);
    $pdf->Cell(40, 5, $data['administrasi_dari'], 1, 0);
    $pdf->Cell(40, 5, $data['administrasi_tujuan'], 1, 0);
    $pdf->Cell(30, 5, $data['administrasi_tanggal_verifikasi'], 1, 1);
}


$sqlkades = mysqli_query($con, "SELECT * FROM kepala_desa LIMIT 1");
$datakades = mysqli_fetch_assoc($sqlkades);

$pdf->SetFont('Times', '', 8);

$pdf->Cell(189, 10, '', 0, 1);
$pdf->Cell(189, 10, '', 0, 1);

$pdf->SetFont('Times', '', 10);
$pdf->Cell(185, 0);
$pdf->Cell(115, 5, 'Desa Nelelamadike, ' . $tglnow, 0, 1);

$pdf->SetFont('Times', '', 10);
$pdf->Cell(190, 0);
$pdf->Cell(110, 5, 'Kepala Desa Nelelamadike', 0, 1);

$pdf->Cell(189, 20, '', 0, 1);
// $pdf->Image('../../img/' . $datakades['kepala_desa_ttd'], 125, 140, 40, 20);

$pdf->SetFont('Times', '', 10);
$pdf->Cell(190, 0);
$pdf->Cell(120, 5, $datakades['kepala_desa_nama'], 0, 1);

$pdf->Output();

ob_end_flush();
//-------------------------------------------------------------------------------------------------------------------------
