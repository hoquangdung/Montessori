<footer style="
    		position: fixed; 
    		bottom: 0;
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
		
    	<a href="help_main.php" target="_new">[Application User Guide] </a>

		&copy; Copyright Smart Kid Montessori &#9728; All Rights Reserved &#9728; Web-Admin: <a href="mailto:hoquangdung@yahoo.com"> &#9993; Quang-Dung Ho</a> 
		
		<?php

		//if this is NOT {index, login} page, then display the [Home] button
		if ((strpos($_SERVER["PHP_SELF"], "/montessori/index.php") === false) &&
			(strpos($_SERVER["PHP_SELF"], "/montessori/login.php") === false))
		{
			echo '  &#9658; <a href="index.php" style="';
			echo 'background-color: rgb(0, 153, 0);';
			echo 'color: white;';
			echo 'text-decoration: none;';
			echo 'padding: 5px;';
			echo 'border-radius: 5px"';
			echo '>Home</a>';
		}

		?>

	</div>

</div>
		
</footer>
