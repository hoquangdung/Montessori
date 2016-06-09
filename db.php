<?php
	function connect_db()
	{
		$db_hostname = "localhost";
		$db_name     = "loginsample";
		$db_username = "root";
		$db_password = "";

		$db = mysqli_connect($db_hostname, $db_username, $db_password, $db_name);

		if($db->connect_errno > 0)
		{
    		die('Unable to connect to database [' . $db->connect_error . ']');
		}

		return $db;
	}

	function close_db($db)
	{
		$db->close();
	}

	function insert_new_user($username, $password)
	{
		// 1 - Make sure the username is available
		// 2 - Generate a random salt to encode the password
		// 3 - Encrypt password
		// 4 - Insert user in database
		$db = connect_db();

		// Query Database to validate user
		$query = "SELECT * FROM user WHERE Username='". $username ."'";
		$result = mysqli_query($db, $query);

		// 1 - If user doesn't exist in the database
		if (mysqli_num_rows($result) == 0)
		{
			// 2 - Random salt
			$salt = mcrypt_create_iv(32, MCRYPT_DEV_URANDOM);
			
			// 3 - Encrypt password with salt
			$encrypted_pw = crypt($password, $salt);

			// 4 - Insert user in database
			// TODO - DB Insertion Validation
			$query = "INSERT INTO user (`UserID`, `Username`, `PasswordEncrypted`, `PasswordSalt`) VALUES (NULL, '". $username ."', '". $encrypted_pw."', '". $salt ."');";
			mysqli_query($db, $query);
		}
		else
		{
			echo "Failed to create user, username already taken!";
		}

		close_db($db);
	}

	function validate_user($username, $password)
	{
		// Database connection
		$db = connect_db();
		$found = 0;

		// Query Database to validate user
		$query = "SELECT * FROM user WHERE Username='". $username."'";
		$result = mysqli_query($db, $query);

		// Analyse Results
		// There should be only 1 result, username unique
		if ($result && $row = mysqli_fetch_array($result)) 
		{
			// Re-Encrypt password from Salt in Database
			$salt = $row['PasswordSalt'];
			$encrypted_pw = crypt($password, $salt);

			// Compare with encrypted password in database
			if ($encrypted_pw == $row['PasswordEncrypted'])
			{
				$found = 1;
			}
		}

		// Close connection with database
		close_db($db);

		return ($found == 1);
	}
?>