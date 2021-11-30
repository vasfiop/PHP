<?php
include_once("./include.php");
include_once("./system/CheckLogin.php");
$t_name = $_POST['t_name'];
Sqli\sqli_init();
$success = type\AddType($t_name);
if ($success)
    header("location:typeList.php");
else
    header("location:welcome.php");
