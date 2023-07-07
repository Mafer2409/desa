<?php
ob_start();

include '../../../system/koneksi.php';

$tahun_skrg = date('Y');
$tglnow = date('d - m - Y');
// $format_nomor = '-ST.GRG-OLT-KELAHIRAN-';
// $arsip_laporan = 'Kelahiran';
$id = $_GET['id'];

$sql = mysqli_query($con, "SELECT * FROM izinusaha, user WHERE izinusaha.izinusaha_user = user.user_id AND izinusaha.izinusaha_id = '$id'");
$data = mysqli_fetch_assoc($sql);

// ===============================================================================================

require('../../fpdf16/fpdf.php');

$pdf = new FPDF('P', 'mm', 'A4');
$pdf->AddPage();

$pdf->Image('../../img/potrait.jpg', 2, 2, 210, 45);

$pdf->Cell(189, 10, '', 0, 1);
$pdf->Cell(189, 10, '', 0, 1);
$pdf->Cell(189, 10, '', 0, 1);

$pdf->SetFont('Arial', 'B', 12, 'C');
$pdf->Cell(60, 0);
$pdf->Cell(45, 10, 'SURAT KETERANGAN IZIN USAHA', 0, 1);

// $pdf->SetFont('Arial', 'B', 15, 'C');
// $pdf->Cell(60, 0);
// $pdf->Cell(58, 10, 'Kantor Desa Nelelamadike', 0, 1);

// $pdf->SetFont('Arial', 'I', 12, 'C');
// $pdf->Cell(30, 0);
// $pdf->Cell(30, 10, 'Jl. Trans Waiwerang, Desa Nelelamadike, Kec. Ile Boleng, Flores Timur', 0, 1);

// $pdf->SetFont('Arial', 'B', 12, 'C');
// $pdf->Cell(60, 0);
// $pdf->Cell(45, 10, $surat, 0, 1);


$pdf->SetFont('Arial', '', 8);
$no = 0;

$pdf->SetFont('Times', '', 11);
// ------------------------------------------------------------------------------------------------------------
$pdf->Cell(30, 8, '', 0, 0);
$pdf->Cell(40, 8, 'Yang bertanda tangan dibawah ini kepala desa Nelelamadike, Kecamatan Ile Boleng,  ', 0, 1);
$pdf->Cell(10, 8, '', 0, 0);
$pdf->Cell(40, 8, 'Kabupaten Flores Timur, Provinsi Nusa Tenggara Timur, menerangkan dengan sebenarnya bahwa pada :  ', 0, 1);

$pdf->Cell(30, 8, '', 0, 0);
$pdf->Cell(40, 8, 'Nama', 0, 0);
$pdf->Cell(10, 8, ':', 0, 0);
$pdf->Cell(10, 8, $data['izinusaha_nama_pemilik'], 0, 1);

$pdf->Cell(30, 8, '', 0, 0);
$pdf->Cell(40, 8, 'NIK', 0, 0);
$pdf->Cell(10, 8, ':', 0, 0);
$pdf->Cell(10, 8, $data['izinusaha_nik_pemilik'], 0, 1);

$pdf->Cell(30, 8, '', 0, 0);
$pdf->Cell(40, 8, 'TTL', 0, 0);
$pdf->Cell(10, 8, ':', 0, 0);
$pdf->Cell(10, 8, $data['izinusaha_tempat_lahir_pemilik'] . ',' . date('d-m-Y', strtotime($data['izinusaha_tanggal_lahir_pemilik'])), 0, 1);

$pdf->Cell(30, 8, '', 0, 0);
$pdf->Cell(40, 8, 'Jenis kelamin', 0, 0);
$pdf->Cell(10, 8, ':', 0, 0);
$pdf->Cell(10, 8, $data['izinusaha_jenis_kelamin_pemilik'], 0, 1);

$pdf->Cell(189, 5, '', 0, 1);

$pdf->Cell(10, 8, '', 0, 0);
$pdf->Cell(40, 8, 'Telah di berikan izin penuh untuk mendirikan usaha;', 0, 0);
$pdf->Cell(10, 8, ':', 0, 1);

$pdf->Cell(30, 8, '', 0, 0);
$pdf->Cell(40, 8, 'Nama usaha', 0, 0);
$pdf->Cell(10, 8, ':', 0, 0);
$pdf->Cell(10, 8, $data['izinusaha_nama_usaha'], 0, 1);

$pdf->Cell(30, 8, '', 0, 0);
$pdf->Cell(40, 8, 'Bentuk usaha', 0, 0);
$pdf->Cell(10, 8, ':', 0, 0);
$pdf->Cell(10, 8, $data['izinusaha_jenis_usaha'], 0, 1);

$pdf->Cell(30, 8, '', 0, 0);
$pdf->Cell(40, 8, 'Alamat usaha', 0, 0);
$pdf->Cell(10, 8, ':', 0, 0);
$pdf->Cell(10, 8, $data['izinusaha_alamat_usaha'], 0, 1);

$pdf->Cell(189, 5, '', 0, 1);

$pdf->Cell(10, 8, '', 0, 0);
$pdf->Cell(40, 8, 'Demikian surat keterangan ini dibuat dengan sebenarnya, untuk dipergunakan sebagaimana mestinya.', 0, 1);
// ------------------------------------------------------------------------------------------------------------------------------


$sqlkades = mysqli_query($con, "SELECT * FROM kepala_desa LIMIT 1");
$datakades = mysqli_fetch_assoc($sqlkades);

$pdf->SetFont('Times', '', 8);

$pdf->Cell(189, 5, '', 0, 1);

$pdf->SetFont('Times', '', 10);
$pdf->Cell(115, 0);
$pdf->Cell(115, 5, 'Desa Nelelamadike, ' . $data['izinusaha_tanggal_verifikasi'], 0, 1);

$pdf->SetFont('Times', '', 10);
$pdf->Cell(120, 0);
$pdf->Cell(110, 5, 'Kepala Desa Nelelamadike', 0, 1);

$pdf->Cell(189, 20, '', 0, 1);
//$pdf->Image('../../img/' . $datakades['kepala_desa_ttd'], 125, 215, 40, 20);

$pdf->SetFont('Times', '', 10);
$pdf->Cell(120, 0);
$pdf->Cell(120, 5, $datakades['kepala_desa_nama'], 0, 1);

$pdf->Output();

ob_end_flush();
//-------------------------------------------------------------------------------------------------------------------------
