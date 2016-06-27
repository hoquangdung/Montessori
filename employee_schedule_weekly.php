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
	//[date_selection] form
	
	//if [date_selection] form submitted	
	if (isset($_POST['from_date']))
	{
		//get the submitted date
		//and then get Monday of corresponding week
		$from_date = getMondayOfWeek($_POST['from_date']);	
	}
	//else: [date_selection] form is not submitted
	// but the [Update Weekly Schedule] form is submitted
	else if ((isset($_POST['update'])) && 
		($_POST['update'] == "Update Weekly Schedule"))
	{
		//parameter: [Monday_date] from the submitted form
		if (isset($_POST['Monday_date_str']))
		{
			$Monday_date_str = $_POST['Monday_date_str'];

			echo 'Monday_date_str: ' . $Monday_date_str;
			echo '<br/><br/>';

			$from_date = new DateTime($Monday_date_str);
		}
		else
		{
			echo 'Monday_date_str: ' . 'undefined' . '<br/>';
		}
	}
	//neither [date_selection] nor [Update Weekly Schedule] is submitted
	else
	{
		//get the date of today
		$today_date = new DateTime();			
		//then get the Monday of this week
		$from_date = getMondayOfWeek($today_date->format("Y-m-d"));
	}

	//make a copy of [from_date]
	//NOTES: parameter transferred to function maybe referenced and its value may be changed
	//so in order to avoid side-effects, copy before transfer it o function
	$Monday_date = new DateTime($from_date->format("Y-m-d"));

	echo '<br/>';
		
	//echo the form to the page with Monday of the current week
	//** Notes: web browser understands the date format then converts it to its own preference
	//Y-m-d (only this format is understood by web browser) => mm/dd/yyyy when displayed on web
	echo '<form action="employee_schedule_weekly.php" method="post">';
	echo '<label for="from_date">Start Monday </label><input type="date" id="from_date" name="from_date"' .
			'value="' . $from_date->format("Y-m-d") . '"><br/><br/>';		
	echo '<input type="submit" value="View/Update Schedule">';
	echo '</form>';

	echo '<br/>';

	////////////////////////////////////////////////////////////////////////////////////////////////////////////
	//[Update Weekly Schedule] form

	//if the [Update Weekly Schedule] form is submitted
	if ((isset($_POST['update'])) && 
		($_POST['update'] == "Update Weekly Schedule"))
	{
		echo '[Update Weekly Schedule] form submitted' . '<br/>';
		echo '<br/>';

		//check parameters from the form

		//parameter: [Monday_date] from the submitted form
		//was already already captured by the [date_selection] form

		//parameter: [all_employees_id] from the submitted form
		if (isset($_POST['all_employees_id']))
		{
			$all_employees_id = $_POST['all_employees_id'];

			echo 'all_employees_id: ';
			print_r($all_employees_id);
			echo '<br/><br/>';
		}
		else
		{
			echo 'all_employees_id: ' . 'undefined' . '<br/>';
		}

		//parameter: [start_time] from the submitted form
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

		//parameter: [end_time] from the submitted form
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

		//parameter: [pause_time] from the submitted form
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

		echo '<br/>';

		//populate [Update Weekly Schedule] form
		createWeeklyScheduleForm($Monday_date, true);
		 
	}

	//else: the [Update Weekly Schedule] form is not submitted
	else
	{		
		echo '[Update Weekly Schedule] form not submitted' . '<br/>'; 

		echo '_POST: '; 
		print_r($_POST);
		
		echo '<br/><br/>';

		//populate [Update Weekly Schedule] form
		createWeeklyScheduleForm($Monday_date, true);
	}

		
	////////////////////////////////////////////////////////////////////////////////////////////////////////////
	//graphically display detailed schedule of the selected week: Monday to Friday
	
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
	
	
}//if some user is currently logging in

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