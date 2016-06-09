<?php
// Start the session
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>User Log Out</title>
</head>
<body>

<?php

if (isset($_SESSION["LoggedIn_EMP_ID"]))
{
	echo 'LoggedIn_EMP_ID = ' .
			$_SESSION["LoggedIn_EMP_ID"] . '<br/>';
}
if (isset($_SESSION["LoggedIn_EMP_NAME"]))
{
	echo 'LoggedIn_EMP_NAME" = ' .
			$_SESSION["LoggedIn_EMP_NAME"] . '<br/>';			
}
else
{
	echo '<br/>&#9888; &#9888; No Logged-in User &#9888; &#9888;<br/>';
}

?>


<?php

if (isset($_SESSION))
{
	session_destroy();	
	echo '<br/>&#9872; &#9872; User Logged Out &#9872; &#9872;<br/>';
}
	
?>

<?php
	include 'footer.html'
?>

</body>
</html>