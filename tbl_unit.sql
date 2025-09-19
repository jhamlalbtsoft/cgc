-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 19, 2025 at 06:23 PM
-- Server version: 8.0.41-cll-lve
-- PHP Version: 8.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cgchamber19_cgchambe_raipur`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_unit`
--

CREATE TABLE `tbl_unit` (
  `id` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `distict_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_unit`
--

INSERT INTO `tbl_unit` (`id`, `name`, `distict_id`) VALUES
(1, 'Ambikapur  ', 6),
(2, 'Manendragarh-Chirmiri-Bharatpur  ', 41),
(3, 'Korea ', 19),
(4, 'Bilaspur ', 17),
(5, 'Mungeli  ', 18),
(6, 'Raigarh  ', 4),
(7, 'Kharsia  ', 4),
(8, 'Lailunga  ', 4),
(9, 'Gharghoda ', 4),
(10, 'Sarangarh  ', 45),
(11, 'Barmkela  ', 45),
(12, 'Sariya ', 45),
(13, 'Champa ', 5),
(14, 'Naila-Janjgir', 5),
(15, 'Janjgir ', 5),
(16, 'Sakti', 43),
(17, 'Dabhra  ', 42),
(18, 'Baradwar  ', 43),
(19, 'Korba  ', 12),
(20, 'Nawapara  ', 1),
(21, 'Tilda  ', 1),
(22, 'Kharora  ', 1),
(23, 'Mahasamund  ', 2),
(24, 'Sarayapali  ', 2),
(25, 'Basna  ', 2),
(26, 'Bhatapara ', 7),
(27, 'Dhamtari  ', 3),
(28, 'Durg ', 10),
(29, 'Bhilai  ', 38),
(30, 'Rajnandgaon  ', 16),
(31, 'Balod  ', 14),
(32, 'Dallirajhara  ', 14),
(33, 'Gunderdehi  ', 14),
(34, 'Balodabazar  ', 7),
(35, 'Gaurela-Pendra-Marwahi ', 36),
(36, 'Patharia ', 18),
(37, 'Bemetara District ', 11),
(38, 'Saja ', 11),
(39, 'Dantewada', 24),
(40, 'Gariaband ', 13),
(41, 'Rajim  ', 13),
(42, 'Akaltara  ', 5),
(43, 'Kabirdham (Kawardha) District  ', 15),
(44, 'Kanker District ', 9),
(45, 'Charama  ', 9),
(46, 'Patthalgaon', 25);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_unit`
--
ALTER TABLE `tbl_unit`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_unit`
--
ALTER TABLE `tbl_unit`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
