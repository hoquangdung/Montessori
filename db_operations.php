<?php

// Start the session
if (!isset($_SESSION))
{
	session_start();
}

require_once("sql_queries.php");


function insert_EMPLOYEE_LOG_IOS($emp_id, $event_type, $debug_on)
{
	
	//** 1. build the query
	$queryStr = 'INSERT INTO ';
		$queryStr = $queryStr . 'EMPLOYEE_LOG_IOS(';
		$queryStr = $queryStr . 'EMP_ID';
		$queryStr = $queryStr . ', ' . 'EVENT_TYPE';
		$queryStr = $queryStr . ', ' . 'DATE_TIME';
		$queryStr = $queryStr . ', ' . 'IP_ADDR';
		$queryStr = $queryStr . ')';
	$queryStr = $queryStr . ' VALUES(';
		$queryStr = $queryStr . $emp_id;
		$queryStr = $queryStr . ', ' .  '"' . $event_type .  '"';
		$queryStr = $queryStr . ', ' . 'NOW()';
		$queryStr = $queryStr . ', ' . '"' . get_client_ip() .  '"';
		$queryStr = $queryStr . ')';
	$queryStr = $queryStr . ';';
	
	//if debug on, display [queryStr]
	displayQueryStr($queryStr, $debug_on);	

	//*** 2. execute quyery and get the results
	$result = getResult($queryStr);

	return ($result);

}//insert_EMPLOYEE_LOG_IOS()


function insert_EMPLOYEE_ATTENDANCES($emp_id, $event_type, $notes, $debug_on)
{
	
	//** 1. build the query
	$queryStr = 'INSERT INTO ';
		$queryStr = $queryStr . 'EMPLOYEE_ATTENDANCES(';
		$queryStr = $queryStr . 'EMP_ID';
		$queryStr = $queryStr . ', ' . 'EVENT_TYPE';		
		$queryStr = $queryStr . ', ' . 'DATE_TIME';
		$queryStr = $queryStr . ', ' . 'IP_ADDR';
		$queryStr = $queryStr . ', ' . 'NOTES';
		$queryStr = $queryStr . ')';
	$queryStr = $queryStr . ' VALUES(';
		$queryStr = $queryStr . $emp_id;
		$queryStr = $queryStr . ', ' . '"' . $event_type .  '"';
		$queryStr = $queryStr . ', ' . 'NOW()';
		$queryStr = $queryStr . ', ' . '"' . get_client_ip() .  '"';
		$queryStr = $queryStr . ', ' . '"' . $notes .  '"';
		$queryStr = $queryStr . ')';
	$queryStr = $queryStr . ';';
	
	//if debug on, display [queryStr]
	displayQueryStr($queryStr, $debug_on);

	//*** 2. execute quyery and get the results
	$result = getResult($queryStr);

	return ($result);

}//insert_EMPLOYEE_ATTENDANCES()


function insert_STUDENT_ATTENDANCES($stu_id, $event_type, $emp_id, $notes, $debug_on)
{
	
	//** 1. build the query
	$queryStr = 'INSERT INTO ';
		$queryStr = $queryStr . 'STUDENT_ATTENDANCES(';
		$queryStr = $queryStr . 'STU_ID';
		$queryStr = $queryStr . ', ' . 'EVENT_TYPE';		
		$queryStr = $queryStr . ', ' . 'DATE_TIME';
		$queryStr = $queryStr . ', ' . 'EMP_ID';
		$queryStr = $queryStr . ', ' . 'IP_ADDR';
		$queryStr = $queryStr . ', ' . 'NOTES';
		$queryStr = $queryStr . ')';
	$queryStr = $queryStr . ' VALUES(';
		$queryStr = $queryStr . $stu_id;
		$queryStr = $queryStr . ', ' . '"' . $event_type .  '"';
		$queryStr = $queryStr . ', ' . 'NOW()';
		$queryStr = $queryStr . ', ' . $emp_id;
		$queryStr = $queryStr . ', ' . '"' . get_client_ip() .  '"';
		$queryStr = $queryStr . ', ' . '"' . $notes .  '"';
		$queryStr = $queryStr . ')';
	$queryStr = $queryStr . ';';
	
	//if debug on, display [queryStr]
	displayQueryStr($queryStr, $debug_on);

	//*** 2. execute quyery and get the results
	$result = getResult($queryStr);

	return ($result);

}//insert_STUDENT_ATTENDANCES()


function insert_EMPLOYEE_LOG_FAILURES($keys, $debug_on)
{
	
	//** 1. build the query
	$queryStr = 'INSERT INTO ';
		$queryStr = $queryStr . 'EMPLOYEE_LOG_FAILURES(';
		$queryStr = $queryStr . 'IP_ADDR';
		$queryStr = $queryStr . ', ' . 'PASSCODE';
		$queryStr = $queryStr . ', ' . 'DATE_TIME';
		$queryStr = $queryStr . ')';
	$queryStr = $queryStr . ' VALUES(';
		$queryStr = $queryStr . '"' . get_client_ip() .  '"';
		$queryStr = $queryStr . ', ' .  '"' . $keys .  '"';
		$queryStr = $queryStr . ', ' . 'NOW()';
		$queryStr = $queryStr . ')';
	$queryStr = $queryStr . ';';
		
	//if debug on, display [queryStr]
	displayQueryStr($queryStr, $debug_on);

	//*** 2. execute quyery and get the results
	$result = getResult($queryStr);

	return ($result);

}//insert_EMPLOYEE_LOG_FAILURES()


