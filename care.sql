-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 16, 2022 at 06:12 AM
-- Server version: 8.0.18
-- PHP Version: 7.4.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `care`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

DROP TABLE IF EXISTS `appointments`;
CREATE TABLE IF NOT EXISTS `appointments` (
  `appointment_ID` int(11) NOT NULL AUTO_INCREMENT,
  `patient_id` int(11) DEFAULT NULL,
  `doctor_id` int(11) DEFAULT NULL,
  `date_of_appointment` date NOT NULL,
  `date_of_creation` date NOT NULL,
  `doc_remarks` varchar(255) NOT NULL,
  PRIMARY KEY (`appointment_ID`),
  KEY `Fk_03` (`patient_id`),
  KEY `Fk_04` (`doctor_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

DROP TABLE IF EXISTS `cities`;
CREATE TABLE IF NOT EXISTS `cities` (
  `cID` int(11) NOT NULL AUTO_INCREMENT,
  `city_Name` varchar(100) NOT NULL,
  PRIMARY KEY (`cID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`cID`, `city_Name`) VALUES
(1, 'Multan'),
(4, 'Karachi');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

DROP TABLE IF EXISTS `departments`;
CREATE TABLE IF NOT EXISTS `departments` (
  `dID` int(11) NOT NULL AUTO_INCREMENT,
  `depart_Name` varchar(100) NOT NULL,
  `depart_desc` text NOT NULL,
  `depart_pic` varchar(255) NOT NULL,
  PRIMARY KEY (`dID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`dID`, `depart_Name`, `depart_desc`, `depart_pic`) VALUES
(1, 'Cardiology', 'Cardiology is a branch of medicine that deals with disorders of the heart and the cardiovascular system. The field includes medical diagnosis and treatment of congenital heart defects, coronary artery disease, heart failure, valvular heart disease and electrophysiology', ''),
(3, 'Ontology', 'Ontology is the branch of philosophy that studies concepts such as existence, being, becoming, and reality. It includes the questions of how entities are grouped into basic categories and which of these entities exist on the most fundamental level.', '');

-- --------------------------------------------------------

--
-- Table structure for table `dieases`
--

DROP TABLE IF EXISTS `dieases`;
CREATE TABLE IF NOT EXISTS `dieases` (
  `d_id` int(11) NOT NULL AUTO_INCREMENT,
  `dName` varchar(50) NOT NULL,
  `description` varchar(255) NOT NULL,
  `prevention` varchar(255) NOT NULL,
  `pic` varchar(255) NOT NULL,
  PRIMARY KEY (`d_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

DROP TABLE IF EXISTS `doctors`;
CREATE TABLE IF NOT EXISTS `doctors` (
  `docID` int(11) NOT NULL AUTO_INCREMENT,
  `FirstName` varchar(50) NOT NULL,
  `LastName` varchar(50) NOT NULL,
  `Address` varchar(200) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `DOB` date NOT NULL,
  `pic` varchar(255) NOT NULL,
  `cityID` int(11) DEFAULT NULL,
  `deptID` int(11) DEFAULT NULL,
  `status` varchar(50) DEFAULT 'Active',
  PRIMARY KEY (`docID`),
  KEY `Fk_01` (`cityID`),
  KEY `Fk_02` (`deptID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`docID`, `FirstName`, `LastName`, `Address`, `Email`, `Password`, `contact`, `DOB`, `pic`, `cityID`, `deptID`, `status`) VALUES
(1, 'Hamid', 'Shaikh', 'unit #2 auto bhan', 'hamid@gmail.com', 'dfb8e2bec9362a4e99e0cc79af77f123', '033333', '1973-02-02', 'userImages/60ed3822de8c8585e4bc4cb11b227491c3395.png', 1, 1, 'Active'),
(2, 'Shafiq', 'Khan', 'Nazimabad Karachi', 'shafiq@gmail.com', 'be093d5cdde4c919acc439e74ec5b6e9', '333 36956412', '1975-05-01', 'userImages/60f2760a1408fdownload.png', 4, 1, 'Active'),
(3, 'Umer', 'Khan', 'Multan', 'umer@gmail.com', 'cd4fee1a1c78b045e2fb2a7ff484b5a9', '033345855', '1985-01-02', 'userImages/60f2788987308WhatsApp_Image_2019-05-10_at_2_52_34_PM1.jpeg', 1, 1, 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

DROP TABLE IF EXISTS `patients`;
CREATE TABLE IF NOT EXISTS `patients` (
  `patientID` int(11) NOT NULL AUTO_INCREMENT,
  `FirstName` varchar(50) NOT NULL,
  `LastName` varchar(50) NOT NULL,
  `Address` varchar(200) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `PASSWORD` varchar(255) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `DOB` date NOT NULL,
  PRIMARY KEY (`patientID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `userid` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(50) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `pic` varchar(255) NOT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userid`, `Name`, `Email`, `contact`, `password`, `pic`) VALUES
(1, 'Asad', 'asad@care.com', '+92 3333333', '50ffd40a94585d7e11ae55b89cab5576', 'userImages/Asad1.jpg');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointments`
--
ALTER TABLE `appointments`
  ADD CONSTRAINT `Fk_03` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`patientID`),
  ADD CONSTRAINT `Fk_04` FOREIGN KEY (`doctor_id`) REFERENCES `doctors` (`docID`);

--
-- Constraints for table `doctors`
--
ALTER TABLE `doctors`
  ADD CONSTRAINT `Fk_01` FOREIGN KEY (`cityID`) REFERENCES `cities` (`cID`),
  ADD CONSTRAINT `Fk_02` FOREIGN KEY (`deptID`) REFERENCES `departments` (`dID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
