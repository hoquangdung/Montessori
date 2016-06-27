<?php


require_once("sql_queries.php");

//get the Monday of the week containing [from_date_str] (in the string format)
//{Monday, Tuesday, ..., Sunday} => Monday
function getMondayOfWeek($from_date_str)
{	
	//get [from_date] DateTime from [from_date_str] String
	$from_date = new DateTime($from_date_str);

	//get the day of week String from [from_date]
	$day_of_week_str = $from_date->format("l");

	echo '------------ From date (day of week): ' . $day_of_week_str . '</br>';

	switch ($day_of_week_str)
	{
		case "Monday":
			$days_adjusted = 0;
			break;
		case "Tuesday":
			$days_adjusted = 1;
			break;
		case "Wednesday":
			$days_adjusted = 2;
			break;
		case "Thursday":
			$days_adjusted = 3;
			break;
		case "Friday":
			$days_adjusted = 4;
			break;
		case "Saturday":
			$days_adjusted = 5;
			break;
		case "Sunday":
			$days_adjusted = 6;
			break;
	}
	
	$time_span = $days_adjusted * 24 * 60 * 60;
	
	$Monday_date = new DateTime($from_date->format("Y-m-d"));

	echo '------------ From date: ' . $from_date->format("l, Y-m-d") . '</br>';

	$Monday_date->sub(new DateInterval('PT' . $time_span . 'S'));

	echo '------------ Monday date: ' . $Monday_date->format("l, Y-m-d") . '</br>';

	return ($Monday_date);

}//getMondayOfWeek()


//populate [Update Weekly Schedule] form
function createWeeklyScheduleForm($debug_on)
{
	echo '<form action="employee_schedule_weekly.php" method="post">';

	//populate schedule params for all employees
	createScheduleParams($debug_on);

	echo '<br/>';

	echo '<input type="submit" name="update" value="Update Weekly Schedule">';

	echo '</form>';

}//createWeeklyScheduleForm()


//populate schedule params for all employees
function createScheduleParams($debug_on)
{

	//get the detailed list of time slots
	$queryStr = 'SELECT TS_ID, LPAD(START_TIME_HOUR,2,"0"), LPAD(START_TIME_MIN,2,"0") ' .
				'FROM TIME_SLOTS ORDER BY START_TIME_HOUR, START_TIME_MIN;';
	//if debug on, display [queryStr]
	displayQueryStr($queryStr, $debug_on);
	//execute query and get the results
	$timeSlots = getResult($queryStr);
	//the number of rows in [timeSlots]
	$timeSlotsNum = mysqli_num_rows($timeSlots);

	$employeesNum = 10;

	$week_days = array("MONDAY", "TUESDAY", "WEDNESDAY", "THURSDAY", "FRIDAY");

	echo '<table class="scheduleView" style="border-collapse: collapse;">';

	//print day of week header
	echo '<tr>';
	echo '<th style="border: none; background-color: white"></th>';
	//for each day of week
	for ($day_of_week = 0; $day_of_week < 5; $day_of_week++)
	{
		if ($day_of_week % 2 == 0)
		{
			echo '<th colspan="4" style="border: 1px solid gray; '.
			          'background-color: rgb(230, 255, 230); text-align: center; font-weight: bold;">' . 
			           $week_days[$day_of_week] .
			     '</th>';
		}
		else
		{
			echo '<th colspan="4" style="border: 1px solid gray; '.
			          'background-color: white; text-align: center; font-weight: bold;">' . 
			           $week_days[$day_of_week] .
			     '</th>';
		}
		
	}	
	echo '</tr>';

	//print scheddule parameter header
	echo '<tr>';
	/*
	echo '<td style="border: 1px solid gray; ' .
						'background-color: rgb(255, 204, 153); text-align: left; font-weight: bold;">' .
						"Employee Name" . '</td>';
	*/
	echo '<td style="border: none; background-color: white"></td>';
	//for each day of week
	for ($day_of_week = 0; $day_of_week < 5; $day_of_week++)
	{
		if ($day_of_week % 2 == 0)
		{
			echo '<td style="border: 1px solid gray; ' .
						'background-color: rgb(230, 255, 230); text-align: center; font-weight: bold;">Start</td>';
			echo '<td style="border: 1px solid gray; ' .
						'background-color: rgb(230, 255, 230); text-align: center; font-weight: bold;">End</td>';
			echo '<td style="border: 1px solid gray; ' .
						'background-color: rgb(230, 255, 230); text-align: center; font-weight: bold;">Pause</td>';
			echo '<td style="border: 1px solid gray; ' .
						'background-color: rgb(230, 255, 230); color: gray; text-align: center; font-weight: bold;">Hours</td>';
		}
		else
		{
			echo '<td style="border: 1px solid gray; ' .
						'background-color: white; text-align: center; font-weight: bold;">Start</td>';
			echo '<td style="border: 1px solid gray; ' .
						'background-color: white; text-align: center; font-weight: bold;">End</td>';
			echo '<td style="border: 1px solid gray; ' .
						'background-color: white; text-align: center; font-weight: bold;">Pause</td>';
			echo '<td style="border: 1px solid gray; ' .
						'background-color: white; color: gray; text-align: center; font-weight: bold;">Hours</td>';
		}			
	}	
	echo '</tr>';

		
	for ($emp = 0; $emp < $employeesNum; $emp++)
	{
		//scheddule parameters for this employee
		echo '<tr>';
		$emp_NAME = "Employee Name";
		if ($emp % 2 == 0)
		{
			echo '<td style="border: 1px solid gray; ' .
						'background-color: rgb(255, 204, 153); text-align: left; font-weight: normal;">' .
						$emp_NAME . '</td>';
		}
		else
		{
			echo '<td style="border: 1px solid gray; ' .
						'background-color: white; text-align: left; font-weight: normal;">' .
						$emp_NAME . '</td>';
		}
		//for each day of week
		for ($day_of_week = 0; $day_of_week < 5; $day_of_week++)
		{
			
			//column 1: start time
			createScheduleTimeThisEmployee($timeSlots, $timeSlotsNum, $day_of_week, "start_time", 9);
			mysqli_data_seek($timeSlots, 0);

			//column 2: end time
			createScheduleTimeThisEmployee($timeSlots, $timeSlotsNum, $day_of_week, "end_time", 41);
			mysqli_data_seek($timeSlots, 0);
			
			//column 3: pause time
			createPauseTimeThisEmployee($day_of_week);
			
			//column 3: total hours
			createHoursThisEmployee($day_of_week);

						
		}//for($day_of_week)

		echo '</tr>';
			
	}//for($emp)

	echo '</table>';

}//createScheduleParams()


