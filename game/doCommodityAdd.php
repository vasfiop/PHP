<?php
include_once("./include.php");
include_once("./system/CheckLogin.php");
$c_name = $_POST['c_name'];
$c_area = $_POST['c_area'];
$file = $_FILES['file'];
$type = $_POST['type'];

// 先处理文件
file_upload_check\file_upload_check($file);
file_upload_check\file_upload_extension($file, "pic");
$file_name = file_upload_check\Get_File_name($file);
file_upload_check\Move_File($file, COMMIMG . $file_name);

// 数据库环节
Sqli\sqli_init();
$success = commodity\InsertInto($c_name, $c_area, $file_name, $type);
if ($success)
    header("location:CommodityList.php");
else
    header("location:welcome.php");