//siliently record SQL query into the database
function insert_DB_QUERY_LOGS($user_name, $queryStrToDisplay)
{
	
	//** 1. build the query
	//---------------- carefull with the mixed use of {"} and {'}
	//since inside queryStr {"} is used
	$queryStr = "INSERT INTO ";
		$queryStr = $queryStr . "DB_QUERY_LOGS(";
		$queryStr = $queryStr . "QUERY_STR";
		$queryStr = $queryStr . ", " . "USER_NAME";
		$queryStr = $queryStr . ", " . "DATE_TIME";
		$queryStr = $queryStr . ", " . "IP_ADDR";
		$queryStr = $queryStr . ")";
	$queryStr = $queryStr . " VALUES(";
		$queryStr = $queryStr . "'" . $queryStrToDisplay .  "'";
		$queryStr = $queryStr . ", " . "'" . $user_name . "'";
		$queryStr = $queryStr . ", " . "NOW()";
		$queryStr = $queryStr . ", " . "'" . get_client_ip() .  "'";		
		$queryStr = $queryStr . ")";
	$queryStr = $queryStr . ";";	
		
	//*** 2. execute quyery and get the results
	$result = getResult($queryStr);

	return ($result);

}//insert_DB_QUERY_LOGS()


//******************************************************
//SELECT

function report_ACTIVITY_TYPES($debug_on)
{
	
	//** 1. build the query
	$queryStr = 'SELECT  ';
		$queryStr = $queryStr . '*';
	$queryStr = $queryStr . ' FROM ';
		$queryStr = $queryStr . 'ACTIVITY_TYPES';
	$queryStr = $queryStr . ' ORDER BY ';
		$queryStr = $queryStr . 'ACT_TYPE_ID' . ' ASC';	
	$queryStr = $queryStr . ';';	

	//if debug on, display [queryStr]
	displayQueryStr($queryStr, $debug_on);
	
	//*** 2. execute quyery and get the results
	$result = getResult($queryStr);
	
	//populate [result] to table
	$fieldHeaderStr = array (
		0 => 'ID',
		1 => 'Name',
		2 => 'Descriptions',
		3 => 'Notes',
		);
	populateResultToTable($result, $fieldHeaderStr);

}//report_ACTIVITY_TYPES()


function report_ACTIVITY_SUBTYPES($debug_on)
{
	
	//** 1. build the query
	$queryStr = 'SELECT  ';
		$queryStr = $queryStr . '*';
	$queryStr = $queryStr . ' FROM ';
		$queryStr = $queryStr . 'ACTIVITY_SUBTYPES';
	$queryStr = $queryStr . ' ORDER BY ';
		 $queryStr = $queryStr . 'ACT_SUBTYPE_ID' . ' ASC';	
	$queryStr = $queryStr . ';';	

	//if debug on, display [queryStr]
	displayQueryStr($queryStr, $debug_on);
	
	//*** 2. execute quyery and get the results
	$result = getResult($queryStr);
	
	//populate [result] to table
	$fieldHeaderStr = array (
		0 => 'ID',
		1 => 'Name',
		2 => 'Descriptions',
		3 => 'Notes',
		);
	populateResultToTable($result, $fieldHeaderStr);

}//report_ACTIVITY_SUBTYPES()


function report_EDUCATIONS($debug_on)
{
	
	//** 1. build the query
	$queryStr = 'SELECT  ';
		$queryStr = $queryStr . '*';
	$queryStr = $queryStr . ' FROM ';
		$queryStr = $queryStr . 'EDUCATIONS';
	$queryStr = $queryStr . ' ORDER BY ';
		 $queryStr = $queryStr . 'EDU_ID' . ' ASC';	
	$queryStr = $queryStr . ';';	

	//if debug on, display [queryStr]
	displayQueryStr($queryStr, $debug_on);
	
	//*** 2. execute quyery and get the results
	$result = getResult($queryStr);
	
	//populate [result] to table
	$fieldHeaderStr = array (
		0 => 'ID',
		1 => 'Degree',
		);
	populateResultToTable($result, $fieldHeaderStr);

}//report_EDUCATIONS()


function report_POSITIONS($debug_on)
{
	
	//** 1. build the query
	$queryStr = 'SELECT  ';
		$queryStr = $queryStr . '*';
	$queryStr = $queryStr . ' FROM ';
		$queryStr = $queryStr . 'POSITIONS';
	$queryStr = $queryStr . ' ORDER BY ';
		 $queryStr = $queryStr . 'POS_ID' . ' ASC';	
	$queryStr = $queryStr . ';';	

	//if debug on, display [queryStr]
	displayQueryStr($queryStr, $debug_on);
	
	//*** 2. execute quyery and get the results
	$result = getResult($queryStr);
	
	//populate [result] to table
	$fieldHeaderStr = array (
		0 => 'ID',
		1 => 'Name',
		2 => 'Descriptions',
		3 => 'Notes',
		);
	populateResultToTable($result, $fieldHeaderStr);

}//report_POSITIONS()


function report_ACTIVITIES($debug_on)
{
	
	//** 1. build the query
	$queryStr = 'SELECT  ';
		$queryStr = $queryStr . '*';
	$queryStr = $queryStr . ' FROM ';
		$queryStr = $queryStr . 'ACTIVITIES';
	$queryStr = $queryStr . ' ORDER BY ';
		$queryStr = $queryStr . 'ACT_TYPE_ID' . ' ASC ';
		$queryStr = $queryStr . ', ' . 'ACT_SUBTYPE_ID' . ' ASC';		
	$queryStr = $queryStr . ';';	

	//if debug on, display [queryStr]
	displayQueryStr($queryStr, $debug_on);
	
	//*** 2. execute quyery and get the results
	$result = getResult($queryStr);
	
	//populate [result] to table
	$fieldHeaderStr = array (
		0 => 'ID',
		1 => 'Type ID',
		2 => 'Sub-Type ID',
		3 => 'Name',
		4 => 'Min Age',
		5 => 'Max Age',
		6 => 'Descriptions',
		7 => 'Notes',
		);
	populateResultToTable($result, $fieldHeaderStr);

}//report_ACTIVITES()


