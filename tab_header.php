<div style="
    		position: fixed; 
    		height: 20px;
 		   	width: 50%; 
    		top: 7px;
    		left: 6px;
    		right: 0;    
    		background-color: transparent;"
>

<div style="
	display: table;
	height: 26px;
    width: 100%;
    margin: 0px;
    background-color: transparent;
    border-radius: 10px;    
    text-align: left">

	<div style="
		display: table-cell;
		height: 26px;
    	width: 100%;    	
    	padding: 5px;
    	vertical-align: middle;">

	<?php

	require_once("db_operations.php");

	//1. get details of all tabs designed to this page
	$tabs = getTabsOfPage($_SERVER["PHP_SELF"], true);
	//$tabs = getTabsOfPage("/montessori/report_employee_attendances.php", true);

	//2. populate all tabs designed to this page
	//the number of tabs in [tabs]
	$tabNum = mysqli_num_rows($tabs);	
	//populate tabs now
	for ($row = 0; $row < $tabNum; $row++)
	{
		//the current row in [result]
		$currentTab = mysqli_fetch_row($tabs);

		echo '<a href="' . $currentTab[0] . '" style="background-color: rgb(255, 51, 0); color: white; text-decoration: none; padding: 5px; margin-left: 5px; border-radius: 5px">' . $currentTab[1] . '</a>';
		
	}//for	

	?>


	</div>

</div>

</div>