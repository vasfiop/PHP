<?php
include_once("tpl/header.php");
include_once("../../Util/mysqli.php");
include_once("../../Util/file_upload_check.php");
include_once("SQL.php");
$uid = $_POST['uid'];
$uname = $_POST['userName'];
$password = $_POST['password'];
$sex = $_POST["sex"];
$tel = $_POST['tel'];
$email = $_POST['email'];
$file = $_FILES['file'];
file_upload_check\file_upload_check($file);
if ($file['error'] == 4)  // 没有文件上传
    $sql = "update users set uname = '$uname',gender=$sex,tel='$tel',email='$email' where uid=$uid";
else {
    file_upload_check\file_upload_extension($file, "pic");
    $file_name = file_upload_check\Get_File_name($file);
    file_upload_check\Move_File($file, "../image/" . $file_name);
    $sql = "update users set uname='$uname',gender=$sex,tel='$tel',email='$email',photo='$file_name' where uid = $uid";
}
Sqli\sqli_init();
if (Sqli\sqli_update($sql)) {
    echo "更新成功<br>";
    echo '<a href="userList.php">返回</a>';
} else {
    echo '未知错误<br>';
    echo '<a href="userList.php">返回</a>';
}

include_once("tpl/footer.php");
