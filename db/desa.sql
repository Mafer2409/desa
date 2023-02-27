-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 27 Feb 2023 pada 17.53
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
  `administrasi_ktp` text NOT NULL,
  `administrasi_kk` text NOT NULL,
  `administrasi_sk_pindah` text NOT NULL,
  `administrasi_status` varchar(255) NOT NULL,
  `administrasi_tanggal_verifikasi` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `administrasi`
--

INSERT INTO `administrasi` (`administrasi_id`, `administrasi_user`, `administrasi_rt`, `administrasi_tanggal`, `administrasi_ket`, `administrasi_dari`, `administrasi_tujuan`, `administrasi_ktp`, `administrasi_kk`, `administrasi_sk_pindah`, `administrasi_status`, `administrasi_tanggal_verifikasi`) VALUES
(2, 5, 2, '2022-10-24', 'Masuk', '', '', 'Tes3 - KTP - 1666619498.png', 'Tes3 - KK - 1666619498.jpg', 'Tes3 - SK Pindah - 1666619498.jpg', 'Selesai', '2022-10-24'),
(3, 5, 2, '2022-10-26', 'Masuk', '', '', 'Tes3 - KTP - 1666786648.png', 'Tes3 - KK - 1666786648.png', 'Tes3 - SK Pindah - 1666786648.png', 'Menunggu Verifikasi RT', '0000-00-00');

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
  `kelahiran_ktp_ayah` text NOT NULL,
  `kelahiran_nama_ibu` varchar(255) NOT NULL,
  `kelahiran_ktp_ibu` text NOT NULL,
  `kelahiran_sk_lahir` text NOT NULL,
  `kelahiran_status` varchar(255) NOT NULL,
  `kelahiran_tanggal_verifikasi` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kelahiran`
--

INSERT INTO `kelahiran` (`kelahiran_id`, `kelahiran_user`, `kelahiran_rt`, `kelahiran_tanggal`, `kelahiran_nama_anak`, `kelahiran_tempat_lahir`, `kelahiran_tanggal_lahir`, `kelahiran_jk`, `kelahiran_agama`, `kelahiran_alamat`, `kelahiran_nama_ayah`, `kelahiran_ktp_ayah`, `kelahiran_nama_ibu`, `kelahiran_ktp_ibu`, `kelahiran_sk_lahir`, `kelahiran_status`, `kelahiran_tanggal_verifikasi`) VALUES
(1, 5, 2, '2023-09-24', 'Tes 3 pu kelahiran', 'Tes3x', '2022-10-09', 'Laki-laki', '', '', 'Tes 3', 'Tes3 - KTP Ayah - 1666593089.jpg', '3 Tess', 'Tes3 - KTP Ibu - 1666593089.png', 'Tes3 - SK Lahir - 1666593089.jpg', 'Selesai', '2022-10-24'),
(2, 5, 2, '2023-06-24', 'Tesss Anak', 'ysasiuai', '2000-09-10', 'Laki-laki', '', '', 'Tesasalsk', 'Tes3 - KTP Ayah - 1666617591.png', 'yufwkf', 'Tes3 - KTP Ibu - 1666617591.jfif', 'Tes3 - SK Lahir - 1666617591.jpg', 'Selesai', '2022-10-24'),
(3, 5, 2, '2022-06-24', 'Ketiga', 'Tiga', '2002-11-10', 'Perempuan', '', '', 'Tes 3', 'Tes3 - KTP Ayah - 1666620068.png', 'Tess yy', 'Tes3 - KTP Ibu - 1666620068.jpg', 'Tes3 - SK Lahir - 1666620068.jpg', 'Menunggu Verifikasi RT', '0000-00-00'),
(4, 5, 2, '2022-10-26', 'Stephanus Andreas', 'Kuala Lumpur', '1997-08-31', 'Laki-laki', '', '', 'Andreas Pandai', 'Tes3 - KTP Ayah - 1666786143.png', 'Yasinta Sura', 'Tes3 - KTP Ibu - 1666786143.png', 'Tes3 - SK Lahir - 1666786143.png', 'Menunggu Verifikasi RT', '0000-00-00'),
(5, 6, 5, '2022-10-26', 'stev', 'lamanele', '2021-03-10', 'Laki-laki', '', '', 'andreas', 'Tes4 - KTP Ayah - 1666787647.png', 'yasinta', 'Tes4 - KTP Ibu - 1666787647.png', 'Tes4 - SK Lahir - 1666787647.jpeg', 'Selesai', '2022-10-26');

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
  `kematian_sk_dokter` text NOT NULL,
  `kematian_ktp_almarhum` text NOT NULL,
  `kematian_akte` text NOT NULL,
  `kematian_status` varchar(255) NOT NULL,
  `kematian_tanggal_verifikasi` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kematian`
--

