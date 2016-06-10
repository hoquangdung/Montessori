<?php

require_once("sql_queries.php");

function insert_EMPLOYEE_LOG_IOS($emp_id, $event_type)
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
	
	//testing
	echo 'Executed query: ' . $queryStr;

	//*** 2. execute quyery and get the results
	$result = getResult($queryStr);

	return ($result);

}//write_EMPLOYEE_LOG_IOS()


function insert_EMPLOYEE_ATTENDANCES($emp_id, $event_type, $notes)
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
	
	//testing
	echo 'Executed query: ' . $queryStr;

	//*** 2. execute quyery and get the results
	$result = getResult($queryStr);

	return ($result);

}//insert_EMPLOYEE_ATTENDANCES()



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




function insert_EMPLOYEE_LOG_FAILURES($keys)
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
	
	//testing
	echo 'Executed query: ' . $queryStr;

	//*** 2. execute quyery and get the results
	$result = getResult($queryStr);

	return ($result);

}//insert_EMPLOYEE_LOG_FAILURES()