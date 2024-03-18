-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 28, 2023 at 08:09 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `layanan_pengaduan`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrasi`
--

CREATE TABLE `administrasi` (
  `no_ref` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `nim` varchar(20) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `program_studi` varchar(128) NOT NULL,
  `jenis_biaya` varchar(64) NOT NULL,
  `deskripsi` varchar(512) NOT NULL,
  `lampiran` varchar(256) NOT NULL,
  `status` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `administrasi`
--

INSERT INTO `administrasi` (`no_ref`, `tanggal`, `nim`, `nama`, `program_studi`, `jenis_biaya`, `deskripsi`, `lampiran`, `status`) VALUES
(6, '0000-00-00', '123', '', 'Pilih', 'Pilih', '', '', 'diproses');

-- --------------------------------------------------------

--
-- Table structure for table `akademik_model`
--

CREATE TABLE `akademik_model` (
  `id_akademik` int(12) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `nim` char(8) DEFAULT NULL,
  `nama` varchar(30) DEFAULT NULL,
  `program_studi` varchar(30) DEFAULT NULL,
  `pilihan_akademik` varchar(30) DEFAULT NULL,
  `deskripsi_pengaduan` varchar(100) DEFAULT NULL,
  `status` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `akademik_model`
--

INSERT INTO `akademik_model` (`id_akademik`, `tanggal`, `nim`, `nama`, `program_studi`, `pilihan_akademik`, `deskripsi_pengaduan`, `status`) VALUES
(867225, '0000-00-00', '', '', 'Pilih', 'Pilih', '', 'diproses');

-- --------------------------------------------------------

--
-- Table structure for table `infrastruktur`
--

CREATE TABLE `infrastruktur` (
  `nim` char(8) NOT NULL,
  `nama` varchar(30) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `kategori` varchar(20) DEFAULT NULL,
  `lokasi` varchar(40) DEFAULT NULL,
  `deskripsi` varchar(100) DEFAULT NULL,
  `lampiran` varchar(10) DEFAULT NULL,
  `status` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `infrastruktur`
--

INSERT INTO `infrastruktur` (`nim`, `nama`, `tanggal`, `kategori`, `lokasi`, `deskripsi`, `lampiran`, `status`) VALUES
('1221204', '', '0000-00-00', 'Pilih', '', '', '', 'terkirim'),
('3221283', '', '0000-00-00', 'Infrastruktur', '', '', 'Screenshot', 'diproses');

-- --------------------------------------------------------

--
-- Table structure for table `keamanan`
--

CREATE TABLE `keamanan` (
  `nim` char(8) NOT NULL,
  `nama` varchar(30) DEFAULT NULL,
  `kontak` varchar(13) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `lokasi` varchar(30) DEFAULT NULL,
  `deskripsi` varchar(100) DEFAULT NULL,
  `lampiran` varchar(20) DEFAULT NULL,
  `status` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `keamanan`
--

INSERT INTO `keamanan` (`nim`, `nama`, `kontak`, `tanggal`, `lokasi`, `deskripsi`, `lampiran`, `status`) VALUES
('', '', '', '0000-00-00', '', '', 'Cinnamon.jpg', 'selesai'),
('1222333', '', '', '0000-00-00', '', '', '', 'diproses'),
('123', '', '', '0000-00-00', '', '', '', 'selesai'),
('5421', NULL, NULL, NULL, NULL, NULL, NULL, 'terkirim');

-- --------------------------------------------------------

--
-- Table structure for table `keluhan`
--

CREATE TABLE `keluhan` (
  `id_keluhan` char(20) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `nama_mhs` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `keluhan`
--

INSERT INTO `keluhan` (`id_keluhan`, `tanggal`, `nama_mhs`) VALUES
('231', '0000-00-00', ''),
('23423', '0000-00-00', ''),
('424341', '2023-06-24', 'sqjdhkq'),
('63425734', '2023-06-14', 'nian'),
('72634', '0000-00-00', '');

-- --------------------------------------------------------

--
-- Table structure for table `pengaduan`
--

CREATE TABLE `pengaduan` (
  `id_pengaduan` char(8) NOT NULL,
  `tanggal_pengaduan` date DEFAULT NULL,
  `nama_mahasiswa` varchar(40) DEFAULT NULL,
  `nim` char(8) NOT NULL,
  `deskripsi` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengaduan`
--

