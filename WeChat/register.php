<?php
include_once("include.php");
$array = array();
if (!isset($_POST['u_email']) && !isset($_POST['u_password'])) {
    $array = array("success" => false, "msg" => "没有输入信息");
} else {
    $u_email = $_POST['u_email'];
    $u_password = $_POST['u_password'];
    $list = WeChatuser\GetUserByEmail($u_email);
    if ($list->num_rows != 0) {
        $array = array("success" => false, "msg" => "邮箱已经被注册");
    } else {
        $u_name = $_POST['u_name'];
        $success = WeChatuser\Insert($u_name, $u_email, $u_password);
        if ($success) {
            $array = array("success" => true);
            $list = WeChatuser\GetUserByEmail($u_email);
            $row = Sqli\sqli_get_map($list);
            $row['u_pic'] = $user_src . $row['u_pic'];
            array_push($array, $row);
        } else {
            $array = array("success" => false, "msg" => "遇到未知错误");
        }
    }
}

$json = json_encode($array);
echo $json;
