<?php
include_once("tpl/header.php");
include_once("../system/loginCheck.php");
include_once("../../Util/mysqli.php");
include_once("SQL.php");

$admin = $_SESSION['admin'];

$oldpassword = $_POST['oldpassword'];
if ($admin['password'] != $oldpassword)
    redirect('changePassword.php', '原密码不正确，请重新填写,3秒后将跳转到首页');

$password1 = $_POST['password1'];
$password2 = $_POST['password2'];
if ($password1 != $password2)
    redirect('changePassword.php', '确认密码不正确，请重新填写,3秒后将跳转到首页');

Sqli\sqli_init();
$success = my_sql\UpdateAdminPass($admin['adminname'], $password1);
// 更新session
$admin['password'] = $password1;
$_SESSION['admin'] = $admin;
if ($success)
    redirect('index.php', '修改成功！3秒后返回首页!');
else
    redirect('index.php', '修改成功！3秒后返回首页!');

include_once("tpl/footer.php");
