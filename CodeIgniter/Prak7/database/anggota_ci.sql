-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 02, 2021 at 10:04 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_perpustakaan`
--

-- --------------------------------------------------------

--
-- Table structure for table `anggota_ci`
--

CREATE TABLE `anggota_ci` (
  `id` int(11) NOT NULL,
  `nis` varchar(8) NOT NULL,
  `nama` varchar(64) NOT NULL,
  `tp_lhr` varchar(64) NOT NULL,
  `tg_lhr` date NOT NULL,
  `gender` varchar(16) NOT NULL,
  `no_hp` varchar(32) NOT NULL,
  `email` varchar(64) NOT NULL,
  `kelas` varchar(64) NOT NULL,
  `alamat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `anggota_ci`
--

INSERT INTO `anggota_ci` (`id`, `nis`, `nama`, `tp_lhr`, `tg_lhr`, `gender`, `no_hp`, `email`, `kelas`, `alamat`) VALUES
(1, '01', 'Yoga Pratama', 'Kabupaten Semarang', '1990-01-01', 'Laki-Laki', '085111222333', 'contact@pratamayp.id', 'mipa', 'Ambarawa'),
(2, '02', 'Chelsea Islan', 'Washington DC', '1995-06-02', 'Perempuan', '082123456789', 'chelseaislan@gmail.com', 'sosial', 'Jakarta'),
(24, '03', 'Jennifer Lawrence', 'Indian Hills', '1990-08-15', 'Perempuan', '123456789', 'jenniferlaw@gmail.com', 'mipa', 'Amerika');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anggota_ci`
--
ALTER TABLE `anggota_ci`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `Anggota` (`nis`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `anggota_ci`
--
ALTER TABLE `anggota_ci`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
