<?php
include_once("../Util/file_upload_check.php");
include_once("../Util/GetRandNumber.php");
include_once("../Util/mysqli.php");

$userName = $_POST["userName"];
$password = $_POST["password"];
$sex = $_POST["sex"];
$tel = $_POST["telephone"];
$pic = $_FILES["head_pic"]["tmp_name"];
$email = $_POST["email"];

// 先对文件进行处理
file_upload_check\file_upload_check($_FILES["head_pic"]);
$success = file_upload_check\file_upload_extension($_FILES["head_pic"], "pic");
if (!$success)
    echo "<script>alert('文件上传类型错误!');history.back();</script>";
$file_extend = explode(".", $_FILES["head_pic"]["name"]);
$address =  date('YMDHIS') . Get_Rand\Get_Rand(000, 999) . "." . $file_extend[count($file_extend) - 1];
move_uploaded_file($_FILES["head_pic"]["tmp_name"], "./image/" . $address);

Sqli\sqli_init();
$sql = "insert into users values(null,'$userName',md5('$password'),'$sex','$tel','$address','$email',now(),now())";
$list = Sqli\sqli_ctrl($sql);
