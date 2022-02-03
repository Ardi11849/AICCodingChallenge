-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 03, 2022 at 07:35 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aiccodingchallenge`
--

-- --------------------------------------------------------

--
-- Table structure for table `bonus`
--

CREATE TABLE `bonus` (
  `IdBonus` bigint(20) NOT NULL,
  `JumlahBayar` varchar(20) NOT NULL,
  `Data` varchar(5000) NOT NULL,
  `CreatedBy` bigint(20) NOT NULL,
  `CreatedOn` varchar(20) NOT NULL,
  `ModifiedBy` bigint(20) NOT NULL,
  `ModifiedOn` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bonus`
--

INSERT INTO `bonus` (`IdBonus`, `JumlahBayar`, `Data`, `CreatedBy`, `CreatedOn`, `ModifiedBy`, `ModifiedOn`) VALUES
(2, '2000000', 'a:7:{i:0;a:3:{s:10:\"pembayaran\";s:6:\"400000\";s:4:\"nama\";s:4:\"test\";s:6:\"persen\";s:2:\"20\";}i:1;a:3:{s:10:\"pembayaran\";s:6:\"400000\";s:4:\"nama\";s:5:\"test2\";s:6:\"persen\";s:2:\"20\";}i:2;a:3:{s:10:\"pembayaran\";s:6:\"400000\";s:4:\"nama\";s:5:\"test3\";s:6:\"persen\";s:2:\"20\";}i:3;a:3:{s:10:\"pembayaran\";s:6:\"200000\";s:4:\"nama\";s:5:\"test4\";s:6:\"persen\";s:2:\"10\";}i:4;a:3:{s:10:\"pembayaran\";s:6:\"200000\";s:4:\"nama\";s:5:\"test5\";s:6:\"persen\";s:2:\"10\";}i:5;a:3:{s:10:\"pembayaran\";s:6:\"200000\";s:4:\"nama\";s:5:\"test6\";s:6:\"persen\";s:2:\"10\";}i:6;a:3:{s:10:\"pembayaran\";s:6:\"200000\";s:4:\"nama\";s:4:\"test\";s:6:\"persen\";s:2:\"10\";}}', 1, '2022-02-03 07:00:13', 0, ''),
(3, '10000000', 'a:3:{i:0;a:3:{s:10:\"pembayaran\";s:7:\"2000000\";s:4:\"nama\";s:4:\"test\";s:6:\"persen\";s:2:\"20\";}i:1;a:3:{s:10:\"pembayaran\";s:7:\"3000000\";s:4:\"nama\";s:4:\"test\";s:6:\"persen\";s:2:\"30\";}i:2;a:3:{s:10:\"pembayaran\";s:7:\"5000000\";s:4:\"nama\";s:4:\"test\";s:6:\"persen\";s:2:\"50\";}}', 1, '2022-02-03 07:31:30', 0, ''),
(4, '300000', 'a:3:{i:0;a:3:{s:10:\"pembayaran\";s:5:\"30000\";s:4:\"nama\";s:1:\"a\";s:6:\"persen\";s:2:\"10\";}i:1;a:3:{s:10:\"pembayaran\";s:5:\"30000\";s:4:\"nama\";s:1:\"b\";s:6:\"persen\";s:2:\"10\";}i:2;a:3:{s:10:\"pembayaran\";s:6:\"240000\";s:4:\"nama\";s:1:\"c\";s:6:\"persen\";s:2:\"80\";}}', 2, '2022-02-03 07:34:21', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `IdUser` bigint(20) NOT NULL,
  `Username` varchar(20) NOT NULL,
  `Password` varchar(20) NOT NULL,
  `Role` int(11) NOT NULL COMMENT '1: Admin, 2: User',
  `CreatedBy` bigint(20) NOT NULL,
  `CreatedOn` varchar(20) NOT NULL,
  `ModifiedBy` bigint(20) DEFAULT NULL,
  `ModifiedOn` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`IdUser`, `Username`, `Password`, `Role`, `CreatedBy`, `CreatedOn`, `ModifiedBy`, `ModifiedOn`) VALUES
(1, 'Admin', '3189694919', 1, 1, '2022-02-02 21:14:58', NULL, NULL),
(2, 'User', '3143047048', 2, 1, '2022-02-02 21:14:58', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bonus`
--
ALTER TABLE `bonus`
  ADD PRIMARY KEY (`IdBonus`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`IdUser`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bonus`
--
ALTER TABLE `bonus`
  MODIFY `IdBonus` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `IdUser` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
