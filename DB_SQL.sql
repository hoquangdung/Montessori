SELECT TS_ID, TIME_FORMAT(START_TIME,'%H:%i') FROM TIME_SLOTS 

SELECT START_TIME_HOUR, START_TIME_MIN FROM TIME_SLOTS
ORDER BY START_TIME_HOUR, START_TIME_MIN 

#########################
#########################

INSERT INTO `time_slots` (`START_TIME_HOUR`, `START_TIME_MIN`) VALUES
(6, 0),
(6, 15),
(6, 30),
(6, 45),
(7, 0),
(7, 15),
(7, 30),
(7, 45),
(8, 0),
(8, 15),
(8, 30),
(8, 45),
(9, 0),
(9, 15),
(9, 30),
(9, 45),
(10, 0),
(10, 15),
(10, 30),
(10, 45),
(11, 0),
(11, 15),
(11, 30),
(11, 45),
(12, 0),
(12, 15),
(12, 30),
(12, 45),
(13, 0),
(13, 15),
(13, 30),
(13, 45),
(14, 0),
(14, 15),
(14, 30),
(14, 45),
(15, 0),
(15, 15),
(15, 30),
(15, 45),
(16, 0),
(16, 15),
(16, 30),
(16, 45),
(17, 0),
(17, 15),
(17, 30),
(17, 45),
(18, 0),
(18, 15),
(18, 30),
(18, 45);

#########################
#########################


INSERT INTO `employee_schedule` (`EMP_ID`, `TS_ID_BEGIN`, `TS_ID_END`, `SCH_DATE`, `UPDATED_BY_EMP_ID`, `UPDATED_ON_DATE_TIME`, `UPDATED_AT_IP_ADDR`, `NOTES`) VALUES
(1, 7, 28, '2016-06-22', 1, NOW(), '192.168.0.42', '');

INSERT INTO `employee_schedule` (`EMP_ID`, `TS_ID_BEGIN`, `TS_ID_END`, `SCH_DATE`, `UPDATED_BY_EMP_ID`, `UPDATED_ON_DATE_TIME`, `UPDATED_AT_IP_ADDR`, `NOTES`) VALUES
(1, 33, 48, '2016-06-22', 1, NOW(), '192.168.0.42', '');

#########################

INSERT INTO `employee_schedule` (`EMP_ID`, `TS_ID_BEGIN`, `TS_ID_END`, `SCH_DATE`, `UPDATED_BY_EMP_ID`, `UPDATED_ON_DATE_TIME`, `UPDATED_AT_IP_ADDR`, `NOTES`) VALUES
(2, 9, 40, '2016-06-22', 1, NOW(), '192.168.0.42', '');

#########################

INSERT INTO `employee_schedule` (`EMP_ID`, `TS_ID_BEGIN`, `TS_ID_END`, `SCH_DATE`, `UPDATED_BY_EMP_ID`, `UPDATED_ON_DATE_TIME`, `UPDATED_AT_IP_ADDR`, `NOTES`) VALUES
(3, 9, 30, '2016-06-22', 1, NOW(), '192.168.0.42', '');

INSERT INTO `employee_schedule` (`EMP_ID`, `TS_ID_BEGIN`, `TS_ID_END`, `SCH_DATE`, `UPDATED_BY_EMP_ID`, `UPDATED_ON_DATE_TIME`, `UPDATED_AT_IP_ADDR`, `NOTES`) VALUES
(3, 35, 50, '2016-06-22', 1, NOW(), '192.168.0.42', '');

#########################

INSERT INTO `employee_schedule` (`EMP_ID`, `TS_ID_BEGIN`, `TS_ID_END`, `SCH_DATE`, `UPDATED_BY_EMP_ID`, `UPDATED_ON_DATE_TIME`, `UPDATED_AT_IP_ADDR`, `NOTES`) VALUES
(4, 12, 48, '2016-06-22', 1, NOW(), '192.168.0.42', '');

#########################

INSERT INTO `employee_schedule` (`EMP_ID`, `TS_ID_BEGIN`, `TS_ID_END`, `SCH_DATE`, `UPDATED_BY_EMP_ID`, `UPDATED_ON_DATE_TIME`, `UPDATED_AT_IP_ADDR`, `NOTES`) VALUES
(5, 5, 16, '2016-06-22', 1, NOW(), '192.168.0.42', '');

