<?php
ob_start();

include '../../../system/koneksi.php';

$tahun_skrg = date('Y');
$tglnow = date('d - m - Y');
// $format_nomor = '-ST.GRG-OLT-KELAHIRAN-';
// $arsip_laporan = 'Kelahiran';
$id = $_GET['id'];

$sql = mysqli_query($con, "SELECT * FROM kematian, user WHERE kematian.kematian_user = user.user_id AND kematian.kematian_id = '$id'");

// ===============================================================================================

require('../../fpdf16/fpdf.php');

$pdf = new FPDF('P', 'mm', 'A4');
$pdf->AddPage();

// $pdf->Image('logo-paroki.jpeg', 25, 20, 25, 25);

$pdf->Cell(189, 10, '', 0, 1);

$pdf->SetFont('Arial', 'B', 18, 'C');
$pdf->Cell(40, 0);
$pdf->Cell(45, 10, 'SURAT KETERANGAN KEMATIAN', 0, 1);

$pdf->SetFont('Arial', 'B', 15, 'C');
$pdf->Cell(60, 0);
$pdf->Cell(58, 10, 'Kantor Desa Nelelamadike', 0, 1);

$pdf->SetFont('Arial', 'I', 12, 'C');
$pdf->Cell(50, 0);
$pdf->Cell(45, 10, 'Jl. Oeleta Raya, Alak, Kec. Alak, Kota Kupang', 0, 1);

// $pdf->SetFont('Arial', 'B', 12, 'C');
// $pdf->Cell(60, 0);
// $pdf->Cell(45, 10, $surat, 0, 1);

$pdf->Cell(189, 10, '', 0, 1);

$pdf->Line(20, 50, 189, 50);
$pdf->SetLineWidth(2);
$pdf->Line(20, 50, 189, 50);

$pdf->Cell(189, 10, '', 0, 1);

$pdf->SetFont('Arial', '', 8);
$no = 0;

$pdf->SetFont('Times', '', 11);

$no = 1;
while ($data = mysqli_fetch_assoc($sql)) {
    $iduserm = $data['kematian_user_meninggal'];
    $sqluserm = mysqli_query($con, "SELECT * FROM user WHERE user_id = '$iduserm'");
    $datam = mysqli_fetch_assoc($sqluserm);

    $pdf->Cell(30, 8, '', 0, 0);
    $pdf->Cell(40, 8, 'Nama', 0, 0);
    $pdf->Cell(10, 8, ':', 0, 0);
    $pdf->Cell(10, 8, $datam['user_nama'], 0, 1);

    $pdf->Cell(30, 8, '', 0, 0);
    $pdf->Cell(40, 8, 'TTM', 0, 0);
    $pdf->Cell(10, 8, ':', 0, 0);
    $pdf->Cell(10, 8, $data['kematian_tempat_meninggal'] . ', ' . $data['kematian_tanggal_meninggal'], 0, 1);
}


$sqlkades = mysqli_query($con, "SELECT * FROM kepala_desa LIMIT 1");
$datakades = mysqli_fetch_assoc($sqlkades);

$pdf->SetFont('Times', '', 8);

$pdf->Cell(189, 10, '', 0, 1);
$pdf->Cell(189, 10, '', 0, 1);

$pdf->SetFont('Times', '', 10);
$pdf->Cell(115, 0);
$pdf->Cell(115, 5, 'Desa Nelelamadike, ' . $data['kematian_tanggal_verifikasi'], 0, 1);

$pdf->SetFont('Times', '', 10);
$pdf->Cell(120, 0);
$pdf->Cell(110, 5, 'Kepala Desa Nelelamadike', 0, 1);

$pdf->Cell(189, 20, '', 0, 1);
$pdf->Image('../../img/' . $datakades['kepala_desa_ttd'], 125, 140, 40, 20);

$pdf->SetFont('Times', '', 10);
$pdf->Cell(120, 0);
$pdf->Cell(120, 5, $datakades['kepala_desa_nama'], 0, 1);

$pdf->Output();

ob_end_flush();
//-------------------------------------------------------------------------------------------------------------------------
