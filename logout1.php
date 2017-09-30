<?php

	echo "Logged out scuccessfully";
    
    	session_start();
	session_unset();
	session_destroy();
	header("location:admin.php");

?>