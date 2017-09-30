<?php
include_once 'dbconnect.php';
$sql="SELECT name,mob,id FROM empdb";
$result=mysql_query($sql);
if(isset($_POST['add']))
{
	$emp_name = $_POST['newemp'];
	$mobile = $_POST['mob'];
	$id = $_POST['empid'];
	$p=123;
	$password= md5($p);
	mysql_query("INSERT INTO empdb (name,mob,id,password) VALUES('$emp_name','$mobile',$id,'$password')");
}
?>
 
<form name="addnew" method="post"> 
<table>
<tr>
	<td><input name="newemp" type="text" placeholder= "Employee name" required/></td>
	<td><input name="mob" type="text" placeholder= "Mobile Number" required/></td>
	<td><input name="newemp" type="text" placeholder= "Employee ID" required/></td>
	<td colspan=2><input name="add" type="submit" value= "Add New Employee"/></td>
</tr>
</table>
</form>
