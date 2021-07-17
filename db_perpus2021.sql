-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 17, 2021 at 09:17 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_perpus2021`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_anggota`
--

CREATE TABLE `tb_anggota` (
  `id` int(11) NOT NULL,
  `kode_anggota` varchar(100) NOT NULL,
  `nama` varchar(250) NOT NULL,
  `jenkel` varchar(1) NOT NULL,
  `no_telp` varchar(13) NOT NULL,
  `alamat` text NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_buku`
--

CREATE TABLE `tb_buku` (
  `id` int(11) NOT NULL,
  `kode_buku` varchar(100) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `penulis` varchar(255) NOT NULL,
  `penerbit` varchar(255) NOT NULL,
  `tahun_terbit` varchar(4) NOT NULL,
  `stok` int(11) NOT NULL,
  `id_rak` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_buku`
--

INSERT INTO `tb_buku` (`id`, `kode_buku`, `judul`, `penulis`, `penerbit`, `tahun_terbit`, `stok`, `id_rak`) VALUES
(1, 'BKU-0001', 'Cara Cepat Kaya', 'Jon Dodol', 'Pesugihan Printing', '1998', 100, 1),
(2, 'BKU-0002', 'Tutorial Gak Ngapa Ngapain', 'Jihan Rahmi Ayu', 'Mager Printing', '2020', 90, 1),
(3, 'BKU-0003', 'asdasd', 'kontol', 'tkontok', '0000', 10, 1),
(4, 'BKU-0004', 'kontol', 'kontol', 'tkontok', '2131', 9090, 2),
(5, 'BKU-0005', 'kontol', 'kontol', 'asdadda', '2131', 0, 2),
(6, 'BKU-0006', 'Jon', 'asdadad', 'tkontok', '2131', 312313, 2),
(7, 'BKU-0007', 'kontol', 'kontol', 'tkontok', '2131', 9090, 2),
(9, 'BKU-0008', 'Sok', 'asdadad', 'PT. Ribut Anjing', '2009', 10, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_peminjaman`
--

CREATE TABLE `tb_peminjaman` (
  `id` int(11) NOT NULL,
  `tanggal_pinjam` date NOT NULL,
  `tanggal_kembali` date NOT NULL,
  `id_buku` int(11) NOT NULL,
  `id_anggota` int(11) NOT NULL,
  `id_petugas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengembalian`
--

CREATE TABLE `tb_pengembalian` (
  `id` int(11) NOT NULL,
  `tanggal_pengembalian` date NOT NULL,
  `denda` int(11) NOT NULL,
  `id_buku` int(11) NOT NULL,
  `id_anggota` int(11) NOT NULL,
  `id_petugas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_petugas`
--

CREATE TABLE `tb_petugas` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `jabatan` varchar(50) NOT NULL,
  `no_telp` varchar(13) NOT NULL,
  `alamat` text NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_rak`
--

CREATE TABLE `tb_rak` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `lokasi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_rak`
--

INSERT INTO `tb_rak` (`id`, `nama`, `lokasi`) VALUES
(1, 'Karya Ilmiah', 'A-1'),
(2, 'Fiksi', 'A-2');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_anggota`
--
ALTER TABLE `tb_anggota`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kode_anggota` (`kode_anggota`),
  ADD KEY `fk_anggota_user` (`id_user`);

--
-- Indexes for table `tb_buku`
--
ALTER TABLE `tb_buku`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kode_buku` (`kode_buku`),
  ADD KEY `id_rak` (`id_rak`);

--
-- Indexes for table `tb_peminjaman`
--
ALTER TABLE `tb_peminjaman`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_peminjaman_buku` (`id_buku`),
  ADD KEY `fk_peminjaman_anggota` (`id_anggota`),
  ADD KEY `fk_peminjaman_petugas` (`id_petugas`);

--
-- Indexes for table `tb_pengembalian`
--
ALTER TABLE `tb_pengembalian`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_pengembalian_buku` (`id_buku`),
  ADD KEY `fk_pengembalian_anggota` (`id_anggota`),
  ADD KEY `fk_pengembalian_petugas` (`id_petugas`);

--
-- Indexes for table `tb_petugas`
--
ALTER TABLE `tb_petugas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_petugas_user` (`id_user`);

--
-- Indexes for table `tb_rak`
--
ALTER TABLE `tb_rak`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_anggota`
--
ALTER TABLE `tb_anggota`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_buku`
--
ALTER TABLE `tb_buku`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tb_peminjaman`
--
ALTER TABLE `tb_peminjaman`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_pengembalian`
--
ALTER TABLE `tb_pengembalian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_petugas`
--
ALTER TABLE `tb_petugas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_rak`
--
ALTER TABLE `tb_rak`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_anggota`
--
ALTER TABLE `tb_anggota`
  ADD CONSTRAINT `fk_anggota_user` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id`);

--
-- Constraints for table `tb_buku`
--
ALTER TABLE `tb_buku`
  ADD CONSTRAINT `tb_buku_ibfk_1` FOREIGN KEY (`id_rak`) REFERENCES `tb_rak` (`id`);

--
-- Constraints for table `tb_peminjaman`
--
ALTER TABLE `tb_peminjaman`
  ADD CONSTRAINT `fk_peminjaman_anggota` FOREIGN KEY (`id_anggota`) REFERENCES `tb_anggota` (`id`),
  ADD CONSTRAINT `fk_peminjaman_buku` FOREIGN KEY (`id_buku`) REFERENCES `tb_buku` (`id`),
  ADD CONSTRAINT `fk_peminjaman_petugas` FOREIGN KEY (`id_petugas`) REFERENCES `tb_petugas` (`id`);

--
-- Constraints for table `tb_pengembalian`
--
ALTER TABLE `tb_pengembalian`
  ADD CONSTRAINT `fk_pengembalian_anggota` FOREIGN KEY (`id_anggota`) REFERENCES `tb_anggota` (`id`),
  ADD CONSTRAINT `fk_pengembalian_buku` FOREIGN KEY (`id_buku`) REFERENCES `tb_buku` (`id`),
  ADD CONSTRAINT `fk_pengembalian_petugas` FOREIGN KEY (`id_petugas`) REFERENCES `tb_petugas` (`id`);

--
-- Constraints for table `tb_petugas`
--
ALTER TABLE `tb_petugas`
  ADD CONSTRAINT `fk_petugas_user` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
