<?php
include_once("include.php");
Sqli\sqli_init();
$list = WeChatcommodity\GetCommByNum(null);
$count = $list->num_rows;
$array = array();
srand(time());
if (!isset($_GET['num']))
    $num = 8;
else
    $num = number_format($_GET['num']);
$numrand = array();
for ($i = 0; $i < $num; $i++)
    array_push($numrand, rand(0, $count));
for ($i = 0; $i < $num; $i++) {
    $list = WeChatcommodity\GetCommByNum(null);
    for ($j = 0; $j < $numrand[$i]; $j++)
        $row = Sqli\sqli_get_map($list);
    $row['c_pic'] = $img_src . $row['c_pic'];
    array_push($array, array("c_pic" => $row['c_pic']));
}
$json = json_encode($array);
echo $json;