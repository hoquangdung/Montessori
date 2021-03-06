-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 01, 2016 at 12:00 AM
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
(1, 'SELECT HREF FROM WEB_PAGES WHERE (PAGE_ID IN \r\n									(SELECT PAGE_ID FROM EMPLOYEE_WEBPAGE \r\n										WHERE EMP_ID = 9)) AND (WEB_PAGES.STATUS = "active");', 'Super User', '2016-06-30 17:59:24', '192.168.0.42'),
(2, 'SELECT HREF, TITLE_SHORT FROM WEB_PAGES WHERE PAGE_ID IN(SELECT TAB_PAGE_ID FROM PAGE_TABS WHERE PAGE_ID IN(SELECT PAGE_ID FROM WEB_PAGES WHERE (INSTR("/montessori/employee_schedule_weekly.php", HREF) > 0)));', 'Super User', '2016-06-30 17:59:24', '192.168.0.42'),
(3, 'SELECT TS_ID, LPAD(START_TIME_HOUR,2,"0"), LPAD(START_TIME_MIN,2,"0") FROM TIME_SLOTS ORDER BY START_TIME_HOUR, START_TIME_MIN;', 'Super User', '2016-06-30 17:59:24', '192.168.0.42'),
(4, 'SELECT EMP_ID, CONCAT(EMP_FIRST_NAME, " ", EMP_LAST_NAME) AS EMP_NAME FROM EMPLOYEES WHERE EMP_POST_ID1 IN (1, 2, 3, 4, 5, 6) ORDER BY EMP_ID;', 'Super User', '2016-06-30 17:59:24', '192.168.0.42'),
(5, 'SELECT TS_ID_BEGIN, TS_ID_END, TS_PAUSE_UNITS, UPDATED_ON_DATE_TIME FROM EMPLOYEE_SCHEDULE WHERE (EMP_ID = 1) AND (SCH_DATE = "2016-08-15");', 'Super User', '2016-06-30 17:59:24', '192.168.0.42'),
(6, 'SELECT TS_ID_BEGIN, TS_ID_END, TS_PAUSE_UNITS, UPDATED_ON_DATE_TIME FROM EMPLOYEE_SCHEDULE WHERE (EMP_ID = 1) AND (SCH_DATE = "2016-08-16");', 'Super User', '2016-06-30 17:59:24', '192.168.0.42'),
(7, 'SELECT TS_ID_BEGIN, TS_ID_END, TS_PAUSE_UNITS, UPDATED_ON_DATE_TIME FROM EMPLOYEE_SCHEDULE WHERE (EMP_ID = 1) AND (SCH_DATE = "2016-08-17");', 'Super User', '2016-06-30 17:59:24', '192.168.0.42'),
(8, 'SELECT TS_ID_BEGIN, TS_ID_END, TS_PAUSE_UNITS, UPDATED_ON_DATE_TIME FROM EMPLOYEE_SCHEDULE WHERE (EMP_ID = 1) AND (SCH_DATE = "2016-08-18");', 'Super User', '2016-06-30 17:59:24', '192.168.0.42'),
(9, 'SELECT TS_ID_BEGIN, TS_ID_END, TS_PAUSE_UNITS, UPDATED_ON_DATE_TIME FROM EMPLOYEE_SCHEDULE WHERE (EMP_ID = 1) AND (SCH_DATE = "2016-08-19");', 'Super User', '2016-06-30 17:59:24', '192.168.0.42'),
(10, 'SELECT TS_ID_BEGIN, TS_ID_END, TS_PAUSE_UNITS, UPDATED_ON_DATE_TIME FROM EMPLOYEE_SCHEDULE WHERE (EMP_ID = 2) AND (SCH_DATE = "2016-08-15");', 'Super User', '2016-06-30 17:59:24', '192.168.0.42'),
(11, 'SELECT TS_ID_BEGIN, TS_ID_END, TS_PAUSE_UNITS, UPDATED_ON_DATE_TIME FROM EMPLOYEE_SCHEDULE WHERE (EMP_ID = 2) AND (SCH_DATE = "2016-08-16");', 'Super User', '2016-06-30 17:59:24', '192.168.0.42'),
(12, 'SELECT TS_ID_BEGIN, TS_ID_END, TS_PAUSE_UNITS, UPDATED_ON_DATE_TIME FROM EMPLOYEE_SCHEDULE WHERE (EMP_ID = 2) AND (SCH_DATE = "2016-08-17");', 'Super User', '2016-06-30 17:59:24', '192.168.0.42'),
(13, 'SELECT TS_ID_BEGIN, TS_ID_END, TS_PAUSE_UNITS, UPDATED_ON_DATE_TIME FROM EMPLOYEE_SCHEDULE WHERE (EMP_ID = 2) AND (SCH_DATE = "2016-08-18");', 'Super User', '2016-06-30 17:59:24', '192.168.0.42'),
(14, 'SELECT TS_ID_BEGIN, TS_ID_END, TS_PAUSE_UNITS, UPDATED_ON_DATE_TIME FROM EMPLOYEE_SCHEDULE WHERE (EMP_ID = 2) AND (SCH_DATE = "2016-08-19");', 'Super User', '2016-06-30 17:59:24', '192.168.0.42'),
(15, 'SELECT TS_ID_BEGIN, TS_ID_END, TS_PAUSE_UNITS, UPDATED_ON_DATE_TIME FROM EMPLOYEE_SCHEDULE WHERE (EMP_ID = 3) AND (SCH_DATE = "2016-08-15");', 'Super User', '2016-06-30 17:59:24', '192.168.0.42'),
(16, 'SELECT TS_ID_BEGIN, TS_ID_END, TS_PAUSE_UNITS, UPDATED_ON_DATE_TIME FROM EMPLOYEE_SCHEDULE WHERE (EMP_ID = 3) AND (SCH_DATE = "2016-08-16");', 'Super User', '2016-06-30 17:59:24', '192.168.0.42'),
(17, 'SELECT TS_ID_BEGIN, TS_ID_END, TS_PAUSE_UNITS, UPDATED_ON_DATE_TIME FROM EMPLOYEE_SCHEDULE WHERE (EMP_ID = 3) AND (SCH_DATE = "2016-08-17");', 'Super User', '2016-06-30 17:59:24', '192.168.0.42'),
(18, 'SELECT TS_ID_BEGIN, TS_ID_END, TS_PAUSE_UNITS, UPDATED_ON_DATE_TIME FROM EMPLOYEE_SCHEDULE WHERE (EMP_ID = 3) AND (SCH_DATE = "2016-08-18");', 'Super User', '2016-06-30 17:59:25', '192.168.0.42'),
(19, 'SELECT TS_ID_BEGIN, TS_ID_END, TS_PAUSE_UNITS, UPDATED_ON_DATE_TIME FROM EMPLOYEE_SCHEDULE WHERE (EMP_ID = 3) AND (SCH_DATE = "2016-08-19");', 'Super User', '2016-06-30 17:59:25', '192.168.0.42'),
(20, 'SELECT TS_ID_BEGIN, TS_ID_END, TS_PAUSE_UNITS, UPDATED_ON_DATE_TIME FROM EMPLOYEE_SCHEDULE WHERE (EMP_ID = 4) AND (SCH_DATE = "2016-08-15");', 'Super User', '2016-06-30 17:59:25', '192.168.0.42'),
(21, 'SELECT TS_ID_BEGIN, TS_ID_END, TS_PAUSE_UNITS, UPDATED_ON_DATE_TIME FROM EMPLOYEE_SCHEDULE WHERE (EMP_ID = 4) AND (SCH_DATE = "2016-08-16");', 'Super User', '2016-06-30 17:59:25', '192.168.0.42'),
(22, 'SELECT TS_ID_BEGIN, TS_ID_END, TS_PAUSE_UNITS, UPDATED_ON_DATE_TIME FROM EMPLOYEE_SCHEDULE WHERE (EMP_ID = 4) AND (SCH_DATE = "2016-08-17");', 'Super User', '2016-06-30 17:59:25', '192.168.0.42'),
(23, 'SELECT TS_ID_BEGIN, TS_ID_END, TS_PAUSE_UNITS, UPDATED_ON_DATE_TIME FROM EMPLOYEE_SCHEDULE WHERE (EMP_ID = 4) AND (SCH_DATE = "2016-08-18");', 'Super User', '2016-06-30 17:59:25', '192.168.0.42'),
(24, 'SELECT TS_ID_BEGIN, TS_ID_END, TS_PAUSE_UNITS, UPDATED_ON_DATE_TIME FROM EMPLOYEE_SCHEDULE WHERE (EMP_ID = 4) AND (SCH_DATE = "2016-08-19");', 'Super User', '2016-06-30 17:59:25', '192.168.0.42'),
(25, 'SELECT TS_ID_BEGIN, TS_ID_END, TS_PAUSE_UNITS, UPDATED_ON_DATE_TIME FROM EMPLOYEE_SCHEDULE WHERE (EMP_ID = 5) AND (SCH_DATE = "2016-08-15");', 'Super User', '2016-06-30 17:59:25', '192.168.0.42'),
(26, 'SELECT TS_ID_BEGIN, TS_ID_END, TS_PAUSE_UNITS, UPDATED_ON_DATE_TIME FROM EMPLOYEE_SCHEDULE WHERE (EMP_ID = 5) AND (SCH_DATE = "2016-08-16");', 'Super User', '2016-06-30 17:59:25', '192.168.0.42'),
(27, 'SELECT TS_ID_BEGIN, TS_ID_END, TS_PAUSE_UNITS, UPDATED_ON_DATE_TIME FROM EMPLOYEE_SCHEDULE WHERE (EMP_ID = 5) AND (SCH_DATE = "2016-08-17");', 'Super User', '2016-06-30 17:59:25', '192.168.0.42'),
(28, 'SELECT TS_ID_BEGIN, TS_ID_END, TS_PAUSE_UNITS, UPDATED_ON_DATE_TIME FROM EMPLOYEE_SCHEDULE WHERE (EMP_ID = 5) AND (SCH_DATE = "2016-08-18");', 'Super User', '2016-06-30 17:59:25', '192.168.0.42'),
(29, 'SELECT TS_ID_BEGIN, TS_ID_END, TS_PAUSE_UNITS, UPDATED_ON_DATE_TIME FROM EMPLOYEE_SCHEDULE WHERE (EMP_ID = 5) AND (SCH_DATE = "2016-08-19");', 'Super User', '2016-06-30 17:59:25', '192.168.0.42'),
(30, 'SELECT TS_ID_BEGIN, TS_ID_END, TS_PAUSE_UNITS, UPDATED_ON_DATE_TIME FROM EMPLOYEE_SCHEDULE WHERE (EMP_ID = 6) AND (SCH_DATE = "2016-08-15");', 'Super User', '2016-06-30 17:59:25', '192.168.0.42'),
(31, 'SELECT TS_ID_BEGIN, TS_ID_END, TS_PAUSE_UNITS, UPDATED_ON_DATE_TIME FROM EMPLOYEE_SCHEDULE WHERE (EMP_ID = 6) AND (SCH_DATE = "2016-08-16");', 'Super User', '2016-06-30 17:59:25', '192.168.0.42'),
(32, 'SELECT TS_ID_BEGIN, TS_ID_END, TS_PAUSE_UNITS, UPDATED_ON_DATE_TIME FROM EMPLOYEE_SCHEDULE WHERE (EMP_ID = 6) AND (SCH_DATE = "2016-08-17");', 'Super User', '2016-06-30 17:59:25', '192.168.0.42'),
(33, 'SELECT TS_ID_BEGIN, TS_ID_END, TS_PAUSE_UNITS, UPDATED_ON_DATE_TIME FROM EMPLOYEE_SCHEDULE WHERE (EMP_ID = 6) AND (SCH_DATE = "2016-08-18");', 'Super User', '2016-06-30 17:59:25', '192.168.0.42'),
(34, 'SELECT TS_ID_BEGIN, TS_ID_END, TS_PAUSE_UNITS, UPDATED_ON_DATE_TIME FROM EMPLOYEE_SCHEDULE WHERE (EMP_ID = 6) AND (SCH_DATE = "2016-08-19");', 'Super User', '2016-06-30 17:59:25', '192.168.0.42'),
(35, 'SELECT TS_ID_BEGIN, TS_ID_END, TS_PAUSE_UNITS, UPDATED_ON_DATE_TIME FROM EMPLOYEE_SCHEDULE WHERE (EMP_ID = 7) AND (SCH_DATE = "2016-08-15");', 'Super User', '2016-06-30 17:59:25', '192.168.0.42'),
(36, 'SELECT TS_ID_BEGIN, TS_ID_END, TS_PAUSE_UNITS, UPDATED_ON_DATE_TIME FROM EMPLOYEE_SCHEDULE WHERE (EMP_ID = 7) AND (SCH_DATE = "2016-08-16");', 'Super User', '2016-06-30 17:59:26', '192.168.0.42'),
(37, 'SELECT TS_ID_BEGIN, TS_ID_END, TS_PAUSE_UNITS, UPDATED_ON_DATE_TIME FROM EMPLOYEE_SCHEDULE WHERE (EMP_ID = 7) AND (SCH_DATE = "2016-08-17");', 'Super User', '2016-06-30 17:59:26', '192.168.0.42'),
(38, 'SELECT TS_ID_BEGIN, TS_ID_END, TS_PAUSE_UNITS, UPDATED_ON_DATE_TIME FROM EMPLOYEE_SCHEDULE WHERE (EMP_ID = 7) AND (SCH_DATE = "2016-08-18");', 'Super User', '2016-06-30 17:59:26', '192.168.0.42'),
(39, 'SELECT TS_ID_BEGIN, TS_ID_END, TS_PAUSE_UNITS, UPDATED_ON_DATE_TIME FROM EMPLOYEE_SCHEDULE WHERE (EMP_ID = 7) AND (SCH_DATE = "2016-08-19");', 'Super User', '2016-06-30 17:59:26', '192.168.0.42'),
(40, 'SELECT TS_ID_BEGIN, TS_ID_END, TS_PAUSE_UNITS, UPDATED_ON_DATE_TIME FROM EMPLOYEE_SCHEDULE WHERE (EMP_ID = 8) AND (SCH_DATE = "2016-08-15");', 'Super User', '2016-06-30 17:59:26', '192.168.0.42'),
(41, 'SELECT TS_ID_BEGIN, TS_ID_END, TS_PAUSE_UNITS, UPDATED_ON_DATE_TIME FROM EMPLOYEE_SCHEDULE WHERE (EMP_ID = 8) AND (SCH_DATE = "2016-08-16");', 'Super User', '2016-06-30 17:59:26', '192.168.0.42'),
(42, 'SELECT TS_ID_BEGIN, TS_ID_END, TS_PAUSE_UNITS, UPDATED_ON_DATE_TIME FROM EMPLOYEE_SCHEDULE WHERE (EMP_ID = 8) AND (SCH_DATE = "2016-08-17");', 'Super User', '2016-06-30 17:59:26', '192.168.0.42'),
(43, 'SELECT TS_ID_BEGIN, TS_ID_END, TS_PAUSE_UNITS, UPDATED_ON_DATE_TIME FROM EMPLOYEE_SCHEDULE WHERE (EMP_ID = 8) AND (SCH_DATE = "2016-08-18");', 'Super User', '2016-06-30 17:59:26', '192.168.0.42'),
(44, 'SELECT TS_ID_BEGIN, TS_ID_END, TS_PAUSE_UNITS, UPDATED_ON_DATE_TIME FROM EMPLOYEE_SCHEDULE WHERE (EMP_ID = 8) AND (SCH_DATE = "2016-08-19");', 'Super User', '2016-06-30 17:59:26', '192.168.0.42'),
(45, 'SELECT EMP_ID, CONCAT(EMP_FIRST_NAME, " ", EMP_LAST_NAME) AS EMP_NAME FROM EMPLOYEES WHERE EMP_ID IN (SELECT DISTINCT EMP_ID FROM EMPLOYEE_SCHEDULE WHERE (SCH_DATE = "2016-08-15") ORDER BY EMP_ID);', 'Super User', '2016-06-30 17:59:26', '192.168.0.42'),
(46, 'SELECT LPAD(START_TIME_HOUR,2,"0"), LPAD(START_TIME_MIN,2,"0") FROM TIME_SLOTS ORDER BY START_TIME_HOUR, START_TIME_MIN;', 'Super User', '2016-06-30 17:59:26', '192.168.0.42'),
(47, 'SELECT TS_ID_BEGIN, TS_ID_END FROM EMPLOYEE_SCHEDULE WHERE (EMP_ID = 4) AND (SCH_DATE = "2016-08-15")  ORDER BY TS_ID_BEGIN ASC;', 'Super User', '2016-06-30 17:59:26', '192.168.0.42'),
(48, 'SELECT EMP_ID, CONCAT(EMP_FIRST_NAME, " ", EMP_LAST_NAME) AS EMP_NAME FROM EMPLOYEES WHERE EMP_ID IN (SELECT DISTINCT EMP_ID FROM EMPLOYEE_SCHEDULE WHERE (SCH_DATE = "2016-08-16") ORDER BY EMP_ID);', 'Super User', '2016-06-30 17:59:26', '192.168.0.42'),
(49, 'SELECT EMP_ID, CONCAT(EMP_FIRST_NAME, " ", EMP_LAST_NAME) AS EMP_NAME FROM EMPLOYEES WHERE EMP_ID IN (SELECT DISTINCT EMP_ID FROM EMPLOYEE_SCHEDULE WHERE (SCH_DATE = "2016-08-17") ORDER BY EMP_ID);', 'Super User', '2016-06-30 17:59:26', '192.168.0.42'),
(50, 'SELECT EMP_ID, CONCAT(EMP_FIRST_NAME, " ", EMP_LAST_NAME) AS EMP_NAME FROM EMPLOYEES WHERE EMP_ID IN (SELECT DISTINCT EMP_ID FROM EMPLOYEE_SCHEDULE WHERE (SCH_DATE = "2016-08-18") ORDER BY EMP_ID);', 'Super User', '2016-06-30 17:59:26', '192.168.0.42'),
(51, 'SELECT EMP_ID, CONCAT(EMP_FIRST_NAME, " ", EMP_LAST_NAME) AS EMP_NAME FROM EMPLOYEES WHERE EMP_ID IN (SELECT DISTINCT EMP_ID FROM EMPLOYEE_SCHEDULE WHERE (SCH_DATE = "2016-08-19") ORDER BY EMP_ID);', 'Super User', '2016-06-30 17:59:26', '192.168.0.42'),
(52, 'SELECT LPAD(START_TIME_HOUR,2,"0"), LPAD(START_TIME_MIN,2,"0") FROM TIME_SLOTS ORDER BY START_TIME_HOUR, START_TIME_MIN;', 'Super User', '2016-06-30 17:59:26', '192.168.0.42'),
(53, 'SELECT TS_ID_BEGIN, TS_ID_END FROM EMPLOYEE_SCHEDULE WHERE (EMP_ID = 5) AND (SCH_DATE = "2016-08-19")  ORDER BY TS_ID_BEGIN ASC;', 'Super User', '2016-06-30 17:59:26', '192.168.0.42');

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
(1, 'Eva', 'Vittoria', '1973-06-08', 'F', 'images/employee_photos/1.png', '1887 Ch. du Tremblay #100', 'Longueuil', 'QC', 'J4N 1A4', 'Canada', ' 450-332-7255', NULL, 'raphaelle.philippe@gmail.com', '2009-06-19', '0000-00-00', 6, 7, 7, 3, 1, NULL, 35.75, '1887', 'The owner of the school'),
(2, 'Linda', 'Tweed', '1982-10-10', 'F', 'images/employee_photos/2.png', '3412 Rue Simon', 'Montreal', 'QC', 'H1K 2S6 ', 'Canada', '514-649-6731', NULL, 'linda.tweed@yahoo.com', '2013-07-04', '0000-00-00', 4, 5, 5, 4, NULL, 1, 15.5, '8772', NULL),
(3, 'Cathy', 'Kim', '1988-12-11', 'F', 'images/employee_photos/3.png', '4528 University Street', 'Montreal', 'QC', 'H3A 0E9', 'Canada', '514-464-2673', NULL, 'cathy.kim@gmail.com', '2015-09-12', '0000-00-00', 3, 2, 1, 4, NULL, 1, 14.5, '4072', NULL),
(4, 'Mary', 'Garcia', '1988-12-11', 'F', 'images/employee_photos/4.png', '2856 Ave. George', 'Montreal', 'QC', 'H1K 2S8', 'Canada', '514-644-7721', NULL, 'mary.garcia@hotmail.com', '2014-11-09', '0000-00-00', 4, 5, 2, 3, NULL, 1, 17.5, '2016', NULL),
(5, 'Jenifer', 'Taylor', '1989-12-24', 'F', 'images/employee_photos/5.png', '39 Rue Saint Paul Est', 'Montreal', 'QC', 'S1A 1B9', 'Canada', '438-414-7281', NULL, 'Jenifer.Taylor@hotmail.com', '2012-09-16', '0000-00-00', 5, 6, 3, 4, NULL, 1, 20.75, '7381', NULL),
(6, 'Renee', 'Walker', '1987-04-12', 'F', 'images/employee_photos/6.png', '3927 Rue Saint-Denis', 'Montreal', 'QC', 'H2W 2M4', 'Canada', '514-845-5333', '', 'audrey.raines@gmail.com', '2011-09-13', '0000-00-00', 4, 5, 3, 4, NULL, 1, 20.75, '5189', NULL),
(7, 'Michelle', 'Dessler', '1992-10-11', 'F', 'images/employee_photos/7.png', '250 Ave des Pins E', 'Montreal', 'QC', '2W 1P3', 'Canada', '514-287-9127', NULL, 'michelle.dessler@gmail.com', '2012-10-26', '0000-00-00', 5, 2, 2, 4, NULL, 1, 21.75, '2468', NULL),
(8, 'Audrey', 'Raines', '1991-11-12', 'F', 'images/employee_photos/8.png', '1595 Boul St-Laurent', 'Montreal', 'QC', 'H2X 2S9', 'Canada', '514-845-1595', NULL, 'audrey.raines@gmail.com', '2013-11-20', '0000-00-00', 4, 3, 1, 3, NULL, 1, 18.5, '7653', NULL),
(9, 'Super', 'User', '1990-01-17', 'M', 'images/employee_photos/9.png', '3927 Rue Saint-Denis', 'Montreal', 'QC', 'H4H 2A5', 'Canada', '460-135-5567', NULL, 'super.user@hotmail.com', '2010-09-16', '0000-00-00', 3, 0, 0, 8, NULL, 1, 25, '1357', NULL);

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
(1, 2, 'In', '2016-06-23 09:58:59', '192.168.0.42', ''),
(2, 4, 'In', '2016-06-23 10:00:06', '192.168.0.42', ''),
(3, 1, 'In', '2016-06-23 10:00:54', '192.168.0.42', ''),
(4, 1, 'In', '2016-06-24 23:32:22', '192.168.1.69', ''),
(5, 1, 'In', '2016-06-24 23:35:36', '192.168.1.69', ''),
(6, 1, 'In', '2016-06-27 17:03:07', '192.168.0.42', ''),
(7, 1, 'In', '2016-06-28 20:37:21', '192.168.0.42', '');

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
(1, '192.168.1.69', '187', '2016-06-23 23:15:56'),
(2, '192.168.0.42', '887', '2016-06-28 20:37:11');

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
(1, 2, 'In', '2016-06-23 09:58:51', '192.168.0.42'),
(2, 4, 'In', '2016-06-23 09:59:54', '192.168.0.42'),
(3, 1, 'In', '2016-06-23 10:00:45', '192.168.0.42'),
(4, 1, 'In', '2016-06-23 16:30:11', '192.168.0.42'),
(5, 2, 'In', '2016-06-23 17:02:55', '192.168.0.42'),
(6, 2, 'Out', '2016-06-23 17:02:58', '192.168.0.42'),
(7, 1, 'In', '2016-06-23 17:03:01', '192.168.0.42'),
(8, 1, 'In', '2016-06-23 22:45:48', '192.168.1.69'),
(9, 6, 'Out', '2016-06-23 23:15:52', '192.168.1.69'),
(10, 1, 'In', '2016-06-23 23:16:01', '192.168.1.69'),
(11, 1, 'Out', '2016-06-23 23:34:16', '192.168.1.69'),
(12, 6, 'In', '2016-06-23 23:34:22', '192.168.1.69'),
(13, 1, 'Out', '2016-06-24 23:35:29', '192.168.1.69'),
(14, 1, 'In', '2016-06-24 23:35:33', '192.168.1.69'),
(15, 6, 'Out', '2016-06-24 23:57:45', '192.168.1.69'),
(16, 4, 'In', '2016-06-24 23:57:49', '192.168.1.69'),
(17, 4, 'Out', '2016-06-25 00:07:50', '192.168.1.69'),
(18, 6, 'In', '2016-06-25 00:07:56', '192.168.1.69'),
(19, 1, 'In', '2016-06-26 11:05:21', '192.168.1.69'),
(20, 1, 'Out', '2016-06-26 12:18:44', '192.168.1.69'),
(21, 1, 'In', '2016-06-26 12:19:09', '192.168.1.69'),
(22, 1, 'Out', '2016-06-26 12:23:31', '192.168.1.69'),
(23, 6, 'In', '2016-06-26 12:23:36', '192.168.1.69'),
(24, 6, 'Out', '2016-06-26 15:15:08', '192.168.1.69'),
(25, 6, 'In', '2016-06-26 15:15:14', '192.168.1.69'),
(26, 1, 'In', '2016-06-26 21:00:40', '192.168.1.69'),
(27, 6, 'In', '2016-06-27 11:01:41', '192.168.0.42'),
(28, 6, 'Out', '2016-06-27 13:34:54', '192.168.0.42'),
(29, 9, 'In', '2016-06-27 13:34:58', '192.168.0.42'),
(30, 9, 'Out', '2016-06-27 16:56:27', '192.168.0.42'),
(31, 9, 'In', '2016-06-27 16:56:35', '192.168.0.42'),
(32, 9, 'Out', '2016-06-27 17:03:00', '192.168.0.42'),
(33, 1, 'In', '2016-06-27 17:03:05', '192.168.0.42'),
(34, 1, 'Out', '2016-06-27 17:43:12', '192.168.0.42'),
(35, 9, 'In', '2016-06-27 17:43:16', '192.168.0.42'),
(36, 6, 'Out', '2016-06-27 23:31:25', '192.168.1.69'),
(37, 9, 'In', '2016-06-27 23:31:30', '192.168.1.69'),
(38, 9, 'Out', '2016-06-28 12:10:20', '192.168.0.42'),
(39, 9, 'In', '2016-06-28 12:10:24', '192.168.0.42'),
(40, 9, 'Out', '2016-06-28 19:05:52', '192.168.0.42'),
(41, 9, 'In', '2016-06-28 19:05:55', '192.168.0.42'),
(42, 9, 'Out', '2016-06-28 20:37:08', '192.168.0.42'),
(43, 1, 'In', '2016-06-28 20:37:19', '192.168.0.42'),
(44, 1, 'Out', '2016-06-28 20:57:57', '192.168.0.42'),
(45, 9, 'In', '2016-06-28 20:58:11', '192.168.0.42');

