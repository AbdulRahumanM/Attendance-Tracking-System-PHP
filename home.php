<html>
<head>
<title>home</title>
</head>
<body>
<?php
session_start();
if($_SESSION['user']!="")
	{
		echo "Welcome <br>";
	}
	else
	{
		header("location:admin.php");
	}
?>
<center>
<a href="viewemployee.php" style="text-decoration:none;">View Employee Information</a><br>
<a href="addemployee.php" style="text-decoration:none;">Add New Employee</a><br>
<a href="deleteemployee.php" style="text-decoration:none;">Remove an Employee</a><br>
<a href="updateemployee.php" style="text-decoration:none;">Update Employee details</a><br>
<a href="track.php" style="text-decoration:none;">Monitor Attendance of Employee</a><br>
<a href="logout1.php" style="text-decoration:none;">Logout</a>
</center>
</body>
</html>