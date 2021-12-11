<?php
include_once("include.php");
Sqli\sqli_init();
$array;
if (!isset($_POST['uid']))
    $array = array("success" => false, "msg" => "do not have uid");
else {
    $uid = $_POST['uid'];
    $list = WeChatuser\GetUserByUid($uid);
    $row = Sqli\sqli_get_map($list);
    $u_history = (int)$row['u_history'];
    $success = WeChatuser\UpdateHistory($uid, $u_history + 1);
    if ($success)
        $array = array("success" => true);
    else
        $array = array("success" => false);
}
$json = json_encode($array);
echo $json;