function report_EMPLOYEES($debug_on)
{
	
	//** 1. build the query
	$queryStr = 'SELECT  ';
		$queryStr = $queryStr . '*';
	$queryStr = $queryStr . ' FROM ';
		$queryStr = $queryStr . 'EMPLOYEES';
		$queryStr = $queryStr . ' ORDER BY ' . 'EMP_FIRST_NAME' .  ' ASC';	
	$queryStr = $queryStr . ';';	

	//if debug on, display [queryStr]
	displayQueryStr($queryStr, $debug_on);
	
	//*** 2. execute quyery and get the results
	$result = getResult($queryStr);
	
	//populate [result] to table
	$fieldHeaderStr = array (
		0 => 'ID',
		1 => 'First Name',
		2 => 'Last Name',
		3 => 'Birthdate',
		4 => 'Sex',
		5 => 'Photo',
		6 => 'Address',
		7 => 'City',
		8 => 'Province',
		9 => 'Postal Code',
		10 => 'Country',
		11 => 'Phone 1',
		12 => 'Phone 2',
		13 => 'Email',
		14 => 'Hire Date',
		15 => 'End Date',
		16 => 'Education',
		17 => 'Daycare Years',
		18 => 'Montessori Years',
		19 => 'Position 1',
		20 => 'Position 2',
		21 => 'Boss',
		22 => 'Hourly Rate ',
		23 => 'Passcode',
		24 => 'Notes',
		);
	populateResultToTable($result, $fieldHeaderStr);

}//report_EMPLOYEES()


function report_STUDENTS($debug_on)
{
	
	//** 1. build the query
	$queryStr = 'SELECT  ';
		$queryStr = $queryStr . '*';
	$queryStr = $queryStr . ' FROM ';
		$queryStr = $queryStr . 'STUDENTS';
	$queryStr = $queryStr . ' ORDER BY ';
		 $queryStr = $queryStr . 'STU_FIRST_NAME' . ' ASC';	
	$queryStr = $queryStr . ';';	

	//if debug on, display [queryStr]
	displayQueryStr($queryStr, $debug_on);
	
	//*** 2. execute quyery and get the results
	$result = getResult($queryStr);
	
	//populate [result] to table
	$fieldHeaderStr = array (
		0 => 'ID',
		1 => 'First Name', 
		2 => 'Last Name', 
		3 => 'Birth Date', 
		4 => 'Sex',
		5 => 'Photo', 
		6 => 'Start Date', 
		7 => 'Grad date',
		8 => 'Daily Fee',
		9 => 'Credential',
		10 => 'Notes',
		);
	populateResultToTable($result, $fieldHeaderStr);

}//report_STUDENTS()


function report_EDUCATOR_STUDENT($emp_id, $debug_on)
{
	
	//** 1. build the query
	$queryStr = 'SELECT  ';
		$queryStr = $queryStr . 'EDUCATOR_STUDENT.EDU_STU_ID';
		$queryStr = $queryStr . ', ' . 'CONCAT(EMPLOYEES.EMP_FIRST_NAME, " ", EMPLOYEES.EMP_LAST_NAME) AS EMPLOYEE_NAME'; 
		$queryStr = $queryStr . ', ' . 'CONCAT(STUDENTS.STU_FIRST_NAME, " ", STUDENTS.STU_LAST_NAME) AS STU_NAME';
		$queryStr = $queryStr . ', ' . 'EDUCATOR_STUDENT.RESPONSITIVTY';
		$queryStr = $queryStr . ', ' . 'EDUCATOR_STUDENT.START_DATE';
		$queryStr = $queryStr . ', ' . 'EDUCATOR_STUDENT.END_DATE';
		$queryStr = $queryStr . ', ' . 'EDUCATOR_STUDENT.NOTES';
	$queryStr = $queryStr . ' FROM ';
		$queryStr = $queryStr . 'EDUCATOR_STUDENT';
		$queryStr = $queryStr . ' JOIN EMPLOYEES ON EMPLOYEES.EMP_ID=EDUCATOR_STUDENT.EMP_ID';
		$queryStr = $queryStr . ' JOIN STUDENTS ON STUDENTS.STU_ID=EDUCATOR_STUDENT.STU_ID';
	$queryStr = $queryStr . ' WHERE ';
		$queryStr = $queryStr . 'EDUCATOR_STUDENT.EMP_ID=' .  $emp_id;
	$queryStr = $queryStr . ';';	


	//if debug on, display [queryStr]
	displayQueryStr($queryStr, $debug_on);
	
	//*** 2. execute quyery and get the results
	$result = getResult($queryStr);
	
	//populate [result] to table
	$fieldHeaderStr = array (
		0 => 'ID',
		1 => 'Educator Name',
		2 => 'Student Name',
		3 => 'Responsibility',
		4 => 'Start Date',
		5 => 'End Date',
		6 => 'Notes',
		);
	populateResultToTable($result, $fieldHeaderStr);

}//report_EDUCATOR_STUDENT()


function get_EDUCATOR_STUDENT($emp_id, $debug_on)
{	
	//** 1. build the query
	$queryStr = 'SELECT  ';
		$queryStr = $queryStr . 'EDUCATOR_STUDENT.EDU_STU_ID';
		$queryStr = $queryStr . ', ' . 'EDUCATOR_STUDENT.STU_ID';		
		$queryStr = $queryStr . ', ' . 'CONCAT(EMPLOYEES.EMP_FIRST_NAME, " ", EMPLOYEES.EMP_LAST_NAME) AS EMPLOYEE_NAME'; 
		$queryStr = $queryStr . ', ' . 'CONCAT(STUDENTS.STU_FIRST_NAME, " ", STUDENTS.STU_LAST_NAME) AS STU_NAME';
		$queryStr = $queryStr . ', ' . 'STUDENTS.STU_PHOTO';	
		$queryStr = $queryStr . ', ' . 'EDUCATOR_STUDENT.RESPONSITIVTY';
		$queryStr = $queryStr . ', ' . 'EDUCATOR_STUDENT.START_DATE';
		$queryStr = $queryStr . ', ' . 'EDUCATOR_STUDENT.END_DATE';
		$queryStr = $queryStr . ', ' . 'EDUCATOR_STUDENT.NOTES';
	$queryStr = $queryStr . ' FROM ';
		$queryStr = $queryStr . 'EDUCATOR_STUDENT';
		$queryStr = $queryStr . ' JOIN EMPLOYEES ON EMPLOYEES.EMP_ID=EDUCATOR_STUDENT.EMP_ID';
		$queryStr = $queryStr . ' JOIN STUDENTS ON STUDENTS.STU_ID=EDUCATOR_STUDENT.STU_ID';
	$queryStr = $queryStr . ' WHERE ';
		$queryStr = $queryStr . 'EDUCATOR_STUDENT.EMP_ID=' .  $emp_id;
	$queryStr = $queryStr . ';';	


	//if debug on, display [queryStr]
	displayQueryStr($queryStr, $debug_on);

	//*** 2. execute quyery and get the results
	$result = getResult($queryStr);

	//populate [result] to table
	$fieldHeaderStr = array (
		0 => 'ID',
		1 => 'Student ID',
		2 => 'Educator Name',
		3 => 'Student Name',
		4 => 'Student Photo',
		5 => 'Responsibility',
		6 => 'Start Date',
		7 => 'End Date',
		8 => 'Notes',
		);
	populateResultToTable($result, $fieldHeaderStr);
		
	return ($result);

}//get_EDUCATOR_STUDENT()


