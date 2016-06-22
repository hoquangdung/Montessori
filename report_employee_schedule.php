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

	echo '<table>';
	
	echo '<tr>';
	echo '<td><b>Names</b></td>';
	echo '<th>06:00</th>';
	echo '<th>06:30</th>';
	echo '<th>07:00</th>';
	echo '<th>07:30</th>';
	echo '<th>08:00</th>';
	echo '<th>08:30</th>';
	echo '<th>09:00</th>';
	echo '<th>09:30</th>';
	echo '<th>10:00</th>';
	echo '<th>10:30</th>';
	echo '<th>11:00</th>';
	echo '<th>11:30</th>';
	echo '<th>12:00</th>';
	echo '<th>12:30</th>';
	echo '<th>13:00</th>';
	echo '<th>13:30</th>';
	echo '<th>14:00</th>';
	echo '<th>14:30</th>';
	echo '<th>15:00</th>';
	echo '<th>15:30</th>';
	echo '<th>16:00</th>';
	echo '<th>16:30</th>';
	echo '<th>17:00</th>';
	echo '<th>17:30</th>';
	echo '<th>18:00</th>';
	echo '<th>18:30</th>';	
	echo '</tr>';

	echo '<tr>';
	echo '<td style="padding-right:5px;">Philippe Raphaelle</td>';
	echo '<td><a href=""><img src="images/icons/time_slot_out.png" height=40" width="40"></a></td>';
	echo '<td><a href=""><img src="images/icons/time_slot_out.png" height="40" width="40"></a></td>';
	echo '<td><a href=""><img src="images/icons/time_slot_maybe_in.png" height="40" width="40"></a></td>';
	echo '<td><a href=""><img src="images/icons/time_slot_maybe_in.png" height="40" width="40"></a></td>';
	echo '<td><a href=""><img src="images/icons/time_slot_in.png" height="40" width="40"></a></td>';
	echo '<td><a href=""><img src="images/icons/time_slot_in.png" height="40" width="40"></a></td>';
	echo '<td><a href=""><img src="images/icons/time_slot_in.png" height="40" width="40"></a></td>';
	echo '<td><a href=""><img src="images/icons/time_slot_in.png" height="40" width="40"></a></td>';
	echo '<td><a href=""><img src="images/icons/time_slot_in.png" height="40" width="40"></a></td>';
	echo '<td><a href=""><img src="images/icons/time_slot_in.png" height="40" width="40"></a></td>';
	echo '<td><a href=""><img src="images/icons/time_slot_in.png" height="40" width="40"></a></td>';
	echo '<td><a href=""><img src="images/icons/time_slot_in.png" height="40" width="40"></a></td>';
	echo '<td><a href=""><img src="images/icons/time_slot_in.png" height="40" width="40"></a></td>';
	echo '<td><a href=""><img src="images/icons/time_slot_in.png" height="40" width="40"></a></td>';
	echo '<td><a href=""><img src="images/icons/time_slot_in.png" height="40" width="40"></a></td>';
	echo '<td><a href=""><img src="images/icons/time_slot_in.png" height="40" width="40"></a></td>';
	echo '<td><a href=""><img src="images/icons/time_slot_in.png" height="40" width="40"></a></td>';
	echo '<td><a href=""><img src="images/icons/time_slot_in.png" height="40" width="40"></a></td>';
	echo '<td><a href=""><img src="images/icons/time_slot_in.png" height="40" width="40"></a></td>';
	echo '<td><a href=""><img src="images/icons/time_slot_maybe_out.png" height="40" width="40"></a></td>';
	echo '<td><a href=""><img src="images/icons/time_slot_maybe_out.png" height="40" width="40"></a></td>';
	echo '<td><a href=""><img src="images/icons/time_slot_maybe_out.png" height="40" width="40"></a></td>';
	echo '<td><a href=""><img src="images/icons/time_slot_out.png" height="40" width="40"></a></td>';
	echo '<td><a href=""><img src="images/icons/time_slot_out.png" height="40" width="40"></a></td>';
	echo '<td><a href=""><img src="images/icons/time_slot_out.png" height="40" width="40"></a></td>';
	echo '<td><a href=""><img src="images/icons/time_slot_out.png" height="40" width="40"></a></td>';
	echo '</tr>';

	echo '<tr>';
	echo '<td style="padding-right:5px;">Cathy Kim</td>';
	echo '<td><a href=""><img src="images/icons/time_slot_out.png" height="40" width="40"></a></td>';
	echo '<td><a href=""><img src="images/icons/time_slot_out.png" height="40" width="40"></a></td>';
	echo '<td><a href=""><img src="images/icons/time_slot_out.png" height="40" width="40"></a></td>';
	echo '<td><a href=""><img src="images/icons/time_slot_out.png" height="40" width="40"></a></td>';
	echo '<td><a href=""><img src="images/icons/time_slot_out.png" height="40" width="40"></a></td>';
	echo '<td><a href=""><img src="images/icons/time_slot_out.png" height="40" width="40"></a></td>';
	echo '<td><a href=""><img src="images/icons/time_slot_in.png" height="40" width="40"></a></td>';
	echo '<td><a href=""><img src="images/icons/time_slot_in.png" height="40" width="40"></a></td>';
	echo '<td><a href=""><img src="images/icons/time_slot_in.png" height="40" width="40"></a></td>';
	echo '<td><a href=""><img src="images/icons/time_slot_in.png" height="40" width="40"></a></td>';
	echo '<td><a href=""><img src="images/icons/time_slot_out.png" height="40" width="40"></a></td>';
	echo '<td><a href=""><img src="images/icons/time_slot_out.png" height="40" width="40"></a></td>';
	echo '<td><a href=""><img src="images/icons/time_slot_out.png" height="40" width="40"></a></td>';
	echo '<td><a href=""><img src="images/icons/time_slot_in.png" height="40" width="40"></a></td>';
	echo '<td><a href=""><img src="images/icons/time_slot_in.png" height="40" width="40"></a></td>';
	echo '<td><a href=""><img src="images/icons/time_slot_in.png" height="40" width="40"></a></td>';
	echo '<td><a href=""><img src="images/icons/time_slot_in.png" height="40" width="40"></a></td>';
	echo '<td><a href=""><img src="images/icons/time_slot_in.png" height="40" width="40"></a></td>';
	echo '<td><a href=""><img src="images/icons/time_slot_out.png" height="40" width="40"></a></td>';
	echo '<td><a href=""><img src="images/icons/time_slot_out.png" height="40" width="40"></a></td>';
	echo '<td><a href=""><img src="images/icons/time_slot_out.png" height="40" width="40"></a></td>';
	echo '<td><a href=""><img src="images/icons/time_slot_out.png" height="40" width="40"></a></td>';
	echo '<td><a href=""><img src="images/icons/time_slot_out.png" height="40" width="40"></a></td>';
	echo '<td><a href=""><img src="images/icons/time_slot_out.png" height="40" width="40"></a></td>';
	echo '<td><a href=""><img src="images/icons/time_slot_out.png" height="40" width="40"></a></td>';
	echo '<td><a href=""><img src="images/icons/time_slot_out.png" height="40" width="40"></a></td>';
	echo '</tr>';
	
	echo '<tr>';
	echo '<td style="padding-right:5px;">Mary Garcia</td>';
	echo '<td><a href=""><img src="images/icons/time_slot_out.png" height=40" width="40"></a></td>';
	echo '<td><a href=""><img src="images/icons/time_slot_out.png" height="40" width="40"></a></td>';
	echo '<td><a href=""><img src="images/icons/time_slot_maybe_in.png" height="40" width="40"></a></td>';
	echo '<td><a href=""><img src="images/icons/time_slot_maybe_in.png" height="40" width="40"></a></td>';
	echo '<td><a href=""><img src="images/icons/time_slot_in.png" height="40" width="40"></a></td>';
	echo '<td><a href=""><img src="images/icons/time_slot_in.png" height="40" width="40"></a></td>';
	echo '<td><a href=""><img src="images/icons/time_slot_in.png" height="40" width="40"></a></td>';
	echo '<td><a href=""><img src="images/icons/time_slot_in.png" height="40" width="40"></a></td>';
	echo '<td><a href=""><img src="images/icons/time_slot_in.png" height="40" width="40"></a></td>';
	echo '<td><a href=""><img src="images/icons/time_slot_in.png" height="40" width="40"></a></td>';
	echo '<td><a href=""><img src="images/icons/time_slot_in.png" height="40" width="40"></a></td>';
	echo '<td><a href=""><img src="images/icons/time_slot_in.png" height="40" width="40"></a></td>';
	echo '<td><a href=""><img src="images/icons/time_slot_in.png" height="40" width="40"></a></td>';
	echo '<td><a href=""><img src="images/icons/time_slot_in.png" height="40" width="40"></a></td>';
	echo '<td><a href=""><img src="images/icons/time_slot_in.png" height="40" width="40"></a></td>';
	echo '<td><a href=""><img src="images/icons/time_slot_in.png" height="40" width="40"></a></td>';
	echo '<td><a href=""><img src="images/icons/time_slot_in.png" height="40" width="40"></a></td>';
	echo '<td><a href=""><img src="images/icons/time_slot_in.png" height="40" width="40"></a></td>';
	echo '<td><a href=""><img src="images/icons/time_slot_in.png" height="40" width="40"></a></td>';
	echo '<td><a href=""><img src="images/icons/time_slot_maybe_out.png" height="40" width="40"></a></td>';
	echo '<td><a href=""><img src="images/icons/time_slot_maybe_out.png" height="40" width="40"></a></td>';
	echo '<td><a href=""><img src="images/icons/time_slot_maybe_out.png" height="40" width="40"></a></td>';
	echo '<td><a href=""><img src="images/icons/time_slot_out.png" height="40" width="40"></a></td>';
	echo '<td><a href=""><img src="images/icons/time_slot_out.png" height="40" width="40"></a></td>';
	echo '<td><a href=""><img src="images/icons/time_slot_out.png" height="40" width="40"></a></td>';
	echo '<td><a href=""><img src="images/icons/time_slot_out.png" height="40" width="40"></a></td>';
	echo '</tr>';

	echo '</table>';


	////////////////////////////////////////////////////////////////////////////////////////////////////////////
	
	echo '<br/><br/>';	

	echo '<table>';
	
	echo '<tr>';
	echo '<td><b>Names</b></td>';
	echo '<th>06:00</th>';
	echo '<th>06:30</th>';
	echo '<th>07:00</th>';
	echo '<th>07:30</th>';
	echo '<th>08:00</th>';
	echo '<th>08:30</th>';
	echo '<th>09:00</th>';
	echo '<th>09:30</th>';
	echo '<th>10:00</th>';
	echo '<th>10:30</th>';
	echo '<th>11:00</th>';
	echo '<th>11:30</th>';
	echo '<th>12:00</th>';
	echo '<th>12:30</th>';
	echo '<th>13:00</th>';
	echo '<th>13:30</th>';
	echo '<th>14:00</th>';
	echo '<th>14:30</th>';
	echo '<th>15:00</th>';
	echo '<th>15:30</th>';
	echo '<th>16:00</th>';
	echo '<th>16:30</th>';
	echo '<th>17:00</th>';
	echo '<th>17:30</th>';
	echo '<th>18:00</th>';
	echo '<th>18:30</th>';	
	echo '</tr>';

	$debug_on = true;

	$queryStr = 'SELECT EMP_ID, CONCAT(EMPLOYEES.EMP_FIRST_NAME, " ", EMPLOYEES.EMP_LAST_NAME) AS EMP_NAME FROM EMPLOYEES WHERE EMP_ID IN (SELECT DISTINCT EMP_ID FROM EMPLOYEE_SCHEDULE WHERE (SCH_DATE = CURDATE()) ORDER BY EMP_ID)';
	$queryStr = $queryStr . ';';

	//if debug on, display [queryStr]
	displayQueryStr($queryStr, $debug_on);

	//*** 2. execute quyery and get the results
	$employees = getResult($queryStr);


	//the number of rows in [employees]
	$employeesNum = mysqli_num_rows($employees);


	for ($j = 0; $j < 26; $j++)
	{
			$employeesNumInTimeSlot[$j]=0;
	}

	for ($i = 0; $i < $employeesNum; $i++)
	{
		//the current row in [result]
		$currentEmployee = mysqli_fetch_row($employees);

		$currentEmployee_EMP_ID = $currentEmployee[0];
		$currentEmployee_EMP_NAME = $currentEmployee[1];

		echo '<tr>';

		echo '<td style="padding-right:5px;">' .  $currentEmployee_EMP_NAME . '</td>';


		$queryStr = 'SELECT EMPLOYEE_SCHEDULE.TS_ID, EMPLOYEE_SCHEDULE.TS_STATUS_ID, TIME_SLOTS_STATUS.ICON_URL FROM EMPLOYEE_SCHEDULE, TIME_SLOTS_STATUS WHERE (EMPLOYEE_SCHEDULE.EMP_ID = ' . $currentEmployee_EMP_ID . ') AND (EMPLOYEE_SCHEDULE.SCH_DATE = CURDATE()) AND (EMPLOYEE_SCHEDULE.TS_STATUS_ID = TIME_SLOTS_STATUS.TS_STATUS_ID) ORDER BY EMPLOYEE_SCHEDULE.TS_ID ASC'; 
		$queryStr = $queryStr . ';';

		//if debug on, display [queryStr]
		displayQueryStr($queryStr, $debug_on);

		//*** 2. execute quyery and get the results
		$timeSlots = getResult($queryStr);

		//the number of rows in [timeSlots]
		$timeSlotsNum = mysqli_num_rows($timeSlots);

		
		for ($j = 0; $j < $timeSlotsNum; $j++)
		{
		//the current row in [result]
			$currentTimeSlot = mysqli_fetch_row($timeSlots);

			$currentTimeSlot_TS_STATUS_ID = $currentTimeSlot[1];

			$currentTimeSlot_ICON_URL = $currentTimeSlot[2];

			if ($currentTimeSlot_TS_STATUS_ID == 2)
			{
				$employeesNumInTimeSlot[$j]=$employeesNumInTimeSlot[$j]+1;				
			}

			echo '<td><a href=""><img src="' . $currentTimeSlot_ICON_URL . '" height=40" width="40"></a></td>';
		
		}//for(j)

		echo '</tr>';

	}//for(i)

	echo '<tr>';
	echo '<td style="text-align: center;"> Total: </td>';
	for ($j = 0; $j < 26; $j++)
	{		
		echo '<td style="text-align: center;">' . $employeesNumInTimeSlot[$j] . '</td>';
	}
	echo '</tr>';


	echo '</table>';

	
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