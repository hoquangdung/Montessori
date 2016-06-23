<?php
// Start the session
session_start();
?>

<!DOCTYPE html>

<html>

<head>
	<title>Report: Schedules of Employees</title>		
	<link rel="stylesheet" type="text/css" href="schedule_table.css">
	<link rel="stylesheet" type="text/css" href="common.css">
</head>

<body>

<?php
	include 'header_log_in_out.php';
?>

<div id="main">

<?php

//if a valid user is logging-in
if (isset($_SESSION['LoggedIn_EMP_ID']))
{

	echo '<h2>Schedules of Employees</h2>';

	//display 
	require_once("db_operations.php");

	
	////////////////////////////////////////////////////////////////////////////////////////////////////////////

	//yesterday
	$sch_date_time = time()  - 24 * 60 * 60;
	
	createScheduleOfDay($sch_date_time, true);

	createScheduleOfDay($sch_date_time, true);

	createScheduleOfDay($sch_date_time, true);

	createScheduleOfDay($sch_date_time, true);
	
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