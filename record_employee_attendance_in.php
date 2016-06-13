<?php
// Start the session
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Recored Employee Attendance In</title>
	<link rel="stylesheet" type="text/css" href="common.css">
</head>

<body>

<?php
	include 'header_log_in_out.php'
?>


<?php

if (isset($_SESSION["LoggedIn_EMP_ID"]) &&
	isset($_SESSION["LoggedIn_EMP_NAME"]))
{				
	require_once("db_operations.php");

	$notes = "";
	//record new attendance-in
	insert_EMPLOYEE_ATTENDANCES($_SESSION["LoggedIn_EMP_ID"], "In", $notes, true);

	//display a confirmation message to the user
	echo '<script type="text/javascript">';
    echo 'window.confirm("Welcome ' . $_SESSION["LoggedIn_EMP_NAME"] . '!' .
    		' Your attendance-in was recored. Enjoy your day!");';
    echo '</script>';

	//then automatically redirect to his/her main index page
	/**/
	echo '<script type="text/javascript">';
    echo 'window.location.replace("index.php");';
    echo '</script>';	
    /**/
}

?>

<?php
	include 'footer.php'
?>

</body>
</html>