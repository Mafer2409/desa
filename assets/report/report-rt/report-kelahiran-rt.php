<?php
ob_start();
require('../../fpdf16/fpdf.php');

include '../../../system/koneksi.php';

$idrt = $_GET['idrt'];
$bln = $_GET['bln'];
$thn = $_GET['thn'];

$sqlrt = mysqli_query($con, "SELECT * FROM rt WHERE rt_id = '$idrt'");
$datart = mysqli_fetch_assoc($sqlrt);

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
    $pdf->Cell(45, 10, 'LAPORAN DATA KELAHIRAN', 0, 1);
} elseif ($bln == '0' && $thn != '0') {
    $pdf->SetFont('Arial', 'B', 18, 'C');
    $pdf->Cell(75, 0);
    $pdf->Cell(45, 10, 'LAPORAN DATA KELAHIRAN TAHUN ' . $thn, 0, 1);
} else {
    $pdf->SetFont('Arial', 'B', 18, 'C');
    $pdf->Cell(50, 0);
    $pdf->Cell(45, 10, 'LAPORAN DATA KELAHIRAN BULAN ' . $bulan . ' TAHUN ' . $thn, 0, 1);
}

$pdf->SetFont('Arial', 'B', 15, 'C');
$pdf->Cell(115, 0);
$pdf->Cell(58, 10, $datart['rt'], 0, 1);

$pdf->SetFont('Arial', 'B', 15, 'C');
$pdf->Cell(107, 0);
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
$pdf->Cell(40, 5, 'Nama Anak', 1, 0);
$pdf->Cell(40, 5, 'TTL', 1, 0);
$pdf->Cell(20, 5, 'Jenis Kelamin', 1, 0);
$pdf->Cell(20, 5, 'Agama', 1, 0);
$pdf->Cell(30, 5, 'Alamat', 1, 0);
$pdf->Cell(40, 5, 'Ayah', 1, 0);
$pdf->Cell(40, 5, 'Ibu', 1, 1);

$pdf->SetFont('Arial', '', 8);
$no = 1;

if ($bln == '0' && $thn == '0') {
    $sql = mysqli_query($con, "SELECT * FROM user, rt, kelahiran WHERE user.user_rt_id = rt.rt_id AND user.user_id = kelahiran.kelahiran_user AND rt.rt_id = '$idrt'");
} elseif ($bln == '0' && $thn != '0') {
    $sql = mysqli_query($con, "SELECT * FROM user, rt, kelahiran WHERE user.user_rt_id = rt.rt_id AND user.user_id = kelahiran.kelahiran_user AND YEAR(kelahiran.kelahiran_tanggal_verifikasi) = '$thn' AND rt.rt_id = '$idrt'");
} else {
    $sql = mysqli_query($con, "SELECT * FROM user, rt, kelahiran WHERE user.user_rt_id = rt.rt_id AND user.user_id = kelahiran.kelahiran_user AND MONTH(kelahiran.kelahiran_tanggal_verifikasi) = '$bln' AND YEAR(kelahiran.kelahiran_tanggal_verifikasi) = '$thn' AND rt.rt_id = '$idrt'");
}

while ($data = mysqli_fetch_assoc($sql)) {
    $pdf->Cell(1, 5, '', 0, 0);
    $pdf->Cell(6, 5, $no++ . '.', 1, 0);
    $pdf->Cell(40, 5, $data['user_nama'], 1, 0);
    $pdf->Cell(40, 5, $data['kelahiran_nama_anak'], 1, 0);
    $pdf->Cell(40, 5, $data['kelahiran_tempat_lahir'] . ', ' . $data['kelahiran_tanggal_lahir'], 1, 0);
    $pdf->Cell(20, 5, $data['kelahiran_jk'], 1, 0);
    $pdf->Cell(20, 5, $data['kelahiran_agama'], 1, 0);
    $pdf->Cell(30, 5, $data['kelahiran_alamat'], 1, 0);
    $pdf->Cell(40, 5, $data['kelahiran_nama_ayah'], 1, 0);
    $pdf->Cell(40, 5, $data['kelahiran_nama_ibu'], 1, 1);
}


$pdf->Output();

ob_end_flush();
//-------------------------------------------------------------------------------------------------------------------------
