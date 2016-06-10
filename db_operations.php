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
		5 => 'Address',
		6 => 'City',
		7 => 'Province',
		8 => 'Postal Code',
		9 => 'Country',
		10 => 'Phone 1',
		11 => 'Phone 2',
		12 => 'Email',
		13 => 'Hire Date',
		14 => 'End Date',
		15 => 'Education',
		16 => 'Daycare Years',
		17 => 'Montessori Years',
		18 => 'Position 1',
		19 => 'Position 2',
		20 => 'Boss',
		21 => 'Hourly Rate ',
		22 => 'Passcode',
		23 => 'Notes',
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
		5 => 'Start Date', 
		6 => 'Grad date',
		7 => 'Daily Fee',
		8 => 'Credential',
		9 => 'Notes',
		);
	populateResultToTable($result, $fieldHeaderStr);

}//report_STUDENTS()


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
		$queryStr = $queryStr . ' ORDER BY ' . 'DATE_TIME DESC';	
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
	/**/
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
 
    return $ipaddress;
    
}//get_client_ip()