<?php
include_once("include.php");
include_once("./system/CheckLogin.php");
$aid = $_POST['aid'];
$a_name = $_POST['a_name'];
$a_telphone = $_POST['a_telphone'];
Sqli\sqli_init();
$success = admin\UpdateNameTel($aid, $a_name, $a_telphone);
if ($success)
    header("location:welcome.php?msg=更新成功");
else
    header("Location:adminUpdate.php?success=$success");
