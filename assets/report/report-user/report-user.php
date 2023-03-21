<?php
ob_start();
require('../../fpdf16/fpdf.php');

include '../../../system/koneksi.php';

$tglnow = date('d - m - Y');
$idrt = $_GET['idrt'];
$s = $_GET['s'];

$sqlrt = mysqli_query($con, "SELECT * FROM rt WHERE rt_id = '$idrt'");
$datart = mysqli_fetch_assoc($sqlrt);

$pdf = new FPDF('L', 'mm', 'A4');
$pdf->AddPage();

$pdf->Image('../../img/logo-flotim.jpg', 25, 20, 25, 25);
// ======================================================================================
if ($idrt == 0) {

    if ($s == 0) {
        $pdf->Cell(189, 10, '', 0, 1);

        $pdf->SetFont('Arial', 'B', 18, 'C');
        $pdf->Cell(90, 0);
        $pdf->Cell(45, 10, 'LAPORAN DATA SEMUA WARGA', 0, 1);

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
        $pdf->Cell(35, 5, 'TTL', 1, 0);
        $pdf->Cell(25, 5, 'RW / RT', 1, 0);
        $pdf->Cell(20, 5, 'Jenis Kelamin', 1, 0);
        $pdf->Cell(12, 5, 'WN', 1, 0);
        $pdf->Cell(30, 5, 'Alamat', 1, 0);
        $pdf->Cell(23, 5, 'Status Tinggal', 1, 0);
        $pdf->Cell(30, 5, 'Pekerjaan', 1, 0);
        $pdf->Cell(23, 5, 'Status Kawin', 1, 0);
        $pdf->Cell(23, 5, 'Pendidikan', 1, 1);

        $pdf->SetFont('Arial', '', 8);
        $no = 1;
        $sql = mysqli_query($con, "SELECT * FROM user, rt WHERE user.user_rt_id = rt.rt_id");
        while ($data = mysqli_fetch_assoc($sql)) {
            $pdf->Cell(1, 5, '', 0, 0);
            $pdf->Cell(6, 5, $no++ . '.', 1, 0);
            $pdf->Cell(40, 5, $data['user_nama'], 1, 0);
            $pdf->Cell(35, 5, $data['user_tempat_lahir'] . ', ' . $data['user_tgl_lahir'], 1, 0);
            $pdf->Cell(25, 5, $data['rt'], 1, 0);
            $pdf->Cell(20, 5, $data['user_jk'], 1, 0);
            $pdf->Cell(12, 5, $data['user_wn'], 1, 0);
            $pdf->Cell(30, 5, $data['user_alamat'], 1, 0);
            $pdf->Cell(23, 5, $data['user_status_tinggal'], 1, 0);
            $pdf->Cell(30, 5, $data['user_pekerjaan'], 1, 0);
            $pdf->Cell(23, 5, $data['user_status_kawin'], 1, 0);
            $pdf->Cell(23, 5, $data['user_jenjang_pendidikan'], 1, 1);
        }

        $sqlkades = mysqli_query($con, "SELECT * FROM kepala_desa LIMIT 1");
        $datakades = mysqli_fetch_assoc($sqlkades);

        $pdf->SetFont('Times', '', 8);

        $pdf->Cell(189, 10, '', 0, 1);
        $pdf->Cell(189, 10, '', 0, 1);

        $pdf->SetFont('Times', '', 10);
        $pdf->Cell(165, 0);
        $pdf->Cell(115, 5, 'Desa Nelelamadike, ' . $tglnow, 0, 1);

        $pdf->SetFont('Times', '', 10);
        $pdf->Cell(170, 0);
        $pdf->Cell(110, 5, 'Kepala Desa Nelelamadike', 0, 1);

        $pdf->Cell(189, 20, '', 0, 1);
        // $pdf->Image('../../img/' . $datakades['kepala_desa_ttd'], 125, 140, 40, 20);

        $pdf->SetFont('Times', '', 10);
        $pdf->Cell(170, 0);
        $pdf->Cell(120, 5, $datakades['kepala_desa_nama'], 0, 1);
    } else {
        $pdf->Cell(189, 10, '', 0, 1);

        $pdf->SetFont('Arial', 'B', 18, 'C');
        $pdf->Cell(90, 0);
        $pdf->Cell(45, 10, 'Laporan Data Warga - ' . $s, 0, 1);

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
        $pdf->Cell(35, 5, 'TTL', 1, 0);
        $pdf->Cell(25, 5, 'RW / RT', 1, 0);
        $pdf->Cell(20, 5, 'Jenis Kelamin', 1, 0);
        $pdf->Cell(12, 5, 'WN', 1, 0);
        $pdf->Cell(30, 5, 'Alamat', 1, 0);
        $pdf->Cell(23, 5, 'Status Tinggal', 1, 0);
        $pdf->Cell(30, 5, 'Pekerjaan', 1, 0);
        $pdf->Cell(23, 5, 'Status Kawin', 1, 0);
        $pdf->Cell(23, 5, 'Pendidikan', 1, 1);

        $pdf->SetFont('Arial', '', 8);
        $no = 1;
        $sql = mysqli_query($con, "SELECT * FROM user, rt WHERE user.user_rt_id = rt.rt_id AND user.user_status_tinggal = '$s'");
        while ($data = mysqli_fetch_assoc($sql)) {
            $pdf->Cell(1, 5, '', 0, 0);
            $pdf->Cell(6, 5, $no++ . '.', 1, 0);
            $pdf->Cell(40, 5, $data['user_nama'], 1, 0);
            $pdf->Cell(35, 5, $data['user_tempat_lahir'] . ', ' . $data['user_tgl_lahir'], 1, 0);
            $pdf->Cell(25, 5, $data['rt'], 1, 0);
            $pdf->Cell(20, 5, $data['user_jk'], 1, 0);
            $pdf->Cell(12, 5, $data['user_wn'], 1, 0);
            $pdf->Cell(30, 5, $data['user_alamat'], 1, 0);
            $pdf->Cell(23, 5, $data['user_status_tinggal'], 1, 0);
            $pdf->Cell(30, 5, $data['user_pekerjaan'], 1, 0);
            $pdf->Cell(23, 5, $data['user_status_kawin'], 1, 0);
            $pdf->Cell(23, 5, $data['user_jenjang_pendidikan'], 1, 1);
        }

        $sqlkades = mysqli_query($con, "SELECT * FROM kepala_desa LIMIT 1");
        $datakades = mysqli_fetch_assoc($sqlkades);

        $pdf->SetFont('Times', '', 8);

        $pdf->Cell(189, 10, '', 0, 1);
        $pdf->Cell(189, 10, '', 0, 1);

        $pdf->SetFont('Times', '', 10);
        $pdf->Cell(165, 0);
        $pdf->Cell(115, 5, 'Desa Nelelamadike, ' . $tglnow, 0, 1);

        $pdf->SetFont('Times', '', 10);
        $pdf->Cell(170, 0);
        $pdf->Cell(110, 5, 'Kepala Desa Nelelamadike', 0, 1);

        $pdf->Cell(189, 20, '', 0, 1);
        // $pdf->Image('../../img/' . $datakades['kepala_desa_ttd'], 125, 140, 40, 20);

        $pdf->SetFont('Times', '', 10);
        $pdf->Cell(170, 0);
        $pdf->Cell(120, 5, $datakades['kepala_desa_nama'], 0, 1);
    }














    // =========================================================================================================
} else {

    if ($s == 0) {
        $pdf->Cell(189, 10, '', 0, 1);

        $pdf->SetFont('Arial', 'B', 18, 'C');
        $pdf->Cell(75, 0);
        $pdf->Cell(45, 10, 'LAPORAN DATA WARGA RT : ' . $datart['rt'], 0, 1);

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
        $pdf->Cell(35, 5, 'TTL', 1, 0);
        $pdf->Cell(25, 5, 'RW / RT', 1, 0);
        $pdf->Cell(20, 5, 'Jenis Kelamin', 1, 0);
        $pdf->Cell(12, 5, 'WN', 1, 0);
        $pdf->Cell(30, 5, 'Alamat', 1, 0);
        $pdf->Cell(23, 5, 'Status Tinggal', 1, 0);
        $pdf->Cell(30, 5, 'Pekerjaan', 1, 0);
        $pdf->Cell(23, 5, 'Status Kawin', 1, 0);
        $pdf->Cell(23, 5, 'Pendidikan', 1, 1);

        $pdf->SetFont('Arial', '', 8);
        $no = 1;
        $sql = mysqli_query($con, "SELECT * FROM user, rt WHERE user.user_rt_id = rt.rt_id AND user.user_rt_id = '$idrt'");
        while ($data = mysqli_fetch_assoc($sql)) {
            $pdf->Cell(1, 5, '', 0, 0);
            $pdf->Cell(6, 5, $no++ . '.', 1, 0);
            $pdf->Cell(40, 5, $data['user_nama'], 1, 0);
            $pdf->Cell(35, 5, $data['user_tempat_lahir'] . ', ' . $data['user_tgl_lahir'], 1, 0);
            $pdf->Cell(25, 5, $data['rt'], 1, 0);
            $pdf->Cell(20, 5, $data['user_jk'], 1, 0);
            $pdf->Cell(12, 5, $data['user_wn'], 1, 0);
            $pdf->Cell(30, 5, $data['user_alamat'], 1, 0);
            $pdf->Cell(23, 5, $data['user_status_tinggal'], 1, 0);
            $pdf->Cell(30, 5, $data['user_pekerjaan'], 1, 0);
            $pdf->Cell(23, 5, $data['user_status_kawin'], 1, 0);
            $pdf->Cell(23, 5, $data['user_jenjang_pendidikan'], 1, 1);
        }

        $sqlkades = mysqli_query($con, "SELECT * FROM kepala_desa LIMIT 1");
        $datakades = mysqli_fetch_assoc($sqlkades);

        $pdf->SetFont('Times', '', 8);

        $pdf->Cell(189, 10, '', 0, 1);
        $pdf->Cell(189, 10, '', 0, 1);

        $pdf->SetFont('Times', '', 10);
        $pdf->Cell(165, 0);
        $pdf->Cell(115, 5, 'Desa Nelelamadike, ' . $tglnow, 0, 1);

        $pdf->SetFont('Times', '', 10);
        $pdf->Cell(170, 0);
        $pdf->Cell(110, 5, 'Kepala Desa Nelelamadike', 0, 1);

        $pdf->Cell(189, 20, '', 0, 1);
        // $pdf->Image('../../img/' . $datakades['kepala_desa_ttd'], 125, 140, 40, 20);

        $pdf->SetFont('Times', '', 10);
        $pdf->Cell(170, 0);
        $pdf->Cell(120, 5, $datakades['kepala_desa_nama'], 0, 1);
    } else {
        $pdf->Cell(189, 10, '', 0, 1);

        $pdf->SetFont('Arial', 'B', 18, 'C');
        $pdf->Cell(75, 0);
        $pdf->Cell(45, 10, 'Laporan Data Warga - ' . $s . ' - ' . $datart['rt'], 0, 1);

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
        $pdf->Cell(35, 5, 'TTL', 1, 0);
        $pdf->Cell(25, 5, 'RW / RT', 1, 0);
        $pdf->Cell(20, 5, 'Jenis Kelamin', 1, 0);
        $pdf->Cell(12, 5, 'WN', 1, 0);
        $pdf->Cell(30, 5, 'Alamat', 1, 0);
        $pdf->Cell(23, 5, 'Status Tinggal', 1, 0);
        $pdf->Cell(30, 5, 'Pekerjaan', 1, 0);
        $pdf->Cell(23, 5, 'Status Kawin', 1, 0);
        $pdf->Cell(23, 5, 'Pendidikan', 1, 1);

        $pdf->SetFont('Arial', '', 8);
        $no = 1;
        $sql = mysqli_query($con, "SELECT * FROM user, rt WHERE user.user_rt_id = rt.rt_id AND user.user_rt_id = '$idrt' AND user.user_status_tinggal = '$s'");
        while ($data = mysqli_fetch_assoc($sql)) {
            $pdf->Cell(1, 5, '', 0, 0);
            $pdf->Cell(6, 5, $no++ . '.', 1, 0);
            $pdf->Cell(40, 5, $data['user_nama'], 1, 0);
            $pdf->Cell(35, 5, $data['user_tempat_lahir'] . ', ' . $data['user_tgl_lahir'], 1, 0);
            $pdf->Cell(25, 5, $data['rt'], 1, 0);
            $pdf->Cell(20, 5, $data['user_jk'], 1, 0);
            $pdf->Cell(12, 5, $data['user_wn'], 1, 0);
            $pdf->Cell(30, 5, $data['user_alamat'], 1, 0);
            $pdf->Cell(23, 5, $data['user_status_tinggal'], 1, 0);
            $pdf->Cell(30, 5, $data['user_pekerjaan'], 1, 0);
            $pdf->Cell(23, 5, $data['user_status_kawin'], 1, 0);
            $pdf->Cell(23, 5, $data['user_jenjang_pendidikan'], 1, 1);
        }

        $sqlkades = mysqli_query($con, "SELECT * FROM kepala_desa LIMIT 1");
        $datakades = mysqli_fetch_assoc($sqlkades);

        $pdf->SetFont('Times', '', 8);

        $pdf->Cell(189, 10, '', 0, 1);
        $pdf->Cell(189, 10, '', 0, 1);

        $pdf->SetFont('Times', '', 10);
        $pdf->Cell(165, 0);
        $pdf->Cell(115, 5, 'Desa Nelelamadike, ' . $tglnow, 0, 1);

        $pdf->SetFont('Times', '', 10);
        $pdf->Cell(170, 0);
        $pdf->Cell(110, 5, 'Kepala Desa Nelelamadike', 0, 1);

        $pdf->Cell(189, 20, '', 0, 1);
        // $pdf->Image('../../img/' . $datakades['kepala_desa_ttd'], 125, 140, 40, 20);

        $pdf->SetFont('Times', '', 10);
        $pdf->Cell(170, 0);
        $pdf->Cell(120, 5, $datakades['kepala_desa_nama'], 0, 1);
    }
}

$pdf->Output();

ob_end_flush();
//-------------------------------------------------------------------------------------------------------------------------
