<?php
include_once("./include.php");

$a_name = $_POST['a_name'];
$a_email = $_POST['a_email'];
$a_telphone = $_POST['a_telphone'];
$password = $_POST['password'];
$password_two = $_POST['password_two'];
if ($password != $password_two) {
    header("location:register.php?msg=两次密码输入不一致!");
    exit();
}
Sqli\sqli_init();
$list = admin\GetAdminByEmail($a_email);
if ($list->num_rows != 0) {
    header("location:register.php?msg=该邮箱已被注册!");
    exit();
}
$list = admin\GetAdminByTel($a_telphone);
if ($list->num_rows != 0) {
    header("location:register.php?msg=该手机号已被注册!");
    exit();
}
session_start();
if (!isset($_SESSION['new_admin']))
    $new_admin = array();
else
    $new_admin = $_SESSION['new_admin'];

$num = count($new_admin);
$new_id = date('dhis') . rand();
array_push($new_admin, array($new_id => array($a_name, $a_email, $a_telphone, $password)));
$_SESSION['new_admin'] = $new_admin;
$url = "http://460d80b632.zicp.vip/game/check.php?count=$num&new_id=$new_id";
$content = "[后台管理系统] 尊敬的$a_name :我们收到了您 注册的申请 确认无误后请点击下连接确认操作：$url \n如非本人操作，请无视该邮件.";
Email\sendMail($a_email, "后台管理系统验证", $content);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>后台管理系统</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="./resources/WebContent/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="./resources/WebContent/css/all_style.css">
    <script src="./resources/WebContent/jquery/jquery-3.6.0.min.js"></script>
    <script src="./resources/WebContent/bootstrap/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class="alert alert-success alert-dismissable">

        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
            ×
        </button>
        <h4>
            提交成功！
        </h4>
        请去注册邮箱验证网址
    </div>
</body>

</html>