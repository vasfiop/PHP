<?php
include_once("./include.php");
include_once("./system/CheckLogin.php");
$cid = $_POST['cid'];
$c_name = $_POST['c_name'];
$c_area = $_POST['c_area'];
$tid = $_POST['type'];
$file = $_FILES['file'];

Sqli\sqli_init();
// 先处理文件
if ($file['error'] == 4) // 没有文件上传
    $success = commodity\Update($cid, $c_name, $c_area, null, $tid);
else {
    file_upload_check\file_upload_check($file);
    file_upload_check\file_upload_extension($file, "pic");
    $file_name = file_upload_check\Get_File_name($file);
    file_upload_check\Move_File($file, COMMIMG . $file_name);
    $success = commodity\Update($cid, $c_name, $c_area, $file_name, $tid);
}
if ($success)
    header("location:CommodityList.php");
else
    header("location:CommodityEdit.php?msg=更新失败！请联系作者！");
