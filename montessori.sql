-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 15, 2016 at 06:45 AM
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
  `QUERY_STR` varchar(2000) NOT NULL,
  `USER_NAME` varchar(50) NOT NULL,
  `DATE_TIME` datetime NOT NULL,
  `IP_ADDR` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `db_query_logs`
--

INSERT INTO `db_query_logs` (`DB_QL_ID`, `QUERY_STR`, `USER_NAME`, `DATE_TIME`, `IP_ADDR`) VALUES
(1, 'SELECT  * FROM DB_QUERY_LOGS ORDER BY DATE_TIME DESC;', 'Cathy Kim', '2016-06-15 00:43:05', '192.168.1.68'),
(2, 'SELECT WEB_PAGES.PAGE_ID, WEB_PAGES.TAG_CLASS, WEB_PAGES.TYPE, WEB_PAGES.HREF, WEB_PAGES.ICON_URL, WEB_PAGES.TITLE, WEB_PAGES.STATUS FROM WEB_PAGES WHERE (WEB_PAGES.STATUS="active");', 'Cathy Kim', '2016-06-15 00:43:11', '192.168.1.68'),
(3, 'SELECT  STUDENTS.STU_ID, CONCAT(STUDENTS.STU_FIRST_NAME, " ", STUDENTS.STU_LAST_NAME) AS STU_NAME, STUDENTS.STU_BIRTHDATE, FLOOR(DATEDIFF(NOW(), STUDENTS.STU_BIRTHDATE)/365.25) AS STU_AGE, STUDENTS.STU_PHOTO FROM STUDENTS WHERE  STUDENTS.STU_ID NOT IN (SELECT STUDENT_ATTENDANCES.STU_ID FROM STUDENT_ATTENDANCES WHERE \r\n										STUDENT_ATTENDANCES.DATE_TIME >= CURDATE() AND \r\n										STUDENT_ATTENDANCES.DATE_TIME < (CURDATE() + INTERVAL 1 DAY) AND\r\n										STUDENT_ATTENDANCES.EVENT_TYPE = "In");', 'Cathy Kim', '2016-06-15 00:43:14', '192.168.1.68'),
(4, 'SELECT STUDENTS.STU_ID, CONCAT(STUDENTS.STU_FIRST_NAME, " ", STUDENTS.STU_LAST_NAME) AS STU_NAME, STUDENTS.STU_BIRTHDATE, FLOOR(DATEDIFF(NOW(), STUDENTS.STU_BIRTHDATE)/365.25) AS STU_AGE, STUDENTS.STU_PHOTO FROM STUDENTS WHERE (STUDENTS.STU_ID IN (SELECT STUDENT_ATTENDANCES.STU_ID FROM STUDENT_ATTENDANCES WHERE STUDENT_ATTENDANCES.DATE_TIME >= CURDATE() AND STUDENT_ATTENDANCES.DATE_TIME < (CURDATE() + INTERVAL 1 DAY) AND STUDENT_ATTENDANCES.EVENT_TYPE = "In")) AND (STUDENTS.STU_ID NOT IN (SELECT STUDENT_ATTENDANCES.STU_ID FROM STUDENT_ATTENDANCES WHERE STUDENT_ATTENDANCES.DATE_TIME >= CURDATE() AND STUDENT_ATTENDANCES.DATE_TIME < (CURDATE() + INTERVAL 1 DAY) AND STUDENT_ATTENDANCES.EVENT_TYPE = "Out"));', 'Cathy Kim', '2016-06-15 00:43:14', '192.168.1.68'),
(5, 'SELECT WEB_PAGES.PAGE_ID, WEB_PAGES.TAG_CLASS, WEB_PAGES.TYPE, WEB_PAGES.HREF, WEB_PAGES.ICON_URL, WEB_PAGES.TITLE, WEB_PAGES.STATUS FROM WEB_PAGES WHERE (WEB_PAGES.STATUS="active");', 'Cathy Kim', '2016-06-15 00:43:18', '192.168.1.68'),
(6, 'SELECT  * FROM DB_QUERY_LOGS ORDER BY DATE_TIME DESC;', 'Cathy Kim', '2016-06-15 00:43:21', '192.168.1.68'),
(7, 'SELECT WEB_PAGES.PAGE_ID, WEB_PAGES.TAG_CLASS, WEB_PAGES.TYPE, WEB_PAGES.HREF, WEB_PAGES.ICON_URL, WEB_PAGES.TITLE, WEB_PAGES.STATUS FROM WEB_PAGES WHERE (WEB_PAGES.STATUS="active");', 'Cathy Kim', '2016-06-15 00:43:25', '192.168.1.68'),
(8, 'SELECT  * FROM ACTIVITY_TYPES ORDER BY ACT_TYPE_ID ASC;', 'Cathy Kim', '2016-06-15 00:43:27', '192.168.1.68'),
(9, 'SELECT WEB_PAGES.PAGE_ID, WEB_PAGES.TAG_CLASS, WEB_PAGES.TYPE, WEB_PAGES.HREF, WEB_PAGES.ICON_URL, WEB_PAGES.TITLE, WEB_PAGES.STATUS FROM WEB_PAGES WHERE (WEB_PAGES.STATUS="active");', 'Cathy Kim', '2016-06-15 00:43:28', '192.168.1.68'),
(10, 'SELECT  * FROM EDUCATIONS ORDER BY EDU_ID ASC;', 'Cathy Kim', '2016-06-15 00:43:34', '192.168.1.68'),
(11, 'SELECT WEB_PAGES.PAGE_ID, WEB_PAGES.TAG_CLASS, WEB_PAGES.TYPE, WEB_PAGES.HREF, WEB_PAGES.ICON_URL, WEB_PAGES.TITLE, WEB_PAGES.STATUS FROM WEB_PAGES WHERE (WEB_PAGES.STATUS="active");', 'Cathy Kim', '2016-06-15 00:43:36', '192.168.1.68'),
(12, 'SELECT  * FROM POSITIONS ORDER BY POS_ID ASC;', 'Cathy Kim', '2016-06-15 00:43:37', '192.168.1.68'),
(13, 'SELECT WEB_PAGES.PAGE_ID, WEB_PAGES.TAG_CLASS, WEB_PAGES.TYPE, WEB_PAGES.HREF, WEB_PAGES.ICON_URL, WEB_PAGES.TITLE, WEB_PAGES.STATUS FROM WEB_PAGES WHERE (WEB_PAGES.STATUS="active");', 'Cathy Kim', '2016-06-15 00:43:39', '192.168.1.68'),
(14, 'SELECT  EMP_ID, EMP_FIRST_NAME, EMP_LAST_NAME, EMP_BIRTHDATE, EMP_PHONE1 FROM EMPLOYEES  WHERE EMP_PASSCODE="652";', 'Cathy Kim', '2016-06-15 00:43:45', '192.168.1.68'),
(15, 'INSERT INTO EMPLOYEE_LOG_FAILURES(IP_ADDR, PASSCODE, DATE_TIME) VALUES("192.168.1.68", "652", NOW());', 'Cathy Kim', '2016-06-15 00:43:45', '192.168.1.68'),
(16, 'INSERT INTO EMPLOYEE_LOG_IOS(EMP_ID, EVENT_TYPE, DATE_TIME, IP_ADDR) VALUES(3, "Out", NOW(), "192.168.1.68");', 'Cathy Kim', '2016-06-15 00:43:45', '192.168.1.68'),
(17, 'SELECT  EMP_ID, EMP_FIRST_NAME, EMP_LAST_NAME, EMP_BIRTHDATE, EMP_PHONE1 FROM EMPLOYEES  WHERE EMP_PASSCODE="563";', 'system', '2016-06-15 00:43:49', '192.168.1.68'),
(18, 'INSERT INTO EMPLOYEE_LOG_FAILURES(IP_ADDR, PASSCODE, DATE_TIME) VALUES("192.168.1.68", "563", NOW());', 'system', '2016-06-15 00:43:49', '192.168.1.68'),
(19, 'SELECT  EMP_ID, EMP_FIRST_NAME, EMP_LAST_NAME, EMP_BIRTHDATE, EMP_PHONE1 FROM EMPLOYEES  WHERE EMP_PASSCODE="5698";', 'system', '2016-06-15 00:43:52', '192.168.1.68'),
(20, 'INSERT INTO EMPLOYEE_LOG_FAILURES(IP_ADDR, PASSCODE, DATE_TIME) VALUES("192.168.1.68", "5698", NOW());', 'system', '2016-06-15 00:43:52', '192.168.1.68'),
(21, 'SELECT  EMP_ID, EMP_FIRST_NAME, EMP_LAST_NAME, EMP_BIRTHDATE, EMP_PHONE1 FROM EMPLOYEES  WHERE EMP_PASSCODE="5699";', 'system', '2016-06-15 00:43:55', '192.168.1.68'),
(22, 'INSERT INTO EMPLOYEE_LOG_FAILURES(IP_ADDR, PASSCODE, DATE_TIME) VALUES("192.168.1.68", "5699", NOW());', 'system', '2016-06-15 00:43:55', '192.168.1.68'),
(23, 'SELECT  EMP_ID, EMP_FIRST_NAME, EMP_LAST_NAME, EMP_BIRTHDATE, EMP_PHONE1 FROM EMPLOYEES  WHERE EMP_PASSCODE="1887";', 'system', '2016-06-15 00:44:02', '192.168.1.68'),
(24, 'INSERT INTO EMPLOYEE_LOG_IOS(EMP_ID, EVENT_TYPE, DATE_TIME, IP_ADDR) VALUES(1, "In", NOW(), "192.168.1.68");', 'Raphaelle Philippe', '2016-06-15 00:44:02', '192.168.1.68'),
(25, 'SELECT WEB_PAGES.PAGE_ID, WEB_PAGES.TAG_CLASS, WEB_PAGES.TYPE, WEB_PAGES.HREF, WEB_PAGES.ICON_URL, WEB_PAGES.TITLE, WEB_PAGES.STATUS FROM WEB_PAGES WHERE (WEB_PAGES.STATUS="active");', 'Raphaelle Philippe', '2016-06-15 00:44:02', '192.168.1.68');

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
-- Table structure for table `educator_student`
--

