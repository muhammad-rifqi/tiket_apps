-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 15, 2024 at 05:43 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tiket_apps`
--

-- --------------------------------------------------------

--
-- Table structure for table `foto`
--

CREATE TABLE `foto` (
  `id` int(11) NOT NULL,
  `id_tiket` int(11) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tiket`
--

CREATE TABLE `tiket` (
  `id` int(11) NOT NULL COMMENT 'Primary Key',
  `tiket_number` varchar(100) DEFAULT NULL COMMENT 'Tiket Number',
  `submitted_date` date DEFAULT NULL COMMENT 'Submitted Date',
  `workshop` varchar(255) DEFAULT NULL COMMENT 'Workshop',
  `service` int(11) DEFAULT NULL COMMENT 'Service',
  `part` int(11) DEFAULT NULL COMMENT 'Part'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='datatable demo table';

--
-- Dumping data for table `tiket`
--

INSERT INTO `tiket` (`id`, `tiket_number`, `submitted_date`, `workshop`, `service`, `part`) VALUES
(13, 'tn001', '2024-07-01', 'Sinar Jaya', 3000000, 10000000),
(14, 'tn003', '2024-07-01', 'Mobilindo', 1000000, 0),
(15, 'tn004', '2024-07-02', 'Sinar Jaya', 2000000, 1000000),
(16, 'tn006', '2024-07-03', 'Auto2000', 5000000, 500000),
(17, 'tn007', '2024-07-03', 'Auto2000', 1000000, 20000000),
(18, 'tn009', '2024-07-04', 'Sinar Jaya', 1000000, 1000000),
(19, 'tn010', '2024-07-05', 'Sinar Jaya', 500000, 500000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `foto`
--
ALTER TABLE `foto`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tiket`
--
ALTER TABLE `tiket`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `foto`
--
ALTER TABLE `foto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tiket`
--
ALTER TABLE `tiket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Primary Key', AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
