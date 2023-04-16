<?php
session_start();
include '../system/koneksi.php';
if (!isset($_SESSION['id_admin'])) {
    echo "<script>alert('Anda harus login terlebih dahulu !');window.location='index.php';</script>";
} else {
    $idadmin = $_SESSION['id_admin'];
    $namaadmin = $_SESSION['nama_admin'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin</title>
    <link rel="stylesheet" href="vendors/feather/feather.css">
    <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="vendors/datatables.net-bs4/dataTables.bootstrap4.css">
    <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" type="text/css" href="js/select.dataTables.min.css">
    <link rel="stylesheet" href="css/vertical-layout-light/style.css">
    <link rel="shortcut icon" href="../assets/img/logo-flotim.jpg" />

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Data Table -->
    <link rel="stylesheet" href="datatables/css/lib/datatable/dataTables.bootstrap.min.css">

    <!-- CKEditor -->
    <script type="text/javascript" src="../assets/ckeditor/ckeditor.js"></script>

    <!-- Chart -->
    <script type="text/javascript" src="chart/Chart.js"></script>
</head>

<body>
    <div class="container-scroller">
        <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
                <a class="navbar-brand brand-logo mr-5" href="?page=home"><img src="../assets/img/logo-flotim.jpg" class="mr-2" alt="logo" /></a>
                <a class="navbar-brand brand-logo-mini" href="?page=home"><img src="../assets/img/logo-flotim.jpg" alt="logo" /></a>
            </div>
            <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
                <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                    <span class="icon-menu"></span>
                </button>
                <ul class="navbar-nav mr-lg-2">
                    <li class="nav-item nav-search d-none d-lg-block">
                        <div class="input-group">
                            <div class="input-group-prepend hover-cursor" id="navbar-search-icon"></div>
                        </div>
                    </li>
                </ul>
                <ul class="navbar-nav navbar-nav-right">
                    <li class="nav-item dropdown">
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown"></div>
                    </li>
                    <li class="nav-item nav-profile dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
                            <img src="../assets/img/logo-flotim.jpg" alt="profile" />
                        </a>
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
                            <a class="dropdown-item" href="index.php" onclick="return confirm('Yakin ingin keluar ?')">
                                <i class="ti-power-off text-primary"></i>
                                Logout
                            </a>
                        </div>
                    </li>
                </ul>
                <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
                    <span class="icon-menu"></span>
                </button>
            </div>
        </nav>


        <!-- SIDEBAR -->
        <div class="container-fluid page-body-wrapper">
            <nav class="sidebar sidebar-offcanvas" id="sidebar">
                <ul class="nav">
                    <li class="nav-item">
                        <a class="nav-link" href="?page=home">
                            <i class="icon-grid menu-icon"></i>
                            <span class="menu-title">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="?page=penduduk">
                            <i class="icon-head menu-icon"></i>
                            <span class="menu-title">Penduduk</span>
                        </a>
                    </li>
                    <!-- <li class="nav-item">
                        <a class="nav-link" href="?page=jenis">
                            <i class="icon-layout menu-icon"></i>
                            <span class="menu-title">Jenis</span>
                        </a>
                    </li> -->
                    <!-- <li class="nav-item">
                        <a class="nav-link" href="?page=user">
                            <i class="icon-head menu-icon"></i>
                            <span class="menu-title">User</span>
                        </a>
                    </li> -->
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#ui-warga" aria-expanded="false" aria-controls="ui-basic">
                            <i class="icon-head menu-icon"></i>
                            <span class="menu-title">Data Warga</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="collapse" id="ui-warga">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link" href="?page=user">Semua warga</a></li>
                                <li class="nav-item"> <a class="nav-link" href="?page=tetap">Tetap</a></li>
                                <li class="nav-item"> <a class="nav-link" href="?page=tidak-tetap">Tidak Tetap</a></li>
                                <li class="nav-item"> <a class="nav-link" href="?page=meninggal">Meninggal</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="?page=rt">
                            <i class="icon-head menu-icon"></i>
                            <span class="menu-title">RT</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                            <i class="icon-layout menu-icon"></i>
                            <span class="menu-title">Administrasi</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="collapse" id="ui-basic">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link" href="?page=kelahiran">Kelahiran</a></li>
                                <li class="nav-item"> <a class="nav-link" href="?page=kematian">Kematian</a></li>
                                <li class="nav-item"> <a class="nav-link" href="?page=pindah">Pindah</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="?page=berita">
                            <i class="icon-paper menu-icon"></i>
                            <span class="menu-title">Berita</span>
                        </a>
                    </li>
                    <!-- <li class="nav-item">
                        <a class="nav-link" href="?page=laporan">
                            <i class="icon-file menu-icon"></i>
                            <span class="menu-title">Laporan</span>
                        </a>
                    </li> -->
                    <li class="nav-item">
                        <a class="nav-link" href="?page=kepala_desa">
                            <i class="icon-head menu-icon"></i>
                            <span class="menu-title">Kepala Desa</span>
                        </a>
                    </li>
                    <!-- <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#form-elements" aria-expanded="false" aria-controls="form-elements">
                            <i class="icon-columns menu-icon"></i>
                            <span class="menu-title">Form elements</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="collapse" id="form-elements">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"><a class="nav-link" href="pages/forms/basic_elements.html">Basic Elements</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#charts" aria-expanded="false" aria-controls="charts">
                            <i class="icon-bar-graph menu-icon"></i>
                            <span class="menu-title">Charts</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="collapse" id="charts">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link" href="pages/charts/chartjs.html">ChartJs</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#tables" aria-expanded="false" aria-controls="tables">
                            <i class="icon-grid-2 menu-icon"></i>
                            <span class="menu-title">Tables</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="collapse" id="tables">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link" href="pages/tables/basic-table.html">Basic table</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#icons" aria-expanded="false" aria-controls="icons">
                            <i class="icon-contract menu-icon"></i>
                            <span class="menu-title">Icons</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="collapse" id="icons">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link" href="pages/icons/mdi.html">Mdi icons</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
                            <i class="icon-head menu-icon"></i>
                            <span class="menu-title">User Pages</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="collapse" id="auth">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link" href="pages/samples/login.html"> Login </a></li>
                                <li class="nav-item"> <a class="nav-link" href="pages/samples/register.html"> Register </a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#error" aria-expanded="false" aria-controls="error">
                            <i class="icon-ban menu-icon"></i>
                            <span class="menu-title">Error pages</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="collapse" id="error">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link" href="pages/samples/error-404.html"> 404 </a></li>
                                <li class="nav-item"> <a class="nav-link" href="pages/samples/error-500.html"> 500 </a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="pages/documentation/documentation.html">
                            <i class="icon-paper menu-icon"></i>
                            <span class="menu-title">Documentation</span>
                        </a>
                    </li> -->


                </ul>
            </nav>
            <!-- END SIDEBAR -->

            <div class="main-panel">
                <div class="content-wrapper">
                    <?php
                    include '../system/koneksi.php';
                    if (@$_GET['page'] == 'home' || @$_GET['page'] == '') {
                        include "views/home.php";
                    } else if (@$_GET['page'] == 'jenis') {
                        include "views/jenis.php";
                    } else if (@$_GET['page'] == 'hapus_jenis') {
                        include "views/hapus_jenis.php";
                    } else if (@$_GET['page'] == 'edit_jenis') {
                        include "views/edit_jenis.php";
                    } else if (@$_GET['page'] == 'user') {
                        include "views/user.php";
                    } else if (@$_GET['page'] == 'rt') {
                        include "views/rt.php";
                    } else if (@$_GET['page'] == 'edit_rt') {
                        include "views/edit_rt.php";
                    } else if (@$_GET['page'] == 'hapus_rt') {
                        include "views/hapus_rt.php";
                    } else if (@$_GET['page'] == 'kelahiran') {
                        include "views/kelahiran.php";
                    } else if (@$_GET['page'] == 'aksikelahiran') {
                        include "views/aksikelahiran.php";
                    } else if (@$_GET['page'] == 'kematian') {
                        include "views/kematian.php";
                    } else if (@$_GET['page'] == 'aksikematian') {
                        include "views/aksikematian.php";
                    } else if (@$_GET['page'] == 'pindah') {
                        include "views/pindah.php";
                    } else if (@$_GET['page'] == 'aksipindah') {
                        include "views/aksipindah.php";
                    } else if (@$_GET['page'] == 'kepala_desa') {
                        include "views/kepala_desa.php";
                    } else if (@$_GET['page'] == 'edit_kepala_desa') {
                        include "views/edit_kepala_desa.php";
                    } else if (@$_GET['page'] == 'cari-user') {
                        include "views/cari-user.php";
                    } else if (@$_GET['page'] == 'berita') {
                        include "views/berita.php";
                    } else if (@$_GET['page'] == 'edit-berita') {
                        include "views/edit-berita.php";
                    } else if (@$_GET['page'] == 'hapus-berita') {
                        include "views/hapus-berita.php";
                    } else if (@$_GET['page'] == 'tambah-berita') {
                        include "views/tambah-berita.php";
                    } else if (@$_GET['page'] == 'info_user') {
                        include "views/info_user.php";
                    } else if (@$_GET['page'] == 'cari-kelahiran') {
                        include "views/cari-kelahiran.php";
                    } else if (@$_GET['page'] == 'cari-kematian') {
                        include "views/cari-kematian.php";
                    } else if (@$_GET['page'] == 'cari-pindah') {
                        include "views/cari-pindah.php";
                    } else if (@$_GET['page'] == 'laporan') {
                        include "views/laporan.php";
                    } else if (@$_GET['page'] == 'tetap') {
                        include "views/tetap.php";
                    } else if (@$_GET['page'] == 'tidak-tetap') {
                        include "views/tidak-tetap.php";
                    } else if (@$_GET['page'] == 'meninggal') {
                        include "views/meninggal.php";
                    } else if (@$_GET['page'] == 'cari-tetap') {
                        include "views/cari-tetap.php";
                    } else if (@$_GET['page'] == 'cari-tidak-tetap') {
                        include "views/cari-tidak-tetap.php";
                    } else if (@$_GET['page'] == 'cari-meninggal') {
                        include "views/cari-meninggal.php";
                    } else if (@$_GET['page'] == 'edit-user') {
                        include "views/edit-user.php";
                    } else if (@$_GET['page'] == 'hapus-user') {
                        include "views/hapus-user.php";
                    } else if (@$_GET['page'] == 'penduduk') {
                        include "views/penduduk.php";
                    } else if (@$_GET['page'] == 'info_penduduk') {
                        include "views/info_penduduk.php";
                    } else if (@$_GET['page'] == 'edit_penduduk') {
                        include "views/edit_penduduk.php";
                    } else if (@$_GET['page'] == 'hapus_penduduk') {
                        include "views/hapus_penduduk.php";
                    }
                    ?>
                </div>
                <footer class="footer">
                    <div class="d-sm-flex justify-content-center justify-content-sm-between">
                        <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2021. Premium <a href="https://www.bootstrapdash.com/" target="_blank">Bootstrap admin template</a> from BootstrapDash. All rights reserved.</span>
                        <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="ti-heart text-danger ml-1"></i></span>
                    </div>
                    <div class="d-sm-flex justify-content-center justify-content-sm-between">
                        <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Distributed by <a href="https://www.themewagon.com/" target="_blank">Themewagon</a></span>
                    </div>
                </footer>
            </div>
        </div>
    </div>

    <!-- Data Table -->
    <script src="datatables/js/lib/data-table/datatables.min.js"></script>
    <script src="datatables/js/lib/data-table/dataTables.bootstrap.min.js"></script>
    <script src="datatables/js/lib/data-table/dataTables.buttons.min.js"></script>
    <script src="datatables/js/lib/data-table/buttons.bootstrap.min.js"></script>
    <script src="datatables/js/lib/data-table/jszip.min.js"></script>
    <script src="datatables/js/lib/data-table/vfs_fonts.js"></script>
    <script src="datatables/js/lib/data-table/buttons.html5.min.js"></script>
    <script src="datatables/js/lib/data-table/buttons.print.min.js"></script>
    <script src="datatables/js/lib/data-table/buttons.colVis.min.js"></script>
    <script src="datatables/js/init/datatables-init.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#bootstrap-data-table-export').DataTable();
        });
    </script>

    <script src="vendors/js/vendor.bundle.base.js"></script>
    <script src="vendors/chart.js/Chart.min.js"></script>
    <script src="vendors/datatables.net/jquery.dataTables.js"></script>
    <script src="vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
    <script src="js/dataTables.select.min.js"></script>
    <script src="js/off-canvas.js"></script>
    <script src="js/hoverable-collapse.js"></script>
    <script src="js/template.js"></script>
    <script src="js/settings.js"></script>
    <script src="js/todolist.js"></script>
    <script src="js/dashboard.js"></script>
    <script src="js/Chart.roundedBarCharts.js"></script>
</body>

</html>