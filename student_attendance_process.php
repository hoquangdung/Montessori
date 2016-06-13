<?php
// Start the session
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Student Attendance Process</title>
	<link rel="stylesheet" type="text/css" href="db_tables.css">
	<link rel="stylesheet" type="text/css" href="common.css">

</head>

<body>

<?php
	include 'header_log_in_out.php'
?>

<div id="main">

<h2>Student Attendance Process</h2>

<?php

//if something wrong
//e.g.: this page is not called by [studentAttendanceForm] in the <Record Student Attendance> page
//or something wrong with the <Record Student Attendance> page
if (!(isset($_POST['selected_student_ids'])))
{
	//load/reload login page
	echo '<script type="text/javascript">';
    echo 'window.location.replace("login.php");';
    echo '</script>';
}
//else: this page is in fact called by [studentAttendanceForm] in the <Record Student Attendance> page
//and $_POST['selected_student_ids'] is captured
else
{	
	
	$selected_student_ids = $_POST['selected_student_ids'];
	
	print_r($selected_student_ids);

	echo '<br/>';

	$i = 0;
	foreach ($selected_student_ids as $student_id)
	{
	  	echo $i . '>  ' . $student_id . '<br/>';
	  	$i++;
	}

	require_once("sql_queries.php");
	require_once("db_operations.php");

}

?>

</div>


<?php
	include 'footer.php'
?>

</body>

</html>