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

	echo <<< END

	<form action="report_employee_schedule.php" method="post">

	<label for="from_date">From Date </label><input type="date" id="from_date" name="from_date"><br/><br/>

	<label for="to_date">To Date </label><input type="date" id="to_date" name="to_date"><br/><br/>

	<input type="submit" value="Submit Schedule">

	</form>

END;


	if ((isset($_POST['from_date'])) && (isset($_POST['to_date'])))
	{
		$from_date = new DateTime($_POST['from_date']);
		$to_date = new DateTime($_POST['to_date']);

		echo '<br/>Submitted Variables:<br/>';
		echo '  - From Date: ' . $from_date->format("Y-m-d") . '<br/>';
		echo '  - To Date: ' . $to_date->format("Y-m-d") . '<br/>';

		$timespan = 24 * 60 * 60;
		$curr_date = $from_date;

		while ($curr_date <= $to_date)
		{
			echo '  + Date: ' . $curr_date->format("l, Y-m-d") . '<br/>';
			$curr_date->add(new DateInterval('PT'.$timespan.'S'));
		}
		

	}
	else
	{
		echo '<br/>No Variables Submitted!<br/>';
	}

	

	
	////////////////////////////////////////////////////////////////////////////////////////////////////////////

	//today
	$sch_date_time_today = time();
	//yesterday
	$sch_date_time_yesterday = $sch_date_time_today  - 24 * 60 * 60;

	//tomorrow
	$sch_date_time_tomorrow = $sch_date_time_today  + 24 * 60 * 60;
	
	createScheduleOfDay($sch_date_time_yesterday, true);

	createScheduleOfDay($sch_date_time_today, true);

	createScheduleOfDay($sch_date_time_tomorrow, true);
	
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