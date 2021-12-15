<?php
include_once("include.php");
include_once("./system/CheckLogin.php");

$mode = $_POST['mode'];
Sqli\sqli_init();
$aid = $_SESSION['admin_id'];
$a_password = $_POST['a_password'];
$list = admin\GetAdminByIdPass($aid, $a_password);

if ($mode == 1) {
    if ($list->num_rows == 0) {
        header("Location:adminPassword.php?success=$success&msg=登录密码错误");
        exit;
    }
    header("location:adminNewPassword.php");
    exit;
} else if ($mode == 0) {
    if ($list->num_rows == 0) {
        header("Location:adminChangeEmail.php?success=$success&msg=登录密码错误");
        exit;
    }
    header("location:adminNewEmail.php");
    exit;
}
