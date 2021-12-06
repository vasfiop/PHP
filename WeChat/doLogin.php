<?php
// 用户登录
include_once("include.php");
$array = array();
if (!isset($_POST['u_email']) && !isset($_POST['u_password'])) {
    $array = array("success" => false, "msg" => "没有输入信息");
} else {
    $u_email = $_POST['u_email'];
    $u_password = $_POST['u_password'];
    $list = WeChatuser\GetUser($u_email, $u_password);
    if ($list->num_rows == 0) {
        $array = array("success" => false, "msg" => "用户名或密码错误");
    } else {
        while ($row = Sqli\sqli_get_map($list)) {
            $row['u_pic'] = $user_src . $row['u_pic'];
            array_push($array, $row);
        }
        $_SESSION['uid'] = $row['uid'];
    }
}
$json = json_encode($array);
echo $json;