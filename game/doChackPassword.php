<?php
include_once("include.php");
include_once("./system/CheckLogin.php");

Sqli\sqli_init();
$aid = $_SESSION['admin_id'];
$a_password = $_POST['a_password'];
$list = admin\GetAdminByIdPass($aid, $a_password);
if ($list->num_rows == 0)
    header("Location:adminPassword.php?success=$success&msg=登录密码错误");
else
    header("location:adminNewPassword.php");
