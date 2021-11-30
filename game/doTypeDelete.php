<?php
include_once("./include.php");
include_once("./system/CheckLogin.php");
Sqli\sqli_init();
$tid = $_GET['tid'];
$success = type\Delete($tid);
if ($success)
    header("location:typeList.php");
else
    header("location:typeEdit.php?success=$success");
