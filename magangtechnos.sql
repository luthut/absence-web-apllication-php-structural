-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 03, 2022 at 11:52 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `magangtechnos`
--

-- --------------------------------------------------------

--
-- Table structure for table `absensi`
--

CREATE TABLE `absensi` (
  `idAbsen` int(5) NOT NULL,
  `idKaryawan` int(5) NOT NULL,
  `tanggal` date NOT NULL,
  `masuk` time DEFAULT NULL,
  `pulang` time DEFAULT NULL,
  `statusMasuk` enum('hadir','terlambat','alpa') NOT NULL DEFAULT 'alpa',
  `statusPulang` enum('hadir','terlambat','alpa') NOT NULL DEFAULT 'alpa',
  `idWaktu` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `absensi`
--

INSERT INTO `absensi` (`idAbsen`, `idKaryawan`, `tanggal`, `masuk`, `pulang`, `statusMasuk`, `statusPulang`, `idWaktu`) VALUES
(3, 54, '2022-09-01', NULL, NULL, 'alpa', 'hadir', 2),
(6, 50, '2022-09-01', '07:00:00', '23:57:59', 'hadir', 'terlambat', 1),
(7, 50, '2022-08-24', '07:00:00', '20:00:30', 'hadir', 'terlambat', 2),
(17, 50, '2022-09-03', '09:16:09', NULL, 'terlambat', '', 1),
(20, 2, '2022-09-04', '00:53:48', NULL, 'terlambat', '', 2);

-- --------------------------------------------------------

--
-- Table structure for table `divisi`
--

CREATE TABLE `divisi` (
  `idDivisi` int(5) NOT NULL,
  `namaDivisi` enum('IT','Marketing','Random') NOT NULL DEFAULT 'IT'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `divisi`
--

INSERT INTO `divisi` (`idDivisi`, `namaDivisi`) VALUES
(1, 'IT'),
(2, 'Marketing'),
(3, 'Random');

-- --------------------------------------------------------

--
-- Table structure for table `jam`
--

CREATE TABLE `jam` (
  `idWaktu` int(5) NOT NULL,
  `keterangan` varchar(10) NOT NULL,
  `masukMulai` time NOT NULL,
  `masukSelesai` time NOT NULL,
  `pulangMulai` time NOT NULL,
  `pulangSelesai` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jam`
--

INSERT INTO `jam` (`idWaktu`, `keterangan`, `masukMulai`, `masukSelesai`, `pulangMulai`, `pulangSelesai`) VALUES
(1, 'Pagi', '06:00:00', '08:00:00', '16:00:00', '18:30:00'),
(2, 'Malam', '18:00:00', '19:15:00', '05:00:00', '06:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `idKaryawan` int(5) NOT NULL,
  `idWaktu` int(5) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `telepon` varchar(15) NOT NULL,
  `gender` enum('L','P') NOT NULL DEFAULT 'L',
  `email` varchar(100) NOT NULL,
  `foto` varchar(50) NOT NULL,
  `idDivisi` int(5) NOT NULL,
  `username` varchar(12) NOT NULL,
  `passwd` varchar(42) NOT NULL,
  `akses` enum('admin','user') NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`idKaryawan`, `idWaktu`, `nama`, `alamat`, `telepon`, `gender`, `email`, `foto`, `idDivisi`, `username`, `passwd`, `akses`) VALUES
(2, 2, 'Pesulap Merah', 'Jl. Sumber Berkah', '085321728544', 'L', 'red@mail.com', '', 1, 'admin', '202cb962ac59075b964b07152d234b70', 'admin'),
(50, 1, 'Almighty Gus Samsudin', 'Jl. Keris Petir', '08922378342', 'L', 'gus@samsu.din', '1.jpg', 1, 'KerisPetir', 'd41d8cd98f00b204e9800998ecf8427e', 'admin'),
(54, 2, 'Mega', 'tester', '234234', 'P', 'teh@gmail.com', '', 2, 'megalodon', 'd41d8cd98f00b204e9800998ecf8427e', 'user'),
(64, 2, 'Iman Rifaldi', 'Abeli Dalam', '081988736786', 'P', 'batman@gmail.com', '63132e546d7ad_IMG-20211013-WA0018.jpg', 2, 'batman', '', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absensi`
--
ALTER TABLE `absensi`
  ADD PRIMARY KEY (`idAbsen`),
  ADD KEY `idWaktu` (`idWaktu`),
  ADD KEY `idKaryawan` (`idKaryawan`);

--
-- Indexes for table `divisi`
--
ALTER TABLE `divisi`
  ADD PRIMARY KEY (`idDivisi`);

--
-- Indexes for table `jam`
--
ALTER TABLE `jam`
  ADD PRIMARY KEY (`idWaktu`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`idKaryawan`),
  ADD KEY `idDivisi` (`idDivisi`),
  ADD KEY `idWaktu` (`idWaktu`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absensi`
--
ALTER TABLE `absensi`
  MODIFY `idAbsen` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `idKaryawan` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `absensi`
--
ALTER TABLE `absensi`
  ADD CONSTRAINT `absensi_ibfk_1` FOREIGN KEY (`idWaktu`) REFERENCES `jam` (`idWaktu`),
  ADD CONSTRAINT `absensi_ibfk_2` FOREIGN KEY (`idKaryawan`) REFERENCES `karyawan` (`idKaryawan`);

--
-- Constraints for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD CONSTRAINT `karyawan_ibfk_1` FOREIGN KEY (`idDivisi`) REFERENCES `divisi` (`idDivisi`),
  ADD CONSTRAINT `karyawan_ibfk_2` FOREIGN KEY (`idWaktu`) REFERENCES `jam` (`idWaktu`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
