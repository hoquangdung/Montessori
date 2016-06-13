<?php
// Start the session
session_start();
?>

<!DOCTYPE html>

<html>

<head>
	<title>Record: Student Attendence In's/Out's</title>

	<link rel="stylesheet" type="text/css" href="common.css">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>

	<?php

	function addLinkItem($itemHref, $itemText)
	{
		echo '<a href="' . $itemHref . '">';
		echo  $itemText . '</a>';
	}

	?>


	<script type="text/javascript">

		function addLinkItem(itemHref, itemText)
		{
			var a = $('<a />');
			a.attr('href', itemHref);
			a.text(itemText);
			$('body').append(a);
		}

	</script>


</head>
	
<body>

<?php
	include 'header_log_in_out.php'
?>

<div id="main">

<h2>Record Student Attendence In's/Out's</h2>

<p>
	<?php
		$itemHref = 'report_dp_query_logs.php';
		$itemText = 'Database Queries 1';
		addLinkItem($itemHref, $itemText);
	?>
</p>

<p>
	<?php
		$itemHref = 'report_dp_query_logs.php';
		$itemText = 'Database Queries 2';
		addLinkItem($itemHref, $itemText);
	?>
</p>



<p>
<script type="text/javascript">

	var itemHref = 'report_dp_query_logs.php';
	var itemText = 'Database Queries';

	addLinkItem(itemHref, itemText);

</script>

</p>

<p>
<script type="text/javascript">

	var itemHref = 'report_dp_query_logs.php';
	var itemText = 'Database Queries';

	addLinkItem(itemHref, itemText);

</script>

</p>


</div>


<?php
	include 'footer.php'
?>

</body>
</html>