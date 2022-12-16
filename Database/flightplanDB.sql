-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 07, 2022 at 02:03 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tiket_pesawat`
--

-- --------------------------------------------------------

--
-- Table structure for table `detail_transaksi`
--

CREATE TABLE `detail_transaksi` (
  `id_detail_transaksi` int(11) NOT NULL,
  `id_header_transaksi` int(10) NOT NULL,
  `id_produk` int(10) NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detail_transaksi`
--

INSERT INTO `detail_transaksi` (`id_detail_transaksi`, `id_header_transaksi`, `id_produk`, `jumlah`) VALUES
(0, 2, 1, 1),
(0, 2, 4, 1),
(0, 3, 1, 1),
(0, 3, 4, 1),
(0, 4, 1, 1),
(0, 4, 4, 1),
(0, 4, 6, 1),
(0, 5, 3, 1),
(0, 6, 3, 1),
(0, 6, 6, 1),
(0, 7, 3, 1),
(0, 7, 6, 1),
(0, 7, 1, 1),
(0, 7, 2, 1),
(0, 8, 3, 1),
(0, 8, 6, 1),
(0, 8, 1, 1),
(0, 8, 2, 1),
(0, 8, 5, 1),
(0, 9, 3, 1),
(0, 9, 6, 1),
(0, 9, 1, 1),
(0, 9, 2, 1),
(0, 9, 5, 1),
(0, 10, 3, 1),
(0, 10, 6, 1),
(0, 10, 1, 1),
(0, 10, 2, 1),
(0, 10, 5, 1),
(0, 11, 3, 1),
(0, 11, 6, 1),
(0, 11, 1, 1),
(0, 11, 2, 1),
(0, 11, 5, 1),
(0, 12, 3, 1),
(0, 12, 6, 1),
(0, 12, 1, 1),
(0, 12, 2, 1),
(0, 12, 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `header_transaksis`
--

CREATE TABLE `header_transaksis` (
  `id_transaksi` int(11) NOT NULL,
  `tanggal_transaksi` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `header_transaksis`
--

INSERT INTO `header_transaksis` (`id_transaksi`, `tanggal_transaksi`) VALUES
(1, '2022-12-06'),
(2, '2022-12-06'),
(3, '2022-12-06'),
(4, '2022-12-06'),
(5, '2022-12-07'),
(6, '2022-12-07'),
(7, '2022-12-07'),
(8, '2022-12-07'),
(9, '2022-12-07'),
(10, '2022-12-07'),
(11, '2022-12-07'),
(12, '2022-12-07');

-- --------------------------------------------------------

--
-- Table structure for table `pembeli`
--

CREATE TABLE `pembeli` (
  `id` int(11) NOT NULL,
  `nama` varchar(225) NOT NULL,
  `username` varchar(40) NOT NULL,
  `email` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL,
  `role` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pembeli`
--

INSERT INTO `pembeli` (`id`, `nama`, `username`, `email`, `password`, `role`) VALUES
(7, 'admin', 'admin', 'admin@gmail.com', 'admin123', 'admin'),
(8, 'Muchammad Fahrizal', 'fachrizal3f', 'fachrizalmuchamad@gmail.com', 'facriz3f', 'user'),
(11, 'Juno Alfani', 'juno123', 'juno2@gmail.com', 'juno123', 'admin'),
(12, 'Fahrizal', 'muchamad.fachrizal12@gmail.com', 'izal3f', 'facriz3f', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `pemesanan`
--

CREATE TABLE `pemesanan` (
  `id` int(11) NOT NULL,
  `kode_rute` int(11) DEFAULT NULL,
  `kode_pesawat` int(11) DEFAULT NULL,
  `tanggal_keberangkatan` date DEFAULT NULL,
  `waktu_keberangkatan` time DEFAULT NULL,
  `waktu_sampai` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pemesanan`
--

INSERT INTO `pemesanan` (`id`, `kode_rute`, `kode_pesawat`, `tanggal_keberangkatan`, `waktu_keberangkatan`, `waktu_sampai`) VALUES
(1, 12010, 92213, '2022-12-11', '12:00:00', '14:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `pesawat`
--

CREATE TABLE `pesawat` (
  `id` int(11) NOT NULL,
  `kode_pesawat` int(11) DEFAULT NULL,
  `nama_pesawat` varchar(50) DEFAULT NULL,
  `nomor_kursi` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pesawat`
--

INSERT INTO `pesawat` (`id`, `kode_pesawat`, `nama_pesawat`, `nomor_kursi`) VALUES
(4, 2121, 'fahrizal air', 21),
(7, 2121, 'lion', 21);

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id` int(11) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `tujuan` varchar(50) NOT NULL,
  `harga` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id`, `judul`, `tujuan`, `harga`) VALUES
(8, 'Paket Hemat', 'Sukabumi', 100000),
(9, 'Paket Enak', 'Sukabumi', 150000),
(10, 'Paket Hemat', 'Bandung', 200000),
(11, 'Paket Enak', 'Bandung', 250000);

-- --------------------------------------------------------

--
-- Table structure for table `rute`
--

CREATE TABLE `rute` (
  `id` int(11) NOT NULL,
  `kode_rute` int(11) DEFAULT NULL,
  `rute` varchar(100) DEFAULT NULL,
  `kelas` varchar(50) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `waktu` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rute`
--

INSERT INTO `rute` (`id`, `kode_rute`, `rute`, `kelas`, `harga`, `waktu`) VALUES
(1, 211, 'Sukabumi - Bandung', 'ekonomi', 190000, '2 Jam'),
(2, 12010, 'Bandung - Sukabumi', 'Bisnis', 200000, '2 Jam');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `header_transaksis`
--
ALTER TABLE `header_transaksis`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `pembeli`
--
ALTER TABLE `pembeli`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_pemesanan_pesawat` (`kode_pesawat`),
  ADD KEY `FK_pemesanan_rute` (`kode_rute`);

--
-- Indexes for table `pesawat`
--
ALTER TABLE `pesawat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rute`
--
ALTER TABLE `rute`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `header_transaksis`
--
ALTER TABLE `header_transaksis`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `pembeli`
--
ALTER TABLE `pembeli`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `pemesanan`
--
ALTER TABLE `pemesanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pesawat`
--
ALTER TABLE `pesawat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `rute`
--
ALTER TABLE `rute`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
