<?php
// Start the session
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Key Pad Process</title>
</head>

<body>

<?php

//if something wrong
//e.g.: this page is not called by [keypadForm] in the <login> page
//or something wrong with the <login> page
if (!(isset($_POST['keys'])))
{
	//load/reload login page
	echo '<script type="text/javascript">';
    echo 'window.location.replace("login.php");';
    echo '</script>';
}
//else: this page is in fact called by [keypadForm] in the <login> page
//and $_POST['keys'] is captured
else
{
	//get the keys entered by user
	$keys = $_POST['keys'];

	//testing
	/**
	if (isset($keys))
	{
		echo 'keys = ' . $keys . '<br/>';
	}
	/**/

	require_once("sql_queries.php");
	require_once("db_operations.php");

	//** 1. build the query
	$queryStr = 'SELECT  ';
		$queryStr = $queryStr . 'EMP_ID';
		$queryStr = $queryStr . ', ' . 'EMP_FIRST_NAME'; 
		$queryStr = $queryStr . ', ' . 'EMP_LAST_NAME';
		$queryStr = $queryStr . ', ' . 'EMP_BIRTHDATE';
		$queryStr = $queryStr . ', ' . 'EMP_PHONE1';
	$queryStr = $queryStr . ' FROM ';
		$queryStr = $queryStr . 'EMPLOYEES ';
	$queryStr = $queryStr . ' WHERE ';
		$queryStr = $queryStr . 'EMP_PASSCODE=' . '"' . $keys . '"';
	$queryStr = $queryStr . ';';
	
	//if debug on, display [queryStr]
	displayQueryStr($queryStr, true);

	//*** 2. execute quyery and get the results
	$result = getResult($queryStr);

	//testing
	/**
	//populate [result] to table
	$fieldHeaderStr = array (
		0 => 'Identification',
		1 => 'First Name',
		2 => 'Last Name',
		3 => 'Birth Date',
		4 => 'Phone Number',
		);
	populateResultToTable($result, $fieldHeaderStr);
	/**/

	$resultRows = mysqli_num_rows($result);

	//if no matched user is found (or more than one matched users are found)
	//i.e.: the log-in failed
	if ($resultRows != 1)
	{	
		//record this log-in failure for security reasons
		if (isset($keys))
		{			
			insert_EMPLOYEE_LOG_FAILURES($keys, true);
		}

		//remove variables
		unset($keys);
		unset($queryStr);
		unset($results);
		unset($fieldHeaderStr);
		unset($resultRows);
		
		//if currently some user is logging in	
		//then force the user log-out
		if (isset($_SESSION["LoggedIn_EMP_ID"]) ||
			isset($_SESSION["LoggedIn_EMP_NAME"]))
		{						
			//record this forced log-out
			if (isset($_SESSION["LoggedIn_EMP_ID"]))
			{				
				insert_EMPLOYEE_LOG_IOS($_SESSION["LoggedIn_EMP_ID"], "Out", true);
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

		//go back to login page to let the user try again
		/**/
		echo '<script type="text/javascript">';
    	echo 'window.location.replace("login.php");';
    	echo '</script>';
    	/**/
	}

	//if ONE SINGLE matched user is found
	//i.e.: the log-in succeeded
	else 
	{
		//a. if session is not started
		//then start it
		if (!isset($_SESSION))
		{
			session_start();
		}
	
		//b. set SESSION log-in variables
		//move cursor to the head if [result]
		mysqli_data_seek($result, 0);
		//get the first row
		$firstRow = mysqli_fetch_row($result);
		//set SESSION log-in variables
		$_SESSION["LoggedIn_EMP_ID"] = $firstRow[0];
		$_SESSION["LoggedIn_EMP_NAME"] = $firstRow[1] . ' ' . $firstRow[2];;
	
		/**
		//testing
		echo '<br/>';
		echo 'LoggedIn_EMP_ID = ' .
				$_SESSION["LoggedIn_EMP_ID"] . '<br/>';
	
		echo '<br/>';
		echo 'LoggedIn_EMP_NAME = ' .
				$_SESSION["LoggedIn_EMP_NAME"] . '<br/>';

		echo '<br/>&#9835; &#9835; You Are Authorized &#9835; &#9835; <br/>';
		/**/

		//c. record this successfull log-in
		if (isset($_SESSION["LoggedIn_EMP_ID"]))
		{				
			insert_EMPLOYEE_LOG_IOS($_SESSION["LoggedIn_EMP_ID"], "In", true);
		}

		//d. redirect the logged-in user to his/her main index page
		/**/
		echo '<script type="text/javascript">';
    	echo 'window.location.replace("index.php");';
    	echo '</script>';	
    	/**/
	}

}

?>

</body>

</html>