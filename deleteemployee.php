<?php
include_once 'dbconnect.php';
if(isset($_POST['delete']))
{
	$id = $_POST['empid'];
	$sql = "DELETE FROM empdb where id = '$id'";
	$retval = mysql_query( $sql);
	if(! $retval )
	{
  		die('Could not remove employee: ' . mysql_error());
	}
	echo "Removed employee successfully\n";
}
?>
<html>
<head>
<title>Delete Employee</title>
</head>
<body>
<center>
<div id="login-form">
<form method="post">
<table align="center" width="30%" border="0">
<tr>
<td><input type="number" name="empid" placeholder="Enter an employee ID" required /></td>
</tr>
<tr>
<td><button type="submit" name="delete">Delete Employee</button></td>
</tr>
</table>
</form>
</div>
<a href="viewemployee.php" style="text-decoration:none;">View Employee Information</a><br>
<a href="addemployee.php" style="text-decoration:none;">Add new Employee</a><br>
<a href="updateemployee.php" style="text-decoration:none;">Update Employee details</a><br>
<a href="track.php" style="text-decoration:none;">Monitor Attendance of Employee</a><br>
<a href="logout1.php" style="text-decoration:none;">Logout</a>
</center>
</body>
</html>