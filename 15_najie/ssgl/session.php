<?php
session_start();
if($_SESSION["xh"]=="") 
{
echo "<script language='javascript'>"; 
echo " location='login.php';"; 
echo "</script>"; 	
	exit();		
}
?>