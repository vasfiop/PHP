<?php
include_once("../Util/email.php");
include_once("../Util/GetRandNumber.php");

session_start();
$email = $_POST["email"];
$_SESSION["email"] = $email;

$rand_number = Get_rand\Get_Rand(1000, 9999);
if (Email\sendMail($email, "邮箱验证码", $rand_number)) {
    $_SESSION["rand_number"] = $rand_number;
    echo "<script>window.location.replace('findpwd.php')</script>";
} else {
    echo "<script>alert('无法发送邮件');history.back();</script>";
    exit();
}
