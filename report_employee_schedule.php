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

	date_default_timezone_set('America/Toronto');

	//display 
	require_once("db_operations.php");

	////////////////////////////////////////////////////////////////////////////////////////////////////////////

	
	

	if ((isset($_POST['from_date'])) && (isset($_POST['to_date'])))
	{
		$from_date = new DateTime($_POST['from_date']);
		$to_date = new DateTime($_POST['to_date']);

		//echo the form to the page
		echo '<form action="report_employee_schedule.php" method="post">';
		echo '<label for="from_date">From Date </label><input type="date" id="from_date" name="from_date"' .
				'value="' . $_POST['from_date'] . '"><br/><br/>';
		echo '<label for="to_date">To Date </label><input type="date" id="to_date" name="to_date"' . 
				'value="' . $_POST['to_date'] . '"><br/><br/>';
		echo '<input type="submit" value="Submit Schedule">';
		echo '</form>';
	}
	else
	{
		$from_date = new DateTime();
		$to_date = new DateTime();

		//echo the form to the page
		//** Notes: web browser understands the date format then converts it to its own preference
		//Y-m-d (only this format is understood by web browser) => mm/dd/yyyy when displayed on web
		echo '<form action="report_employee_schedule.php" method="post">';
		echo '<label for="from_date">From Date </label><input type="date" id="from_date" name="from_date"' .
				'value="' . $from_date->format("Y-m-d") . '"><br/><br/>';
		echo '<label for="to_date">To Date </label><input type="date" id="to_date" name="to_date"' . 
				'value="' . $to_date->format("Y-m-d") . '"><br/><br/>';
		echo '<input type="submit" value="Submit Schedule">';
		echo '</form>';	
		
	}

		
	////////////////////////////////////////////////////////////////////////////////////////////////////////////

	$timespan = 24 * 60 * 60;
	$curr_date = new DateTime($from_date->format("Y-m-d"));

	/**
	echo '  # From Date: ' . $from_date->format("Y-m-d") . '<br/>';
	echo '  # To Date: ' . $to_date->format("Y-m-d") . '<br/>';
	/**/

	while ($curr_date <= $to_date)
	{
		//echo ' **** Date: ' . $curr_date->format("l, Y-m-d") . '<br/>';

		createScheduleOfDay($curr_date, true);
		$curr_date->add(new DateInterval('PT'.$timespan.'S'));
	}
	
	
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