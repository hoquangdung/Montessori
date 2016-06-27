<?php

// Start the session
if (!isset($_SESSION))
{
	session_start();
}

require_once("sql_queries.php");


function insert_EMPLOYEE_LOG_IOS($emp_id, $event_type, $debug_on)
{
	
	//** 1. build the query
	$queryStr = 'INSERT INTO ';
		$queryStr = $queryStr . 'EMPLOYEE_LOG_IOS(';
		$queryStr = $queryStr . 'EMP_ID';
		$queryStr = $queryStr . ', ' . 'EVENT_TYPE';
		$queryStr = $queryStr . ', ' . 'DATE_TIME';
		$queryStr = $queryStr . ', ' . 'IP_ADDR';
		$queryStr = $queryStr . ')';
	$queryStr = $queryStr . ' VALUES(';
		$queryStr = $queryStr . $emp_id;
		$queryStr = $queryStr . ', ' .  '"' . $event_type .  '"';
		$queryStr = $queryStr . ', ' . 'NOW()';
		$queryStr = $queryStr . ', ' . '"' . get_client_ip() .  '"';
		$queryStr = $queryStr . ')';
	$queryStr = $queryStr . ';';
	
	//if debug on, display [queryStr]
	displayQueryStr($queryStr, $debug_on);	

	//*** 2. execute quyery and get the results
	$result = getResult($queryStr);

	return ($result);

}//insert_EMPLOYEE_LOG_IOS()


function insert_EMPLOYEE_ATTENDANCES($emp_id, $event_type, $notes, $debug_on)
{
	
	//** 1. build the query
	$queryStr = 'INSERT INTO ';
		$queryStr = $queryStr . 'EMPLOYEE_ATTENDANCES(';
		$queryStr = $queryStr . 'EMP_ID';
		$queryStr = $queryStr . ', ' . 'EVENT_TYPE';		
		$queryStr = $queryStr . ', ' . 'DATE_TIME';
		$queryStr = $queryStr . ', ' . 'IP_ADDR';
		$queryStr = $queryStr . ', ' . 'NOTES';
		$queryStr = $queryStr . ')';
	$queryStr = $queryStr . ' VALUES(';
		$queryStr = $queryStr . $emp_id;
		$queryStr = $queryStr . ', ' . '"' . $event_type .  '"';
		$queryStr = $queryStr . ', ' . 'NOW()';
		$queryStr = $queryStr . ', ' . '"' . get_client_ip() .  '"';
		$queryStr = $queryStr . ', ' . '"' . $notes .  '"';
		$queryStr = $queryStr . ')';
	$queryStr = $queryStr . ';';
	
	//if debug on, display [queryStr]
	displayQueryStr($queryStr, $debug_on);

	//*** 2. execute quyery and get the results
	$result = getResult($queryStr);

	return ($result);

}//insert_EMPLOYEE_ATTENDANCES()


function insert_STUDENT_ATTENDANCES($stu_id, $event_type, $emp_id, $notes, $debug_on)
{
	
	//** 1. build the query
	$queryStr = 'INSERT INTO ';
		$queryStr = $queryStr . 'STUDENT_ATTENDANCES(';
		$queryStr = $queryStr . 'STU_ID';
		$queryStr = $queryStr . ', ' . 'EVENT_TYPE';		
		$queryStr = $queryStr . ', ' . 'DATE_TIME';
		$queryStr = $queryStr . ', ' . 'EMP_ID';
		$queryStr = $queryStr . ', ' . 'IP_ADDR';
		$queryStr = $queryStr . ', ' . 'NOTES';
		$queryStr = $queryStr . ')';
	$queryStr = $queryStr . ' VALUES(';
		$queryStr = $queryStr . $stu_id;
		$queryStr = $queryStr . ', ' . '"' . $event_type .  '"';
		$queryStr = $queryStr . ', ' . 'NOW()';
		$queryStr = $queryStr . ', ' . $emp_id;
		$queryStr = $queryStr . ', ' . '"' . get_client_ip() .  '"';
		$queryStr = $queryStr . ', ' . '"' . $notes .  '"';
		$queryStr = $queryStr . ')';
	$queryStr = $queryStr . ';';
	
	//if debug on, display [queryStr]
	displayQueryStr($queryStr, $debug_on);

	//*** 2. execute quyery and get the results
	$result = getResult($queryStr);

	return ($result);

}//insert_STUDENT_ATTENDANCES()


function insert_EMPLOYEE_LOG_FAILURES($keys, $debug_on)
{
	
	//** 1. build the query
	$queryStr = 'INSERT INTO ';
		$queryStr = $queryStr . 'EMPLOYEE_LOG_FAILURES(';
		$queryStr = $queryStr . 'IP_ADDR';
		$queryStr = $queryStr . ', ' . 'PASSCODE';
		$queryStr = $queryStr . ', ' . 'DATE_TIME';
		$queryStr = $queryStr . ')';
	$queryStr = $queryStr . ' VALUES(';
		$queryStr = $queryStr . '"' . get_client_ip() .  '"';
		$queryStr = $queryStr . ', ' .  '"' . $keys .  '"';
		$queryStr = $queryStr . ', ' . 'NOW()';
		$queryStr = $queryStr . ')';
	$queryStr = $queryStr . ';';
		
	//if debug on, display [queryStr]
	displayQueryStr($queryStr, $debug_on);

	//*** 2. execute quyery and get the results
	$result = getResult($queryStr);

	return ($result);

}//insert_EMPLOYEE_LOG_FAILURES()


