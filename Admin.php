<?php
session_start();
include_once 'dbconnect.php';

 if(isset($_SESSION['user'])!="")
{
 header("Location: test.php");
}

if(isset($_POST['btn-login']))
{
 $name = mysql_real_escape_string($_POST['name']);
 $password = mysql_real_escape_string($_POST['password']);
 $res=mysql_query("SELECT * FROM admin WHERE name='$name'");
 $row=mysql_fetch_array($res);
 if($row['password']==($password))
 {
  $_SESSION['user'] = $row['name'];
  header("Location: test.php");
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
<td><input type="text" name="name" placeholder="Your Name" required /></td>
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