function getStudents_NotAttendanceCheckedToday($event_type, $debug_on)
{
	
	$queryStr = 'SELECT  ';
		$queryStr = $queryStr . 'STUDENTS.STU_ID';		
		$queryStr = $queryStr . ', ' . 'CONCAT(STUDENTS.STU_FIRST_NAME, " ", STUDENTS.STU_LAST_NAME) AS STU_NAME';
		$queryStr = $queryStr . ', ' . 'STUDENTS.STU_BIRTHDATE';
		$queryStr = $queryStr . ', ' . 'FLOOR(DATEDIFF(NOW(), STUDENTS.STU_BIRTHDATE)/365.25) AS STU_AGE';
		$queryStr = $queryStr . ', ' . 'STUDENTS.STU_PHOTO';
	$queryStr = $queryStr . ' FROM ';
		$queryStr = $queryStr . 'STUDENTS';
	$queryStr = $queryStr . ' WHERE  STUDENTS.STU_ID NOT IN ';
		$queryStr = $queryStr . '(SELECT STUDENT_ATTENDANCES.STU_ID FROM STUDENT_ATTENDANCES WHERE 
										STUDENT_ATTENDANCES.DATE_TIME >= CURDATE() AND 
										STUDENT_ATTENDANCES.DATE_TIME < (CURDATE() + INTERVAL 1 DAY) AND
										STUDENT_ATTENDANCES.EVENT_TYPE = "' . $event_type . '")';
	$queryStr = $queryStr . ';';	

	//if debug on, display [queryStr]
	displayQueryStr($queryStr, $debug_on);

	//*** 2. execute quyery and get the results
	$result = getResult($queryStr);

	//testting	
	/**
	//populate [result] to table
	$fieldHeaderStr = array (
		0 => 'ID',
		1 => 'Name',
		2 => 'Birth Date',
		3 => 'Age',
		4 => 'Photo',
		);
	populateResultToTable($result, $fieldHeaderStr);

	//NOTES: after print out, the result cursor is at the end
	//need to reset to head before return
	/**/
		
	return ($result);

}//getStudents_NotAttendanceCheckedToday()


//list of students that were checked in but not yet checked out now
function getStudents_InSchoolNow($debug_on)
{	
	$queryStr = 'SELECT ';
		$queryStr = $queryStr . 'STUDENTS.STU_ID';
		$queryStr = $queryStr . ', ' . 'CONCAT(STUDENTS.STU_FIRST_NAME, " ", STUDENTS.STU_LAST_NAME) AS STU_NAME';
		$queryStr = $queryStr . ', ' . 'STUDENTS.STU_BIRTHDATE';
		$queryStr = $queryStr . ', ' . 'FLOOR(DATEDIFF(NOW(), STUDENTS.STU_BIRTHDATE)/365.25) AS STU_AGE';
		$queryStr = $queryStr . ', ' . 'STUDENTS.STU_PHOTO';
	$queryStr = $queryStr . ' FROM ';
		$queryStr = $queryStr . 'STUDENTS';
	$queryStr = $queryStr . ' WHERE ';
		$queryStr = $queryStr . '(STUDENTS.STU_ID IN (SELECT STUDENT_ATTENDANCES.STU_ID FROM STUDENT_ATTENDANCES WHERE STUDENT_ATTENDANCES.DATE_TIME >= CURDATE() AND STUDENT_ATTENDANCES.DATE_TIME < (CURDATE() + INTERVAL 1 DAY) AND STUDENT_ATTENDANCES.EVENT_TYPE = "In")) AND ';
		$queryStr = $queryStr . '(STUDENTS.STU_ID NOT IN (SELECT STUDENT_ATTENDANCES.STU_ID FROM STUDENT_ATTENDANCES WHERE STUDENT_ATTENDANCES.DATE_TIME >= CURDATE() AND STUDENT_ATTENDANCES.DATE_TIME < (CURDATE() + INTERVAL 1 DAY) AND STUDENT_ATTENDANCES.EVENT_TYPE = "Out"))';
		$queryStr = $queryStr . ';';

	//if debug on, display [queryStr]
	displayQueryStr($queryStr, $debug_on);

	//*** 2. execute quyery and get the results
	$result = getResult($queryStr);
		
	return ($result);

}//getStudents_InSchoolNow()


