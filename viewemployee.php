<?php
include_once 'dbconnect.php';
	$space = str_repeat('&nbsp;', 5);
	$sql = "select * from empdb";
	$retval = mysql_query( $sql);
	if(! $retval )
	{
  		die('No employee data found ' . mysql_error());
	}
	else
	{
		echo " Name {$space} Mobile Number {$space} ID <br>";
		echo "---------------------------------------------- <br>";
	}
	while($row = mysql_fetch_array($retval, MYSQL_ASSOC))
	{
    		echo "{$row['name']}  {$space} {$row['mob']} {$space} {$row['id']}<br>";
	} 
?>
<html>
<head>
<title>Employee Infromation</title>
</head>
<body>
<center>
<a href="addemployee.php" style="text-decoration:none;">Add new Employee</a><br>
<a href="deleteemployee.php" style="text-decoration:none;">Delete an Employee</a><br>
<a href="updateemployee.php" style="text-decoration:none;">Update Employee details</a><br>
<a href="track.php" style="text-decoration:none;">Monitor Employee Attendance</a><br>
<a href="logout1.php" style="text-decoration:none;">Logout</a>
</center>
</body>
</html>