<?php
// Start the session
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Recored Employee Attendance Out</title>
	<link rel="stylesheet" type="text/css" href="db_tables.css">
</head>

<body>

<?php
	include 'header_log_in_out.php'
?>


<?php

if (isset($_SESSION["LoggedIn_EMP_ID"]))
{				
	//record new attendance-in
	require_once("db_operations.php");
	$notes = "";	
	insert_EMPLOYEE_ATTENDANCES($_SESSION["LoggedIn_EMP_ID"], "Out", $notes, true);

	//display a confirmation message to the user
	echo '<script type="text/javascript">';
    echo 'window.confirm("' . $_SESSION["LoggedIn_EMP_NAME"] . '!' .
    		' Your attendance-out was recored. Good bye!");';
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
	include 'footer.html'
?>

</body>
</html>