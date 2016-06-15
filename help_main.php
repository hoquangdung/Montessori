<?php
// Start the session
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Check Student-Educator Ratio</title>
	<link rel="stylesheet" type="text/css" href="imglinkboxes.css">
	<link rel="stylesheet" type="text/css" href="common.css">
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>

</head>

<body>

<?php
	//include 'header_log_in_out.php'
?>

<div id="main">

<b>Steps to Follow:</b>
<ol>
	<li>Log in [Application Panel] using your pass code</li><br/>
	<li>[Application Panel]: determine which application to run or report to view</li><br/>
	<li>[Application Panel]: click the correspongding navigation icon</li><br/>
	<li>Detailed page(s) will be open accordingly</li><br/>
	<li>When done with a given application/report: go back to [Application Panel] by clicking [Home]</li><br/>
</ol>


<b>Imporant Notes:</b>
<ol>
	<li>Keep your passcode confidential for your own use only</li><br/>	
	<li>Log out once you do not need to use the application by clicking [Log Out]</li><br/>	
	<li>Contact Web-Admin to request for a new passcode (email link is in the page footer)</li><br/>
	<li>Contact Web-Admin to report issues or to give feedbacks (email link is in the page footer)</li><br/>
	<li>For security reasons, all log-in attempts are monitored and recorded</li><br/>
</ol>


<button type="button" 
        onclick="window.open('', '_self', ''); window.close();">Close This Help Page</button>

</div>


<?php
	include 'footer.php'
?>

</body>

</html>