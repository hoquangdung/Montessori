<?php
// Start the session
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Recored Employee Attendance Out</title>
</head>

<body>

<?php
	include 'header_log_in_out.php'
?>


<?php

if (isset($_SESSION["LoggedIn_EMP_ID"]))
{				
	require_once("db_operations.php");

	$notes = "";
	//record new attendance-in
	insert_EMPLOYEE_ATTENDANCES($_SESSION["LoggedIn_EMP_ID"], "Out", $notes);

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