//siliently record SQL query into the database
function insert_DB_QUERY_LOGS($user_name, $queryStrToDisplay)
{
	
	//** 1. build the query
	//---------------- carefull with the mixed use of {"} and {'}
	//since inside queryStr {"} is used
	$queryStr = "INSERT INTO ";
		$queryStr = $queryStr . "DB_QUERY_LOGS(";
		$queryStr = $queryStr . "QUERY_STR";
		$queryStr = $queryStr . ", " . "USER_NAME";
		$queryStr = $queryStr . ", " . "DATE_TIME";
		$queryStr = $queryStr . ", " . "IP_ADDR";
		$queryStr = $queryStr . ")";
	$queryStr = $queryStr . " VALUES(";
		$queryStr = $queryStr . "'" . $queryStrToDisplay .  "'";
		$queryStr = $queryStr . ", " . "'" . $user_name . "'";
		$queryStr = $queryStr . ", " . "NOW()";
		$queryStr = $queryStr . ", " . "'" . get_client_ip() .  "'";		
		$queryStr = $queryStr . ")";
	$queryStr = $queryStr . ";";	
		
	//*** 2. execute quyery and get the results
	$result = getResult($queryStr);

	return ($result);

}//insert_DB_QUERY_LOGS()


function createScheduleOfDay($sch_date_time, $debug_on)
{	
	
	echo '<br/><br/>';

	echo '<table class="scheduleView">';

	//print table caption dislaying the schedule date
	$sch_date = $sch_date_time->format("Y-m-d");
	$sch_date_displayed = $sch_date_time->format("l, d M y");
	echo '<tr>';
	echo '<td colspan="53" style="text-align: left;">' . '<b>Date: ' . $sch_date_displayed . '</b>' . '</td>';
	echo '</tr>';

	//get the list of employess having schedules on the given date
	$queryStr = 'SELECT EMP_ID, CONCAT(EMPLOYEES.EMP_FIRST_NAME, " ", EMPLOYEES.EMP_LAST_NAME) AS EMP_NAME '. 
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


//******************************************************
//SELECT

function report_ACTIVITY_TYPES($debug_on)
{
	
	//** 1. build the query
	$queryStr = 'SELECT  ';
		$queryStr = $queryStr . '*';
	$queryStr = $queryStr . ' FROM ';
		$queryStr = $queryStr . 'ACTIVITY_TYPES';
	$queryStr = $queryStr . ' ORDER BY ';
		$queryStr = $queryStr . 'ACT_TYPE_ID' . ' ASC';	
	$queryStr = $queryStr . ';';	

	//if debug on, display [queryStr]
	displayQueryStr($queryStr, $debug_on);
	
	//*** 2. execute quyery and get the results
	$result = getResult($queryStr);
	
	//populate [result] to table
	$fieldHeaderStr = array (
		0 => 'ID',
		1 => 'Name',
		2 => 'Descriptions',
		3 => 'Notes',
		);
	populateResultToTable($result, $fieldHeaderStr);

}//report_ACTIVITY_TYPES()


function report_ACTIVITY_SUBTYPES($debug_on)
{
	
	//** 1. build the query
	$queryStr = 'SELECT  ';
		$queryStr = $queryStr . '*';
	$queryStr = $queryStr . ' FROM ';
		$queryStr = $queryStr . 'ACTIVITY_SUBTYPES';
	$queryStr = $queryStr . ' ORDER BY ';
		 $queryStr = $queryStr . 'ACT_SUBTYPE_ID' . ' ASC';	
	$queryStr = $queryStr . ';';	

	//if debug on, display [queryStr]
	displayQueryStr($queryStr, $debug_on);
	
	//*** 2. execute quyery and get the results
	$result = getResult($queryStr);
	
	//populate [result] to table
	$fieldHeaderStr = array (
		0 => 'ID',
		1 => 'Name',
		2 => 'Descriptions',
		3 => 'Notes',
		);
	populateResultToTable($result, $fieldHeaderStr);

}//report_ACTIVITY_SUBTYPES()


function report_EDUCATIONS($debug_on)
{
	
	//** 1. build the query
	$queryStr = 'SELECT  ';
		$queryStr = $queryStr . '*';
	$queryStr = $queryStr . ' FROM ';
		$queryStr = $queryStr . 'EDUCATIONS';
	$queryStr = $queryStr . ' ORDER BY ';
		 $queryStr = $queryStr . 'EDU_ID' . ' ASC';	
	$queryStr = $queryStr . ';';	

	//if debug on, display [queryStr]
	displayQueryStr($queryStr, $debug_on);
	
	//*** 2. execute quyery and get the results
	$result = getResult($queryStr);
	
	//populate [result] to table
	$fieldHeaderStr = array (
		0 => 'ID',
		1 => 'Degree',
		);
	populateResultToTable($result, $fieldHeaderStr);

}//report_EDUCATIONS()


function report_POSITIONS($debug_on)
{
	
	//** 1. build the query
	$queryStr = 'SELECT  ';
		$queryStr = $queryStr . '*';
	$queryStr = $queryStr . ' FROM ';
		$queryStr = $queryStr . 'POSITIONS';
	$queryStr = $queryStr . ' ORDER BY ';
		 $queryStr = $queryStr . 'POS_ID' . ' ASC';	
	$queryStr = $queryStr . ';';	

	//if debug on, display [queryStr]
	displayQueryStr($queryStr, $debug_on);
	
	//*** 2. execute quyery and get the results
	$result = getResult($queryStr);
	
	//populate [result] to table
	$fieldHeaderStr = array (
		0 => 'ID',
		1 => 'Name',
		2 => 'Descriptions',
		3 => 'Notes',
		);
	populateResultToTable($result, $fieldHeaderStr);

}//report_POSITIONS()


function report_ACTIVITIES($debug_on)
{
	
	//** 1. build the query
	$queryStr = 'SELECT  ';
		$queryStr = $queryStr . '*';
	$queryStr = $queryStr . ' FROM ';
		$queryStr = $queryStr . 'ACTIVITIES';
	$queryStr = $queryStr . ' ORDER BY ';
		$queryStr = $queryStr . 'ACT_TYPE_ID' . ' ASC ';
		$queryStr = $queryStr . ', ' . 'ACT_SUBTYPE_ID' . ' ASC';		
	$queryStr = $queryStr . ';';	

	//if debug on, display [queryStr]
	displayQueryStr($queryStr, $debug_on);
	
	//*** 2. execute quyery and get the results
	$result = getResult($queryStr);
	
	//populate [result] to table
	$fieldHeaderStr = array (
		0 => 'ID',
		1 => 'Type ID',
		2 => 'Sub-Type ID',
		3 => 'Name',
		4 => 'Min Age',
		5 => 'Max Age',
		6 => 'Descriptions',
		7 => 'Notes',
		);
	populateResultToTable($result, $fieldHeaderStr);

}//report_ACTIVITES()


function report_EMPLOYEES($debug_on)
{
	
	//** 1. build the query
	$queryStr = 'SELECT  ';
		$queryStr = $queryStr . '*';
	$queryStr = $queryStr . ' FROM ';
		$queryStr = $queryStr . 'EMPLOYEES';
		$queryStr = $queryStr . ' ORDER BY ' . 'EMP_FIRST_NAME' .  ' ASC';	
	$queryStr = $queryStr . ';';	

	//if debug on, display [queryStr]
	displayQueryStr($queryStr, $debug_on);
	
	//*** 2. execute quyery and get the results
	$result = getResult($queryStr);
	
	//populate [result] to table
	$fieldHeaderStr = array (
		0 => 'ID',
		1 => 'First Name',
		2 => 'Last Name',
		3 => 'Birthdate',
		4 => 'Sex',
		5 => 'Photo',
		6 => 'Address',
		7 => 'City',
		8 => 'Province',
		9 => 'Postal Code',
		10 => 'Country',
		11 => 'Phone 1',
		12 => 'Phone 2',
		13 => 'Email',
		14 => 'Hire Date',
		15 => 'End Date',
		16 => 'Education',
		17 => 'Daycare Years',
		18 => 'Montessori Years',
		19 => 'Position 1',
		20 => 'Position 2',
		21 => 'Boss',
		22 => 'Hourly Rate ',
		23 => 'Passcode',
		24 => 'Notes',
		);
	populateResultToTable($result, $fieldHeaderStr);

}//report_EMPLOYEES()


function report_STUDENTS($debug_on)
{
	
	//** 1. build the query
	$queryStr = 'SELECT  ';
		$queryStr = $queryStr . '*';
	$queryStr = $queryStr . ' FROM ';
		$queryStr = $queryStr . 'STUDENTS';
	$queryStr = $queryStr . ' ORDER BY ';
		 $queryStr = $queryStr . 'STU_FIRST_NAME' . ' ASC';	
	$queryStr = $queryStr . ';';	

	//if debug on, display [queryStr]
	displayQueryStr($queryStr, $debug_on);
	
	//*** 2. execute quyery and get the results
	$result = getResult($queryStr);
	
	//populate [result] to table
	$fieldHeaderStr = array (
		0 => 'ID',
		1 => 'First Name', 
		2 => 'Last Name', 
		3 => 'Birth Date', 
		4 => 'Sex',
		5 => 'Photo', 
		6 => 'Start Date', 
		7 => 'Grad date',
		8 => 'Daily Fee',
		9 => 'Credential',
		10 => 'Notes',
		);
	populateResultToTable($result, $fieldHeaderStr);

}//report_STUDENTS()


function report_EDUCATOR_STUDENT($emp_id, $debug_on)
{
	
	//** 1. build the query
	$queryStr = 'SELECT  ';
		$queryStr = $queryStr . 'EDUCATOR_STUDENT.EDU_STU_ID';
		$queryStr = $queryStr . ', ' . 'CONCAT(EMPLOYEES.EMP_FIRST_NAME, " ", EMPLOYEES.EMP_LAST_NAME) AS EMPLOYEE_NAME'; 
		$queryStr = $queryStr . ', ' . 'CONCAT(STUDENTS.STU_FIRST_NAME, " ", STUDENTS.STU_LAST_NAME) AS STU_NAME';
		$queryStr = $queryStr . ', ' . 'EDUCATOR_STUDENT.RESPONSITIVTY';
		$queryStr = $queryStr . ', ' . 'EDUCATOR_STUDENT.START_DATE';
		$queryStr = $queryStr . ', ' . 'EDUCATOR_STUDENT.END_DATE';
		$queryStr = $queryStr . ', ' . 'EDUCATOR_STUDENT.NOTES';
	$queryStr = $queryStr . ' FROM ';
		$queryStr = $queryStr . 'EDUCATOR_STUDENT';
		$queryStr = $queryStr . ' JOIN EMPLOYEES ON EMPLOYEES.EMP_ID=EDUCATOR_STUDENT.EMP_ID';
		$queryStr = $queryStr . ' JOIN STUDENTS ON STUDENTS.STU_ID=EDUCATOR_STUDENT.STU_ID';
	$queryStr = $queryStr . ' WHERE ';
		$queryStr = $queryStr . 'EDUCATOR_STUDENT.EMP_ID=' .  $emp_id;
	$queryStr = $queryStr . ';';	


	//if debug on, display [queryStr]
	displayQueryStr($queryStr, $debug_on);
	
	//*** 2. execute quyery and get the results
	$result = getResult($queryStr);
	
	//populate [result] to table
	$fieldHeaderStr = array (
		0 => 'ID',
		1 => 'Educator Name',
		2 => 'Student Name',
		3 => 'Responsibility',
		4 => 'Start Date',
		5 => 'End Date',
		6 => 'Notes',
		);
	populateResultToTable($result, $fieldHeaderStr);

}//report_EDUCATOR_STUDENT()


function get_EDUCATOR_STUDENT($emp_id, $debug_on)
{	
	//** 1. build the query
	$queryStr = 'SELECT  ';
		$queryStr = $queryStr . 'EDUCATOR_STUDENT.EDU_STU_ID';
		$queryStr = $queryStr . ', ' . 'EDUCATOR_STUDENT.STU_ID';		
		$queryStr = $queryStr . ', ' . 'CONCAT(EMPLOYEES.EMP_FIRST_NAME, " ", EMPLOYEES.EMP_LAST_NAME) AS EMPLOYEE_NAME'; 
		$queryStr = $queryStr . ', ' . 'CONCAT(STUDENTS.STU_FIRST_NAME, " ", STUDENTS.STU_LAST_NAME) AS STU_NAME';
		$queryStr = $queryStr . ', ' . 'STUDENTS.STU_PHOTO';	
		$queryStr = $queryStr . ', ' . 'EDUCATOR_STUDENT.RESPONSITIVTY';
		$queryStr = $queryStr . ', ' . 'EDUCATOR_STUDENT.START_DATE';
		$queryStr = $queryStr . ', ' . 'EDUCATOR_STUDENT.END_DATE';
		$queryStr = $queryStr . ', ' . 'EDUCATOR_STUDENT.NOTES';
	$queryStr = $queryStr . ' FROM ';
		$queryStr = $queryStr . 'EDUCATOR_STUDENT';
		$queryStr = $queryStr . ' JOIN EMPLOYEES ON EMPLOYEES.EMP_ID=EDUCATOR_STUDENT.EMP_ID';
		$queryStr = $queryStr . ' JOIN STUDENTS ON STUDENTS.STU_ID=EDUCATOR_STUDENT.STU_ID';
	$queryStr = $queryStr . ' WHERE ';
		$queryStr = $queryStr . 'EDUCATOR_STUDENT.EMP_ID=' .  $emp_id;
	$queryStr = $queryStr . ';';	


	//if debug on, display [queryStr]
	displayQueryStr($queryStr, $debug_on);

	//*** 2. execute quyery and get the results
	$result = getResult($queryStr);

	//populate [result] to table
	$fieldHeaderStr = array (
		0 => 'ID',
		1 => 'Student ID',
		2 => 'Educator Name',
		3 => 'Student Name',
		4 => 'Student Photo',
		5 => 'Responsibility',
		6 => 'Start Date',
		7 => 'End Date',
		8 => 'Notes',
		);
	populateResultToTable($result, $fieldHeaderStr);
		
	return ($result);

}//get_EDUCATOR_STUDENT()


function getStudents_NotAttendanceCheckedToday($event_type, $debug_on)
{
	
	$queryStr = 'SELECT  ';
		$queryStr = $queryStr . 'STUDENTS.STU_ID';		
		$queryStr = $queryStr . ', ' . 'CONCAT(STUDENTS.STU_FIRST_NAME, " ", STUDENTS.STU_LAST_NAME) AS STU_NAME';
		$queryStr = $queryStr . ', ' . 'STUDENTS.STU_BIRTHDATE';
		$queryStr = $queryStr . ', ' . 'FLOOR(DATEDIFF(NOW(), STUDENTS.STU_BIRTHDATE)/365.25) AS STU_AGE';
		$queryStr = $queryStr . ', ' . 'STUDENTS.STU_PHOTO';
	$queryStr = $queryStr . ' FROM ';
		$queryStr = $queryStr . 'STUDENTS';
	$queryStr = $queryStr . ' WHERE  STUDENTS.STU_ID NOT IN ';
		$queryStr = $queryStr . '(SELECT STUDENT_ATTENDANCES.STU_ID FROM STUDENT_ATTENDANCES WHERE 
										STUDENT_ATTENDANCES.DATE_TIME >= CURDATE() AND 
										STUDENT_ATTENDANCES.DATE_TIME < (CURDATE() + INTERVAL 1 DAY) AND
										STUDENT_ATTENDANCES.EVENT_TYPE = "' . $event_type . '")';
	$queryStr = $queryStr . ';';	

	//if debug on, display [queryStr]
	displayQueryStr($queryStr, $debug_on);

	//*** 2. execute quyery and get the results
	$result = getResult($queryStr);

	//testting	
	/**
	//populate [result] to table
	$fieldHeaderStr = array (
		0 => 'ID',
		1 => 'Name',
		2 => 'Birth Date',
		3 => 'Age',
		4 => 'Photo',
		);
	populateResultToTable($result, $fieldHeaderStr);

	//NOTES: after print out, the result cursor is at the end
	//need to reset to head before return
	/**/
		
	return ($result);

}//getStudents_NotAttendanceCheckedToday()


