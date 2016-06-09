<?php
// Start the session
session_start();
?>

<!DOCTYPE html>

<html>

<head>
	<title>Report: Activity Types</title>
	<link rel="stylesheet" type="text/css" href="style.css">

	<?php
		$db_hostname = "localhost";
		$db_name = "montessori";
		$db_user = "root";
		$db_password = "";

		// Create connection
		$conn = new mysqli($db_hostname, $db_user, $db_password);
		$conn->select_db($db_name);
	?>

</head>

<body>

<?php
	include 'header_log_in_out.php'
?>

<h2>List of Activity Types</h2>
<br/>

<table border="solid">
	<tr>
		<th>ID <img src="images/icons/primary_key.jpg" width="20"></th>
		<th>Name</th> 
		<th>Description</th> 
		<th>Notes</th> 
 	</tr>    
	
<?PHP
	
	//** 1. prepere the query
	//colums to be selected
	$tableColsStr = '*';
	//total number of colums to be selected
	$tableCols = 4;
	//table name
	$tableNameStr = 'ACTIVITY_TYPES';
	//query string
	$queryStr = 'SELECT '. $tableColsStr . ' FROM ' . $tableNameStr . ';';
	
	//testing
	echo 'Executed query: ' . $queryStr;
	
	//** 2. run the query
	//[result]: the table returned by the query
	$result = mysqli_query($conn, $queryStr);
	
	//** 3. populate [result] to the table
	//the number of rows in [result]
	$resultRows = mysqli_num_rows($result);

	echo '<br/><br/><i>Total number of records: ' . $resultRows . '</i><br/><br/>';
	
	for ($row = 0; $row < $resultRows; $row++)
	{
		//the current row in [result]
		$currentRow = mysqli_fetch_row($result);
		//populate [currentRow] in the table row
		echo '<tr>';
		for ($col=0; $col < $tableCols; $col++)
		{
			echo '<td>' . $currentRow[$col] . '</td>';	
		}
		echo '</tr>';
	}

	$conn->close();
?>

</table>

<br/>

<?php
	include 'footer.html'
?>

</body>

</html>