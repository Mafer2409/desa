<?php
ob_start();

include '../../../system/koneksi.php';

$tahun_skrg = date('Y');
$tglnow = date('d - m - Y');
// $format_nomor = '-ST.GRG-OLT-KELAHIRAN-';
// $arsip_laporan = 'Kelahiran';
$id = $_GET['id'];

$sql = mysqli_query($con, "SELECT * FROM kematian, user WHERE kematian.kematian_user = user.user_id AND kematian.kematian_id = '$id'");
$sql2 = mysqli_query($con, "SELECT * FROM kematian, user WHERE kematian.kematian_user = user.user_id AND kematian.kematian_id = '$id'");
$datakematian = mysqli_fetch_assoc($sql2);
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
$pdf->Cell(45, 10, 'SURAT KETERANGAN KEMATIAN', 0, 1);

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

$no = 1;
while ($data = mysqli_fetch_assoc($sql)) {
    $iduserm = $data['kematian_user_meninggal'];
    $sqluserm = mysqli_query($con, "SELECT * FROM user WHERE user_id = '$iduserm'");
    $datam = mysqli_fetch_assoc($sqluserm);

    // ------------------------------------------------------------------------------------------------------------
    $pdf->Cell(30, 8, '', 0, 0);
    $pdf->Cell(40, 8, 'Yang bertanda tangan dibawah ini kepala desa Nelelamadike, Kecamatan Ile Boleng,  ', 0, 1);
    $pdf->Cell(10, 8, '', 0, 0);
    $pdf->Cell(40, 8, 'Kabupaten Flores Timur, Provinsi Nusa Tenggara Timur, menerangkan dengan sebenarnya bahwa pada :  ', 0, 1);

    $pdf->Cell(30, 8, '', 0, 0);
    $pdf->Cell(40, 8, 'Nama', 0, 0);
    $pdf->Cell(10, 8, ':', 0, 0);
    $pdf->Cell(10, 8, $datam['user_nama'], 0, 1);

    $pdf->Cell(30, 8, '', 0, 0);
    $pdf->Cell(40, 8, 'Jenis kelamin', 0, 0);
    $pdf->Cell(10, 8, ':', 0, 0);
    $pdf->Cell(10, 8, $datam['user_jk'], 0, 1);

    $pdf->Cell(30, 8, '', 0, 0);
    $pdf->Cell(40, 8, 'Tempat, Tanggal lahir', 0, 0);
    $pdf->Cell(10, 8, ':', 0, 0);
    $pdf->Cell(10, 8, $datam['user_tempat_lahir'] . ', ' . $datam['user_tgl_lahir'], 0, 1);

    $pdf->Cell(30, 8, '', 0, 0);
    $pdf->Cell(40, 8, 'Agama', 0, 0);
    $pdf->Cell(10, 8, ':', 0, 0);
    $pdf->Cell(10, 8, $datam['user_agama'], 0, 1);

    $pdf->Cell(30, 8, '', 0, 0);
    $pdf->Cell(40, 8, 'Alamat/Tampat Tinggal', 0, 0);
    $pdf->Cell(10, 8, ':', 0, 0);
    $pdf->Cell(10, 8, $datam['user_alamat'], 0, 1);

    $pdf->Cell(10, 8, '', 0, 0);
    $pdf->Cell(40, 8, 'Telah meninggal dunia pada : ', 0, 1);

    $pdf->Cell(30, 8, '', 0, 0);
    $pdf->Cell(40, 8, 'Tempat', 0, 0);
    $pdf->Cell(10, 8, ':', 0, 0);
    $pdf->Cell(10, 8, $data['kematian_tempat_meninggal'], 0, 1);

    $pdf->Cell(30, 8, '', 0, 0);
    $pdf->Cell(40, 8, 'Tanggal', 0, 0);
    $pdf->Cell(10, 8, ':', 0, 0);
    $pdf->Cell(10, 8, $data['kematian_tanggal_meninggal'], 0, 1);

    $pdf->Cell(30, 8, '', 0, 0);
    $pdf->Cell(40, 8, 'Sebab Kematian', 0, 0);
    $pdf->Cell(10, 8, ':', 0, 0);
    $pdf->Cell(10, 8, $data['kematian_sebab_meninggal'], 0, 1);

    $pdf->Cell(189, 5, '', 0, 1);

    $pdf->Cell(10, 8, '', 0, 0);
    $pdf->Cell(40, 8, 'Surat keterangan ini dibuat berdasarkan keterangan pelapor :', 0, 1);

    $pdf->Cell(30, 8, '', 0, 0);
    $pdf->Cell(40, 8, 'Nama lengkap', 0, 0);
    $pdf->Cell(10, 8, ':', 0, 0);
    $pdf->Cell(10, 8, $data['user_nama'], 0, 1);

    $pdf->Cell(30, 8, '', 0, 0);
    $pdf->Cell(40, 8, 'NIK', 0, 0);
    $pdf->Cell(10, 8, ':', 0, 0);
    $pdf->Cell(10, 8, $data['user_nik'], 0, 1);

    $pdf->Cell(30, 8, '', 0, 0);
    $pdf->Cell(40, 8, 'Tempat, Tanggal Lahir', 0, 0);
    $pdf->Cell(10, 8, ':', 0, 0);
    $pdf->Cell(10, 8, $data['user_tempat_lahir'] . ', ' . $data['user_tgl_lahir'], 0, 1);

    $pdf->Cell(30, 8, '', 0, 0);
    $pdf->Cell(40, 8, 'Pekerjaan', 0, 0);
    $pdf->Cell(10, 8, ':', 0, 0);
    $pdf->Cell(10, 8, $data['user_pekerjaan'], 0, 1);

    $pdf->Cell(30, 8, '', 0, 0);
    $pdf->Cell(40, 8, 'Jenis kelamin', 0, 0);
    $pdf->Cell(10, 8, ':', 0, 0);
    $pdf->Cell(10, 8, $data['user_jk'], 0, 1);

    $pdf->Cell(30, 8, '', 0, 0);
    $pdf->Cell(40, 8, 'Alamat', 0, 0);
    $pdf->Cell(10, 8, ':', 0, 0);
    $pdf->Cell(10, 8, $data['user_alamat'], 0, 1);

    $pdf->Cell(189, 5, '', 0, 1);

    $pdf->Cell(10, 8, '', 0, 0);
    $pdf->Cell(40, 8, 'Demikian surat keterangan ini dibuat dengan sebenarnya, untuk dipergunakan sebagaimana mestinya.', 0, 1);
    // ------------------------------------------------------------------------------------------------------------------------------
}




$sqlkades = mysqli_query($con, "SELECT * FROM kepala_desa LIMIT 1");
$datakades = mysqli_fetch_assoc($sqlkades);

$pdf->SetFont('Times', '', 8);

$pdf->Cell(189, 10, '', 0, 1);
$pdf->Cell(189, 10, '', 0, 1);

$pdf->SetFont('Times', '', 10);
$pdf->Cell(115, 0);
$pdf->Cell(115, 5, 'Desa Nelelamadike, ' . $datakematian['kematian_tanggal_verifikasi'], 0, 1);

$pdf->SetFont('Times', '', 10);
$pdf->Cell(120, 0);
$pdf->Cell(110, 5, 'Kepala Desa Nelelamadike', 0, 1);

$pdf->Cell(189, 20, '', 0, 1);
//$pdf->Image('../../img/' . $datakades['kepala_desa_ttd'], 125, 240, 40, 20);

$pdf->SetFont('Times', '', 10);
$pdf->Cell(120, 0);
$pdf->Cell(120, 5, $datakades['kepala_desa_nama'], 0, 1);

$pdf->Output();

ob_end_flush();
//-------------------------------------------------------------------------------------------------------------------------