//list of students that were checked in but not yet checked out now
function getStudents_InSchoolNow($debug_on)
{	
	$queryStr = 'SELECT ';
		$queryStr = $queryStr . 'STUDENTS.STU_ID';
		$queryStr = $queryStr . ', ' . 'CONCAT(STUDENTS.STU_FIRST_NAME, " ", STUDENTS.STU_LAST_NAME) AS STU_NAME';
		$queryStr = $queryStr . ', ' . 'STUDENTS.STU_BIRTHDATE';
		$queryStr = $queryStr . ', ' . 'FLOOR(DATEDIFF(NOW(), STUDENTS.STU_BIRTHDATE)/365.25) AS STU_AGE';
		$queryStr = $queryStr . ', ' . 'STUDENTS.STU_PHOTO';
	$queryStr = $queryStr . ' FROM ';
		$queryStr = $queryStr . 'STUDENTS';
	$queryStr = $queryStr . ' WHERE ';
		$queryStr = $queryStr . '(STUDENTS.STU_ID IN (SELECT STUDENT_ATTENDANCES.STU_ID FROM STUDENT_ATTENDANCES WHERE STUDENT_ATTENDANCES.DATE_TIME >= CURDATE() AND STUDENT_ATTENDANCES.DATE_TIME < (CURDATE() + INTERVAL 1 DAY) AND STUDENT_ATTENDANCES.EVENT_TYPE = "In")) AND ';
		$queryStr = $queryStr . '(STUDENTS.STU_ID NOT IN (SELECT STUDENT_ATTENDANCES.STU_ID FROM STUDENT_ATTENDANCES WHERE STUDENT_ATTENDANCES.DATE_TIME >= CURDATE() AND STUDENT_ATTENDANCES.DATE_TIME < (CURDATE() + INTERVAL 1 DAY) AND STUDENT_ATTENDANCES.EVENT_TYPE = "Out"))';
		$queryStr = $queryStr . ';';

	//if debug on, display [queryStr]
	displayQueryStr($queryStr, $debug_on);

	//*** 2. execute quyery and get the results
	$result = getResult($queryStr);
		
	return ($result);

}//getStudents_InSchoolNow()


