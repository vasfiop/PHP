<?php
include_once("./include.php");
include_once("./system/CheckLogin.php");
$uid = $_POST['uid'];
$u_name = $_POST['u_name'];
$u_email = $_POST['u_email'];
$u_tel = $_POST['u_telphone'];
$u_sex = $_POST['u_sex'];
$file = $_FILES['file'];
$old_file = $_POST['old_pic'];

Sqli\sqli_init();

// 处理邮箱
$list = user\GetUserByEmail($u_email);
$row = Sqli\sqli_get_map($list);
if ($row['uid'] != $uid && $list->num_rows != 0) {
    header("location:userEdit.php?uid=$uid&msg=该邮箱已被注册过！");
    exit();
}
// 处理手机号
$list = user\GetUserByTel($u_tel);
$row = Sqli\sqli_get_map($list);
if ($row['uid'] != $uid && $list->num_rows != 0) {
    header("location:userEdit.php?uid=$uid&msg=该手机号已被注册过！");
    exit();
}
//  处理文件
if ($file['error'] == 4) // 如果未上传文件
    $success = user\Update($uid, $u_name, $u_tel, $u_sex, null, $u_email);
else {
    // 如果文件上传了
    file_upload_check\file_upload_extension($file, "pic");
    $file_name = file_upload_check\Get_File_name($file);
    file_upload_check\Move_File($file, USERIMG . $file_name);
    $success = user\Update($uid, $u_name, $u_tel, $u_sex, $file_name, $u_email);
}
if ($success && $old_file != "default.pic") {
    // 如果用户原来的头像不是默认头像，将原来的头像从本地删除
    if (file_exists(USERIMG . $old_pic))
        unlink(USERIMG . $old_pic);
}
if ($success) {
    header("location:userList.php");
    exit();
} else {
    header("location:userEdit.php?uid=$uid&success=$success");
    exit();
}
