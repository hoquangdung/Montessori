<?php
// Start the session
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Report: </title>
	<link rel="stylesheet" type="text/css" href="db_tables.css">
	<link rel="stylesheet" type="text/css" href="common.css">
</head>

<body>

<?php
	include 'header_log_in_out.php';
?>

<div id="main">

<h2>List of Employee Log Failures</h2>

<?php

//if a valid user is logging-in
if (isset($_SESSION['LoggedIn_EMP_ID']))
{

	//display log-ios of employee
	require_once("db_operations.php");
	report_EMPLOYEE_LOG_FAILURES(true);

}//if

//else: something is wrong with $_SESSION['LoggedIn_EMP_ID'])
else
{
	echo 'Something is wrong with $_SESSION["LoggedIn_EMP_ID"])';
}

?>

</div>

<?php
	include 'footer.php';
?>

</body>

</html>