<?php
// Start the session
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Key Pad Process</title>
</head>

<body>

<?php
	include 'header_log_in_out.php'
?>

<h2>List of Log-In's and Log-out's of Employee</h2>
<br/>

<?php

//if a valid user is logging-in
if (isset($_SESSION['LoggedIn_EMP_ID']))
{

	require_once("sql_queries.php");

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
		$queryStr = $queryStr . 'EMPLOYEE_LOG_IOS.EMP_ID=' .  $_SESSION['LoggedIn_EMP_ID'];
		$queryStr = $queryStr . ' AND ' . 'EMPLOYEE_LOG_IOS.EMP_ID=' . 'EMPLOYEES.EMP_ID';
		$queryStr = $queryStr . ' ORDER BY ' . 'EMPLOYEE_LOG_IOS.DATE_TIME';
	$queryStr = $queryStr . ';';
	
	//testing
	echo 'Executed query: ' . $queryStr;

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
	
}//if

//else: something is wrong with $_SESSION['LoggedIn_EMP_ID'])
else
{
	echo 'something is wrong with $_SESSION["LoggedIn_EMP_ID"])';
}

?>


<?php
	include 'footer.html'
?>

</body>

</html>