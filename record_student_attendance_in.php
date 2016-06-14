<?php
// Start the session
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Record Student Attendance-In</title>
	<link rel="stylesheet" type="text/css" href="imglinkboxes.css">
	<link rel="stylesheet" type="text/css" href="common.css">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>

</head>

<body>

<?php
	include 'header_log_in_out.php'
?>

<div id="main">


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

	require_once("db_operations.php");

	$checked_student_ids = $_POST['checked_student_ids'];

	// let's iterate thru the array<br/><br/>';
	//echo '<br/>';
	$i = 0;
   	foreach ($checked_student_ids as $checked_ids)
   	{
      	//echo $i . ': ' . $checked_ids . '<br/>';
      	$i++;

      	//record student attendance-in
      	if (isset($_SESSION['LoggedIn_EMP_ID']))
      	{
      		$stu_id = $checked_ids; 
      		$event_type = "In";
      		$emp_id = $_SESSION['LoggedIn_EMP_ID'];
      		$notes = "";
      		insert_STUDENT_ATTENDANCES($stu_id, $event_type, $emp_id, $notes, true);
      	}//if

    }//for


    //testing
	/**/
	echo '<script type="text/javascript">';
	echo 'window.confirm("Attendance-in recorded: ' . count($checked_student_ids) . ' students.");';
	echo '</script>';
	/**/

    //reload the page
	echo '<script type="text/javascript">';
    echo 'window.location.replace("record_student_attendance_in.php");';
    echo '</script>';

}//if

//if a valid user is logging-in
else if (isset($_SESSION['LoggedIn_EMP_ID']))
{	
	//testing
	/**
	echo '<script type="text/javascript">';
	echo 'window.confirm("NO Data received");';
	echo '</script>';
	/**/

	//search for students that were not checkec in today
	require_once("db_operations.php");
	$event_type = "In";
	$result = getStudents_NotAttendanceCheckedToday($event_type, true);
	$resultRows = mysqli_num_rows($result);

	if ($resultRows == 0) {
		
		echo '<script type="text/javascript">';
		echo 'window.confirm("All students were attendance-in recored!");';
		echo '</script>';

		//reload the page
		echo '<script type="text/javascript">';
    	echo 'window.location.replace("index.php");';
    	echo '</script>';
	}

	echo '<h2>Record Student Attendance-In</h2>';	 

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
	createStudentList_AttendanceCheck($result);
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

	//still not works
	/**
	echo '<script type="text/javascript">';
	echo '$(document).on("change", ".checkbox", function(){';
    echo '	if (this.checked) {';
    echo '    window.confirm("checked");';
    echo '	}';
    echo '	else {';
    echo '    window.confirm("un-checked");';
    echo '	}';
    echo '});';
    echo '</script>'; 
    /**/

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