<header>

<div style="
	display: table;
	height: 40px;
    width: 100%;
    margin: 0px;
    background: lightgray;
    border-radius: 10px;    
    text-align: right;">

	<div style="
		display: table-cell;
		height: 40px;
    	width: 100%;    	
    	padding: 10px;
    	vertical-align: middle;">

	<?php

	//if currently some user is logging in
	if (isset($_SESSION['LoggedIn_EMP_ID']) &&
    	isset($_SESSION['LoggedIn_EMP_NAME']))
	{
		echo '<font color="blue">';
		echo 'Logged-in User: ' .
				$_SESSION['LoggedIn_EMP_NAME'] . ' ' .
				'(ID = ' . $_SESSION['LoggedIn_EMP_ID'] . ')';
		echo ' <a href="logout.php" style="background-color: rgb(255, 153, 0); color: white; text-decoration: none; padding: 5px; border-radius: 5px"> Log Out </a>';
		echo '</font>';
	}

	//else: if currently NO user is logging in
	else
	{
			echo '<font color="red">';
			echo 'Please';
			echo ' <a href="login.php" style="background-color: blue; color: white; text-decoration: none; padding: 5px; border-radius: 5px">Log In</a>';
			echo '</font>';			

			//if this is not login page, then load it
			if ($_SERVER["PHP_SELF"] != "/montessori/login.php")
			{
				echo '<script type="text/javascript">';
    			echo 'window.location.replace("login.php");';
    			echo '</script>';
    		}
    		//else: if this is login page, do nothing
    		//since the log in key pad is already in place    		
	}

	?>

	

	</div>

</div>

</header>