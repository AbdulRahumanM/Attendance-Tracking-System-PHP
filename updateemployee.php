<?php
include_once 'dbconnect.php';
if(isset($_POST['update']))
{
	$id = $_POST['empid'];
	$mobile = $_POST['number'];
	$sql = "UPDATE empdb SET mob = '$mobile' where id = '$id'";
	$retval = mysql_query( $sql);
	if(! $retval )
	{
  		die('Could not update details ' . mysql_error());
	}
	echo "Employee details updated successfully\n";
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
<td><input type="number" name="empid" placeholder="Enter an Employee ID" required /></td>
</tr>
<tr>
<td><input type="text" name="number" placeholder="Enter new Mobile Number" required /></td>
</tr>
<tr>
<td><button type="submit" name="update">Update Employee Details</button></td>
</tr>
</table>
</form>
</div>
<a href="viewemployee.php" style="text-decoration:none;">View Employee Information</a><br>
<a href="addemployee.php" style="text-decoration:none;">Add new Employee</a><br>
<a href="deleteemployee.php" style="text-decoration:none;">Delete an Employee</a><br>
<a href="track.php" style="text-decoration:none;">Monitor Attendance of Employee</a><br>
<a href="logout1.php" style="text-decoration:none;">Logout</a>
</center>
</body>
</html>