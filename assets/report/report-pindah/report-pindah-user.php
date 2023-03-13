<?php
ob_start();

include '../../../system/koneksi.php';

require('../../fpdf16/fpdf.php');

$tahun_skrg = date('Y');
$tglnow = date('d - m - Y');
$id = $_GET['id'];

$sql = mysqli_query($con, "SELECT * FROM administrasi, user WHERE administrasi.administrasi_user = user.user_id AND administrasi.administrasi_id = '$id'");
$data = mysqli_fetch_assoc($sql);


// ===============================================================================================
if ($data['administrasi_ket'] == 'Masuk') {
    $pdf = new FPDF('P', 'mm', 'A4');
    $pdf->AddPage();

    $pdf->Image('../../img/logo-flotim.jpg', 15, 20, 25, 25);

    $pdf->Cell(189, 10, '', 0, 1);

    $pdf->SetFont('Arial', 'B', 18, 'C');
    $pdf->Cell(40, 0);
    $pdf->Cell(45, 10, 'SURAT KETERANGAN PINDAH MASUK', 0, 1);

    $pdf->SetFont('Arial', 'B', 15, 'C');
    $pdf->Cell(60, 0);
    $pdf->Cell(58, 10, 'Kantor Desa Nelelamadike', 0, 1);

    $pdf->SetFont('Arial', 'I', 12, 'C');
    $pdf->Cell(30, 0);
    $pdf->Cell(30, 10, 'Jl. Trans Waiwerang, Desa Nelelamadike, Kec. Ile Boleng, Flores Timur', 0, 1);

    $pdf->Cell(189, 10, '', 0, 1);

    $pdf->Line(20, 50, 189, 50);
    $pdf->SetLineWidth(2);
    $pdf->Line(20, 50, 189, 50);

    $pdf->Cell(189, 10, '', 0, 1);

    $pdf->SetFont('Arial', '', 8);
    $no = 0;

    $pdf->SetFont('Times', '', 11);

    // ------------------------------------------------------------------------------------------------------------
    $pdf->Cell(30, 8, '', 0, 0);
    $pdf->Cell(40, 8, 'Yang bertanda tangan dibawah ini kepala desa Nelelamadike, Kecamatan Ile Boleng,  ', 0, 1);
    $pdf->Cell(10, 8, '', 0, 0);
    $pdf->Cell(40, 8, 'Kabupaten Flores Timur, Provinsi Nusa Tenggara Timur, menerangkan dengan sebenarnya bahwa :  ', 0, 1);

    $pdf->Cell(30, 8, '', 0, 0);
    $pdf->Cell(40, 8, 'Nama lengkap', 0, 0);
    $pdf->Cell(10, 8, ':', 0, 0);
    $pdf->Cell(10, 8, $data['user_nama'], 0, 1);

    $pdf->Cell(30, 8, '', 0, 0);
    $pdf->Cell(40, 8, 'Tempat, Tanggal lahir', 0, 0);
    $pdf->Cell(10, 8, ':', 0, 0);
    $pdf->Cell(10, 8, $data['user_tempat_lahir'] . ', ' . $data['user_tgl_lahir'], 0, 1);

    $pdf->Cell(30, 8, '', 0, 0);
    $pdf->Cell(40, 8, 'NIK', 0, 0);
    $pdf->Cell(10, 8, ':', 0, 0);
    $pdf->Cell(10, 8, $data['user_nik'], 0, 1);

    $pdf->Cell(30, 8, '', 0, 0);
    $pdf->Cell(40, 8, 'Domisili asal', 0, 0);
    $pdf->Cell(10, 8, ':', 0, 0);
    $pdf->Cell(10, 8, $data['administrasi_dari'], 0, 1);

    $pdf->Cell(30, 8, '', 0, 0);
    $pdf->Cell(40, 8, 'Alamat', 0, 0);
    $pdf->Cell(10, 8, ':', 0, 0);
    $pdf->Cell(10, 8, $data['administrasi_tujuan'], 0, 1);

    $pdf->Cell(189, 10, '', 0, 1);

    $pdf->Cell(10, 8, '', 0, 0);
    $pdf->Cell(40, 8, 'Demikian surat keterangan ini dibuat dengan sebenarnya, untuk dipergunakan sebagaimana mestinya.', 0, 1);
    // ------------------------------------------------------------------------------------------------------------------------------


    // ================================================================================================






} else {
    $pdf = new FPDF('P', 'mm', 'A4');
    $pdf->AddPage();

    $pdf->Image('../../img/logo-flotim.jpg', 15, 20, 25, 25);

    $pdf->Cell(189, 10, '', 0, 1);

    $pdf->SetFont('Arial', 'B', 18, 'C');
    $pdf->Cell(40, 0);
    $pdf->Cell(45, 10, 'SURAT KETERANGAN PINDAH KELUAR', 0, 1);

    $pdf->SetFont('Arial', 'B', 15, 'C');
    $pdf->Cell(60, 0);
    $pdf->Cell(58, 10, 'Kantor Desa Nelelamadike', 0, 1);

    $pdf->SetFont('Arial', 'I', 12, 'C');
    $pdf->Cell(30, 0);
    $pdf->Cell(30, 10, 'Jl. Trans Waiwerang, Desa Nelelamadike, Kec. Ile Boleng, Flores Timur', 0, 1);

    $pdf->Cell(189, 10, '', 0, 1);

    $pdf->Line(20, 50, 189, 50);
    $pdf->SetLineWidth(2);
    $pdf->Line(20, 50, 189, 50);

    $pdf->Cell(189, 10, '', 0, 1);

    $pdf->SetFont('Arial', '', 8);
    $no = 0;

    $pdf->SetFont('Times', '', 11);

    // ------------------------------------------------------------------------------------------------------------
    $pdf->Cell(30, 8, '', 0, 0);
    $pdf->Cell(40, 8, 'Yang bertanda tangan dibawah ini kepala desa Nelelamadike, Kecamatan Ile Boleng,  ', 0, 1);
    $pdf->Cell(10, 8, '', 0, 0);
    $pdf->Cell(40, 8, 'Kabupaten Flores Timur, Provinsi Nusa Tenggara Timur, menerangkan dengan sebenarnya bahwa :  ', 0, 1);

    $pdf->Cell(30, 8, '', 0, 0);
    $pdf->Cell(40, 8, 'Nama lengkap', 0, 0);
    $pdf->Cell(10, 8, ':', 0, 0);
    $pdf->Cell(10, 8, $data['user_nama'], 0, 1);

    $pdf->Cell(30, 8, '', 0, 0);
    $pdf->Cell(40, 8, 'Tempat, Tanggal lahir', 0, 0);
    $pdf->Cell(10, 8, ':', 0, 0);
    $pdf->Cell(10, 8, $data['user_tempat_lahir'] . ', ' . $data['user_tgl_lahir'], 0, 1);

    $pdf->Cell(30, 8, '', 0, 0);
    $pdf->Cell(40, 8, 'NIK', 0, 0);
    $pdf->Cell(10, 8, ':', 0, 0);
    $pdf->Cell(10, 8, $data['user_nik'], 0, 1);

    $pdf->Cell(30, 8, '', 0, 0);
    $pdf->Cell(40, 8, 'Alamat', 0, 0);
    $pdf->Cell(10, 8, ':', 0, 0);
    $pdf->Cell(10, 8, $data['administrasi_tujuan'], 0, 1);

    $pdf->Cell(30, 8, '', 0, 0);
    $pdf->Cell(40, 8, 'Pindah ke', 0, 0);
    $pdf->Cell(10, 8, ':', 0, 0);
    $pdf->Cell(10, 8, $data['administrasi_dari'], 0, 1);

    $pdf->Cell(189, 10, '', 0, 1);

    $pdf->Cell(10, 8, '', 0, 0);
    $pdf->Cell(40, 8, 'Demikian surat keterangan ini dibuat dengan sebenarnya, untuk dipergunakan sebagaimana mestinya.', 0, 1);
    // ------------------------------------------------------------------------------------------------------------------------------
}
// ================================================================================================

$sqlkades = mysqli_query($con, "SELECT * FROM kepala_desa LIMIT 1");
$datakades = mysqli_fetch_assoc($sqlkades);

$pdf->SetFont('Times', '', 8);

$pdf->Cell(189, 10, '', 0, 1);
$pdf->Cell(189, 10, '', 0, 1);

$pdf->SetFont('Times', '', 10);
$pdf->Cell(115, 0);
$pdf->Cell(115, 5, 'Desa Nelelamadike, ' . $data['administrasi_tanggal_verifikasi'], 0, 1);

$pdf->SetFont('Times', '', 10);
$pdf->Cell(120, 0);
$pdf->Cell(110, 5, 'Kepala Desa Nelelamadike', 0, 1);

$pdf->Cell(189, 20, '', 0, 1);
$pdf->Image('../../img/' . $datakades['kepala_desa_ttd'], 125, 175, 40, 20);

$pdf->SetFont('Times', '', 10);
$pdf->Cell(120, 0);
$pdf->Cell(120, 5, $datakades['kepala_desa_nama'], 0, 1);

$pdf->Output();

ob_end_flush();
//-------------------------------------------------------------------------------------------------------------------------
