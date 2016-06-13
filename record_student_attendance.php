<?php
// Start the session
session_start();
?>

<!DOCTYPE html>

<html>

<head>
	<title>Record: Student Attendence In's/Out's</title>

	<link rel="stylesheet" type="text/css" href="common.css">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>

	<?php

	function addLinkItem($itemHref, $itemText)
	{
		echo '<a href="' . $itemHref . '">';
		echo  $itemText . '</a>';
	}

	$selected_student_ids=array();

	function selectStudent($id)
	{
		$pos = count($selected_student_ids);
		$selected_student_ids[$pos] = $id;

		echo '<br/>';
		print_r($selected_student_ids);
		echo '<br/>';
	}

	?>


</head>
	
<body>

<?php
	include 'header_log_in_out.php'
?>

<div id="main">

<h2>Record Student Attendence In's/Out's</h2>

<p>
	<?php
		$itemHref = 'report_dp_query_logs.php';
		$itemText = 'Database Queries 1';
		addLinkItem($itemHref, $itemText);
	?>
</p>

<p>
	<?php
		$itemHref = 'report_dp_query_logs.php';
		$itemText = 'Database Queries 2';
		addLinkItem($itemHref, $itemText);
	?>
</p>

<a href="<?php selectStudent(1); ?>">Student 1</a>;
<a href="<?php selectStudent(2); ?>">Student 2</a>;
<a href="<?php selectStudent(3); ?>">Student 3</a>;


<form name="studentAttendanceForm" action="student_attendance_process.php" method="post">

<?php

	$FORM_selected_student_ids=array(1, 2, 3);

	foreach ($FORM_selected_student_ids as $student_id)
	{
	  	echo '<input type="hidden" name="selected_student_ids[]" value=' .  $student_id . '>';
	}

?>	

<input type="submit" value="Record Student Attendance">

</form>


</div>


<?php
	include 'footer.php'
?>

</body>
</html>