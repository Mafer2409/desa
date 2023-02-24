<?php
$id = $_GET['id'];
$sqlberita = mysqli_query($con, "SELECT * FROM berita WHERE berita_id = '$id'");
$databerita = mysqli_fetch_assoc($sqlberita);
?>

<!-- Page Header Start -->
<div class="container-fluid page-header py-6 wow fadeIn" data-wow-delay="0.1s">
    <div class="container text-center pt-5 pb-3">
        <h2 class="display-4 text-white animated slideInDown mb-1"><?= $databerita['berita_judul'] ?></h2>
    </div>
</div>
<!-- Page Header End -->


<!-- About Start -->
<div class="container-xxl py-12">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-12 wow fadeInUp" data-wow-delay="0.1s">
                <div class="card">
                    <img class="card-img-top" src="assets/img/berita/<?= $databerita['berita_gambar'] ?>" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title"><?= $databerita['berita_judul'] ?></h5>
                        <p style="font-size:x-small;"><?= $databerita['berita_tanggal'] ?></p>
                        <p class="card-text">
                            <?= $databerita['berita_isi'] ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- About End -->