function createScheduleTimeThisEmployee($timeSlots, $timeSlotsNum, $day_of_week, $paramStr, $pre_selected_TS_ID)
{	
	if ($day_of_week % 2 == 0)
	{
		echo '<td style="border: 1px solid gray; ' .
			        'background-color: rgb(230, 255, 230); text-align: center;">';
		echo '<select name="' . $paramStr . '[' . $day_of_week . '][]" ' .
					'style="background: rgb(230, 255, 230)">';          
	}
	else
	{
		echo '<td style="border: 1px solid gray; ' .
			        'background-color: white; text-align: center;">';
		echo '<select name="' . $paramStr . '[' . $day_of_week . '][]" ' .
					'style="background: white">'; 
	}

	//a special item to mark that this param is not yet intitialized
	$currentTimeSlot_TS_ID = -1;	
	if ($currentTimeSlot_TS_ID == $pre_selected_TS_ID)
	{						
		echo '<option value='. $currentTimeSlot_TS_ID . ' selected>' . 
				'X' .
			 '</option>';
	}
	else
	{
		echo '<option value='. $currentTimeSlot_TS_ID . '>' . 
				'X' .
			 '</option>';
	}
	//end special item
		
	for ($slot = 1; $slot <= $timeSlotsNum; $slot++)
	{
		$currentTimeSlot = mysqli_fetch_row($timeSlots);

		$currentTimeSlot_TS_ID = $currentTimeSlot[0];	
		$currentTimeSlot_START_TIME_HOUR = $currentTimeSlot[1];	
		$currentTimeSlot_START_TIME_MIN = $currentTimeSlot[2];

		if ($currentTimeSlot_TS_ID == $pre_selected_TS_ID)
		{						
			echo '<option value='. $currentTimeSlot_TS_ID . ' selected>' . 
					$currentTimeSlot_START_TIME_HOUR . 
					':' . 
					$currentTimeSlot_START_TIME_MIN .
			 	 '</option>';
		}
		else
		{
			echo '<option value='. $currentTimeSlot_TS_ID . '>' . 
					$currentTimeSlot_START_TIME_HOUR . 
					':' . 
					$currentTimeSlot_START_TIME_MIN .
			 	 '</option>';
		}

	}//for($slot)
	echo '</select>';
	echo '</td>';

}//createScheduleTimeThisEmployee()


function createPauseTimeThisEmployee($day_of_week)
{	
	if ($day_of_week % 2 == 0)
	{
		echo '<td style="border: 1px solid gray; ' .
			        'background-color: rgb(230, 255, 230); text-align: center;">';
		echo '<select name="pause_time[' . $day_of_week . '][]" ' .
					'style="background: rgb(230, 255, 230)">';          
	}
	else
	{
		echo '<td style="border: 1px solid gray; ' .
			        'background-color: white; text-align: center;">';
		echo '<select name="pause_time[' . $day_of_week . '][]" ' .
					'style="background: white">'; 
	}
	
	//a special item to mark that this param is not yet intitialized
	echo '<option value=-1>X</option>';
	//end special item
	echo '<option value=0>00:00</option>';
	echo '<option value=1 selected>00:30</option>';
	echo '<option value=2>01:00</option>';
	echo '<option value=3>01:30</option>';
	echo '<option value=4>02:00</option>';
	echo '<option value=5>02:30</option>';
	echo '<option value=6>03:00</option>';
	echo '<option value=7>03:30</option>';
	echo '<option value=8>04:00</option>';
	echo '</select>';
	echo '</td>';

}//createPauseTimeThisEmployee()


function createHoursThisEmployee($day_of_week)
{	
	if ($day_of_week % 2 == 0)
	{
		echo '<td style="border: 1px solid gray; ' .
			        'background-color: rgb(230, 255, 230); text-align: center;">';		
		echo '<label name="total_hours[' . $day_of_week . '][]" ' .
					'style="background: rgb(230, 255, 230); color: gray; width: 50px;">----</label>';          
	}
	else
	{
		echo '<td style="border: 1px solid gray; ' .
			        'background-color: white; text-align: center;">';
		echo '<label name="total_hours[' . $day_of_week . '][]" ' .
					'style="background: white; color: gray; width: 50px;">----</label>'; 
	}
	
	echo '</td>';

}//createPauseTimeThisEmployee()



?>