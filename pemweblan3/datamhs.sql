-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 26, 2021 at 12:59 PM
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
-- Database: `pemweblan`
--

-- --------------------------------------------------------

--
-- Table structure for table `datamhs`
--

CREATE TABLE `datamhs` (
  `nim` char(8) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `passwd` varchar(255) NOT NULL,
  `tgl` date NOT NULL,
  `ket` varchar(255) NOT NULL,
  `prodi` varchar(64) NOT NULL,
  `gender` varchar(64) NOT NULL,
  `warga` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `datamhs`
--

INSERT INTO `datamhs` (`nim`, `nama`, `passwd`, `tgl`, `ket`, `prodi`, `gender`, `warga`) VALUES
('m3119001', 'Yoga Pratama', 'baik', '2021-03-04', 'Baik', 'D4K3', 'L', 'WNI'),
('m3119002', 'Yoga Pratama', '1234', '2021-03-03', 'Baik', 'Informatika', 'P', 'WNI'),
('m3119003', 'Test', '555', '2021-03-01', 'Sehat', 'D3TI', 'P', 'WNI'),
('m3119004', 'Test lagi', '12345', '2021-03-09', 'Kurang baik', 'D3TI', 'L', 'WNI');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `datamhs`
--
ALTER TABLE `datamhs`
  ADD PRIMARY KEY (`nim`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
