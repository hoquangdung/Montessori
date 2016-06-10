<?php
// Start the session
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>User Log Out</title>
</head>
<body>

<?php

/**
//testing
if (isset($_SESSION["LoggedIn_EMP_ID"]))
{
	echo 'LoggedIn_EMP_ID = ' .
			$_SESSION["LoggedIn_EMP_ID"] . '<br/>';
}
if (isset($_SESSION["LoggedIn_EMP_NAME"]))
{
	echo 'LoggedIn_EMP_NAME" = ' .
			$_SESSION["LoggedIn_EMP_NAME"] . '<br/>';			
}
else
{
	echo '<br/>&#9888; &#9888; No Logged-in User &#9888; &#9888;<br/>';
}
/**/

?>


<?php

//if some user is logging in
if (isset($_SESSION["LoggedIn_EMP_ID"]) ||
	isset($_SESSION["LoggedIn_EMP_NAME"]))
{
	//record this forced log-in
	if (isset($_SESSION["LoggedIn_EMP_ID"]))
	{	
		require_once("db_operations.php");		
		insert_EMPLOYEE_LOG_IOS($_SESSION["LoggedIn_EMP_ID"], "Out");
	}

	//remove [LoggedIn_EMP_ID]
	if (isset($_SESSION["LoggedIn_EMP_ID"]))
	{
		unset($_SESSION["LoggedIn_EMP_ID"]);	
	}
	
	//remove [LoggedIn_EMP_NAME]
	if (isset($_SESSION["LoggedIn_EMP_NAME"]))
	{
		unset($_SESSION["LoggedIn_EMP_NAME"]);	
	}	
	
}
//else NO user is logging in
//do not need to log anyone out

//now NO user is logging in
//load the log-in page
echo '<script type="text/javascript">';
echo 'window.location.replace("login.php");';
echo '</script>';
	
?>

</body>
</html>