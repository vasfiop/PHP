<?php
session_start();
$verification_code = $_POST["verification_code"];
$password = $_POST["password"];
$dec_password = $_POST["dec_password"];

$_SESSION["verification_code"] = $verification_code;
if ($password != $dec_password) {
    echo "<script>alert('两次密码不一致！');history.back();</script>";
    exit();
}
$rand_number = $_SESSION["rand_number"];
if ($rand_number != $verification_code) {
    echo "<script>alert('验证码不正确！');history.back();</script>";
    exit();
}
echo "<script>alert('修改成功！');history.back();</script>";
echo "<script>window.location.replace('index.html')</script>";
