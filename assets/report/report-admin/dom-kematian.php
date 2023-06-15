<?php
include '../../../system/koneksi.php';
require_once("../../dompdf/autoload.inc.php");

use Dompdf\Dompdf;

$dompdf = new Dompdf();

$tglnow = date('d - m - Y');

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
    $html .= '<center><h3 style="font-family:sans-serif; margin-bottom: 10px; margin-top: -25px;">LAPORAN DATA KEMATIAN</h3></center>';
} elseif ($bln == '0' && $thn != '0') {
    $html .= '<center><h3 style="font-family:sans-serif; margin-bottom: 10px; margin-top: -25px;">LAPORAN DATA KEMATIAN TAHUN ' . $thn . '</h3></center>';
} else {
    $html .= '<center><h3 style="font-family:sans-serif; margin-bottom: 10px; margin-top: -25px;">LAPORAN DATA KEMATIAN BULAN ' . $bulan . ' TAHUN ' . $thn . '</h3></center>';
}

if ($bln == '0' && $thn == '0') {
    $sql = mysqli_query($con, "SELECT * FROM user, rt, kematian WHERE kematian.kematian_rt = rt.rt_id AND user.user_id = kematian.kematian_user");
} elseif ($bln == '0' && $thn != '0') {
    $sql = mysqli_query($con, "SELECT * FROM user, rt, kematian WHERE kematian.kematian_rt = rt.rt_id AND user.user_id = kematian.kematian_user AND YEAR(kematian.kematian_tanggal_verifikasi) = '$thn'");
} else {
    $sql = mysqli_query($con, "SELECT * FROM user, rt, kematian WHERE kematian.kematian_rt = rt.rt_id AND user.user_id = kematian.kematian_user AND MONTH(kematian.kematian_tanggal_verifikasi) = '$bln' AND YEAR(kematian.kematian_tanggal_verifikasi) = '$thn'");
}

// $html .= '<center><h5 style="font-family: Arial, Helvetica, sans-serif;">Dari : ' . $dari . ' - Hingga : ' . $hingga . '</h5></center><hr/><br/>';
$html .= '<table border="1" cellpadding="2" cellspacing="0" width="100%">
 <tr style="font-family:sans-serif; font-size:10px">
 <th>No.</th>
 <th>Pelapor</th>
 <th>RW/RT</th>
 <th>Almarhum</th>
 <th>TTL</th>
 <th>TTM</th>
 <th>Sebab meninggal</th>
 <th>Jenis kelamin</th>
 </tr>';
$no = 1;
while ($data = mysqli_fetch_array($sql)) {
    $iduserm = $data['kematian_user_meninggal'];
    $sqluserm = mysqli_query($con, "SELECT * FROM user WHERE user_id = '$iduserm'");
    $datauserm = mysqli_fetch_assoc($sqluserm);

    $html .= "<tr style='font-family:sans-serif; font-size:10px'>
 <td>" . $no . ".</td>
 <td>" . $data['user_nama'] . "</td>
 <td>" . $data['rt'] . "</td>
 <td>" . $datauserm['user_nama'] . "</td>
 <td>" . $datauserm['user_tempat_lahir'] . ", " . date('d-m-Y', strtotime($datauserm['user_tgl_lahir'])) . "</td>
 <td>" . $data['kematian_tempat_meninggal'] . ", " . date('d-m-Y', strtotime($data['kematian_tanggal_meninggal'])) . "</td>
 <td>" . $data['kematian_sebab_meninggal'] . "</td>
 <td>" . $datauserm['user_jk'] . "</td>
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