//list of students that were checked in but not yet checked out now
function getEducators_InSchoolNow($debug_on)
{	
	$queryStr = 'SELECT ';
		$queryStr = $queryStr . 'EMPLOYEES.EMP_ID';
		$queryStr = $queryStr . ', ' . 'CONCAT(EMPLOYEES.EMP_FIRST_NAME, " ", EMPLOYEES.EMP_LAST_NAME) AS EMP_NAME';
		$queryStr = $queryStr . ', ' . 'EMPLOYEES.EMP_BIRTHDATE';
		$queryStr = $queryStr . ', ' . 'EMPLOYEES.EMP_PHONE1 EMP_PHONE';
		$queryStr = $queryStr . ', ' . 'EMPLOYEES.EMP_PHOTO';
	$queryStr = $queryStr . ' FROM ';
		$queryStr = $queryStr . 'EMPLOYEES';
	$queryStr = $queryStr . ' WHERE ';
		$queryStr = $queryStr . '(EMPLOYEES.EMP_ID IN (SELECT EMPLOYEE_ATTENDANCES.EMP_ID FROM EMPLOYEE_ATTENDANCES WHERE EMPLOYEE_ATTENDANCES.DATE_TIME >= CURDATE() AND EMPLOYEE_ATTENDANCES.DATE_TIME < (CURDATE() + INTERVAL 1 DAY) AND EMPLOYEE_ATTENDANCES.EVENT_TYPE = "In")) AND ';
		$queryStr = $queryStr . '(EMPLOYEES.EMP_ID NOT IN (SELECT EMPLOYEE_ATTENDANCES.EMP_ID FROM EMPLOYEE_ATTENDANCES WHERE EMPLOYEE_ATTENDANCES.DATE_TIME >= CURDATE() AND EMPLOYEE_ATTENDANCES.DATE_TIME < (CURDATE() + INTERVAL 1 DAY) AND EMPLOYEE_ATTENDANCES.EVENT_TYPE = "Out")) AND ';
		$queryStr = $queryStr . '(EMPLOYEES.EMP_POST_ID1 IN (3,4 ))';
		$queryStr = $queryStr . ';';

	//if debug on, display [queryStr]
	displayQueryStr($queryStr, $debug_on);

	//*** 2. execute quyery and get the results
	$result = getResult($queryStr);
		
	return ($result);

}//getEducators_InSchoolNow()


