<?php
include_once 'dbconnect.php';
if(isset($_POST['track']))
{
	$id = $_POST['empid'];
	$space = str_repeat('&nbsp;', 5);
	$sql = "select dates,attendance from tracker where id = '$id'";
	$retval = mysql_query( $sql);
	if(! $retval )
	{
  		die('Could not track attendance ' . mysql_error());
	}
	else
	{
		echo " Date {$space} Attendance <br>";
		echo "-------------------------- <br>";
	}
	while($row = mysql_fetch_array($retval, MYSQL_ASSOC))
	{
    		echo "{$row['dates']}  {$space} {$row['attendance']} <br>";
} 
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
<td><button type="submit" name="track">Track Attendance</button></td>
</tr>
</table>
</form>
</div>
<a href="viewemployee.php" style="text-decoration:none;">View Employee Information</a><br>
<a href="addemployee.php" style="text-decoration:none;">Add new Employee</a><br>
<a href="deleteemployee.php" style="text-decoration:none;">Delete an Employee</a><br>
<a href="updateemployee.php" style="text-decoration:none;">Update Employee details</a><br>
<a href="logout1.php" style="text-decoration:none;">Logout</a>
</center>
</body>
</html>