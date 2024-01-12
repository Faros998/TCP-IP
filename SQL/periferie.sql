-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 12, 2024 at 08:48 AM
-- Server version: 5.7.24
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ip`
--

-- --------------------------------------------------------

--
-- Table structure for table `periferie`
--

DROP TABLE IF EXISTS `periferie`;
CREATE TABLE `periferie` (
  `idperiferie` int(11) NOT NULL,
  `name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `periferie`
--

INSERT INTO `periferie` (`idperiferie`, `name`) VALUES
(1, ''),
(2, 'PC'),
(3, 'BRÁNA'),
(4, 'BROADCAST'),
(5, 'DHCP'),
(6, 'EKV'),
(7, 'EPYGI'),
(8, 'IP TELEFON'),
(9, 'KAMERA'),
(10, 'NAS'),
(11, 'NOTEBOOK'),
(12, 'NVR'),
(13, 'SCO'),
(14, 'SÍŤ'),
(15, 'SWITCH'),
(16, 'TISK'),
(17, 'ZAPŮJČENÁ IP'),
(18, 'SERVER'),
(19, 'NEZNÁMÉ'),
(20, 'VOLNÁ');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `periferie`
--
ALTER TABLE `periferie`
  ADD PRIMARY KEY (`idperiferie`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `periferie`
--
ALTER TABLE `periferie`
  MODIFY `idperiferie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
