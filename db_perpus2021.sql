-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 23, 2021 at 03:51 PM
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
  `status_akun` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_anggota`
--

INSERT INTO `tb_anggota` (`id`, `kode_anggota`, `nama`, `jenkel`, `no_telp`, `alamat`, `status_akun`) VALUES
(1, 'ANG-0001', 'Dadang Conello', 'L', '08119901717', 'Jalan. Cornering 120', 0),
(2, 'ANG-0002', 'Jon Dalton', 'L', '08119901717', 'jalan Pengenali Saiton', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_buku`
--

CREATE TABLE `tb_buku` (
  `id` int(11) NOT NULL,
  `kode_buku` varchar(100) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `sampul` varchar(255) NOT NULL,
  `penulis` varchar(255) NOT NULL,
  `penerbit` varchar(255) NOT NULL,
  `tahun_terbit` varchar(4) NOT NULL,
  `stok` int(11) NOT NULL,
  `id_rak` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_buku`
--

INSERT INTO `tb_buku` (`id`, `kode_buku`, `judul`, `sampul`, `penulis`, `penerbit`, `tahun_terbit`, `stok`, `id_rak`) VALUES
(1, 'BKU-0001', 'Harry Potter and the Philosopher’s Stone', '91l1Op79AWL.jpg', 'J.K Rowling', 'Elex Media Komputindo', '1997', 100, 1),
(2, 'BKU-0002', 'Dunia Shopee', '4a2c19a4fd656fdf3dc86150ba7e94f1.jpg', 'Jostein Gaarder', 'Mizan', '1991', 10, 1),
(3, 'BKU-0003', 'Sebuah Seni untuk Bersikap Bodo Amat', '9786024526986_Sebuah-Seni-Untuk-Bersikap-Bodo-Amat.jpg', 'Mark Manson', ' Gramedia Widiasarana Indonesia', '2005', 5, 2),
(4, 'BKU-0004', 'The Godfather', '9786020339245_sang-godfather-_the-godfather_-cover-baru.jpg', 'Mario Puzzo', ' Gramedia Widiasarana Indonesia', '2017', 90, 1),
(5, 'BKU-0005', 'Al Quran Dan Sains', 'img20200929_14561196.jpg', 'Dr. H. Ridwan Abdullah Sani, M.Si.', 'Amzah', '2020', 666, 3),
(6, 'BKU-0006', 'Agar Suami Tak Mendua', 'ID_SM2019MTH07SM.jpg', 'Muyassaroh, Muyassaroh', 'Elex Media Komputindo', '2019', 9, 3),
(7, 'BKU-0007', 'Selena', '9786020639512_selena_cov.jpg', 'Tere Liye', 'Gramedia Pustaka Utama', '2016', 99, 1),
(8, 'BKU-0008', 'Bicara Itu Ada Seninya', '9786024553920.jpg', 'Oh Su Hyang', ' Bhuana Ilmu Populer', '2019', 100, 2),
(9, 'BKU-0009', 'Duduk Perkara Poligami', 'ID_SIS2015MTH05IDTMN_S.jpg', 'Murthada Muntahri', ' Serambi Ilmu Semesta', '2015', 80, 1),
(10, 'BKU-0010', 'Kejahatan Terorganisasi (Organized Crime) Akar Dan Perkembangannya', '9786024220204_kejahatan_terorganisasi_organized_crime_akar_dan_perkembangannya.jpeg', 'Jay S. Albanese', 'Kencana Prenada Media', '2016', 190, 2);

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

--
-- Dumping data for table `tb_peminjaman`
--

INSERT INTO `tb_peminjaman` (`id`, `tanggal_pinjam`, `tanggal_kembali`, `id_buku`, `id_anggota`, `id_petugas`) VALUES
(2, '2021-07-23', '2021-07-30', 10, 2, 1);

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

--
-- Dumping data for table `tb_pengembalian`
--

INSERT INTO `tb_pengembalian` (`id`, `tanggal_pengembalian`, `denda`, `id_buku`, `id_anggota`, `id_petugas`) VALUES
(1, '2021-08-27', 200000, 10, 2, 1),
(2, '2021-07-24', 0, 10, 2, 1);

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
  `status_akun` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_petugas`
--

INSERT INTO `tb_petugas` (`id`, `nama`, `jabatan`, `no_telp`, `alamat`, `status_akun`) VALUES
(1, 'Admin Jihoy', 'Manager', '082355667788', 'Jalan Kocak', 1);

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
(1, 'Fantasi Petualangan', 'F-1'),
(2, 'Karya Ilmiah', 'K-1'),
(3, 'Kitab Religi', 'R-1');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(100) NOT NULL,
  `relasi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id`, `username`, `password`, `role`, `relasi`) VALUES
(1, 'admin', '$2y$10$4K8xPmGWNFk6jmomVwnPWeyT2uL5Mi.uqQn0haSnAES71nIT0kqKe', 'Admin', 1),
(2, 'jon', '$2y$10$1UoAA.bLdhZuNP0RFYuru.7BApCTJa9kCLF9k84C7bOT1IIB/Uqr.', 'Anggota', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_anggota`
--
ALTER TABLE `tb_anggota`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kode_anggota` (`kode_anggota`),
  ADD KEY `fk_anggota_user` (`status_akun`);

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
  ADD KEY `fk_petugas_user` (`status_akun`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_buku`
--
ALTER TABLE `tb_buku`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tb_peminjaman`
--
ALTER TABLE `tb_peminjaman`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_pengembalian`
--
ALTER TABLE `tb_pengembalian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_petugas`
--
ALTER TABLE `tb_petugas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_rak`
--
ALTER TABLE `tb_rak`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_buku`
--
ALTER TABLE `tb_buku`
  ADD CONSTRAINT `tb_buku_ibfk_1` FOREIGN KEY (`id_rak`) REFERENCES `tb_rak` (`id`);

--
-- Constraints for table `tb_peminjaman`
--
ALTER TABLE `tb_peminjaman`
  ADD CONSTRAINT `fk_peminjaman_buku` FOREIGN KEY (`id_buku`) REFERENCES `tb_buku` (`id`);

--
-- Constraints for table `tb_pengembalian`
--
ALTER TABLE `tb_pengembalian`
  ADD CONSTRAINT `fk_pengembalian_anggota` FOREIGN KEY (`id_anggota`) REFERENCES `tb_anggota` (`id`),
  ADD CONSTRAINT `fk_pengembalian_buku` FOREIGN KEY (`id_buku`) REFERENCES `tb_buku` (`id`),
  ADD CONSTRAINT `fk_pengembalian_petugas` FOREIGN KEY (`id_petugas`) REFERENCES `tb_petugas` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
