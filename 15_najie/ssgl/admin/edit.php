<?php   
session_start();   
// 这种方法是将原来注册的某个变量销毁 
unset($_SESSION['username']);
unset($_SESSION['pwd']);
echo("<meta http-equiv=refresh content='0; url=index.php'>"); 
echo "<script language=javascript>window.close();</script>";

?>
