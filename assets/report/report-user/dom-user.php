<?php
include '../../../system/koneksi.php';
require_once("../../dompdf/autoload.inc.php");

use Dompdf\Dompdf;

$dompdf = new Dompdf();

$tglnow = date('d - m - Y');
$idrt = $_GET['idrt'];
$s = $_GET['s'];

$sqlrt = mysqli_query($con, "SELECT * FROM rt, rw WHERE rt.rt_rw_id = rw.rw_id AND rt.rt_id = '$idrt'");
$datart = mysqli_fetch_assoc($sqlrt);


// ============================================================================================================================

$path = '../../img/lanscape.jpg';
$type = pathinfo($path, PATHINFO_EXTENSION);
$data = file_get_contents($path);
$base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);


$html = '<center><img src="../../img/lanscape.jpg" width="1000px"></center>';

if ($idrt == '0') {

    if ($s == '0') {
        $sql = mysqli_query($con, "SELECT * FROM user, rt, rw WHERE rt.rt_rw_id = rw.rw_id AND user.user_rt_id = rt.rt_id");
        $html .= '<center><h3 style="font-family:sans-serif; margin-bottom: 10px; margin-top: -25px;">LAPORAN DATA SEMUA WARGA</h3></center>';
    } else {
        $sql = mysqli_query($con, "SELECT * FROM user, rt, rw WHERE rt.rt_rw_id = rw.rw_id AND user.user_rt_id = rt.rt_id AND user.user_status_tinggal = '$s'");
        $html .= '<center><h3 style="font-family:sans-serif; margin-bottom: 10px; margin-top: -25px;">Laporan Data Warga - ' . $s . '</h3></center>';
    }

    // $html .= '<center><h5 style="font-family: Arial, Helvetica, sans-serif;">Dari : ' . $dari . ' - Hingga : ' . $hingga . '</h5></center><hr/><br/>';
    $html .= '<table border="1" cellpadding="2" cellspacing="0" width="100%">
 <tr style="font-family:sans-serif; font-size:10px">
 <th>No.</th>
 <th>Nama</th>
 <th>TTL</th>
 <th>RW / RT</th>
 <th>Jenis kelamin</th>
 <th>WN</th>
 <th>Alamat</th>
 <th>Status tinggal</th>
 <th>Pekerjaan</th>
 <th>Status kawin</th>
 <th>Pendidikan</th>
 </tr>';
    $no = 1;
    while ($data = mysqli_fetch_array($sql)) {

        $html .= "<tr style='font-family:sans-serif; font-size:10px'>
 <td>" . $no . ".</td>
 <td>" . $data['user_nama'] . "</td>
 <td>" . $data['user_tempat_lahir'] . ", " . date('d-m-Y', strtotime($data['user_tgl_lahir'])) . "</td>
 <td>" . $data['rw_nama'] . " / " . $data['rt'] . "</td>
 <td>" . $data['user_jk'] . "</td>
 <td>" . $data['user_wn'] . "</td>
 <td>" . $data['user_alamat'] . "</td>
 <td>" . $data['user_status_tinggal'] . "</td>
 <td>" . $data['user_pekerjaan'] . "</td>
 <td>" . $data['user_status_kawin'] . "</td>
 <td>" . $data['user_jenjang_pendidikan'] . "</td>
 </tr>";
        $no++;
    }
}





// ===============================================================================================================

else {
    if ($s == '0') {
        $html .= '<center><h3 style="font-family:sans-serif; margin-bottom: 10px; margin-top: -25px;">LAPORAN DATA WARGA RW:' . $datart['rw_nama'] . ' / RT:' . $datart['rt'] . '</h3></center>';
    } else {
        $html .= '<center><h3 style="font-family:sans-serif; margin-bottom: 10px; margin-top: -25px;">Laporan Data Warga - ' . $s . ' - RW:' . $datart['rw_nama'] . ' / RT:' . $datart['rt'] . '</h3></center>';
    }

    if ($s == '0') {
        $sql = mysqli_query($con, "SELECT * FROM user, rt, rw WHERE rt.rt_rw_id = rw.rw_id AND user.user_rt_id = rt.rt_id AND user.user_rt_id = '$idrt'");
    } else {
        $sql = mysqli_query($con, "SELECT * FROM user, rt, rw WHERE rt.rt_rw_id = rw.rw_id AND user.user_rt_id = rt.rt_id AND user.user_rt_id = '$idrt' AND user.user_status_tinggal = '$s'");
    }

    // $html .= '<center><h5 style="font-family: Arial, Helvetica, sans-serif;">Dari : ' . $dari . ' - Hingga : ' . $hingga . '</h5></center><hr/><br/>';
    $html .= '<table border="1" cellpadding="2" cellspacing="0" width="100%">
 <tr style="font-family:sans-serif; font-size:10px">
 <th>No.</th>
 <th>Nama</th>
 <th>TTL</th>
 <th>RW / RT</th>
 <th>Jenis kelamin</th>
 <th>WN</th>
 <th>Alamat</th>
 <th>Status tinggal</th>
 <th>Pekerjaan</th>
 <th>Status kawin</th>
 <th>Pendidikan</th>
 </tr>';
    $no = 1;
    while ($data = mysqli_fetch_array($sql)) {

        $html .= "<tr style='font-family:sans-serif; font-size:10px'>
 <td>" . $no . ".</td>
 <td>" . $data['user_nama'] . "</td>
 <td>" . $data['user_tempat_lahir'] . ", " . date('d-m-Y', strtotime($data['user_tgl_lahir'])) . "</td>
 <td>" . $data['rw_nama'] . " / " . $data['rt'] . "</td>
 <td>" . $data['user_jk'] . "</td>
 <td>" . $data['user_wn'] . "</td>
 <td>" . $data['user_alamat'] . "</td>
 <td>" . $data['user_status_tinggal'] . "</td>
 <td>" . $data['user_pekerjaan'] . "</td>
 <td>" . $data['user_status_kawin'] . "</td>
 <td>" . $data['user_jenjang_pendidikan'] . "</td>
 </tr>";
        $no++;
    }
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
