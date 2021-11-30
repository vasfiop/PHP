<?php
include_once("./include.php");
include_once("./system/CheckLogin.php");
$tid = $_POST['tid'];
$t_name = $_POST['t_name'];
Sqli\sqli_init();
$success = type\Update($tid, $t_name);
if ($success)
    header("location:typeList.php");
else
    header("location:typeEdit.php?success=$success");