INSERT INTO `pengaduan` (`id_pengaduan`, `tanggal_pengaduan`, `nama_mahasiswa`, `nim`, `deskripsi`) VALUES
('31221321', '0000-00-00', '', '', ''),
('3545', '0000-00-00', '', '', ''),
('452', '0000-00-00', '', '', ''),
('563452', '0000-00-00', '', '', ''),
('76231', '2023-06-21', 'nana', '73682', 'saya adalah'),
('7631723', '2023-06-24', 'nina', '2537123', 'nama saya'),
('787', '0000-00-00', '', '', ''),
('787321', '0000-00-00', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
  `id_profile` char(12) NOT NULL,
  `nim` char(8) DEFAULT NULL,
  `Name` varchar(30) DEFAULT NULL,
  `program_studi` varchar(10) DEFAULT NULL,
  `Email` varchar(40) DEFAULT NULL,
  `Phone` varchar(15) DEFAULT NULL,
  `Birthdate` date DEFAULT NULL,
  `Address` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`id_profile`, `nim`, `Name`, `program_studi`, `Email`, `Phone`, `Birthdate`, `Address`) VALUES
('623', NULL, 'roro', NULL, 'roro@gmai.com', '0983641726', '2023-06-25', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `email` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `email`) VALUES
(1, 'admin', '$2y$10$ULALSmcZtWys2I9XKp7TTuFkh/7vQYUTMJtLj2Ldu1QnwdDSDsS/a', 'ryuunosuke6969@gmail.com'),
(3, 'ryuunosuke69', '$2y$10$WYn2u.jphF6bzJ.ijlH44urKTGH2eaaOIKWOck2Moa5ycpjym7Iue', 'smallchisa@gmail.com'),
(7, 'asd', '$2y$10$1e0UEMc6ux20vDLQ1yM/Ie2KhlDvQ9v7vy7Ng/7fA9bokZ1W.qrae', 'kawachi05@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `usermhs`
--

CREATE TABLE `usermhs` (
  `id` int(11) NOT NULL,
  `nim` varchar(20) NOT NULL,
  `name` varchar(128) NOT NULL,
  `username` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `jurusan` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `phone` varchar(64) NOT NULL,
  `address` varchar(512) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `usermhs`
--

INSERT INTO `usermhs` (`id`, `nim`, `name`, `username`, `password`, `jurusan`, `email`, `phone`, `address`) VALUES
(4, '1221204', 'Algi Soleh Rizaldi', 'ryuunosuke69', '$2y$10$zAoVdCXVWoRuIe7rZ2rpouY92BK7.fBZwO4vU3xEOIAw3PEcPH6RO', 'Teknik Informatika', 'ryuunosuke6969@gmail.com', '+628976554434', '-'),
(5, '122233', 'Mitsuhara Reina', 'reirei1', '$2y$10$wN0KfQYYJFvgix7Y2w/2JuI1C2G157VDKZkTcif51GCncjS5G8Mty', 'Teknik Informatika', 'reirei@gmail.com', '+1 2233 1313 654', 'Kp. Pintu Kaler, RT 03 RW 01 ,Desa Sukamanah, Kec. Pangalengan, Kab. Bandung');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administrasi`
--
ALTER TABLE `administrasi`
  ADD PRIMARY KEY (`no_ref`);

--
-- Indexes for table `akademik_model`
--
ALTER TABLE `akademik_model`
  ADD PRIMARY KEY (`id_akademik`);

--
-- Indexes for table `infrastruktur`
--
ALTER TABLE `infrastruktur`
  ADD PRIMARY KEY (`nim`);

--
-- Indexes for table `keamanan`
--
ALTER TABLE `keamanan`
  ADD PRIMARY KEY (`nim`);

--
-- Indexes for table `keluhan`
--
ALTER TABLE `keluhan`
  ADD PRIMARY KEY (`id_keluhan`);

--
-- Indexes for table `pengaduan`
--
ALTER TABLE `pengaduan`
  ADD PRIMARY KEY (`id_pengaduan`);

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`id_profile`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `usermhs`
--
ALTER TABLE `usermhs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `administrasi`
--
ALTER TABLE `administrasi`
  MODIFY `no_ref` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `akademik_model`
--
ALTER TABLE `akademik_model`
  MODIFY `id_akademik` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=867226;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `usermhs`
--
ALTER TABLE `usermhs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
