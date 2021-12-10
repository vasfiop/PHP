<?php 
session_start();
if($_SESSION["name"]=="")
{
	echo "<script language='javascript'>window.location.href='login.php';</script>";
}
?>