INSERT INTO `employee_schedule` (`EMP_ID`, `TS_ID_BEGIN`, `TS_ID_END`, `SCH_DATE`, `UPDATED_BY_EMP_ID`, `UPDATED_ON_DATE_TIME`, `UPDATED_AT_IP_ADDR`, `NOTES`) VALUES
(5, 25, 34, '2016-06-22', 1, NOW(), '192.168.0.42', '');

INSERT INTO `employee_schedule` (`EMP_ID`, `TS_ID_BEGIN`, `TS_ID_END`, `SCH_DATE`, `UPDATED_BY_EMP_ID`, `UPDATED_ON_DATE_TIME`, `UPDATED_AT_IP_ADDR`, `NOTES`) VALUES
(5, 40, 48, '2016-06-22', 1, NOW(), '192.168.0.42', '');

#########################
#########################

INSERT INTO `employee_schedule` (`EMP_ID`, `TS_ID_BEGIN`, `TS_ID_END`, `SCH_DATE`, `UPDATED_BY_EMP_ID`, `UPDATED_ON_DATE_TIME`, `UPDATED_AT_IP_ADDR`, `NOTES`) VALUES
(3, 7, 28, '2016-06-23', 1, NOW(), '192.168.0.42', '');

INSERT INTO `employee_schedule` (`EMP_ID`, `TS_ID_BEGIN`, `TS_ID_END`, `SCH_DATE`, `UPDATED_BY_EMP_ID`, `UPDATED_ON_DATE_TIME`, `UPDATED_AT_IP_ADDR`, `NOTES`) VALUES
(3, 33, 48, '2016-06-23', 1, NOW(), '192.168.0.42', '');

#########################

INSERT INTO `employee_schedule` (`EMP_ID`, `TS_ID_BEGIN`, `TS_ID_END`, `SCH_DATE`, `UPDATED_BY_EMP_ID`, `UPDATED_ON_DATE_TIME`, `UPDATED_AT_IP_ADDR`, `NOTES`) VALUES
(1, 9, 40, '2016-06-23', 1, NOW(), '192.168.0.42', '');


#########################

INSERT INTO `employee_schedule` (`EMP_ID`, `TS_ID_BEGIN`, `TS_ID_END`, `SCH_DATE`, `UPDATED_BY_EMP_ID`, `UPDATED_ON_DATE_TIME`, `UPDATED_AT_IP_ADDR`, `NOTES`) VALUES
(2, 9, 30, '2016-06-23', 1, NOW(), '192.168.0.42', '');

INSERT INTO `employee_schedule` (`EMP_ID`, `TS_ID_BEGIN`, `TS_ID_END`, `SCH_DATE`, `UPDATED_BY_EMP_ID`, `UPDATED_ON_DATE_TIME`, `UPDATED_AT_IP_ADDR`, `NOTES`) VALUES
(2, 35, 50, '2016-06-23', 1, NOW(), '192.168.0.42', '');

#########################

INSERT INTO `employee_schedule` (`EMP_ID`, `TS_ID_BEGIN`, `TS_ID_END`, `SCH_DATE`, `UPDATED_BY_EMP_ID`, `UPDATED_ON_DATE_TIME`, `UPDATED_AT_IP_ADDR`, `NOTES`) VALUES
(5, 12, 48, '2016-06-23', 1, NOW(), '192.168.0.42', '');

#########################

INSERT INTO `employee_schedule` (`EMP_ID`, `TS_ID_BEGIN`, `TS_ID_END`, `SCH_DATE`, `UPDATED_BY_EMP_ID`, `UPDATED_ON_DATE_TIME`, `UPDATED_AT_IP_ADDR`, `NOTES`) VALUES
(4, 5, 16, '2016-06-23', 1, NOW(), '192.168.0.42', '');

INSERT INTO `employee_schedule` (`EMP_ID`, `TS_ID_BEGIN`, `TS_ID_END`, `SCH_DATE`, `UPDATED_BY_EMP_ID`, `UPDATED_ON_DATE_TIME`, `UPDATED_AT_IP_ADDR`, `NOTES`) VALUES
(4, 25, 34, '2016-06-23', 1, NOW(), '192.168.0.42', '');

