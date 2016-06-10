<?php

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
function insert_DB_QUERY_LOGS($queryStrToDisplay)
{
	
	//** 1. build the query
	//---------------- carefull with the mixed use of {"} and {'}
	//since inside queryStr {"} is used
	$queryStr = "INSERT INTO ";
		$queryStr = $queryStr . "DB_QUERY_LOGS(";
		$queryStr = $queryStr . "QUERY_STR";
		$queryStr = $queryStr . ", " . "DATE_TIME";
		$queryStr = $queryStr . ", " . "IP_ADDR";
		$queryStr = $queryStr . ")";
	$queryStr = $queryStr . " VALUES(";
		$queryStr = $queryStr . "'" . $queryStrToDisplay .  "'";
		$queryStr = $queryStr . ", " . "NOW()";
		$queryStr = $queryStr . ", " . "'" . get_client_ip() .  "'";		
		$queryStr = $queryStr . ")";
	$queryStr = $queryStr . ";";	
		
	//*** 2. execute quyery and get the results
	$result = getResult($queryStr);

	return ($result);

}//insert_DB_QUERY_LOGS()


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
	insert_DB_QUERY_LOGS($queryStr, true);

	if ($debug_on) {
			//display a confirmation message to the user
			echo '<script type="text/javascript">';
			//---------------- carefull with the mixed use of {"} and {'}
			//since inside queryStr {"} is used
    		echo "window.confirm('" . $queryStr . "');";
    		echo '</script>';
	}

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