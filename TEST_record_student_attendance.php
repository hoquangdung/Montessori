<?php
// Start the session
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>TEST: Record Student Attendance</title>
	<link rel="stylesheet" type="text/css" href="imglinkboxes.css">
	<link rel="stylesheet" type="text/css" href="common.css">
	<link rel="stylesheet" type="text/css" href="imglinkboxes.css">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>

</head>

<body>

<?php
	include 'header_log_in_out.php'
?>

<div id="main">

<h2>TEST: Record Student Attendance</h2>



<?php

//if form submitted
if (isset($_POST['checked_student_ids']) && is_array($_POST['checked_student_ids']))
{
	//testing
	/**
	echo '<script type="text/javascript">';
	echo 'window.confirm("Data received");';
	echo '</script>';
	/**/

	$checked_student_ids = $_POST['checked_student_ids'];

	// let's iterate thru the array<br/><br/>';
	echo '<br/>';
	$i = 0;
   	foreach ($checked_student_ids as $checked_ids)
   	{
      	echo $i . ': ' . $checked_ids . '<br/>';
      	$i++;
   	}
}

//if a valid user is logging-in
else if (isset($_SESSION['LoggedIn_EMP_ID']))
{
	//testing
	/**
	echo '<script type="text/javascript">';
	echo 'window.confirm("NO Data received");';
	echo '</script>';
	/**/

	//display log-ios of employee
	require_once("db_operations.php");
	$result = getStudents_AttendanceCheckIn(true);

	echo '<br/>';

	echo '<div class="outer">';

	$this_page = $_SERVER["PHP_SELF"];

	echo '<form id="Students_AttendanceCheckIn_Form"' .
			' action="' . $this_page . '"' . ' method="post">';

	echo '<table class="imagelinkbox">';

	echo '<tr>';
	echo '<td>';
	echo '<input type="submit" value="Check Students In">';
	echo '</td>';
	echo '</tr>';

	echo '<tr>';
	echo '<td>';
	createStudentList_AttendanceCheckIn($result);
	echo '</td>';
	echo '</tr>';

	echo '<tr>';
	echo '<td>';
	echo '<input type="submit" value="Check Students In">';
	echo '</td>';
	echo '</tr>';

	echo '</table>';
	
	echo '</form>';

	echo '</div>';


}//else if

//else: something is wrong with $_SESSION['LoggedIn_EMP_ID'])
else
{
	echo 'Something is wrong with $_SESSION["LoggedIn_EMP_ID"])';
}

?>

</div>



<?php
	include 'footer.php'
?>

</body>

</html>