//list of students that were checked in but not yet checked out now
function getEducators_InSchoolNow($debug_on)
{	
	$queryStr = 'SELECT ';
		$queryStr = $queryStr . 'EMPLOYEES.EMP_ID';
		$queryStr = $queryStr . ', ' . 'CONCAT(EMPLOYEES.EMP_FIRST_NAME, " ", EMPLOYEES.EMP_LAST_NAME) AS EMP_NAME';
		$queryStr = $queryStr . ', ' . 'EMPLOYEES.EMP_BIRTHDATE';
		$queryStr = $queryStr . ', ' . 'EMPLOYEES.EMP_PHONE1 EMP_PHONE';
		$queryStr = $queryStr . ', ' . 'EMPLOYEES.EMP_PHOTO';
	$queryStr = $queryStr . ' FROM ';
		$queryStr = $queryStr . 'EMPLOYEES';
	$queryStr = $queryStr . ' WHERE ';
		$queryStr = $queryStr . '(EMPLOYEES.EMP_ID IN (SELECT EMPLOYEE_ATTENDANCES.EMP_ID FROM EMPLOYEE_ATTENDANCES WHERE EMPLOYEE_ATTENDANCES.DATE_TIME >= CURDATE() AND EMPLOYEE_ATTENDANCES.DATE_TIME < (CURDATE() + INTERVAL 1 DAY) AND EMPLOYEE_ATTENDANCES.EVENT_TYPE = "In")) AND ';
		$queryStr = $queryStr . '(EMPLOYEES.EMP_ID NOT IN (SELECT EMPLOYEE_ATTENDANCES.EMP_ID FROM EMPLOYEE_ATTENDANCES WHERE EMPLOYEE_ATTENDANCES.DATE_TIME >= CURDATE() AND EMPLOYEE_ATTENDANCES.DATE_TIME < (CURDATE() + INTERVAL 1 DAY) AND EMPLOYEE_ATTENDANCES.EVENT_TYPE = "Out")) AND ';
		$queryStr = $queryStr . '(EMPLOYEES.EMP_POST_ID1 IN (3,4 ))';
		$queryStr = $queryStr . ';';

	//if debug on, display [queryStr]
	displayQueryStr($queryStr, $debug_on);

	//*** 2. execute quyery and get the results
	$result = getResult($queryStr);
		
	return ($result);

}//getEducators_InSchoolNow()


//list of educators that have never been checked in or
//(checked in but) already checked out
function getEducators_NotInSchoolNow($debug_on)
{	
	$queryStr = 'SELECT DISTINCT ';
		$queryStr = $queryStr . 'EMPLOYEES.EMP_ID';
		$queryStr = $queryStr . ', ' . 'CONCAT(EMPLOYEES.EMP_FIRST_NAME, " ", EMPLOYEES.EMP_LAST_NAME) AS EMP_NAME';
		$queryStr = $queryStr . ', ' . 'EMPLOYEES.EMP_BIRTHDATE';
		$queryStr = $queryStr . ', ' . 'EMPLOYEES.EMP_PHONE1 EMP_PHONE';
		$queryStr = $queryStr . ', ' . 'EMPLOYEES.EMP_PHOTO';
	$queryStr = $queryStr . ' FROM ';
		$queryStr = $queryStr . 'EMPLOYEES';
	$queryStr = $queryStr . ' WHERE ';
		$queryStr = $queryStr . '((EMPLOYEES.EMP_ID NOT IN (SELECT EMPLOYEE_ATTENDANCES.EMP_ID FROM EMPLOYEE_ATTENDANCES WHERE EMPLOYEE_ATTENDANCES.DATE_TIME >= CURDATE() AND EMPLOYEE_ATTENDANCES.DATE_TIME < (CURDATE() + INTERVAL 1 DAY) AND EMPLOYEE_ATTENDANCES.EVENT_TYPE = "In")) OR ';
		$queryStr = $queryStr . '(EMPLOYEES.EMP_ID IN (SELECT EMPLOYEE_ATTENDANCES.EMP_ID FROM EMPLOYEE_ATTENDANCES WHERE EMPLOYEE_ATTENDANCES.DATE_TIME >= CURDATE() AND EMPLOYEE_ATTENDANCES.DATE_TIME < (CURDATE() + INTERVAL 1 DAY) AND EMPLOYEE_ATTENDANCES.EVENT_TYPE = "Out"))) AND ';
		$queryStr = $queryStr . '(EMPLOYEES.EMP_POST_ID1 IN (3,4 ))';
		$queryStr = $queryStr . ';';

	//if debug on, display [queryStr]
	displayQueryStr($queryStr, $debug_on);

	//*** 2. execute quyery and get the results
	$result = getResult($queryStr);
		
	return ($result);

}//getEducators_NotInSchoolNow()


function createStudentList_AttendanceCheck($result)
{
	//the number of rows in [result]
	$resultRows = mysqli_num_rows($result);
	$resultFields = mysqli_num_fields($result);

	for ($row = 0; $row < $resultRows; $row++)
	{
		//the current row in [result]
		$currentRow = mysqli_fetch_row($result);
		//populate [currentRow] 
		echo '<div class="imagelinkbox">';	
		echo '<input type="checkbox" name="checked_student_ids[]"' .
				' id="' . $currentRow[0] . '_id"' . 
				' value="' . $currentRow[0] . '"' .  '>';
		echo '<br/>';
		echo '<label for="' . $currentRow[0] . '_id">' . 
		     	'<img src="' . $currentRow[4] . '" alt="student photo" height="110" width="110">' . 
				'<br/>' . $currentRow[1] . '<br/>' . ' (Age: ' . $currentRow[3] . ')' . '</label>';
		//echo '<br/>';
		echo '</div>'; 
	}

}//getEducators_InSchoolNow()


function createStudentPhotoList($result)
{
	//the number of rows in [result]
	$resultRows = mysqli_num_rows($result);
	$resultFields = mysqli_num_fields($result);

	for ($row = 0; $row < $resultRows; $row++)
	{
		//the current row in [result]
		$currentRow = mysqli_fetch_row($result);
		//populate [currentRow] 
		echo '<div class="imagelinkbox">';	
		echo '<input type="checkbox" name="checked_student_ids[]"' .
				' id="' . $currentRow[0] . '_id"' . 
				' value="' . $currentRow[0] . '"' .  ' disabled>';
		echo '<br/>';
		echo '<label for="' . $currentRow[0] . '_id">' . 
		     	'<img src="' . $currentRow[4] . '" alt="student photo" height="110" width="110">' . 
				'<br/>' . $currentRow[1] . '<br/>' . ' (Age: ' . $currentRow[3] . ')' . '</label>';
		//echo '<br/>';
		echo '</div>'; 
	}

}//createStudentPhotoList()


