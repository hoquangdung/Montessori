<?php
// Start the session
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Report: Attendance In's and Out's of Students</title>
	<link rel="stylesheet" type="text/css" href="db_tables.css">
	<link rel="stylesheet" type="text/css" href="common.css">	
</head>

<body>

<?php
	include 'header_log_in_out.php'
?>

<div id="main">

<?php

//if a valid user is logging-in
if (isset($_SESSION['LoggedIn_EMP_ID']))
{

	echo "<h2>List of Attendance In's and Out's of Students</h2>";

	//display 
	require_once("db_operations.php");
	report_STUDENT_ATTENDANCES(true);
	
}//if

//else: something is wrong with $_SESSION['LoggedIn_EMP_ID'])
else
{
	echo 'Something is wrong with $_SESSION["LoggedIn_EMP_ID"])';
}

?>

</div>


<?php
	include 'footer.php'
?>

</body>

</html>