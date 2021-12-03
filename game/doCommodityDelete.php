<?php
include_once("./include.php");
include_once("./system/CheckLogin.php");
Sqli\sqli_init();
$cid = $_GET['cid'];
$success = commodity\Delete($cid);
if ($success)
    header("location:commodityList.php");
else
    header("location:commodityList.php?msg=更新失败！请联系作者！");