//list of educators that have never been checked in or
//(checked in but) already checked out
function getEducators_NotInSchoolNow($debug_on)
{	
	$queryStr = 'SELECT DISTINCT ';
		$queryStr = $queryStr . 'EMPLOYEES.EMP_ID';
		$queryStr = $queryStr . ', ' . 'CONCAT(EMPLOYEES.EMP_FIRST_NAME, " ", EMPLOYEES.EMP_LAST_NAME) AS EMP_NAME';
		$queryStr = $queryStr . ', ' . 'EMPLOYEES.EMP_BIRTHDATE';
		$queryStr = $queryStr . ', ' . 'EMPLOYEES.EMP_PHONE1 EMP_PHONE';
		$queryStr = $queryStr . ', ' . 'EMPLOYEES.EMP_PHOTO';
	$queryStr = $queryStr . ' FROM ';
		$queryStr = $queryStr . 'EMPLOYEES';
	$queryStr = $queryStr . ' WHERE ';
		$queryStr = $queryStr . '((EMPLOYEES.EMP_ID NOT IN (SELECT EMPLOYEE_ATTENDANCES.EMP_ID FROM EMPLOYEE_ATTENDANCES WHERE EMPLOYEE_ATTENDANCES.DATE_TIME >= CURDATE() AND EMPLOYEE_ATTENDANCES.DATE_TIME < (CURDATE() + INTERVAL 1 DAY) AND EMPLOYEE_ATTENDANCES.EVENT_TYPE = "In")) OR ';
		$queryStr = $queryStr . '(EMPLOYEES.EMP_ID IN (SELECT EMPLOYEE_ATTENDANCES.EMP_ID FROM EMPLOYEE_ATTENDANCES WHERE EMPLOYEE_ATTENDANCES.DATE_TIME >= CURDATE() AND EMPLOYEE_ATTENDANCES.DATE_TIME < (CURDATE() + INTERVAL 1 DAY) AND EMPLOYEE_ATTENDANCES.EVENT_TYPE = "Out"))) AND ';
		$queryStr = $queryStr . '(EMPLOYEES.EMP_POST_ID1 IN (3,4 ))';
		$queryStr = $queryStr . ';';

	//if debug on, display [queryStr]
	displayQueryStr($queryStr, $debug_on);

	//*** 2. execute quyery and get the results
	$result = getResult($queryStr);
		
	return ($result);

}//getEducators_NotInSchoolNow()


function createStudentList_AttendanceCheck($result)
{
	//the number of rows in [result]
	$resultRows = mysqli_num_rows($result);
	$resultFields = mysqli_num_fields($result);

	for ($row = 0; $row < $resultRows; $row++)
	{
		//the current row in [result]
		$currentRow = mysqli_fetch_row($result);
		//populate [currentRow] 
		echo '<div class="imagelinkbox">';	
		echo '<input type="checkbox" name="checked_student_ids[]"' .
				' id="' . $currentRow[0] . '_id"' . 
				' value="' . $currentRow[0] . '"' .  '>';
		echo '<br/>';
		echo '<label for="' . $currentRow[0] . '_id">' . 
		     	'<img src="' . $currentRow[4] . '" alt="student photo" height="110" width="110">' . 
				'<br/>' . $currentRow[1] . '<br/>' . ' (Age: ' . $currentRow[3] . ')' . '</label>';
		//echo '<br/>';
		echo '</div>'; 
	}

}//getEducators_InSchoolNow()


