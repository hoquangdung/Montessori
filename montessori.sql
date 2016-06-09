-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 09, 2016 at 02:52 AM
-- Server version: 5.6.24
-- PHP Version: 5.5.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `montessori`
--

-- --------------------------------------------------------

--
-- Table structure for table `activities`
--

CREATE TABLE IF NOT EXISTS `activities` (
  `ACT_ID` int(11) NOT NULL,
  `ACT_TYPE_ID` int(11) NOT NULL,
  `ACT_SUBTYPE_ID` int(11) NOT NULL,
  `ACT_NAME` varchar(250) NOT NULL,
  `ACT_MIN_AGE` int(11) DEFAULT NULL,
  `ACT_MAX_AGE` int(11) DEFAULT NULL,
  `ACT_DESCR` text,
  `ACT_NOTES` text
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `activities`
--

INSERT INTO `activities` (`ACT_ID`, `ACT_TYPE_ID`, `ACT_SUBTYPE_ID`, `ACT_NAME`, `ACT_MIN_AGE`, `ACT_MAX_AGE`, `ACT_DESCR`, `ACT_NOTES`) VALUES
(1, 1, 101, 'To extinguish a candle with a snuffer', NULL, NULL, NULL, NULL),
(2, 1, 101, 'To carry a glass of coloured water', NULL, NULL, NULL, NULL),
(3, 1, 102, 'To sit at a table', NULL, NULL, NULL, NULL),
(4, 1, 102, 'To carry a chair', NULL, NULL, NULL, NULL),
(5, 2, 201, 'Sizes > the cylinder blocks (knobbed cylinders or solid insets)', NULL, NULL, NULL, NULL),
(6, 2, 201, 'Sizes > pink tower', NULL, NULL, NULL, NULL),
(7, 2, 202, 'Rough and Smooth > rough and smooth boards 1, 2, and 3', NULL, NULL, NULL, NULL),
(8, 2, 202, 'Rough and Smooth > rough and smooth tablets', NULL, NULL, NULL, NULL),
(9, 3, 301, 'Quantities > number rods (1 – 10)', NULL, NULL, NULL, NULL),
(10, 3, 301, 'Symbols > sandpaper numerals (1 – 9 and 0)', NULL, NULL, NULL, NULL),
(11, 3, 302, 'Quantities > the golden beads (1 – 9,999)', NULL, NULL, NULL, NULL),
(12, 3, 302, 'Quantities > introduction to the decimal system (quantities 1, 10, 100, 1000)', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `activity_subtypes`
--

CREATE TABLE IF NOT EXISTS `activity_subtypes` (
  `ACT_SUBTYPE_ID` int(11) NOT NULL,
  `ACT_SUBTYPE_NAME` varchar(100) NOT NULL,
  `ACT_SUBTYPE_DESCR` text NOT NULL,
  `ACT_SYBTYPE_NOTES` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `activity_subtypes`
--

INSERT INTO `activity_subtypes` (`ACT_SUBTYPE_ID`, `ACT_SUBTYPE_NAME`, `ACT_SUBTYPE_DESCR`, `ACT_SYBTYPE_NOTES`) VALUES
(101, 'The Very First Three Activities of the Very First Day', '', ''),
(102, 'Preliminary Activities', '', ''),
(103, 'Motor Skills', '', ''),
(104, 'Care of Self', '', ''),
(105, 'Care of the Environment', '', ''),
(201, 'Sight', '', ''),
(202, 'Touch', '', ''),
(203, 'Smell', '', ''),
(204, 'Taste', '', ''),
(205, 'Sound', '', ''),
(301, 'Level I: Quantities and Symbols: 1 to 9 and 0', '', ''),
(302, 'Level II: Introduction to the Decimal System', '', ''),
(303, 'Level III: Quantities and Symbols: 11-99', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `activity_types`
--

CREATE TABLE IF NOT EXISTS `activity_types` (
  `ACT_TYPE_ID` int(11) NOT NULL,
  `ACT_TYPE_NAME` varchar(100) NOT NULL,
  `ACT_TYPE_DESCR` text NOT NULL,
  `ACT_TYPE_NOTES` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `activity_types`
--

INSERT INTO `activity_types` (`ACT_TYPE_ID`, `ACT_TYPE_NAME`, `ACT_TYPE_DESCR`, `ACT_TYPE_NOTES`) VALUES
(1, 'Daily Life Activities', '', ''),
(2, 'Sensorial Activities Leading to Mental Development', '', ''),
(3, 'Activities Leading to Mathematical and Logical Mind', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `educations`
--

CREATE TABLE IF NOT EXISTS `educations` (
  `EDU_ID` int(11) NOT NULL,
  `EDU_DEGREE` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `educations`
--

INSERT INTO `educations` (`EDU_ID`, `EDU_DEGREE`) VALUES
(1, 'No Degree'),
(2, '3-month Attestation of Collegial Studies'),
(3, '6-month Attestation of Collegial Studies'),
(4, '1-year Attestation of Collegial Studies'),
(5, '3-year College'),
(6, '4-year University'),
(7, 'Master of Arts'),
(8, 'Doctor of Philosophy');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE IF NOT EXISTS `employees` (
  `EMP_ID` int(11) NOT NULL,
  `EMP_FIRST_NAME` varchar(50) NOT NULL,
  `EMP_LAST_NAME` varchar(25) NOT NULL,
  `EMP_BIRTHDATE` date NOT NULL,
  `EMP_SEX` varchar(1) NOT NULL,
  `EMP_ADDRESS` varchar(50) NOT NULL,
  `EMP_CITY` varchar(20) NOT NULL,
  `EMP_PROVINCE` varchar(20) NOT NULL,
  `EMP_POSTAL_CODE` varchar(10) NOT NULL,
  `EMP_COUNTRY` varchar(20) NOT NULL,
  `EMP_PHONE1` varchar(15) NOT NULL,
  `EMP_PHONE2` varchar(15) DEFAULT NULL,
  `EMP_EMAIL` varchar(50) NOT NULL,
  `EMP_HIRE_DATE` date NOT NULL,
  `EMP_END_DATE` date NOT NULL,
  `EMP_EDU_ID` int(11) NOT NULL,
  `EDU_DAYCARE_EXPERIENCE` tinyint(11) NOT NULL,
  `EDU_MONTESSORI_EXPERIENCE` tinyint(11) NOT NULL,
  `EMP_POST_ID1` int(11) NOT NULL,
  `EMP_POST_ID2` int(11) DEFAULT NULL,
  `EMP_BOSS_ID` int(11) DEFAULT NULL,
  `EMP_HOURLY_RATE` float NOT NULL,
  `EMP_PASSCODE` varchar(10) NOT NULL,
  `EMP_NOTES` text
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`EMP_ID`, `EMP_FIRST_NAME`, `EMP_LAST_NAME`, `EMP_BIRTHDATE`, `EMP_SEX`, `EMP_ADDRESS`, `EMP_CITY`, `EMP_PROVINCE`, `EMP_POSTAL_CODE`, `EMP_COUNTRY`, `EMP_PHONE1`, `EMP_PHONE2`, `EMP_EMAIL`, `EMP_HIRE_DATE`, `EMP_END_DATE`, `EMP_EDU_ID`, `EDU_DAYCARE_EXPERIENCE`, `EDU_MONTESSORI_EXPERIENCE`, `EMP_POST_ID1`, `EMP_POST_ID2`, `EMP_BOSS_ID`, `EMP_HOURLY_RATE`, `EMP_PASSCODE`, `EMP_NOTES`) VALUES
(1, 'Raphaelle', 'Philippe', '1973-06-08', 'F', '1887 Ch. du Tremblay #100', 'Longueuil', 'QC', 'J4N 1A4', 'Canada', ' 450-332-7255', NULL, 'raphaelle.philippe@gmail.com', '2009-06-19', '0000-00-00', 6, 7, 7, 1, 3, NULL, 35.75, '1887', 'The owner of the school'),
(2, 'Jolie', 'Vu', '1982-10-10', 'F', '7381 Av. Rehaume', 'Montreal', 'QC', 'H1K 2S6 ', 'Canada', '514-649-6731', NULL, 'jolie.vu@yahoo.com', '2013-07-04', '0000-00-00', 4, 5, 5, 4, NULL, 1, 15.5, '8772', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `positions`
--

CREATE TABLE IF NOT EXISTS `positions` (
  `POS_ID` int(11) NOT NULL,
  `POS_NAME` varchar(50) NOT NULL,
  `POS_DESCR` text NOT NULL,
  `POS_NOTES` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `positions`
--

INSERT INTO `positions` (`POS_ID`, `POS_NAME`, `POS_DESCR`, `POS_NOTES`) VALUES
(1, 'Director/Directress', '', ''),
(2, 'Manager', '', ''),
(3, 'Educator/Educatress', '', ''),
(4, 'Assistance Educator/Educatress', '', ''),
(5, 'General Assisstance', '', ''),
(6, 'Casual Worker', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE IF NOT EXISTS `students` (
  `STU_ID` int(11) NOT NULL,
  `STU_FIRST_NAME` varchar(50) NOT NULL,
  `STU_LAST_NAME` varchar(25) NOT NULL,
  `STU_BIRTHDATE` date NOT NULL,
  `STU_SEX` varchar(1) NOT NULL,
  `STU_START_DATE` date NOT NULL,
  `STU_GRAD_DATE` date NOT NULL,
  `STU_DAILY_FEE` float NOT NULL,
  `STU_CREDENTIAL` varchar(10) NOT NULL,
  `STU_NOTES` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`STU_ID`, `STU_FIRST_NAME`, `STU_LAST_NAME`, `STU_BIRTHDATE`, `STU_SEX`, `STU_START_DATE`, `STU_GRAD_DATE`, `STU_DAILY_FEE`, `STU_CREDENTIAL`, `STU_NOTES`) VALUES
(1, 'Aiden', '	Tremblay', '2011-04-07', 'M', '0000-00-00', '0000-00-00', 0, '', ''),
(2, 'Emma', 'Smith', '2013-06-24', 'F', '0000-00-00', '0000-00-00', 0, '', ''),
(3, 'Jackson', 'Lam', '2013-09-20', 'M', '0000-00-00', '0000-00-00', 0, '', ''),
(4, 'Sophia', 'Martin', '2014-01-10', 'F', '0000-00-00', '0000-00-00', 0, '', ''),
(5, 'Ethan', 'Brown', '2011-11-19', 'M', '0000-00-00', '0000-00-00', 0, '', ''),
(6, 'Olivia', 'Roy', '2012-09-21', 'F', '0000-00-00', '0000-00-00', 0, '', ''),
(7, 'Liam', 'Gagnon', '2013-11-21', 'M', '0000-00-00', '0000-00-00', 0, '', ''),
(8, 'Isabella', 'Li', '2014-12-24', 'F', '0000-00-00', '0000-00-00', 0, '', ''),
(9, 'Mason', 'Wilson', '2014-03-14', 'M', '0000-00-00', '0000-00-00', 0, '', ''),
(10, 'Ava', 'Miller', '2011-07-13', 'F', '0000-00-00', '0000-00-00', 0, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `student_activity_educator`
--

CREATE TABLE IF NOT EXISTS `student_activity_educator` (
  `STU_ACT_EDR_ID` int(11) NOT NULL,
  `STU_ID` int(11) NOT NULL,
  `ACT_ID` int(11) NOT NULL,
  `EDR_ID` int(11) NOT NULL,
  `DATE` date NOT NULL,
  `DURATION_MINS` smallint(6) NOT NULL,
  `COMPLETENESS_PCT` smallint(6) NOT NULL,
  `EVALUATION` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activities`
--
ALTER TABLE `activities`
  ADD PRIMARY KEY (`ACT_ID`), ADD KEY `ACT_TYPE_ID` (`ACT_TYPE_ID`), ADD KEY `ACT_SUBTYPE_ID` (`ACT_SUBTYPE_ID`), ADD KEY `ACT_ID` (`ACT_ID`);

--
-- Indexes for table `activity_subtypes`
--
ALTER TABLE `activity_subtypes`
  ADD PRIMARY KEY (`ACT_SUBTYPE_ID`), ADD KEY `ACT_SUBTYPE_ID` (`ACT_SUBTYPE_ID`);

--
-- Indexes for table `activity_types`
--
ALTER TABLE `activity_types`
  ADD PRIMARY KEY (`ACT_TYPE_ID`), ADD KEY `ACT_TYPE_ID` (`ACT_TYPE_ID`);

--
-- Indexes for table `educations`
--
ALTER TABLE `educations`
  ADD PRIMARY KEY (`EDU_ID`), ADD KEY `EDU_ID` (`EDU_ID`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`EMP_ID`), ADD KEY `EMP_EDU_ID` (`EMP_EDU_ID`), ADD KEY `EMP_POST_ID1` (`EMP_POST_ID1`), ADD KEY `EMP_POST_ID2` (`EMP_POST_ID2`), ADD KEY `EMP_ID` (`EMP_ID`), ADD KEY `EMP_ID_2` (`EMP_ID`), ADD KEY `EMP_BOSS_ID` (`EMP_BOSS_ID`), ADD KEY `EMP_ID_3` (`EMP_ID`);

--
-- Indexes for table `positions`
--
ALTER TABLE `positions`
  ADD PRIMARY KEY (`POS_ID`), ADD KEY `POS_ID` (`POS_ID`), ADD KEY `POS_ID_2` (`POS_ID`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`STU_ID`), ADD KEY `STU_ID` (`STU_ID`), ADD KEY `STU_ID_2` (`STU_ID`);

--
-- Indexes for table `student_activity_educator`
--
ALTER TABLE `student_activity_educator`
  ADD PRIMARY KEY (`STU_ACT_EDR_ID`), ADD KEY `STU_ID` (`STU_ID`), ADD KEY `EDR_ID` (`EDR_ID`), ADD KEY `ACT_ID` (`ACT_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activities`
--
ALTER TABLE `activities`
  MODIFY `ACT_ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `activity_types`
--
ALTER TABLE `activity_types`
  MODIFY `ACT_TYPE_ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `educations`
--
ALTER TABLE `educations`
  MODIFY `EDU_ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `EMP_ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `positions`
--
ALTER TABLE `positions`
  MODIFY `POS_ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `STU_ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `student_activity_educator`
--
ALTER TABLE `student_activity_educator`
  MODIFY `STU_ACT_EDR_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `activities`
--
ALTER TABLE `activities`
ADD CONSTRAINT `activities_ibfk_1` FOREIGN KEY (`ACT_TYPE_ID`) REFERENCES `activity_types` (`ACT_TYPE_ID`),
ADD CONSTRAINT `activities_ibfk_2` FOREIGN KEY (`ACT_SUBTYPE_ID`) REFERENCES `activity_subtypes` (`ACT_SUBTYPE_ID`);

--
-- Constraints for table `employees`
--
ALTER TABLE `employees`
ADD CONSTRAINT `employees_ibfk_1` FOREIGN KEY (`EMP_EDU_ID`) REFERENCES `educations` (`EDU_ID`),
ADD CONSTRAINT `employees_ibfk_2` FOREIGN KEY (`EMP_POST_ID1`) REFERENCES `positions` (`POS_ID`),
ADD CONSTRAINT `employees_ibfk_3` FOREIGN KEY (`EMP_POST_ID2`) REFERENCES `positions` (`POS_ID`),
ADD CONSTRAINT `employees_ibfk_4` FOREIGN KEY (`EMP_BOSS_ID`) REFERENCES `employees` (`EMP_ID`);

--
-- Constraints for table `student_activity_educator`
--
ALTER TABLE `student_activity_educator`
ADD CONSTRAINT `student_activity_educator_ibfk_1` FOREIGN KEY (`STU_ID`) REFERENCES `students` (`STU_ID`),
ADD CONSTRAINT `student_activity_educator_ibfk_2` FOREIGN KEY (`EDR_ID`) REFERENCES `employees` (`EMP_ID`),
ADD CONSTRAINT `student_activity_educator_ibfk_3` FOREIGN KEY (`ACT_ID`) REFERENCES `activities` (`ACT_ID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
