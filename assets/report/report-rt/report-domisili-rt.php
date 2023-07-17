<?php
include '../../../system/koneksi.php';
require_once("../../dompdf/autoload.inc.php");

use Dompdf\Dompdf;

$dompdf = new Dompdf();

$tglnow = date('d - m - Y');

$idrt = $_GET['idrt'];
$bln = $_GET['bln'];
$thn = $_GET['thn'];

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


// ============================================================================================================================

$path = '../../img/lanscape.jpg';
$type = pathinfo($path, PATHINFO_EXTENSION);
$data = file_get_contents($path);
$base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);


$html = '<center><img src="../../img/lanscape.jpg" width="1000px"></center>';

if ($bln == '0' && $thn == '0') {
    $html .= '<center><h3 style="font-family:sans-serif; margin-bottom: 10px; margin-top: -25px;">LAPORAN DATA IZIN USAHA</h3></center>';
} elseif ($bln == '0' && $thn != '0') {
    $html .= '<center><h3 style="font-family:sans-serif; margin-bottom: 10px; margin-top: -25px;">LAPORAN DATA IZIN USAHA TAHUN ' . $thn . '</h3></center>';
} else {
    $html .= '<center><h3 style="font-family:sans-serif; margin-bottom: 10px; margin-top: -25px;">LAPORAN DATA IZIN USAHA BULAN ' . $bulan . ' TAHUN ' . $thn . '</h3></center>';
}

if ($bln == '0' && $thn == '0') {
    $sql = mysqli_query($con, "SELECT * FROM user, rt, domisili WHERE user.user_rt_id = rt.rt_id AND domisili.domisili_rt = '$idrt' AND user.user_id = domisili.domisili_user");
} elseif ($bln == '0' && $thn != '0') {
    $sql = mysqli_query($con, "SELECT * FROM user, rt, domisili WHERE user.user_rt_id = rt.rt_id AND domisili.domisili_rt = '$idrt' AND user.user_id = domisili.domisili_user AND YEAR(domisili.domisili_tanggal_verifikasi) = '$thn'");
} else {
    $sql = mysqli_query($con, "SELECT * FROM user, rt, domisili WHERE user.user_rt_id = rt.rt_id AND domisili.domisili_rt = '$idrt' AND user.user_id = domisili.domisili_user AND MONTH(domisili.domisili_tanggal_verifikasi) = '$bln' AND YEAR(domisili.domisili_tanggal_verifikasi) = '$thn'");
}

// $html .= '<center><h5 style="font-family: Arial, Helvetica, sans-serif;">Dari : ' . $dari . ' - Hingga : ' . $hingga . '</h5></center><hr/><br/>';
$html .= '<table border="1" cellpadding="2" cellspacing="0" width="100%">
 <tr style="font-family:sans-serif; font-size:10px">
 <th>No.</th>
 <th>Pelapor</th>
 <th>RT/RW</th>
 <th>Tanggal lapor</th>
 <th>Status</th>
 <th>Verifikasi</th>
 </tr>';
$no = 1;
while ($data = mysqli_fetch_array($sql)) {

    $html .= "<tr style='font-family:sans-serif; font-size:10px'>
 <td>" . $no . ".</td>
 <td>" . $data['user_nama'] . "</td>
 <td>" . $data['rt'] . "</td>
 <td>" . date('d-m-Y', strtotime($data['domisili_tanggal'])) . "</td>
 <td>" . $data['domisili_status'] . "</td>
 <td>" . $data['domisili_tanggal_verifikasi'] . "</td>
 </tr>";
    $no++;
}

$sqlkades = mysqli_query($con, "SELECT * FROM kepala_desa LIMIT 1");
$datakades = mysqli_fetch_assoc($sqlkades);

$html .= '<p align="right" style="font-family:sans-serif; margin-right: 70px"><b><br><br><br>Desa Nelelamadike, <br>Kepala Desa Nelelamadike<br><br><br><br><br><br> ' . $datakades['kepala_desa_nama'] . '</b></p>';

$html .= "</html>";
$dompdf->loadHtml($html);
// Setting ukuran dan orientasi kertas
$dompdf->setPaper('A4', 'landscape');
// Rendering dari HTML Ke PDF
$dompdf->render();
// Melakukan output file Pdf
$dompdf->stream('report-kelahiran.pdf', array("Attachment" => false));