function createStudentPhotoList($result)
{
	//the number of rows in [result]
	$resultRows = mysqli_num_rows($result);
	$resultFields = mysqli_num_fields($result);

	for ($row = 0; $row < $resultRows; $row++)
	{
		//the current row in [result]
		$currentRow = mysqli_fetch_row($result);
		//populate [currentRow] 
		echo '<div class="imagelinkbox">';	
		echo '<input type="checkbox" name="checked_student_ids[]"' .
				' id="' . $currentRow[0] . '_id"' . 
				' value="' . $currentRow[0] . '"' .  ' disabled>';
		echo '<br/>';
		echo '<label for="' . $currentRow[0] . '_id">' . 
		     	'<img src="' . $currentRow[4] . '" alt="student photo" height="110" width="110">' . 
				'<br/>' . $currentRow[1] . '<br/>' . ' (Age: ' . $currentRow[3] . ')' . '</label>';
		//echo '<br/>';
		echo '</div>'; 
	}

}//createStudentPhotoList()


function createEmployeePhotoList($result)
{
	//the number of rows in [result]
	$resultRows = mysqli_num_rows($result);
	$resultFields = mysqli_num_fields($result);

	for ($row = 0; $row < $resultRows; $row++)
	{
		//the current row in [result]
		$currentRow = mysqli_fetch_row($result);
		//populate [currentRow] 
		echo '<div class="imagelinkbox">';	
		echo '<input type="checkbox" name="checked_student_ids[]"' .
				' id="' . $currentRow[0] . '_id"' . 
				' value="' . $currentRow[0] . '"' .  ' disabled>';
		echo '<br/>';
		echo '<label for="' . $currentRow[0] . '_id">' . 
		     	'<img src="' . $currentRow[4] . '" alt="student photo" height="110" width="110">' . 
				'<br/>' . $currentRow[1] . '<br/>' . ' (P: ' . $currentRow[3] . ')' . '</label>';
		//echo '<br/>';
		echo '</div>'; 
	}

}//createEmployeePhotoList()


//list of web page links that the user have the authorization on
function getWebPageLinks($emp_id, $debug_on)
{	
	$queryStr = 'SELECT ';
		$queryStr = $queryStr . 'WEB_PAGES.PAGE_ID';
		$queryStr = $queryStr . ', ' . 'WEB_PAGES.TAG_CLASS';
		$queryStr = $queryStr . ', ' . 'WEB_PAGES.TYPE';
		$queryStr = $queryStr . ', ' . 'WEB_PAGES.HREF';
		$queryStr = $queryStr . ', ' . 'WEB_PAGES.ICON_URL';
		$queryStr = $queryStr . ', ' . 'WEB_PAGES.TITLE';
		$queryStr = $queryStr . ', ' . 'WEB_PAGES.STATUS';
	$queryStr = $queryStr . ' FROM ';
		$queryStr = $queryStr . 'WEB_PAGES';
	$queryStr = $queryStr . ' WHERE ';
		$queryStr = $queryStr . '(WEB_PAGES.PAGE_ID IN 
									(SELECT PAGE_ID FROM EMPLOYEE_WEBPAGE 
										WHERE EMP_ID = ' . $emp_id . ')) AND ';		
		$queryStr = $queryStr . '(WEB_PAGES.STATUS = "active")';
		$queryStr = $queryStr . ';';

	//if debug on, display [queryStr]
	displayQueryStr($queryStr, $debug_on);

	//*** 2. execute quyery and get the results
	$result = getResult($queryStr);
		
	return ($result);

}//getWebPageLinks()


function createWebPageLinkItems($result)
{
	//the number of rows in [result]
	$resultRows = mysqli_num_rows($result);
	$resultFields = mysqli_num_fields($result);

	for ($row = 0; $row < $resultRows; $row++)
	{
		//the current row in [result]
		$currentRow = mysqli_fetch_row($result);
		//populate [currentRow] 
		echo '<div class="imagelinkbox">';
		echo '<div class="innerimagelinkbox">';
		echo '<a href="' . $currentRow[3] . '">';
		echo '<img src="' . $currentRow[4] . '" width="40">';
		echo '<br/>'. $currentRow[5] . '</a>';
		echo '</div>'; 
		echo '</div>';
	}

}//createWebPageLinkItems()


//list of web page links that the user have the authorization on
function employeeIsAuthorizedThisPage($emp_id, $page_url, $debug_on)
{
	//if this is the index homepage
	if (strpos($page_url, 'index.php') !== false)
	{
		return (true);
	}
	//if this is the help homepage
	if (strpos($page_url, 'help_main.php') !== false)
	{
		return (true);
	}

	//*** 2. prepare the query
	$queryStr = 'SELECT ';
		$queryStr = $queryStr . 'HREF';
	$queryStr = $queryStr . ' FROM ';
		$queryStr = $queryStr . 'WEB_PAGES';
	$queryStr = $queryStr . ' WHERE ';
		$queryStr = $queryStr . '(PAGE_ID IN 
									(SELECT PAGE_ID FROM EMPLOYEE_WEBPAGE 
										WHERE EMP_ID = ' . $emp_id . ')) AND ';		
		$queryStr = $queryStr . '(WEB_PAGES.STATUS = "active")';
		$queryStr = $queryStr . ';';

	//if debug on, display [queryStr]
	displayQueryStr($queryStr, $debug_on);

	//*** 2. execute quyery and get the results
	$result = getResult($queryStr);
	
	//*** 3. search for a sub-string match
	//the number of rows in [result]
	$resultRows = mysqli_num_rows($result);
	//if result is emplty
	if ($resultRows == 0) 
	{
		return (false);
	}
	//else: result is NOT emplty
	//now search
	for ($row = 0; $row < $resultRows; $row++)
	{
		//the current row in [result]
		$currentRow = mysqli_fetch_row($result);

		//if a sub-string match found
		//Ex: $page_url = "/montessori/report_employees.php";
		//$currentRow[0] = report_employees.php
		if (strpos($page_url, $currentRow[0]) !== false)
		{
			return (true);
		}
	}//for
	
	//NO sub-string match found
	return (false);

}//employeeIsAuthorizedThisPage()


