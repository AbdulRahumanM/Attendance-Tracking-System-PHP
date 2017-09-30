<?php
session_start();
include_once 'dbconnect.php';

 if(isset($_SESSION['user'])!="")
{
 header("Location: employee.php");
}

if(isset($_POST['btn-login']))
{
 $id = mysql_real_escape_string($_POST['id']);
 $password = md5($_POST['password']);
 $res=mysql_query("SELECT * FROM empdb WHERE id='$id'");
 $row=mysql_fetch_array($res);
if($row['password']==($password))
 {
  
	//date_default_timezone_set('UTC');
	//$script_tz = date_default_timezone_get();
  $date = date('Y-m-d');
  //$result = $date->format('Y-m-d');
  $retval = mysql_query("INSERT INTO tracker values('$date','y',$id)");
 }
 if($row['password']==($password))
 {
  $_SESSION['user'] = $row['id'];
  header("Location: employee.php");
 }
 else
 {
  ?>
        <script>alert('wrong details');</script>
        <?php
 }
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Employee Management System</title>
</head>
<body>
<center>
<div id="login-form">
<form method="post">
<table align="center" width="30%" border="0">
<tr>
<td><input type="number" name="id" placeholder="Your ID" required /></td>
</tr>
<tr>
<td><input type="password" name="password" placeholder="Your Password" required /></td>
</tr>
<tr>
<td><button type="submit" name="btn-login">Sign In</button></td>
</tr>
</table>
</form>
</div>
</center>
</body>
</html>