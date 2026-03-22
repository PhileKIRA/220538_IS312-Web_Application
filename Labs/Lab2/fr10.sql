-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 22, 2026 at 02:18 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fru10`
--

-- --------------------------------------------------------

--
-- Table structure for table `program`
--

CREATE TABLE `program` (
  `ProgramCode` varchar(10) NOT NULL,
  `ProgramName` varchar(100) NOT NULL,
  `Duration` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `program`
--

INSERT INTO `program` (`ProgramCode`, `ProgramName`, `Duration`) VALUES
('BM', 'Business Maths', '2 years'),
('BS', 'Bachelor of Business Studies', '4 Years'),
('IS', 'Bachelor of Information Systems', '4 Years'),
('IT', 'Infor Tech', '2 years');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `StudentNo` int(11) NOT NULL,
  `Firstname` varchar(50) NOT NULL,
  `Lastname` varchar(50) NOT NULL,
  `Gender` varchar(10) NOT NULL,
  `ContactNo` varchar(20) NOT NULL,
  `ProgramCode` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`StudentNo`, `Firstname`, `Lastname`, `Gender`, `ContactNo`, `ProgramCode`) VALUES
(11111, 'James', 'Peter', 'Male', '71717171', 'BS'),
(22222, 'Peter', 'Mark', 'Male', '71727172', 'BS'),
(33333, 'Mary', 'John', 'Female', '71737173', 'IS'),
(44444, 'Belinda', 'Cain', 'Female', '71717271', 'IS');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `program`
--
ALTER TABLE `program`
  ADD PRIMARY KEY (`ProgramCode`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`StudentNo`),
  ADD KEY `fk_program_code` (`ProgramCode`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `fk_program_code` FOREIGN KEY (`ProgramCode`) REFERENCES `program` (`ProgramCode`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

