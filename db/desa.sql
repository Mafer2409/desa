-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 09 Jun 2023 pada 14.52
-- Versi Server: 10.1.29-MariaDB
-- PHP Version: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `desa`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_nama` varchar(255) NOT NULL,
  `admin_username` varchar(255) NOT NULL,
  `admin_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_nama`, `admin_username`, `admin_password`) VALUES
(1, 'Administrator', 'admin', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Struktur dari tabel `administrasi`
--

CREATE TABLE `administrasi` (
  `administrasi_id` int(11) NOT NULL,
  `administrasi_user` int(11) NOT NULL,
  `administrasi_rt` int(11) NOT NULL,
  `administrasi_tanggal` date NOT NULL,
  `administrasi_ket` varchar(255) NOT NULL,
  `administrasi_dari` text NOT NULL,
  `administrasi_tujuan` text NOT NULL,
  `administrasi_alasan` varchar(255) NOT NULL,
  `administrasi_ktp` text NOT NULL,
  `administrasi_kk` text NOT NULL,
  `administrasi_sk_pindah` text NOT NULL,
  `administrasi_status` varchar(255) NOT NULL,
  `administrasi_tanggal_verifikasi` date NOT NULL,
  `administrasi_notif` int(11) NOT NULL,
  `administrasi_keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `administrasi`
--

