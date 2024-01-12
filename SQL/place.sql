-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 12, 2024 at 08:49 AM
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
-- Table structure for table `place`
--

DROP TABLE IF EXISTS `place`;
CREATE TABLE `place` (
  `idplace` int(11) NOT NULL,
  `name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `place`
--

INSERT INTO `place` (`idplace`, `name`) VALUES
(1, ''),
(2, 'Benešák'),
(3, 'Cizina'),
(4, 'Cizina Hrádek'),
(5, 'Cizina Vápenka'),
(6, 'Hipologie Frýdlant'),
(7, 'Horáková'),
(8, 'OOP Frýdlant'),
(9, 'OOP Centrum'),
(10, 'OOP Č. Dub'),
(11, 'OOP Frýdlant'),
(12, 'OOP Hejnice'),
(13, 'OOP Hodkovice'),
(14, 'OOP Hrádek'),
(15, 'OOP Chrastava'),
(16, 'OOP N. Město'),
(17, 'OOP Vápenka'),
(18, 'OOP Vesec'),
(19, 'OOP Vratislavice'),
(20, 'Pastýřská'),
(21, 'Psovodi Černousy'),
(22, 'Psovodi Ostašov'),
(23, 'Neví se');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `place`
--
ALTER TABLE `place`
  ADD PRIMARY KEY (`idplace`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `place`
--
ALTER TABLE `place`
  MODIFY `idplace` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
