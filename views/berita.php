<!-- Page Header Start -->
<div class="container-fluid page-header py-6 wow fadeIn" data-wow-delay="0.1s">
    <div class="container text-center pt-5 pb-3">
        <h1 class="display-4 text-white animated slideInDown mb-1">Berita</h1>
    </div>
</div>
<!-- Page Header End -->


<!-- About Start -->
<div class="container-xxl py-6">
    <div class="container">
        <div class="row g-5">
            <?php
            $sql = mysqli_query($con, "SELECT * FROM berita ORDER BY berita_tanggal DESC");
            while ($data = mysqli_fetch_assoc($sql)) {
            ?>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="card">
                        <img class="card-img-top" src="assets/img/berita/<?= $data['berita_gambar'] ?>" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title"><?= $data['berita_judul'] ?></h5>
                            <p style="font-size:x-small;"><?= $data['berita_tanggal'] ?></p>
                            <p class="card-text">
                                <?= substr($data['berita_isi'], 0, 250) ?> ....
                            </p>
                        </div>
                        <div class="card-body">
                            <a href="?page=detail-berita&id=<?= $data['berita_id'] ?>" class="card-link">Baca...</a>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
</div>
<!-- About End -->