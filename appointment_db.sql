-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 07, 2022 at 05:44 PM
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
  `p_email` varchar(100) NOT NULL,
  `appDate` date NOT NULL,
  `appTime` time NOT NULL,
  `appSymptoms` text NOT NULL,
  `appComments` text NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'process'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `doctorID` int(11) NOT NULL,
  `d_FirstName` varchar(100) NOT NULL,
  `d_LastName` varchar(100) NOT NULL,
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

INSERT INTO `doctor` (`doctorID`, `d_FirstName`, `d_LastName`, `d_email`, `d_number`, `d_address`, `d_password`, `d_DOB`, `d_gender`, `doctor_type`, `d_specialize`) VALUES
(1, 'Kervy', 'Yu', 'kervy@gmail.com', 8687678, 'nkabdhja', 'b59c67bf196a4758191e42f76670ceba', '1997-12-18', 'male', 'doctor', 'dadwadadad');

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
  MODIFY `requestID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `doctor`
--
ALTER TABLE `doctor`
  MODIFY `doctorID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `patientID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
