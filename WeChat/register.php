<?php
// 用户注册
include_once("include.php");

Sqli\sqli_init();

$u_email = $_POST['u_email'];
$u_password = $_POST['u_password'];
$u_sex = $_POST['u_sex'];
$u_telphone = $_POST['u_telphone'];
$file = $_FILES['file'];

$list = WeChatuser\GetUserByEmail($u_email);
if ($list->num_rows != 0) {
    $array = array("success" => false, "msg" => "该邮箱已经被人注册");
} else {
    // 先处理文件
    file_upload_check\file_upload_extension($file, "pic");
    $file_name = file_upload_check\Get_File_name($file);
    file_upload_check\Move_File($file, "../game/resources/images/user/" . $file_name);

    $success = WeChatuser\Insert($u_name, $u_email, $u_password, $file_name, $u_sex);
    if ($success) {
        $list = WeChatuser\GetUserByEmail($u_email);
        $row = Sqli\sqli_get_map($list);
        $array = array("success" => true);
        array_push($array, $row);
    } else
        $array = array("success" => false, "msg" => "未知错误");
}
srand($row['uid']);
$rand_num;
for ($i = 0; $i < 4; $i++)
    $rand_num[$i] = rand(0, 100);
$array[1] = $rand_num;
$array[0]['u_shop'] = rand(0, 10);
$json = json_encode($array);
echo $json;