CREATE TABLE `educator_student` (
  `EDU_STU_ID` int(11) NOT NULL,
  `EMP_ID` int(11) NOT NULL,
  `STU_ID` int(11) NOT NULL,
  `RESPONSITIVTY` varchar(10) NOT NULL,
  `START_DATE` date NOT NULL,
  `END_DATE` date NOT NULL,
  `NOTES` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `educator_student`
--

INSERT INTO `educator_student` (`EDU_STU_ID`, `EMP_ID`, `STU_ID`, `RESPONSITIVTY`, `START_DATE`, `END_DATE`, `NOTES`) VALUES
(1, 1, 1, 'Teach', '2016-06-13', '0000-00-00', ''),
(2, 1, 3, 'Teach', '2016-06-11', '0000-00-00', ''),
(3, 1, 5, 'Teach', '2016-05-02', '0000-00-00', ''),
(4, 1, 7, 'Teach', '2016-04-01', '0000-00-00', ''),
(5, 1, 9, 'Teach', '2016-04-09', '0000-00-00', ''),
(6, 1, 10, 'Teach', '2016-02-05', '0000-00-00', ''),
(7, 1, 12, 'Teach', '2016-05-20', '0000-00-00', ''),
(8, 1, 14, 'Teach', '2016-07-06', '0000-00-00', ''),
(9, 1, 16, 'Teach', '2016-04-03', '0000-00-00', ''),
(10, 1, 18, 'Teach', '2016-07-30', '0000-00-00', ''),
(11, 1, 20, 'Teach', '2015-04-19', '0000-00-00', ''),
(12, 2, 2, 'Teach', '2014-05-19', '0000-00-00', ''),
(13, 2, 4, 'Teach', '2014-05-31', '0000-00-00', ''),
(14, 2, 6, 'Teach', '2015-05-06', '0000-00-00', ''),
(15, 2, 8, 'Teach', '2015-05-30', '0000-00-00', ''),
(16, 2, 11, 'Teach', '2015-07-24', '0000-00-00', ''),
(17, 2, 13, 'Teach', '2016-09-25', '0000-00-00', ''),
(18, 2, 15, 'Teach', '2013-09-04', '0000-00-00', ''),
(19, 2, 17, 'Teach', '2015-12-31', '0000-00-00', ''),
(20, 2, 19, 'Teach', '2014-07-06', '0000-00-00', '');

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
  `EMP_PHOTO` varchar(50) NOT NULL,
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

INSERT INTO `employees` (`EMP_ID`, `EMP_FIRST_NAME`, `EMP_LAST_NAME`, `EMP_BIRTHDATE`, `EMP_SEX`, `EMP_PHOTO`, `EMP_ADDRESS`, `EMP_CITY`, `EMP_PROVINCE`, `EMP_POSTAL_CODE`, `EMP_COUNTRY`, `EMP_PHONE1`, `EMP_PHONE2`, `EMP_EMAIL`, `EMP_HIRE_DATE`, `EMP_END_DATE`, `EMP_EDU_ID`, `EDU_DAYCARE_EXPERIENCE`, `EDU_MONTESSORI_EXPERIENCE`, `EMP_POST_ID1`, `EMP_POST_ID2`, `EMP_BOSS_ID`, `EMP_HOURLY_RATE`, `EMP_PASSCODE`, `EMP_NOTES`) VALUES
(1, 'Raphaelle', 'Philippe', '1973-06-08', 'F', 'images/employee_photos/1.png', '1887 Ch. du Tremblay #100', 'Longueuil', 'QC', 'J4N 1A4', 'Canada', ' 450-332-7255', NULL, 'raphaelle.philippe@gmail.com', '2009-06-19', '0000-00-00', 6, 7, 7, 1, 3, NULL, 35.75, '1887', 'The owner of the school'),
(2, 'Linda', 'Tweed', '1982-10-10', 'F', 'images/employee_photos/2.png', '3412 Rue Simon', 'Montreal', 'QC', 'H1K 2S6 ', 'Canada', '514-649-6731', NULL, 'linda.tweed@yahoo.com', '2013-07-04', '0000-00-00', 4, 5, 5, 4, NULL, 1, 15.5, '8772', NULL),
(3, 'Cathy', 'Kim', '1988-12-11', 'F', 'images/employee_photos/3.png', '4528 University Street', 'Montreal', 'QC', 'H3A 0E9', 'Canada', '514-464-2673', NULL, 'cathy.kim@gmail.com', '2015-09-12', '0000-00-00', 3, 2, 1, 4, NULL, 1, 14.5, '4072', NULL);

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
(91, 2, 'In', '2016-06-14 23:33:15', '192.168.1.68', ''),
(92, 2, 'In', '2016-06-15 00:05:05', '192.168.1.68', ''),
(93, 3, 'In', '2016-06-15 00:09:38', '192.168.1.68', ''),
(94, 3, 'Out', '2016-06-15 00:10:18', '192.168.1.68', ''),
(95, 2, 'In', '2016-06-15 00:12:03', '192.168.1.68', ''),
(96, 1, 'In', '2016-06-15 00:12:23', '192.168.1.68', ''),
(97, 2, 'Out', '2016-06-15 00:21:11', '192.168.1.68', ''),
(98, 2, 'In', '2016-06-15 00:21:54', '192.168.1.68', ''),
(99, 2, 'In', '2016-06-15 00:38:22', '192.168.1.68', '');

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
(81, '::1', '3254', '2016-06-10 17:51:26'),
(82, '192.168.1.68', '569', '2016-06-10 22:22:25'),
(83, '192.168.1.68', '6598', '2016-06-10 22:40:29'),
(84, '192.168.1.68', '25896554', '2016-06-10 22:45:03'),
(85, '192.168.1.68', '562566', '2016-06-10 22:45:07'),
(86, '192.168.1.68', '5365125', '2016-06-10 22:48:30'),
(87, '192.168.1.68', '1872', '2016-06-10 22:49:27'),
(88, '::1', '78', '2016-06-13 10:55:31'),
(89, '::1', '', '2016-06-13 10:55:31'),
(90, '192.168.0.42', '6', '2016-06-13 11:19:40'),
(91, '192.168.0.42', '65', '2016-06-13 11:19:43'),
(92, 'localhost/unknown', '655', '2016-06-13 11:30:15'),
(93, 'localhost/unknown', '96589', '2016-06-13 11:30:17'),
(94, '10.1.31.59', '566546', '2016-06-13 13:08:55'),
(95, '10.1.31.59', '652365', '2016-06-13 13:08:57'),
(96, '10.1.31.59', '8569', '2016-06-13 13:54:15'),
(97, '10.1.31.59', '4587', '2016-06-13 13:54:18'),
(98, '10.1.31.59', '998566', '2016-06-13 13:58:32'),
(99, '10.1.31.59', '5236', '2016-06-13 14:07:00'),
(100, '10.1.31.59', '854', '2016-06-13 14:07:01'),
(101, '192.168.1.68', '872', '2016-06-14 00:08:02'),
(102, '10.1.31.59', '2365', '2016-06-14 18:35:21'),
(103, '10.1.31.59', '6632', '2016-06-14 18:35:23'),
(104, '10.1.31.59', '6589', '2016-06-14 18:35:25'),
(105, '10.1.31.59', '877', '2016-06-14 18:51:27'),
(106, '192.168.1.68', '365', '2016-06-15 00:41:46'),
(107, '192.168.1.68', '652', '2016-06-15 00:43:45'),
(108, '192.168.1.68', '563', '2016-06-15 00:43:49'),
(109, '192.168.1.68', '5698', '2016-06-15 00:43:52'),
(110, '192.168.1.68', '5699', '2016-06-15 00:43:55');

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
(100, 2, 'In', '2016-06-10 17:51:36', '::1'),
(101, 2, 'Out', '2016-06-10 18:20:16', '::1'),
(102, 2, 'In', '2016-06-10 18:21:48', '::1'),
(103, 2, 'Out', '2016-06-10 18:22:07', '::1'),
(104, 1, 'In', '2016-06-10 18:22:13', '::1'),
(105, 2, 'In', '2016-06-10 21:54:20', '::1'),
(106, 2, 'Out', '2016-06-10 21:55:52', '::1'),
(107, 2, 'In', '2016-06-10 21:55:58', '::1'),
(108, 2, 'Out', '2016-06-10 22:10:39', '::1'),
(109, 1, 'In', '2016-06-10 22:10:49', '::1'),
(110, 1, 'Out', '2016-06-10 22:21:45', '::1'),
(111, 1, 'In', '2016-06-10 22:21:49', '::1'),
(112, 2, 'In', '2016-06-10 22:22:29', '192.168.1.68'),
(113, 2, 'Out', '2016-06-10 22:40:26', '192.168.1.68'),
(114, 1, 'In', '2016-06-10 22:40:34', '192.168.1.68'),
(115, 1, 'Out', '2016-06-10 22:44:53', '192.168.1.68'),
(116, 2, 'In', '2016-06-10 22:45:16', '192.168.1.68'),
(117, 2, 'Out', '2016-06-10 22:47:25', '192.168.1.68'),
(118, 1, 'In', '2016-06-10 22:47:38', '192.168.1.68'),
(119, 1, 'Out', '2016-06-10 22:48:16', '192.168.1.68'),
(120, 2, 'In', '2016-06-10 22:48:38', '192.168.1.68'),
(121, 2, 'Out', '2016-06-10 22:48:56', '192.168.1.68'),
(122, 2, 'In', '2016-06-10 22:49:02', '192.168.1.68'),
(123, 2, 'Out', '2016-06-10 22:49:08', '192.168.1.68'),
(124, 1, 'In', '2016-06-10 22:49:34', '192.168.1.68'),
(125, 2, 'In', '2016-06-10 22:50:43', '192.168.1.68'),
(126, 2, 'Out', '2016-06-10 23:14:23', '192.168.1.68'),
(127, 2, 'In', '2016-06-10 23:14:27', '192.168.1.68'),
(128, 2, 'In', '2016-06-10 23:15:46', '192.168.1.69'),
(129, 2, 'Out', '2016-06-10 23:18:19', '192.168.1.69'),
(130, 1, 'In', '2016-06-10 23:18:49', '192.168.1.69'),
(131, 1, 'Out', '2016-06-10 23:19:22', '192.168.1.69'),
(132, 1, 'In', '2016-06-10 23:19:44', '192.168.1.69'),
(133, 1, 'Out', '2016-06-10 23:22:04', '192.168.1.69'),
(134, 2, 'In', '2016-06-10 23:22:39', '192.168.1.69'),
(135, 2, 'Out', '2016-06-13 09:26:39', '::1'),
(136, 1, 'In', '2016-06-13 09:26:45', '::1'),
(137, 1, 'Out', '2016-06-13 10:29:40', '::1'),
(138, 2, 'In', '2016-06-13 10:29:46', '::1'),
(139, 1, 'In', '2016-06-13 10:55:35', '::1'),
(140, 2, 'In', '2016-06-13 10:57:41', '::1'),
(141, 2, 'In', '2016-06-13 10:58:36', '192.168.0.42'),
(142, 2, 'Out', '2016-06-13 11:03:09', '192.168.0.42'),
(143, 2, 'In', '2016-06-13 11:03:13', '192.168.0.42'),
(144, 2, 'Out', '2016-06-13 11:03:35', '192.168.0.42'),
(145, 2, 'In', '2016-06-13 11:03:44', '192.168.0.42'),
(146, 2, 'Out', '2016-06-13 11:06:11', '192.168.0.42'),
(147, 2, 'In', '2016-06-13 11:06:15', '192.168.0.42'),
(148, 2, 'Out', '2016-06-13 11:07:48', '192.168.0.42'),
(149, 2, 'In', '2016-06-13 11:09:18', '192.168.0.42'),
(150, 2, 'Out', '2016-06-13 11:11:44', '192.168.0.42'),
(151, 1, 'In', '2016-06-13 11:12:54', '192.168.0.42'),
(152, 2, 'In', '2016-06-13 11:13:54', '192.168.0.42'),
(153, 2, 'Out', '2016-06-13 11:19:37', '192.168.0.42'),
(154, 2, 'In', '2016-06-13 11:19:46', '192.168.0.42'),
(155, 2, 'Out', '2016-06-13 11:25:23', 'localhost/unknown'),
(156, 2, 'In', '2016-06-13 11:25:28', 'localhost/unknown'),
(157, 1, 'In', '2016-06-13 11:26:52', 'localhost/unknown'),
(158, 1, 'Out', '2016-06-13 11:28:00', 'localhost/unknown'),
(159, 2, 'In', '2016-06-13 11:28:05', 'localhost/unknown'),
(160, 2, 'Out', '2016-06-13 11:29:15', 'localhost/unknown'),
(161, 1, 'In', '2016-06-13 11:29:20', 'localhost/unknown'),
(162, 1, 'Out', '2016-06-13 11:29:53', 'localhost/unknown'),
(163, 2, 'In', '2016-06-13 11:29:57', 'localhost/unknown'),
(164, 2, 'Out', '2016-06-13 11:30:13', 'localhost/unknown'),
(165, 2, 'In', '2016-06-13 11:30:20', 'localhost/unknown'),
(166, 2, 'Out', '2016-06-13 11:30:51', '192.168.0.42'),
(167, 2, 'In', '2016-06-13 11:30:55', '192.168.0.42'),
(168, 2, 'In', '2016-06-13 12:48:56', '10.1.31.59'),
(169, 2, 'Out', '2016-06-13 12:49:00', '10.1.31.59'),
(170, 1, 'In', '2016-06-13 12:49:20', '10.1.31.59'),
(171, 1, 'Out', '2016-06-13 13:04:48', '10.1.31.59'),
(172, 2, 'In', '2016-06-13 13:07:37', '10.1.31.59'),
(173, 2, 'Out', '2016-06-13 13:07:40', '10.1.31.59'),
(174, 2, 'In', '2016-06-13 13:07:48', '10.1.31.59'),
(175, 2, 'Out', '2016-06-13 13:08:51', '10.1.31.59'),
(176, 2, 'In', '2016-06-13 13:09:03', '10.1.31.59'),
(177, 2, 'In', '2016-06-13 13:15:59', '10.1.31.65'),
(178, 2, 'Out', '2016-06-13 13:29:21', '10.1.31.59'),
(179, 2, 'In', '2016-06-13 13:29:25', '10.1.31.59'),
(180, 2, 'Out', '2016-06-13 13:29:29', '10.1.31.59'),
(181, 1, 'In', '2016-06-13 13:39:14', '10.1.31.59'),
(182, 1, 'Out', '2016-06-13 13:46:44', '10.1.31.59'),
(183, 2, 'In', '2016-06-13 13:46:50', '10.1.31.59'),
(184, 2, 'Out', '2016-06-13 13:54:00', '10.1.31.59'),
(185, 2, 'In', '2016-06-13 13:54:21', '10.1.31.59'),
(186, 2, 'Out', '2016-06-13 13:56:15', '10.1.31.59'),
(187, 1, 'In', '2016-06-13 13:56:30', '10.1.31.59'),
(188, 1, 'Out', '2016-06-13 13:57:08', '10.1.31.59'),
(189, 1, 'In', '2016-06-13 14:00:01', '10.1.31.59'),
(190, 1, 'Out', '2016-06-13 14:06:21', '10.1.31.59'),
(191, 1, 'In', '2016-06-13 14:06:52', '10.1.31.59'),
(192, 1, 'Out', '2016-06-13 14:06:57', '10.1.31.59'),
(193, 2, 'In', '2016-06-13 14:07:05', '10.1.31.59'),
(194, 2, 'Out', '2016-06-13 14:25:26', '10.1.31.59'),
(195, 2, 'In', '2016-06-13 14:28:31', '10.1.31.59'),
(196, 2, 'Out', '2016-06-13 15:03:07', '10.1.31.59'),
(197, 1, 'In', '2016-06-13 15:06:41', '10.1.31.59'),
(198, 1, 'Out', '2016-06-13 16:09:36', '10.1.31.59'),
(199, 2, 'In', '2016-06-13 16:09:39', '10.1.31.59'),
(200, 2, 'In', '2016-06-13 16:18:41', '10.1.31.59'),
(201, 2, 'Out', '2016-06-13 16:21:17', '10.1.31.59'),
(202, 2, 'In', '2016-06-13 16:21:23', '10.1.31.59'),
(203, 2, 'Out', '2016-06-13 16:31:33', '10.1.31.59'),
(204, 2, 'In', '2016-06-13 16:31:36', '10.1.31.59'),
(205, 2, 'Out', '2016-06-13 17:01:52', '10.1.31.59'),
(206, 1, 'In', '2016-06-13 17:01:56', '10.1.31.59'),
(207, 2, 'In', '2016-06-13 18:03:00', '10.1.31.59'),
(208, 2, 'Out', '2016-06-13 18:11:08', '10.1.31.59'),
(209, 1, 'In', '2016-06-13 18:11:12', '10.1.31.59'),
(210, 2, 'In', '2016-06-13 22:30:20', '192.168.1.68'),
(211, 2, 'Out', '2016-06-13 22:51:58', '192.168.1.68'),
(212, 1, 'In', '2016-06-13 22:52:02', '192.168.1.68'),
(213, 1, 'Out', '2016-06-14 00:07:58', '192.168.1.68'),
(214, 2, 'In', '2016-06-14 00:08:06', '192.168.1.68'),
(215, 2, 'Out', '2016-06-14 09:59:14', '192.168.0.42'),
(216, 1, 'In', '2016-06-14 09:59:17', '192.168.0.42'),
(217, 1, 'Out', '2016-06-14 10:22:10', '192.168.0.42'),
(218, 2, 'In', '2016-06-14 10:22:13', '192.168.0.42'),
(219, 2, 'Out', '2016-06-14 10:22:41', '192.168.0.42'),
(220, 1, 'In', '2016-06-14 10:22:46', '192.168.0.42'),
(221, 1, 'Out', '2016-06-14 10:27:46', '192.168.0.42'),
(222, 2, 'In', '2016-06-14 10:27:49', '192.168.0.42'),
(223, 2, 'Out', '2016-06-14 10:28:20', '192.168.0.42'),
(224, 1, 'In', '2016-06-14 10:28:24', '192.168.0.42'),
(225, 2, 'In', '2016-06-14 13:05:14', '10.1.31.59'),
(226, 2, 'In', '2016-06-14 13:26:37', '10.1.31.59'),
(227, 2, 'Out', '2016-06-14 14:37:15', '10.1.31.59'),
(228, 1, 'In', '2016-06-14 14:37:20', '10.1.31.59'),
(229, 1, 'Out', '2016-06-14 14:37:39', '10.1.31.59'),
(230, 2, 'In', '2016-06-14 14:37:42', '10.1.31.59'),
(231, 2, 'Out', '2016-06-14 16:36:15', '10.1.31.59'),
(232, 1, 'In', '2016-06-14 16:36:19', '10.1.31.59'),
(233, 1, 'Out', '2016-06-14 17:57:32', '10.1.31.59'),
(234, 2, 'In', '2016-06-14 17:57:36', '10.1.31.59'),
(235, 2, 'Out', '2016-06-14 18:31:08', '10.1.31.59'),
(236, 1, 'In', '2016-06-14 18:31:11', '10.1.31.59'),
(237, 1, 'Out', '2016-06-14 18:32:33', '10.1.31.59'),
(238, 2, 'In', '2016-06-14 18:32:35', '10.1.31.59'),
(239, 2, 'Out', '2016-06-14 18:33:13', '10.1.31.59'),
(240, 1, 'In', '2016-06-14 18:33:17', '10.1.31.59'),
(241, 1, 'Out', '2016-06-14 18:35:16', '10.1.31.59'),
(242, 2, 'In', '2016-06-14 18:35:28', '10.1.31.59'),
(243, 2, 'Out', '2016-06-14 18:39:56', '10.1.31.59'),
(244, 2, 'In', '2016-06-14 18:39:59', '10.1.31.59'),
(245, 2, 'In', '2016-06-14 18:42:02', '10.1.31.59'),
(246, 2, 'In', '2016-06-14 18:46:23', '10.1.31.59'),
(247, 2, 'Out', '2016-06-14 18:49:43', '10.1.31.59'),
(248, 2, 'In', '2016-06-14 18:49:47', '10.1.31.59'),
(249, 2, 'In', '2016-06-14 18:51:30', '10.1.31.59'),
(250, 2, 'Out', '2016-06-14 18:57:33', '10.1.31.59'),
(251, 1, 'In', '2016-06-14 18:57:37', '10.1.31.59'),
(252, 1, 'Out', '2016-06-14 19:01:38', '10.1.31.59'),
(253, 2, 'In', '2016-06-14 19:01:42', '10.1.31.59'),
(254, 2, 'Out', '2016-06-14 19:02:36', '10.1.31.59'),
(255, 1, 'Out', '2016-06-14 21:54:33', '192.168.1.68'),
(256, 2, 'In', '2016-06-14 21:54:38', '192.168.1.68'),
(257, 1, 'In', '2016-06-14 21:57:02', '192.168.1.94'),
(258, 2, 'Out', '2016-06-14 21:58:44', '192.168.1.68'),
(259, 2, 'In', '2016-06-14 21:58:59', '192.168.1.68'),
(260, 2, 'Out', '2016-06-14 22:05:09', '192.168.1.68'),
(261, 2, 'In', '2016-06-14 22:08:57', '192.168.1.68'),
(262, 2, 'Out', '2016-06-14 22:17:21', '192.168.1.68'),
(263, 2, 'In', '2016-06-14 22:17:33', '192.168.1.68'),
(264, 2, 'Out', '2016-06-14 22:18:54', '192.168.1.68'),
(265, 2, 'In', '2016-06-14 22:18:58', '192.168.1.68'),
(266, 2, 'Out', '2016-06-15 00:05:46', '192.168.1.68'),
(267, 3, 'In', '2016-06-15 00:06:03', '192.168.1.68'),
(268, 3, 'Out', '2016-06-15 00:11:54', '192.168.1.68'),
(269, 2, 'In', '2016-06-15 00:12:00', '192.168.1.68'),
(270, 2, 'Out', '2016-06-15 00:12:15', '192.168.1.68'),
(271, 1, 'In', '2016-06-15 00:12:21', '192.168.1.68'),
(272, 1, 'Out', '2016-06-15 00:16:23', '192.168.1.68'),
(273, 2, 'In', '2016-06-15 00:16:27', '192.168.1.68'),
(274, 2, 'Out', '2016-06-15 00:31:30', '192.168.1.68'),
(275, 2, 'In', '2016-06-15 00:31:34', '192.168.1.68'),
(276, 2, 'Out', '2016-06-15 00:41:18', '192.168.1.68'),
(277, 3, 'In', '2016-06-15 00:41:24', '192.168.1.68'),
(278, 3, 'Out', '2016-06-15 00:41:44', '192.168.1.68'),
(279, 3, 'In', '2016-06-15 00:41:51', '192.168.1.68'),
(280, 3, 'Out', '2016-06-15 00:43:45', '192.168.1.68'),
(281, 1, 'In', '2016-06-15 00:44:02', '192.168.1.68');

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
  `STU_PHOTO` varchar(50) NOT NULL,
  `STU_START_DATE` date NOT NULL,
  `STU_GRAD_DATE` date NOT NULL,
  `STU_DAILY_FEE` float NOT NULL,
  `STU_CREDENTIAL` varchar(10) NOT NULL,
  `STU_NOTES` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`STU_ID`, `STU_FIRST_NAME`, `STU_LAST_NAME`, `STU_BIRTHDATE`, `STU_SEX`, `STU_PHOTO`, `STU_START_DATE`, `STU_GRAD_DATE`, `STU_DAILY_FEE`, `STU_CREDENTIAL`, `STU_NOTES`) VALUES
