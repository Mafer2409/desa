<div class="content-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h3 class="mb-2">Laporan</h3>
            <div class="card">

                <div class="card-header">
                    <form class="mx-3" action="" method="post">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="mt-3">Pilih Laporan</label>
                                    <select name="bln" class="form-control">
                                        <option value="">- Pilih Laporan -</option>
                                        <option value="Kelahiran">Kelahiran</option>
                                        <option value="Kematian">Kematian</option>
                                        <option value="Masuk">Pindah Masuk</option>
                                        <option value="Keluar">Pindah Keluar</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="mt-3">Pilih Bulan</label>
                                    <select name="bln" class="form-control">
                                        <option value="">- Pilih bulan -</option>
                                        <option value="01">Januari</option>
                                        <option value="02">Februari</option>
                                        <option value="03">Maret</option>
                                        <option value="04">April</option>
                                        <option value="05">Mei</option>
                                        <option value="06">Juni</option>
                                        <option value="07">Juli</option>
                                        <option value="08">Agustus</option>
                                        <option value="09">September</option>
                                        <option value="10">Oktober</option>
                                        <option value="11">November</option>
                                        <option value="12">Desember</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="mt-3">Pilih Tahun</label>
                                    <select name="thn" class="form-control" required>
                                        <option value="">- Pilih tahun -</option>
                                        <option value="2019">2019</option>
                                        <option value="2020">2020</option>
                                        <option value="2021">2021</option>
                                        <option value="2022">2022</option>
                                        <option value="2023">2023</option>
                                        <option value="2024">2024</option>
                                        <option value="2025">2025</option>
                                        <option value="2026">2026</option>
                                        <option value="2027">2027</option>
                                        <option value="2028">2028</option>
                                        <option value="2029">2029</option>
                                        <option value="2030">2030</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="mt-3">Pilih Jenis Kelamin</label>
                                    <select name="bln" class="form-control">
                                        <option value="">- Pilih Jenis Kelamin -</option>
                                        <option value="Laki-laki">Laki-laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="mt-3">Pilih Pendidikan</label>
                                    <select class="form-control" name="user_jenjang_pendidikan" required>
                                        <option value="">-- Pilih Pendidikan --</option>
                                        <option value="TK">TK</option>
                                        <option value="SD">SD</option>
                                        <option value="SLTP/SMP">SLTP/SMP</option>
                                        <option value="SLTA/SMA/SMK">SLTA/SMA/SMK</option>
                                        <option value="S1">S1</option>
                                        <option value="S2">S2</option>
                                        <option value="S3">S3</option>
                                        <option value="Profesor">Profesor</option>
                                        <option value="Tidak Sekolah">Tidak Sekolah</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="row">
                                    <input type="submit" name="cari" class="btn btn-success mt-5" value="Cari">
                                    <a href="../assets/report/report-admin/report-kelahiran.php?bln=0&thn=0" class="btn btn-primary ml-2 mt-5" target="_blank">Cetak</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>