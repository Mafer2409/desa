-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 12 Mar 2023 pada 18.02
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
-- Database: `kos`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `nama_admin` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `nama_admin`, `username`, `password`) VALUES
(1, 'Mafer', 'mafer', 'e542a80e24b88971260b9ab899e97dc8'),
(2, 'Administrator', 'admin', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kecamatan`
--

CREATE TABLE `kecamatan` (
  `id_kecamatan` int(11) NOT NULL,
  `nama_kecamatan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kecamatan`
--

INSERT INTO `kecamatan` (`id_kecamatan`, `nama_kecamatan`) VALUES
(1, 'Kelapa Lima'),
(2, 'Alak'),
(3, 'Maulafa'),
(4, 'Oebobo'),
(5, 'Kupang Tengah'),
(6, 'Kota Lama'),
(7, 'Kota Raja');

-- --------------------------------------------------------

--
-- Struktur dari tabel `komentar`
--

CREATE TABLE `komentar` (
  `id_komentar` int(11) NOT NULL,
  `id_kos` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tgl_komentar` date NOT NULL,
  `isi_komentar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `komentar`
--

INSERT INTO `komentar` (`id_komentar`, `id_kos`, `id_user`, `tgl_komentar`, `isi_komentar`) VALUES
(1, 3, 2, '2022-07-02', 'Kos kosannya nyaman\r\nPenjaga kosnya ramah pula...');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kos`
--

CREATE TABLE `kos` (
  `id_kos` int(11) NOT NULL,
  `nama_kos` varchar(50) NOT NULL,
  `id_pemilik` int(11) NOT NULL,
  `id_kecamatan` int(11) NOT NULL,
  `harga_kos` int(11) NOT NULL,
  `tlp_kontak` varchar(20) NOT NULL,
  `latitude` varchar(50) NOT NULL,
  `longitude` varchar(50) NOT NULL,
  `fasilitas` text NOT NULL,
  `gambar_kos1` text NOT NULL,
  `gambar_kos2` text NOT NULL,
  `gambar_kos3` text NOT NULL,
  `gambar_kos4` text NOT NULL,
  `jumlah_kamar` int(11) NOT NULL,
  `sisa_kamar` int(11) NOT NULL,
  `deskripsi_kos` text NOT NULL,
  `alamat` text NOT NULL,
  `rt` varchar(10) NOT NULL,
  `rw` varchar(10) NOT NULL,
  `kategori_kos` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kos`
--

INSERT INTO `kos` (`id_kos`, `nama_kos`, `id_pemilik`, `id_kecamatan`, `harga_kos`, `tlp_kontak`, `latitude`, `longitude`, `fasilitas`, `gambar_kos1`, `gambar_kos2`, `gambar_kos3`, `gambar_kos4`, `jumlah_kamar`, `sisa_kamar`, `deskripsi_kos`, `alamat`, `rt`, `rw`, `kategori_kos`) VALUES
(3, 'MF Kos', 4, 3, 450000, '085337025611', '-10.192826011338365', '123.62777577689056', '- Kamar mandi dalam\r\n- Pagar keliling\r\n- Meteran listrik masing - masing', 'MF Kos-1--1656740240.JPG', 'MF Kos-2--1656740240.jpg', 'MF Kos-3--1656740240.jpg', 'MF Kos-4--1656740240.jpg', 10, 4, 'Masuk dari gang Befak 1, cabang pertama belok kiri.', 'BTN Kolhua', '001', '002', 'Putra / Putri'),
(4, 'Denadu kos', 5, 3, 600000, '081234567534', '-10.179312219153683', '123.64339898230713', 'Meteran masing-masing.\r\nAir ditanggung pemilik kos.\r\nWifi\r\nLemari + Tempat tidur', 'Denadu kos-1--1656743073.jpg', 'Denadu kos-2--1656743073.jpg', 'Denadu kos-3--1656743073.jpg', 'Denadu kos-4--1656743073.jpg', 12, 2, 'Aturan kos :\r\nTidak boleh membawa pasangan.', 'Naimata', '003', '007', 'Putra'),
(5, 'Lewada Kos', 5, 4, 750000, '081234567534', '-10.162020293098827', '123.6178751011314', 'Air keran 24 jam', 'Lewada Kos-1--1656743789.jpg', 'Lewada Kos-2--1656743789.jpg', 'Lewada Kos-3--1656743789.jpg', 'Lewada Kos-4--1656743789.jpg', 8, 4, 'Aturan kos : Tidak boleh membawa pasangan.', 'Kayu putih', '007', '014', 'Putra / Putri');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemilik`
--

CREATE TABLE `pemilik` (
  `id_pemilik` int(11) NOT NULL,
  `nama_pemilik` varchar(50) NOT NULL,
  `nik_pemilik` varchar(50) NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jenis_kelamin` varchar(30) NOT NULL,
  `tlp_pemilik` varchar(20) NOT NULL,
  `email_pemilik` varchar(50) NOT NULL,
  `alamat_pemilik` text NOT NULL,
  `foto_pemilik` text NOT NULL,
  `password` varchar(50) NOT NULL,
  `status` varchar(30) NOT NULL,
  `tgl_daftar` date NOT NULL,
  `tgl_limit` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pemilik`
--

INSERT INTO `pemilik` (`id_pemilik`, `nama_pemilik`, `nik_pemilik`, `tempat_lahir`, `tgl_lahir`, `jenis_kelamin`, `tlp_pemilik`, `email_pemilik`, `alamat_pemilik`, `foto_pemilik`, `password`, `status`, `tgl_daftar`, `tgl_limit`) VALUES
(6, 'Pemilik Hotel Kemuning Muda', '-', '-', '2023-03-12', 'Laki-laki', '0821-6226-3338', 'kemuningmuda@mail.co.id', '-', 'Pemilik Hotel Kemuning Muda-1678636689.jpg', '01cfcd4f6b8770febfb40cb906715822', 'Aktif', '2023-03-12', '2023-03-19'),
(7, 'Pemilik Hotel Elite Tembilahan', '-', '-', '2023-03-12', 'Laki-laki', '0821-6226-3338', 'elitetembilahan@mail.com', '-', 'Pemilik Elite Tembilahan-1678631707.jpg', '827ccb0eea8a706c4c34a16891f84e7b', 'Pending', '2023-03-12', '2023-03-19'),
(8, 'Pemilik Hotel Harmoni', '-', '-', '2023-03-12', 'Laki-laki', '0812-6666-9181', 'harmoni@mail.com', '-', 'Pemilik Hotel Harmoni-1678631889.webp', '827ccb0eea8a706c4c34a16891f84e7b', 'Pending', '2023-03-12', '2023-03-19'),
(9, 'Pemilik Hotel Arsita Tembilahan', '-', '-', '2023-03-12', 'Laki-laki', '0812-7616-3188', 'arsitatembilahan@mail.com', '-', 'Pemilik Hotel Arsita Tembilahan-1678632304.jpg', '827ccb0eea8a706c4c34a16891f84e7b', 'Pending', '2023-03-12', '2023-03-19'),
(10, 'Pemilik Hotel Inhil Pratama', '-', '-', '2023-03-12', 'Laki-laki', '0852-7102-5555', 'inhilpratama@mail.com', '-', 'Pemilik Hotel Inhil Pratama-1678632384.webp', '827ccb0eea8a706c4c34a16891f84e7b', 'Pending', '2023-03-12', '2023-03-19'),
(11, 'Pemilik Hotel Tembilahan Pratama', '-', '-', '2023-03-12', 'Laki-laki', '0812-6867-6788', 'tembilahanpratama@mail.com', '-', 'Pemilik Hotel Tembilahan Pratama-1678632469.jpg', '827ccb0eea8a706c4c34a16891f84e7b', 'Pending', '2023-03-12', '2023-03-19'),
(12, 'Pemilik Hotel Top 5 Tembilahan', '-', '-', '2023-03-12', 'Laki-laki', '0823-8500-5555', 'top5tembilahan@mail.com', '-', 'Pemilik Hotel Top 5 Tembilahan-1678632602.jpg', '827ccb0eea8a706c4c34a16891f84e7b', 'Pending', '2023-03-12', '2023-03-19'),
(13, 'Pemilik Hotel Dubest Tembilahan', '-', '-', '2023-03-12', 'Laki-laki', '0822-8839-5555', 'dubesttembilahan@mail.com', '-', 'Pemilik Hotel Dubest Tembilahan-1678632777.jpg', '827ccb0eea8a706c4c34a16891f84e7b', 'Pending', '2023-03-12', '2023-03-19'),
(14, 'Pemilik Hotel Ar Rahmah 2 Tembilahan', '-', '-', '2023-03-12', 'Laki-laki', '0823-8888-0008', 'arrahman2tembilahan@mail.com', '-', 'Pemilik Hotel Ar Rahmah 2 Tembilahan-1678633219.png', '827ccb0eea8a706c4c34a16891f84e7b', 'Pending', '2023-03-12', '2023-03-19'),
(15, 'Pemilik Hotel Grand Tembilahan', '-', '-', '2023-03-12', 'Laki-laki', '0823-8679-8888', 'grandtembilahan@mail.com', '-', 'Pemilik Hotel Grand Tembilahan-1678633305.jpg', '827ccb0eea8a706c4c34a16891f84e7b', 'Pending', '2023-03-12', '2023-03-19'),
(16, 'Pemilik Wisma Bunda Tembilahan', '-', '-', '2023-03-12', 'Laki-laki', '-', 'bundatembilahan@mail.com', '-', 'Pemilik Wisma Bunda Tembilahan-1678633846.jpg', '827ccb0eea8a706c4c34a16891f84e7b', 'Pending', '2023-03-12', '2023-03-19'),
(17, 'Pemilik Wisma Yopin', '-', '-', '2023-03-12', 'Laki-laki', '0823-9116-1834', 'yopin@mail.com', '-', 'Pemilik Wisma Yopin-1678633952.jpg', '827ccb0eea8a706c4c34a16891f84e7b', 'Pending', '2023-03-12', '2023-03-19'),
(18, 'Pemilik Wisma Hijau', '-', '-', '2023-03-12', 'Laki-laki', '0822-8724-5328', 'hijau@mail.com', '-', 'Pemilik Wisma Hijau-1678634000.jpg', '827ccb0eea8a706c4c34a16891f84e7b', 'Pending', '2023-03-12', '2023-03-19'),
(19, 'Pemilik Wisma Green ACC', '-', '-', '2023-03-12', 'Laki-laki', '0823-8596-9966', 'grennacc@mail.com', '-', 'Pemilik Wisma Green ACC-1678634103.jpg', '827ccb0eea8a706c4c34a16891f84e7b', 'Pending', '2023-03-12', '2023-03-19'),
(20, 'Pemilik Wisma 838', '-', '-', '2023-03-12', 'Laki-laki', '-', '838@mail.com', '-', 'Pemilik Wisma 838-1678634176.jpg', '827ccb0eea8a706c4c34a16891f84e7b', 'Pending', '2023-03-12', '2023-03-19'),
(21, 'Pemilik Wisma Ananda 1', '-', '-', '2023-03-12', 'Laki-laki', '0812-6815-3291', 'ananda1@mail.com', '-', 'Pemilik Wisma Ananda 1-1678634235.jpg', '827ccb0eea8a706c4c34a16891f84e7b', 'Pending', '2023-03-12', '2023-03-19'),
(22, 'Pemilik Wisma Ananda 2', '-', '-', '2023-03-12', 'Laki-laki', '0852-6331-4000', 'ananda2@mail.com', '-', 'Pemilik Wisma Ananda 2-1678634306.jpg', '827ccb0eea8a706c4c34a16891f84e7b', 'Pending', '2023-03-12', '2023-03-19'),
(23, 'Pemilik Wisma Selvira', '-', '-', '2023-03-12', 'Laki-laki', '0821-7744-6962', 'selvira@mail.com', '-', 'Pemilik Wisma Selvira-1678634359.jpg', '827ccb0eea8a706c4c34a16891f84e7b', 'Pending', '2023-03-12', '2023-03-19');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesan`
--

CREATE TABLE `pesan` (
  `id_pesan` int(11) NOT NULL,
  `id_kos` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tgl_pesan` date NOT NULL,
  `jml_kamar` int(11) NOT NULL,
  `status_pesanan` varchar(30) NOT NULL,
  `estimasi` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pesan`
--

INSERT INTO `pesan` (`id_pesan`, `id_kos`, `id_user`, `tgl_pesan`, `jml_kamar`, `status_pesanan`, `estimasi`) VALUES
(1, 1, 1, '2021-05-17', 1, 'EXPIRED', '2021-05-16'),
(2, 1, 1, '2021-05-17', 1, 'Pending', '2021-05-24'),
(3, 3, 2, '2022-07-02', 1, 'Confirmed', '2022-07-09');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(50) NOT NULL,
  `nik_user` varchar(50) NOT NULL,
  `tempat_lahir` varchar(30) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jenis_kelamin` varchar(30) NOT NULL,
  `tlp_user` varchar(20) NOT NULL,
  `email_user` varchar(50) NOT NULL,
  `foto_user` text NOT NULL,
  `password` varchar(50) NOT NULL,
  `status_user` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nama_user`, `nik_user`, `tempat_lahir`, `tgl_lahir`, `jenis_kelamin`, `tlp_user`, `email_user`, `foto_user`, `password`, `status_user`) VALUES
(2, 'Donizia Odilia', '16114004', 'Dili', '1996-03-03', 'Perempuan', '081246981561', 'annileite3@gmail.com', 'Donizia Odilia-1656741533.png', 'c33367701511b4f6020ec61ded352059', 'Pegawai/Karyawan');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `kecamatan`
--
ALTER TABLE `kecamatan`
  ADD PRIMARY KEY (`id_kecamatan`);

--
-- Indeks untuk tabel `komentar`
--
ALTER TABLE `komentar`
  ADD PRIMARY KEY (`id_komentar`);

--
-- Indeks untuk tabel `kos`
--
ALTER TABLE `kos`
  ADD PRIMARY KEY (`id_kos`);

--
-- Indeks untuk tabel `pemilik`
--
ALTER TABLE `pemilik`
  ADD PRIMARY KEY (`id_pemilik`);

--
-- Indeks untuk tabel `pesan`
--
ALTER TABLE `pesan`
  ADD PRIMARY KEY (`id_pesan`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `kecamatan`
--
ALTER TABLE `kecamatan`
  MODIFY `id_kecamatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `komentar`
--
ALTER TABLE `komentar`
  MODIFY `id_komentar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `kos`
--
ALTER TABLE `kos`
  MODIFY `id_kos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `pemilik`
--
ALTER TABLE `pemilik`
  MODIFY `id_pemilik` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `pesan`
--
ALTER TABLE `pesan`
  MODIFY `id_pesan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
