<?php
include_once("tpl/header.php");
include_once("inc_admin.php");
use function mysql_connect\sqli_init;
$con = sqli_init();
session_start();
$admin = $_SESSION['admin'];
$oldpassword = $_POST['oldpassword'];
if ($admin['password'] != md5($oldpassword)){
    redirect('changePassword.php', '原密码不正确，请重新填写,3秒后将跳转到首页');
}
$password1 = $_POST['password1'];
$password2 = $_POST['password2'];
if ($password1 != $password2){
    redirect('changePassword.php', '确认密码不正确，请重新填写,3秒后将跳转到首页');
}

// 更新session
$rs = UpdateAdminPass($admin['adminname'], $password1);
if ($rs) {
    $admin['password'] = $password1;
    $_SESSION['admin'] = $admin;
    redirect('index.php', '修改成功！3秒后返回首页!');
} else
    redirect('index.php', '修改成功！3秒后返回首页!');

include_once("tpl/footer.php");
