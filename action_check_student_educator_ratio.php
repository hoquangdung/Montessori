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

	//search for educators that were checked in but not yet checked out now
	$educators = getEducators_InSchoolNow(true);
	$educatorNum = mysqli_num_rows($educators);

	if ($educatorNum == 0) {
		
		echo '<script type="text/javascript">';
		echo 'window.confirm("No employee presented now!");';
		echo '</script>';

		//reload the page
		echo '<script type="text/javascript">';
    	echo 'window.location.replace("index.php");';
    	echo '</script>';
	}


	//search for students that were checked in but not yet checked out now
	$students = getStudents_InSchoolNow(true);
	$studentNum = mysqli_num_rows($students);

	if ($studentNum == 0) {
		
		echo '<script type="text/javascript">';
		echo 'window.confirm("No student presented now!");';
		echo '</script>';

		//reload the page
		echo '<script type="text/javascript">';
    	echo 'window.location.replace("index.php");';
    	echo '</script>';
	}


	echo '<b>CHECK STUDENT-EDUCATOR RATIO</b>';	 

	echo '<br/><br/>';

	$minEducatorNum = ceil($studentNum/5);

	if ($educatorNum < $minEducatorNum)
	{		
		echo '<font color="red"> Recommendation: ' . ($minEducatorNum - $educatorNum) . ' more educator(s) required!</font>';	 
	}
	else if ($educatorNum > $minEducatorNum)
	{			
		echo '<font color="blue"> Recommendation: ' . ($educatorNum - $minEducatorNum) . ' educator(s) exceeded!</font>';	 
	}
	else
	{			
		echo '<font color="black"> Recommendation: ' . 'maintain the current number of educator(s)!</font>';	 
	}

	echo '<br/><br/>';


	//////////////////////////////////////////////////////////

	
	echo '<div class="outer">';

	echo '<table class="imagelinkbox">';

	echo '<tr>';
	echo '<td>';
	echo '<b>Total number of students presented: ' . $studentNum . '</b>';
	echo '</td>';
	echo '</tr>';

	echo '<tr>';
	echo '<td>';
	echo 'Details are as follows:';
	echo '</td>';
	echo '</tr>';

	echo '<tr>';
	echo '<td>';
	createStudentPhotoList($students);
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
	echo '<b>Total number of educators presented: ' . $educatorNum . '</b>';;
	echo '</td>';
	echo '</tr>';

	echo '<tr>';
	echo '<td>';
	echo 'Details are as follows:';
	echo '</td>';
	echo '</tr>';

	echo '<tr>';
	echo '<td>';
	createEmployeePhotoList($educators);
	echo '</td>';
	echo '</tr>';

	echo '<tr>';
	echo '<td>';
	echo 'Total number of educators presented: ' . $educatorNum;
	echo '</td>';
	echo '</tr>';

	echo '</table>';
	
	echo '</div>';

	
	//////////////////////////////////////////////////////////

	//if more educators required
	//if ($educatorNum < $minEducatorNum)
	//{

		//3. search for students that are not in school now
		$notWorkingEducators = getEducators_NotInSchoolNow(true);
		$notWorkingEducatorNum = mysqli_num_rows($notWorkingEducators);

		if ($notWorkingEducatorNum >= 1)
		{

			//if more educators required
			if ($educatorNum < $minEducatorNum)
			{				
				echo '<font color="green">Suggested list of ' . $notWorkingEducatorNum . 
							' educator(s) to call in: </font>';
				echo '<br/><br/>';
			}

			echo '<div class="outer">';
	
			echo '<table class="imagelinkbox">';

			echo '<tr>';
			echo '<td>';
			echo '<b>Total number of educators not in school now: ' . $notWorkingEducatorNum . '</b>';
			echo '</td>';
			echo '</tr>';

			echo '<tr>';
			echo '<td>';
			echo 'Details are as follows:';
			echo '</td>';
			echo '</tr>';

			echo '<tr>';
			echo '<td>';
			createEmployeePhotoList($notWorkingEducators);
			echo '</td>';
			echo '</tr>';

			echo '<tr>';
			echo '<td>';
			echo 'Total number of educators not in school now: ' . $notWorkingEducatorNum;
			echo '</td>';
			echo '</tr>';

			echo '</table>';
			
			echo '</div>';

		}//if ($notWorkingEducatorNum >= 1)

	//}//if more educators required

	
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