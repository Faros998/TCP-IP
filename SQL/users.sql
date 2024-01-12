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
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `created_at`) VALUES
(1, 'Holec', '$2y$10$9cvjjudvvYfGPjirYdgiR.CizVAcKFefjLvWX/sON3pp2zKAL6wSW', '2023-08-24 08:20:05'),
(10, 'Bittner', '$2y$10$zcbQ5FYp1Vzdou6yWHNzv.jyJefYhVvzO665FHu8UearvD63aOKhu', '2024-01-02 13:08:11'),
(11, 'Špála', '$2y$10$iwNWgO5GGRuk1ON5J/GC/eXC9nJ5gwX6AjYwRJtjedE9AhduKRium', '2024-01-02 13:10:05'),
(12, 'Pokorný', '$2y$10$quCHK367xtdqP83hsm4P8OztV/9.qbRznd2MfGl9N8mJmpGk0LqWa', '2024-01-02 13:10:46'),
(13, 'Rýgl', '$2y$10$10R6lRmxNC0Ad3Wu2e11xuRvk.127N.O4pT7FXuvts.SJXsuoHGfy', '2024-01-02 13:11:12'),
(14, 'Kolář', '$2y$10$nE0jkltXcOwHSGRxZVkv9OPr63bGLZkKIWAp7BcNbL5qmcwrc532G', '2024-01-02 13:11:30'),
(15, 'Klaban', '$2y$10$AYHOFI27z3.HKTc50c7rAu104SlfOrSVu6Fwxq0Jbw5WVGHnJstw.', '2024-01-02 13:11:50'),
(16, 'Vávra', '$2y$10$b8Ovf1x5W012gdBLgLJtWui2APErQRIojaQWfRDQEl3tz2Ymul6CW', '2024-01-02 13:12:48'),
(17, 'Varta', '$2y$10$pa37vtD5RrYLYzaQDDTotOm5HSBKN5M0UBdFQ0AVNTngXtK6Qfn.C', '2024-01-02 13:13:05'),
(18, 'Zajíc', '$2y$10$BmJyyKs4yuUHzFSxA2Ue8uLOJYVBGKe3EgpOWRaAQADi/rG91Z5DO', '2024-01-02 13:13:20'),
(19, 'Havlas', '$2y$10$YpYOTBsl3c.k7Zy/Kb0FPe3cNwQGnBj.v6OyNmfqgk/0YBa0J2T9W', '2024-01-02 13:14:25'),
(20, 'Vopalecký', '$2y$10$mDMQXoTeB8aJgnft0H40JeUiNtr3vBNqao3jKnVn/GsHBMl1s1l3a', '2024-01-02 13:15:35');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
