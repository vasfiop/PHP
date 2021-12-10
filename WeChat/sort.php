<?php
include_once("include.php");
$array = array();
Sqli\sqli_init();
$smallsort = WechatSmallsort\GetSmallsort();
while ($row = Sqli\sqli_get_map($smallsort)) {
    $comm_list = WeChatcommodity\GetCommBySmallsort($row['ssid']);
    $array_list = array();
    while ($comm_list->num_rows != 0 && $map = Sqli\sqli_get_map($comm_list)) {
        $map['c_pic'] = $img_src . $map['c_pic'];
        array_push($array_list, $map);
    }
    array_push($array, $array_list);
}
$json = json_encode($array);
echo $json;
