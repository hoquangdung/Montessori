<div style="
    		position: fixed; 
    		height: 20px;
 		   	width: 30%; 
    		top: 7px;
    		left: 6px;
    		right: 0;    
    		background-color: transparent;"
>

<div style="
	display: table;
	height: 20px;
    width: 100%;
    margin: 0px;
    background-color: transparent;
    border-radius: 10px;    
    text-align: left">

	<div style="
		display: table-cell;
		height: 20px;
    	width: 100%;    	
    	padding: 5px;
    	vertical-align: middle;">

	<?php

	//if currently some employee is logging in
	if (isset($_SESSION['LoggedIn_EMP_ID']) &&
    	isset($_SESSION['LoggedIn_EMP_NAME']))
	{
		echo ' ';
		echo '<a href="logout.php" style="background-color: rgb(255, 153, 0); color: white; text-decoration: none; padding: 5px; border-radius: 5px"> &#10047; Log Out &#10047; </a>';
		echo '<font color="transparent">s</font>';		
		echo ' <a href="logout.php" style="background-color: rgb(255, 153, 0); color: white; text-decoration: none; padding: 5px; border-radius: 5px"> &#10047; Log Out &#10047; </a>';
	}

	?>


	</div>

</div>

</div>