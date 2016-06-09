<?php

	function connectDB()
	{
		$db_hostname = "localhost";
		$db_name     = "montessori";
		$db_username = "root";
		$db_password = "";

		$db = mysqli_connect($db_hostname, $db_username, $db_password, $db_name);

		if($db->connect_errno > 0)
		{
    		die('Unable to connect to database [' . $db->connect_error . ']');
		}

		return ($db);
	}


	function closeDB($db)
	{
		$db->close();
	}


	function getResult($query)
	{
		// 1 - Make sure the username is available
		// 2 - Generate a random salt to encode the password
		// 3 - Encrypt password
		// 4 - Insert user in database
		$db = connectDB();

		// Query Database to validate user		
		$result = mysqli_query($db, $query);

		closeDB($db);

		return ($result);
	}

	function pupulateResultToTable($result, $fieldHeaderStr)
	{
		//the number of rows in [result]
		$resultRows = mysqli_num_rows($result);
		$resultFields = mysqli_num_fields($result);

		echo '<br/><br/><i>Total number of records: ' . $resultRows . '</i><br/><br/>';

		echo '<table border="solid">';

		//table row field headers
		echo '<tr>';
		for ($fd = 0; $fd < $resultFields; $fd++)
		{
			echo '<th>' . $fieldHeaderStr[$fd] . '</th>';
		}		 
 		echo '</tr>';	
		
	
		for ($row = 0; $row < $resultRows; $row++)
		{
			//the current row in [result]
			$currentRow = mysqli_fetch_row($result);
			//populate [currentRow] 
			echo '<tr>';
			for ($fd = 0; $fd < $resultFields; $fd++)
			{
				echo '<td>' . $currentRow[$fd] . '</td>';	
			}
			echo '</tr>';
		}

		echo '</table>'; 

		if ($resultRows > 20)
		{
			echo '<br/><br/><i>Total number of records: ' . $resultRows . '</i><br/><br/>';
		}

	}

?>