INSERT INTO `kematian` (`kematian_id`, `kematian_user`, `kematian_rt`, `kematian_tanggal`, `kematian_user_meninggal`, `kematian_tempat_meninggal`, `kematian_tanggal_meninggal`, `kematian_sk_dokter`, `kematian_ktp_almarhum`, `kematian_akte`, `kematian_status`, `kematian_tanggal_verifikasi`) VALUES
(1, 5, 2, '2022-10-24', 2, 'Tesssss', '2022-10-10', 'Tes3 - Surat Ket - 1666597635.png', 'Tes3 - KTP Almarhum - 1666597635.jpg', 'Tes3 - Akte - 1666597635.jpg', 'Selesai', '2022-10-24'),
(2, 5, 2, '2022-10-26', 1, 'Lamanele', '2001-12-12', 'Tes3 - Surat Ket - 1666786783.png', 'Tes3 - KTP Almarhum - 1666786783.png', 'Tes3 - Akte - 1666786783.png', 'Menunggu Verifikasi RT', '0000-00-00'),
(3, 2, 2, '2023-02-07', 7, 'Tes', '2022-09-09', 'Tes 2 - Surat Ket - 1675775261.png', 'Tes 2 - KTP Almarhum - 1675775261.png', 'Tes 2 - Akte - 1675775261.png', 'Selesai', '2023-02-07');

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
(1, 'RW:001 / RT:001', 1),
(2, 'RW:002 / RT:001', 5),
(5, 'RW:001 / RT:002', 7),
(6, 'RW:002 / RT:002', 0);

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
(1, '0', 'Tes 1', 'tes1', '2002-09-10', 1, '', 'Laki-laki', '', '', 'Aktif', 'Tetap', 'Karyawan Swasta', '', '', '', ''),
(2, '0', 'Tes 2', 'tes2', '1993-08-04', 2, '', 'Perempuan', '', '', 'Aktif', 'Tidak Tetap', 'Petani', '', '', '', ''),
(5, '0', 'Tes3', 'Tes Tiga', '1999-09-09', 2, '', 'Laki-laki', '', 'Alamat Coyyy', 'Aktif', 'Tetap', 'Nelayan', '', '', '', ''),
(6, '0', 'Tes4', '4tes', '1996-03-03', 5, '', 'Perempuan', '', '', 'Aktif', 'Tetap', 'Petani', '', '', '', ''),
(7, '0', 'sss', 'sss', '2001-03-10', 5, '', 'Laki-laki', '', '', 'Non-Aktif', 'Meninggal', '', '', '', '', ''),
(8, '0', 'Tes 6', 'Tes', '1999-09-23', 1, '', 'Laki-laki', 'WNA', '', 'Aktif', 'Tetap', '', '', '', '', ''),
(9, '23114046', 'Mafer', 'Larantuka', '1996-09-24', 1, 'Katolik', 'Laki-laki', 'WNI', 'Weri', 'Aktif', 'Tidak Tetap', 'Karyawan Swasta', 'Belum Menikah', 'S1', 'manfdz70@gmail.com', '4c08ab9ef09bd1575f65fcd022dd5f83');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indeks untuk tabel `administrasi`
--
ALTER TABLE `administrasi`
  ADD PRIMARY KEY (`administrasi_id`);

--
-- Indeks untuk tabel `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`berita_id`);

--
-- Indeks untuk tabel `jenis`
--
ALTER TABLE `jenis`
  ADD PRIMARY KEY (`jenis_id`);

--
-- Indeks untuk tabel `kelahiran`
--
ALTER TABLE `kelahiran`
  ADD PRIMARY KEY (`kelahiran_id`);

--
-- Indeks untuk tabel `kematian`
--
ALTER TABLE `kematian`
  ADD PRIMARY KEY (`kematian_id`);

--
-- Indeks untuk tabel `kepala_desa`
--
ALTER TABLE `kepala_desa`
  ADD PRIMARY KEY (`kepala_desa_id`);

--
-- Indeks untuk tabel `rt`
--
ALTER TABLE `rt`
  ADD PRIMARY KEY (`rt_id`);

--
-- Indeks untuk tabel `rw`
--
ALTER TABLE `rw`
  ADD PRIMARY KEY (`rw_id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `administrasi`
--
ALTER TABLE `administrasi`
  MODIFY `administrasi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `berita`
--
ALTER TABLE `berita`
  MODIFY `berita_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `jenis`
--
ALTER TABLE `jenis`
  MODIFY `jenis_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `kelahiran`
--
ALTER TABLE `kelahiran`
  MODIFY `kelahiran_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `kematian`
--
ALTER TABLE `kematian`
  MODIFY `kematian_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `kepala_desa`
--
ALTER TABLE `kepala_desa`
  MODIFY `kepala_desa_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `rt`
--
ALTER TABLE `rt`
  MODIFY `rt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `rw`
--
ALTER TABLE `rw`
  MODIFY `rw_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
