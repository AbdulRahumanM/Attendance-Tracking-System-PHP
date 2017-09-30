<?php
session_start();
include_once 'dbconnect.php';
$sql="SELECT name,mob,id FROM empdb";
$result=mysql_query($sql);
if(isset($_POST['add']))
{
	$emp_name = $_POST['newemp'];
	$mobile = $_POST['mob'];
	//$id = $_POST['empid'];
	$password= md5("123");
	mysql_query("INSERT INTO empdb (name,mob,password) VALUES('$emp_name','$mobile','$password')");
	header("Location: test.php");
} 
if(isset($_POST['delete']) && !empty($_POST['delete_id'])) {
  $delete_id = mysql_real_escape_string($_POST['delete_id']);
  mysql_query("DELETE FROM empdb WHERE `id`=".$delete_id);
  header('Location: test.php');

}
if(isset($_POST['track']) && !empty($_POST['track_id'])) {
  $track_id = mysql_real_escape_string($_POST['track_id']);
  echo "<h4>Attendance Data</h4>";
  echo " <h4>Employee ID: $track_id</h4>";
  $space = str_repeat('&nbsp;', 5);
  $retval = mysql_query("select dates,attendance FROM tracker WHERE `id`= $track_id group by dates");
 // header('Location: test.php');
if(! $retval )
	{
  		die('Could not track attendance ' . mysql_error());
	}
	else
	{
		echo " <table border ='1' cellspacing='0' width='300'><tr><th bgcolor='lightblue'>Date </th>{$space}<th bgcolor='lightblue'> Attendance</th></tr></table> <br>";
	}
	while($row = mysql_fetch_array($retval, MYSQL_ASSOC))
	{
    		echo "<tr border = '1'><td>{$row['dates']} </td>  {$space} <td>{$row['attendance']} </td></tr><br>";

} 
   echo "<br>";
}
if(isset($_POST['update']) && !empty($_POST['update_id'])) {
  $mob=$_POST['mob'];
  $update_id = mysql_real_escape_string($_POST['update_id']);
  mysql_query("UPDATE empdb SET mob = '$mob' WHERE `id`=".$update_id);
  header('Location: test.php');
}
?>
 
<form id="form" name="form" method="post" >
<table border='1' cellspacing='0' width='612' id='yourTbl'>
  <tr>
    <th bgcolor='green'><font color='white'>Name</font></th>
    <th bgcolor='green'><font color='white'>Mobile Number</font></th>
    <th bgcolor='green'><font color='white'>ID</font></th>
    <th bgcolor='green' colspan ='4'><font color='white'>Action</font></th>
  </tr>
  <?php
      $i = 0;
      $number = 0;
      while($row = mysql_fetch_array($result))
      {
 
        $number++; 
        $i++;
        if($i%2)
        {
            $bg_color = "#EEEEEE";
        }
        else 
        {
             $bg_color = "#E0E0E0";
        }   
   ?>
        <tr bgcolor=<?php echo $bg_color; ?> >  
            <td><center><Strong><font color='red'><?php echo $row['name']; ?></font></Strong></center></td>
            <td><center><Strong><?php echo $row['mob']; ?></Strong></center></td>
            <td><center><Strong><?php echo $row['id']; ?></Strong></center></td>
	    <input type="hidden" name="delete_id" value="<?php echo $row['id']; ?>" />
            <td><center><input name="delete" type="submit" value="delete" >&nbsp;</center></td>
	    <input type="hidden" name="track_id" value="<?php echo $row['id']; ?>" />
            <td><center><input name="track" type="submit" value="track" >&nbsp;</center></td>
	    <input type="hidden" name="update_id" value="<?php echo $row['id']; ?>" />
	    <td><input name="mob" type="text" placeholder= "New Mobile Number" /></td>
	    <td><center><input name="update" type="submit" id="<?php echo $row['id']; ?>" value="Update" >&nbsp;</center></td>    
	</tr>
</form>
<?php 
      } 
 ?>
</form>
<form name="register" method="post">
<tr>
	<td><input name="newemp" type="text" placeholder= "Employee name" required/></td>
	<td><input name="mob" type="text" placeholder= "Mobile Number" required/></td>
	<td colspan=5><center><input name="add" type="submit" value= "Add New Employee"/></center></td>
</tr>
</table>
</form>
<a href="logout1.php" style="text-decoration:none;">Logout</a>
