-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 12, 2021 at 01:36 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perpustakaan`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_administrator`
--

CREATE TABLE `tb_administrator` (
  `id_admin` int(11) NOT NULL,
  `nama_admin` varchar(25) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(255) NOT NULL,
  `id_level` int(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `gambar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_administrator`
--

INSERT INTO `tb_administrator` (`id_admin`, `nama_admin`, `username`, `password`, `id_level`, `email`, `gambar`) VALUES
(1, 'Hendra Maulidan', 'admin', '$2y$10$xGiBTw74tUvoXKbgvvD/OudZUjSOKnjsr8TpR38BOnviMhB2mQ6IS', 2, 'admin@mail.com', 'ADMIN-1615177372hendra.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_buku`
--

CREATE TABLE `tb_buku` (
  `id_buku` int(11) NOT NULL,
  `nama_buku` varchar(50) NOT NULL,
  `id_jenis` varchar(50) NOT NULL,
  `gambar_buku` varchar(250) NOT NULL,
  `deskripsi_buku` text NOT NULL,
  `stock_buku` int(11) NOT NULL,
  `kode_buku` varchar(100) NOT NULL,
  `kondisi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_buku`
--

INSERT INTO `tb_buku` (`id_buku`, `nama_buku`, `id_jenis`, `gambar_buku`, `deskripsi_buku`, `stock_buku`, `kode_buku`, `kondisi`) VALUES
(5, 'aku dan tanteku3', '1', 'buku-1615434713mayak.PNG', 'cerita tentang diriku dan tanteku saat suaminya pergi kerja', 15, '12345', 'kurang_baik');

-- --------------------------------------------------------

--
-- Table structure for table `tb_jenis`
--

CREATE TABLE `tb_jenis` (
  `id_jenis` int(11) NOT NULL,
  `nama_jenis` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_jenis`
--

INSERT INTO `tb_jenis` (`id_jenis`, `nama_jenis`) VALUES
(1, 'dongeng'),
(2, 'sejarah');

-- --------------------------------------------------------

--
-- Table structure for table `tb_level`
--

CREATE TABLE `tb_level` (
  `id_level` int(11) NOT NULL,
  `level` enum('administrator','petugas','masyarakat') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_level`
--

INSERT INTO `tb_level` (`id_level`, `level`) VALUES
(1, 'masyarakat'),
(2, 'administrator'),
(3, 'petugas');

-- --------------------------------------------------------

--
-- Table structure for table `tb_peminjaman`
--

CREATE TABLE `tb_peminjaman` (
  `id_peminjaman` int(11) NOT NULL,
  `tanggal_pinjam` date DEFAULT NULL,
  `tanggal_kembali` date DEFAULT NULL,
  `status_peminjaman` enum('dipinjam','dikembalikan','lewatTenggangWaktu') DEFAULT NULL,
  `id_user` int(11) NOT NULL,
  `id_petugas` int(11) DEFAULT NULL,
  `id_buku` int(11) NOT NULL,
  `jumlah_pinjam` int(11) NOT NULL,
  `tanggal_harus_kembali` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_peminjaman`
--

INSERT INTO `tb_peminjaman` (`id_peminjaman`, `tanggal_pinjam`, `tanggal_kembali`, `status_peminjaman`, `id_user`, `id_petugas`, `id_buku`, `jumlah_pinjam`, `tanggal_harus_kembali`) VALUES
(13, '2021-03-11', '2021-03-11', 'dikembalikan', 1, 2, 5, 1, '2021-03-14'),
(14, '2021-03-11', '2021-03-11', 'dikembalikan', 1, 2, 5, 1, '2021-03-14'),
(15, '2021-03-11', '2021-03-11', 'dikembalikan', 1, 2, 5, 1, '2021-03-14'),
(19, NULL, NULL, 'dipinjam', 1, 0, 5, 1, NULL),
(20, NULL, NULL, NULL, 1, 0, 5, 1, NULL),
(26, NULL, NULL, NULL, 1, 0, 5, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_petugas`
--

CREATE TABLE `tb_petugas` (
  `id_petugas` int(11) NOT NULL,
  `nama_petugas` varchar(25) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(255) NOT NULL,
  `id_level` int(11) NOT NULL,
  `status` varchar(200) NOT NULL,
  `gambar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_petugas`
--

INSERT INTO `tb_petugas` (`id_petugas`, `nama_petugas`, `email`, `username`, `password`, `id_level`, `status`, `gambar`) VALUES
(2, 'hendra maulidan', 'hendra0maulidan@gmail.com', 'petugas', '$2y$10$fAP8X3RwnixIQo56uYQEYOQaJYvQk.zblBY0MzEjyOYQ4Snyv1uPi', 3, '2', 'P-1615172193hendra.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `nama_lengkap` varchar(25) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(255) NOT NULL,
  `telp` varchar(25) NOT NULL,
  `id_level` int(25) NOT NULL,
  `alamat` varchar(11) NOT NULL,
  `gambar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `nama_lengkap`, `email`, `username`, `password`, `telp`, `id_level`, `alamat`, `gambar`) VALUES
(1, 'hendra maulidan', 'hendra0maulidan@gmail.com', 'hendra', '$2y$10$OtjEaKyLxBKJ.ZDo8YSyHuG3w0ZAy8k6QMiQdjfqv4Blu.84srRCy', '083298492', 1, '', ''),
(2, 'hendra maulidan', 'hendra@mail.com', 'hendramaulidan', '$2y$10$K8MhTEQWcRoWNSvghVkCpuNoHQC5WpilinE4T5g81r8R.RH4dj.lC', '089823907', 1, 'jalan bejo', ''),
(3, 'hendra maulidan', 'hendra@mailer.com', 'smakis', '$2y$10$qEN9E38HONmpuPAjtFcA9uywNs5maspyryEly1iP61g.zdzegbw72', '089345892', 1, '', ''),
(4, 'hendra maulidan', 'hendrsa@mailer.com', 'smakis1', '$2y$10$/C/qthX5.0tC4h5lDdvCXOrrGE/R1fnj1NqIPXv2DGYNhM5UWn35a', '0934590', 1, 'jalan bejo', 'U-1615172564hendra.jpg'),
(5, 'fuckss', 'haha@mail.com', 'fuckss', '$2y$10$Vm2tYFWBdrmri1DUlrHt8O20sEjdfry4Kct/e/3F21n7Y42SllDv6', '080380', 1, 'Jalan bejo', 'U-1615385286IMG-20210217-WA0012.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_administrator`
--
ALTER TABLE `tb_administrator`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `tb_buku`
--
ALTER TABLE `tb_buku`
  ADD PRIMARY KEY (`id_buku`);

--
-- Indexes for table `tb_jenis`
--
ALTER TABLE `tb_jenis`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indexes for table `tb_level`
--
ALTER TABLE `tb_level`
  ADD PRIMARY KEY (`id_level`);

--
-- Indexes for table `tb_peminjaman`
--
ALTER TABLE `tb_peminjaman`
  ADD PRIMARY KEY (`id_peminjaman`);

--
-- Indexes for table `tb_petugas`
--
ALTER TABLE `tb_petugas`
  ADD PRIMARY KEY (`id_petugas`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_administrator`
--
ALTER TABLE `tb_administrator`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_buku`
--
ALTER TABLE `tb_buku`
  MODIFY `id_buku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_jenis`
--
ALTER TABLE `tb_jenis`
  MODIFY `id_jenis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_level`
--
ALTER TABLE `tb_level`
  MODIFY `id_level` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_peminjaman`
--
ALTER TABLE `tb_peminjaman`
  MODIFY `id_peminjaman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `tb_petugas`
--
ALTER TABLE `tb_petugas`
  MODIFY `id_petugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
