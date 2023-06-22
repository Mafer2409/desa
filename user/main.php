<?php
session_start();
include '../system/koneksi.php';
if (!isset($_SESSION['id_user'])) {
    echo "<script>alert('Anda harus login terlebih dahulu !');window.location='../index.php';</script>";
} else {
    $iduser = $_SESSION['id_user'];
    $nikuser = $_SESSION['nik_user'];
    $namauser = $_SESSION['nama_user'];
    $idrt = $_SESSION['id_rt'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>DESA</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&family=Playfair+Display:wght@600;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="../lib/animate/animate.min.css" rel="stylesheet">
    <link href="../lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="../bootstrap/dist/css/bootstrap.min.css" crossorigin="anonymous">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="../css/style.css" rel="stylesheet">

    <!-- DATATABLES -->
    <link rel="stylesheet" href="../assets/datatables/css/lib/datatable/dataTables.bootstrap.min.css">
</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-grow text-primary" role="status"></div>
    </div>
    <!-- Spinner End -->

    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top py-lg-0 px-lg-5 wow fadeIn" data-wow-delay="0.1s">
        <a href="?page=home" class="navbar-brand ms-4 ms-lg-0">
            <h1 class="text-primary m-0">DESA</h1>
        </a>
        <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav mx-auto p-4 p-lg-0">
                <a href="?page=home" class="nav-item nav-link">Home</a>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Administrasi</a>
                    <div class="dropdown-menu m-0">
                        <a href="?page=kelahiran" class="dropdown-item">Kelahiran</a>
                        <a href="?page=kematian" class="dropdown-item">Kematian</a>
                        <a href="?page=pindah" class="dropdown-item">Pindah</a>
                    </div>
                </div>
                <!-- <a href="?page=validasi" class="nav-item nav-link">Validasi</a> -->
                <a href="?page=berita" class="nav-item nav-link">Berita</a>
                <a href="../index.php" class="nav-item nav-link text-danger" onclick="return confirm('Yakin ingin keluar ?')">Logout</a>
            </div>
            <div class=" d-none d-lg-flex">
                <!-- <div class="flex-shrink-0 btn-lg-square border border-light rounded-circle">
                    <i class="fa fa-phone text-primary"></i>
                </div>
                <div class="ps-3">
                    <small class="text-primary mb-0">Call Us</small>
                    <p class="text-light fs-5 mb-0">+012 345 6789</p>
                </div> -->
            </div>
        </div>
    </nav>
    <!-- Navbar End -->


    <div class="content-wrapper">
        <?php
        include '../system/koneksi.php';
        if (@$_GET['page'] == 'home' || @$_GET['page'] == '') {
            include "views/home.php";
        } else if (@$_GET['page'] == 'jenis') {
            include "views/jenis.php";
        } else if (@$_GET['page'] == 'kelahiran') {
            include "views/kelahiran.php";
        } else if (@$_GET['page'] == 'kematian') {
            include "views/kematian.php";
        } else if (@$_GET['page'] == 'pindah') {
            include "views/pindah.php";
        } else if (@$_GET['page'] == 'berita') {
            include "views/berita.php";
        } else if (@$_GET['page'] == 'detail-berita') {
            include "views/detail-berita.php";
        } else if (@$_GET['page'] == 'read-kelahiran') {
            include "views/read-kelahiran.php";
        } else if (@$_GET['page'] == 'read-kematian') {
            include "views/read-kematian.php";
        } else if (@$_GET['page'] == 'read-administrasi') {
            include "views/read-administrasi.php";
        } else if (@$_GET['page'] == 'validasi') {
            include "views/validasi.php";
        } else if (@$_GET['page'] == 'validasi-cari') {
            include "views/validasi-cari.php";
        }
        ?>
    </div>


    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-light footer my-6 mb-0 py-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-light mb-4">Office Address</h4>
                    <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>Jl. Trans Waiwerang, Desa Nelelamadike, Kec. Ile Boleng, Flores Timur</p>
                    <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>+62 813 3810 7679</p>
                    <p class="mb-2"><i class="fa fa-envelope me-3"></i>stefanus.s.m.b.andreas@gmail.com</p>
                    <div class="d-flex pt-2">
                        <a class="btn btn-square btn-outline-light rounded-circle me-1" href=""><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-square btn-outline-light rounded-circle me-1" href=""><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-square btn-outline-light rounded-circle me-1" href=""><i class="fab fa-youtube"></i></a>
                        <a class="btn btn-square btn-outline-light rounded-circle me-0" href=""><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <!-- <h4 class="text-light mb-4">Quick Links</h4>
                    <a class="btn btn-link" href="">About Us</a>
                    <a class="btn btn-link" href="">Contact Us</a>
                    <a class="btn btn-link" href="">Our Services</a>
                    <a class="btn btn-link" href="">Terms & Condition</a>
                    <a class="btn btn-link" href="">Support</a> -->
                </div>
                <div class="col-lg-3 col-md-6">
                    <!-- <h4 class="text-light mb-4">Quick Links</h4>
                    <a class="btn btn-link" href="">About Us</a>
                    <a class="btn btn-link" href="">Contact Us</a>
                    <a class="btn btn-link" href="">Our Services</a>
                    <a class="btn btn-link" href="">Terms & Condition</a>
                    <a class="btn btn-link" href="">Support</a> -->
                </div>
                <div class="col-lg-3 col-md-6">
                    <!-- <h4 class="text-light mb-4">Photo Gallery</h4>
                    <div class="row g-2">
                        <div class="col-4">
                            <img class="img-fluid bg-light rounded p-1" src="img/product-1.jpg" alt="Image">
                        </div>
                        <div class="col-4">
                            <img class="img-fluid bg-light rounded p-1" src="img/product-2.jpg" alt="Image">
                        </div>
                        <div class="col-4">
                            <img class="img-fluid bg-light rounded p-1" src="img/product-3.jpg" alt="Image">
                        </div>
                        <div class="col-4">
                            <img class="img-fluid bg-light rounded p-1" src="img/product-2.jpg" alt="Image">
                        </div>
                        <div class="col-4">
                            <img class="img-fluid bg-light rounded p-1" src="img/product-3.jpg" alt="Image">
                        </div>
                        <div class="col-4">
                            <img class="img-fluid bg-light rounded p-1" src="img/product-1.jpg" alt="Image">
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Copyright Start -->
    <div class="container-fluid copyright text-light py-4 wow fadeIn" data-wow-delay="0.1s">
        <div class="container">
            <div class="row">
                <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                    &copy; <a href="#">Sistem Kependudukan Desa Nelelamadike</a>, All Right Reserved.
                </div>
                <div class="col-md-6 text-center text-md-end">
                    <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                    Designed By <a href="#">Steven</a>
                    <br>Distributed By: <a class="border-bottom" href="" target="_blank">Ilmu Komputer UNWIRA</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Copyright End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-circle back-to-top"><i class="bi bi-arrow-up"></i></a>

    <!-- DATATABLES -->
    <script src="../assets/datatables/js/lib/data-table/datatables.min.js"></script>
    <script src="../assets/datatables/js/lib/data-table/dataTables.bootstrap.min.js"></script>
    <script src="../assets/datatables/js/lib/data-table/dataTables.buttons.min.js"></script>
    <script src="../assets/datatables/js/lib/data-table/buttons.bootstrap.min.js"></script>
    <script src="../assets/datatables/js/lib/data-table/jszip.min.js"></script>
    <script src="../assets/datatables/js/lib/data-table/vfs_fonts.js"></script>
    <script src="../assets/datatables/js/lib/data-table/buttons.html5.min.js"></script>
    <script src="../assets/datatables/js/lib/data-table/buttons.print.min.js"></script>
    <script src="../assets/datatables/js/lib/data-table/buttons.colVis.min.js"></script>
    <script src="../assets/datatables/js/init/datatables-init.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#bootstrap-data-table-export').DataTable();
        });
    </script>

    <!-- JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" crossorigin="anonymous"></script>
    <script src="../bootstrap/dist/js/bootstrap.min.js" crossorigin="anonymous"></script>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script> -->
    <script src="../lib/wow/wow.min.js"></script>
    <script src="../lib/easing/easing.min.js"></script>
    <script src="../lib/waypoints/waypoints.min.js"></script>
    <script src="../lib/counterup/counterup.min.js"></script>
    <script src="../lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="../js/main.js"></script>
</body>

</html>