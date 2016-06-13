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
				
		&copy; <i> Copyright Smart Kid Montessori</i> &#9883; <i>All Rights Reserved </i> &#9883;

		<?php

		if ($_SERVER["PHP_SELF"] != "/montessori/index.php")
		{
			echo '  <a href="index.php" style="';
			echo 'background-color: rgb(0, 0, 255);';
			echo 'color: white;';
			echo 'text-decoration: none;';
			echo 'padding: 5px;';
			echo 'border-radius: 5px"';
			echo '> Home </a>';
		}

		?>

	</div>

</div>
		
</footer>