INSERT INTO `employee_schedule` (`EMP_ID`, `TS_ID_BEGIN`, `TS_ID_END`, `SCH_DATE`, `UPDATED_BY_EMP_ID`, `UPDATED_ON_DATE_TIME`, `UPDATED_AT_IP_ADDR`, `NOTES`) VALUES
(4, 40, 48, '2016-06-23', 1, NOW(), '192.168.0.42', '');

#########################
#########################


INSERT INTO `employee_schedule` (`EMP_ID`, `TS_ID_BEGIN`, `TS_ID_END`, `SCH_DATE`, `UPDATED_BY_EMP_ID`, `UPDATED_ON_DATE_TIME`, `UPDATED_AT_IP_ADDR`, `NOTES`) VALUES
(1, 10, 30, '2016-06-24', 1, NOW(), '192.168.0.42', '');

INSERT INTO `employee_schedule` (`EMP_ID`, `TS_ID_BEGIN`, `TS_ID_END`, `SCH_DATE`, `UPDATED_BY_EMP_ID`, `UPDATED_ON_DATE_TIME`, `UPDATED_AT_IP_ADDR`, `NOTES`) VALUES
(1, 40, 48, '2016-06-24', 1, NOW(), '192.168.0.42', '');

#########################

INSERT INTO `employee_schedule` (`EMP_ID`, `TS_ID_BEGIN`, `TS_ID_END`, `SCH_DATE`, `UPDATED_BY_EMP_ID`, `UPDATED_ON_DATE_TIME`, `UPDATED_AT_IP_ADDR`, `NOTES`) VALUES
(2, 7, 40, '2016-06-24', 1, NOW(), '192.168.0.42', '');

#########################

INSERT INTO `employee_schedule` (`EMP_ID`, `TS_ID_BEGIN`, `TS_ID_END`, `SCH_DATE`, `UPDATED_BY_EMP_ID`, `UPDATED_ON_DATE_TIME`, `UPDATED_AT_IP_ADDR`, `NOTES`) VALUES
(3, 11, 35, '2016-06-24', 1, NOW(), '192.168.0.42', '');

INSERT INTO `employee_schedule` (`EMP_ID`, `TS_ID_BEGIN`, `TS_ID_END`, `SCH_DATE`, `UPDATED_BY_EMP_ID`, `UPDATED_ON_DATE_TIME`, `UPDATED_AT_IP_ADDR`, `NOTES`) VALUES
(3, 38, 50, '2016-06-24', 1, NOW(), '192.168.0.42', '');

#########################

INSERT INTO `employee_schedule` (`EMP_ID`, `TS_ID_BEGIN`, `TS_ID_END`, `SCH_DATE`, `UPDATED_BY_EMP_ID`, `UPDATED_ON_DATE_TIME`, `UPDATED_AT_IP_ADDR`, `NOTES`) VALUES
(4, 11, 49, '2016-06-24', 1, NOW(), '192.168.0.42', '');

#########################

INSERT INTO `employee_schedule` (`EMP_ID`, `TS_ID_BEGIN`, `TS_ID_END`, `SCH_DATE`, `UPDATED_BY_EMP_ID`, `UPDATED_ON_DATE_TIME`, `UPDATED_AT_IP_ADDR`, `NOTES`) VALUES
(5, 5, 13, '2016-06-24', 1, NOW(), '192.168.0.42', '');

INSERT INTO `employee_schedule` (`EMP_ID`, `TS_ID_BEGIN`, `TS_ID_END`, `SCH_DATE`, `UPDATED_BY_EMP_ID`, `UPDATED_ON_DATE_TIME`, `UPDATED_AT_IP_ADDR`, `NOTES`) VALUES
(5, 20, 30, '2016-06-24', 1, NOW(), '192.168.0.42', '');

INSERT INTO `employee_schedule` (`EMP_ID`, `TS_ID_BEGIN`, `TS_ID_END`, `SCH_DATE`, `UPDATED_BY_EMP_ID`, `UPDATED_ON_DATE_TIME`, `UPDATED_AT_IP_ADDR`, `NOTES`) VALUES
(5, 42, 50, '2016-06-24', 1, NOW(), '192.168.0.42', '');