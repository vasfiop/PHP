<?php
include_once("tpl/header.php");
include_once("../../Util/file_upload_check.php");
include_once("../../Util/GetRandNumber.php");
include_once("../../Util/mysqli.php");
include_once("../system/loginCheck.php");
include_once("SQL.php");
Sqli\sqli_init();
$uid = $_GET["tid"];

// 处理头像
$count = my_sql\GetUserPic($uid);
$row = mysqli_fetch_assoc($count);
if (file_exists("../image/" . $row['photo']))
   unlink("../image/" . $row['photo']);

$success = my_sql\DeleteUser($uid);
if ($success)
   redirect('userList.php', '删除成功!,3秒返回视频列表');
else
   redirect('userList.php', '删除失败!,3秒返回视频列表');



include_once("tpl/footer.php");
