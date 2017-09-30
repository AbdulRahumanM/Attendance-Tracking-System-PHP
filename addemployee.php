<?php
include_once 'dbconnect.php';
if(isset($_POST['add']))
{
	$emp_name = $_POST['name'];
	$mobile = $_POST['number'];
	$id = $_POST['empid'];
	$sql = "INSERT INTO empdb (name,mob,id) VALUES('$emp_name','$mobile',$id)";
	$retval = mysql_query( $sql);
	if(! $retval )
	{
  		die('Could not enter data: ' . mysql_error());
	}
	echo "Entered data successfully\n";
	$sql = "INSERT INTO employee VALUES($id,'123')";
	$retval = mysql_query( $sql);
}
?>
<html>
<head>
<title>Add Employee</title>
</head>
<body>
<center>
<div id="login-form">
<form method="post">
<table align="center" width="30%" border="0">
<tr>
<td><input type="name" name="name" placeholder="Enter employee name" required /></td>
</tr>
<tr>
<td><input type="text" name="number" placeholder="Enter Mobile Number" required /></td>
</tr>
<tr>
<td><input type="number" name="empid" placeholder="Enter a new ID" required/></td>
</tr>
<tr>
<td><button type="submit" name="add">Add Employee</button></td>
</tr>
</table>
</form>
</div>
<a href="viewemployee.php" style="text-decoration:none;">View Employee Information</a><br>
<a href="deleteemployee.php" style="text-decoration:none;">Remove an Employee</a><br>
<a href="updateemployee.php" style="text-decoration:none;">Update Employee details</a><br>
<a href="track.php" style="text-decoration:none;">Monitor Attendance of Employee</a><br>
<a href="logout1.php" style="text-decoration:none;">Logout</a>
</center>
</body>
</html>