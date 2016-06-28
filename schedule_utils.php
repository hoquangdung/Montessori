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

	//echo '------------ From date (day of week): ' . $day_of_week_str . '</br>';

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

	//echo '------------ From date: ' . $from_date->format("l, Y-m-d") . '</br>';

	$Monday_date->sub(new DateInterval('PT' . $time_span . 'S'));

	//echo '------------ Monday date: ' . $Monday_date->format("l, Y-m-d") . '</br>';

	return ($Monday_date);

}//getMondayOfWeek()


//populate [Update Weekly Schedule] form
function createWeeklyScheduleForm($Monday_date, $debug_on)
{
	
	echo '<b>Schedule of the Week: ' . $Monday_date->format("l, d M Y") . '</b><br/><br/>';

	echo '<form action="employee_schedule_weekly.php" method="post">';

	//create [Monday_date] hidden form param for later DB queris
	//when schedule form is submitted

	echo '<input type="hidden" name="Monday_date_str" value="' . $Monday_date->format("Y-m-d") . '">';

	//populate schedule params for all employees
	createWeeklyScheduleTable($Monday_date, $debug_on);

	echo '<br/>';

	echo '<input type="submit" name="update" value="Update Weekly Schedule">';

	echo '</form>';

}//createWeeklyScheduleForm()


//populate schedule params for all employees
function createWeeklyScheduleTable($Monday_date, $debug_on)
{

	////////////////////////////////////////////////////////////////////////////////////////////////////////
	//get data from DB

	//get the detailed list of time slots
	$queryStr = 'SELECT TS_ID, LPAD(START_TIME_HOUR,2,"0"), LPAD(START_TIME_MIN,2,"0") ' .
				'FROM TIME_SLOTS ORDER BY START_TIME_HOUR, START_TIME_MIN;';
	//if debug on, display [queryStr]
	displayQueryStr($queryStr, $debug_on);
	//execute query and get the results
	$timeSlots = getResult($queryStr);
	//the number of rows in [timeSlots]
	$timeSlotsNum = mysqli_num_rows($timeSlots);


	//get the list of all employees
	$queryStr = 'SELECT EMP_ID, CONCAT(EMP_FIRST_NAME, " ", EMP_LAST_NAME) AS EMP_NAME '. 
				'FROM EMPLOYEES WHERE EMP_POST_ID1 IN (1, 2, 3, 4, 5, 6) ORDER BY EMP_ID;';
	//if debug on, display [queryStr]
	displayQueryStr($queryStr, $debug_on);
	//execute query and get the results
	$allEmployees = getResult($queryStr);
	//the number of rows in [employees]
	$allEmployeesNum = mysqli_num_rows($allEmployees);


	////////////////////////////////////////////////////////////////////////////////////////////////////////
	//populate the weekly schedule table for all employees

	echo '<table class="weeklySchedule" style="border-collapse: collapse;">';

	//print day of week header
	printDaysOfWeekHeader($Monday_date);
	
	//print schedule parameters header
	printScheduleParamsHeader();
	
	$one_day_time_span = 24 * 60 * 60;

	//for each emoployee
	for ($emp = 0; $emp < $allEmployeesNum; $emp++)
	{
		//get the current employee id and name
		$currentEmployee = mysqli_fetch_row($allEmployees);
		$currentEmployee_EMP_ID = $currentEmployee[0];
		$currentEmployee_EMP_NAME = $currentEmployee[1];
		
		//print data of the current employee
		echo '<tr>';

		//print the name of the current employee
		printNameThisEmployee($emp, $currentEmployee_EMP_ID, $currentEmployee_EMP_NAME);

		$curr_date = new DateTime($Monday_date->format("Y-m-d"));			
		
		//for each day of week: print 4 columns
		for ($day_of_week = 0; $day_of_week < 5; $day_of_week++)
		{
			
			//get the schedule of this employees on this day (if there is any)
			$queryStr = 'SELECT TS_ID_BEGIN, TS_ID_END, TS_PAUSE_UNITS, UPDATED_ON_DATE_TIME ' .
						'FROM EMPLOYEE_SCHEDULE ' .
						'WHERE (EMP_ID = ' . $currentEmployee_EMP_ID . ') AND ' .
						'(SCH_DATE = "' .  $curr_date->format("Y-m-d") . '");';
			//if debug on, display [queryStr]
			displayQueryStr($queryStr, $debug_on);
			//execute query and get the results
			$schedules = getResult($queryStr);
			//the number of rows in [employees]
			$schedulesNum = mysqli_num_rows($schedules);

			//if schdule of this employee on this day does not exists
			if ($schedulesNum == 0)
			{
				$pre_selected_start_TS_ID	= -1;
				$pre_selected_end_TS_ID		= -1;
				$pre_selected_pause_time	= -1;
				$calculated_hours_15m_units	= -1;
			}
			else if ($schedulesNum == 1)
			{
				$currentSchedule = mysqli_fetch_row($schedules);
				$pre_selected_start_TS_ID	= $currentSchedule[0];
				$pre_selected_end_TS_ID		= $currentSchedule[1] + 1;
				$pre_selected_pause_time	= $currentSchedule[2];
				$calculated_hours_15m_units	= ($pre_selected_end_TS_ID - $pre_selected_start_TS_ID);

			}
			else 
			{
				echo 'Some errors with schedule! <br/>';
			}

			//column 1: start time
			createScheduleTimeThisEmployee($timeSlots,
										   $timeSlotsNum,
										   $emp,
										   $day_of_week,
										   "start_time",
										   $pre_selected_start_TS_ID);
			mysqli_data_seek($timeSlots, 0);

			//column 2: end time
			createScheduleTimeThisEmployee($timeSlots,
										   $timeSlotsNum,
										   $emp,
										   $day_of_week,
										   "end_time",
										   $pre_selected_end_TS_ID);
			mysqli_data_seek($timeSlots, 0);
			
			//column 3: pause time
			createPauseTimeThisEmployee($emp, $day_of_week,
										$pre_selected_pause_time);
			
			//column 3: total hours
			createHoursThisEmployee($emp, $day_of_week,
									$pre_selected_pause_time,
									$calculated_hours_15m_units);

			//*** now, move to the next day
			$curr_date->add(new DateInterval('PT'.$one_day_time_span.'S'));

						
		}//for($day_of_week)

		echo '</tr>';
			
	}//for($emp)

	echo '</table>';

}//createWeeklyScheduleTable()