function getTabsOfPage($this_page_url, $debug_on)
{
	$queryStr = 'SELECT ';
		$queryStr = $queryStr .'HREF';
		$queryStr = $queryStr . ', ' . 'TITLE_SHORT';
	$queryStr = $queryStr . ' FROM ';
		$queryStr = $queryStr . 'WEB_PAGES';
	$queryStr = $queryStr . ' WHERE ';
		$queryStr = $queryStr . 'PAGE_ID IN';
		$queryStr = $queryStr . '(';
			$queryStr = $queryStr . 'SELECT ';
				$queryStr = $queryStr . 'TAB_PAGE_ID';
			$queryStr = $queryStr . ' FROM ';
				$queryStr = $queryStr . 'PAGE_TABS';
			$queryStr = $queryStr . ' WHERE ';
				$queryStr = $queryStr . 'PAGE_ID IN';
				$queryStr = $queryStr . '(';
					$queryStr = $queryStr . 'SELECT ';
						$queryStr = $queryStr . 'PAGE_ID';
					$queryStr = $queryStr . ' FROM ';
						$queryStr = $queryStr . 'WEB_PAGES';
					$queryStr = $queryStr . ' WHERE ';
						$queryStr = $queryStr . '(INSTR("' . $this_page_url .'", HREF) > 0)';
					$queryStr = $queryStr . ')';
				$queryStr = $queryStr . ')';
	$queryStr = $queryStr . ';';

	//if debug on, display [queryStr]
	displayQueryStr($queryStr, $debug_on);
	
	//*** 2. execute quyery and get the results
	$result = getResult($queryStr);

	return ($result);

}//getTabsOfPage()


function report_EMPLOYEE_LOG_IOS($emp_id, $debug_on)
{
	
	//** 1. build the query
	$queryStr = 'SELECT  ';
		$queryStr = $queryStr . 'EMPLOYEE_LOG_IOS.EMP_LOGS_ID';
		$queryStr = $queryStr . ', ' . 'EMPLOYEES.EMP_FIRST_NAME'; 
		$queryStr = $queryStr . ', ' . 'EMPLOYEES.EMP_LAST_NAME';
		$queryStr = $queryStr . ', ' . 'EMPLOYEE_LOG_IOS.EVENT_TYPE';
		$queryStr = $queryStr . ', ' . 'EMPLOYEE_LOG_IOS.DATE_TIME';
		$queryStr = $queryStr . ', ' . 'EMPLOYEE_LOG_IOS.IP_ADDR';
	$queryStr = $queryStr . ' FROM ';
		$queryStr = $queryStr . 'EMPLOYEE_LOG_IOS';
		$queryStr = $queryStr . ', ' . 'EMPLOYEES';
	$queryStr = $queryStr . ' WHERE ';
		$queryStr = $queryStr . 'EMPLOYEE_LOG_IOS.EMP_ID=' .  $emp_id;
		$queryStr = $queryStr . ' AND ' . 'EMPLOYEE_LOG_IOS.EMP_ID=' . 'EMPLOYEES.EMP_ID';
		$queryStr = $queryStr . ' ORDER BY ' . 'EMPLOYEE_LOG_IOS.DATE_TIME DESC';
	$queryStr = $queryStr . ';';	

	//if debug on, display [queryStr]
	displayQueryStr($queryStr, $debug_on);
	
	//*** 2. execute quyery and get the results
	$result = getResult($queryStr);
	
	//populate [result] to table
	$fieldHeaderStr = array (
		0 => 'Identification',
		1 => 'First Name',
		2 => 'Last Name',
		3 => 'Event',
		4 => 'Date & Time',
		5 => 'IP Address',
		);
	populateResultToTable($result, $fieldHeaderStr);

}//report_EMPLOYEE_LOG_IOS()


function report_EMPLOYEE_LOG_FAILURES($debug_on)
{
	
	//** 1. build the query
	$queryStr = 'SELECT  ';
		$queryStr = $queryStr . 'EM_LOG_F_ID';
		$queryStr = $queryStr . ', ' . 'IP_ADDR'; 
		$queryStr = $queryStr . ', ' . 'PASSCODE';
		$queryStr = $queryStr . ', ' . 'DATE_TIME';
	$queryStr = $queryStr . ' FROM ';
		$queryStr = $queryStr . 'EMPLOYEE_LOG_FAILURES';
		$queryStr = $queryStr . ' ORDER BY ' . 'DATE_TIME DESC';	
	$queryStr = $queryStr . ';';	

	//if debug on, display [queryStr]
	displayQueryStr($queryStr, $debug_on);
	
	//*** 2. execute quyery and get the results
	$result = getResult($queryStr);
	
	//populate [result] to table
	$fieldHeaderStr = array (
		0 => 'Identification',
		1 => 'IP Address',
		2 => 'Passcode',		
		3 => 'Date & Time'
		);
	populateResultToTable($result, $fieldHeaderStr);

}//report_EMPLOYEE_LOG_FAILURES()


function report_DB_QUERY_LOGS($debug_on)
{
	
	//** 1. build the query
	$queryStr = 'SELECT  ';
		$queryStr = $queryStr . '*';
	$queryStr = $queryStr . ' FROM ';
		$queryStr = $queryStr . 'DB_QUERY_LOGS';
		$queryStr = $queryStr . ' ORDER BY ' . 'DATE_TIME DESC, DB_QL_ID DESC';	
	$queryStr = $queryStr . ';';	

	//if debug on, display [queryStr]
	displayQueryStr($queryStr, $debug_on);
	
	//*** 2. execute quyery and get the results
	$result = getResult($queryStr);
	
	//populate [result] to table
	$fieldHeaderStr = array (
		0 => 'Identification',
		1 => 'Query String',
		2 => 'User Name',
		3 => 'Date & Time',		
		4 => 'IP Address',
		);
	populateResultToTable($result, $fieldHeaderStr);

}//report_DB_QUERY_LOGS()


