<?php
// Start the session
session_start();
?>

<!DOCTYPE html>

<html>

<head>
	<title>Weekly Schedules of Employees</title>		
	<link rel="stylesheet" type="text/css" href="schedule_view_table.css">
	<link rel="stylesheet" type="text/css" href="weekly_schedule_table.css">
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

	echo '<h2>Weekly Schedules of Employees</h2>';

	date_default_timezone_set('America/Toronto');

	//display 
	require_once("db_operations.php");
	require_once("schedule_utils.php");


	////////////////////////////////////////////////////////////////////////////////////////////////////////////

	
	//if form submitted	
	if (isset($_POST['from_date']))
	{
		//$from_date = new DateTime($_POST['from_date']);

		$from_date = getMondayOfWeek($_POST['from_date']);

		echo '<br/>';
		
		//echo the form to the page with Monday of the selected week
		echo '<form action="employee_schedule_weekly.php" method="post">';
		echo '<label for="from_date">Start Monday </label><input type="date" id="from_date" name="from_date"' .
				'value="' . $from_date->format("Y-m-d") . '"><br/><br/>';
		echo '<input type="submit" value="View/Update Schedule">';
		echo '</form>';
	}

	//else: form is not submitted
	else
	{
		//$from_date = new DateTime();

		$today_date = new DateTime();			

		$from_date = getMondayOfWeek($today_date->format("Y-m-d"));

		echo '<br/>';
		
		//echo the form to the page with Monday of the current week
		//** Notes: web browser understands the date format then converts it to its own preference
		//Y-m-d (only this format is understood by web browser) => mm/dd/yyyy when displayed on web
		echo '<form action="employee_schedule_weekly.php" method="post">';
		echo '<label for="from_date">Start Monday </label><input type="date" id="from_date" name="from_date"' .
				'value="' . $from_date->format("Y-m-d") . '"><br/><br/>';		
		echo '<input type="submit" value="View/Update Schedule">';
		echo '</form>';	
		
	}

	echo '<br/>';

	//if the [Update Weekly Schedule] form is submitted
	if ((isset($_POST['update'])) && 
		($_POST['update'] == "Update Weekly Schedule"))
	{
		echo '[Update Weekly Schedule] form submitted' . '<br/>';
		echo '<br/>';

		//check 4 parameters from the form

		//parameter 1: [start_time] from the submitted form
		if (isset($_POST['start_time']))
		{
			$start_time = $_POST['start_time'];

			echo 'start_time: ';
			print_r($start_time);
			echo '<br/><br/>';
		}
		else
		{
			echo 'start_time: ' . 'undefined' . '<br/>';
		}

		//parameter 2: [end_time] from the submitted form
		if (isset($_POST['end_time']))
		{
			$end_time = $_POST['end_time'];

			echo 'end_time: ';
			print_r($end_time);
			echo '<br/><br/>';
		}
		else
		{
			echo 'end_time: ' . 'undefined' . '<br/>';
		}

		//parameter 3: [pause_time] from the submitted form
		if (isset($_POST['pause_time']))
		{
			$pause_time = $_POST['pause_time'];

			echo 'pause_time: ';
			print_r($pause_time);
			echo '<br/><br/>';
		}
		else
		{
			echo 'pause_time: ' . 'undefined' . '<br/>';
		}

		//parameter 4: [total_hours] from the submitted form
		if (isset($_POST['total_hours']))
		{
			$total_hours = $_POST['total_hours'];

			echo 'total_hours: ';
			print_r($total_hours);
			echo '<br/><br/>';
		}
		else
		{
			echo 'total_hours: ' . 'undefined' . '<br/>';
		}

		

		echo '<br/>';

		//populate [Update Weekly Schedule] form
		createWeeklyScheduleForm(true);
		 
	}

	//else: the [Update Weekly Schedule] form is not submitted
	else
	{		
		echo '[Update Weekly Schedule] form not submitted' . '<br/>'; 

		echo '_POST: '; 
		print_r($_POST);
		
		echo '<br/><br/>';

		//populate [Update Weekly Schedule] form
		createWeeklyScheduleForm(true);
	}

		
	////////////////////////////////////////////////////////////////////////////////////////////////////////////

	
	$curr_date = new DateTime($from_date->format("Y-m-d"));

	echo '<br/>';
	echo '  # Start Monday: ' . $from_date->format("l, Y-m-d") . '<br/>';
	
	//5 days: Monday to Friday	
	$date_num = 5;
	$one_day_time_span = 24 * 60 * 60;
	for ($i = 1; $i <= $date_num; $i++)
	{
		//echo ' **** Date: ' . $curr_date->format("l, Y-m-d") . '<br/>';

		createScheduleOfDay($curr_date, true);
		$curr_date->add(new DateInterval('PT'.$one_day_time_span.'S'));
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