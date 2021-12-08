<?php
include_once("include.php");
Sqli\sqli_init();
$array = array();
if (!isset($_POST['ssid'])) {
    $array = array("success" => false, "msg" => "没有ssid");
} else {
    $ssid = $_POST['ssid'];
    if (!isset($_POST['num']))
        $num = 10;
    else
        $num = $_POST['num'];
    $list = WeChatcommodity\GetCommByNumSsid($num, $ssid);
    while ($row = Sqli\sqli_get_map($list)) {
        $row['c_pic'] = $img_src . $row['c_pic'];
        array_push($array, $row);
    }
}
$json = json_encode($array);
echo $json;
