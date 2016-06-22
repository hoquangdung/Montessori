<header style="
    		position: fixed; 
    		top: 0;
    		left: 0;
    		right: 0;    
    		background-color: rgb(204, 204, 255);"
>

<div style="
	display: table;
	height: 30px;
    width: 100%;
    margin: 0px;
    background-color: rgb(204, 204, 255);
    border-radius: 10px;    
    text-align: right;">

	<div style="
		display: table-cell;
		height: 30px;
    	width: 100%;    	
    	padding: 10px;
    	vertical-align: middle;">

	<?php

	//if currently some employee is logging in
	if (isset($_SESSION['LoggedIn_EMP_ID']) &&
    	isset($_SESSION['LoggedIn_EMP_NAME']))
	{

		$emp_id = $_SESSION['LoggedIn_EMP_ID'];
		$emp_name = $_SESSION['LoggedIn_EMP_NAME'];
		$this_page_url = $_SERVER["PHP_SELF"];

		require_once("db_operations.php");

		//if the logged-in employee is authorized to access this page 
		if (employeeIsAuthorizedThisPage($emp_id, $this_page_url, true) === true)
		{
			echo '<font color="blue">';
			echo 'Logged-in User: ' . $emp_name . 
					' (ID = ' . $emp_id . ')' . ' &#9658; ';
			echo ' <a href="logout.php" style="background-color: rgb(255, 153, 0); color: white; text-decoration: none; padding: 5px; border-radius: 5px">Log Out</a>';
			echo '</font>';

			//then add designed tabs for this page
			include 'tab_header.php';

		}

		//else: the logged-in employee is NOT authorized to access this page 
		else
		{
			echo '<script type="text/javascript">';
			echo 'window.alert("' . $emp_name . ' is not authorized to access this page!");';
			echo '</script>';

			//reload the page
			echo '<script type="text/javascript">';			
	    	echo 'window.location.replace("index.php");';	    			
	    	echo '</script>';	    	

		}

	}//if

	//else: if currently NO employee is logging in
	else
	{		
		echo '<font color="red">';
		echo 'Please &#9658; ';
		echo ' <a href="login.php" style="background-color: blue; color: white; text-decoration: none; padding: 5px; border-radius: 5px">Log In</a>';
		echo '</font>';			

		//if this is not login page, then load it
		//*** othwerwise, the login page may keep recursively calling itself!! ***
		if (strpos($_SERVER["PHP_SELF"], "/montessori/login.php") === false)
		{
			echo '<script type="text/javascript">';
    		echo 'window.location.replace("login.php");';
    		echo '</script>';
    	}
    	//else: if this is login page, do nothing
    	//since the log in key pad is already in place    		

	}//else

	?>

	</div>

</div>

</header>