//print day of week header
function printDaysOfWeekHeader($Monday_date)
{
	////////////////////////////////////
	//5 days: Monday to Friday
	$week_days = array("MONDAY",
					   "TUESDAY",
					   "WEDNESDAY",
					   "THURSDAY",
					   "FRIDAY");
	//get a copy of [Monday_date]
	$curr_date = new DateTime($Monday_date->format("Y-m-d"));			
	$date_num = 5;
	$one_day_time_span = 24 * 60 * 60;
	for ($i = 0; $i < $date_num; $i++)
	{		
		$week_days[$i] = $week_days[$i] . '<br/>' . $curr_date->format("d M Y");
		$curr_date->add(new DateInterval('PT'.$one_day_time_span.'S'));
	}

	//////////////////////

	echo '<tr>';
	//an empty row (employees name rows to follow)
	echo '<th style="border-left: 1px solid white; border-top: 1px solid white; background-color: white;"></th>';
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

}//printDaysOfWeekHeader()


//print schedule parameters header
function printScheduleParamsHeader()
{
	echo '<tr>';
	//an empty row (employees name rows to follow)
	echo '<td style="border: 1px solid gray; background-color: white; ; font-weight: bold;">Employee</td>';
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

}//printScheduleParamsHeader()


//print the name of the current employee
function printNameThisEmployee($emp, $emp_id, $emp_name)
{			
	//maintain the employee id list for later table operations when the form is submitted
	//for adding new schedules or updating existing schedules 
	echo '<input type="hidden" name="all_employees_id[]" value="' . $emp_id . '">';

	if ($emp % 2 == 0)
	{
		echo '<td style="border: 1px solid gray; ' .
					'background-color: rgb(255, 204, 153); text-align: left; font-weight: normal;">' .
					$emp_name . '</td>';
	}
	else
	{
		echo '<td style="border: 1px solid gray; ' .
					'background-color: white; text-align: left; font-weight: normal;">' .
					$emp_name . '</td>';
	}

}//printNameThisEmployee()


