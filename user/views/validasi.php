<!-- Page Header Start -->
<div class="container-fluid page-header py-6 wow fadeIn" data-wow-delay="0.1s">
    <div class="container text-center pt-5 pb-3">
        <h2 class="display-4 text-white animated slideInDown mb-1">Validasi data anda</h2>
    </div>
</div>
<!-- Page Header End -->


<!-- About Start -->
<div class="container-xxl py-12">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-12 wow fadeInUp" data-wow-delay="0.1s">
                <div class="card">
                    <form action="?page=validasi-cari" method="post" enctype="multipart/form-data"></form>
                    <div class="card-body">
                        <form action="?page=validasi-cari" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <input type="text" name="penduduk_nik" class="form-control form-control-lg" placeholder="Masukan NIK Anda..." required>
                                    </div>
                                    <div class="col-lg-6">
                                        <input type="submit" class="btn btn-primary btn-lg btn-block" name="Cari" value="Cari">
                                    </div>
                                </div>
                            </div>
                        </form>
                        <?php
                        $sql = mysqli_query($con, "SELECT * FROM ")
                        ?>
                        <div class="row">
                            <div class="col-lg-6">

                            </div>
                            <div class="col-lg-6">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- About End -->