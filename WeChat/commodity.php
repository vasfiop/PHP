<?php
include_once("include.php");
Sqli\sqli_init();
$num = 10;
if (isset($_GET['num']))
    $num = $_GET['num'];
$list = WeChatcommodity\GetCommByNum($num);

$array = array();
while ($row = Sqli\sqli_get_map($list)) {
    $row['c_pic'] = $img_src . $row['c_pic'];
    array_push($array, $row);
}

$json = json_encode($array);
echo $json;
