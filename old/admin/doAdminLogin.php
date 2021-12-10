<?php
include_once('inc_admin.php');
include_once("../system/loginCheck.php");

use function mysql_connect\sqli_init;
use function mysql_connect\sqli_ctrl;

$con = sqli_init();
$adminName = $_POST["adminname"];
$password = $_POST["password"];
$sqlALogin = "select * from admins where adminname = '$adminName' and password = md5('$password')";

$rs = sqli_ctrl($sqlALogin);
$num = mysqli_num_rows($rs); //统计结果集中记录的条数
$row = mysqli_fetch_assoc($rs);
if ($num > 0) {
    $_SESSION["adminName"] = $adminName;
    header("location:welcome.php");
} else {
    // echo "登录失败";
    header("location:index.php?msg='用户名或密码错误'");
}
