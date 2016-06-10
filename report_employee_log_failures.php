<?php
// Start the session
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Report: </title>
	<link rel="stylesheet" type="text/css" href="db_tables.css">
</head>

<body>

<?php
	include 'header_log_in_out.php'
?>

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


<?php
	include 'footer.html'
?>

</body>

</html>