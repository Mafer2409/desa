-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 16 Nov 2022 pada 15.13
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

INSERT INTO `kelahiran` (`kelahiran_id`, `kelahiran_user`, `kelahiran_rt`, `kelahiran_tanggal`, `kelahiran_nama_anak`, `kelahiran_tempat_lahir`, `kelahiran_tanggal_lahir`, `kelahiran_jk`, `kelahiran_nama_ayah`, `kelahiran_ktp_ayah`, `kelahiran_nama_ibu`, `kelahiran_ktp_ibu`, `kelahiran_sk_lahir`, `kelahiran_status`, `kelahiran_tanggal_verifikasi`) VALUES
(1, 5, 2, '2022-10-24', 'Tes 3 pu kelahiran', 'Tes3x', '2022-10-09', 'Laki-laki', 'Tes 3', 'Tes3 - KTP Ayah - 1666593089.jpg', '3 Tess', 'Tes3 - KTP Ibu - 1666593089.png', 'Tes3 - SK Lahir - 1666593089.jpg', 'Selesai', '2022-10-24'),
(2, 5, 2, '2022-10-24', 'Tesss Anak', 'ysasiuai', '2000-09-10', 'Laki-laki', 'Tesasalsk', 'Tes3 - KTP Ayah - 1666617591.png', 'yufwkf', 'Tes3 - KTP Ibu - 1666617591.jfif', 'Tes3 - SK Lahir - 1666617591.jpg', 'Selesai', '2022-10-24'),
(3, 5, 2, '2022-10-24', 'Ketiga', 'Tiga', '2002-11-10', 'Perempuan', 'Tes 3', 'Tes3 - KTP Ayah - 1666620068.png', 'Tess yy', 'Tes3 - KTP Ibu - 1666620068.jpg', 'Tes3 - SK Lahir - 1666620068.jpg', 'Menunggu Verifikasi RT', '0000-00-00'),
(4, 5, 2, '2022-10-26', 'Stephanus Andreas', 'Kuala Lumpur', '1997-08-31', 'Laki-laki', 'Andreas Pandai', 'Tes3 - KTP Ayah - 1666786143.png', 'Yasinta Sura', 'Tes3 - KTP Ibu - 1666786143.png', 'Tes3 - SK Lahir - 1666786143.png', 'Menunggu Verifikasi RT', '0000-00-00'),
(5, 6, 5, '2022-10-26', 'stev', 'lamanele', '2021-03-10', 'Laki-laki', 'andreas', 'Tes4 - KTP Ayah - 1666787647.png', 'yasinta', 'Tes4 - KTP Ibu - 1666787647.png', 'Tes4 - SK Lahir - 1666787647.jpeg', 'Selesai', '2022-10-26');

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
(2, 5, 2, '2022-10-26', 1, 'Lamanele', '2001-12-12', 'Tes3 - Surat Ket - 1666786783.png', 'Tes3 - KTP Almarhum - 1666786783.png', 'Tes3 - Akte - 1666786783.png', 'Menunggu Verifikasi RT', '0000-00-00');

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
(1, '001', 0),
(2, '002', 2),
(5, '003', 7);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_nama` varchar(255) NOT NULL,
  `user_tempat_lahir` varchar(255) NOT NULL,
  `user_tgl_lahir` date NOT NULL,
  `user_rt_id` int(11) NOT NULL,
  `user_jk` varchar(255) NOT NULL,
  `user_telepon` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`user_id`, `user_nama`, `user_tempat_lahir`, `user_tgl_lahir`, `user_rt_id`, `user_jk`, `user_telepon`, `user_email`, `user_password`, `user_status`) VALUES
(1, 'Tes 1', 'tes1', '2002-09-10', 1, 'Laki-laki', '081234567890', 'tes1@gmail.com', 'fa3fb6e0dccc657b57251c97db271b05', 'Aktif'),
(2, 'Tes 2', 'tes2', '1993-08-04', 2, 'Perempuan', '089876543210', 'tes2@gmail.com', '7a8a80e50f6ff558f552079cefe2715d', 'Aktif'),
(5, 'Tes3', 'Tes Tiga', '1999-09-09', 2, 'Laki-laki', '098754273927', 'tes3@gmail.com', '37a98352f0e0d2f4d64e96fe334871ed', 'Aktif'),
(6, 'Tes4', '4tes', '1996-03-03', 5, 'Perempuan', '09474738372', 'tes4@gmail.com', '27069e6baf4eba0ad33686287d582c97', 'Aktif'),
(7, 'sss', 'sss', '2001-03-10', 5, 'Laki-laki', '121213442', 'rt3@gmail.com', '202cb962ac59075b964b07152d234b70', 'Aktif');

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
  MODIFY `administrasi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
  MODIFY `kematian_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `kepala_desa`
--
ALTER TABLE `kepala_desa`
  MODIFY `kepala_desa_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `rt`
--
ALTER TABLE `rt`
  MODIFY `rt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