function createEmployeePhotoList($result)
{
	//the number of rows in [result]
	$resultRows = mysqli_num_rows($result);
	$resultFields = mysqli_num_fields($result);

	for ($row = 0; $row < $resultRows; $row++)
	{
		//the current row in [result]
		$currentRow = mysqli_fetch_row($result);
		//populate [currentRow] 
		echo '<div class="imagelinkbox">';	
		echo '<input type="checkbox" name="checked_student_ids[]"' .
				' id="' . $currentRow[0] . '_id"' . 
				' value="' . $currentRow[0] . '"' .  ' disabled>';
		echo '<br/>';
		echo '<label for="' . $currentRow[0] . '_id">' . 
		     	'<img src="' . $currentRow[4] . '" alt="student photo" height="110" width="110">' . 
				'<br/>' . $currentRow[1] . '<br/>' . ' (P: ' . $currentRow[3] . ')' . '</label>';
		//echo '<br/>';
		echo '</div>'; 
	}

}//createEmployeePhotoList()


//list of web page links that the user have the authorization on
function getWebPageLinks($emp_id, $debug_on)
{	
	$queryStr = 'SELECT ';
		$queryStr = $queryStr . 'WEB_PAGES.PAGE_ID';
		$queryStr = $queryStr . ', ' . 'WEB_PAGES.TAG_CLASS';
		$queryStr = $queryStr . ', ' . 'WEB_PAGES.TYPE';
		$queryStr = $queryStr . ', ' . 'WEB_PAGES.HREF';
		$queryStr = $queryStr . ', ' . 'WEB_PAGES.ICON_URL';
		$queryStr = $queryStr . ', ' . 'WEB_PAGES.TITLE';
		$queryStr = $queryStr . ', ' . 'WEB_PAGES.STATUS';
	$queryStr = $queryStr . ' FROM ';
		$queryStr = $queryStr . 'WEB_PAGES';
	$queryStr = $queryStr . ' WHERE ';
		$queryStr = $queryStr . '(WEB_PAGES.PAGE_ID IN 
									(SELECT PAGE_ID FROM EMPLOYEE_WEBPAGE 
										WHERE EMP_ID = ' . $emp_id . ')) AND ';		
		$queryStr = $queryStr . '(WEB_PAGES.STATUS = "active")';
		$queryStr = $queryStr . ';';

	//if debug on, display [queryStr]
	displayQueryStr($queryStr, $debug_on);

	//*** 2. execute quyery and get the results
	$result = getResult($queryStr);
		
	return ($result);

}//getWebPageLinks()


function createWebPageLinkItems($result)
{
	//the number of rows in [result]
	$resultRows = mysqli_num_rows($result);
	$resultFields = mysqli_num_fields($result);

	for ($row = 0; $row < $resultRows; $row++)
	{
		//the current row in [result]
		$currentRow = mysqli_fetch_row($result);
		//populate [currentRow] 
		echo '<div class="imagelinkbox">';
		echo '<div class="innerimagelinkbox">';
		echo '<a href="' . $currentRow[3] . '">';
		echo '<img src="' . $currentRow[4] . '" width="40">';
		echo '<br/>'. $currentRow[5] . '</a>';
		echo '</div>'; 
		echo '</div>';
	}

}//createWebPageLinkItems()


//list of web page links that the user have the authorization on
function employeeIsAuthorizedThisPage($emp_id, $page_url, $debug_on)
{
	//if this is the index homepage
	if (strpos($page_url, 'index.php') !== false)
	{
		return (true);
	}
	//if this is the help homepage
	if (strpos($page_url, 'help_main.php') !== false)
	{
		return (true);
	}

	//*** 2. prepare the query
	$queryStr = 'SELECT ';
		$queryStr = $queryStr . 'HREF';
	$queryStr = $queryStr . ' FROM ';
		$queryStr = $queryStr . 'WEB_PAGES';
	$queryStr = $queryStr . ' WHERE ';
		$queryStr = $queryStr . '(PAGE_ID IN 
									(SELECT PAGE_ID FROM EMPLOYEE_WEBPAGE 
										WHERE EMP_ID = ' . $emp_id . ')) AND ';		
		$queryStr = $queryStr . '(WEB_PAGES.STATUS = "active")';
		$queryStr = $queryStr . ';';

	//if debug on, display [queryStr]
	displayQueryStr($queryStr, $debug_on);

	//*** 2. execute quyery and get the results
	$result = getResult($queryStr);
	
	//*** 3. search for a sub-string match
	//the number of rows in [result]
	$resultRows = mysqli_num_rows($result);
	//if result is emplty
	if ($resultRows == 0) 
	{
		return (false);
	}
	//else: result is NOT emplty
	//now search
	for ($row = 0; $row < $resultRows; $row++)
	{
		//the current row in [result]
		$currentRow = mysqli_fetch_row($result);

		//if a sub-string match found
		//Ex: $page_url = "/montessori/report_employees.php";
		//$currentRow[0] = report_employees.php
		if (strpos($page_url, $currentRow[0]) !== false)
		{
			return (true);
		}
	}//for
	
	//NO sub-string match found
	return (false);

}//employeeIsAuthorizedThisPage()