(1, 'Aiden', '	Tremblay', '2011-04-07', 'M', 'images/student_photos/1.png', '0000-00-00', '0000-00-00', 0, '', ''),
(2, 'Emma', 'Smith', '2013-06-24', 'F', 'images/student_photos/2.png', '0000-00-00', '0000-00-00', 0, '', ''),
(3, 'Jackson', 'Lam', '2013-09-20', 'M', 'images/student_photos/3.png', '0000-00-00', '0000-00-00', 0, '', ''),
(4, 'Sophia', 'Martin', '2014-01-10', 'F', 'images/student_photos/4.png', '0000-00-00', '0000-00-00', 0, '', ''),
(5, 'Ethan', 'Brown', '2011-11-19', 'M', 'images/student_photos/5.png', '0000-00-00', '0000-00-00', 0, '', ''),
(6, 'Olivia', 'Roy', '2012-09-21', 'F', 'images/student_photos/6.png', '0000-00-00', '0000-00-00', 0, '', ''),
(7, 'Liam', 'Gagnon', '2013-11-21', 'M', 'images/student_photos/7.png', '0000-00-00', '0000-00-00', 0, '', ''),
(8, 'Isabella', 'Li', '2014-12-24', 'F', 'images/student_photos/8.png', '0000-00-00', '0000-00-00', 0, '', ''),
(9, 'Mason', 'Wilson', '2014-03-14', 'M', 'images/student_photos/9.png', '0000-00-00', '0000-00-00', 0, '', ''),
(10, 'Ava', 'Miller', '2011-07-13', 'F', 'images/student_photos/10.png', '0000-00-00', '0000-00-00', 0, '', ''),
(11, 'Daniel', 'Burk', '2013-06-15', 'M', 'images/student_photos/11.png', '0000-00-00', '0000-00-00', 0, '', ''),
(12, 'Rossy', 'Tweed', '2011-07-17', 'F', 'images/student_photos/12.png', '0000-00-00', '0000-00-00', 0, '', ''),
(13, 'Jacky', 'Lee', '2012-07-03', 'M', 'images/student_photos/13.png', '0000-00-00', '0000-00-00', 0, '', ''),
(14, 'Yun', 'Kang', '2015-04-10', 'F', 'images/student_photos/14.png', '0000-00-00', '0000-00-00', 0, '', ''),
(15, 'Vicky', 'Mohamed', '2012-01-09', 'M', 'images/student_photos/15.png', '0000-00-00', '0000-00-00', 0, '', ''),
(16, 'Alfred', 'Kenny', '2015-03-28', 'F', 'images/student_photos/16.png', '0000-00-00', '0000-00-00', 0, '', ''),
(17, 'Vincent', 'Nguyen', '2015-03-01', 'M', 'images/student_photos/17.png', '0000-00-00', '0000-00-00', 0, '', ''),
(18, 'Angela', 'Li', '2014-05-30', 'F', 'images/student_photos/18.png', '0000-00-00', '0000-00-00', 0, '', ''),
(19, 'Jacob', 'Walker', '2013-05-04', 'M', 'images/student_photos/19.png', '0000-00-00', '0000-00-00', 0, '', ''),
(20, 'Cathy', 'Allen', '2011-11-23', 'F', 'images/student_photos/20.png', '0000-00-00', '0000-00-00', 0, '', '');

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

