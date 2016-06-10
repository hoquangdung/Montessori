<?php
// Start the session
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>User Log-In</title>
	<link rel="stylesheet" type="text/css" href="keypad.css">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>

</head>

<body>

<?php
	include 'header_log_in_out.php'
?>

<br/>

<div id="outer">

	<div id="inner">

<br/>

<form name="keypadForm" action="keypad_process.php" method="post">

	<input type='hidden' id='keys' name='keys' value=''>

	<table>
		<tr>
			<td colspan="4">
			<input type="password" id="passCode" name="passCode" value='' disabled>		
			</td>
		</td>
		<tr>
			<td><a href="javascript: readKey('1')">
				<img src="images/icons/key_one.png"></a></td>
			<td><a href="javascript: readKey('2')">
				<img src="images/icons/key_two.png"></a></td>
			<td><a href="javascript: readKey('3')">
				<img src="images/icons/key_three.png"></a></td>
			<td><a href="javascript: cancelKeys()">
				<img src="images/icons/key_cancel.png"></a></td>
		</tr>
		<tr>
			<td><a href="javascript: readKey('4')">
				<img src="images/icons/key_four.png"></a></td>
			<td><a href="javascript: readKey('5')">
				<img src="images/icons/key_five.png"></a></td>
			<td><a href="javascript: readKey('6')">
				<img src="images/icons/key_six.png"></a></td>
			<td><a href="javascript: clearKey()">
				<img src="images/icons/key_clear.png"></a></td>
		</tr>
		<tr>
			<td><a href="javascript: readKey('7')">
				<img src="images/icons/key_seven.png"></a></td>
			<td><a href="javascript: readKey('8')">
				<img src="images/icons/key_eight.png"></a></td>
			<td><a href="javascript: readKey('9')">
				<img src="images/icons/key_nine.png"></a></td>
			<td><a href="javascript: submit_keypadForm()">
				<img src="images/icons/key_enter.png"></a></td>
		</tr>
		<tr>
			<td><img src="images/icons/key_none.png"></td>
			<td><a href="javascript: readKey('0')">
				<img src="images/icons/key_zero.png"></a></td>
			<td><img src="images/icons/key_none.png"></td>
			<td><img src="images/icons/key_none_bigger.png"></td>
		</tr>
	</table>

</form>

</div>

</div>

<script language="javascript" type="text/javascript">
function readKey(key)
{		
	$("#keys").val($("#keys").val() + key);
	$("#passCode").val($("#keys").val());
}
</script>

<script language="javascript" type="text/javascript">
function clearKey()
{	
	var keysStr = $("#keys").val();
	var len = keysStr.length;

	if (len >= 1)
	{
		$("#keys").val(keysStr.substr(0, len-1));
		$("#passCode").val($("#keys").val());
	}		
}
</script>

<script language="javascript" type="text/javascript">
function cancelKeys()
{	
	$("#keys").val('');
	$("#passCode").val('');	
}
</script>

<script language="javascript" type="text/javascript">
function submit_keypadForm(key)
{
	document.keypadForm.submit();
}
</script>


<?php
	include 'footer.html'
?>

</body>

</html>