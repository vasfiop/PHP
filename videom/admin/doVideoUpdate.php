<?php
include_once("tpl/header.php");
include_once("../system/loginCheck.php");
include_once("../../Util/mysqli.php");
include_once("../../Util/file_upload_check.php");
include_once("SQL.php");
$videoname = $_POST['videoname'];
$videotype = $_POST['videotype'];
$file = $_FILES['file'];
$videointro = $_POST['videointro'];
$address = $_POST['address'];
$vid = $_POST['vid'];

// 先处理文件
Sqli\sqli_init();
if ($file['error'] == 4)  // 没有文件上传
    $list = my_sql\UpdateVideo($videoname, $videotype, $_SESSION['admin_id'], $videointro, $address, $vid, null);
else {
    $old_pic = $_POST['oldpic'];
    if (file_exists("../posters/$old_pic"))
        unlink("../posters/$old_pic");
    file_upload_check\file_upload_check($file);
    file_upload_check\file_upload_extension($file, "pic");
    $file_name = file_upload_check\Get_File_name($file);
    file_upload_check\Move_File($file, "../posters/" . $file_name);
    $list = my_sql\UpdateVideo($videoname, $videotype, $_SESSION['admin_id'], $videointro, $address, $vid, $file_name);
}
$success = Sqli\sqli_get_count();
if ($success)
    redirect('videoList.php', '添加成功,3秒返回视频列表');
else
    redirect('videoList.php', '添加失败,3秒返回视频列表');
include_once("tpl/footer.php");
