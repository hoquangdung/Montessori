<?php
// Start the session
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Smart Assistance for Montessori Schools</title>
	<link rel="stylesheet" type="text/css" href="vertical_navigation_bar.css">
</head>
<body>

<?php
	include 'header_log_in_out.php'
?>

<div id="header">
	<h2><font color="blue">Smart Kids Montessori</font></h2>	
	<h3>Please select one of the following option:</h3>
	<br/>
</div>

<div id="nav">	
	<ul>
		<li><a class="active" href="index.php"><img src="images/icons/home_button.jpg" width="40"> Home</a></li>
		<li><a href="login.php"><img src="images/icons/keypad_small.jpg" width="40"> User Login</a></li>
		<li><a href="logout.php"><img src="images/icons/logout.jpg" width="40"> User Logout</a></li>
		<li><a href="record_employee_attendance_in.php"><img src="images/icons/attendance_in.jpg" width="40"> Check In Employee Attendance</a></li>
		<li><a href="record_employee_attendance_out.php"><img src="images/icons/attendance_out.png" width="40"> Check Out Employee Attendance</a></li>		
		<li><a href="report_activity_types.php"><img src="images/icons/report.jpg" width="40"> Activity Types</a></li>
		<li><a href="report_activity_subtypes.php"><img src="images/icons/report.jpg" width="40"> Activity Sub-Types</a>
		<li><a href="report_educations.php"><img src="images/icons/report.jpg" width="40"> Educations</a></li>
		<li><a href="report_positions.php"><img src="images/icons/report.jpg" width="40"> Positions</a></li>
		<li><a href="report_employees.php"><img src="images/icons/report.jpg" width="40"> Employees</a></li>
		<li><a href="report_students.php"><img src="images/icons/report.jpg" width="40"> Students</a></li>
		<li><a href="report_activities.php"><img src="images/icons/report.jpg" width="40"> Activities</a></li>
		<li><a href="report_employee_log_ios.php"><img src="images/icons/report.jpg" width="40"> Employee Log-Ins/Outs</a></li>
		<li><a href="report_employee_attendances.php"><img src="images/icons/report.jpg" width="40"> Employee Attendance-Ins/Outs</a></li>
		<li><a href="report_employee_log_failures.php"><img src="images/icons/report.jpg" width="40"> Employee Log Failures</a></li>
		<li><a href="report_dp_query_logs.php"><img src="images/icons/report.jpg" width="40"> Database Queries</a></li>

		
	</ul>	
</div>


<?php
	include 'footer_no_home.html'
?>
</body>
</html>