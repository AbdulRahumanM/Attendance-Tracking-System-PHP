<?php
session_start();
include_once 'dbconnect.php';
if(isset($_POST['change']))
{
	$current = md5($_POST['currentpwd']);
	$new = md5($_POST['newpasswrd']);
	$retype = md5($_POST['retype']);
        $id = $_SESSION['user'];
	$sql = " SELECT * from empdb where id = '$id' and password = '$current'";
	$retval = mysql_query( $sql);
	if(! $retval)
	{
		die('Please enter the correct Password '. mysql_error());
	}
	else
	{
		if ($new == $retype)
		{
		$sql = "UPDATE empdb SET password = '$new' where id = '$id' and password = '$current'";
		$retval = mysql_query( $sql);
		}
		else
		{
		echo "Passwords doesnot match\n";
		}	
	}
}
?>
<html>
<head>
<title>Password Change</title>
</head>
<body>		
<center>
<div id="login-form">
<form method="post">
<table align="center" width="30%" border="0">
<tr>
<td><input type="password" name="currentpwd" placeholder="Enter the current password" required /></td>
</tr>
<tr>
<td><input type="password" name="newpasswrd" placeholder="Enter the new password" required /></td>
</tr>
<tr>
<td><input type="password" name="retype" placeholder="Retype the password" required /></td>
</tr>
<tr>
<td><button type="submit" name="change">Change Password</button></td>
</tr>
</table>
</form>
</div>
<a href="employee.php" style="text-decoration:none;">Employee Home</a><br>
<a href="logout.php" style="text-decoration:none;">Logout</a>
</center>
</body>
</html>