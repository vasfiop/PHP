<?php
include_once("tpl/header.php");
include_once("../system/loginCheck.php");
include_once("../../Util/mysqli.php");
include_once("../../Util/file_upload_check.php");
include_once("SQL.php");
$vid = $_GET['vid'];

Sqli\sqli_init();

$list = my_sql\GetVideoById($vid);

$row = mysqli_fetch_assoc($list);
$pic = $row['pic'];
if (file_exists("../posters/" . $pic) && $pic != null)
    unlink("../posters/" . $pic);

$count = my_sql\DeleteVideo($vid);
if ($count)
    redirect('videoList.php', '删除成功!');
else
    redirect('videoList.php', '删除失败!');
include_once("tpl/footer.php");
