-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 10, 2016 at 11:58 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `montessori`
--

-- --------------------------------------------------------

--
-- Table structure for table `activities`
--

CREATE TABLE `activities` (
  `ACT_ID` int(11) NOT NULL,
  `ACT_TYPE_ID` int(11) NOT NULL,
  `ACT_SUBTYPE_ID` int(11) NOT NULL,
  `ACT_NAME` varchar(250) NOT NULL,
  `ACT_MIN_AGE` int(11) DEFAULT NULL,
  `ACT_MAX_AGE` int(11) DEFAULT NULL,
  `ACT_DESCR` text,
  `ACT_NOTES` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(9, 3, 301, 'Quantities > number rods (1 - 10)', NULL, NULL, NULL, NULL),
(10, 3, 301, 'Symbols > sandpaper numerals (1 - 9 and 0)', NULL, NULL, NULL, NULL),
(11, 3, 302, 'Quantities > the golden beads (1 - 9,999)', NULL, NULL, NULL, NULL),
(12, 3, 302, 'Quantities > introduction to the decimal system (quantities 1, 10, 100, 1000)', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `activity_subtypes`
--

CREATE TABLE `activity_subtypes` (
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

CREATE TABLE `activity_types` (
  `ACT_TYPE_ID` int(11) NOT NULL,
  `ACT_TYPE_NAME` varchar(100) NOT NULL,
  `ACT_TYPE_DESCR` text NOT NULL,
  `ACT_TYPE_NOTES` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `activity_types`
--

INSERT INTO `activity_types` (`ACT_TYPE_ID`, `ACT_TYPE_NAME`, `ACT_TYPE_DESCR`, `ACT_TYPE_NOTES`) VALUES
(1, 'Daily Life Activities', '', ''),
(2, 'Sensorial Activities Leading to Mental Development', '', ''),
(3, 'Activities Leading to Mathematical and Logical Mind', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `db_query_logs`
--

CREATE TABLE `db_query_logs` (
  `DB_QL_ID` int(11) NOT NULL,
  `QUERY_STR` varchar(200) NOT NULL,
  `USER_NAME` varchar(50) NOT NULL,
  `DATE_TIME` datetime NOT NULL,
  `IP_ADDR` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `db_query_logs`
--

INSERT INTO `db_query_logs` (`DB_QL_ID`, `QUERY_STR`, `USER_NAME`, `DATE_TIME`, `IP_ADDR`) VALUES
(126, 'INSERT INTO EMPLOYEE_ATTENDANCES(EMP_ID, EVENT_TYPE, DATE_TIME, IP_ADDR, NOTES) VALUES(2, "In", NOW(), "::1", "");', 'Jolie Vu', '2016-06-10 17:45:01', '::1'),
(127, 'INSERT INTO EMPLOYEE_ATTENDANCES(EMP_ID, EVENT_TYPE, DATE_TIME, IP_ADDR, NOTES) VALUES(2, "Out", NOW(), "::1", "");', 'Jolie Vu', '2016-06-10 17:46:06', '::1'),
(128, 'SELECT  DB_QL_ID, QUERY_STR, DATE_TIME, IP_ADDR FROM DB_QUERY_LOGS ORDER BY DATE_TIME DESC;', 'Jolie Vu', '2016-06-10 17:46:12', '::1'),
(129, 'SELECT  * FROM DB_QUERY_LOGS ORDER BY DATE_TIME DESC;', 'Jolie Vu', '2016-06-10 17:48:12', '::1'),
(130, 'INSERT INTO EMPLOYEE_LOG_IOS(EMP_ID, EVENT_TYPE, DATE_TIME, IP_ADDR) VALUES(2, "Out", NOW(), "::1");', 'Jolie Vu', '2016-06-10 17:48:23', '::1'),
(131, 'SELECT  EMP_ID, EMP_FIRST_NAME, EMP_LAST_NAME, EMP_BIRTHDATE, EMP_PHONE1 FROM EMPLOYEES  WHERE EMP_PASSCODE="8772";', 'unknown', '2016-06-10 17:48:30', '::1'),
(132, 'INSERT INTO EMPLOYEE_LOG_IOS(EMP_ID, EVENT_TYPE, DATE_TIME, IP_ADDR) VALUES(2, "In", NOW(), "::1");', 'Jolie Vu', '2016-06-10 17:48:30', '::1'),
(133, 'SELECT  * FROM DB_QUERY_LOGS ORDER BY DATE_TIME DESC;', 'Jolie Vu', '2016-06-10 17:48:38', '::1'),
(134, 'SELECT  * FROM DB_QUERY_LOGS ORDER BY DATE_TIME DESC;', 'Jolie Vu', '2016-06-10 17:50:16', '::1'),
(135, 'INSERT INTO EMPLOYEE_LOG_IOS(EMP_ID, EVENT_TYPE, DATE_TIME, IP_ADDR) VALUES(2, "Out", NOW(), "::1");', 'Jolie Vu', '2016-06-10 17:50:23', '::1'),
(136, 'SELECT  EMP_ID, EMP_FIRST_NAME, EMP_LAST_NAME, EMP_BIRTHDATE, EMP_PHONE1 FROM EMPLOYEES  WHERE EMP_PASSCODE="1887";', 'system', '2016-06-10 17:50:30', '::1'),
(137, 'INSERT INTO EMPLOYEE_LOG_IOS(EMP_ID, EVENT_TYPE, DATE_TIME, IP_ADDR) VALUES(1, "In", NOW(), "::1");', 'Raphaelle Philippe', '2016-06-10 17:50:30', '::1'),
(138, 'SELECT  * FROM DB_QUERY_LOGS ORDER BY DATE_TIME DESC;', 'Raphaelle Philippe', '2016-06-10 17:50:36', '::1'),
(139, 'SELECT  EM_LOG_F_ID, IP_ADDR, PASSCODE, DATE_TIME FROM EMPLOYEE_LOG_FAILURES ORDER BY DATE_TIME DESC;', 'Raphaelle Philippe', '2016-06-10 17:51:02', '::1'),
(140, 'INSERT INTO EMPLOYEE_LOG_IOS(EMP_ID, EVENT_TYPE, DATE_TIME, IP_ADDR) VALUES(1, "Out", NOW(), "::1");', 'Raphaelle Philippe', '2016-06-10 17:51:11', '::1'),
(141, 'SELECT  EMP_ID, EMP_FIRST_NAME, EMP_LAST_NAME, EMP_BIRTHDATE, EMP_PHONE1 FROM EMPLOYEES  WHERE EMP_PASSCODE="5623";', 'system', '2016-06-10 17:51:17', '::1'),
(142, 'INSERT INTO EMPLOYEE_LOG_FAILURES(IP_ADDR, PASSCODE, DATE_TIME) VALUES("::1", "5623", NOW());', 'system', '2016-06-10 17:51:17', '::1'),
(143, 'SELECT  EMP_ID, EMP_FIRST_NAME, EMP_LAST_NAME, EMP_BIRTHDATE, EMP_PHONE1 FROM EMPLOYEES  WHERE EMP_PASSCODE="3254";', 'system', '2016-06-10 17:51:26', '::1'),
(144, 'INSERT INTO EMPLOYEE_LOG_FAILURES(IP_ADDR, PASSCODE, DATE_TIME) VALUES("::1", "3254", NOW());', 'system', '2016-06-10 17:51:26', '::1'),
(145, 'SELECT  EMP_ID, EMP_FIRST_NAME, EMP_LAST_NAME, EMP_BIRTHDATE, EMP_PHONE1 FROM EMPLOYEES  WHERE EMP_PASSCODE="8772";', 'system', '2016-06-10 17:51:36', '::1'),
(146, 'INSERT INTO EMPLOYEE_LOG_IOS(EMP_ID, EVENT_TYPE, DATE_TIME, IP_ADDR) VALUES(2, "In", NOW(), "::1");', 'Jolie Vu', '2016-06-10 17:51:36', '::1'),
(147, 'INSERT INTO EMPLOYEE_ATTENDANCES(EMP_ID, EVENT_TYPE, DATE_TIME, IP_ADDR, NOTES) VALUES(2, "In", NOW(), "::1", "");', 'Jolie Vu', '2016-06-10 17:51:40', '::1'),
(148, 'INSERT INTO EMPLOYEE_ATTENDANCES(EMP_ID, EVENT_TYPE, DATE_TIME, IP_ADDR, NOTES) VALUES(2, "Out", NOW(), "::1", "");', 'Jolie Vu', '2016-06-10 17:51:44', '::1'),
(149, 'SELECT  EM_LOG_F_ID, IP_ADDR, PASSCODE, DATE_TIME FROM EMPLOYEE_LOG_FAILURES ORDER BY DATE_TIME DESC;', 'Jolie Vu', '2016-06-10 17:51:48', '::1'),
(150, 'SELECT  * FROM DB_QUERY_LOGS ORDER BY DATE_TIME DESC;', 'Jolie Vu', '2016-06-10 17:51:59', '::1'),
(151, 'SELECT  * FROM ACTIVITY_TYPES ORDER BY ACT_TYPE_ID ASC;', 'Jolie Vu', '2016-06-10 17:52:48', '::1'),
(152, 'SELECT  * FROM ACTIVITY_SUBTYPES ORDER BY ACT_SUBTYPE_ID ASC;', 'Jolie Vu', '2016-06-10 17:52:57', '::1'),
(153, 'SELECT  * FROM EDUCATIONS ORDER BY EDU_ID ASC;', 'Jolie Vu', '2016-06-10 17:53:03', '::1'),
(154, 'SELECT  * FROM POSITIONS ORDER BY POS_ID ASC;', 'Jolie Vu', '2016-06-10 17:53:07', '::1'),
(155, 'SELECT  * FROM EMPLOYEES ORDER BY EMP_FIRST_NAME ASC;', 'Jolie Vu', '2016-06-10 17:53:11', '::1'),
(156, 'SELECT  * FROM STUDENTS ORDER BY STU_FIRST_NAME ASC;', 'Jolie Vu', '2016-06-10 17:53:16', '::1'),
(157, 'SELECT  * FROM ACTIVITIES ORDER BY ACT_TYPE_ID ASC , ACT_SUBTYPE_ID ASC;', 'Jolie Vu', '2016-06-10 17:53:20', '::1'),
(158, 'SELECT  EMPLOYEE_LOG_IOS.EMP_LOGS_ID, EMPLOYEES.EMP_FIRST_NAME, EMPLOYEES.EMP_LAST_NAME, EMPLOYEE_LOG_IOS.EVENT_TYPE, EMPLOYEE_LOG_IOS.DATE_TIME, EMPLOYEE_LOG_IOS.IP_ADDR FROM EMPLOYEE_LOG_IOS, EMPLOY', 'Jolie Vu', '2016-06-10 17:53:25', '::1'),
(159, 'SELECT  EMPLOYEE_ATTENDANCES.EMP_ATT_ID, EMPLOYEES.EMP_FIRST_NAME, EMPLOYEES.EMP_LAST_NAME, EMPLOYEE_ATTENDANCES.EVENT_TYPE, EMPLOYEE_ATTENDANCES.DATE_TIME, EMPLOYEE_ATTENDANCES.IP_ADDR FROM EMPLOYEE_', 'Jolie Vu', '2016-06-10 17:53:37', '::1'),
(160, 'SELECT  EM_LOG_F_ID, IP_ADDR, PASSCODE, DATE_TIME FROM EMPLOYEE_LOG_FAILURES ORDER BY DATE_TIME DESC;', 'Jolie Vu', '2016-06-10 17:53:47', '::1'),
(161, 'SELECT  * FROM DB_QUERY_LOGS ORDER BY DATE_TIME DESC;', 'Jolie Vu', '2016-06-10 17:53:55', '::1'),
(162, 'SELECT  * FROM DB_QUERY_LOGS ORDER BY DATE_TIME DESC;', 'Jolie Vu', '2016-06-10 17:55:26', '::1'),
(163, 'SELECT  EMPLOYEE_ATTENDANCES.EMP_ATT_ID, EMPLOYEES.EMP_FIRST_NAME, EMPLOYEES.EMP_LAST_NAME, EMPLOYEE_ATTENDANCES.EVENT_TYPE, EMPLOYEE_ATTENDANCES.DATE_TIME, EMPLOYEE_ATTENDANCES.IP_ADDR FROM EMPLOYEE_', 'Jolie Vu', '2016-06-10 17:55:48', '::1'),
(164, 'INSERT INTO EMPLOYEE_ATTENDANCES(EMP_ID, EVENT_TYPE, DATE_TIME, IP_ADDR, NOTES) VALUES(2, "In", NOW(), "::1", "");', 'Jolie Vu', '2016-06-10 17:56:01', '::1'),
(165, 'SELECT  EMPLOYEE_ATTENDANCES.EMP_ATT_ID, EMPLOYEES.EMP_FIRST_NAME, EMPLOYEES.EMP_LAST_NAME, EMPLOYEE_ATTENDANCES.EVENT_TYPE, EMPLOYEE_ATTENDANCES.DATE_TIME, EMPLOYEE_ATTENDANCES.IP_ADDR FROM EMPLOYEE_', 'Jolie Vu', '2016-06-10 17:56:07', '::1'),
(166, 'INSERT INTO EMPLOYEE_ATTENDANCES(EMP_ID, EVENT_TYPE, DATE_TIME, IP_ADDR, NOTES) VALUES(2, "Out", NOW(), "::1", "");', 'Jolie Vu', '2016-06-10 17:56:14', '::1'),
(167, 'SELECT  EMPLOYEE_ATTENDANCES.EMP_ATT_ID, EMPLOYEES.EMP_FIRST_NAME, EMPLOYEES.EMP_LAST_NAME, EMPLOYEE_ATTENDANCES.EVENT_TYPE, EMPLOYEE_ATTENDANCES.DATE_TIME, EMPLOYEE_ATTENDANCES.IP_ADDR FROM EMPLOYEE_', 'Jolie Vu', '2016-06-10 17:56:18', '::1'),
(168, 'SELECT  * FROM DB_QUERY_LOGS ORDER BY DATE_TIME DESC;', 'Jolie Vu', '2016-06-10 17:56:24', '::1');

-- --------------------------------------------------------

--
-- Table structure for table `educations`
--

CREATE TABLE `educations` (
  `EDU_ID` int(11) NOT NULL,
  `EDU_DEGREE` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

CREATE TABLE `employees` (
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`EMP_ID`, `EMP_FIRST_NAME`, `EMP_LAST_NAME`, `EMP_BIRTHDATE`, `EMP_SEX`, `EMP_ADDRESS`, `EMP_CITY`, `EMP_PROVINCE`, `EMP_POSTAL_CODE`, `EMP_COUNTRY`, `EMP_PHONE1`, `EMP_PHONE2`, `EMP_EMAIL`, `EMP_HIRE_DATE`, `EMP_END_DATE`, `EMP_EDU_ID`, `EDU_DAYCARE_EXPERIENCE`, `EDU_MONTESSORI_EXPERIENCE`, `EMP_POST_ID1`, `EMP_POST_ID2`, `EMP_BOSS_ID`, `EMP_HOURLY_RATE`, `EMP_PASSCODE`, `EMP_NOTES`) VALUES
(1, 'Raphaelle', 'Philippe', '1973-06-08', 'F', '1887 Ch. du Tremblay #100', 'Longueuil', 'QC', 'J4N 1A4', 'Canada', ' 450-332-7255', NULL, 'raphaelle.philippe@gmail.com', '2009-06-19', '0000-00-00', 6, 7, 7, 1, 3, NULL, 35.75, '1887', 'The owner of the school'),
(2, 'Jolie', 'Vu', '1982-10-10', 'F', '7381 Av. Rehaume', 'Montreal', 'QC', 'H1K 2S6 ', 'Canada', '514-649-6731', NULL, 'jolie.vu@yahoo.com', '2013-07-04', '0000-00-00', 4, 5, 5, 4, NULL, 1, 15.5, '8772', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `employee_attendances`
--

CREATE TABLE `employee_attendances` (
  `EMP_ATT_ID` int(11) NOT NULL,
  `EMP_ID` int(11) NOT NULL,
  `EVENT_TYPE` varchar(5) NOT NULL,
  `DATE_TIME` datetime NOT NULL,
  `IP_ADDR` varchar(50) NOT NULL,
  `NOTES` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee_attendances`
--

INSERT INTO `employee_attendances` (`EMP_ATT_ID`, `EMP_ID`, `EVENT_TYPE`, `DATE_TIME`, `IP_ADDR`, `NOTES`) VALUES
(1, 2, 'In', '2016-06-09 21:19:27', '::1', ''),
(2, 2, 'In', '2016-06-09 21:21:06', '::1', ''),
(3, 1, 'In', '2016-06-09 21:21:27', '10.1.31.65', ''),
(4, 2, 'In', '2016-06-09 21:23:08', '::1', ''),
(5, 2, 'Out', '2016-06-09 21:33:13', '::1', ''),
(6, 1, 'In', '2016-06-09 21:33:35', '10.1.31.65', ''),
(7, 1, 'Out', '2016-06-09 21:33:36', '10.1.31.65', ''),
(8, 1, 'In', '2016-06-09 21:33:38', '10.1.31.65', ''),
(9, 1, 'Out', '2016-06-09 21:33:38', '10.1.31.65', ''),
(10, 1, 'In', '2016-06-09 21:33:39', '10.1.31.65', ''),
(11, 1, 'Out', '2016-06-09 21:33:39', '10.1.31.65', ''),
(12, 2, 'In', '2016-06-10 10:03:54', '::1', ''),
(13, 1, 'In', '2016-06-10 11:06:05', '::1', ''),
(14, 1, 'Out', '2016-06-10 11:09:55', '::1', ''),
(15, 2, 'In', '2016-06-10 11:56:29', '::1', ''),
(16, 2, 'In', '2016-06-10 11:56:58', '::1', ''),
(17, 2, 'In', '2016-06-10 11:58:39', '::1', ''),
(18, 2, 'In', '2016-06-10 12:00:09', '::1', ''),
(19, 2, 'In', '2016-06-10 12:02:51', '::1', ''),
(20, 2, 'In', '2016-06-10 12:03:20', '::1', ''),
(21, 2, 'Out', '2016-06-10 12:14:25', '::1', ''),
(22, 2, 'In', '2016-06-10 12:18:54', '::1', ''),
(23, 2, 'Out', '2016-06-10 12:18:57', '::1', ''),
(24, 2, 'In', '2016-06-10 12:26:39', '::1', ''),
(25, 2, 'In', '2016-06-10 12:27:11', '::1', ''),
(26, 2, 'In', '2016-06-10 12:27:56', '::1', ''),
(27, 2, 'Out', '2016-06-10 12:28:01', '::1', ''),
(28, 2, 'Out', '2016-06-10 12:28:27', '::1', ''),
(29, 2, 'In', '2016-06-10 12:41:46', '::1', ''),
(30, 2, 'In', '2016-06-10 12:42:20', '::1', ''),
(31, 2, 'Out', '2016-06-10 12:42:26', '::1', ''),
(32, 2, 'In', '2016-06-10 12:50:27', '::1', ''),
(33, 2, 'Out', '2016-06-10 12:50:38', '::1', ''),
(34, 2, 'In', '2016-06-10 13:04:58', '::1', ''),
(35, 2, 'In', '2016-06-10 13:06:57', '::1', ''),
(36, 2, 'In', '2016-06-10 13:12:38', '::1', ''),
(37, 2, 'In', '2016-06-10 13:16:12', '::1', ''),
(38, 2, 'In', '2016-06-10 13:16:59', '::1', ''),
(39, 2, 'Out', '2016-06-10 13:19:35', '::1', ''),
(40, 2, 'In', '2016-06-10 13:35:26', '::1', ''),
(41, 2, 'Out', '2016-06-10 13:35:31', '::1', ''),
(42, 2, 'Out', '2016-06-10 13:37:13', '::1', ''),
(43, 1, 'In', '2016-06-10 13:39:52', '::1', ''),
(44, 1, 'Out', '2016-06-10 13:39:55', '::1', ''),
(45, 2, 'In', '2016-06-10 17:25:05', '::1', ''),
(46, 2, 'Out', '2016-06-10 17:25:19', '::1', ''),
(47, 2, 'In', '2016-06-10 17:45:01', '::1', ''),
(48, 2, 'Out', '2016-06-10 17:46:06', '::1', ''),
(49, 2, 'In', '2016-06-10 17:51:40', '::1', ''),
(50, 2, 'Out', '2016-06-10 17:51:44', '::1', ''),
(51, 2, 'In', '2016-06-10 17:56:01', '::1', ''),
(52, 2, 'Out', '2016-06-10 17:56:14', '::1', '');

-- --------------------------------------------------------

--
-- Table structure for table `employee_log_failures`
--

CREATE TABLE `employee_log_failures` (
  `EM_LOG_F_ID` int(11) NOT NULL,
  `IP_ADDR` varchar(50) NOT NULL,
  `PASSCODE` varchar(50) NOT NULL,
  `DATE_TIME` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee_log_failures`
--

INSERT INTO `employee_log_failures` (`EM_LOG_F_ID`, `IP_ADDR`, `PASSCODE`, `DATE_TIME`) VALUES
(41, '::1', '11', '2016-06-10 12:37:36'),
(42, '::1', '12', '2016-06-10 12:37:46'),
(43, '::1', '13', '2016-06-10 12:37:54'),
(44, '::1', '14', '2016-06-10 12:38:05'),
(45, '::1', '15', '2016-06-10 12:38:13'),
(46, '::1', '16', '2016-06-10 12:39:08'),
(47, '::1', '17', '2016-06-10 12:39:11'),
(48, '::1', '18', '2016-06-10 12:39:13'),
(49, '::1', '19', '2016-06-10 12:39:15'),
(50, '::1', '20', '2016-06-10 12:39:17'),
(51, '::1', '21', '2016-06-10 12:39:20'),
(52, '::1', '22', '2016-06-10 12:39:22'),
(53, '::1', '23', '2016-06-10 12:39:25'),
(54, '::1', '78', '2016-06-10 12:40:42'),
(55, '::1', '12', '2016-06-10 12:43:26'),
(56, '::1', '25', '2016-06-10 12:44:54'),
(57, '::1', '12', '2016-06-10 12:45:09'),
(58, '::1', '', '2016-06-10 12:45:12'),
(59, '::1', '62', '2016-06-10 12:45:16'),
(60, '::1', '32', '2016-06-10 12:45:18'),
(61, '::1', '21', '2016-06-10 12:45:34'),
(62, '::1', '65', '2016-06-10 12:45:37'),
(63, '::1', '98', '2016-06-10 12:45:38'),
(64, '::1', '80', '2016-06-10 12:45:41'),
(65, '::1', '45', '2016-06-10 12:45:43'),
(66, '::1', '39', '2016-06-10 12:45:47'),
(67, '::1', '78', '2016-06-10 12:45:50'),
(68, '::1', '08', '2016-06-10 12:45:52'),
(69, '::1', '5880', '2016-06-10 12:45:54'),
(70, '::1', '21', '2016-06-10 12:46:14'),
(71, '::1', '25', '2016-06-10 12:47:42'),
(72, '::1', '12', '2016-06-10 12:49:26'),
(73, '::1', '12', '2016-06-10 12:50:04'),
(74, '::1', '45', '2016-06-10 13:18:29'),
(75, '::1', '632', '2016-06-10 13:19:12'),
(76, '::1', '65', '2016-06-10 13:24:54'),
(77, '::1', '21', '2016-06-10 13:35:05'),
(78, '::1', '985', '2016-06-10 13:35:08'),
(79, '::1', '123456', '2016-06-10 14:11:06'),
(80, '::1', '5623', '2016-06-10 17:51:17'),
(81, '::1', '3254', '2016-06-10 17:51:26');

-- --------------------------------------------------------

--
-- Table structure for table `employee_log_ios`
--

CREATE TABLE `employee_log_ios` (
  `EMP_LOGS_ID` int(11) NOT NULL,
  `EMP_ID` int(11) NOT NULL,
  `EVENT_TYPE` varchar(3) NOT NULL,
  `DATE_TIME` datetime NOT NULL,
  `IP_ADDR` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee_log_ios`
--

INSERT INTO `employee_log_ios` (`EMP_LOGS_ID`, `EMP_ID`, `EVENT_TYPE`, `DATE_TIME`, `IP_ADDR`) VALUES
(1, 1, 'In', '2016-06-01 07:00:00', ''),
(2, 1, 'Out', '2016-06-01 07:15:00', ''),
(3, 1, 'In', '2016-06-01 09:17:00', ''),
(4, 1, 'Out', '2016-06-01 09:49:00', ''),
(5, 2, 'In', '2016-06-01 08:30:00', ''),
(6, 2, 'Out', '2016-06-01 08:31:00', ''),
(7, 2, 'In', '2016-06-01 14:23:15', ''),
(8, 2, 'Out', '2016-06-01 14:31:45', ''),
(9, 2, 'In', '2016-06-09 19:32:55', ''),
(10, 1, 'In', '2016-06-09 19:33:54', ''),
(11, 2, 'In', '2016-06-09 19:42:32', ''),
(12, 2, 'Out', '2016-06-09 19:42:39', ''),
(13, 2, 'In', '2016-06-09 19:42:52', ''),
(14, 2, 'Out', '2016-06-09 19:45:54', ''),
(15, 1, 'In', '2016-06-09 19:45:59', ''),
(16, 1, 'Out', '2016-06-09 19:46:10', ''),
(17, 1, 'In', '2016-06-09 19:46:14', ''),
(18, 1, 'Out', '2016-06-09 19:46:21', ''),
(19, 2, 'In', '2016-06-09 19:46:25', ''),
(20, 2, 'Out', '2016-06-09 19:46:31', ''),
(21, 2, 'In', '2016-06-09 20:06:34', ''),
(22, 2, 'Out', '2016-06-09 20:07:40', ''),
(23, 2, 'In', '2016-06-09 20:07:44', ''),
(24, 1, 'In', '2016-06-09 20:08:19', ''),
(25, 1, 'Out', '2016-06-09 20:10:15', ''),
(26, 2, 'Out', '2016-06-09 20:12:29', ''),
(27, 2, 'In', '2016-06-09 20:20:47', ''),
(28, 2, 'Out', '2016-06-09 20:25:47', '::1'),
(29, 2, 'In', '2016-06-09 20:25:51', '::1'),
(30, 2, 'Out', '2016-06-09 20:27:45', '::1'),
(31, 2, 'In', '2016-06-09 20:27:59', '::1'),
(32, 2, 'Out', '2016-06-09 20:33:46', '::1'),
(33, 1, 'In', '2016-06-09 20:33:56', '::1'),
(34, 1, 'In', '2016-06-09 20:34:56', '::1'),
(35, 1, 'Out', '2016-06-09 20:35:46', '::1'),
(36, 1, 'In', '2016-06-09 20:35:50', '::1'),
(37, 2, 'Out', '2016-06-09 20:37:07', '10.1.31.65'),
(38, 1, 'In', '2016-06-09 20:37:23', '10.1.31.65'),
(39, 1, 'Out', '2016-06-09 20:38:19', '::1'),
(40, 1, 'In', '2016-06-09 20:38:25', '::1'),
(41, 1, 'Out', '2016-06-09 20:38:40', '10.1.31.65'),
(42, 1, 'Out', '2016-06-09 20:42:07', '::1'),
(43, 1, 'In', '2016-06-09 20:42:10', '::1'),
(44, 1, 'Out', '2016-06-09 20:42:12', '::1'),
(45, 1, 'In', '2016-06-09 20:42:15', '::1'),
(46, 1, 'Out', '2016-06-09 20:42:56', '::1'),
(47, 2, 'In', '2016-06-09 20:43:16', '::1'),
(48, 2, 'Out', '2016-06-09 21:15:35', '::1'),
(49, 2, 'In', '2016-06-09 21:15:39', '::1'),
(50, 2, 'In', '2016-06-09 21:16:12', '::1'),
(51, 2, 'Out', '2016-06-09 21:16:50', '::1'),
(52, 2, 'In', '2016-06-09 21:17:21', '::1'),
(53, 2, 'Out', '2016-06-09 21:18:13', '::1'),
(54, 2, 'In', '2016-06-09 21:18:15', '::1'),
(55, 2, 'Out', '2016-06-09 21:18:54', '::1'),
(56, 2, 'In', '2016-06-09 21:18:57', '::1'),
(57, 1, 'In', '2016-06-09 21:21:24', '10.1.31.65'),
(58, 2, 'Out', '2016-06-09 21:23:53', '::1'),
(59, 2, 'In', '2016-06-09 21:23:57', '::1'),
(60, 1, 'Out', '2016-06-09 21:35:52', '10.1.31.65'),
(61, 2, 'In', '2016-06-10 10:03:20', '::1'),
(62, 2, 'In', '2016-06-10 10:34:25', '::1'),
(63, 2, 'Out', '2016-06-10 10:34:34', '::1'),
(64, 1, 'In', '2016-06-10 10:37:07', '::1'),
(65, 2, 'In', '2016-06-10 11:33:40', '::1'),
(66, 2, 'Out', '2016-06-10 11:44:03', '::1'),
(67, 2, 'In', '2016-06-10 11:44:07', '::1'),
(68, 2, 'In', '2016-06-10 12:00:07', '::1'),
(69, 2, 'Out', '2016-06-10 12:29:45', '::1'),
(70, 2, 'In', '2016-06-10 12:40:45', '::1'),
(71, 2, 'Out', '2016-06-10 12:43:26', '::1'),
(72, 2, 'In', '2016-06-10 12:50:20', '::1'),
(73, 2, 'Out', '2016-06-10 13:18:08', '::1'),
(74, 2, 'In', '2016-06-10 13:19:19', '::1'),
(75, 2, 'Out', '2016-06-10 13:21:19', '::1'),
(76, 2, 'In', '2016-06-10 13:21:29', '::1'),
(77, 2, 'Out', '2016-06-10 13:21:33', '::1'),
(78, 2, 'In', '2016-06-10 13:21:52', '::1'),
(79, 2, 'Out', '2016-06-10 13:22:24', '::1'),
(80, 1, 'In', '2016-06-10 13:22:44', '::1'),
(81, 1, 'Out', '2016-06-10 13:22:47', '::1'),
(82, 2, 'In', '2016-06-10 13:22:56', '::1'),
(83, 2, 'Out', '2016-06-10 13:24:51', '::1'),
(84, 2, 'In', '2016-06-10 13:25:05', '::1'),
(85, 2, 'Out', '2016-06-10 13:26:14', '::1'),
(86, 1, 'In', '2016-06-10 13:33:48', '::1'),
(87, 1, 'Out', '2016-06-10 13:35:05', '::1'),
(88, 2, 'In', '2016-06-10 13:35:16', '::1'),
(89, 2, 'Out', '2016-06-10 13:36:39', '::1'),
(90, 2, 'In', '2016-06-10 13:37:11', '::1'),
(91, 2, 'In', '2016-06-10 13:39:44', '::1'),
(92, 1, 'In', '2016-06-10 13:39:49', '::1'),
(93, 1, 'Out', '2016-06-10 14:11:01', '::1'),
(94, 2, 'In', '2016-06-10 14:11:09', '::1'),
(95, 2, 'Out', '2016-06-10 17:48:23', '::1'),
(96, 2, 'In', '2016-06-10 17:48:30', '::1'),
(97, 2, 'Out', '2016-06-10 17:50:23', '::1'),
(98, 1, 'In', '2016-06-10 17:50:30', '::1'),
(99, 1, 'Out', '2016-06-10 17:51:12', '::1'),
(100, 2, 'In', '2016-06-10 17:51:36', '::1');

-- --------------------------------------------------------

--
-- Table structure for table `positions`
--

CREATE TABLE `positions` (
  `POS_ID` int(11) NOT NULL,
  `POS_NAME` varchar(50) NOT NULL,
  `POS_DESCR` text NOT NULL,
  `POS_NOTES` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `positions`
--

INSERT INTO `positions` (`POS_ID`, `POS_NAME`, `POS_DESCR`, `POS_NOTES`) VALUES
(1, 'Director/Directress', '', ''),
(2, 'Manager', '', ''),
(3, 'Educator/Educatress', '', ''),
(4, 'Assistance Educator/Educatress', '', ''),
(5, 'General Assisstance', '', ''),
(6, 'Casual Worker', '', ''),
(7, 'System Admin', '', ''),
(8, 'Super User', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

CREATE TABLE `student_activity_educator` (
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
  ADD PRIMARY KEY (`ACT_ID`),
  ADD KEY `ACT_TYPE_ID` (`ACT_TYPE_ID`),
  ADD KEY `ACT_SUBTYPE_ID` (`ACT_SUBTYPE_ID`),
  ADD KEY `ACT_ID` (`ACT_ID`);

--
-- Indexes for table `activity_subtypes`
--
ALTER TABLE `activity_subtypes`
  ADD PRIMARY KEY (`ACT_SUBTYPE_ID`),
  ADD KEY `ACT_SUBTYPE_ID` (`ACT_SUBTYPE_ID`);

--
-- Indexes for table `activity_types`
--
ALTER TABLE `activity_types`
  ADD PRIMARY KEY (`ACT_TYPE_ID`),
  ADD KEY `ACT_TYPE_ID` (`ACT_TYPE_ID`);

--
-- Indexes for table `db_query_logs`
--
ALTER TABLE `db_query_logs`
  ADD PRIMARY KEY (`DB_QL_ID`);

--
-- Indexes for table `educations`
--
ALTER TABLE `educations`
  ADD PRIMARY KEY (`EDU_ID`),
  ADD KEY `EDU_ID` (`EDU_ID`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`EMP_ID`),
  ADD KEY `EMP_EDU_ID` (`EMP_EDU_ID`),
  ADD KEY `EMP_POST_ID1` (`EMP_POST_ID1`),
  ADD KEY `EMP_POST_ID2` (`EMP_POST_ID2`),
  ADD KEY `EMP_ID` (`EMP_ID`),
  ADD KEY `EMP_ID_2` (`EMP_ID`),
  ADD KEY `EMP_BOSS_ID` (`EMP_BOSS_ID`),
  ADD KEY `EMP_ID_3` (`EMP_ID`),
  ADD KEY `EMP_ID_4` (`EMP_ID`),
  ADD KEY `EMP_ID_5` (`EMP_ID`),
  ADD KEY `EMP_ID_6` (`EMP_ID`);

--
-- Indexes for table `employee_attendances`
--
ALTER TABLE `employee_attendances`
  ADD PRIMARY KEY (`EMP_ATT_ID`);

--
-- Indexes for table `employee_log_failures`
--
ALTER TABLE `employee_log_failures`
  ADD PRIMARY KEY (`EM_LOG_F_ID`);

--
-- Indexes for table `employee_log_ios`
--
ALTER TABLE `employee_log_ios`
  ADD PRIMARY KEY (`EMP_LOGS_ID`),
  ADD KEY `EMP_ID` (`EMP_ID`);

--
-- Indexes for table `positions`
--
ALTER TABLE `positions`
  ADD PRIMARY KEY (`POS_ID`),
  ADD KEY `POS_ID` (`POS_ID`),
  ADD KEY `POS_ID_2` (`POS_ID`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`STU_ID`),
  ADD KEY `STU_ID` (`STU_ID`),
  ADD KEY `STU_ID_2` (`STU_ID`);

--
-- Indexes for table `student_activity_educator`
--
ALTER TABLE `student_activity_educator`
  ADD PRIMARY KEY (`STU_ACT_EDR_ID`),
  ADD KEY `STU_ID` (`STU_ID`),
  ADD KEY `EDR_ID` (`EDR_ID`),
  ADD KEY `ACT_ID` (`ACT_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activities`
--
ALTER TABLE `activities`
  MODIFY `ACT_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `activity_types`
--
ALTER TABLE `activity_types`
  MODIFY `ACT_TYPE_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `db_query_logs`
--
ALTER TABLE `db_query_logs`
  MODIFY `DB_QL_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=169;
--
-- AUTO_INCREMENT for table `educations`
--
ALTER TABLE `educations`
  MODIFY `EDU_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `EMP_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `employee_attendances`
--
ALTER TABLE `employee_attendances`
  MODIFY `EMP_ATT_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;
--
-- AUTO_INCREMENT for table `employee_log_failures`
--
ALTER TABLE `employee_log_failures`
  MODIFY `EM_LOG_F_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;
--
-- AUTO_INCREMENT for table `employee_log_ios`
--
ALTER TABLE `employee_log_ios`
  MODIFY `EMP_LOGS_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;
--
-- AUTO_INCREMENT for table `positions`
--
ALTER TABLE `positions`
  MODIFY `POS_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `STU_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
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
-- Constraints for table `employee_log_ios`
--
ALTER TABLE `employee_log_ios`
  ADD CONSTRAINT `employee_log_ios_ibfk_1` FOREIGN KEY (`EMP_ID`) REFERENCES `employees` (`EMP_ID`);

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
