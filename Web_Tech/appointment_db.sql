-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 23, 2022 at 04:31 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `appointment_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `requestID` int(11) NOT NULL,
  `d_name` varchar(100) NOT NULL,
  `p_email` varchar(100) NOT NULL,
  `appDate` date NOT NULL,
  `appTime` time NOT NULL,
  `appSymptoms` text NOT NULL,
  `appComments` text NOT NULL,
  `status` enum('process','ongoing','done','') NOT NULL DEFAULT 'process'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`requestID`, `d_name`, `p_email`, `appDate`, `appTime`, `appSymptoms`, `appComments`, `status`) VALUES
(94, '123@gmail.com', 'kervy_yu@gmail.com', '2022-11-09', '19:48:00', 'adawdawda', 'aadasdawd', 'ongoing'),
(95, 'doctor@gmail.com', 'kervy@gmail.com', '2022-11-09', '22:57:00', 'fse', 'se', 'process'),
(96, '123@gmail.com', 'kervy_yu@gmail.com', '2022-11-11', '22:59:00', 'wd', 'ad', 'process'),
(97, '123@gmail.com', 'kervy_yu@gmail.com', '2022-12-01', '22:32:00', 'daw', 'awdawd', 'process'),
(98, 'doc@gmail.com', 'kervy_yu@gmail.com', '2022-11-09', '23:31:00', 'adawdawdaw', 'dawd', 'process');

-- --------------------------------------------------------

--
-- Table structure for table `app_admin`
--

CREATE TABLE `app_admin` (
  `adminID` int(11) NOT NULL,
  `admin_name` varchar(100) NOT NULL,
  `admin_email` varchar(100) NOT NULL,
  `admin_password` varchar(100) NOT NULL,
  `usertype` varchar(100) NOT NULL DEFAULT 'admin'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `app_admin`
--

INSERT INTO `app_admin` (`adminID`, `admin_name`, `admin_email`, `admin_password`, `usertype`) VALUES
(1, 'kervy', 'admin@gmail.com', '1111', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `doctorID` int(11) NOT NULL,
  `d_FullName` varchar(100) NOT NULL,
  `d_email` varchar(100) NOT NULL,
  `d_number` int(12) NOT NULL,
  `d_address` varchar(100) NOT NULL,
  `d_password` varchar(100) NOT NULL,
  `d_DOB` date NOT NULL,
  `d_gender` varchar(100) NOT NULL,
  `doctor_type` varchar(100) NOT NULL DEFAULT 'doctor',
  `d_specialize` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`doctorID`, `d_FullName`, `d_email`, `d_number`, `d_address`, `d_password`, `d_DOB`, `d_gender`, `doctor_type`, `d_specialize`) VALUES
(2, 'Jacob Satorium', '123@gmail.com', 2147483647, 'Tugbungan', 'b59c67bf196a4758191e42f76670ceba', '1982-03-03', 'female', 'doctor', 'wdwad'),
(3, 'adaadadadad', 'doc@gmail.com', 8687678, 'nkabdhja', 'b59c67bf196a4758191e42f76670ceba', '1996-09-17', 'female', 'doctor', 'adadawd'),
(4, 'Zafina', 'doctor@gmail.com', 123123123, 'nkabdhja', 'b59c67bf196a4758191e42f76670ceba', '1996-10-14', 'female', 'doctor', 'awdadawa');

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `patientID` int(11) NOT NULL,
  `p_FullName` varchar(100) NOT NULL,
  `p_password` varchar(100) NOT NULL,
  `p_DOB` date NOT NULL,
  `p_gender` varchar(20) NOT NULL,
  `p_address` varchar(100) NOT NULL,
  `p_number` int(12) NOT NULL,
  `p_email` varchar(100) NOT NULL,
  `patient_type` varchar(100) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`patientID`, `p_FullName`, `p_password`, `p_DOB`, `p_gender`, `p_address`, `p_number`, `p_email`, `patient_type`) VALUES
(89, 'Kervy Yu', 'b59c67bf196a4758191e42f76670ceba', '1998-11-17', 'male', 'Tugbungan', 2147483647, 'junjun@gmail.com', 'user'),
(90, 'Nadyn Tadeos', 'b59c67bf196a4758191e42f76670ceba', '1996-09-16', 'female', 'kervy@gmail.com', 2147483647, 'kervy@gmail.com', 'user'),
(92, 'Abra', '81dc9bdb52d04dc20036dbd8313ed055', '1995-10-16', 'male', 'Guiwan', 2147483647, 'kervy_yu@gmail.com', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`requestID`);

--
-- Indexes for table `app_admin`
--
ALTER TABLE `app_admin`
  ADD PRIMARY KEY (`adminID`);

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`doctorID`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`patientID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `requestID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT for table `app_admin`
--
ALTER TABLE `app_admin`
  MODIFY `adminID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `doctor`
--
ALTER TABLE `doctor`
  MODIFY `doctorID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `patientID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
