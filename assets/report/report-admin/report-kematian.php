<?php
ob_start();
require('../../fpdf16/fpdf.php');

include '../../../system/koneksi.php';

$bln = $_GET['bln'];
$thn = $_GET['thn'];

$tglnow = date('d - m - Y');

$pdf = new FPDF('L', 'mm', 'A4');
$pdf->AddPage();

// $pdf->Image('logo-paroki.jpeg', 25, 20, 25, 25);
// ======================================================================================

$pdf->Cell(189, 10, '', 0, 1);

$bulan = '';
if ($bln == '01') {
    $bulan = 'JANUARI';
} elseif ($bln == '02') {
    $bulan = 'FEBRUARI';
} elseif ($bln == '03') {
    $bulan = 'MARET';
} elseif ($bln == '04') {
    $bulan = 'APRIL';
} elseif ($bln == '05') {
    $bulan = 'MEI';
} elseif ($bln == '06') {
    $bulan = 'JUNI';
} elseif ($bln == '07') {
    $bulan = 'JULI';
} elseif ($bln == '08') {
    $bulan = 'AGUSTUS';
} elseif ($bln == '09') {
    $bulan = 'SEPTEMBER';
} elseif ($bln == '10') {
    $bulan = 'OKTOBER';
} elseif ($bln == '11') {
    $bulan = 'NOVEMBER';
} else {
    $bulan = 'DESEMBER';
}


if ($bln == '0' && $thn == '0') {
    $pdf->SetFont('Arial', 'B', 18, 'C');
    $pdf->Cell(95, 0);
    $pdf->Cell(45, 10, 'LAPORAN DATA KEMATIAN', 0, 1);
} elseif ($bln == '0' && $thn != '0') {
    $pdf->SetFont('Arial', 'B', 18, 'C');
    $pdf->Cell(75, 0);
    $pdf->Cell(45, 10, 'LAPORAN DATA KEMATIAN TAHUN ' . $thn, 0, 1);
} else {
    $pdf->SetFont('Arial', 'B', 18, 'C');
    $pdf->Cell(50, 0);
    $pdf->Cell(45, 10, 'LAPORAN DATA KEMATIAN BULAN ' . $bulan . ' TAHUN ' . $thn, 0, 1);
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
$pdf->Cell(40, 5, 'Pelapor', 1, 0);
$pdf->Cell(40, 5, 'RW/RT', 1, 0);
$pdf->Cell(40, 5, 'Yang Meninggal', 1, 0);
$pdf->Cell(40, 5, 'TTL', 1, 0);
$pdf->Cell(40, 5, 'TTM', 1, 0);
$pdf->Cell(30, 5, 'Sebab Meninggal', 1, 0);
$pdf->Cell(20, 5, 'Jenis Kelamin', 1, 1);

$pdf->SetFont('Arial', '', 8);
$no = 1;

if ($bln == '0' && $thn == '0') {
    $sql = mysqli_query($con, "SELECT * FROM user, rt, kematian WHERE kematian.kematian_rt = rt.rt_id AND user.user_id = kematian.kematian_user");
} elseif ($bln == '0' && $thn != '0') {
    $sql = mysqli_query($con, "SELECT * FROM user, rt, kematian WHERE kematian.kematian_rt = rt.rt_id AND user.user_id = kematian.kematian_user AND YEAR(kematian.kematian_tanggal_verifikasi) = '$thn'");
} else {
    $sql = mysqli_query($con, "SELECT * FROM user, rt, kematian WHERE kematian.kematian_rt = rt.rt_id AND user.user_id = kematian.kematian_user AND MONTH(kematian.kematian_tanggal_verifikasi) = '$bln' AND YEAR(kematian.kematian_tanggal_verifikasi) = '$thn'");
}

while ($data = mysqli_fetch_assoc($sql)) {
    $iduserm = $data['kematian_user_meninggal'];
    $sqluserm = mysqli_query($con, "SELECT * FROM user WHERE user_id = '$iduserm'");
    $datauserm = mysqli_fetch_assoc($sqluserm);

    $pdf->Cell(1, 5, '', 0, 0);
    $pdf->Cell(6, 5, $no++ . '.', 1, 0);
    $pdf->Cell(40, 5, $data['user_nama'], 1, 0);
    $pdf->Cell(40, 5, $data['rt'], 1, 0);
    $pdf->Cell(40, 5, $datauserm['user_nama'], 1, 0);
    $pdf->Cell(40, 5, $datauserm['user_tempat_lahir'] . ', ' . $datauserm['user_tgl_lahir'], 1, 0);
    $pdf->Cell(40, 5, $data['kematian_tempat_meninggal'] . ', ' . $data['kematian_tanggal_meninggal'], 1, 0);
    $pdf->Cell(30, 5, $data['kematian_sebab_meninggal'], 1, 0);
    $pdf->Cell(20, 5, $datauserm['user_jk'], 1, 1);
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
