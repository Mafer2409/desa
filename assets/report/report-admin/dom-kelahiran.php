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
    $html .= '<center><h3 style="font-family:sans-serif; margin-bottom: 10px; margin-top: -25px;">LAPORAN DATA KELAHIRAN</h3></center>';
} elseif ($bln == '0' && $thn != '0') {
    $html .= '<center><h3 style="font-family:sans-serif; margin-bottom: 10px; margin-top: -25px;">LAPORAN DATA KELAHIRAN TAHUN ' . $thn . '</h3></center>';
} else {
    $html .= '<center><h3 style="font-family:sans-serif; margin-bottom: 10px; margin-top: -25px;">LAPORAN DATA KELAHIRAN BULAN ' . $bulan . ' TAHUN ' . $thn . '</h3></center>';
}

if ($bln == '0' && $thn == '0') {
    $sql = mysqli_query($con, "SELECT * FROM user, rt, kelahiran WHERE user.user_rt_id = rt.rt_id AND user.user_id = kelahiran.kelahiran_user");
} elseif ($bln == '0' && $thn != '0') {
    $sql = mysqli_query($con, "SELECT * FROM user, rt, kelahiran WHERE user.user_rt_id = rt.rt_id AND user.user_id = kelahiran.kelahiran_user AND YEAR(kelahiran.kelahiran_tanggal_verifikasi) = '$thn'");
} else {
    $sql = mysqli_query($con, "SELECT * FROM user, rt, kelahiran WHERE user.user_rt_id = rt.rt_id AND user.user_id = kelahiran.kelahiran_user AND MONTH(kelahiran.kelahiran_tanggal_verifikasi) = '$bln' AND YEAR(kelahiran.kelahiran_tanggal_verifikasi) = '$thn'");
}

// $html .= '<center><h5 style="font-family: Arial, Helvetica, sans-serif;">Dari : ' . $dari . ' - Hingga : ' . $hingga . '</h5></center><hr/><br/>';
$html .= '<table border="1" cellpadding="2" cellspacing="0" width="100%">
 <tr style="font-family:sans-serif; font-size:10px">
 <th>No.</th>
 <th>Pelapor</th>
 <th>Nama anak</th>
 <th>TTL</th>
 <th>Jenis kelamin</th>
 <th>Agama</th>
 <th>Alamat</th>
 <th>Ayah</th>
 <th>Ibu</th>
 </tr>';
$no = 1;
while ($data = mysqli_fetch_array($sql)) {

    $html .= "<tr style='font-family:sans-serif; font-size:10px'>
 <td>" . $no . ".</td>
 <td>" . $data['user_nama'] . "</td>
 <td>" . $data['kelahiran_nama_anak'] . "</td>
 <td>" . $data['kelahiran_tempat_lahir'] . ", " . date('d-m-Y', strtotime($data['kelahiran_tanggal_lahir'])) . "</td>
 <td>" . $data['kelahiran_jk'] . "</td>
 <td>" . $data['kelahiran_agama'] . "</td>
 <td>" . $data['kelahiran_alamat'] . "</td>
 <td>" . $data['kelahiran_nama_ayah'] . "</td>
 <td>" . $data['kelahiran_nama_ibu'] . "</td>
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
