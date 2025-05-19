-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 19, 2025 at 08:27 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `majorquiz`
--

-- --------------------------------------------------------

--
-- Table structure for table `login_creds`
--

CREATE TABLE `login_creds` (
  `ID` int(11) NOT NULL,
  `Username` varchar(255) DEFAULT NULL,
  `Password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login_creds`
--

INSERT INTO `login_creds` (`ID`, `Username`, `Password`) VALUES
(1, 'admin', 'adminPassword');

-- --------------------------------------------------------

--
-- Table structure for table `student_records`
--

CREATE TABLE `student_records` (
  `ID` int(11) NOT NULL,
  `StudentID` varchar(8) NOT NULL,
  `Firstname` varchar(50) DEFAULT NULL,
  `Lastname` varchar(50) DEFAULT NULL,
  `Year` tinyint(4) DEFAULT NULL CHECK (`Year` between 1 and 4),
  `Section` char(1) DEFAULT NULL CHECK (`Section` in ('A','B','C','D')),
  `PROJMAN` double DEFAULT NULL,
  `SOFTENG2` double DEFAULT NULL,
  `ELECTIVE2` double DEFAULT NULL,
  `NETCOM` double DEFAULT NULL,
  `PROLANG` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student_records`
--

INSERT INTO `student_records` (`ID`, `StudentID`, `Firstname`, `Lastname`, `Year`, `Section`, `PROJMAN`, `SOFTENG2`, `ELECTIVE2`, `NETCOM`, `PROLANG`) VALUES
(1, 'k1234567', 'Annak', 'Reyes', 3, 'A', 1.5, 2, 1.75, 2.25, 1),
(2, 'a9876543', 'Brian', 'Lopez', 4, 'B', 2.5, 2.25, 2, 2, 1.75),
(3, 'k2023040', 'Carla', 'Mendoza', 2, 'C', 1, 1.25, 1.5, 1, 1.25),
(5, 'k8765432', 'Ella', 'Torres', 4, 'A', 1.75, 2, 1.5, 2.25, 1),
(8, 'k1234567', 'adawad', 'wdawdd', 1, 'A', 1, 1, 1, 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `login_creds`
--
ALTER TABLE `login_creds`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `student_records`
--
ALTER TABLE `student_records`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `login_creds`
--
ALTER TABLE `login_creds`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `student_records`
--
ALTER TABLE `student_records`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