-- --------------------------------------------------------

--
-- Table structure for table `student_attendances`
--

CREATE TABLE `student_attendances` (
  `STU_ATT_ID` int(11) NOT NULL,
  `STU_ID` int(11) NOT NULL,
  `EVENT_TYPE` varchar(5) NOT NULL,
  `DATE_TIME` datetime NOT NULL,
  `EMP_ID` int(11) NOT NULL,
  `IP_ADDR` varchar(50) NOT NULL,
  `NOTES` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_attendances`
--

INSERT INTO `student_attendances` (`STU_ATT_ID`, `STU_ID`, `EVENT_TYPE`, `DATE_TIME`, `EMP_ID`, `IP_ADDR`, `NOTES`) VALUES
(374, 2, 'In', '2016-06-14 22:58:20', 2, '192.168.1.68', ''),
(375, 3, 'In', '2016-06-14 22:58:20', 2, '192.168.1.68', ''),
(376, 4, 'In', '2016-06-14 22:58:20', 2, '192.168.1.68', ''),
(377, 5, 'In', '2016-06-14 22:58:20', 2, '192.168.1.68', ''),
(378, 6, 'In', '2016-06-14 22:58:20', 2, '192.168.1.68', ''),
(379, 7, 'In', '2016-06-14 22:58:20', 2, '192.168.1.68', ''),
(380, 14, 'In', '2016-06-14 22:58:20', 2, '192.168.1.68', ''),
(381, 15, 'In', '2016-06-14 22:58:20', 2, '192.168.1.68', ''),
(382, 1, 'In', '2016-06-15 00:04:53', 2, '192.168.1.68', ''),
(383, 2, 'In', '2016-06-15 00:04:53', 2, '192.168.1.68', ''),
(384, 3, 'In', '2016-06-15 00:04:53', 2, '192.168.1.68', ''),
(385, 4, 'In', '2016-06-15 00:04:53', 2, '192.168.1.68', ''),
(386, 5, 'In', '2016-06-15 00:04:53', 2, '192.168.1.68', ''),
(387, 6, 'In', '2016-06-15 00:04:53', 2, '192.168.1.68', ''),
(388, 11, 'In', '2016-06-15 00:10:40', 3, '192.168.1.68', ''),
(389, 12, 'In', '2016-06-15 00:10:40', 3, '192.168.1.68', ''),
(390, 13, 'In', '2016-06-15 00:10:40', 3, '192.168.1.68', ''),
(391, 14, 'In', '2016-06-15 00:10:40', 3, '192.168.1.68', ''),
(392, 15, 'In', '2016-06-15 00:10:40', 3, '192.168.1.68', ''),
(393, 5, 'Out', '2016-06-15 00:17:21', 2, '192.168.1.68', ''),
(394, 6, 'Out', '2016-06-15 00:17:21', 2, '192.168.1.68', ''),
(395, 11, 'Out', '2016-06-15 00:17:21', 2, '192.168.1.68', ''),
(396, 12, 'Out', '2016-06-15 00:17:21', 2, '192.168.1.68', ''),
(397, 13, 'Out', '2016-06-15 00:22:30', 2, '192.168.1.68', ''),
(398, 14, 'Out', '2016-06-15 00:22:30', 2, '192.168.1.68', ''),
(399, 15, 'Out', '2016-06-15 00:22:30', 2, '192.168.1.68', ''),
(400, 9, 'In', '2016-06-15 00:37:48', 2, '192.168.1.68', ''),
(401, 17, 'In', '2016-06-15 00:38:00', 2, '192.168.1.68', '');

-- --------------------------------------------------------

--
-- Table structure for table `web_pages`
--

CREATE TABLE `web_pages` (
  `PAGE_ID` int(11) NOT NULL,
  `TAG_CLASS` varchar(50) NOT NULL,
  `TYPE` varchar(20) NOT NULL,
  `HREF` varchar(500) NOT NULL,
  `ICON_URL` varchar(500) NOT NULL,
  `TITLE` varchar(200) NOT NULL,
  `STATUS` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `web_pages`
--

INSERT INTO `web_pages` (`PAGE_ID`, `TAG_CLASS`, `TYPE`, `HREF`, `ICON_URL`, `TITLE`, `STATUS`) VALUES
(1, 'active', '', 'login.php', 'images/icons/keypad_small.jpg', 'User Login', 'active'),
(2, '', '', 'logout.php', 'images/icons/logout.jpg', 'User Logout', 'active'),
(101, '', '', 'record_employee_attendance_in.php', 'images/icons/attendance_in.jpg', 'Check In Employee Attendance', 'active'),
(102, '', '', 'record_employee_attendance_out.php', 'images/icons/attendance_out.png', 'Check Out Employee Attendance', 'active'),
(103, '', '', 'record_student_attendance_in.php', 'images/icons/student_attendance_in.png', 'Check In Student Attendance', 'active'),
(104, '', '', 'record_student_attendance_out.php', 'images/icons/student_attendance_out.png', 'Check Out Student Attendance', 'active'),
(1001, '', '', 'report_employee_attendances.php', 'images/icons/report.jpg', 'Employee Attendance-Ins/Outs', 'active'),
(1002, '', '', 'report_student_attendances.php', 'images/icons/report.jpg', 'Student Attendance-Ins/Outs', 'active'),
(1101, '', '', 'action_check_student_educator_ratio.php', 'images/icons/action.png', 'Check Student-Educator Ratio', 'active'),
(1201, '', '', 'report_employees.php', 'images/icons/report.jpg', 'Employees', 'active'),
(1202, '', '', 'report_students.php', 'images/icons/report.jpg', 'Students', 'active'),
(1203, '', '', 'report_activities.php', 'images/icons/report.jpg', 'Activities', 'active'),
(1301, '', '', 'report_educator_student.php', 'images/icons/report.jpg', 'Educator-Student', 'active'),
(2001, '', '', 'report_employee_log_ios.php', 'images/icons/security.png', 'Employee Log-Ins/Outs', 'active'),
(2002, '', '', 'report_employee_log_failures.php', 'images/icons/security.png', 'Employee Log Failures', 'active'),
(3001, '', '', 'report_dp_query_logs.php', 'images/icons/security.png', 'Executed Database Queries', 'active'),
(4001, '', '', 'report_activity_types.php', 'images/icons/base_table.png', 'Activity Types', 'active'),
(4002, '', '', 'report_activity_subtypes.php', 'images/icons/base_table.png', 'Activity Sub-Types', 'active'),
(4003, '', '', 'report_educations.php', 'images/icons/base_table.png', 'Educations', 'active'),
(4004, '', '', 'report_positions.php', 'images/icons/base_table.png', 'Positions', 'active');

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
-- Indexes for table `educator_student`
--
ALTER TABLE `educator_student`
  ADD PRIMARY KEY (`EDU_STU_ID`),
  ADD KEY `EMP_ID` (`EMP_ID`),
  ADD KEY `STU_ID` (`STU_ID`);

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
  ADD KEY `EMP_ID_6` (`EMP_ID`),
  ADD KEY `EMP_ID_7` (`EMP_ID`),
  ADD KEY `EMP_ID_8` (`EMP_ID`),
  ADD KEY `EMP_ID_9` (`EMP_ID`),
  ADD KEY `EMP_ID_10` (`EMP_ID`);

--
-- Indexes for table `employee_attendances`
--
ALTER TABLE `employee_attendances`
  ADD PRIMARY KEY (`EMP_ATT_ID`),
  ADD KEY `EMP_ID` (`EMP_ID`);

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
  ADD KEY `STU_ID_2` (`STU_ID`),
  ADD KEY `STU_ID_3` (`STU_ID`),
  ADD KEY `STU_ID_4` (`STU_ID`),
  ADD KEY `STU_ID_5` (`STU_ID`);

--
-- Indexes for table `student_activity_educator`
--
ALTER TABLE `student_activity_educator`
  ADD PRIMARY KEY (`STU_ACT_EDR_ID`),
  ADD KEY `STU_ID` (`STU_ID`),
  ADD KEY `EDR_ID` (`EDR_ID`),
  ADD KEY `ACT_ID` (`ACT_ID`);

--
-- Indexes for table `student_attendances`
--
ALTER TABLE `student_attendances`
  ADD PRIMARY KEY (`STU_ATT_ID`),
  ADD KEY `STU_ID` (`STU_ID`);

--
-- Indexes for table `web_pages`
--
ALTER TABLE `web_pages`
  ADD PRIMARY KEY (`PAGE_ID`),
  ADD KEY `PAGE_ID` (`PAGE_ID`);

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
  MODIFY `DB_QL_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `educations`
--
ALTER TABLE `educations`
  MODIFY `EDU_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `educator_student`
--
ALTER TABLE `educator_student`
  MODIFY `EDU_STU_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `EMP_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `employee_attendances`
--
ALTER TABLE `employee_attendances`
  MODIFY `EMP_ATT_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;
--
-- AUTO_INCREMENT for table `employee_log_failures`
--
ALTER TABLE `employee_log_failures`
  MODIFY `EM_LOG_F_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;
--
-- AUTO_INCREMENT for table `employee_log_ios`
--
ALTER TABLE `employee_log_ios`
  MODIFY `EMP_LOGS_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=282;
--
-- AUTO_INCREMENT for table `positions`
--
ALTER TABLE `positions`
  MODIFY `POS_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `STU_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `student_activity_educator`
--
ALTER TABLE `student_activity_educator`
  MODIFY `STU_ACT_EDR_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `student_attendances`
--
ALTER TABLE `student_attendances`
  MODIFY `STU_ATT_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=402;
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
-- Constraints for table `educator_student`
--
ALTER TABLE `educator_student`
  ADD CONSTRAINT `educator_student_ibfk_1` FOREIGN KEY (`EMP_ID`) REFERENCES `employees` (`EMP_ID`),
  ADD CONSTRAINT `educator_student_ibfk_2` FOREIGN KEY (`STU_ID`) REFERENCES `students` (`STU_ID`);

--
-- Constraints for table `employees`
--
ALTER TABLE `employees`
  ADD CONSTRAINT `employees_ibfk_1` FOREIGN KEY (`EMP_EDU_ID`) REFERENCES `educations` (`EDU_ID`),
  ADD CONSTRAINT `employees_ibfk_2` FOREIGN KEY (`EMP_POST_ID1`) REFERENCES `positions` (`POS_ID`),
  ADD CONSTRAINT `employees_ibfk_3` FOREIGN KEY (`EMP_POST_ID2`) REFERENCES `positions` (`POS_ID`),
  ADD CONSTRAINT `employees_ibfk_4` FOREIGN KEY (`EMP_BOSS_ID`) REFERENCES `employees` (`EMP_ID`);

--
-- Constraints for table `employee_attendances`
--
ALTER TABLE `employee_attendances`
  ADD CONSTRAINT `employee_attendances_ibfk_1` FOREIGN KEY (`EMP_ID`) REFERENCES `employees` (`EMP_ID`);

--
-- Constraints for table `employee_log_ios`
--
ALTER TABLE `employee_log_ios`
  ADD CONSTRAINT `employee_log_ios_ibfk_1` FOREIGN KEY (`EMP_ID`) REFERENCES `employees` (`EMP_ID`),
  ADD CONSTRAINT `employee_log_ios_ibfk_2` FOREIGN KEY (`EMP_ID`) REFERENCES `employees` (`EMP_ID`);

--
-- Constraints for table `student_activity_educator`
--
ALTER TABLE `student_activity_educator`
  ADD CONSTRAINT `student_activity_educator_ibfk_1` FOREIGN KEY (`STU_ID`) REFERENCES `students` (`STU_ID`),
  ADD CONSTRAINT `student_activity_educator_ibfk_2` FOREIGN KEY (`EDR_ID`) REFERENCES `employees` (`EMP_ID`),
  ADD CONSTRAINT `student_activity_educator_ibfk_3` FOREIGN KEY (`ACT_ID`) REFERENCES `activities` (`ACT_ID`);

--
-- Constraints for table `student_attendances`
--
ALTER TABLE `student_attendances`
  ADD CONSTRAINT `student_attendances_ibfk_1` FOREIGN KEY (`STU_ID`) REFERENCES `students` (`STU_ID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
