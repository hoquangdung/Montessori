<?php
// Start the session
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Application Panel</title>
	<link rel="stylesheet" type="text/css" href="imglinkboxes_panel.css">
	<link rel="stylesheet" type="text/css" href="common.css">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>

</head>

<body>

<?php
	include 'header_log_in_out.php';
?>

<div id="main">


<?php

//if a valid user is logging-in
if (isset($_SESSION['LoggedIn_EMP_ID']))
{	
	//testing
	/**
	echo '<script type="text/javascript">';
	echo 'window.confirm("NO Data received");';
	echo '</script>';
	/**/

	//search for students that were not checkec in today
	require_once("db_operations.php");
	$emp_id = $_SESSION['LoggedIn_EMP_ID'];
	$result = getWebPageLinks($emp_id, true);
	$resultRows = mysqli_num_rows($result);

	if ($resultRows == 0) {
		
		echo '<script type="text/javascript">';
		echo 'window.confirm("You are not authorized to access any page!");';
		echo '</script>';

		//redirect this page to the [log-in] page
		echo '<script type="text/javascript">';
    	echo 'window.location.replace("login.php");';
    	echo '</script>';
	}
	
	echo '<div class="outer">';

	$this_page = $_SERVER["PHP_SELF"];
	
	echo '<table class="imagelinkbox">';

	echo '<tr>';
	echo '<td>';
	echo '<h2>Application Panel</h2>';
	echo '</td>';
	echo '</tr>';

	echo '<tr>';
	echo '<td>';
	createWebPageLinkItems($result);
	echo '</td>';
	echo '</tr>';

	echo '<tr>';
	echo '<td>';
	echo '';
	echo '</td>';
	echo '</tr>';


	echo '</table>';
		
	echo '</div>';

	
}//if

//else: something is wrong with $_SESSION['LoggedIn_EMP_ID'])
else
{
	echo '<script type="text/javascript">';
	echo 'window.confirm("No user is logging in!");';
	echo '</script>';

	//redirect this page to the [log-in] page
	echo '<script type="text/javascript">';
    echo 'window.location.replace("login.php");';
    echo '</script>';
}

?>

</div>


<?php
	include 'footer.php'
?>

</body>

</html>