function report_EMPLOYEE_ATTENDANCES($emp_id, $debug_on)
{
//** 1. build the query
	$queryStr = 'SELECT  ';
		$queryStr = $queryStr . 'EMPLOYEE_ATTENDANCES.EMP_ATT_ID';
		$queryStr = $queryStr . ', ' . 'EMPLOYEES.EMP_FIRST_NAME'; 
		$queryStr = $queryStr . ', ' . 'EMPLOYEES.EMP_LAST_NAME';
		$queryStr = $queryStr . ', ' . 'EMPLOYEE_ATTENDANCES.EVENT_TYPE';
		$queryStr = $queryStr . ', ' . 'EMPLOYEE_ATTENDANCES.DATE_TIME';
		$queryStr = $queryStr . ', ' . 'EMPLOYEE_ATTENDANCES.IP_ADDR';
	$queryStr = $queryStr . ' FROM ';
		$queryStr = $queryStr . 'EMPLOYEE_ATTENDANCES';
		$queryStr = $queryStr . ', ' . 'EMPLOYEES';
	$queryStr = $queryStr . ' WHERE ';
		$queryStr = $queryStr . 'EMPLOYEE_ATTENDANCES.EMP_ID=' .  $emp_id;
		$queryStr = $queryStr . ' AND ' . 'EMPLOYEE_ATTENDANCES.EMP_ID=' . 'EMPLOYEES.EMP_ID';
		$queryStr = $queryStr . ' ORDER BY ' . 'EMPLOYEE_ATTENDANCES.DATE_TIME DESC';
	$queryStr = $queryStr . ';';
	
	//if debug on, display [queryStr]
	displayQueryStr($queryStr, $debug_on);

	//*** 2. execute quyery and get the results
	$result = getResult($queryStr);
	
	//populate [result] to table
	$fieldHeaderStr = array (
		0 => 'ID',
		1 => 'First Name',
		2 => 'Last Name',
		3 => 'Event',
		4 => 'Date & Time',
		5 => 'IP Address',
		);
	populateResultToTable($result, $fieldHeaderStr);

}//report_EMPLOYEE_ATTENDANCES()


function report_STUDENT_ATTENDANCES($debug_on)
{
//** 1. build the query
	$queryStr = 'SELECT  ';
		$queryStr = $queryStr . 'STUDENT_ATTENDANCES.STU_ATT_ID';
		$queryStr = $queryStr . ', ' . 'CONCAT(STUDENTS.STU_FIRST_NAME, " ", STUDENTS.STU_LAST_NAME) AS STU_NAME';
		$queryStr = $queryStr . ', ' . 'STUDENT_ATTENDANCES.EVENT_TYPE';
		$queryStr = $queryStr . ', ' . 'STUDENT_ATTENDANCES.DATE_TIME';
		$queryStr = $queryStr . ', ' . 'CONCAT(EMPLOYEES.EMP_FIRST_NAME, " ", EMPLOYEES.EMP_LAST_NAME) AS EMP_NAME';
		$queryStr = $queryStr . ', ' . 'STUDENT_ATTENDANCES.IP_ADDR';
	$queryStr = $queryStr . ' FROM ';
		$queryStr = $queryStr . 'STUDENT_ATTENDANCES';
		$queryStr = $queryStr . ', ' . 'STUDENTS';
		$queryStr = $queryStr . ', ' . 'EMPLOYEES';
	$queryStr = $queryStr . ' WHERE ';
		$queryStr = $queryStr . 'STUDENTS.STU_ID = STUDENT_ATTENDANCES.STU_ID AND ';
		$queryStr = $queryStr . 'EMPLOYEES.EMP_ID = STUDENT_ATTENDANCES.EMP_ID';
		$queryStr = $queryStr . ' ORDER BY ' . 'STU_NAME ASC, STUDENT_ATTENDANCES.DATE_TIME DESC';
	$queryStr = $queryStr . ';';
	
	//if debug on, display [queryStr]
	displayQueryStr($queryStr, $debug_on);

	//*** 2. execute quyery and get the results
	$result = getResult($queryStr);
	
	//populate [result] to table
	$fieldHeaderStr = array (
		0 => 'ID',
		1 => 'Student Name',
		2 => 'Event',
		3 => 'Date & Time',
		4 => 'Employee Name',
		5 => 'IP Address',
		);
	populateResultToTable($result, $fieldHeaderStr);

}//report_STUDENT_ATTENDANCES()



//**************** utility functions ***********************

function displayQueryStr($queryStr, $debug_on)
{	
	
	//always siliently record SQL query into the database for system operation tracking
	if (isset($_SESSION["LoggedIn_EMP_NAME"]))
	{
		insert_DB_QUERY_LOGS($_SESSION["LoggedIn_EMP_NAME"], $queryStr, true);
	}
	else
	{
		insert_DB_QUERY_LOGS("system", $queryStr, true);	
	}
	

	//testing
	/**
	if ($debug_on) {
			//display a confirmation message to the user
			echo '<script type="text/javascript">';
			//---------------- carefull with the mixed use of {"} and {'}
			//since inside queryStr {"} is used
    		echo "window.confirm('" . $queryStr . "');";
    		echo '</script>';
	}
	/**/

}//displayQueryStr()


// Function to get the client IP address
function get_client_ip() {
        
    $ipaddress = '';

    if (isset($_SERVER['HTTP_CLIENT_IP']) && ($_SERVER['HTTP_CLIENT_IP']))
        $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
    else if (isset($_SERVER['HTTP_X_FORWARDED_FOR']) && ($_SERVER['HTTP_X_FORWARDED_FOR']))
        $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
    else if (isset($_SERVER['HTTP_X_FORWARDED']) && ($_SERVER['HTTP_X_FORWARDED']))
        $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
    else if (isset($_SERVER['HTTP_FORWARDED_FOR']) && ($_SERVER['HTTP_FORWARDED_FOR']))
        $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
    else if (isset($_SERVER['HTTP_FORWARDED']) && ($_SERVER['HTTP_FORWARDED']))
        $ipaddress = $_SERVER['HTTP_FORWARDED'];
    else if (isset($_SERVER['REMOTE_ADDR']) && ($_SERVER['REMOTE_ADDR']))
        $ipaddress = $_SERVER['REMOTE_ADDR'];
    else
        $ipaddress = 'unknown';

    if ($ipaddress == '::1')
    {
    	$ipaddress = 'localhost/unknown';
    }
 
    return $ipaddress;
    
}//get_client_ip()

?>