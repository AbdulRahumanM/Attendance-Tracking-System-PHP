<html>
<head>
<title>Welcome to your portal</title>
</head>
<body>
<?php
include_once 'dbconnect.php';
session_start();
$id = $_SESSION['user'];
$wgLocaltimezone = "Asia/Kolkata";
date_default_timezone_set( $wgLocaltimezone );
//date.timezone = "Asia/Kolkata"
//$date->setTimezone(new DateTimeZone('Asia/Kolkata'));
$now = date('Y-m-d g:i:s A');
if($_SESSION['user']!="")
	{
		
		$sql = "select * from empdb where id = $id";
		$retval = mysql_query( $sql);
	while($row = mysql_fetch_array($retval))
	{
    		echo "Welcome {$row['name']} <br>";
		echo "Last Login: {$row['LastLogin']} <br>";
	}
	mysql_query("UPDATE empdb SET lastlogin = '$now' WHERE id = $id ");
	}
	else
	{
		header("location:login.php");
	}
?>
<center>
<a href="password.php" style= "text-decoration:none;">Change Password</a>
<br>
<a href="logout.php" style="text-decoration:none;">Logout</a>
</center>
</body>
</html>