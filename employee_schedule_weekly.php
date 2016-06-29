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
	<link rel="stylesheet" type="text/css" href="weekly_schedule_layout.css">
	<link rel="stylesheet" type="text/css" href="common.css">
</head>

<body>

<?php
	include 'header_log_in_out.php';
?>

<div class="main">

<?php

//if a valid user is logging-in
if (isset($_SESSION['LoggedIn_EMP_ID']))
{

	echo '<b>WEEKLY SCHEDULES OF EMPLOYEES</b>';
	echo '<br/>';

	date_default_timezone_set('America/Toronto');

	//display 
	require_once("db_operations.php");
	require_once("schedule_utils.php");

	////////////////////////////////////////////////////////////////////////////////////////////////////////////
	//check buttons and forms

	if (isset($_POST["date_select_button"]))
	{
		switch ($_POST["date_select_button"])
		{
			case "View and Update Schedule":
				echo '[View and Update Schedule] button clicked';
				break;
			case "Copy Schedule":
				echo '[Copy Schedule] button clicked';
				break;
			default:
				echo '[date_select_button] clicked but not known which specific button!';
		}//switch				
	}
	else
	{
		echo '[date_select_button] not clicked ...';
	}
	echo '<br/>';

	if (isset($_POST["schedule_update_button"]))
	{
		switch ($_POST["schedule_update_button"])
		{
			case "Update this Week Schedule":
				echo '[Update this Week Schedule] button clicked';
				break;
			default:
				echo '[schedule_update_button] clicked but not known which specific button!';
		}//switch		
	}
	else
	{
		echo '[schedule_update_button] not clicked ...';
	}
	echo '<br/>';


	////////////////////////////////////////////////////////////////////////////////////////////////////////////
	//[date_selection] form

	echo '<div class="viewUpdate">';
	
	//case 1: if [date_selection] form submitted	
	if (isset($_POST['from_date']))
	{
		//echo '[date_selection] form submitted' . '<br/>';

		//get the submitted date
		//and then get Monday of corresponding week
		$from_date = getMondayOfWeek($_POST['from_date']);	
	}
	//case 2: [date_selection] form is not submitted
	// but the [weekly_schedule_update] form is submitted
	else if ((isset($_POST['schedule_update_button'])) && 
		($_POST['schedule_update_button'] == "Update this Week Schedule"))
	{
		//echo '[date_selection] form not submitted' . '<br/>';

		//parameter: [Monday_date] from the submitted form
		if (isset($_POST['Monday_date_str']))
		{
			$Monday_date_str = $_POST['Monday_date_str'];
			//echo 'Monday_date_str: ' . $Monday_date_str;
			//echo '<br/><br/>';
			$from_date = new DateTime($Monday_date_str);
		}
		else
		{
			echo 'Monday_date_str: ' . 'undefined' . '<br/>';
		}
	}
	//case 3: neither [date_selection] nor [Update this Week Schedule] is submitted
	else
	{
		//echo '[date_selection] form not submitted' . '<br/>';

		//get the date of today
		$today_date = new DateTime();			
		//then get the Monday of this week
		$from_date = getMondayOfWeek($today_date->format("Y-m-d"));
	}

	//make a copy of [from_date]
	//NOTES: parameter transferred to function maybe referenced and its value may be changed
	//so in order to avoid side-effects, copy before transfer it o function
	$Monday_date = new DateTime($from_date->format("Y-m-d"));

	$one_week_time_span = 7 * 24 * 60 * 60;
	$from_date_copy_to = new DateTime($from_date->format("Y-m-d"));
	$from_date_copy_to->add(new DateInterval('PT'. $one_week_time_span .'S'));

	//echo '<br/>';
		
	//echo the form to the page with Monday of the current week
	//** Notes: web browser understands the date format then converts it to its own preference
	//Y-m-d (only this format is understood by web browser) => mm/dd/yyyy when displayed on web

	echo '<table style="border: none;">';

	echo '<form name="date_selection" action="employee_schedule_weekly.php" method="post">';

	echo '<tr style="border: none;">';

	echo '<td style="border: none; padding-right: 15px;">';			
	echo '<fieldset id="from_date_update">';
  	echo '<legend> Select the Week to View/Update </legend>';
	echo '<label for="from_date">Starting Monday </label>';
	echo '<input type="date" id="from_date" name="from_date"' .
			'value="' . $from_date->format("Y-m-d") . '"> ';			
	echo '<button type="submit" id="view_update" name="date_select_button" ' .
			'value="View and Update Schedule">View and Update Schedule</button>';
	echo '</fieldset>';
	echo '</td>';

	echo '<td style="border: none; padding: 0px;">';
	echo '<fieldset id="from_date_copy">';
  	echo '<legend> Select the Week to Copy To </legend>';
	echo '<label for="from_date_copy_to">Starting Monday </label>';
	echo '<input type="date" id="from_date_copy_to" name="from_date_copy_to"' .
			'value="' . $from_date_copy_to->format("Y-m-d") . '"> ';			
	echo '<button type="submit" id="copy" name="date_select_button" ' .
			'value="Copy Schedule">Copy Schedule</button>';
	echo '</fieldset>';	
	echo '</td>';

	echo '</tr>';

	echo '</form>';

	echo '</table>';

	echo '</div>';


	echo '<div class="viewUpdate" style="background-color: rgb(255, 255, 204)">';
	
	////////////////////////////////////////////////////////////////////////////////////////////////////////////
	//[Update this Week Schedule] form

	//if the [Update this Week Schedule] form is submitted
	if ((isset($_POST['schedule_update_button'])) && 
		($_POST['schedule_update_button'] == "Update this Week Schedule"))
	{
		//echo '[weekly_schedule_update] form submitted' . '<br/>';
		//echo '<br/>';

		//check parameters from the form

		//parameter: [Monday_date] from the submitted form
		//was already already captured by the [date_selection] form

		//parameter: [all_employees_id] from the submitted form
		if (isset($_POST['all_employees_id']))
		{
			$all_employees_id = $_POST['all_employees_id'];			
		}
		else
		{
			echo 'all_employees_id: ' . 'undefined' . '<br/>';
		}

		//parameter: [start_time] from the submitted form
		if (isset($_POST['start_time']))
		{
			$start_time = $_POST['start_time'];			
		}
		else
		{
			echo 'start_time: ' . 'undefined' . '<br/>';
		}

		//parameter: [end_time] from the submitted form
		if (isset($_POST['end_time']))
		{
			$end_time = $_POST['end_time'];			
		}
		else
		{
			echo 'end_time: ' . 'undefined' . '<br/>';
		}

		//parameter: [pause_time] from the submitted form
		if (isset($_POST['pause_time']))
		{
			$pause_time = $_POST['pause_time'];			
		}
		else
		{
			echo 'pause_time: ' . 'undefined' . '<br/>';
		}		

		//echo '<br/>';

		//update weekly schedule from the submitted to DB
		updateWeeklySchedule($Monday_date,
							 $all_employees_id,
							 $start_time,
							 $end_time,
							 $pause_time,
							 $_SESSION['LoggedIn_EMP_ID'],
							 true
							 );

		//populate [Update this Week Schedule] form
		createWeeklyScheduleForm($Monday_date, true);
		 
	}

	//else: the [Update this Week Schedule] form is not submitted
	else
	{		
		//echo '[weekly_schedule_update] form not submitted' . '<br/>'; 

		//echo '_POST: '; 
		//print_r($_POST);
		//echo '<br/>';
		
		//echo '<br/>';

		//populate [Update this Week Schedule] form
		createWeeklyScheduleForm($Monday_date, true);
	}

	echo '</div>';
		
	
	////////////////////////////////////////////////////////////////////////////////////////////////////////////
	//graphically display detailed schedule of the selected week: Monday to Friday

	echo '<div class="viewUpdate">';
	
	$curr_date = new DateTime($from_date->format("Y-m-d"));

	//echo '<br/>';
	//echo '  # Start Monday: ' . $from_date->format("l, Y-m-d");
	
	//5 days: Monday to Friday	
	$date_num = 5;
	$one_day_time_span = 24 * 60 * 60;
	for ($i = 1; $i <= $date_num; $i++)
	{
		//echo ' **** Date: ' . $curr_date->format("l, Y-m-d") . '<br/>';
		createScheduleOfDay($curr_date, true);
		$curr_date->add(new DateInterval('PT'.$one_day_time_span.'S'));
	}

	echo '</div>';
	
	
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