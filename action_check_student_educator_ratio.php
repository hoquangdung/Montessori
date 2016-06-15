<?php
// Start the session
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Check Student-Educator Ratio</title>
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

//if a valid user is logging-in
if (isset($_SESSION['LoggedIn_EMP_ID']))
{	
	
	require_once("db_operations.php");	

	//1. search for students that were checked in but not yet checked out now
	$students = getStudents_InSchoolNow(true);
	$studentNum = mysqli_num_rows($students);

	//2. search for students that were checked in but not yet checked out now
	$educators = getEducators_InSchoolNow(true);
	$educatorNum = mysqli_num_rows($educators);

	if ($studentNum == 0) {
		
		echo '<script type="text/javascript">';
		echo 'window.confirm("No student presented now!");';
		echo '</script>';

		//reload the page
		echo '<script type="text/javascript">';
    	echo 'window.location.replace("index.php");';
    	echo '</script>';
	}

	if ($educatorNum == 0) {
		
		echo '<script type="text/javascript">';
		echo 'window.confirm("No employee presented now!");';
		echo '</script>';

		//reload the page
		echo '<script type="text/javascript">';
    	echo 'window.location.replace("index.php");';
    	echo '</script>';
	}


	//disable checkbox (but not works yet)
	echo <<<_END
	<script type="text/javascript">
	$('input[type="checkbox"]').on('click', function(ev){
    	ev.preventDefault();
	})
	</script>
_END;

	echo '<b>CHECK STUDENT-EDUCATOR RATIO</b>';	 

	echo '<br/><br/>';

	$extraEducatorNum = $studentNum/5 - $educatorNum;

	if ($extraEducatorNum > 0)
	{		
		echo '<font color="red"> Recommendation: ' . ceil($extraEducatorNum) . ' more educator(s) required!</font>';	 
	}
	else if (($extraEducatorNum < 0) && (floor(-$educatorNum) >= 1))
	{			
		echo '<font color="blue"> Recommendation: ' . ceil(-$extraEducatorNum) . ' educator(s) exceed!</font>';	 
	}
	else
	{			
		echo '<font color="blue"> Recommendation: ' . 'maintain the current number of educator(s)!</font>';	 
	}

	echo '<br/><br/>';


	$this_page = $_SERVER["PHP_SELF"];


	//////////////////////////////////////////////////////////

	
	echo '<div class="outer">';

	echo '<table class="imagelinkbox">';

	echo '<tr>';
	echo '<td>';
	echo 'Total number of students presented: ' . $studentNum;
	echo '</td>';
	echo '</tr>';

	echo '<tr>';
	echo '<td>';
	echo 'Details are as follows:';
	echo '</td>';
	echo '</tr>';

	echo '<tr>';
	echo '<td>';
	createStudentList_AttendanceCheck($students);
	echo '</td>';
	echo '</tr>';

	echo '<tr>';
	echo '<td>';
	echo 'Total number of students presented: ' . $studentNum;
	echo '</td>';
	echo '</tr>';

	echo '</table>';
	
	echo '</div>';

	
	//////////////////////////////////////////////////////////


	echo '<div class="outer">';
	
	echo '<table class="imagelinkbox">';

	echo '<tr>';
	echo '<td>';
	echo 'Total number of educators presented: ' . $educatorNum;
	echo '</td>';
	echo '</tr>';

	echo '<tr>';
	echo '<td>';
	echo 'Details are as follows:';
	echo '</td>';
	echo '</tr>';

	echo '<tr>';
	echo '<td>';
	createStudentList_AttendanceCheck($educators);
	echo '</td>';
	echo '</tr>';

	echo '<tr>';
	echo '<td>';
	echo 'Total number of educators presented: ' . $educatorNum;
	echo '</td>';
	echo '</tr>';

	echo '</table>';
	
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