function getTabsOfPage($this_page_url, $debug_on)
{
	$queryStr = 'SELECT ';
		$queryStr = $queryStr .'HREF';
		$queryStr = $queryStr . ', ' . 'TITLE_SHORT';
	$queryStr = $queryStr . ' FROM ';
		$queryStr = $queryStr . 'WEB_PAGES';
	$queryStr = $queryStr . ' WHERE ';
		$queryStr = $queryStr . 'PAGE_ID IN';
		$queryStr = $queryStr . '(';
			$queryStr = $queryStr . 'SELECT ';
				$queryStr = $queryStr . 'TAB_PAGE_ID';
			$queryStr = $queryStr . ' FROM ';
				$queryStr = $queryStr . 'PAGE_TABS';
			$queryStr = $queryStr . ' WHERE ';
				$queryStr = $queryStr . 'PAGE_ID IN';
				$queryStr = $queryStr . '(';
					$queryStr = $queryStr . 'SELECT ';
						$queryStr = $queryStr . 'PAGE_ID';
					$queryStr = $queryStr . ' FROM ';
						$queryStr = $queryStr . 'WEB_PAGES';
					$queryStr = $queryStr . ' WHERE ';
						$queryStr = $queryStr . '(INSTR("' . $this_page_url .'", HREF) > 0)';
					$queryStr = $queryStr . ')';
				$queryStr = $queryStr . ')';
	$queryStr = $queryStr . ';';

	//if debug on, display [queryStr]
	displayQueryStr($queryStr, $debug_on);
	
	//*** 2. execute quyery and get the results
	$result = getResult($queryStr);

	return ($result);

}//getTabsOfPage()


function report_EMPLOYEE_LOG_IOS($emp_id, $debug_on)
{
	
	//** 1. build the query
	$queryStr = 'SELECT  ';
		$queryStr = $queryStr . 'EMPLOYEE_LOG_IOS.EMP_LOGS_ID';
		$queryStr = $queryStr . ', ' . 'EMPLOYEES.EMP_FIRST_NAME'; 
		$queryStr = $queryStr . ', ' . 'EMPLOYEES.EMP_LAST_NAME';
		$queryStr = $queryStr . ', ' . 'EMPLOYEE_LOG_IOS.EVENT_TYPE';
		$queryStr = $queryStr . ', ' . 'EMPLOYEE_LOG_IOS.DATE_TIME';
		$queryStr = $queryStr . ', ' . 'EMPLOYEE_LOG_IOS.IP_ADDR';
	$queryStr = $queryStr . ' FROM ';
		$queryStr = $queryStr . 'EMPLOYEE_LOG_IOS';
		$queryStr = $queryStr . ', ' . 'EMPLOYEES';
	$queryStr = $queryStr . ' WHERE ';
		$queryStr = $queryStr . 'EMPLOYEE_LOG_IOS.EMP_ID=' .  $emp_id;
		$queryStr = $queryStr . ' AND ' . 'EMPLOYEE_LOG_IOS.EMP_ID=' . 'EMPLOYEES.EMP_ID';
		$queryStr = $queryStr . ' ORDER BY ' . 'EMPLOYEE_LOG_IOS.DATE_TIME DESC';
	$queryStr = $queryStr . ';';	

	//if debug on, display [queryStr]
	displayQueryStr($queryStr, $debug_on);
	
	//*** 2. execute quyery and get the results
	$result = getResult($queryStr);
	
	//populate [result] to table
	$fieldHeaderStr = array (
		0 => 'Identification',
		1 => 'First Name',
		2 => 'Last Name',
		3 => 'Event',
		4 => 'Date & Time',
		5 => 'IP Address',
		);
	populateResultToTable($result, $fieldHeaderStr);

}//report_EMPLOYEE_LOG_IOS()


function report_EMPLOYEE_LOG_FAILURES($debug_on)
{
	
	//** 1. build the query
	$queryStr = 'SELECT  ';
		$queryStr = $queryStr . 'EM_LOG_F_ID';
		$queryStr = $queryStr . ', ' . 'IP_ADDR'; 
		$queryStr = $queryStr . ', ' . 'PASSCODE';
		$queryStr = $queryStr . ', ' . 'DATE_TIME';
	$queryStr = $queryStr . ' FROM ';
		$queryStr = $queryStr . 'EMPLOYEE_LOG_FAILURES';
		$queryStr = $queryStr . ' ORDER BY ' . 'DATE_TIME DESC';	
	$queryStr = $queryStr . ';';	

	//if debug on, display [queryStr]
	displayQueryStr($queryStr, $debug_on);
	
	//*** 2. execute quyery and get the results
	$result = getResult($queryStr);
	
	//populate [result] to table
	$fieldHeaderStr = array (
		0 => 'Identification',
		1 => 'IP Address',
		2 => 'Passcode',		
		3 => 'Date & Time'
		);
	populateResultToTable($result, $fieldHeaderStr);

}//report_EMPLOYEE_LOG_FAILURES()


function report_DB_QUERY_LOGS($debug_on)
{
	
	//** 1. build the query
	$queryStr = 'SELECT  ';
		$queryStr = $queryStr . '*';
	$queryStr = $queryStr . ' FROM ';
		$queryStr = $queryStr . 'DB_QUERY_LOGS';
		$queryStr = $queryStr . ' ORDER BY ' . 'DATE_TIME DESC, DB_QL_ID DESC';	
	$queryStr = $queryStr . ';';	

	//if debug on, display [queryStr]
	displayQueryStr($queryStr, $debug_on);
	
	//*** 2. execute quyery and get the results
	$result = getResult($queryStr);
	
	//populate [result] to table
	$fieldHeaderStr = array (
		0 => 'Identification',
		1 => 'Query String',
		2 => 'User Name',
		3 => 'Date & Time',		
		4 => 'IP Address',
		);
	populateResultToTable($result, $fieldHeaderStr);

}//report_DB_QUERY_LOGS()