-- --------------------------------------------------------

--
-- Table structure for table `employee_schedule`
--

CREATE TABLE `employee_schedule` (
  `EMP_SCH_ID` int(11) NOT NULL,
  `EMP_ID` int(11) NOT NULL,
  `TS_ID_BEGIN` int(11) NOT NULL,
  `TS_ID_END` int(11) NOT NULL,
  `TS_PAUSE_UNITS` int(11) NOT NULL,
  `SCH_DATE` date NOT NULL,
  `UPDATED_BY_EMP_ID` int(11) NOT NULL,
  `UPDATED_ON_DATE_TIME` datetime NOT NULL,
  `UPDATED_AT_IP_ADDR` varchar(50) NOT NULL,
  `NOTES` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee_schedule`
--

INSERT INTO `employee_schedule` (`EMP_SCH_ID`, `EMP_ID`, `TS_ID_BEGIN`, `TS_ID_END`, `TS_PAUSE_UNITS`, `SCH_DATE`, `UPDATED_BY_EMP_ID`, `UPDATED_ON_DATE_TIME`, `UPDATED_AT_IP_ADDR`, `NOTES`) VALUES
(829, 1, 12, 40, 1, '2016-06-27', 9, '2016-06-30 17:20:40', '192.168.0.42', ''),
(830, 2, 9, 36, 2, '2016-06-27', 9, '2016-06-30 17:20:40', '192.168.0.42', ''),
(831, 3, 3, 40, 1, '2016-06-27', 9, '2016-06-30 17:20:40', '192.168.0.42', ''),
(832, 4, 5, 35, 4, '2016-06-27', 9, '2016-06-30 17:20:40', '192.168.0.42', ''),
(833, 5, 8, 43, 1, '2016-06-27', 9, '2016-06-30 17:20:40', '192.168.0.42', ''),
(834, 6, 19, 45, 0, '2016-06-27', 9, '2016-06-30 17:20:40', '192.168.0.42', ''),
(835, 7, 11, 37, 1, '2016-06-27', 9, '2016-06-30 17:20:40', '192.168.0.42', ''),
(836, 1, 5, 46, 3, '2016-06-28', 9, '2016-06-30 17:20:40', '192.168.0.42', ''),
(837, 2, 6, 42, 3, '2016-06-28', 9, '2016-06-30 17:20:40', '192.168.0.42', ''),
(838, 3, 7, 44, 0, '2016-06-28', 9, '2016-06-30 17:20:40', '192.168.0.42', ''),
(839, 4, 5, 36, 2, '2016-06-28', 9, '2016-06-30 17:20:40', '192.168.0.42', ''),
(840, 6, 15, 45, 1, '2016-06-28', 9, '2016-06-30 17:20:41', '192.168.0.42', ''),
(841, 8, 8, 38, 0, '2016-06-28', 9, '2016-06-30 17:20:41', '192.168.0.42', ''),
(842, 1, 7, 48, 4, '2016-06-29', 9, '2016-06-30 17:20:41', '192.168.0.42', ''),
(843, 2, 5, 42, 2, '2016-06-29', 9, '2016-06-30 17:20:41', '192.168.0.42', ''),
(844, 3, 4, 37, 0, '2016-06-29', 9, '2016-06-30 17:20:41', '192.168.0.42', ''),
(845, 4, 9, 44, 2, '2016-06-29', 9, '2016-06-30 17:20:41', '192.168.0.42', ''),
(846, 5, 11, 39, 1, '2016-06-29', 9, '2016-06-30 17:20:41', '192.168.0.42', ''),
(847, 6, 5, 48, 2, '2016-06-29', 9, '2016-06-30 17:20:41', '192.168.0.42', ''),
(848, 7, 17, 40, 0, '2016-06-29', 9, '2016-06-30 17:20:41', '192.168.0.42', ''),
(849, 8, 3, 46, 0, '2016-06-29', 9, '2016-06-30 17:20:42', '192.168.0.42', ''),
(850, 2, 9, 41, 4, '2016-06-30', 9, '2016-06-30 17:20:42', '192.168.0.42', ''),
(851, 4, 5, 46, 0, '2016-06-30', 9, '2016-06-30 17:20:42', '192.168.0.42', ''),
(852, 5, 7, 38, 0, '2016-06-30', 9, '2016-06-30 17:20:42', '192.168.0.42', ''),
(853, 6, 12, 38, 1, '2016-06-30', 9, '2016-06-30 17:20:42', '192.168.0.42', ''),
(854, 7, 3, 42, 2, '2016-06-30', 9, '2016-06-30 17:20:42', '192.168.0.42', ''),
(855, 8, 10, 46, 0, '2016-06-30', 9, '2016-06-30 17:20:42', '192.168.0.42', ''),
(856, 1, 9, 40, 1, '2016-07-01', 9, '2016-06-30 17:20:42', '192.168.0.42', ''),
(857, 2, 10, 44, 3, '2016-07-01', 9, '2016-06-30 17:20:42', '192.168.0.42', ''),
(858, 3, 2, 24, 0, '2016-07-01', 9, '2016-06-30 17:20:42', '192.168.0.42', ''),
(859, 4, 7, 41, 3, '2016-07-01', 9, '2016-06-30 17:20:43', '192.168.0.42', ''),
(860, 5, 5, 45, 0, '2016-07-01', 9, '2016-06-30 17:20:43', '192.168.0.42', ''),
(861, 6, 9, 46, 2, '2016-07-01', 9, '2016-06-30 17:20:43', '192.168.0.42', ''),
(862, 7, 21, 47, 3, '2016-07-01', 9, '2016-06-30 17:20:43', '192.168.0.42', ''),
(863, 8, 9, 43, 0, '2016-07-01', 9, '2016-06-30 17:20:43', '192.168.0.42', ''),
(864, 1, 12, 40, 1, '2016-07-18', 9, '2016-06-30 17:22:42', '192.168.0.42', ''),
(865, 2, 9, 36, 2, '2016-07-18', 9, '2016-06-30 17:22:42', '192.168.0.42', ''),
(866, 3, 3, 40, 1, '2016-07-18', 9, '2016-06-30 17:22:42', '192.168.0.42', ''),
(867, 4, 5, 35, 4, '2016-07-18', 9, '2016-06-30 17:22:43', '192.168.0.42', ''),
(868, 5, 8, 43, 1, '2016-07-18', 9, '2016-06-30 17:22:43', '192.168.0.42', ''),
(869, 6, 19, 45, 0, '2016-07-18', 9, '2016-06-30 17:22:43', '192.168.0.42', ''),
(870, 7, 11, 37, 1, '2016-07-18', 9, '2016-06-30 17:22:43', '192.168.0.42', ''),
(871, 1, 5, 46, 3, '2016-07-19', 9, '2016-06-30 17:22:43', '192.168.0.42', ''),
(872, 2, 6, 42, 3, '2016-07-19', 9, '2016-06-30 17:22:43', '192.168.0.42', ''),
(873, 3, 7, 44, 0, '2016-07-19', 9, '2016-06-30 17:22:43', '192.168.0.42', ''),
(874, 4, 5, 36, 2, '2016-07-19', 9, '2016-06-30 17:22:43', '192.168.0.42', ''),
(875, 6, 15, 45, 1, '2016-07-19', 9, '2016-06-30 17:22:43', '192.168.0.42', ''),
(876, 8, 8, 38, 0, '2016-07-19', 9, '2016-06-30 17:22:44', '192.168.0.42', ''),
(877, 1, 7, 48, 4, '2016-07-20', 9, '2016-06-30 17:22:44', '192.168.0.42', ''),
(878, 2, 5, 42, 2, '2016-07-20', 9, '2016-06-30 17:22:44', '192.168.0.42', ''),
(879, 3, 4, 37, 0, '2016-07-20', 9, '2016-06-30 17:22:44', '192.168.0.42', ''),
(880, 4, 9, 44, 2, '2016-07-20', 9, '2016-06-30 17:22:44', '192.168.0.42', ''),
(881, 5, 11, 39, 1, '2016-07-20', 9, '2016-06-30 17:22:44', '192.168.0.42', ''),
(882, 6, 5, 48, 2, '2016-07-20', 9, '2016-06-30 17:22:44', '192.168.0.42', ''),
(883, 7, 17, 40, 0, '2016-07-20', 9, '2016-06-30 17:22:44', '192.168.0.42', ''),
(884, 8, 3, 46, 0, '2016-07-20', 9, '2016-06-30 17:22:44', '192.168.0.42', ''),
(885, 2, 9, 41, 4, '2016-07-21', 9, '2016-06-30 17:22:44', '192.168.0.42', ''),
(886, 4, 5, 46, 0, '2016-07-21', 9, '2016-06-30 17:22:45', '192.168.0.42', ''),
(887, 5, 7, 38, 0, '2016-07-21', 9, '2016-06-30 17:22:45', '192.168.0.42', ''),
(888, 6, 12, 38, 1, '2016-07-21', 9, '2016-06-30 17:22:45', '192.168.0.42', ''),
(889, 7, 3, 42, 2, '2016-07-21', 9, '2016-06-30 17:22:45', '192.168.0.42', ''),
(890, 8, 10, 46, 0, '2016-07-21', 9, '2016-06-30 17:22:45', '192.168.0.42', ''),
(891, 1, 9, 40, 1, '2016-07-22', 9, '2016-06-30 17:22:45', '192.168.0.42', ''),
(892, 2, 10, 44, 3, '2016-07-22', 9, '2016-06-30 17:22:45', '192.168.0.42', ''),
(893, 3, 2, 24, 0, '2016-07-22', 9, '2016-06-30 17:22:45', '192.168.0.42', ''),
(894, 4, 7, 41, 3, '2016-07-22', 9, '2016-06-30 17:22:45', '192.168.0.42', ''),
(895, 5, 5, 45, 0, '2016-07-22', 9, '2016-06-30 17:22:45', '192.168.0.42', ''),
(896, 6, 9, 46, 2, '2016-07-22', 9, '2016-06-30 17:22:46', '192.168.0.42', ''),
(897, 7, 21, 47, 3, '2016-07-22', 9, '2016-06-30 17:22:46', '192.168.0.42', ''),
(898, 8, 9, 43, 0, '2016-07-22', 9, '2016-06-30 17:22:46', '192.168.0.42', ''),
(901, 3, 4, 47, 2, '2016-08-22', 9, '2016-06-30 17:34:04', '192.168.0.42', ''),
(902, 5, 3, 40, 1, '2016-08-26', 9, '2016-06-30 17:34:05', '192.168.0.42', ''),
(905, 3, 4, 47, 2, '2016-08-29', 9, '2016-06-30 17:42:44', '192.168.0.42', ''),
(906, 5, 3, 40, 1, '2016-09-02', 9, '2016-06-30 17:42:45', '192.168.0.42', ''),
(907, 1, 12, 40, 1, '2016-07-04', 9, '2016-06-30 17:45:58', '192.168.0.42', ''),
(908, 2, 9, 36, 2, '2016-07-04', 9, '2016-06-30 17:45:59', '192.168.0.42', ''),
(909, 3, 3, 40, 1, '2016-07-04', 9, '2016-06-30 17:45:59', '192.168.0.42', ''),
(910, 4, 5, 35, 4, '2016-07-04', 9, '2016-06-30 17:45:59', '192.168.0.42', ''),
(911, 5, 8, 43, 1, '2016-07-04', 9, '2016-06-30 17:45:59', '192.168.0.42', ''),
(912, 6, 19, 45, 0, '2016-07-04', 9, '2016-06-30 17:45:59', '192.168.0.42', ''),
(913, 7, 11, 37, 1, '2016-07-04', 9, '2016-06-30 17:45:59', '192.168.0.42', ''),
(914, 1, 5, 46, 3, '2016-07-05', 9, '2016-06-30 17:45:59', '192.168.0.42', ''),
(915, 2, 6, 42, 3, '2016-07-05', 9, '2016-06-30 17:45:59', '192.168.0.42', ''),
(916, 3, 7, 44, 0, '2016-07-05', 9, '2016-06-30 17:45:59', '192.168.0.42', ''),
(917, 4, 5, 36, 2, '2016-07-05', 9, '2016-06-30 17:46:00', '192.168.0.42', ''),
(918, 6, 15, 45, 1, '2016-07-05', 9, '2016-06-30 17:46:00', '192.168.0.42', ''),
(919, 8, 8, 38, 0, '2016-07-05', 9, '2016-06-30 17:46:00', '192.168.0.42', ''),
(920, 1, 7, 48, 4, '2016-07-06', 9, '2016-06-30 17:46:00', '192.168.0.42', ''),
(921, 2, 5, 42, 2, '2016-07-06', 9, '2016-06-30 17:46:00', '192.168.0.42', ''),
(922, 3, 4, 37, 0, '2016-07-06', 9, '2016-06-30 17:46:00', '192.168.0.42', ''),
(923, 4, 9, 44, 2, '2016-07-06', 9, '2016-06-30 17:46:00', '192.168.0.42', ''),
(924, 5, 11, 39, 1, '2016-07-06', 9, '2016-06-30 17:46:00', '192.168.0.42', ''),
(925, 6, 5, 48, 2, '2016-07-06', 9, '2016-06-30 17:46:00', '192.168.0.42', ''),
(926, 7, 17, 40, 0, '2016-07-06', 9, '2016-06-30 17:46:00', '192.168.0.42', ''),
(927, 8, 3, 46, 0, '2016-07-06', 9, '2016-06-30 17:46:00', '192.168.0.42', ''),
(928, 2, 9, 41, 4, '2016-07-07', 9, '2016-06-30 17:46:01', '192.168.0.42', ''),
(929, 4, 5, 46, 0, '2016-07-07', 9, '2016-06-30 17:46:01', '192.168.0.42', ''),
(930, 5, 7, 38, 0, '2016-07-07', 9, '2016-06-30 17:46:01', '192.168.0.42', ''),
(931, 6, 12, 38, 1, '2016-07-07', 9, '2016-06-30 17:46:01', '192.168.0.42', ''),
(932, 7, 3, 42, 2, '2016-07-07', 9, '2016-06-30 17:46:01', '192.168.0.42', ''),
(933, 8, 10, 46, 0, '2016-07-07', 9, '2016-06-30 17:46:01', '192.168.0.42', ''),
(934, 1, 9, 40, 1, '2016-07-08', 9, '2016-06-30 17:46:01', '192.168.0.42', ''),
(935, 2, 10, 44, 3, '2016-07-08', 9, '2016-06-30 17:46:01', '192.168.0.42', ''),
(936, 3, 2, 24, 0, '2016-07-08', 9, '2016-06-30 17:46:01', '192.168.0.42', ''),
(937, 4, 7, 41, 3, '2016-07-08', 9, '2016-06-30 17:46:02', '192.168.0.42', ''),
(938, 5, 5, 45, 0, '2016-07-08', 9, '2016-06-30 17:46:02', '192.168.0.42', ''),
(939, 6, 9, 46, 2, '2016-07-08', 9, '2016-06-30 17:46:02', '192.168.0.42', ''),
(940, 7, 21, 47, 3, '2016-07-08', 9, '2016-06-30 17:46:02', '192.168.0.42', ''),
(941, 8, 9, 43, 0, '2016-07-08', 9, '2016-06-30 17:46:02', '192.168.0.42', ''),
(942, 4, 3, 48, 2, '2016-08-15', 9, '2016-06-30 17:55:33', '192.168.0.42', ''),
(943, 5, 8, 40, 0, '2016-08-19', 9, '2016-06-30 17:55:33', '192.168.0.42', '');

-- --------------------------------------------------------

--
-- Table structure for table `employee_webpage`
--

CREATE TABLE `employee_webpage` (
  `EMP_WEB_ID` int(11) NOT NULL,
  `EMP_ID` int(11) NOT NULL,
  `PAGE_ID` int(11) NOT NULL,
  `GRANTED_DATE` datetime NOT NULL,
  `NOTES` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee_webpage`
--

INSERT INTO `employee_webpage` (`EMP_WEB_ID`, `EMP_ID`, `PAGE_ID`, `GRANTED_DATE`, `NOTES`) VALUES
(1, 9, 1, '2015-06-10 12:30:00', ''),
(2, 9, 2, '2015-06-10 12:30:00', ''),
(3, 9, 101, '2015-06-10 12:30:00', ''),
(4, 9, 102, '2015-06-10 12:30:00', ''),
(5, 9, 103, '2015-06-10 12:30:00', ''),
(6, 9, 104, '2015-06-10 12:30:00', ''),
(7, 9, 1001, '2015-06-10 12:30:00', ''),
(8, 9, 1002, '2015-06-10 12:30:00', ''),
(9, 9, 1101, '2015-06-10 12:30:00', ''),
(10, 9, 1201, '2015-06-10 12:30:00', ''),
(11, 9, 1202, '2015-06-10 12:30:00', ''),
(12, 9, 1203, '2015-06-10 12:30:00', ''),
(13, 9, 1301, '2015-06-10 12:30:00', ''),
(14, 9, 2001, '2015-06-10 12:30:00', ''),
(15, 9, 2002, '2015-06-10 12:30:00', ''),
(16, 9, 3001, '2015-06-10 12:30:00', ''),
(17, 9, 4001, '2015-06-10 12:30:00', ''),
(18, 9, 4002, '2015-06-10 12:30:00', ''),
(19, 9, 4003, '2015-06-10 12:30:00', ''),
(20, 9, 4004, '2015-06-10 12:30:00', ''),
(21, 1, 1, '2015-06-10 12:30:00', ''),
(22, 1, 2, '2015-06-10 12:30:00', ''),
(23, 1, 101, '2015-06-10 12:30:00', ''),
(24, 1, 102, '2015-06-10 12:30:00', ''),
(25, 1, 103, '2015-06-10 12:30:00', ''),
(26, 1, 104, '2015-06-10 12:30:00', ''),
(27, 1, 1001, '2015-06-10 12:30:00', ''),
(28, 1, 1002, '2015-06-10 12:30:00', ''),
(29, 1, 1101, '2015-06-10 12:30:00', ''),
(30, 1, 1201, '2015-06-10 12:30:00', ''),
(31, 1, 1202, '2015-06-10 12:30:00', ''),
(32, 1, 1203, '2015-06-10 12:30:00', ''),
(33, 1, 1301, '2015-06-10 12:30:00', ''),
(34, 1, 4001, '2015-06-10 12:30:00', ''),
(35, 1, 4002, '2015-06-10 12:30:00', ''),
(36, 1, 4003, '2015-06-10 12:30:00', ''),
(37, 1, 4004, '2015-06-10 12:30:00', ''),
(38, 2, 1, '2015-06-10 12:30:00', ''),
(39, 2, 2, '2015-06-10 12:30:00', ''),
(40, 2, 101, '2015-06-10 12:30:00', ''),
(41, 2, 102, '2015-06-10 12:30:00', ''),
(42, 2, 103, '2015-06-10 12:30:00', ''),
(43, 2, 104, '2015-06-10 12:30:00', ''),
(44, 2, 1001, '2015-06-10 12:30:00', ''),
(45, 2, 1002, '2015-06-10 12:30:00', ''),
(46, 2, 1101, '2015-06-10 12:30:00', ''),
(47, 2, 1301, '2015-06-10 12:30:00', ''),
(48, 3, 1, '2015-06-10 12:30:00', ''),
(49, 3, 2, '2015-06-10 12:30:00', ''),
(50, 3, 101, '2015-06-10 12:30:00', ''),
(51, 3, 102, '2015-06-10 12:30:00', ''),
(52, 3, 103, '2015-06-10 12:30:00', ''),
(53, 3, 104, '2015-06-10 12:30:00', ''),
(54, 3, 1001, '2015-06-10 12:30:00', ''),
(55, 3, 1002, '2015-06-10 12:30:00', ''),
(56, 3, 1101, '2015-06-10 12:30:00', ''),
(57, 3, 1301, '2015-06-10 12:30:00', ''),
(58, 4, 1, '2015-06-10 12:30:00', ''),
(59, 4, 2, '2015-06-10 12:30:00', ''),
(60, 4, 101, '2015-06-10 12:30:00', ''),
(61, 4, 102, '2015-06-10 12:30:00', ''),
(62, 4, 103, '2015-06-10 12:30:00', ''),
(63, 4, 104, '2015-06-10 12:30:00', ''),
(64, 4, 1001, '2015-06-10 12:30:00', ''),
(65, 4, 1002, '2015-06-10 12:30:00', ''),
(66, 4, 1101, '2015-06-10 12:30:00', ''),
(67, 4, 1301, '2015-06-10 12:30:00', ''),
(68, 5, 1, '2015-06-10 12:30:00', ''),
(69, 5, 2, '2015-06-10 12:30:00', ''),
(70, 5, 101, '2015-06-10 12:30:00', ''),
(71, 5, 102, '2015-06-10 12:30:00', ''),
(72, 5, 103, '2015-06-10 12:30:00', ''),
(73, 5, 104, '2015-06-10 12:30:00', ''),
(74, 5, 1001, '2015-06-10 12:30:00', ''),
(75, 5, 1002, '2015-06-10 12:30:00', ''),
(76, 5, 1101, '2015-06-10 12:30:00', ''),
(77, 5, 1301, '2015-06-10 12:30:00', ''),
(78, 9, 1051, '2015-06-10 12:30:00', ''),
(79, 1, 1051, '2015-06-10 12:30:00', ''),
(80, 9, 1061, '2015-06-10 12:30:00', ''),
(81, 1, 1061, '2015-06-10 12:30:00', ''),
(82, 6, 1, '2015-06-10 12:30:00', ''),
(83, 6, 2, '2015-06-10 12:30:00', ''),
(84, 6, 101, '2015-06-10 12:30:00', ''),
(85, 6, 102, '2015-06-10 12:30:00', ''),
(86, 6, 103, '2015-06-10 12:30:00', ''),
(87, 6, 104, '2015-06-10 12:30:00', ''),
(88, 6, 1001, '2015-06-10 12:30:00', ''),
(89, 6, 1002, '2015-06-10 12:30:00', ''),
(90, 6, 1101, '2015-06-10 12:30:00', ''),
(91, 6, 1201, '2015-06-10 12:30:00', ''),
(92, 6, 1202, '2015-06-10 12:30:00', ''),
(93, 6, 1203, '2015-06-10 12:30:00', ''),
(94, 6, 1301, '2015-06-10 12:30:00', ''),
(95, 6, 4001, '2015-06-10 12:30:00', ''),
(96, 6, 4002, '2015-06-10 12:30:00', ''),
(97, 6, 4003, '2015-06-10 12:30:00', ''),
(98, 6, 4004, '2015-06-10 12:30:00', ''),
(99, 7, 1, '2015-06-10 12:30:00', ''),
(100, 7, 2, '2015-06-10 12:30:00', ''),
(101, 7, 101, '2015-06-10 12:30:00', ''),
(102, 7, 102, '2015-06-10 12:30:00', ''),
(103, 7, 103, '2015-06-10 12:30:00', ''),
(104, 7, 104, '2015-06-10 12:30:00', ''),
(105, 7, 1001, '2015-06-10 12:30:00', ''),
(106, 7, 1002, '2015-06-10 12:30:00', ''),
(107, 7, 1101, '2015-06-10 12:30:00', ''),
(108, 7, 1201, '2015-06-10 12:30:00', ''),
(109, 7, 1202, '2015-06-10 12:30:00', ''),
(110, 7, 1203, '2015-06-10 12:30:00', ''),
(111, 7, 1301, '2015-06-10 12:30:00', ''),
(112, 7, 4001, '2015-06-10 12:30:00', ''),
(113, 7, 4002, '2015-06-10 12:30:00', ''),
(114, 7, 4003, '2015-06-10 12:30:00', ''),
(115, 7, 4004, '2015-06-10 12:30:00', ''),
(116, 8, 1, '2015-06-10 12:30:00', ''),
(117, 8, 2, '2015-06-10 12:30:00', ''),
(118, 8, 101, '2015-06-10 12:30:00', ''),
(119, 8, 102, '2015-06-10 12:30:00', ''),
(120, 8, 103, '2015-06-10 12:30:00', ''),
(121, 8, 104, '2015-06-10 12:30:00', ''),
(122, 8, 1001, '2015-06-10 12:30:00', ''),
(123, 8, 1002, '2015-06-10 12:30:00', ''),
(124, 8, 1101, '2015-06-10 12:30:00', ''),
(125, 8, 1201, '2015-06-10 12:30:00', ''),
(126, 8, 1202, '2015-06-10 12:30:00', ''),
(127, 8, 1203, '2015-06-10 12:30:00', ''),
(128, 8, 1301, '2015-06-10 12:30:00', ''),
(129, 8, 4001, '2015-06-10 12:30:00', ''),
(130, 8, 4002, '2015-06-10 12:30:00', ''),
(131, 8, 4003, '2015-06-10 12:30:00', ''),
(132, 8, 4004, '2015-06-10 12:30:00', '');

-- --------------------------------------------------------

--
-- Table structure for table `page_tabs`
--

CREATE TABLE `page_tabs` (
  `P_TAB_ID` int(11) NOT NULL,
  `PAGE_ID` int(11) NOT NULL,
  `TAB_PAGE_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `page_tabs`
--

INSERT INTO `page_tabs` (`P_TAB_ID`, `PAGE_ID`, `TAB_PAGE_ID`) VALUES
(1, 101, 3),
(2, 102, 3),
(3, 103, 3),
(21, 103, 102),
(19, 103, 104),
(20, 103, 1101),
(4, 104, 3),
(24, 104, 102),
(22, 104, 103),
(23, 104, 1101),
(5, 1001, 3),
(25, 1001, 101),
(26, 1001, 102),
(27, 1001, 1101),
(6, 1002, 3),
(28, 1002, 103),
(29, 1002, 104),
(30, 1002, 1101),
(7, 1101, 3),
(33, 1101, 102),
(31, 1101, 103),
(32, 1101, 104),
(8, 1201, 3),
(34, 1201, 1202),
(35, 1201, 1203),
(9, 1202, 3),
(36, 1202, 1201),
(37, 1202, 1203),
(10, 1203, 3),
(38, 1203, 1201),
(39, 1203, 1202),
(11, 1301, 3),
(12, 2001, 3),
(40, 2001, 2002),
(41, 2001, 3001),
(13, 2002, 3),
(42, 2002, 2001),
(43, 2002, 3001),
(14, 3001, 3),
(44, 3001, 2001),
(45, 3001, 2002),
(15, 4001, 3),
(16, 4002, 3),
(17, 4003, 3),
(18, 4004, 3);

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
(1, 5, 'In', '2016-06-23 09:59:05', 2, '192.168.0.42', ''),
(2, 6, 'In', '2016-06-23 09:59:05', 2, '192.168.0.42', ''),
(3, 7, 'In', '2016-06-23 09:59:06', 2, '192.168.0.42', ''),
(4, 8, 'In', '2016-06-23 09:59:06', 2, '192.168.0.42', ''),
(5, 2, 'In', '2016-06-23 09:59:34', 2, '192.168.0.42', ''),
(6, 9, 'In', '2016-06-23 09:59:35', 2, '192.168.0.42', ''),
(7, 10, 'In', '2016-06-23 09:59:35', 2, '192.168.0.42', ''),
(8, 11, 'In', '2016-06-23 09:59:35', 2, '192.168.0.42', ''),
(9, 8, 'Out', '2016-06-23 10:00:18', 4, '192.168.0.42', ''),
(10, 9, 'Out', '2016-06-23 10:00:18', 4, '192.168.0.42', ''),
(11, 2, 'Out', '2016-06-23 10:00:31', 4, '192.168.0.42', ''),
(12, 6, 'Out', '2016-06-23 10:00:31', 4, '192.168.0.42', ''),
(13, 10, 'Out', '2016-06-23 10:00:32', 4, '192.168.0.42', ''),
(14, 5, 'In', '2016-06-24 23:32:35', 1, '192.168.1.69', ''),
(15, 6, 'In', '2016-06-24 23:32:35', 1, '192.168.1.69', ''),
(16, 7, 'In', '2016-06-24 23:32:35', 1, '192.168.1.69', ''),
(17, 8, 'In', '2016-06-24 23:32:35', 1, '192.168.1.69', ''),
(18, 9, 'In', '2016-06-24 23:32:35', 1, '192.168.1.69', ''),
(19, 15, 'In', '2016-06-24 23:32:35', 1, '192.168.1.69', ''),
(20, 16, 'In', '2016-06-24 23:32:35', 1, '192.168.1.69', ''),
(21, 17, 'In', '2016-06-24 23:32:35', 1, '192.168.1.69', ''),
(22, 18, 'In', '2016-06-24 23:32:35', 1, '192.168.1.69', ''),
(23, 9, 'Out', '2016-06-24 23:35:15', 1, '192.168.1.69', ''),
(24, 15, 'Out', '2016-06-24 23:35:15', 1, '192.168.1.69', ''),
(25, 16, 'Out', '2016-06-24 23:35:15', 1, '192.168.1.69', ''),
(26, 17, 'Out', '2016-06-24 23:35:15', 1, '192.168.1.69', ''),
(27, 18, 'Out', '2016-06-24 23:35:15', 1, '192.168.1.69', ''),
(28, 4, 'In', '2016-06-27 17:03:23', 1, '192.168.0.42', ''),
(29, 5, 'In', '2016-06-27 17:03:23', 1, '192.168.0.42', ''),
(30, 6, 'In', '2016-06-27 17:03:23', 1, '192.168.0.42', ''),
(31, 7, 'In', '2016-06-27 17:03:23', 1, '192.168.0.42', ''),
(32, 6, 'In', '2016-06-28 20:37:29', 1, '192.168.0.42', ''),
(33, 7, 'In', '2016-06-28 20:37:29', 1, '192.168.0.42', ''),
(34, 8, 'In', '2016-06-28 20:37:30', 1, '192.168.0.42', ''),
(35, 9, 'In', '2016-06-28 20:37:30', 1, '192.168.0.42', '');

-- --------------------------------------------------------

--
-- Table structure for table `time_slots`
--

CREATE TABLE `time_slots` (
  `TS_ID` int(11) NOT NULL,
  `START_TIME_HOUR` smallint(6) NOT NULL,
  `START_TIME_MIN` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `time_slots`
--

INSERT INTO `time_slots` (`TS_ID`, `START_TIME_HOUR`, `START_TIME_MIN`) VALUES
(1, 6, 0),
(2, 6, 15),
(3, 6, 30),
(4, 6, 45),
(5, 7, 0),
(6, 7, 15),
(7, 7, 30),
(8, 7, 45),
(9, 8, 0),
(10, 8, 15),
(11, 8, 30),
(12, 8, 45),
(13, 9, 0),
(14, 9, 15),
(15, 9, 30),
(16, 9, 45),
(17, 10, 0),
(18, 10, 15),
(19, 10, 30),
(20, 10, 45),
(21, 11, 0),
(22, 11, 15),
(23, 11, 30),
(24, 11, 45),
(25, 12, 0),
(26, 12, 15),
(27, 12, 30),
(28, 12, 45),
(29, 13, 0),
(30, 13, 15),
(31, 13, 30),
(32, 13, 45),
(33, 14, 0),
(34, 14, 15),
(35, 14, 30),
(36, 14, 45),
(37, 15, 0),
(38, 15, 15),
(39, 15, 30),
(40, 15, 45),
(41, 16, 0),
(42, 16, 15),
(43, 16, 30),
(44, 16, 45),
(45, 17, 0),
(46, 17, 15),
(47, 17, 30),
(48, 17, 45),
(49, 18, 0),
(50, 18, 15),
(51, 18, 30),
(52, 18, 45);

-- --------------------------------------------------------

--
-- Table structure for table `time_slots_status`
--

CREATE TABLE `time_slots_status` (
  `TS_STATUS_ID` int(11) NOT NULL,
  `TS_STATUS` varchar(20) NOT NULL,
  `ICON_URL` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `time_slots_status`
--

INSERT INTO `time_slots_status` (`TS_STATUS_ID`, `TS_STATUS`, `ICON_URL`) VALUES
(1, 'Out', 'images/icons/time_slot_out.png'),
(2, 'In', 'images/icons/time_slot_in.png'),
(3, 'Maybe In', 'images/icons/time_slot_maybe_in.png'),
(4, 'Maybe Out', 'images/icons/time_slot_maybe_out.png');

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
  `TITLE_SHORT` varchar(200) NOT NULL,
  `STATUS` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `web_pages`
--

INSERT INTO `web_pages` (`PAGE_ID`, `TAG_CLASS`, `TYPE`, `HREF`, `ICON_URL`, `TITLE`, `TITLE_SHORT`, `STATUS`) VALUES
(1, 'active', '', 'login.php', 'images/icons/keypad_small.jpg', 'User Login', 'Login', 'active'),
(2, '', '', 'logout.php', 'images/icons/logout.jpg', 'User Logout', 'Logout', 'active'),
(3, '', '', 'index.php', 'images/icons/home_button.jpg', 'Home', 'Home', 'active'),
(101, '', '', 'record_employee_attendance_in.php', 'images/icons/attendance_in.jpg', 'Check In Employee Attendance', 'Employee In', 'active'),
(102, '', '', 'record_employee_attendance_out.php', 'images/icons/attendance_out.png', 'Check Out Employee Attendance', 'Employee Out', 'active'),
(103, '', '', 'record_student_attendance_in.php', 'images/icons/student_attendance_in.png', 'Check In Student Attendance', 'Student In', 'active'),
(104, '', '', 'record_student_attendance_out.php', 'images/icons/student_attendance_out.png', 'Check Out Student Attendance', 'Student Out', 'active'),
(1001, '', '', 'report_employee_attendances.php', 'images/icons/report.jpg', 'Employee Attendance-Ins/Outs', 'Employee I/O', 'active'),
(1002, '', '', 'report_student_attendances.php', 'images/icons/report.jpg', 'Student Attendance-Ins/Outs', 'Student I/O', 'active'),
(1051, '', '', 'report_employee_schedule.php', 'images/icons/report_schedule.png', 'Employee Schedules', 'Employee Schedules', 'active'),
(1061, '', '', 'employee_schedule_weekly.php', 'images/icons/report_schedule.png', 'Employee Weekly Schedules', 'Weekly Schedules', 'active'),
(1101, '', '', 'action_check_student_educator_ratio.php', 'images/icons/action.png', 'Check Student-Educator Ratio', 'Check S/E', 'active'),
(1201, '', '', 'report_employees.php', 'images/icons/report.jpg', 'Employees', 'Employees', 'active'),
(1202, '', '', 'report_students.php', 'images/icons/report.jpg', 'Students', 'Students', 'active'),
(1203, '', '', 'report_activities.php', 'images/icons/report.jpg', 'Activities', 'Activities', 'active'),
(1301, '', '', 'report_educator_student.php', 'images/icons/report.jpg', 'Educator-Student', 'Edu-Stu', 'active'),
(2001, '', '', 'report_employee_log_ios.php', 'images/icons/security.png', 'Employee Log-Ins/Outs', 'Log I/O', 'active'),
(2002, '', '', 'report_employee_log_failures.php', 'images/icons/security.png', 'Employee Log Failures', 'Log Failures', 'active'),
(3001, '', '', 'report_dp_query_logs.php', 'images/icons/security.png', 'Executed Database Queries', 'Queries', 'active'),
(4001, '', '', 'report_activity_types.php', 'images/icons/base_table.png', 'Activity Types', 'Act. Types', 'active'),
(4002, '', '', 'report_activity_subtypes.php', 'images/icons/base_table.png', 'Activity Sub-Types', 'Act. Sub-Types', 'active'),
(4003, '', '', 'report_educations.php', 'images/icons/base_table.png', 'Educations', 'Educations', 'active'),
(4004, '', '', 'report_positions.php', 'images/icons/base_table.png', 'Positions', 'Positions', 'active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activities`
--
ALTER TABLE `activities`
  ADD PRIMARY KEY (`ACT_ID`),
  ADD KEY `ACT_TYPE_ID` (`ACT_TYPE_ID`,`ACT_SUBTYPE_ID`),
  ADD KEY `ACT_SUBTYPE_ID` (`ACT_SUBTYPE_ID`);

--
-- Indexes for table `activity_subtypes`
--
ALTER TABLE `activity_subtypes`
  ADD PRIMARY KEY (`ACT_SUBTYPE_ID`);

--
-- Indexes for table `activity_types`
--
ALTER TABLE `activity_types`
  ADD PRIMARY KEY (`ACT_TYPE_ID`);

--
-- Indexes for table `db_query_logs`
--
ALTER TABLE `db_query_logs`
  ADD PRIMARY KEY (`DB_QL_ID`);

--
-- Indexes for table `educations`
--
ALTER TABLE `educations`
  ADD PRIMARY KEY (`EDU_ID`);

--
-- Indexes for table `educator_student`
--
ALTER TABLE `educator_student`
  ADD PRIMARY KEY (`EDU_STU_ID`),
  ADD KEY `EMP_ID` (`EMP_ID`,`STU_ID`),
  ADD KEY `STU_ID` (`STU_ID`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`EMP_ID`),
  ADD KEY `EMP_EDU_ID` (`EMP_EDU_ID`,`EMP_POST_ID1`,`EMP_POST_ID2`,`EMP_BOSS_ID`),
  ADD KEY `EMP_POST_ID1` (`EMP_POST_ID1`),
  ADD KEY `employees_ibfk_3` (`EMP_POST_ID2`),
  ADD KEY `employees_ibfk_4` (`EMP_BOSS_ID`);

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
  ADD PRIMARY KEY (`EMP_LOGS_ID`);

--
-- Indexes for table `employee_schedule`
--
ALTER TABLE `employee_schedule`
  ADD PRIMARY KEY (`EMP_SCH_ID`),
  ADD UNIQUE KEY `EMPLOYEE_SCHEDULE_2KEYS` (`EMP_ID`,`SCH_DATE`),
  ADD KEY `EMP_ID` (`EMP_ID`,`UPDATED_BY_EMP_ID`),
  ADD KEY `TS_ID_BEGIN` (`TS_ID_BEGIN`,`TS_ID_END`),
  ADD KEY `TS_ID_END` (`TS_ID_END`),
  ADD KEY `UPDATED_BY_EMP_ID` (`UPDATED_BY_EMP_ID`);

--
-- Indexes for table `employee_webpage`
--
ALTER TABLE `employee_webpage`
  ADD PRIMARY KEY (`EMP_WEB_ID`),
  ADD KEY `EMP_ID` (`EMP_ID`,`PAGE_ID`),
  ADD KEY `PAGE_ID` (`PAGE_ID`);

--
-- Indexes for table `page_tabs`
--
ALTER TABLE `page_tabs`
  ADD PRIMARY KEY (`P_TAB_ID`),
  ADD KEY `PAGE_ID` (`PAGE_ID`,`TAB_PAGE_ID`),
  ADD KEY `TAB_PAGE_ID` (`TAB_PAGE_ID`);

--
-- Indexes for table `positions`
--
ALTER TABLE `positions`
  ADD PRIMARY KEY (`POS_ID`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`STU_ID`);

--
-- Indexes for table `student_activity_educator`
--
ALTER TABLE `student_activity_educator`
  ADD PRIMARY KEY (`STU_ACT_EDR_ID`),
  ADD KEY `STU_ID` (`STU_ID`,`ACT_ID`,`EDR_ID`),
  ADD KEY `ACT_ID` (`ACT_ID`),
  ADD KEY `EDR_ID` (`EDR_ID`);

--
-- Indexes for table `student_attendances`
--
ALTER TABLE `student_attendances`
  ADD PRIMARY KEY (`STU_ATT_ID`),
  ADD KEY `STU_ID` (`STU_ID`,`EMP_ID`),
  ADD KEY `EMP_ID` (`EMP_ID`);

--
-- Indexes for table `time_slots`
--
ALTER TABLE `time_slots`
  ADD PRIMARY KEY (`TS_ID`);

--
-- Indexes for table `time_slots_status`
--
ALTER TABLE `time_slots_status`
  ADD PRIMARY KEY (`TS_STATUS_ID`);

--
-- Indexes for table `web_pages`
--
ALTER TABLE `web_pages`
  ADD PRIMARY KEY (`PAGE_ID`);

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
  MODIFY `DB_QL_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;
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
  MODIFY `EMP_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `employee_attendances`
--
ALTER TABLE `employee_attendances`
  MODIFY `EMP_ATT_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `employee_log_failures`
--
ALTER TABLE `employee_log_failures`
  MODIFY `EM_LOG_F_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `employee_log_ios`
--
ALTER TABLE `employee_log_ios`
  MODIFY `EMP_LOGS_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
--
-- AUTO_INCREMENT for table `employee_schedule`
--
ALTER TABLE `employee_schedule`
  MODIFY `EMP_SCH_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=944;
--
-- AUTO_INCREMENT for table `employee_webpage`
--
ALTER TABLE `employee_webpage`
  MODIFY `EMP_WEB_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=133;
--
-- AUTO_INCREMENT for table `page_tabs`
--
ALTER TABLE `page_tabs`
  MODIFY `P_TAB_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
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
  MODIFY `STU_ATT_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `time_slots`
--
ALTER TABLE `time_slots`
  MODIFY `TS_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;
--
-- AUTO_INCREMENT for table `time_slots_status`
--
ALTER TABLE `time_slots_status`
  MODIFY `TS_STATUS_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `activities`
--
ALTER TABLE `activities`
  ADD CONSTRAINT `activities_ibfk_1` FOREIGN KEY (`ACT_TYPE_ID`) REFERENCES `activity_types` (`ACT_TYPE_ID`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `activities_ibfk_2` FOREIGN KEY (`ACT_SUBTYPE_ID`) REFERENCES `activity_subtypes` (`ACT_SUBTYPE_ID`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `educator_student`
--
ALTER TABLE `educator_student`
  ADD CONSTRAINT `educator_student_ibfk_1` FOREIGN KEY (`EMP_ID`) REFERENCES `employees` (`EMP_ID`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `educator_student_ibfk_2` FOREIGN KEY (`STU_ID`) REFERENCES `students` (`STU_ID`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `employees`
--
ALTER TABLE `employees`
  ADD CONSTRAINT `employees_ibfk_1` FOREIGN KEY (`EMP_EDU_ID`) REFERENCES `educations` (`EDU_ID`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `employees_ibfk_2` FOREIGN KEY (`EMP_POST_ID1`) REFERENCES `positions` (`POS_ID`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `employees_ibfk_3` FOREIGN KEY (`EMP_POST_ID2`) REFERENCES `positions` (`POS_ID`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `employees_ibfk_4` FOREIGN KEY (`EMP_BOSS_ID`) REFERENCES `employees` (`EMP_ID`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `employee_attendances`
--
ALTER TABLE `employee_attendances`
  ADD CONSTRAINT `employee_attendances_ibfk_1` FOREIGN KEY (`EMP_ID`) REFERENCES `employees` (`EMP_ID`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `employee_schedule`
--
ALTER TABLE `employee_schedule`
  ADD CONSTRAINT `employee_schedule_ibfk_1` FOREIGN KEY (`EMP_ID`) REFERENCES `employees` (`EMP_ID`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `employee_schedule_ibfk_2` FOREIGN KEY (`TS_ID_BEGIN`) REFERENCES `time_slots` (`TS_ID`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `employee_schedule_ibfk_3` FOREIGN KEY (`TS_ID_END`) REFERENCES `time_slots` (`TS_ID`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `employee_schedule_ibfk_4` FOREIGN KEY (`UPDATED_BY_EMP_ID`) REFERENCES `employees` (`EMP_ID`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `employee_webpage`
--
ALTER TABLE `employee_webpage`
  ADD CONSTRAINT `employee_webpage_ibfk_1` FOREIGN KEY (`EMP_ID`) REFERENCES `employees` (`EMP_ID`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `employee_webpage_ibfk_2` FOREIGN KEY (`PAGE_ID`) REFERENCES `web_pages` (`PAGE_ID`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `page_tabs`
--
ALTER TABLE `page_tabs`
  ADD CONSTRAINT `page_tabs_ibfk_1` FOREIGN KEY (`PAGE_ID`) REFERENCES `web_pages` (`PAGE_ID`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `page_tabs_ibfk_2` FOREIGN KEY (`TAB_PAGE_ID`) REFERENCES `web_pages` (`PAGE_ID`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `student_activity_educator`
--
ALTER TABLE `student_activity_educator`
  ADD CONSTRAINT `student_activity_educator_ibfk_1` FOREIGN KEY (`STU_ID`) REFERENCES `students` (`STU_ID`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `student_activity_educator_ibfk_2` FOREIGN KEY (`ACT_ID`) REFERENCES `activities` (`ACT_ID`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `student_activity_educator_ibfk_3` FOREIGN KEY (`EDR_ID`) REFERENCES `employees` (`EMP_ID`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `student_attendances`
--
ALTER TABLE `student_attendances`
  ADD CONSTRAINT `student_attendances_ibfk_1` FOREIGN KEY (`STU_ID`) REFERENCES `students` (`STU_ID`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `student_attendances_ibfk_2` FOREIGN KEY (`EMP_ID`) REFERENCES `employees` (`EMP_ID`) ON DELETE NO ACTION ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
