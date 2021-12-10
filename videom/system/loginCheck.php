<!-- loginCheck.php -->
<?php
session_start();
if (!isset($_SESSION['admin_name'])) {
	header("location:index.php");
	echo "没登陆";
	var_dump($_SESSION);
	// exit;
} else {
	echo "登陆了";
	var_dump($_SESSION);
}


function redirect($address, $msg)
{
	echo $msg . '<br>';
	header("refresh:5;url='$address'");
	echo "<a href=\"$address\">如果没反应,请点击跳转</a>";
}