function report_EMPLOYEE_ATTENDANCES($emp_id, $debug_on)
{
//** 1. build the query
	$queryStr = 'SELECT  ';
		$queryStr = $queryStr . 'EMPLOYEE_ATTENDANCES.EMP_ATT_ID';
		$queryStr = $queryStr . ', ' . 'EMPLOYEES.EMP_FIRST_NAME'; 
		$queryStr = $queryStr . ', ' . 'EMPLOYEES.EMP_LAST_NAME';
		$queryStr = $queryStr . ', ' . 'EMPLOYEE_ATTENDANCES.EVENT_TYPE';
		$queryStr = $queryStr . ', ' . 'EMPLOYEE_ATTENDANCES.DATE_TIME';
		$queryStr = $queryStr . ', ' . 'EMPLOYEE_ATTENDANCES.IP_ADDR';
	$queryStr = $queryStr . ' FROM ';
		$queryStr = $queryStr . 'EMPLOYEE_ATTENDANCES';
		$queryStr = $queryStr . ', ' . 'EMPLOYEES';
	$queryStr = $queryStr . ' WHERE ';
		$queryStr = $queryStr . 'EMPLOYEE_ATTENDANCES.EMP_ID=' .  $emp_id;
		$queryStr = $queryStr . ' AND ' . 'EMPLOYEE_ATTENDANCES.EMP_ID=' . 'EMPLOYEES.EMP_ID';
		$queryStr = $queryStr . ' ORDER BY ' . 'EMPLOYEE_ATTENDANCES.DATE_TIME DESC';
	$queryStr = $queryStr . ';';
	
	//if debug on, display [queryStr]
	displayQueryStr($queryStr, $debug_on);

	//*** 2. execute quyery and get the results
	$result = getResult($queryStr);
	
	//populate [result] to table
	$fieldHeaderStr = array (
		0 => 'ID',
		1 => 'First Name',
		2 => 'Last Name',
		3 => 'Event',
		4 => 'Date & Time',
		5 => 'IP Address',
		);
	populateResultToTable($result, $fieldHeaderStr);

}//report_EMPLOYEE_ATTENDANCES()


function report_STUDENT_ATTENDANCES($debug_on)
{
//** 1. build the query
	$queryStr = 'SELECT  ';
		$queryStr = $queryStr . 'STUDENT_ATTENDANCES.STU_ATT_ID';
		$queryStr = $queryStr . ', ' . 'CONCAT(STUDENTS.STU_FIRST_NAME, " ", STUDENTS.STU_LAST_NAME) AS STU_NAME';
		$queryStr = $queryStr . ', ' . 'STUDENT_ATTENDANCES.EVENT_TYPE';
		$queryStr = $queryStr . ', ' . 'STUDENT_ATTENDANCES.DATE_TIME';
		$queryStr = $queryStr . ', ' . 'CONCAT(EMPLOYEES.EMP_FIRST_NAME, " ", EMPLOYEES.EMP_LAST_NAME) AS EMP_NAME';
		$queryStr = $queryStr . ', ' . 'STUDENT_ATTENDANCES.IP_ADDR';
	$queryStr = $queryStr . ' FROM ';
		$queryStr = $queryStr . 'STUDENT_ATTENDANCES';
		$queryStr = $queryStr . ', ' . 'STUDENTS';
		$queryStr = $queryStr . ', ' . 'EMPLOYEES';
	$queryStr = $queryStr . ' WHERE ';
		$queryStr = $queryStr . 'STUDENTS.STU_ID = STUDENT_ATTENDANCES.STU_ID AND ';
		$queryStr = $queryStr . 'EMPLOYEES.EMP_ID = STUDENT_ATTENDANCES.EMP_ID';
		$queryStr = $queryStr . ' ORDER BY ' . 'STU_NAME ASC, STUDENT_ATTENDANCES.DATE_TIME DESC';
	$queryStr = $queryStr . ';';
	
	//if debug on, display [queryStr]
	displayQueryStr($queryStr, $debug_on);

	//*** 2. execute quyery and get the results
	$result = getResult($queryStr);
	
	//populate [result] to table
	$fieldHeaderStr = array (
		0 => 'ID',
		1 => 'Student Name',
		2 => 'Event',
		3 => 'Date & Time',
		4 => 'Employee Name',
		5 => 'IP Address',
		);
	populateResultToTable($result, $fieldHeaderStr);

}//report_STUDENT_ATTENDANCES()



//**************** utility functions ***********************

function displayQueryStr($queryStr, $debug_on)
{	
	
	//always siliently record SQL query into the database for system operation tracking
	if (isset($_SESSION["LoggedIn_EMP_NAME"]))
	{
		insert_DB_QUERY_LOGS($_SESSION["LoggedIn_EMP_NAME"], $queryStr, true);
	}
	else
	{
		insert_DB_QUERY_LOGS("system", $queryStr, true);	
	}
	

	//testing
	/**
	if ($debug_on) {
			//display a confirmation message to the user
			echo '<script type="text/javascript">';
			//---------------- carefull with the mixed use of {"} and {'}
			//since inside queryStr {"} is used
    		echo "window.confirm('" . $queryStr . "');";
    		echo '</script>';
	}
	/**/

}//displayQueryStr()


// Function to get the client IP address
function get_client_ip() {
        
    $ipaddress = '';

    if (isset($_SERVER['HTTP_CLIENT_IP']) && ($_SERVER['HTTP_CLIENT_IP']))
        $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
    else if (isset($_SERVER['HTTP_X_FORWARDED_FOR']) && ($_SERVER['HTTP_X_FORWARDED_FOR']))
        $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
    else if (isset($_SERVER['HTTP_X_FORWARDED']) && ($_SERVER['HTTP_X_FORWARDED']))
        $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
    else if (isset($_SERVER['HTTP_FORWARDED_FOR']) && ($_SERVER['HTTP_FORWARDED_FOR']))
        $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
    else if (isset($_SERVER['HTTP_FORWARDED']) && ($_SERVER['HTTP_FORWARDED']))
        $ipaddress = $_SERVER['HTTP_FORWARDED'];
    else if (isset($_SERVER['REMOTE_ADDR']) && ($_SERVER['REMOTE_ADDR']))
        $ipaddress = $_SERVER['REMOTE_ADDR'];
    else
        $ipaddress = 'unknown';

    if ($ipaddress == '::1')
    {
    	$ipaddress = 'localhost/unknown';
    }
 
    return $ipaddress;
    
}//get_client_ip()

?>