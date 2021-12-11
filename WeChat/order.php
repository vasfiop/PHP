<?php
include_once("include.php");
Sqli\sqli_init();
$array = array();
if (!isset($_POST['uid']))
    $array = array("success" => false, "msg" => "error:do not have uid");
else {
    $uid = $_POST['uid'];
    $list = WeChatorder\GetOrderByUid($uid);
    while ($row = Sqli\sqli_get_map($list)) {
        $row['c_pic'] = $img_src . $row['c_pic'];
        array_push($array, $row);
    }
}
$json = json_encode($array);
echo $json;
