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

	<script type="text/javascript">
	
	function PreviousWeek_from_date()
	{
		var paramElement = document.getElementById("from_date");
    	var currentDate = new Date(paramElement.value);  
    	document.write(paramElement.value);
    	document.write(' => ' + currentDate);
    	currentDate.setTime(currentDate.getTime() + 7 * 24 * 60 * 60 * 1000);
    	document.write(' => ' + currentDate);
    	paramElement.value = 
    			(currentDate.getMonth() + 1) + '/' +
    			currentDate.getDate() + '/' +    			
    			currentDate.getFullYear();
    	event.preventDefault();
	}
	</script>

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

	//it is importatnt to set the time zone
	//otherwise date and time is not correct
	//to be adjusted depending where the server is deployed
	date_default_timezone_set('America/Toronto');
	
	require_once("db_operations.php");
	require_once("schedule_utils.php");

	$one_day_time_span = 24 * 60 * 60;
	$one_week_time_span = 7 * $one_day_time_span;


	////////////////////////////////////////////////////////////////////////////////////////////////////////////
	//check forms and buttons
	//set/re-set all params accordingly	
	
	//if [date_selection] form is submitted
	if (isset($_POST["date_select_button"]))
	{
		echo '[date_selection] form is submitted <br/>';

		//if [from_date] field is submitted (must be)
		if (isset($_POST['from_date']))
		{					
			//get the submitted [from_date] field
			//and then get Monday of corresponding week
			$from_date = getMondayOfWeek($_POST['from_date']);	
		}

		//if [from_date_copy_to] field is submitted (must be)
		if (isset($_POST['from_date_copy_to']))
		{					
			//get the submitted [from_date_copy_to] field
			$from_date_copy_to = getMondayOfWeek($_POST['from_date_copy_to']);	
		}

		//set [Monday_date] and [Monday_date_str] accordingly
		//for later use in [$weekly_schedule_update] form
		$Monday_date = new DateTime($from_date->format("Y-m-d"));		
		$Monday_date_str = $Monday_date->format("Y-m-d");

		//which button was clicked?
		switch ($_POST["date_select_button"])
		{			
			//case 1: if [ViewUpdateSchedule] button clicked 
			case "ViewUpdateSchedule":

				echo '---- [View and Update Schedule] button clicked <br/>';

				break;

			//case 2: if [CopySchedule] button clicked
			case "CopySchedule":
				
				echo '---- [Copy Schedule] button clicked <br/>';
			
				//if both [from_date] and [from_date_copy_to] are defined (must be)
				if ((isset($from_date)) && (isset($from_date_copy_to)))
				{
					//copy the current weekly schedule to another week
					copyWeeklySchedule($from_date,
									   $from_date_copy_to,
									   $_SESSION['LoggedIn_EMP_ID'],
									   true);
				}

				break;
			
			//case 3: something else
			default:
				echo '---- [date_select_button] clicked but not known which specific button! <br/>';

		}//switch

	}//if	
	
	//else: [date_selection] form is not submitted
	//if [weekly_schedule_update] form is submitted
	else if (isset($_POST["schedule_update_button"]))
	{
		echo '[date_selection] form is NOT submitted <br/>';
		echo '[weekly_schedule_update] form is submitted <br/>';

		//which button was clicked?
		switch ($_POST["schedule_update_button"])
		{
			case "UpdateThisWeekSchedule":
				echo '---- [Update this Week Schedule] button clicked <br/>';

				//parameter: [Monday_date_str] from the submitted form
				//Notes: [Monday_date_str] input field of [weekly_schedule_update] form
				//was set by the [date_selection] form before
				if (isset($_POST['Monday_date_str']))
				{
					$Monday_date_str = $_POST['Monday_date_str'];
					$Monday_date = new DateTime($Monday_date_str);
				}

				//then use [Monday_date] to set back [from_date] and [from_date_copy_to]
				$from_date = new DateTime($Monday_date_str);
				//initialize [from_date_copy_to] to the Monday of next week
				$from_date_copy_to = getMondayOfWeek($from_date->format("Y-m-d"));
				$from_date_copy_to->add(new DateInterval('PT'. $one_week_time_span .'S'));

				break;

			case "ClearThisWeekSchedule":
				echo '---- [Clear this Week Schedule] button clicked <br/>';

				//parameter: [Monday_date_str] from the submitted form
				//Notes: [Monday_date_str] input field of [weekly_schedule_update] form
				//was set by the [date_selection] form before
				if (isset($_POST['Monday_date_str']))
				{
					$Monday_date_str = $_POST['Monday_date_str'];
					$Monday_date = new DateTime($Monday_date_str);
				}

				//then use [Monday_date] to set back [from_date] and [from_date_copy_to]
				$from_date = new DateTime($Monday_date_str);
				//initialize [from_date_copy_to] to the Monday of next week
				$from_date_copy_to = getMondayOfWeek($from_date->format("Y-m-d"));
				$from_date_copy_to->add(new DateInterval('PT'. $one_week_time_span .'S'));

				break;

			default:
				echo '---- [schedule_update_button] clicked but not known which specific button! <br/>';

		}//switch		

	}//else if
	
	//neither [date_selection] nor [weekly_schedule_update] form is submitted
	//i.e., this page is loaded for the first time or re-loaded
	else
	{
		echo '[date_selection] form is NOT submitted <br/>';
		echo '[weekly_schedule_update] form is NOT submitted <br/>';

		//simply initialize [from_date] and [from_date_copy_to] to default values

		//get the date of today
		$today_date = new DateTime();			
		
		//initialize [from_date] to the Monday of this week 
		$from_date = getMondayOfWeek($today_date->format("Y-m-d"));

		//initialize [from_date_copy_to] to the Monday of next week
		$from_date_copy_to = getMondayOfWeek($from_date->format("Y-m-d"));
		$from_date_copy_to->add(new DateInterval('PT'. $one_week_time_span .'S'));

		//prepare [Monday_date] and [Monday_date_str] string
		//for later use in [$weekly_schedule_update] form
		$Monday_date = new DateTime($from_date->format("Y-m-d"));
		$Monday_date_str = $Monday_date->format("Y-m-d");

	} 	

	//[$from_date] and [$from_date_copy_to] are always set
	//regardless if [date_selection] form was submitted or not
	
	//prepare [$from_date_str] and [$from_date_copy_to_str] strings
	//for later uses in [$from_date_str] form
	$from_date_str = $from_date->format("Y-m-d");
	$from_date_copy_to_str = $from_date_copy_to->format("Y-m-d");
	
	
	////////////////////////////////////////////////////////////////////////////////////////////////////////////
	//populate the [date_selection] form 

	echo '<div class="viewUpdate">';
		
	echo '<table style="border: none;">';

	echo '<form name="date_selection" action="employee_schedule_weekly.php" method="post">';

	echo '<tr style="border: none;">';

	//left panel
	echo '<td style="border: none; padding-right: 15px;">';				
		echo '<fieldset id="from_date_update">';
  		echo '<legend> Select the Week to View/Update </legend>';
  			echo '<table style="border: none;">';
  				echo '<tr style="border: none;">';
  					echo '<td style="border: none;">';
						echo '<label for="from_date">Starting Monday </label>';
					echo '</td>';
					echo '<td style="border: none;">';
						echo '<input type="date" id="from_date" name="from_date"' .
								'value="' . $from_date_str . '"> ';
					echo '</td>';	
					echo '<td style="border: none;">';
						echo '<button type="submit" onclick="PreviousWeek_from_date()" class="previous_next_date" name="date_select_button" ' .
								'value="PreviousWeek_from_date">< Prev</button>';
					echo '</td>'; 
					echo '<td style="border: none;">';
						echo '<button type="submit" class="previous_next_date" name="date_select_button" ' .
								'value="NextWeek_from_date">Next ></button>';
						echo '</td>';
				echo '<tr/>';
				echo '<tr style="border: none;">';
					echo '<td style="border: none;">';
					echo '</td>';
					echo '<td colspan="3" style="border: none; text-align: left;">';
						echo '<button type="submit" id="view_update" name="date_select_button" ' .
								'value="ViewUpdateSchedule">View and Update Schedule</button>';
					echo '</td>';
				echo '</tr>';
			echo '</table>';
		echo '</fieldset>';
	echo '</td>';

	//////////
	//left panel
	echo '<td style="border: none; padding-right: 15px;">';				
		echo '<fieldset id="from_date_copy">';
  		echo '<legend> Select the Week to Copy To </legend>';
  			echo '<table style="border: none;">';
  				echo '<tr style="border: none;">';
  					echo '<td style="border: none;">';
						echo '<label for="from_date_copy_to">Starting Monday </label>';
					echo '</td>';
					echo '<td style="border: none;">';
						echo '<input type="date" id="from_date_copy_to" name="from_date_copy_to"' .
								'value="' . $from_date_copy_to_str . '"> ';
					echo '</td>';	
					echo '<td style="border: none;">';
						echo '<button type="submit" onclick="PreviousWeek_from_date()" class="previous_next_date" name="date_select_button" ' .
								'value="PreviousWeek_from_date_copy_to">< Prev</button>';
					echo '</td>'; 
					echo '<td style="border: none;">';
						echo '<button type="submit" class="previous_next_date" name="date_select_button" ' .
								'value="NextWeek_from_date_copy_to">Next ></button>';
						echo '</td>';
				echo '<tr/>';
				echo '<tr style="border: none;">';
					echo '<td style="border: none;">';
					echo '</td>';
					echo '<td colspan="3" style="border: none; text-align: left;">';
						echo '<button type="submit" id="copy" name="date_select_button" ' .
								'value="CopySchedule">Copy Schedule</button>';
					echo '</td>';
				echo '</tr>';
			echo '</table>';
		echo '</fieldset>';
	echo '</td>';
	//////////

	/*
	//right panel
	echo '<td style="border: none; padding: 0px;">';
	echo '<fieldset id="from_date_copy">';
  	echo '<legend>  </legend>';
	echo '<label for="from_date_copy_to">Starting Monday </label>';
	echo '<input type="date" id="from_date_copy_to" name="from_date_copy_to"' .
			'value="' . $from_date_copy_to_str . '"> ';			
	echo '<button type="submit" id="copy" name="date_select_button" ' .
			'value="CopySchedule">Copy Schedule</button>';
	echo '</fieldset>';	
	echo '</td>';

	echo '</tr>';
	*/

	echo '</form>';

	echo '</table>';

	echo '</div>';


	echo '<div class="viewUpdate" style="background-color: rgb(255, 255, 204)">';
	
	
	////////////////////////////////////////////////////////////////////////////////////////////////////////////
	//update the schedule if [weekly_schedule_update] form is submitted
	//populate [weekly_schedule_update] form with the weekly schedule table

	//if [weekly_schedule_update] form is submitted
	//and [UpdateThisWeekSchedule] button is clicked
	//then:
	//   (1) get schedule details submitted by the form
	//   (2) update the schedule using submitted schedule details
	if ((isset($_POST['schedule_update_button'])) && 
		($_POST['schedule_update_button'] == "UpdateThisWeekSchedule"))
	{
		
		//parameter: [Monday_date] field from the submitted form
		//was read in previous section		
		//and [Monday_date] was also set accordingly in previous section

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
		 
	}
	//else: [UpdateThisWeekSchedule] button is not clicked
	//and [ClearThisWeekSchedule] is not clicked
	else if ((isset($_POST['schedule_update_button'])) && 
		($_POST['schedule_update_button'] == "ClearThisWeekSchedule"))
	{
		//delete all schedules (if there is any) on all 5 days of this week
		deleteScheduleDays($from_date_str,
						   5,
						   true);
	}


	//in any case: regardless of [weekly_schedule_update] form was submitted or not
	//Notes: [Monday_date] was either (i) set by the [date_selection] form precessing
	//or (ii) just submitted by [weekly_schedule_update] form
	//populate the weekly schedule to the [weekly_schedule_update] form
	createWeeklyScheduleForm($Monday_date, true);
	
	echo '</div>';
		
	
	////////////////////////////////////////////////////////////////////////////////////////////////////////////
	//graphically display detailed schedule of the selected week: Monday to Friday

	echo '<div class="viewUpdate">';
	
	$curr_date = new DateTime($Monday_date_str);

	//echo '<br/>';
	//echo '  # Start Monday: ' . $from_date->format("l, Y-m-d");
	
	//5 days: Monday to Friday	
	$date_num = 5;
	
	for ($i = 1; $i <= $date_num; $i++)
	{
		//echo ' **** Date: ' . $curr_date->format("l, Y-m-d") . '<br/>';
		createScheduleOfDay($curr_date, true);
		$curr_date->add(new DateInterval('PT' . $one_day_time_span . 'S'));
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