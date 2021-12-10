<?php
require_once('tpl/header.php');
include_once('inc_admin.php');

use function mysql_connect\sqli_init;
use function mysql_connect\sqli_ctrl;
use function pic_upload\file_upload_check;
use function pic_upload\file_upload_extension;
use function pic_upload\Get_File_name;
use function pic_upload\Move_File;

$con = sqli_init();
$uid = $_POST["uid"];
$userName = $_POST["username"];
$gender = $_POST["gender"];
$telephone = $_POST["tel"];
$email = $_POST["email"];
$head_pic = "pic";
$file = $_FILES[$head_pic];
$upload = false;
$success = file_upload_check($file);
if ($success) {

    if (file_upload_extension($file, "pic")) {

        $randname = Get_File_name($file);

        $upload = Move_File($file, $randname);
       
    } else {
        exit; //程序结束
    }
} else {
    $rs = UserUpdate($userName, $gender, $telephone, $email, $uid);
}
// echo "123 $upload 321";
if ($upload) {
    $sql_1 = "select photo from users where uid=$uid";
    $rs_1 = sqli_ctrl($sql_1);
    $row_1 = mysqli_fetch_assoc($rs_1);
    $filename = "../images/" . $row_1["photo"];
    //如果头像图片文件存在，则删除头像文件
    if (file_exists($filename)) { //判定文件是否存在
        unlink($filename);
    }
    $rs = UserUpdatePic($userName, $gender, $telephone, $email, $randname, $uid);
}
//编写sql语句
$rs = $rs or die("添加数据失败" . mysqli_connect_error());
if ($rs) {
    echo "更新成功，3秒后退返回列表";
    header("refresh:3;url='userList.php'");
} else {
    echo "更新失败";
}
require_once('tpl/footer.php');
?>