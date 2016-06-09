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
$keys		= $_POST['keys'];
$passCode	= $_POST['keys'];
?> 


<?php
echo 'keys = ' . $keys . '<br/>';
echo 'passCode = ' . $passCode . '<br/>';
if (isset($_SESSION))
{
	echo 'SESSION = ' . $_SESSION . '<br/>';
}

?>

<br/>

<?php

require_once("sql_queries.php");

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
	$queryStr = $queryStr . 'EMP_PASSCODE=' . '"' . $passCode . '"';
$queryStr = $queryStr . ';';
//testing
echo 'Executed query: ' . $queryStr;

//*** 2. execute quyery and get the results
$result = getResult($queryStr);

$fieldHeaderStr = array (
	0 => 'Identification',
	1 => 'First Name',
	2 => 'Last Name',
	3 => 'Birth Date',
	4 => 'Phone Number',
	);
pupulateResultToTable($result, $fieldHeaderStr);

$resultRows = mysqli_num_rows($result);

if ($resultRows != 1)
{
	session_destroy();	
	
	echo '<br/>&#9760; &#9760; Invalid User &#9760; &#9760; <br/>';
}
else
{
	if (!isset($_SESSION))
	{
		session_start();
	}

	//move cursor to the head
	mysqli_data_seek($result, 0);
	$firstRow = mysqli_fetch_row($result);
	$_SESSION["LoggedIn_EMP_ID"] = $firstRow[0];
	$_SESSION["LoggedIn_EMP_NAME"] = $firstRow[1] . ' ' . $firstRow[2];;
	
	echo '<br/>';
	echo 'LoggedIn_EMP_ID = ' .
			$_SESSION["LoggedIn_EMP_ID"] . '<br/>';

	echo '<br/>';
	echo 'LoggedIn_EMP_NAME = ' .
			$_SESSION["LoggedIn_EMP_NAME"] . '<br/>';

	echo '<br/>&#9835; &#9835; You Are Authorized &#9835; &#9835; <br/>';
	
}

?>



<?php
	include 'footer.html'
?>

</body>

</html>