function createScheduleTimeThisEmployee($timeSlots,
										$timeSlotsNum,
										$emp,
										$day_of_week,
										$paramStr,
										$pre_selected_TS_ID)
{	
	if ($day_of_week % 2 == 0)
	{
		echo '<td style="border: 1px solid gray; ' .
			        'background-color: rgb(230, 255, 230); text-align: center;">';
		echo '<select name="' . $paramStr . '[' . $emp . '][]" ' .
					'style="background: rgb(230, 255, 230)">';          
	}
	else
	{
		echo '<td style="border: 1px solid gray; ' .
			        'background-color: white; text-align: center;">';
		echo '<select name="' . $paramStr . '[' . $emp . '][]" ' .
					'style="background: white">'; 
	}

	//a special item to mark that this param is not yet intitialized
	$currentTimeSlot_TS_ID = -1;	
	if ($currentTimeSlot_TS_ID == $pre_selected_TS_ID)
	{						
		echo '<option value='. $currentTimeSlot_TS_ID . ' selected>' . 
				'x' .
			 '</option>';
	}
	else
	{
		echo '<option value='. $currentTimeSlot_TS_ID . '>' . 
				'x' .
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


function createPauseTimeThisEmployee($emp, $day_of_week, $pre_selected_pause_time)
{	
	if ($day_of_week % 2 == 0)
	{
		echo '<td style="border: 1px solid gray; ' .
			        'background-color: rgb(230, 255, 230); text-align: center;">';
		echo '<select name="pause_time[' . $emp . '][]" ' .
					'style="background: rgb(230, 255, 230)">';          
	}
	else
	{
		echo '<td style="border: 1px solid gray; ' .
			        'background-color: white; text-align: center;">';
		echo '<select name="pause_time[' . $emp . '][]" ' .
					'style="background: white">'; 
	}
	
	$pauses = array("00:00", "00:30", "01:00", "01:30",
				 	"02:00", "02:30", "03:00", "03:30", "04:00");

	//a special item to mark that this param is not yet intitialized
	if ($pre_selected_pause_time == -1)
	{
		echo '<option value=-1 selected>x</option>';
	}
	else
	{
		echo '<option value=-1>X</option>';
	}
	//end special item
	for ($i = 0; $i < 9; $i++)
	{
		if ($i == $pre_selected_pause_time)
		{
			echo '<option value=' . $i . ' selected>' . $pauses[$i] . '</option>';
		}
		else
		{
			echo '<option value=' . $i . '>' . $pauses[$i] . '</option>';
		}

	}//for
	echo '</select>';
	echo '</td>';

}//createPauseTimeThisEmployee()


function createHoursThisEmployee($emp, $day_of_week,
								 $pre_selected_pause_time,
								 $calculated_hours_15m_units)
{	
	if ($pre_selected_pause_time == -1)
	{
		$calculated_hours_mins_str = "-----";
	}
	else
	{
		$total_min = $calculated_hours_15m_units * 15 - 
	 					$pre_selected_pause_time * 30;
		$calculated_hours_mins_str = str_pad(floor($total_min/60), 2, "0", STR_PAD_LEFT) . ':' . 
						str_pad(($total_min - 60 * floor($total_min/60)), 2, "0", STR_PAD_LEFT); 
	}

	if ($day_of_week % 2 == 0)
	{
		echo '<td style="border: 1px solid gray; ' .
			        'background-color: rgb(230, 255, 230); text-align: center;">';		
		echo '<label name="total_hours[' . $emp . '][]" ' .
					'style="background: rgb(230, 255, 230); color: gray; width: 50px;">' . 
					$calculated_hours_mins_str . '</label>';          
	}
	else
	{
		echo '<td style="border: 1px solid gray; ' .
			        'background-color: white; text-align: center;">';
		echo '<label name="total_hours[' . $emp . '][]" ' .
					'style="background: white; color: gray; width: 50px;">' . 
					$calculated_hours_mins_str . '</label>'; 
	}
	
	echo '</td>';

}//createPauseTimeThisEmployee()


//detailed schedule of a given day for all employees
function createScheduleOfDay($sch_date_time, $debug_on)
{	
	
	echo '<br/><br/>';

	echo '<table class="scheduleView">';

	//print table caption dislaying the schedule date
	$sch_date = $sch_date_time->format("Y-m-d");
	$sch_date_displayed = $sch_date_time->format("l, d M Y");
	echo '<tr>';
	echo '<td colspan="53" style="text-align: left;">' . '<b>Date: ' . $sch_date_displayed . '</b>' . '</td>';
	echo '</tr>';

	//get the list of employess having schedules on the given date
	$queryStr = 'SELECT EMP_ID, CONCAT(EMP_FIRST_NAME, " ", EMP_LAST_NAME) AS EMP_NAME '. 
				'FROM EMPLOYEES WHERE EMP_ID IN (SELECT DISTINCT EMP_ID FROM EMPLOYEE_SCHEDULE ' .
				'WHERE (SCH_DATE = "' . $sch_date . '") ORDER BY EMP_ID)';
	$queryStr = $queryStr . ';';
	//if debug on, display [queryStr]
	displayQueryStr($queryStr, $debug_on);
	//execute query and get the results
	$employees = getResult($queryStr);
	//the number of rows in [employees]
	$employeesNum = mysqli_num_rows($employees);

	//if no employee having having schedules on the given date
	if ($employeesNum == 0)
	{
		echo '<tr>';
		echo '<td colspan="53" style="text-align: left;">' . 'No schedule exists!' . '</td>';
		echo '</tr>';

		//remember to terminate the table before existing
		echo '</table>';

		//terminate the function here!
		return;
	}

	//else: exists employee(s) having having schedules on the given date


	//print emloyee name column header
	echo '<tr>';
	echo '<td><b>Names</b></td>';


	//print time slot header

	//get the detailed list of time slots
	$queryStr = 'SELECT LPAD(START_TIME_HOUR,2,"0"), LPAD(START_TIME_MIN,2,"0") ' .
				'FROM TIME_SLOTS ORDER BY START_TIME_HOUR, START_TIME_MIN;';
	//if debug on, display [queryStr]
	displayQueryStr($queryStr, $debug_on);
	//execute query and get the results
	$timeSlots = getResult($queryStr);
	//the number of rows in [timeSlots]
	$timeSlotsNum = mysqli_num_rows($timeSlots);

	for ($j = 1; $j <= $timeSlotsNum; $j = $j + 1)
	{
		$currentTimeSlot = mysqli_fetch_row($timeSlots);

		$currentTimeSlot_START_TIME_MIN = $currentTimeSlot[1];
		if (($currentTimeSlot_START_TIME_MIN == '00') || ($currentTimeSlot_START_TIME_MIN == '30'))
		//if ($currentTimeSlot_START_TIME_MIN == '00')
		{
			$currentTimeSlot_START_TIME_HOUR = $currentTimeSlot[0];		
			echo '<th>' . $currentTimeSlot_START_TIME_HOUR . '<br/>' . $currentTimeSlot_START_TIME_MIN . '</th>';
		}
		else
		{
			echo '<th>' . '' . '</th>';	
		}

	}
	
	echo '</tr>';

	//print schedule for each employee

	for ($j = 1; $j <= $timeSlotsNum; $j = $j + 1)
	{
			$employeesNumInTimeSlot[$j]=0;
	}

	for ($i = 0; $i < $employeesNum; $i++)
	{
		//the current row in [employees]
		$currentEmployee = mysqli_fetch_row($employees);

		$currentEmployee_EMP_ID = $currentEmployee[0];
		$currentEmployee_EMP_NAME = $currentEmployee[1];

		echo '<tr>';

		echo '<td style="padding-right:5px;">' .  $currentEmployee_EMP_NAME . '</td>';
		
		//get schedule time slot segments of current employee
		$queryStr = 'SELECT TS_ID_BEGIN, TS_ID_END FROM EMPLOYEE_SCHEDULE WHERE ' .
					'(EMP_ID = ' . $currentEmployee_EMP_ID . ') AND (SCH_DATE = "' . $sch_date . '")  ORDER BY TS_ID_BEGIN ASC'; 
		$queryStr = $queryStr . ';';
		//if debug on, display [queryStr]
		displayQueryStr($queryStr, $debug_on);
		//execute query and get the results
		$scheduledTimeSlotSegments = getResult($queryStr);

		//the number of segments in [scheduledTimeSlotSegments]
		$scheduledTimeSlotSegmentsNum = mysqli_num_rows($scheduledTimeSlotSegments);
		
		if ($scheduledTimeSlotSegmentsNum >= 1)
		{
			//the current segment in [scheduledTimeSlotSegments]
			$currentscheduledTimeSlotSegment = mysqli_fetch_row($scheduledTimeSlotSegments);
			$currentscheduledTimeSlotSegment_TS_ID_BEGIN = $currentscheduledTimeSlotSegment[0];
			$currentscheduledTimeSlotSegment_TS_ID_END = $currentscheduledTimeSlotSegment[1];
		}
		else
		{
			$currentscheduledTimeSlotSegment_TS_ID_BEGIN = $timeSlotsNum + 1;
			$currentscheduledTimeSlotSegment_TS_ID_END = $timeSlotsNum + 1;	
		}
		//index of the next segment 
		$k = 1;
		for ($j = 1; $j <= $timeSlotsNum; $j = $j + 1)
		{
			//if this employee does not work in this time slot
			if ($j < $currentscheduledTimeSlotSegment_TS_ID_BEGIN)
			{
				echo '<td><a href=""><img src="images/icons/time_slot_out.png" height=40" width="20"></a></td>';				
			}
			//else if this employee works in this time slot
			else if ($j <= $currentscheduledTimeSlotSegment_TS_ID_END)
			{
				echo '<td><a href=""><img src="images/icons/time_slot_in.png" height=40" width="20"></a></td>';	
				$employeesNumInTimeSlot[$j] = $employeesNumInTimeSlot[$j] + 1;
			}
			//else: move to the next scheduled time slot segment to check
			else if ($k < $scheduledTimeSlotSegmentsNum)
			{
				//the current segment in [scheduledTimeSlotSegments]
				$currentscheduledTimeSlotSegment = mysqli_fetch_row($scheduledTimeSlotSegments);
				$currentscheduledTimeSlotSegment_TS_ID_BEGIN = $currentscheduledTimeSlotSegment[0];
				$currentscheduledTimeSlotSegment_TS_ID_END = $currentscheduledTimeSlotSegment[1];
				$k = $k + 1;
				$j = $j - 1;
			}
			else
			{
				$currentscheduledTimeSlotSegment_TS_ID_BEGIN = $timeSlotsNum + 1;
				$currentscheduledTimeSlotSegment_TS_ID_END = $timeSlotsNum + 1;		
				$j = $j - 1;
			}

		}//for(j)

		echo '</tr>';

	}//for(i)


	//re-print time slot header
	echo '<tr>';
	echo '<td></td>';
	//*** set the pointer back to the beginning ***
	mysqli_data_seek($timeSlots, 0);
	for ($j = 1; $j <= $timeSlotsNum; $j = $j + 1)
	{
		$currentTimeSlot = mysqli_fetch_row($timeSlots);

		$currentTimeSlot_START_TIME_MIN = $currentTimeSlot[1];
		if (($currentTimeSlot_START_TIME_MIN == '00') || ($currentTimeSlot_START_TIME_MIN == '30'))
		//if ($currentTimeSlot_START_TIME_MIN == '00')
		{
			$currentTimeSlot_START_TIME_HOUR = $currentTimeSlot[0];		
			echo '<th>' . $currentTimeSlot_START_TIME_HOUR . '<br/>' . $currentTimeSlot_START_TIME_MIN . '</th>';
		}
		else
		{
			echo '<th>' . '' . '</th>';	
		}

	}	
	echo '</tr>';

	//print total number of employess working in time slots
	echo '<tr>';
	echo '<td style="text-align: center;"> Total: </td>';
	$j = 1;
	while ($j <= $timeSlotsNum)
	{	
		$k = 1;
		while (($j + $k <= $timeSlotsNum) && 
			   ($employeesNumInTimeSlot[$j] == $employeesNumInTimeSlot[$j + $k]))
		{
			$k = $k + 1;
		}
		echo '<td colspan="' . $k . '" style="background-color: gray; text-align: center;">' . 
													$employeesNumInTimeSlot[$j] . '</td>';

		$j = $j + $k;	
	}
	echo '</tr>';


	echo '</table>';

}//createScheduleOfDay()


//update weekly schedule from the submitted to DB
function updateWeeklySchedule($Monday_date,
	 						  $all_employees_id,
	 						  $start_time,
	 						  $end_time,
	 						  $pause_time,
	 						  $updated_by_emp_id,
	 						  $debug_on	 						  
							 )
{
	/**
	//debug

	echo '** updateWeeklySchedule() <br/><br/>';

	echo 'Monday_date: ' . $Monday_date->format("l, d M Y") . '<br/><br/>';
	echo 'all_employees_id: ';
	print_r($all_employees_id);
	echo '<br/><br/>';
	
	echo 'start_time: ';
	print_r($start_time);
	echo '<br/><br/>';
	
	echo 'end_time: ';
	print_r($end_time);
	echo '<br/><br/>';
	
	echo 'pause_time: ';
	print_r($pause_time);
	echo '<br/><br/>';
	/**/

	$now_date_time = new DateTime();

	$day_of_week_num = 5;
	$one_day_time_span = 24 * 60 * 60;

	$total_updates = 0;

	//for each employee in the list
	$emp = 0;
	foreach ($all_employees_id as $employees_id)
	{
		//for each of 5 days of the week
		$curr_date = new DateTime($Monday_date->format("Y-m-d"));			
		for ($day_of_week = 0; $day_of_week < $day_of_week_num; $day_of_week++)
		{
			/**
			//debug
			echo $employees_id . ', ' . 
			$start_time[$emp][$day_of_week] . ', ' . 
			($end_time[$emp][$day_of_week] - 1) . ', ' .
			$pause_time[$emp][$day_of_week] . ', ' .
			$curr_date->format("Y-m-d") . ', ' . 
			$updated_by_emp_id .  ', ' .
			$now_date_time->format("Y-m-d H:i:s") .  ', ' .
			get_client_ip() . '<br/>';
			/**/

			/*
			//1. delete existing schedule of the current employee on the current date (if there is any) 
			$queryStr = 'DELETE FROM EMPLOYEE_SCHEDULE WHERE (EMP_ID = '. $employees_id . ') AND ' .
							'( SCH_DATE = "' . $curr_date->format("Y-m-d") . '");';
			//if debug on, display [queryStr]
			displayQueryStr($queryStr, $debug_on);
			//execute query and get the results
			$results = getResult($queryStr);
			*/

			//2. update/insert existing (if there is any)/new schedule of the current employee on the current date
			/* 
			$queryStr = 'INSERT INTO EMPLOYEE_SCHEDULE (EMP_ID, TS_ID_BEGIN, TS_ID_END, TS_PAUSE_UNITS, SCH_DATE, ' . 
							'UPDATED_BY_EMP_ID, UPDATED_ON_DATE_TIME, UPDATED_AT_IP_ADDR) VALUES ' .
							'(' . $employees_id . ', ' . 
							$start_time[$emp][$day_of_week] . ', ' .
							($end_time[$emp][$day_of_week] - 1) . ', ' .
							$pause_time [$emp][$day_of_week] . ', ' .
							'"' . $curr_date->format("Y-m-d") . '"' . ', ' .
							$updated_by_emp_id . ', ' .
							'NOW()' . ', ' . 
							'"' . get_client_ip() . '"' .
							');';
			*/

			//if valid data
			if (($start_time[$emp][$day_of_week] >= 1) &&  
				($end_time[$emp][$day_of_week] >= 1) &&
				($pause_time[$emp][$day_of_week] >= 0) &&
				($end_time[$emp][$day_of_week] > $start_time[$emp][$day_of_week]) &&
				(($end_time[$emp][$day_of_week] - $start_time[$emp][$day_of_week]) * 15 - 
					$pause_time[$emp][$day_of_week] * 30 > 0))
			{

				$queryStr = 'INSERT INTO EMPLOYEE_SCHEDULE ' .
								'(EMP_ID, TS_ID_BEGIN, TS_ID_END, TS_PAUSE_UNITS, SCH_DATE, ' . 
								'UPDATED_BY_EMP_ID, UPDATED_ON_DATE_TIME, UPDATED_AT_IP_ADDR) ' .
							'VALUES ' .
								'(' . $employees_id . ', ' . 
								$start_time[$emp][$day_of_week] . ', ' .
								($end_time[$emp][$day_of_week] - 1) . ', ' .
								$pause_time[$emp][$day_of_week] . ', ' .
								'"' . $curr_date->format("Y-m-d") . '"' . ', ' .
								$updated_by_emp_id . ', ' .
								'NOW()' . ', ' . 
								'"' . get_client_ip() . '"' .
								') ' . 
							'ON DUPLICATE KEY UPDATE ' .
								'TS_ID_BEGIN = VALUES(TS_ID_BEGIN), ' .
								'TS_ID_END = VALUES(TS_ID_END), ' .
								'TS_PAUSE_UNITS = VALUES(TS_PAUSE_UNITS), ' .
								'UPDATED_BY_EMP_ID = VALUES(UPDATED_BY_EMP_ID), ' .
								'UPDATED_ON_DATE_TIME = VALUES(UPDATED_ON_DATE_TIME), '.
								'UPDATED_AT_IP_ADDR = VALUES(UPDATED_AT_IP_ADDR);';


				//if debug on, display [queryStr]
				displayQueryStr($queryStr, $debug_on);
				//execute query and get the results
				$results = getResult($queryStr);

				$total_updates++;
			
			}//if valid data
			
			//** move to the next day
			$curr_date->add(new DateInterval('PT'.$one_day_time_span.'S'));
		
		}//for each of 5 days of the week

		//echo '<br/>';

		//move the next employee
		$emp++;

	}//for each employee

	echo '** TOTAL: ' . $total_updates . ' update(s) **<br/>';

}//updateWeeklySchedule()



?>