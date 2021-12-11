<?php
include_once("include.php");
Sqli\sqli_init();
$array = array();
if (!isset($_POST['cid']))
    $array = array("success" => false, "msg" => "do not cid");
else {
    $cid = $_POST['cid'];
    $list = WeChatcommodity\GetCommByCid($cid);
    $row = Sqli\sqli_get_map($list);
    $row['c_pic'] = $img_src . $row['c_pic'];
    $array = $row;
}
$json = json_encode($array);
echo $json;