INSERT INTO `administrasi` (`administrasi_id`, `administrasi_user`, `administrasi_rt`, `administrasi_tanggal`, `administrasi_ket`, `administrasi_dari`, `administrasi_tujuan`, `administrasi_alasan`, `administrasi_ktp`, `administrasi_kk`, `administrasi_sk_pindah`, `administrasi_status`, `administrasi_tanggal_verifikasi`, `administrasi_notif`, `administrasi_keterangan`) VALUES
(1, 17, 8, '2023-06-08', 'Keluar', 'Nelelamadike', 'Malaysia', 'Kerja', 'LINUS PATI BOLI - KTP - 1686206605.jpg', 'LINUS PATI BOLI - KK - 1686206605.jpg', 'LINUS PATI BOLI - SK Pindah - 1686206605.png', 'Ditolak RT', '0000-00-00', 1, 'ktp salah'),
(2, 17, 8, '2023-06-08', 'Keluar', 'Nelelamadike', 'Malaysia', 'Kerja', 'LINUS PATI BOLI - KTP - 1686206879.doc', 'LINUS PATI BOLI - KK - 1686206879.jpg', 'LINUS PATI BOLI - SK Pindah - 1686206879.jpg', 'Selesai', '2023-06-08', 0, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `berita`
--

CREATE TABLE `berita` (
  `berita_id` int(11) NOT NULL,
  `berita_judul` text NOT NULL,
  `berita_tanggal` date NOT NULL,
  `berita_isi` text NOT NULL,
  `berita_gambar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `berita`
--

INSERT INTO `berita` (`berita_id`, `berita_judul`, `berita_tanggal`, `berita_isi`, `berita_gambar`) VALUES
(2, 'Pengungsi Banjir di Desa Nelelamadike Kesulitan Fasilitas MCK ', '2023-02-15', '<p>PARA pengungsi bencana banjir bandang yang menghantam Desa Nelelamadike, Pulau Adonara, Kabupaten Flores Timur, Nusa Tenggara Timur (NTT) kesulitan buang air karena tidak ada fasilitas MCK yang memadai di posko-posko pengusian. Kepala Desa Nelelamadike Pius Pedang Malai, saat ditemui mediaindonesia.com, Jumat (9/4), mengatakan, sejak bencana banjir bandang melanda warganya, beberapa waktu lalu, ada 645 orang yang berada di lokasi pengusian yang tersebar di beberapa posko.</p>\r\n\r\n<p>Beberapa posko yang banyak ditempati para pengungsi yakni posko SDN Nelelamadike ada 39 orang, posko balai Desa Nelelamadike ada 354 orang, dan posko rumah-rumah warga ada 182 orang. Sisanya mengungsi di desa-desa tetangga.</p>\r\n\r\n<p>&quot;Saat ini, kesulitan mandi cuci kakus (MCK) dihadapi para pengungsi yang menempati posko-posko pengungsian. Soal MCK ini sangat minim sekali. Di posko sekolah itu hanya ada dua MCK. Sementara di balai desa hanya satu saja. Jadi kita sekarang kesulitan MCK,&quot; tandas Pius Ia mengatakan warga terdampak ini bisa saja MCK di rumah mereka masing-masing. Namun, rumah mereka sudah hancur rata tanah dihantam banjir bandang, Minggu (4/4). &quot;Rata-rata para pengungsi rumahnya hancur, sehingga MCK yang ada tidak bisa digunakan lagi karena semua sudah rata dengan tanah,&quot; ujar dia Menurut dia, akibat tidak ada MCK, warga setempat akhirnya buang air di hutan-hutan kalau MCK di posko ada yang menggunakan. Untuk itu, ia berharap pemerintah bisa membantunya alat portabel untuk MCK bagi para pengungsian yang menempati posko tersebut. &quot;Harapan kami, pemerintah bisa membantu menyediakan fasilitas MCK di posko-posko pengungsian,&quot; jelas dia Dia juga akibat banjir bandang itu sebanyak 55 orang meninggal dunia dan seorang lagi belum ditemukan. Untuk warga yang luka-luka ada 34 orang yang terbagi luka berat ada 3 orang. Luka ringan ada 27 orang, dislokasi 1 orang, dan patang tulang ada 3 orang. &quot;Ada 50 rumah warga yang rusak berat berat dan ringan serta tertimbun longsor dari sebelum bencana itu ada 318 rumah,&quot; tutup dia. (OL-1).</p>\r\n', 'Pengungsi Banjir di Desa Nelelamadike Kesulitan Fasilitas MCK -1676466278.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis`
--

CREATE TABLE `jenis` (
  `jenis_id` int(11) NOT NULL,
  `jenis_nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jenis`
--

INSERT INTO `jenis` (`jenis_id`, `jenis_nama`) VALUES
(1, 'Penduduk Masuk'),
(2, 'Kelahiran'),
(4, 'Kematian'),
(5, 'Penduduk Keluar');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelahiran`
--

CREATE TABLE `kelahiran` (
  `kelahiran_id` int(11) NOT NULL,
  `kelahiran_user` int(11) NOT NULL,
  `kelahiran_rt` int(11) NOT NULL,
  `kelahiran_tanggal` date NOT NULL,
  `kelahiran_nama_anak` varchar(255) NOT NULL,
  `kelahiran_tempat_lahir` varchar(255) NOT NULL,
  `kelahiran_tanggal_lahir` date NOT NULL,
  `kelahiran_jk` varchar(255) NOT NULL,
  `kelahiran_agama` varchar(255) NOT NULL,
  `kelahiran_alamat` text NOT NULL,
  `kelahiran_nama_ayah` varchar(255) NOT NULL,
  `kelahiran_nik_ayah` varchar(255) NOT NULL,
  `kelahiran_umur_ayah` varchar(255) NOT NULL,
  `kelahiran_pekerjaan_ayah` varchar(255) NOT NULL,
  `kelahiran_ktp_ayah` text NOT NULL,
  `kelahiran_nama_ibu` varchar(255) NOT NULL,
  `kelahiran_nik_ibu` varchar(255) NOT NULL,
  `kelahiran_umur_ibu` varchar(255) NOT NULL,
  `kelahiran_pekerjaan_ibu` varchar(255) NOT NULL,
  `kelahiran_ktp_ibu` text NOT NULL,
  `kelahiran_sk_lahir` text NOT NULL,
  `kelahiran_status` varchar(255) NOT NULL,
  `kelahiran_tanggal_verifikasi` date NOT NULL,
  `kelahiran_notif` int(11) NOT NULL,
  `kelahiran_ket` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kelahiran`
--

INSERT INTO `kelahiran` (`kelahiran_id`, `kelahiran_user`, `kelahiran_rt`, `kelahiran_tanggal`, `kelahiran_nama_anak`, `kelahiran_tempat_lahir`, `kelahiran_tanggal_lahir`, `kelahiran_jk`, `kelahiran_agama`, `kelahiran_alamat`, `kelahiran_nama_ayah`, `kelahiran_nik_ayah`, `kelahiran_umur_ayah`, `kelahiran_pekerjaan_ayah`, `kelahiran_ktp_ayah`, `kelahiran_nama_ibu`, `kelahiran_nik_ibu`, `kelahiran_umur_ibu`, `kelahiran_pekerjaan_ibu`, `kelahiran_ktp_ibu`, `kelahiran_sk_lahir`, `kelahiran_status`, `kelahiran_tanggal_verifikasi`, `kelahiran_notif`, `kelahiran_ket`) VALUES
(1, 17, 8, '2023-06-08', 'STEFANIA', 'LAMANELE', '2023-03-08', 'Perempuan', 'Katolik', 'Lamanele', 'LINUS PATI BOLI', '5306130308950001', '28', 'Petani', 'LINUS PATI BOLI - KTP Ayah - 1686201456.jpg', 'MARIA MARIANA UBA DONI', '5306134202960002', '27', 'Ibu Rumah Tangga', 'LINUS PATI BOLI - KTP Ibu - 1686201456.jpg', 'LINUS PATI BOLI - SK Lahir - 1686201456.png', 'Selesai', '2023-06-08', 0, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kematian`
--

CREATE TABLE `kematian` (
  `kematian_id` int(11) NOT NULL,
  `kematian_user` int(11) NOT NULL,
  `kematian_rt` int(11) NOT NULL,
  `kematian_tanggal` date NOT NULL,
  `kematian_user_meninggal` int(11) NOT NULL,
  `kematian_tempat_meninggal` varchar(255) NOT NULL,
  `kematian_tanggal_meninggal` date NOT NULL,
  `kematian_sebab_meninggal` text NOT NULL,
  `kematian_sk_dokter` text NOT NULL,
  `kematian_ktp_almarhum` text NOT NULL,
  `kematian_akte` text NOT NULL,
  `kematian_status` varchar(255) NOT NULL,
  `kematian_tanggal_verifikasi` date NOT NULL,
  `kematian_notif` int(11) NOT NULL,
  `kematian_ket` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kematian`
--

INSERT INTO `kematian` (`kematian_id`, `kematian_user`, `kematian_rt`, `kematian_tanggal`, `kematian_user_meninggal`, `kematian_tempat_meninggal`, `kematian_tanggal_meninggal`, `kematian_sebab_meninggal`, `kematian_sk_dokter`, `kematian_ktp_almarhum`, `kematian_akte`, `kematian_status`, `kematian_tanggal_verifikasi`, `kematian_notif`, `kematian_ket`) VALUES
(1, 17, 8, '2023-06-08', 17, 'Nelelamadike', '2023-05-06', 'serangan jantung', 'LINUS PATI BOLI - Surat Ket - 1686209174.jpg', 'LINUS PATI BOLI - KTP Almarhum - 1686209174.', 'LINUS PATI BOLI - Akte - 1686209174.jpg', 'Selesai', '2023-06-08', 0, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kepala_desa`
--

CREATE TABLE `kepala_desa` (
  `kepala_desa_id` int(11) NOT NULL,
  `kepala_desa_nama` varchar(255) NOT NULL,
  `kepala_desa_ttd` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kepala_desa`
--

INSERT INTO `kepala_desa` (`kepala_desa_id`, `kepala_desa_nama`, `kepala_desa_ttd`) VALUES
(1, 'Pius Pedang Melai', 'Mafer Leitex1666673690.jpeg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penduduk`
--

CREATE TABLE `penduduk` (
  `penduduk_id` int(11) NOT NULL,
  `penduduk_nik` varchar(255) NOT NULL,
  `penduduk_nama` varchar(255) NOT NULL,
  `penduduk_tempat_lahir` varchar(255) NOT NULL,
  `penduduk_tgl_lahir` date NOT NULL,
  `penduduk_rt_id` int(11) NOT NULL,
  `penduduk_agama` varchar(255) NOT NULL,
  `penduduk_jk` varchar(255) NOT NULL,
  `penduduk_wn` varchar(255) NOT NULL,
  `penduduk_alamat` text NOT NULL,
  `penduduk_status_tinggal` varchar(255) NOT NULL,
  `penduduk_pekerjaan` varchar(255) NOT NULL,
  `penduduk_status_kawin` varchar(255) NOT NULL,
  `penduduk_jenjang_pendidikan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `penduduk`
--

INSERT INTO `penduduk` (`penduduk_id`, `penduduk_nik`, `penduduk_nama`, `penduduk_tempat_lahir`, `penduduk_tgl_lahir`, `penduduk_rt_id`, `penduduk_agama`, `penduduk_jk`, `penduduk_wn`, `penduduk_alamat`, `penduduk_status_tinggal`, `penduduk_pekerjaan`, `penduduk_status_kawin`, `penduduk_jenjang_pendidikan`) VALUES
(2, '5306133108950001', 'STEPHANUS SUBAN MANGU BIN ANDREAS', 'KUALA LUMPUR', '1995-08-31', 7, 'Katolik', 'Laki-laki', 'WNI', 'Lamanele', 'Tetap', 'Mahasiswa', 'Belum Menikah', 'S1'),
(3, '5371032807890006', 'YOHANES PAULUS ELPIVIRA BALE PEDAN', 'LAMANELE', '1989-07-28', 1, 'Katolik', 'Laki-laki', 'WNI', 'Lamanele', 'Tetap', 'Petani', 'Sudah Menikah', 'SD'),
(4, '5371032807890006', 'YOHANES PAULUS ELPIVIRA BALE PEDAN', 'LAMANELE', '1989-08-27', 8, 'Katolik', 'Laki-laki', 'WNI', 'Lamanele', 'Tetap', 'Petani', 'Sudah Menikah', 'SD'),
(5, '5306131101900001', 'LAZARUS SAKA SINUN', 'GAYAK', '1990-01-11', 9, 'Katolik', 'Laki-laki', 'WNI', 'Lamanele', 'Tetap', 'Petani', 'Sudah Menikah', 'SLTP/SMP'),
(7, '5306130412110002', 'YOSEPH ABRAHAM SABON GUA', 'LARANTUKA', '1995-12-04', 8, 'Katolik', 'Laki-laki', 'WNI', 'Lamanele', 'Tetap', 'Mahasiswa', 'Belum Menikah', 'S1'),
(8, '5306130307930001', 'YULIUS TARAN NUBI', 'LAMANELE', '1993-07-03', 8, 'Katolik', 'Laki-laki', 'WNI', 'Lamanele', 'Tetap', 'Petani', 'Sudah Menikah', 'S1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rt`
--

CREATE TABLE `rt` (
  `rt_id` int(11) NOT NULL,
  `rt` varchar(255) NOT NULL,
  `rt_ketua` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `rt`
--

INSERT INTO `rt` (`rt_id`, `rt`, `rt_ketua`) VALUES
(7, 'RW:003 / RT:006', 13),
(8, 'RW:001 / RT:001', 15),
(9, 'RW:002 / RT:004', 16);

-- --------------------------------------------------------

--
-- Struktur dari tabel `rw`
--

CREATE TABLE `rw` (
  `rw_id` int(11) NOT NULL,
  `rw_nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `rw`
--

INSERT INTO `rw` (`rw_id`, `rw_nama`) VALUES
(1, '001'),
(2, '002');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_nik` varchar(255) NOT NULL,
  `user_nama` varchar(255) NOT NULL,
  `user_tempat_lahir` varchar(255) NOT NULL,
  `user_tgl_lahir` date NOT NULL,
  `user_rt_id` int(11) NOT NULL,
  `user_agama` varchar(255) NOT NULL,
  `user_jk` varchar(255) NOT NULL,
  `user_wn` varchar(255) NOT NULL,
  `user_alamat` text NOT NULL,
  `user_status` varchar(255) NOT NULL,
  `user_status_tinggal` varchar(255) NOT NULL,
  `user_pekerjaan` varchar(255) NOT NULL,
  `user_status_kawin` varchar(255) NOT NULL,
  `user_jenjang_pendidikan` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`user_id`, `user_nik`, `user_nama`, `user_tempat_lahir`, `user_tgl_lahir`, `user_rt_id`, `user_agama`, `user_jk`, `user_wn`, `user_alamat`, `user_status`, `user_status_tinggal`, `user_pekerjaan`, `user_status_kawin`, `user_jenjang_pendidikan`, `user_email`, `user_password`) VALUES
(13, '5306133108950001', 'STEPHANUS SUBAN MANGU BIN ANDREAS', 'Kuala Lumpur', '1995-08-31', 7, 'Katolik', 'Laki-laki', 'WNI', 'Lamanele', 'Aktif', 'Tetap', 'Mahasiswa', 'Belum Menikah', 'S1', 'stephanus@gmail.com', '2764ca9d34e90313978d044f27ae433b'),
(14, '5371032807890006', 'YOHANES PAULUS ELPIVIRA BALE PEDAN', 'LAMANELE', '1989-07-28', 1, 'Katolik', 'Laki-laki', 'WNI', 'Lamanele', 'Menunggu Verifikasi', 'Tetap', 'Petani', 'Sudah Menikah', 'SLTP/SMP', 'yohanes@gmail.com', '493331a7321bf622460493a8cda5e4c4'),
(15, '5371032807890006', 'YOHANES PAULUS ELPIVIRA BALE PEDAN', 'LAMANELE', '1989-08-27', 8, 'Katolik', 'Laki-laki', 'WNI', 'Lamanele', 'Aktif', 'Tetap', 'Petani', 'Sudah Menikah', 'S1', 'yohanes@gmail.com', '493331a7321bf622460493a8cda5e4c4'),
(16, '5306131101900001', 'LAZARUS SAKA SINUN', 'LAMANELE', '1990-01-11', 9, 'Katolik', 'Laki-laki', 'WNI', 'Lamanele', 'Aktif', 'Tetap', 'Petani', 'Sudah Menikah', 'SLTA/SMA/SMK', 'lazarus@gmail.com', 'a4a6a33a3c5fb414fef69b653c591e0a'),
(17, '5306130308950001', 'LINUS PATI BOLI', 'LAMANELE', '1995-08-31', 8, 'Katolik', 'Laki-laki', 'WNI', 'Lamanele', 'Aktif', 'Tetap', 'Petani', 'Sudah Menikah', 'SLTA/SMA/SMK', 'linus@gmail.com', '6cd71071ccd0edfe7500231c77eea572'),
(18, '5306134202960002', 'MARIA MARIANA UBA DONI', 'BUNGALIO', '1996-02-02', 8, 'Katolik', 'Perempuan', 'WNI', 'Lamanele', 'Aktif', 'Tetap', 'Ibu Rumah Tangga', 'Sudah Menikah', 'SLTA/SMA/SMK', 'maria@gmail.com', '263bce650e68ab4e23f28263760b9fa5'),
(20, '5306130307930001', 'YULIUS TARAN NUBI', 'LAMANELE', '1993-07-31', 8, 'Katolik', 'Laki-laki', 'WNI', 'Lamanele', 'Aktif', 'Tetap', 'Petani', 'Sudah Menikah', 'S1', 'yulius@gmail.com', 'fd8cdd1421c2ea02d7c277a8f2aae6ab');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `administrasi`
--
ALTER TABLE `administrasi`
  ADD PRIMARY KEY (`administrasi_id`);

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`berita_id`);

--
-- Indexes for table `jenis`
--
ALTER TABLE `jenis`
  ADD PRIMARY KEY (`jenis_id`);

--
-- Indexes for table `kelahiran`
--
ALTER TABLE `kelahiran`
  ADD PRIMARY KEY (`kelahiran_id`);

--
-- Indexes for table `kematian`
--
ALTER TABLE `kematian`
  ADD PRIMARY KEY (`kematian_id`);

--
-- Indexes for table `kepala_desa`
--
ALTER TABLE `kepala_desa`
  ADD PRIMARY KEY (`kepala_desa_id`);

--
-- Indexes for table `penduduk`
--
ALTER TABLE `penduduk`
  ADD PRIMARY KEY (`penduduk_id`);

--
-- Indexes for table `rt`
--
ALTER TABLE `rt`
  ADD PRIMARY KEY (`rt_id`);

--
-- Indexes for table `rw`
--
ALTER TABLE `rw`
  ADD PRIMARY KEY (`rw_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `administrasi`
--
ALTER TABLE `administrasi`
  MODIFY `administrasi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `berita`
--
ALTER TABLE `berita`
  MODIFY `berita_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `jenis`
--
ALTER TABLE `jenis`
  MODIFY `jenis_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `kelahiran`
--
ALTER TABLE `kelahiran`
  MODIFY `kelahiran_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `kematian`
--
ALTER TABLE `kematian`
  MODIFY `kematian_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `kepala_desa`
--
ALTER TABLE `kepala_desa`
  MODIFY `kepala_desa_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `penduduk`
--
ALTER TABLE `penduduk`
  MODIFY `penduduk_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `rt`
--
ALTER TABLE `rt`
  MODIFY `rt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `rw`
--
ALTER TABLE `rw`
  MODIFY `rw_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
