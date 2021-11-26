<?php
include_once("tpl/header.php");
include_once("../system/loginCheck.php");

include_once("../../Util/mysqli.php");
include_once("../../Util/file_upload_check.php");
include_once("SQL.php");
$videoname = $_POST['videoname'];
$videotype = $_POST['videotype'];
$file = $_FILES['videofile'];
$videointro = $_POST['videointro'];
$address = $_POST['address'];
// 先处理文件
file_upload_check\file_upload_check($file);
file_upload_check\file_upload_extension($file, "pic");
$file_name = file_upload_check\Get_File_name($file);
file_upload_check\Move_File($file, "../posters/" . $file_name);
// 数据库环节
Sqli\sqli_init();
$admin_id = $_SESSION['admin_id'];
$count = my_sql\AddVideo($videoname, $videotype, $file_name, $admin_id, $videointro, $address);
if ($count != 1)
    redirect('videoAdd.php', '添加失败,3秒返回添加');
else
    redirect('videoList.php', '添加成功，3秒进入视频列表');
include_once("tpl/footer.php");
