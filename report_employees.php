<?php
// Start the session
session_start();
?>

<!DOCTYPE html>

<html>

<head>
	<title>Report: Employees</title>	
	<link rel="stylesheet" type="text/css" href="db_tables.css">
</head>

<body>

<?php
	include 'header_log_in_out.php'
?>

<h2>List of Employees</h2>

<?php

//if a valid user is logging-in
if (isset($_SESSION['LoggedIn_EMP_ID']))
{

	//display 
	require_once("db_operations.php");
	report_EMPLOYEES(true);
	
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