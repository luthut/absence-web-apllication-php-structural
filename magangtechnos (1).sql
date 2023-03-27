-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 12, 2022 at 06:20 AM
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
  `statusMasuk` enum('hadir','terlambat','alpa') DEFAULT 'alpa',
  `statusPulang` enum('hadir','terlambat','alpa') DEFAULT 'alpa'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `absensi`
--

INSERT INTO `absensi` (`idAbsen`, `idKaryawan`, `tanggal`, `masuk`, `pulang`, `statusMasuk`, `statusPulang`) VALUES
(6, 50, '2022-09-01', '07:00:00', '23:57:59', 'hadir', 'terlambat'),
(7, 50, '2022-08-24', '07:00:00', '20:00:30', 'hadir', 'terlambat'),
(17, 50, '2022-09-03', '09:16:09', NULL, 'terlambat', ''),
(28, 50, '2022-08-04', '22:51:07', '22:51:14', 'terlambat', 'terlambat'),
(29, 50, '2022-09-05', '08:05:48', NULL, 'hadir', NULL),
(30, 2, '2022-09-05', '08:06:13', NULL, 'hadir', NULL),
(35, 50, '2022-09-06', '06:54:34', '16:49:19', 'hadir', 'hadir'),
(36, 2, '2022-09-06', '06:54:50', '16:51:01', 'hadir', 'hadir'),
(39, 2, '2022-09-07', '08:05:09', '16:06:22', 'hadir', 'hadir'),
(40, 50, '2022-09-07', '08:06:05', '17:11:28', 'hadir', 'hadir'),
(44, 2, '2022-09-03', NULL, NULL, 'alpa', 'alpa'),
(48, 2, '2022-09-04', NULL, NULL, 'alpa', 'alpa'),
(49, 50, '2022-09-04', NULL, NULL, 'alpa', 'alpa'),
(58, 2, '2022-08-30', NULL, NULL, 'alpa', 'alpa'),
(59, 50, '2022-08-30', NULL, NULL, 'alpa', 'alpa'),
(63, 2, '2022-08-31', NULL, NULL, 'alpa', 'alpa'),
(64, 50, '2022-08-31', NULL, NULL, 'alpa', 'alpa'),
(68, 2, '2022-09-01', NULL, NULL, 'alpa', 'alpa'),
(82, 50, '2022-09-08', '15:21:50', NULL, 'terlambat', NULL),
(83, 2, '2022-09-08', NULL, NULL, 'alpa', 'alpa'),
(87, 2, '2022-09-11', NULL, '22:49:30', 'alpa', 'terlambat'),
(88, 2, '2022-09-11', '22:49:38', NULL, 'terlambat', NULL),
(89, 2, '2022-09-11', '22:49:49', NULL, 'terlambat', NULL),
(90, 2, '2022-09-11', '22:49:51', NULL, 'terlambat', NULL),
(91, 2, '2022-09-11', '22:49:59', NULL, 'terlambat', NULL),
(92, 50, '2022-09-11', '22:50:15', '22:50:18', 'terlambat', 'terlambat'),
(93, 2, '2022-09-10', NULL, NULL, 'alpa', 'alpa'),
(94, 50, '2022-09-10', NULL, NULL, 'alpa', 'alpa'),
(95, 87, '2022-09-11', '22:58:02', '22:58:05', 'terlambat', 'terlambat'),
(96, 87, '2022-09-10', NULL, NULL, 'alpa', 'alpa');

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
  `mulai` time NOT NULL,
  `selesai` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jam`
--

INSERT INTO `jam` (`idWaktu`, `keterangan`, `mulai`, `selesai`) VALUES
(1, 'Masuk', '06:00:00', '09:00:00'),
(2, 'Pulang', '16:00:00', '18:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `idKaryawan` int(5) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `telepon` varchar(15) NOT NULL,
  `gender` enum('L','P') NOT NULL DEFAULT 'L',
  `email` varchar(100) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `idDivisi` int(5) NOT NULL,
  `username` varchar(12) NOT NULL,
  `passwd` varchar(42) NOT NULL,
  `akses` enum('admin','user') NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`idKaryawan`, `nama`, `alamat`, `telepon`, `gender`, `email`, `foto`, `idDivisi`, `username`, `passwd`, `akses`) VALUES
(2, 'Pesulap Merah Muda', 'Jl. Sumber Berkah', '085321728544', 'L', 'red@mail.com', '', 1, 'admin', '202cb962ac59075b964b07152d234b70', 'admin'),
(50, 'Almighty Gus Samsudin', 'Jl. Keris Petir', '08922378342', 'L', 'gus@samsu.din', '1.jpg', 1, 'KerisPetir', '202cb962ac59075b964b07152d234b70', 'admin'),
(87, 'qwe', 'qwe', '345', 'L', 'qwe@gmail.com', '631df7500f9cd_ASRmono.png', 1, 'qwe', '202cb962ac59075b964b07152d234b70', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absensi`
--
ALTER TABLE `absensi`
  ADD PRIMARY KEY (`idAbsen`),
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
  ADD KEY `idDivisi` (`idDivisi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absensi`
--
ALTER TABLE `absensi`
  MODIFY `idAbsen` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT for table `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `idKaryawan` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `absensi`
--
ALTER TABLE `absensi`
  ADD CONSTRAINT `absensi_ibfk_2` FOREIGN KEY (`idKaryawan`) REFERENCES `karyawan` (`idKaryawan`);

--
-- Constraints for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD CONSTRAINT `karyawan_ibfk_1` FOREIGN KEY (`idDivisi`) REFERENCES `divisi` (`idDivisi`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
